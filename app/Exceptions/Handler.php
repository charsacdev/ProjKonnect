<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    
    protected $levels = [
        //
    ];

    
    protected $dontReport = [
        //
    ];

    
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // app/Exceptions/Handler.php

    public function render($request, Throwable $exception){
        // Check if the exception is an instance of any specific HTTP exceptions
        if ($this->isHttpException($exception)) {
            $statusCode = $exception->getStatusCode();
            
            // Handle 400 Bad Request errors
            if ($statusCode == 404) {
                return response()->view('errors.404', [], 404);
            }
            
            // Handle 500 Internal Server Error
            if ($statusCode == 500) {
                return response()->view('errors.500', [], 500);
            }
        }

        // Handle other exceptions, including generic 500 errors
        if ($exception instanceof \Exception) {
            return response()->view('errors.500', [], 500);
        }

        // Handle general exceptions, including other status codes
        return parent::render($request, $exception);
    }

}

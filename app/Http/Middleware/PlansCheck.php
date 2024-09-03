<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PaymentsPlans;
use Illuminate\Support\Facades\Auth;

class PlansCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get the authenticated user's plan
        $userPlans = PaymentsPlans::where('user_id', auth()->guard('web')->user()->id)->first();

        if ($userPlans) {
            // Check the user's plan and redirect based on the accessed route
            if ($this->isAccessingPremiumPlusFeature($request) && $userPlans->plan_name !== 'Premium Plus') {
                // Redirect to the upgrade section if the user is trying to access a Premium Plus feature but has a lower plan
                return redirect()->to('/dashboard#premiumplus-feature');
            }

            if ($this->isAccessingPremiumFeature($request) && $userPlans->plan_name === 'Free') {
                // Redirect to the upgrade section if the user is trying to access a Premium feature but has a Free plan
                return redirect()->to('/dashboard#upgrade');
            }
        }

        // Proceed with the request if no redirection is needed
        return $next($request);
    }

   
    private function isAccessingPremiumFeature(Request $request): bool{
        // Define the URLs or features that require at least a Premium plan
        $premiumRoutes = [
            #'premium-feature-url',  // Replace with actual route or path
            #'another-premium-url'   // Replace with actual route or path
        ];

        return $this->matchesRoute($request->path(), $premiumRoutes);
    }

   
    private function isAccessingPremiumPlusFeature(Request $request): bool
    {
        // Define the URLs or features that require a Premium Plus plan
        $premiumPlusRoutes = [
            'student-ai',  // Replace with actual route or path
            'another-premiumplus-url'   // Replace with actual route or path
        ];

        return $this->matchesRoute($request->path(), $premiumPlusRoutes);
    }

   
    private function matchesRoute(string $currentPath, array $routes): bool
    {
        foreach ($routes as $route) {
            if (strpos($currentPath, $route) !== false) {
                return true;
            }
        }
        return false;
    }
}

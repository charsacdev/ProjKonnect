<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use Illuminate\Support\Facades\URL;

class Newpassword extends Component
{
    public $newpassword,$oldpassword,$segment2,$segment3;

    public function mount(){
        $url = URL::current(); 
      
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', $path);
        $this->segment2 = base64_decode($segments[2]);
        $this->segment3 = base64_decode($segments[3]);

        #dd($segment2,$segment3);
    }


    #updatepassword
    public function ResetPassword(){
        try{
              #check confirm password
              if($this->newpassword!==$this->oldpassword){
                  session()->flash('error','password does not match!');
              }
              else{
                
                  $updateAccess=UsersTables::where(['email'=>$this->segment2])->update([
                      'password'=>Hash::make($this->newpassword),
                      'email_verified_at'=>Carbon::now()->addDay()
                  ]);	
                  if($updateAccess){
                      
                      return redirect("/verify-email-success"."/".base64_encode($this->segment2));
                  }
                  else{
                      session()->flash('error','Oops sorry, link might have expired please try again!');
                  }
          }
      } 
      catch(\Throwable $g){

          #session()->flash('error',$g->getMessage());
          session()->flash('error','An unexpected error occured please try again...');
      } 
     
         
  }

    public function render()
    {
        return view('livewire.newpassword');
    }
}

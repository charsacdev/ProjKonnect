<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\AdminWebTable;
use Illuminate\Support\Facades\URL;

class Newpassword extends Component
{
    public $newpassword,$oldpassword,$segment2;

    public function mount(){
        $url = URL::current(); 
      
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', $path);
        $this->segment2 = base64_decode($segments[3]);
       
        
    }


    #updatepassword
    public function NewPassword(){
        try{
              #Fetch User details
              $Details=AdminWebTable::where(['email'=>$this->segment2])->first();

              #check confirm password
              if($this->newpassword!==$this->oldpassword){
                  session()->flash('error','Password does not match!');
              }
              elseif(Carbon::parse($Details->updated_at)->diffInMinutes(Carbon::now()) > 60){

                session()->flash('error','Link is expired must be 1hr ago!'); 
              }
              
              else{
                
                  $updateAccess=AdminWebTable::where(['email'=>$this->segment2])->update([
                      'password'=>Hash::make($this->newpassword),
                      'updated_at'=>Carbon::now()
                  ]);	
                  if($updateAccess){
                      
                      return redirect("admin-projkonnect/login");
                  }
                  else{
                      session()->flash('error','Oops sorry, link might have expired please try again!');
                  }
          }
      } 
      catch(\Throwable $g){

          session()->flash('error',$g->getMessage());
          #session()->flash('error','An unexpected error occured please try again...');
      } 
     
         
  }
  
    public function render()
    {
        return view('livewire.admin.newpassword');
    }
}

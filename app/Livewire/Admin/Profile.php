<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\Countries;
use App\Models\Qualifications;
use App\Models\AdminWebTable;
use App\Models\UserQualifications;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use  WithFileUploads;

    #student varaibles
    public $countries,$qualification_all;

    #update profile Details
    public $photo,$first_name,$last_name,$email,$phone_number,$gender,$country,$qualification,$university,$password,$password_confirmation;


    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'gender' => 'required',
        'country' => 'required',
        'password' => 'required|confirmed',
    ];
     public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }

    public function mount(){

        #get all countries
        $this->countries=Countries::all();

        #get all qualifications
        $this->qualification_all=Qualifications::all();

        #user details
        $userDetails=AdminWebTable::where('id',auth()->guard('admin')->user()->id)->first();

       
        $this->first_name=$userDetails->first_name;
        $this->last_name=$userDetails->last_name;
        $this->email=$userDetails->email;
        $this->phone_number=$userDetails->phone;
        $this->university=$userDetails->university;

    }

    


    #update profile php
    public function UpdateProfile(){
         
        $this->validate();
    
        try{
            
              #check if profile image exisit
              $userDetails=AdminWebTable::where('id',auth()->guard('admin')->user()->id)->first();
              $profileImage=$userDetails->profile_photo;

            if($userDetails and  Hash::check($this->password, $userDetails->password)){

              #url 
              if(!$this->photo==null){

                  $fileurl=$this->photo->store('/', 'profile_photo');
                  $awsurl="https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/".$fileurl;
              }
              else{

                  $awsurl=$profileImage;
              }

              #update profile
               $updateProfile=AdminWebTable::where('id',auth()->guard('admin')->user()->id)->update([
                    'first_name'=>$this->first_name,
                    'last_name'=>$this->last_name,
                    'email'=>$this->email,
                    'phone'=>$this->phone_number,
                    'profile_photo'=>$awsurl,
                    'gender'=>$this->gender,
                    'country'=>$this->country,
                    'qualification'=>$this->qualification,
                    'university'=>$this->university,
               ]);

               #successfully updated 
               session()->flash('success','Profile Updated Successfully');
               return redirect('/admin-projkonnect/profile');
               #dd("done");

           }
           else{
        
            session()->flash('password-error','Enter correct password to proceed.');
        
           }
        }
        catch(\Throwable $g){

            session()->flash('error','An error occured please try again.');
            #dd($g->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}

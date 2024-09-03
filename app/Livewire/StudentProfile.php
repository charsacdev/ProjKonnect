<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\Countries;
use App\Models\Qualifications;
use App\Models\UsersTables;
use App\Models\UserQualifications;
use App\Models\Interest;
use App\Models\UserInterest;
use Livewire\WithFileUploads;

class StudentProfile extends Component
{
    use  WithFileUploads;

    #student varaibles
    public $countries,$qualification_all,$interest_all;

    #update profile Details
    public $photo,$first_name,$last_name,$email,$phone_number,$gender,$country,$qualification,$interest=[],$university,$password,$password_confirmation;


    protected $rules = [
        'photo'=>'nullable|mimes:jpg,webp,png,jpeg',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'gender' => 'required',
        'country' => 'required',
        'qualification' => 'required',
        'university' => 'required',
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

        $this->interest_all=Interest::all();

        #user details
        $userDetails=UsersTables::where('id',auth()->guard('web')->user()->id)->first();

        $names = explode(" ", $userDetails->full_name);
        $this->first_name=$names[0];
        $this->last_name=$names[1];
        $this->email=$userDetails->email;
        $this->phone_number=$userDetails->phone_number;

    }

  
    #update profile php
    public function UpdateProfile(){

        #dd(count($this->interest));
        #dd($this->first_name);

         
        $this->validate();

        try{

            $userDetails=UsersTables::where('id',auth()->guard('web')->user()->id)->first();

             #check interest selection
            if(count($this->interest)===0){
                session()->flash('interest','Please select at least 1 interest of choice');
            }

            elseif($userDetails and  Hash::check($this->password, $userDetails->password)){

              
              #check if profile image exisit
              $profileImage=$userDetails->profile_image;

               #dd($this->photo);

              #url 
              if(!$this->photo==null){
                  $fileurl=$this->photo->store('/', 'profile_photo');
                  $awsurl="https://myprojkonnect-s3bucket.s3.amazonaws.com/profile_images/";

                  $awsphotolink=$awsurl.$fileurl;
              }
              else{
                  $awsphotolink=$profileImage;
              }

              #update profile
               $updateProfile=UsersTables::where('id',auth()->guard('web')->user()->id)->update([
                'full_name' => $this->first_name." ".$this->last_name,
                'email' => $this->email,
                'country_id' => $this->country,
                'phone_number'=>$this->phone_number,
                'profile_image' => $awsphotolink,
                'university' => $this->university,
                'fcm_token'=>''
               ]);

               #qualifications update
               $updatequalificationOrInsert=UserQualifications::where('user_id',auth()->guard('web')->user()->id)->first();
               if($updatequalificationOrInsert){
                    $updatequalification=UserQualifications::where('user_id',auth()->guard('web')->user()->id)->update([
                        'qualification_id'=>$this->qualification
                    ]);
               }
               else{

                  #insert into qualification
                  $createQualification=UserQualifications::create([
                       'user_id'=>auth()->guard('web')->user()->id,
                       'qualification_id'=>$this->qualification
                  ]);
               }

                #Loop through selected interests
                $userId = auth()->guard('web')->user()->id;
                $selectedInterests = $this->interest;

                $existingInterests = UserInterest::where('user_id', $userId)->pluck('interest_id')->toArray();

                $interestsToDelete = array_diff($existingInterests, $selectedInterests);
                $interestsToInsert = array_diff($selectedInterests, $existingInterests);

                if (!empty($interestsToDelete)) {
                    UserInterest::where('user_id', $userId)
                        ->whereIn('interest_id', $interestsToDelete)
                        ->forceDelete();
                }

                foreach ($interestsToInsert as $interestId) {
                    UserInterest::create([
                        'user_id' => $userId,
                        'interest_id' => $interestId
                    ]);
                }

               #successfully updated 
               session()->flash('success','Profile Updated Successfully');
               return redirect('/student-profile');
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
        return view('livewire.student-profile');
    }
}

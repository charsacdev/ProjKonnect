<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\ContactUs;
use App\Models\Contact_Us;

class Contact extends Component
{
    #public variables
    public $name,$email,$phone,$inquiry,$message;

    #send contact us message
    public function SendMessage(){

        try{
            $sendMessage=Contact_Us::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'inquiry'=>$this->inquiry,
                'message'=>$this->message,
                'status'=>'0',
           ]);
           if($sendMessage){
                $username=$this->name;
                $useremail=$this->email;
               
                #notify the user and other admins connected
                Mail::to($useremail)->send(new ContactUs($username,$useremail));

                session()->flash('success','Message successfully sent to Projkonnect Team');
                return redirect('contact');
           }
        }
        catch(\Throwable $g){
            dd($g->getMessage());
            session()->flash('success','Sorry there was a network error try again.');
            return redirect('contact');
        }
         
    }

    public function render()
    {
        return view('livewire.contact');
    }
}

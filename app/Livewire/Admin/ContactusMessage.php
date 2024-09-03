<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact_Us;
use App\Mail\ContactUsReply;
use Illuminate\Support\Facades\URL;

class ContactusMessage extends Component
{
    #public variables
    public $lastSegment;

    #Contact Us Reply Wire Models
    public $name,$email,$phone,$inquiry,$message,$answer;

    public function mount(){
        $url = URL::current(); 
        $this->lastSegment = base64_decode(basename($url));

        #message details fetched
        $messageDetails=Contact_Us::where(['id'=>$this->lastSegment])->first();
        $this->name=$messageDetails->name;
        $this->email=$messageDetails->email;
        $this->phone=$messageDetails->phone;
        $this->inquiry=$messageDetails->inquiry;
        $this->message=$messageDetails->message;
    }


    #send contact us message
    public function SendMessage(){

        try{
            $updateMessage=Contact_Us::where(['id'=>$this->lastSegment])->update([
                'status'=>'1',
           ]);
           if($updateMessage){

                $username=$this->name;
                $useremail=$this->email;
                $answermessage=$this->answer;
               
                #notify the user and other admins connected
                Mail::to($useremail)->send(new ContactUsReply($username,$useremail,$answermessage));

                session()->flash('success','Message successfully sent');
                return redirect('admin-projkonnect/contact-us');
           }
        }
        catch(\Throwable $g){
            #dd($g->getMessage());
            session()->flash('error','Sorry there was a network error try again.');
            return redirect('admin-projkonnect/contact-us');
        }
         
    }


    public function render()
    {
        return view('livewire.admin.contactus-message');
    }
}

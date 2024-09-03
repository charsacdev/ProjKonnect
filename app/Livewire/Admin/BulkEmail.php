<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\UsersTables;
use App\Mail\Bulk_Email;

class BulkEmail extends Component
{
    public $addresses,$content;

    #send contact us message
    public function SendMessage(){
        try{
            if($this->addresses===null){
                session()->flash('error','Please send a broadcast audience');
               
            }
            elseif($this->addresses==="student"){
                #send message to studdnets
                $bulkMessage=UsersTables::where(['user_type'=>$this->addresses])->get();
                if($bulkMessage){

                    foreach ($bulkMessage as $user) {
                       
                        $username=$user->full_name;
                        $useremail=$user->email;
                        $answermessage=$this->content;
                        Mail::to($useremail)->send(new Bulk_Email($username,$useremail,$answermessage));
    
                    }
                        session()->flash('success','Message successfully sent to all Students');
                        return redirect('admin-projkonnect/bulk-email');
                }
            }
            elseif($this->addresses==="proguide"){
                #send message to proguide
                $bulkMessage=UsersTables::where(['user_type'=>$this->addresses])->get();
                if($bulkMessage){

                    foreach ($bulkMessage as $user) {
                       
                        $username=$user->full_name;
                        $useremail=$user->email;
                        $answermessage=$this->content;
                        Mail::to($useremail)->send(new Bulk_Email($username,$useremail,$answermessage));
    
                    }
                        session()->flash('success','Message successfully sent to all Proguides');
                        return redirect('admin-projkonnect/bulk-email');
                }
            }
            elseif($this->addresses==="employer"){
                #send message to employer
                $bulkMessage=UsersTables::where(['user_type'=>$this->addresses])->get();
                if($bulkMessage){

                    foreach ($bulkMessage as $user) {
                       
                        $username=$user->full_name;
                        $useremail=$user->email;
                        $answermessage=$this->content;
                        Mail::to($useremail)->send(new Bulk_Email($username,$useremail,$answermessage));
    
                    }
                        session()->flash('success','Message successfully sent to all Employers');
                        return redirect('admin-projkonnect/bulk-email');
                }
            }
            else{
                #send message to all users
                $bulkMessage=UsersTables::all();
                if($bulkMessage){

                    foreach ($bulkMessage as $user) {
                       
                        $username=$user->full_name;
                        $useremail=$user->email;
                        $answermessage=$this->content;
                    
                        Mail::to($useremail)->send(new Bulk_Email($username,$useremail,$answermessage));
    
                    }
                        session()->flash('success','Message successfully sent to all Users');
                        return redirect('admin-projkonnect/bulk-email');
                }
            }
            
        }
        catch(\Throwable $g){
            dd($g->getMessage());
            session()->flash('error','Sorry there was a network error try again.');
            return redirect('admin-projkonnect/bulk-email');
        }
         
    }

    public function render()
    {
        return view('livewire.admin.bulk-email');
    }
}

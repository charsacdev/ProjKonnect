<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\AdminWebTable;

class CreatAuthor extends Component
{
    #public variables 
    public $fname,$lname,$email,$gender,$role;

    #mount function
    public function mount(){

    }

    #add new Author
    public function AddAuthor(){

        #dd($this->fname);
        
        try{

             $newAdmin=AdminWebTable::create([
                'first_name'=>$this->fname,
                'last_name'=>$this->lname,
                'role'=>$this->role,
                'email'=>$this->email,
                'phone'=>'',
                'profile_photo'=>'',
                'gender'=>$this->gender,
                'country'=>'',
                'qualification'=>'',
                'university'=>'',
                'password'=>'',
                'status'=>'active',
             ]);
             if($newAdmin){
                session()->flash('success','A role has been assigned to new admin Successfully');
                return redirect('admin-projkonnect/author');
             }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured please try again');
            return redirect('admin-projkonnect/author');
             #dd($g->getMessage());
        }
      
    }

    public function render()
    {
        return view('livewire.admin.creat-author');
    }
}

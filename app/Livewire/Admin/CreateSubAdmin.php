<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\AdminWebTable;
use App\Mail\NewAdminAccount;

class CreateSubAdmin extends Component
{
    #public variables 
    public $fname,$lname,$email,$gender,$role;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:admin_web_tables',
        'gender' => 'required',
        'role' => 'required',
        
    ];

    public function updated($propertyName){

        $this->validateOnly($propertyName);
      
    }

    #mount function
    public function mount(){

    }

    #add new Author
    public function AddAuthor(){
        
        $this->validate();
      
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

               
                $username=$this->fname." ".$this->lname;
                $useremail=$this->email;
                $role=$this->role;
                Mail::to($useremail)->send(new NewAdminAccount($username,$useremail,$role));

                session()->flash('success','A role has been assigned to new admin Successfully');
                return redirect('admin-projkonnect/admins');
             }
        }
        catch(\Throwable $g){
            #session()->flash('error','An error occured please try again');
            #return redirect('admin-projkonnect/admins');
            dd($g->getMessage());
        }
      
    }


    public function render()
    {
        return view('livewire.admin.create-sub-admin');
    }
}

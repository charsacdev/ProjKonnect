<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;
use App\Models\AdminWebTable;
use App\Mail\AdminActivateEmail;
use App\Mail\AdminBlockEmail;


class AdminSubadmin extends Component
{
    protected $listeners = ['UpdateAdmin'];
    
    #mount function
    public $allAdmins,$adminInfo;

    public function mount(){
        
       $this->allAdmins=AdminWebTable::all();
    }

    #add new Author
    public function UpdateAdmin($value){
         $this->adminInfo=AdminWebTable::where(['id'=>$value])->first();
          #dd($this->adminInfo);
    }

    #Actiatev Admin
    public function ActivateAdmin($id){
        try{
           #dd($id);
            $Activateadmin=AdminWebTable::where(['id'=>$id])->update([
                'status'=>'active'
            ]);
            if($Activateadmin){

                $user=AdminWebTable::where(['id'=>$id])->first();
                $username=$user->first_name." ".$user->last_name;
                $useremail=$user->email;
                Mail::to($useremail)->send(new AdminActivateEmail($username,$useremail));

                session()->flash('success','Account Activated successfully');
                return redirect('admin-projkonnect/admins');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','A network error occured try again');
            return redirect('admin-projkonnect/admins');
        }
           
    }
    
    #Block Admin
    public function BlockAdmin($id){
        try{
               #dd($id);
                $Activateadmin=AdminWebTable::where(['id'=>$id])->update([
                    'status'=>'blocked'
                ]);
                if($Activateadmin){

                    $user=AdminWebTable::where(['id'=>$id])->first();
                    $username=$user->first_name." ".$user->last_name;
                    $useremail=$user->email;
                    Mail::to($useremail)->send(new AdminBlockEmail($username,$useremail));

                    session()->flash('success','Account Deactivated successfully');
                    return redirect('admin-projkonnect/admins');
                }

        }
        catch(\Throwable $g){
            session()->flash('error','A network error occured try again');
            return redirect('admin-projkonnect/admins');
        }
        
       
    }

    public function render()
    {
        return view('livewire.admin.admin-subadmin');
    }
}

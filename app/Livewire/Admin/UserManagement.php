<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersTables;
use App\Models\UserwebPlans;
use App\Mail\UserActiveEmail;
use App\Mail\UserBlockEmail;


class UserManagement extends Component
{
    protected $listeners = ['UserUpdate'];

    public $allUsers,$userInfo;

    public function mount(){

        $this->allUsers=UsersTables::with(['plans'])->get();

        #subscription table
        // $this->allUsers=UsersTables::with(['plans' => function ($query) {
        //     $query->where('plan_status','active')->get();
        // }])->get();
        

    }

    public function UserUpdate($value){
        $this->userInfo=UsersTables::where(['id'=>$value])->first();
    }


    #Actiatev Admin
    public function ActivateUser($id){
        try{
           #dd($id);
            $Activateuser=UsersTables::where(['id'=>$id])->update([
                'status'=>'active'
            ]);
            if($Activateuser){

                $user=UsersTables::where(['id'=>$id])->first();
                $username=$user->full_name;
                $useremail=$user->email;
                Mail::to($useremail)->send(new UserActiveEmail($username,$useremail));

                session()->flash('success','Account Activated successfully');
                return redirect('admin-projkonnect/user-management');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','A network error occured try again');
            return redirect('admin-projkonnect/user-management');
        }
           
    }
    
    #Block Admin
    public function BlockUser($id){
        try{
               #dd($id);
                $Blockuser=UsersTables::where(['id'=>$id])->update([
                    'status'=>'blocked'
                ]);
                if($Blockuser){

                    $user=UsersTables::where(['id'=>$id])->first();
                    $username=$user->full_name;
                    $useremail=$user->email;
                    Mail::to($useremail)->send(new UserBlockEmail($username,$useremail));

                    session()->flash('success','Account Deactivated successfully');
                    return redirect('admin-projkonnect/user-management');
                }

        }
        catch(\Throwable $g){
            dd($g->getMessage());
            #session()->flash('error','A network error occured try again');
            #return redirect('admin-projkonnect/user-management');
        }
        
       
    }

    public function render()
    {
        return view('livewire.admin.user-management');
    }
}

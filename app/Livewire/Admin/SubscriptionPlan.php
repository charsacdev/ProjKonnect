<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersTables;
use App\Models\UserwebPlans;


class SubscriptionPlan extends Component
{
    protected $listeners = ['UserUpdate'];

    public $allUsers,$userInfo;

    public function mount(){

        #subscription table
        $this->allUsers=UserwebPlans::with(['users'])->where('plan_status','active')->get();
   

    }

    public function UserUpdate($value){
        $this->userInfo=UsersTables::where(['id'=>$value])->first();
    }


    public function render()
    {
        return view('livewire.admin.subscription-plan');
    }
}

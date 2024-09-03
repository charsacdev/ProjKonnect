<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTables;

class Dashboard extends Component
{
    #variables 
    public $students,$proguide,$employer,$revenue,$allUsers;

    public function mount(){

         $this->students=UsersTables::where(['user_type'=>'student'])->count();
         $this->proguide=UsersTables::where(['user_type'=>'proguide'])->count();
         $this->employer=UsersTables::where(['user_type'=>'employer'])->count();
         $this->allUsers=UsersTables::with(['plans' => function ($query) {
            $query->where('plan_status','active')->latest()->first();
        }])->latest()->limit(10)->get();

        #dd($this->allUsers);
    }

     #Edit Blog
     public function EditBlog($id){
        dd($id);
    }


    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}

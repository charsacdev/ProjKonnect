<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Models\studentPitchModel;
use App\Models\UsersTables;


class StudentPitch extends Component
{

    #Pitch Details
    public $allPitches,$PostId,$title;

    protected $listeners = ['EditPitch'];

    public function mount(){

           $this->allPitches=studentPitchModel::where('user_id',auth()->guard('web')->user()->id)->get();
    }


    #Edit Pitch
    public function EditPitch($value){
        #dd($value);
        try{
        
           #Student Pitch
            $StudentPitch=studentPitchModel::where(['id'=>$value])->first();
            
            $data=json_decode($StudentPitch->pitch_details,true);

            $this->title=$data['title'];

            $this->PostId=$value;
            
        }
        catch(\Throwable $g){
            //do nothing
        }
        
    }

    public function render()
    {
        return view('livewire.student-pitch');
    }
}

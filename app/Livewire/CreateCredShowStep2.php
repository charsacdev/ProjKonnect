<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use App\Models\UsersTables;
use App\Models\studentCredShow;
use Livewire\WithFileUploads;

class CreateCredShowStep2 extends Component
{
    use WithFileUploads;

    public $skills = [];


    public function mount()
    {
        #Initialize with an empty skill entry if needed
        $this->skills = [
            ['skill' => '', 'level' => '']
        ];
    }

    public function addSkill()
    {
       
        #Add a new skill entry with default values
        $this->skills[] = [
            'skill' => '',
            'level' => ''
        ];
    }


    public function Credshow2(){
        try{

            foreach ($this->skills as $skill) {
                if (!empty($skill['skill']) && !empty($skill['level'])) {
    
                        #handle empty credshow
                        $emptyData=[
                            "data"=>""
                        ];
    
                       $updateCredShow=studentCredShow::where(['user_id'=>auth()->guard('web')->user()->id,'credshow_status'=>'pending'])->update([
                        'user_id'=>auth()->guard('web')->user()->id,
                        'credshow_step2'=>json_encode($this->skills),
                        'credshow_step3'=>json_encode($emptyData),
                        'credshow_step4'=>json_encode($emptyData),
                        'credshow_link'=>'',
                        'credshow_status'=>'pending',
                        'credshow_lasturl'=>'create-cred-show-step2',
                    ]);
                    if($updateCredShow){
    
                        return redirect('/create-cred-show-step3');
                    }
    
                }
            }
    
            // Clear the skills array after saving
            $this->skills = [];
        }
        catch(\Throwable $g){
            #dd($g->getMessage());
            #session()->flash('error',"Network Error please try again");
         }

        
    }


    public function render()
    {
        return view('livewire.create-cred-show-step2');
    }
}

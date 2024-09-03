<?php

namespace App\Livewire\Employer;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\InternTable;
use App\Models\Intern_Application;
use App\Models\Intern_Contract;
use App\Models\Intern_task_result;
use App\Models\Intern_task;
use Livewire\WithFileUploads;

class InternshipConnect extends Component
{
    #Intership List
    public $internRoles,$internSelected,$internShortlisted,$internRejected;

    #Intern Role Table
    public $InterTable;

    protected $listeners = ['InternPopup'];

    public $PostId,$role;

    public function mount(){

        
        $this->internRoles=InternTable::with(['internApplication'])->where(['employer_id'=>auth()->guard('web')->user()->id])->count();
        
        $this->internSelected = InternTable::where('employer_id', auth()->guard('web')->user()->id)
            ->whereHas('internApplication', function ($query) {
                $query->where('status', 'selected');
            })
            ->count();
        
        $this->internShortlisted=InternTable::where('employer_id', auth()->guard('web')->user()->id)
            ->whereHas('internApplication', function ($query) {
                $query->where('status', 'shortlisted');
            })
            ->count();
            
        $this->internRejected=InternTable::where('employer_id', auth()->guard('web')->user()->id)
            ->whereHas('internApplication', function ($query) {
                $query->where('status', 'rejected');
            })
            ->count();
        
        $this->InterTable=InternTable::with(['internApplication'])
        ->where(['employer_id'=>auth()->guard('web')->user()->id])
        ->withCount(['internApplication' => function ($query) {
            $query->where('status', 'pending');
        }])
        ->withCount(['internSelected' => function ($query) {
            $query->where('status', 'selected');
        }])
        ->get();

        
        #dd($this->internRoles);
    }


     #InternpopUp
     public function InternPopup($value){
        try{
            #Intern Popup
            $intern=InternTable::where(['id'=>$value])->first();

            $this->role=$intern->role;

            $this->PostId=$value;
            
        }
        catch(\Throwable $g){
            //do nothing
            #dd('error');
        } 
    }


    #InternpopUp
    public function DeleteIntern($value){
        try{
            #Intern Popup
            $internDelete=InternTable::where(['id'=>$value])->delete();
            if($internDelete){
                session()->flash('error','Internship deleted successfully');
                return redirect('/employer/internship-connect');
            } 
        }
        catch(\Throwable $g){
            //do nothing
            #dd('error');
        } 
    }

    

    public function render()
    {
        return view('livewire.employer.internship-connect');
    }
}

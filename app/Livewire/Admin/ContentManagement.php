<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\FaqContent;
use App\Models\TermsTable;
use Illuminate\Support\Facades\URL;

class ContentManagement extends Component
{
    #public variables
    public $allfaqs,$terms;

    public function mount(){
          $this->allfaqs=FaqContent::all();

          $this->terms=TermsTable::find(1)->first()->terms;

          
    }


    #Adding new terms and conditions
    public function newTerms(){
        try{
          
            $checkTerms=TermsTable::find(1);

            if($checkTerms){
                $updateterms=TermsTable::where('id',1)->update([
                    'terms'=>$this->terms
                ]);
                if($updateterms){
                    session()->flash('success','Terms updated successfully');
                    return redirect('admin-projkonnect/content-management');
                }
            }
            else{
    
                $newterms=TermsTable::create([
                    'terms'=>$this->terms
                ]);
                if($newterms){
                    session()->flash('success','Terms added successfully');
                    return redirect('admin-projkonnect/content-management');
                }
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured please try again');
            return redirect('admin-projkonnect/content-management');
            #dd($g->getMessage());
        }
        
       
    }


    #Delete Faq
    public function DeleteFaq($id){
        
        $Deletefaq=FaqContent::where(['id'=>$id])->delete();
        if($Deletefaq){
            session()->flash('success','Faq Deleted successfully');
            return redirect('admin-projkonnect/content-management');
        }
       
    }


    public function render()
    {
        return view('livewire.admin.content-management');
    }
}

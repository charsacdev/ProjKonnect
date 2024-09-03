<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FaqContent;
use App\Models\TermsTable;

class FaqHome extends Component
{
    #public variables 
    public $faqhome;

    public function mount(){
        $this->faqhome=FaqContent::all();
    }

    public function render()
    {
        return view('livewire.faq-home');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FaqContent;
use App\Models\TermsTable;

class TermsHome extends Component
{
    #public variables
    public $terms;

    public function mount(){
        $this->terms=TermsTable::where(['id'=>1])->first();
    }

    public function render()
    {
        return view('livewire.terms-home');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class Homeblogpost extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $AllblogPost,$paginate;

    public function mount(){

        $this->paginate="12";

        $this->AllblogPost=Blog::all();
    }

    public function render()
    {
        $allblogs=Blog::paginate($this->paginate);
        return view('livewire.homeblogpost',['allblogs'=>$allblogs]);
    }
}

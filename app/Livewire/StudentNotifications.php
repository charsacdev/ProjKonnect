<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Allnotification;
use Illuminate\Support\Facades\Auth;

class StudentNotifications extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $paginate;

    public function mount(){

        $this->paginate="10";
    }

    #Mark all as read
    public function MarkRead(){

        $userId=auth()->guard('web')->user()->id;
        $notification = Allnotification::where('user_id', $userId)->update([
          'is_read'=>1
        ]);
    }

    public function render()
    {
        $userId=auth()->guard('web')->user()->id;
        $notification = Allnotification::where('user_id', $userId)->latest()->paginate($this->paginate);

        return view('livewire.student-notifications',['notification'=>$notification]);
    }
}

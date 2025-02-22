<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashBoardMenu extends Component
{
    public $userProfile;
    public function mount(){
        $this->userProfile = Auth::user()->profile;
    }
    public function render()
    {
        return view('livewire.dash-board-menu');
    }
    
}
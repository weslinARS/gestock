<?php

namespace App\Livewire;

use Livewire\Component;

class NavLinkButton extends Component
{
    public string $route ;
    public string $label;

    public function __construct( string $route, string $label){
        $this->route = $route;
        $this->label = $label;
    }
    public function goToRoute(string $route){
        return redirect()->route($route);
    }
    public function render()
    {
        return view('livewire.nav-link-button');
    }
}
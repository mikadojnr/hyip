<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FaqsComponent extends Component
{
    public function render()
    {
        return view('livewire.faqs-component')->layout('layouts.base');
    }
}

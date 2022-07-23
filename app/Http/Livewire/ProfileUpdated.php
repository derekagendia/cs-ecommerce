<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileUpdated extends Component
{
    public function render()
    {
        return view('livewire.profile-updated')
            ->extends('layouts.app')->section('content');
    }
}

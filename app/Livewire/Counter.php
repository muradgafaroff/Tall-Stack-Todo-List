<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 10; // Başlanğıc dəyəri

    public function increment()
    {
        $this->count++; // Düyməyə basanda rəqəmi artır
    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function resetCounter()
    {
        $this->count = 0; // Rəqəmi sıfıra endiririk
    }
}
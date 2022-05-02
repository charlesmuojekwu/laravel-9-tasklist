<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Step extends Component
{

    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($index) 
    {
      
        unset($this->steps[$index]);
        //dd($this->steps);
    }

    public function render()
    {
        return view('livewire.step');
    }

    
}

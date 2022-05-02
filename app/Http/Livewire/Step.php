<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Step extends Component
{

    public $steps = [];

    public function increment()
    {
        $this->steps[] = count($this->steps)+1;
    }

    public function remove($index) 
    {
       
        unset($this->steps[$index]);

      
    }

    public function render()
    {
        return view('livewire.step');
    }

    
}

<?php

namespace App\Livewire\Tables;

use App\Models\Table;
use Livewire\Component;

class Create extends Component
{
    public function createTable() {
        $tables = Table::all();

        if (count($tables) > 10) {
            $tables = Table::latest()->first();
            
            Table::create();
    
            $this->dispatch('createdTable');
        } else {
            $this->dispatch('alert', type: "error", text: 'no se pueden crear más mesas');
        }
    }
    public function render()
    {
        return view('livewire.tables.create');
    }
}

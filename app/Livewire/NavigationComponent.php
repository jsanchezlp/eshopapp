<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Category;

class NavigationComponent extends Component
{
    public function render()
    {

        $categories = Category::all();

        return view('livewire.navigation-component', compact('categories'));
    }
}

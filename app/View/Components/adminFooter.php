<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class adminFooter extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;

    public function __construct($categories = null)
    {
        $this->categories = $categories ?? collect();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-footer');
    }
}

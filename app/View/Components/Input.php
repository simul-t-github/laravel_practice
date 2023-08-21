<?php

namespace App\View\Components;

use Closure;
use Dotenv\Parser\Value;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $demo;
    public $id;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $name, $label, $value = '', $id = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}

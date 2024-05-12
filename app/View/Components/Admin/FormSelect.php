<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect extends Component
{
    public $label;
    public $name;
    public $options;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $options)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form-select');
    }
}

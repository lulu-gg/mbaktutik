<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormImageUpload extends Component
{
    public $label;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->name = $name;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form-image-upload');
    }
}

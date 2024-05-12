<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTitle extends Component
{
    public $page;
    public $title;
    public bool $isCreate;
    public bool $isEdit;

    /**
     * Create a new component instance.
     */
    public function __construct($page, $title = null, $isCreate = false, $isEdit = false)
    {
        $this->page = $page;
        $this->title = $title;
        $this->isCreate = $isCreate;
        $this->isEdit = $isEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.page-title');
    }
}

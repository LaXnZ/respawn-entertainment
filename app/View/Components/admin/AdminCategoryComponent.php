<?php

namespace App\View\Components\admin;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::orderBy('name','ASC')->paginate(10);
        return view('/admin/category/admin-category-component', ['categories'=>$categories]);
    }
}

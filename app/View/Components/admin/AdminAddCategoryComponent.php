<?php

namespace App\View\Components\admin;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\View\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    
    // public function updated($fields){
    //     $this->validateOnly($fields,[
    //         'name' => 'required',
    //         'slug' => 'required|unique:categories'
    //     ]);
    // }
    
    public function storeCategory(){

        // $this->validate([
        //     'name' => 'required',
        //     'slug' => 'required|unique:categories'
        // ]);
        
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','Category has been created successfully!');
        
    } 

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('/admin/category/admin-add-category-component');
    }
}
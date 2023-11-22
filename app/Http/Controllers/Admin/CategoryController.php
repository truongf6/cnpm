<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new Category())::query();
        $this->route_prefix = 'admin.categories.';
    }

    public function index() {
        $categories = $this->model->where('deleted_at')->get();

        return view($this->route_prefix.'index', [
            'categories' => $categories,
        ]);
    }


    public function create()
    {
        return view($this->route_prefix.'create');
    }


    public function store(StoreRequest $category)
    {
        Category::create($category->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function edit(Category $category)
    {
        return view($this->route_prefix.'edit', [
            'category' => $category
        ]);
    }


    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function destroy(Category $category)
    {
        $category->deleted_at = Carbon::now();
        $category->update();

        return redirect()->route($this->route_prefix.'index');
    }
}

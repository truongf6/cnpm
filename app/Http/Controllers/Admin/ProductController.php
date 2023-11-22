<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new Product())::query();
        $this->route_prefix = 'admin.products.';
    }

    public function index() {
        $products = $this->model->where('deleted_at')->get();

        return view($this->route_prefix.'index', [
            'products' => $products,
        ]);
    }


    public function create()
    {
        $categories = Category::query()->where('deleted_at')->get();

        return view($this->route_prefix.'create', [
            'categories' => $categories,
        ]);
    }


    public function store(StoreRequest $product)
    {
        $this->model->create($product->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function edit(Product $product)
    {
        $categories = Category::query()->where('deleted_at')->get();

        return view($this->route_prefix.'edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }


    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function destroy(Product $product)
    {
        $product->deleted_at = Carbon::now();
        $product->update();

        return redirect()->route($this->route_prefix.'index');
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $pagination = 9;
        $category_id = request()->category;
        $search  =request()->s;
        $categories = Category::query()->where('isActive', true)
                        ->where('deleted_at')->get();

        if ($category_id) {
            $category = Category::query()->where('isActive', true)
                            ->where('deleted_at')
                            ->find($category_id);
            $products = Product::query()->where('isActive', true)
                        ->where('deleted_at')
                        ->where('category_id', $category_id);

            $category_name = $category->name;
        } else {
            $products = Product::query()->where('isActive', true)
                        ->where('deleted_at');
            $category_name = 'Tất cả';
        }

        if ($search) {
            $products = $products->where('name', 'LIKE', "%$search%");
        }

        $products = $products->paginate($pagination);
        $products->appends([
            's' => $search
        ]);

        return view('client.shop.index', [
            'categories' => $categories,
            'products' => $products,
            'category_name' => $category_name,
        ]);
    }

    public function show($product_id) {
        $product = Product::find($product_id);
        $related_products = Product::all()->random(4);

        return view('client.shop.show', [
            'product' => $product,
            'related_products' => $related_products,
        ]);
    }
}

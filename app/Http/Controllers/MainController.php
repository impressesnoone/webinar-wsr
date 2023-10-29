<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        $products = Product::all()
            ->where('is_published', '1')
            ->sortByDesc('created_at');
        $categories = Category::all();
        return view('main', compact('products', 'categories'));
    }
}

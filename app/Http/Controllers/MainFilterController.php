<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainFilterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $categories = Category::all();
        $products = [];
        if($request->category_id || $request->filter){
            switch ($request->filter){
                case 'new':
                    $products = Product::all()->sortByDesc('created_at')->values();
                    break;
                case 'year':
                    $products = Product::all()->sortBy('release_year')->values();
                    break;
                case 'name':
                    $products = Product::all()->sortBy('title')->values();
                    break;
                case 'cost':
                    $products = Product::all()->sortBy('cost')->values();
                    break;
            }
            if($request->category_id !== 'all'){
                $products = $products->where('category_id', $request->category_id);
            }
        }
        $products = $products->where('is_published', '1');
        return view('main', compact('products', 'categories'));
    }
}

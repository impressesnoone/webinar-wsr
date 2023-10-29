<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainShowController extends Controller
{
    public function __invoke($id)
    {
        $product = Product::find($id);
        return view('main', compact('product'));
    }
}

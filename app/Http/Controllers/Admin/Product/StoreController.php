<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        $photo_url = Storage::putFile('public/photos', $request->photo_url);
        $photo_url = substr($photo_url, 7);
        Product::create([
            'category_id' => $request->category_id,
            'photo_url' => $photo_url,
            'title' => $request->title,
            'cost' => $request->cost,
            'country' => $request->country,
            'release_year' => $request->release_year,
            'model' => $request->model,
        ]);
        return redirect()->route('admin.product.index');
    }
}

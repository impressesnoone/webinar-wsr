<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(ProductRequest $request, $id)
    {
        $photo_url = Storage::putFile('public/photos', $request->photo_url);
        $photo_url = substr($photo_url, 7);
        $product = Product::find($id);
        $product->update([
            'category_id' => $request->category_id,
            'count' => $request->count,
            'is_published' => $request->is_published,
            'photo_url' => $photo_url,
            'title' => $request->title,
            'cost' => $request->cost,
            'country' => $request->country,
            'release_year' => $request->release_year,
            'model' => $request->model,
        ]);
        return redirect()->route('admin.product.show', $product->id);
    }
}

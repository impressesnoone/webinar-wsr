<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        Product::where('category_id', $category->id)
            ->update(['category_id' => NULL]);
        $category->delete();
        return redirect()->route('admin.category.index')->with('msg', 'Категория ' . $title . ' успешно удалена!');
    }
}

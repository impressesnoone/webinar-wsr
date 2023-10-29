<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(CategoryRequest $request)
    {
        Category::create([
            'title' => $request->title
        ]);
        return redirect()->route('admin.category.index')->with('msg', 'Категория ' . $request->title . ' успешно добавлена!');
    }
}

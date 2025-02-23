<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryServices
{
    public function index()
    {
        return Cache::remember('categories', 600, function () {
            return Category::all();
        });
    }

    public function show($id)
    {
        return Cache::remember("category_{$id}", 600, function () use ($id) {
            return Category::findOrFail($id);
        });
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        Cache::forget('categories'); // Cache'ni tozalash
        return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        Cache::forget('categories');
        Cache::forget("category_{$id}");
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Cache::forget('categories');
        Cache::forget("category_{$id}");
    }
}

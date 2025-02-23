<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class CategoryServices
{
    public function index()
    {
        $userId = Auth::id();
        return Cache::remember("categories_user_{$userId}", 600, function () use ($userId) {
            return Category::where('user_id', $userId)->get();
        });
    }

    public function show($id)
    {
        $userId = Auth::id();
        return Cache::remember("category_{$id}_user_{$userId}", 600, function () use ($id, $userId) {
            return Category::where('id', $id)->where('user_id', $userId)->firstOrFail();
        });
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create(array_merge(
            $request->validated(),
            ['user_id' => Auth::id()]
        ));
        
        Cache::forget("categories_user_" . Auth::id());
        return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $category->update($request->all());

        Cache::forget("categories_user_" . Auth::id());
        Cache::forget("category_{$id}_user_" . Auth::id());
        
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $category->delete();

        Cache::forget("categories_user_" . Auth::id());
        Cache::forget("category_{$id}_user_" . Auth::id());
    }
}

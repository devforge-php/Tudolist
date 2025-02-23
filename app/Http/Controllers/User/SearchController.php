<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tudolist;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json(['message' => 'Query parameter is required'], 400);
        }

        // Cache key yaratish (qidiruv so‘roviga bog‘liq holda)
        $cacheKey = "search_{$query}";

        $results = Cache::remember($cacheKey, 60, function () use ($query) {
            $categories = Category::where('name', 'like', "%{$query}%")->get();
            $tudolists = Tudolist::where('name', 'like', "%{$query}%")->get();

            return [
                'categories' => $categories,
                'tudolists' => $tudolists,
            ];
        });

        return response()->json($results);
    }
}

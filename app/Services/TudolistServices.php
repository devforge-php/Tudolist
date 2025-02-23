<?php

namespace App\Services;

use App\Http\Requests\TudolistRequest;
use App\Models\Tudolist;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class TudolistServices
{
    public function index()
    {
        $userId = Auth::id();
        return Cache::remember("tudolists_user_{$userId}", 600, function () use ($userId) {
            return Tudolist::where('user_id', $userId)->get();
        });
    }

    public function show($id)
    {
        $userId = Auth::id();
        return Cache::remember("tudolist_{$userId}_{$id}", 600, function () use ($id, $userId) {
            return Tudolist::where('id', $id)->where('user_id', $userId)->firstOrFail();
        });
    }

    public function store(TudolistRequest $request)
    {
        $tudolist = Tudolist::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'text' => $request->text,
        ]);

        Cache::forget("tudolists_user_" . Auth::id()); // Cache tozalash
        return $tudolist;
    }

    public function update(TudolistRequest $request, $id)
    {
        $userId = Auth::id();
        $tudolist = Tudolist::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $tudolist->update($request->validated());

        Cache::forget("tudolists_user_{$userId}");
        Cache::forget("tudolist_{$userId}_{$id}");

        return $tudolist;
    }

    public function destroy($id)
    {
        $userId = Auth::id();
        $tudolist = Tudolist::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $tudolist->delete();

        Cache::forget("tudolists_user_{$userId}");
        Cache::forget("tudolist_{$userId}_{$id}");
    }
}

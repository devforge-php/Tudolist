<?php

namespace App\Services;

use App\Http\Requests\TudolistRequest;
use App\Models\Tudolist;
use Illuminate\Support\Facades\Cache;

class TudolistServices
{
    public function index()
    {
        return Cache::remember('tudolists', 600, function () {
            return Tudolist::all();
        });
    }

    public function show($id)
    {
        return Cache::remember("tudolist_{$id}", 600, function () use ($id) {
            return Tudolist::findOrFail($id);
        });
    }

    public function store(TudolistRequest $request)
    {
        $tudolist = Tudolist::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'text' => $request->text,
        ]);

        Cache::forget('tudolists'); // Cache tozalash
        return $tudolist;
    }

    public function update(TudolistRequest $request, $id)
    {
        $tudolist = Tudolist::findOrFail($id);
        $tudolist->update($request->validated());

        Cache::forget('tudolists');
        Cache::forget("tudolist_{$id}");

        return $tudolist;
    }

    public function destroy($id)
    {
        $tudolist = Tudolist::findOrFail($id);
        $tudolist->delete();

        Cache::forget('tudolists');
        Cache::forget("tudolist_{$id}");
    }
}

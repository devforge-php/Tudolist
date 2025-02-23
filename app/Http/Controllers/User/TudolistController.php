<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\TudolistRequest;
use App\Http\Resources\TudolistResource;
use Illuminate\Http\Request;
use App\Services\TudolistServices;
class TudolistController extends Controller
{
   public $tudolistServices;

   public function __construct(TudolistServices $tudolistServices)
   {
     $this->tudolistServices = $tudolistServices;
   }
    public function index()
    {
        $tudolist = $this->tudolistServices->index();
        return response()->json(TudolistResource::collection($tudolist));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TudolistRequest $request)
    {
        $tudolist = $this->tudolistServices->store($request);
        return response()->json(new TudolistResource($tudolist));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tudolist =  $this->tudolistServices->show($id);
        return response()->json(new TudolistResource($tudolist));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TudolistRequest $request, string $id)
    {
        $tudolist = $this->tudolistServices->update($request, $id);
        return response()->json(new TudolistResource($tudolist));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tudolist = $this->tudolistServices->destroy($id);
        return response()->json(['message' => 'deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Spice;
use App\Models\Wine;
use Illuminate\Http\Request;
use App\Http\Requests\WineRequest;
use Illuminate\Support\Facades\Storage;

class WineController extends Controller

{
    private $type;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $typeArray = ['red', 'white', 'sparkling', 'rose', 'dessert', 'port'];

        $currType = $request->type ? $request->type : 'red';
        $perPage = $request->per_page ? $request->per_page : 10;
        $wines = Wine::where('type', $request->type)->paginate($perPage)->appends(['per_page' => $perPage]);

        $wines->appends(['type' => $currType]);
        return view('wines.index', compact('wines', 'typeArray', 'currType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WineRequest $request)
    {
        $newWine = new Wine();
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_path = Storage::put('image', $request->image);
            $data['image'] = $image_path;
            // dd($data);
        }
        $newWine->fill($data);
        // dd($newWine);
        $newWine->save();
        return redirect()->route('wines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        return view('wines.show', compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        $spices = Spice::all();
        return view('wines.edit', compact('wine', 'spices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wine $wine)
    {
        $data = $request->all();
        if ($request->has('spices')) {
            $wine->spices()->sync($request->spices);
        }
        if ($request->hasFile('image')) {
            $image_path = Storage::put('image', $request->image);
            $data['image'] = $image_path;
            // dd($data);
        }
        $wine->update($data);
        return redirect()->route('wines.show', compact('wine'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wine = Wine::findOrFail($id);
        $wine->delete();

        return redirect()->route("wines.index")->with("messageDelete", "Il vino " . $wine->title . " è stato eliminato con successo!");
    }
}

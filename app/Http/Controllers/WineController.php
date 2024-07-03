<?php

namespace App\Http\Controllers;

use App\Models\Spice;
use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = $request->per_page ? $request->per_page : 10;
        $wines = Wine::paginate($perPage)->appends(['per_page' => $perPage]);
        return view('wines.index', compact('wines'));
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
    public function store(Request $request)
    {
        $newWine = new Wine();
        $data = $request->all();
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

<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $seragam = Seragam::where('name',"LIKE","%".$request->search."%")->latest()->paginate(5);
        }else {
            $seragam = Seragam::latest()->paginate(5);
        }

        return view('seragam.index', compact('seragam'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seragam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
        ]);

        Seragam::create($request->all());

        return redirect()->route('seragam.index')
            ->with('success', 'Seragam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Seragam $seragam)
    {
        return view('seragam.show', compact('seragam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Seragam $seragam)
    {
        return view('seragam.edit', compact('seragam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seragam $seragam)
    {
        $request->validate([
            'name' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
        ]);

        $seragam->update($request->all());

        return redirect()->route('seragam.index')
            ->with('success', 'seragam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seragam $seragam)
    {
        $seragam->delete();

        return redirect()->route('seragam.index')
            ->with('success', 'seragam deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $siswa = Siswa::where('name', "LIKE", "%" . $request->search . "%")->orderBy('name', 'DESC')->latest()->get();
        } else {
            $siswa = Siswa::latest()->get();
        }

        if ($request->has('sort')) {
            // echo($request->sort);
            if ($request->sort == "DESC") {
                $siswa = Siswa::orderBy('name', 'DESC')->latest()->get();
            } else if($request->sort == "ASC"){
                $siswa = Siswa::orderBy('name', 'ASC')->latest()->get();
            }
        }

        if ($request->has('filter')) {
            if ($request->filter == "Select") {
                $siswa = Siswa::latest()->get();
            } else {
                $siswa = Siswa::where('kelas', $request->filter)->latest()->get();
            }
        }

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'kelas' => 'required',
            'nis' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'nis' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'siswa deleted successfully');
    }
}

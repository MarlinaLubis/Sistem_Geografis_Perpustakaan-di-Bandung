<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;
use App\Models\Perpustakaan;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perpustakaans = Perpustakaan::all();
        return view('perpustakaans.index', [
            'perpustakaans' => $perpustakaans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpustakaans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<script>console.log('Debug Objects: " . $request->namaperpustakaan . "' );</script>";
        $perpustakaan = new Perpustakaan();
        $perpustakaan->namaperpustakaan = $request->namaperpustakaan;
        $perpustakaan->alamat = $request->alamat;
        $perpustakaan->jam = $request->jam;
        $perpustakaan->longitude = $request->longitude;
        $perpustakaan->latitude = $request->latitude;
        $perpustakaan->save();

        return redirect()->route('perpustakaans.index')->with('success', 'Data Prpustakaan Berhasil Ditambahkan');
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
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('perpustakaans.show', [
            'perpustakaan' => $perpustakaan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('perpustakaans.edit', [
            'perpustakaan' => $perpustakaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->namaperpustakaan = $request->namaperpustakaan;
        $perpustakaan->alamat = $request->alamat;
        $perpustakaan->jam = $request->jam;
        $perpustakaan->longitude = $request->longitude;
        $perpustakaan->latitude = $request->latitude;
        $perpustakaan->save();

        return redirect()->route('perpustakaans.index')->with('success', 'Data perpustakaan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $perpustakaan = Perpustakaan::findOrFail($id);
        $perpustakaan->delete();

        return redirect()->route('perpustakaans.index')->with('success', 'Data perpustkaan berhasil dihapus.');
    }

    public function welcome()
    {
        $perpustakaans = Perpustakaan::all();
        return view('welcome', [
            'perpustakaans' => $perpustakaans
        ]);
    }
}

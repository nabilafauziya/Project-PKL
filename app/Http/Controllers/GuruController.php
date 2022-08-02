<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Guru
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nip' => 'required|unique:gurus|max:255',
            'nama' => 'required',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->save();
        return redirect()->route('guru.index')
            ->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));

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
        // Validasi
        $validated = $request->validate([
            'nip' => 'required|max:255',
            'nama' => 'required',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->save();
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class TokoController extends Controller
{
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';

    public function index()
    {
        $tokos = Toko::all();
        return view('toko.index', ['tokos' => $tokos]);
    }

    public function create()
    {
        return view('toko.create');
    }

    public function store(request $request)
    {
        $toko = new Toko;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat_toko = $request->alamat_toko;
        $toko->save();

        return redirect()->route('toko.index');
    }

    public function edit($id_toko)
    {
        $toko =Toko::find($id_toko);
        return view('toko.edit', ['toko' => $toko]);
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::find($id);
    
        $toko->update([
            'nama_toko' => $request->input('nama_toko'),
            'alamat_toko' => $request->input('alamat_toko'),
        ]);
    
        return redirect()->route('toko.index')->with('success', 'Data toko berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        $toko = Toko::find($id);
        $toko->delete();
    
        return redirect()->route('toko.index')->with('success', 'Data toko berhasil dihapus');
    }
    
}

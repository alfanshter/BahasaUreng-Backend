<?php

namespace App\Http\Controllers;

use App\Models\JawabanPilihanGanda;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PilihanGandaController extends Controller
{
    public function index()
    {
        $data = PilihanGanda::all();
        return view('pilihanganda.pilihanganda', [
            'data' => $data
        ]);
    }

    public function tambah(Request $request)
    {

        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        PilihanGanda::create($validatedData);
        return redirect('/pilihanganda')->with('success', 'Tambah data berhasil');
    }

    public function delete(Request $request)
    {
        $delete = PilihanGanda::where('id', $request->id)->delete();
        Storage::disk('public')->delete($request->gambar);
        return redirect('/pilihanganda')->with('success', 'Hapus data berhasil');
    }

    public function jawaban(Request $request)
    {
        $data = JawabanPilihanGanda::where('id_pilihanganda',$request->id)->get();
        return view('jawaban_pilihanganda.jawaban_pilihanganda', [
            'data' => $data,
            'id' => $request->id,
        ]); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SoalKalimat;
use Illuminate\Http\Request;

class SoalKalimatController extends Controller
{
    public function index()
    {
        $data = SoalKalimat::all();
        return view('kalimat.kalimat',[
            'data'=> $data
        ]);
    }

    public function tambah(Request $request)
    {
        $validatedData = $request->validate([
            'soal' => 'required',
            'jawaban' => 'required'
        ]);

        $data = SoalKalimat::create($validatedData);
        return redirect('/kalimat')->with('success', 'Tambah data berhasil');

    }

    public function delete(Request $request)
    {
        SoalKalimat::where('id',$request->id)->delete();
        return back()->with('success', 'Hapus data berhasil');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'soal' => 'required',
            'jawaban' => 'required',
            'id' => 'required'
        ]);

        $data = SoalKalimat::where('id',$request->id)->update($validatedData);
        return redirect('/kalimat')->with('success', 'Update data berhasil');




    }
    
}

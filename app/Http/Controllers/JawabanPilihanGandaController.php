<?php

namespace App\Http\Controllers;

use App\Models\JawabanPilihanGanda;
use Illuminate\Http\Request;

class JawabanPilihanGandaController extends Controller
{
    public function tambah_jawaban_pilihanganda(Request $request)
    {
        $validatedData = $request->validate([
            'id_pilihanganda' => 'required',
            'jawaban' => 'required',
            'is_true' => 'required'
        ]);

        //CEk jawaban maksimal 4
        $count = JawabanPilihanGanda::where('id_pilihanganda',$request->id_pilihanganda)->count();
        if ($count >=4) {
            return redirect('/jawaban_pilihanganda/'.$request->id_pilihanganda)->with('failed', 'Jumlah soal maksimal 4');
        }
        //Cek jawaban yang benar maksimal 1
        if ($request->is_true == 1) {
            $is_true = JawabanPilihanGanda::where('id_pilihanganda',$request->id_pilihanganda)->where('is_true',1)->count();
            if ($is_true >=1) {
                return redirect('/jawaban_pilihanganda/'.$request->id_pilihanganda)->with('failed', 'Jawaban benar maksimal 1');
            }    
        }
        $data = JawabanPilihanGanda::create($validatedData);
        return redirect('/jawaban_pilihanganda/'.$request->id_pilihanganda)->with('success', 'Tambah data berhasil');

    }

    public function delete(Request $request)
    {
        JawabanPilihanGanda::where('id',$request->id)->delete();
        return back()->with('success', 'Hapus data berhasil');
    }
    
}

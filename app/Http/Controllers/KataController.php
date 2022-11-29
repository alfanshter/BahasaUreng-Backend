<?php

namespace App\Http\Controllers;

use App\Models\KataKata;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KataController extends Controller
{
    public function index()
    {
        $data = KataKata::all();
        return view('kata.kata',[
            'data' => $data
        ]);
    }

    public function tambah_kata(Request $request)
    {
        $validatedData = $request->validate([
            'kata' => 'required',
            'bahasa' => ['required']    ]);
    
        KataKata::create($validatedData);
        return redirect('/kata')->with('success', 'Tambah data berhasil');
    }

    public function update_kata(Request $request)
    {
        $validatedData = $request->validate([
            'kata' => 'required',
            'bahasa' => ['required']    ]);
    
        KataKata::where('id',$request->id)->update($validatedData);
        return redirect('/kata')->with('success', 'Update data berhasil');
    }

    public function hapus_kata(Request $request)
    {
        KataKata::where('id',$request->id)->delete();
        return redirect('/kata')->with('success', 'hapus data berhasil');
    }

    public function index_api()
    {
        $data = KataKata::all();
        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function find(Request $request)
    {
        $kata = $request->input('kata');
        $data = KataKata::where('kata', 'like', "%$kata%")->get();
        $response = [
            'message' => 'data sebagai berikut',
            'status' => 1,
            'data' => $data
        ];
        return response()->json($response, 200);
    }
}

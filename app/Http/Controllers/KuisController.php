<?php

namespace App\Http\Controllers;

use App\Http\Requests\JawabKata;
use App\Models\JawabanPilihanGanda;
use App\Models\KataKata;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KuisController extends Controller
{
    public function kuis_kata()
    {
        $data = PilihanGanda::with(['jawaban' => function ($query) {
            $query->inRandomOrder();
        }])->get();

        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function jawab_kuis_kata(Request $request)
    {

        $pilihanganda = array_values($request->id_pilihanganda);
        $jumlahsoal = count($pilihanganda);
        $data = JawabanPilihanGanda::find(array_values($request->jawaban));
        $nilai = $data->sum('is_true');
        $nilai_total = (100/$jumlahsoal) * $nilai;
        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data,
            'nilai' => $nilai,
            'nilai_total' => $nilai_total,
            'jumlahsoal' => $jumlahsoal
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }
}

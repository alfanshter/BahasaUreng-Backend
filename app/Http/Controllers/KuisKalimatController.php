<?php

namespace App\Http\Controllers;

use App\Models\SoalKalimat;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KuisKalimatController extends Controller
{
    public function kuis_kalimat()
    {
        $data = SoalKalimat::inRandomOrder()->get();

        $response = [
            'message' => 'success',
            'sukses' => 1,
            'data' => $data
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function jawab_kalimat(Request $request)
    {
        $jumlah_soal = count($request->id_kalimat);
        $kalimat = array_combine($request->id_kalimat, $request->jawaban);
        $data_kalimat = array();
        foreach ($kalimat as $kalimats => $jawaban) {
            $data = SoalKalimat::where('id', $kalimats)->where('jawaban', $jawaban)->first();
            if ($data != null) {
                $data_kalimat[] = $jawaban;
            }
        }

        $nilai = count($data_kalimat);
        $nilai_total = (100/$jumlah_soal) * $nilai;
        $response = [
            'message' => 'success',
            'sukses' => 1,
            'nilai' => $nilai_total,
            'jumlah_soal' => $jumlah_soal

        ];

        return response()->json($response, Response::HTTP_CREATED);
    }
}

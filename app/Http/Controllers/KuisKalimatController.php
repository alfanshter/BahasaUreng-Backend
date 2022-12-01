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
}

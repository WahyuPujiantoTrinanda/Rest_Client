<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Halaman2Controller extends Controller
{
    public function index()
    {

        $suspects = collect(Http::get('https://api.siforlat.com/api/v1/prayTimes?latitude=-6.300060&longitude=106.670181&duration=100')->json());
        $suspectsData = $suspects->flatten(1);
        $imsak        = $suspectsData->pluck('imsak');
                //dd($suspectsData);
        return view('Halaman2', compact([
            'imsak'
        ]));


    }
}

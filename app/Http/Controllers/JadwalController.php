<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JadwalController extends Controller
{
    public function index()
    {
       $suspects = collect(Http::get('https://api.siforlat.com/api/v1/prayTimes?latitude=-6.300060&longitude=106.670181&duration=100')->json());
        $suspectsData = $suspects->flatten(1);
        $maghrib        = $suspectsData->pluck('maghrib');
        $isha        = $suspectsData->pluck('isha');
        //dd($suspectsData);
        return view('Jadwal', compact([
            'maghrib','isha'
        ]));

    }
}


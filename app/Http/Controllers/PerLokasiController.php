<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerLokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function perKondisi(){
//        $locations = DB::select(DB::raw("SELECT id, nama_lokasi FROM locations"));
        $locations = Location::all();
        $query_per_lokasi = array();
        $activeLocation = array();
        $i = 0;

        foreach ($locations as $location){
            $query = $this->chartKondisiPerLokasi($location->id);
            if (!empty($query)){
                $query_per_lokasi[$i] = $query;
                $activeLocation[$i] = $location->nama_lokasi;
                $i++;
            }
            else
                break;
        }

//        dd($query_per_lokasi);
//        dd($activeLocation);
//        dd($query_per_lokasi[0][0]);
        return view('perlokasi.perkondisi', [ 'query' => $query_per_lokasi, 'location' => $activeLocation ]);
    }

    public function chartKondisiPerLokasi($id_loc)
    {
        $jmlBarang = DB::select(DB::raw("SELECT kb.nama_kondisi, COUNT(a.id_kondisi) as jumlah
        FROM asets a, kondisi_barangs kb, locations l 
        WHERE a.id_kondisi=kb.id 
        AND a.id_lokasi=l.id 
        AND l.id = $id_loc
        GROUP BY kb.nama_kondisi"));

        return $jmlBarang;
    }
}
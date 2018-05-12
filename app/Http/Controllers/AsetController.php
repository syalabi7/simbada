<?php

namespace App\Http\Controllers;

use App\Aset;
use App\Category;
use App\Kondisi_barang;
use App\Location;
use App\Sumber_barang;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asets = Aset::all();
        return view('asets.index', ['datas' => $asets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $categories = Category::all();
        $sumbers = Sumber_barang::all();
        $conditions = Kondisi_barang::all();
//        $valueOfYears = array();
        $years = array();
        for($i=1995; $i <= date("Y"); $i++){
            $years[] = "".$i;
        }
        return view('asets.create',
            [
                'locations'  => $locations,
                'categories' => $categories,
                'sumbers'    => $sumbers,
                'conditions' => $conditions,
                'years'      => $years,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asets = new Aset;
        $asets->nama_aset   = $request->name;
        $asets->merk        = $request->merk;
        $asets->tahun       = $request->year;
        $asets->keterangan  = $request->ket;
        $asets->nilai_barang= $request->nilai;
        $asets->id_lokasi   = $request->location;
        $asets->id_kategori = $request->category;
        $asets->id_sumber   = $request->sumber;
        $asets->id_kondisi  = $request->condition;

        $asets->save();

        return redirect()->route('asets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteAll()
    {
        Aset::truncate();
        return redirect()->route('asets');
    }

}

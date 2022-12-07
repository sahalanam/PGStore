<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EMoney;

class EMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emoney = EMoney::all();
        return $emoney;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = EMoney::create([
            "nama" => $request->nama,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "stok" => $request->stok
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'E-Money tersimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emoney = EMoney::find($id);
        if ($emoney) {
            return response()->json([
                'status' => 200,
                'data' => $emoney
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'ID ' . $id . ' tidak ditemukan'
            ], 404);
        }
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
        $emoney = EMoney::find($id);
        if($emoney){
            $emoney->nama = $request->nama ? $request->nama : $emoney->nama;
            $emoney->harga = $request->harga ? $request->harga : $emoney->harga;
            $emoney->deskripsi = $request->deskripsi ? $request->deskripsi : $emoney->deskripsi;
            $emoney->stok = $request->stok ? $request->stok : $emoney->stok;
            $emoney->save();
            return response()->json([
                'status' => 200,
                'data' => $emoney
            ], 200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emoney = EMoney::where('id',$id)->first();
        if($emoney){
            $emoney->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'emoney berhasil dihapus',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan'
            ]);
        }
    }
}

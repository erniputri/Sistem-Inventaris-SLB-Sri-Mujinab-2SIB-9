<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from barang"));
        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
        ]);


        DB::insert("INSERT INTO `barang`(`id_barang`, `nama_barang`, `jumlah_barang`, `kondisi_barang`) VALUES (uuid(),?,?,?)",
        [$request->nama,$request->jumlah,$request->kondisi]);
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('barang')->where('id_barang', $id)->first();
        return view('barang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
        ]);

        //cek update foto atau tidak
    
            DB::update("UPDATE barang SET nama_barang=?,jumlah_barang=?,kondisi_barang=? WHERE id_barang=?",
            [$request->nama,$request->jumlah,$request->kondisi,$id_barang]);
        
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diupdate!']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        DB::table('barang')->where('id_barang', $id_barang)->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

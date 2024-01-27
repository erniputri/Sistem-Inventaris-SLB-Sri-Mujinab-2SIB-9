<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    public function index()
    {
        // echo "ok";
        $data = DB::select("select * from barang"); // Directly use the select() method
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
            'nama' =>'required',
            'jumlah'  =>'required',
            'kondisi'=>'required'
             ]);
            
            // //upload image
            // $image = $request->file('photo');
            // $image->storeAs('public/barang', $image->hashName());
            
            DB::insert("INSERT INTO barang(id, nama, jumlah, kondisi) VALUES (uuid(),?,?,?)",
            [$request->nama,$request->jumlah, $request->kondisi]);
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
        $data=DB::table('barang')->where('id', $id)->first();
        return view('barang.edit', compact('data'));
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
        $this->validate($request, [
             'nama' =>'required',
             'jumlah'  =>'required',
             'kondisi'=>'required'
             ]);
            
            //  DB::update("UPDATE dosen_7SET ,nama=?,description=?,prodi=? WHERE id=?",
            //  [$image->hashName(),$request->nama,$request->fasilitas,$request->kapasitas,$id]);
            // }else
            {
             DB::update("UPDATE barang SET nama=?,jumlah=?,kondisi=? WHERE id=?",
             [$request->nama,$request->jumlah, $request->kondisi,$id]);
            }
            return redirect()->route('barang.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barang')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


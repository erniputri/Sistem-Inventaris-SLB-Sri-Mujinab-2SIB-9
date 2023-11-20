<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "ok";
        $data=DB::select(DB::raw("select * from ruangan"));
        return view('ruangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
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
            'kapasitas'  =>'required',
            'fasilitas'=>'required'
             ]);
            
            // //upload image
            // $image = $request->file('photo');
            // $image->storeAs('public/ruangan', $image->hashName());
            
            DB::insert("INSERT INTO ruangan(id, nama, kapasitas, fasilitas) VALUES (uuid(),?,?,?)",
            [$request->nama,$request->kapasitas, $request->fasilitas]);
            return redirect()->route('ruangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('ruangan')->where('id', $id)->first();
        return view('ruangan.edit', compact('data'));
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
             'kapasitas'  =>'required',
             'fasilitas'=>'required'
             ]);
            
            //  DB::update("UPDATE dosen_7SET ,nama=?,description=?,prodi=? WHERE id=?",
            //  [$image->hashName(),$request->nama,$request->fasilitas,$request->kapasitas,$id]);
            // }else
            {
             DB::update("UPDATE ruangan SET nama=?,kapasitas=?,fasilitas=? WHERE id=?",
             [$request->nama,$request->kapasitas, $request->fasilitas,$id]);
            }
            return redirect()->route('ruangan.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ruangan')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('ruangan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
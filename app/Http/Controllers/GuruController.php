<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        // echo "ok";
        $data = DB::select("
        SELECT guru.*, ruangan.id, ruangan.nama as nama_ruangan
        FROM guru
        LEFT JOIN ruangan ON guru.id_ruangan = ruangan.id
    ");
        return view('guru.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::select("SELECT * from ruangan");
        return view('guru.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            
            // //upload image
            // $image = $request->file('photo');
            // $image->storeAs('public/admmin', $image->hashName());
            
            DB::insert("INSERT INTO guru(id, nama, email, password, id_ruangan) VALUES (uuid(),?,?,?,?)",
            [$request->nama,$request->email, $request->password,$request->id_ruangan]);
            return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('guru')->where('id', $id)->first();
        return view('guru.edit', compact('data'));
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
             'email'  =>'required',
             'password'=>'required'
             ]);
            
            //  DB::update("UPDATE dosen_7SET ,nama=?,description=?,prodi=? WHERE id=?",
            //  [$image->hashName(),$request->nama,$request->password,$request->email,$id]);
            // }else
            {
             DB::update("UPDATE guru SET nama=?,email=?, password=? WHERE id=?",
             [$request->nama,$request->email, $request->password,$id]);
            }
            return redirect()->route('guru.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('guru')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
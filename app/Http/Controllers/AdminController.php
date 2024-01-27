<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "ok";
        $data=DB::select("select * from admin");
        return view('admin.indek', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'email'  =>'required',
            'password'=>'required'
             ]);
            
            // //upload image
            // $image = $request->file('photo');
            // $image->storeAs('public/admmin', $image->hashName());
            
            DB::insert("INSERT INTO admin(id, nama, email, password) VALUES (uuid(),?,?,?)",
            [$request->nama,$request->email, $request->password]);
            return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('admin')->where('id', $id)->first();
        return view('admin.edit', compact('data'));
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
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);

    // Update the record in the database
    DB::table('admin')->where('id', $id)->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => $request->password,
    ]);
    return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Diupdate!']);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('admin')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
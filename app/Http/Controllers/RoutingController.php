<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class RoutingController extends Controller
{

    public function __construct()
    {
        // $this->
        // middleware('auth')->
        // except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::select("
            SELECT 
                guru.*, 
                ruangan.id AS ruangan_id, 
                ruangan.nama AS nama_ruangan,
                (SELECT COUNT(*) FROM guru) AS guru_count,
                (SELECT COUNT(*) FROM ruangan) AS ruangan_count,
                (SELECT COUNT(*) FROM barang) AS barang_count,
                (SELECT COUNT(*) FROM admin) AS admin_count
            FROM guru
            LEFT JOIN ruangan ON guru.id_ruangan = ruangan.id
        ");
    
        return view('index', compact('data'));
    }
    

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {

        $mode = $request->query('mode');
        $demo = $request->query('demo');
     
        if ($first == "assets")
            return redirect('home');

        return view($first, ['mode' => $mode, 'demo' => $demo]);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {

        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets")
            return redirect('home');



    return view($first .'.'. $second, ['mode' => $mode, 'demo' => $demo]);
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets")
            return redirect('home');

        dd($first,$second,$third);
        
        return view($first . '.' . $second . '.' . $third, ['mode' => $mode, 'demo' => $demo]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user_id = auth()->user()->id;
        $kasir = DB::table('kasir')->where('user_id', $user_id)->get();
     return view('transaksi',['kasir' => $kasir ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nabar' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'disc' => 'required',
            'totbar' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        DB::table('kasir')->insert($validateData);
        //redirect
        return redirect()->route('admin.index')->with('success','Transaksi berhasil');
             
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( )
    {
       $user_id = auth()->user()->id;
       DB::table('kasir')->where('user_id', $user_id)->delete();
       //redirect
       return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        $id = Kasir::where('id',$id)->delete();
        //redirect
        return redirect()->route('admin.index')->with('success','Transaksi berhasil di hapus');
    }

   

    


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SellingController extends Controller
{

    
    public function selling(Request $request)
    {
       $validasi = $request->validate([
        'id'=>'required',
        'subtotal'=>'required',
        'paid'=>'required'
       ]);

       $validasi['user_id'] = auth()->user()->id;

       DB::table('selling')->insert($validasi);

       return redirect()->route('admin.index');
    }
}

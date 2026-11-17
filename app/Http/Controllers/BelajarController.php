<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{

    public function index()
    {
        $nama = 'Agus';
        $pekerjaan = 'Programmer';
        $kampus = 'UMY';
        $status = 'malas';
        $hobi = ['Coding', 'Gaming', 'Membaca'];
        

        return view('belajar', compact('nama', 'pekerjaan', 'kampus', 'status' , 'hobi'));
                
    }
    
 
}


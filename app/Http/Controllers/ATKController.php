<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use GuzzleHttp\Psr7\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ATKController extends Controller
{

    //tampil
    public function index()
    {
        $query= Atk::query();
        if(request('sort')=='asc') {
            $query->orderBy('nama','asc');
            
        } elseif (request('sort')=='desc') {
            $query->orderBy('nama', 'desc');

        } else {
            $query->orderBy('created_at','desc');
        }
        $atks = $query->paginate(15)->withQueryString();
        return view('atk.index', compact('atks'));
    }

    //filter kategori
    public function filter($kategori)
    {
        $atks = ATK::where('kategori', $kategori)->paginate(15);
        return view('atk.index', compact('atks', 'kategori'));
    }

    //tabel
    public function tabel()
    {
        $atks = Atk::paginate(15);
        return view('atk.tabel', compact('atks'));
    }


    //detail atk
    public function show($id)
    {
        $atks = Atk::findOrFail($id);
        return view('atk.show', compact('atks'));
    }

    //fitur search
    public function search()
    {
        $query = request('q');
        $atks = Atk::where('nama', 'like', "%$query%")->paginate(15);
        return view('atk.index', compact('atks'));
    }
}
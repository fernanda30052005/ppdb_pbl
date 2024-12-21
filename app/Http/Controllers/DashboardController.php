<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Berita;
use App\Models\KategoriKuliner;
use App\Models\Outlet;
use App\Models\Kuliner;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sliders = Slide::all();
        $beritas = Berita::all();
        $outlets = Outlet::all();
        $kuliners = Kuliner::all();
        $kategori_kuliners = KategoriKuliner::all();
        $search = $request->input('search');
        $kategori = $request->input('kategori');
    
        $search_success = Kuliner::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%")
                             ->orWhere('harga', 'like', "%{$search}%");
            })
            ->when($kategori, function ($query, $kategori) {
                return $query->where('id_kategori_kuliner', $kategori);
            })
            ->get();
    
        return view('pages.frontend.index', compact('sliders', 'beritas', 'outlets', 'kuliners', 'search_success', 'kategori_kuliners'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

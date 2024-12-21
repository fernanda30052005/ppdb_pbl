<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Outlet\OutletRequest;
use App\Http\Requests\Admin\Outlet\OutletUpdateRequest;
use App\Models\Kuliner;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Outlet::with('users')->get();

        // dd($items);
    
        return view('pages.backend.admin.outlet.index', compact('items'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = User::where('role', 'umkm')->doesntHave('outlet')->get();
        
        return view('pages.backend.admin.outlet.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutletRequest $request)
    {
        $data = $request->validated();

        Outlet::create($data);

        alert()->success('Berhasil', 'data ditambah' );


        return redirect()->route('admin.outlet.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Outlet::findOrFail($id);

        return view('pages.backend.admin.outlet.detail-outlet', compact('item'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil outlet berdasarkan ID dan memuat relasi users
        $outletById = Outlet::with('users')->findOrFail($id);

        // Dapatkan semua user dengan peran 'umkm' yang belum terelasi dengan outlet
        $users = User::where('role', 'umkm')->doesntHave('outlet')->get();

        // Gabungkan user yang ditemukan berdasarkan ID dengan daftar users 'umkm' yang belum terelasi dengan outlet
        $items = $users->concat([$outletById->users]);

        return view('pages.backend.admin.outlet.edit', compact('items', 'outletById'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(OutletRequest $request, $id)
    {
        $data = $request->validated();

        $item = Outlet::findOrFail($id);

        $item->update($data);
        
        alert()->success('Berhasil', 'data diperbarui' );

        return redirect()->route('admin.outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Outlet::findOrFail($id);
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );


        return redirect()->route('admin.outlet.index');
    }
}

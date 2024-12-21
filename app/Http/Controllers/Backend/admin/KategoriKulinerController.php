<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kategori\KategoriKulinerRequest;
use App\Models\KategoriKuliner;
use Illuminate\Http\Request;

class KategoriKulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriKuliner::all();                                                         
    
        return view('pages.backend.admin.kategori_kuliner.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.kategori_kuliner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriKulinerRequest $request)
    {

        $data = $request->validated();
        
        KategoriKuliner::create($data);

        alert()->success('Berhasil', 'data ditambah' );

    
        return redirect()->route('admin.kategori_kuliner.index')->with('success', 'Created successfully.');
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
    public function edit($id)
    {
        $item = KategoriKuliner::findOrFail($id);

        return view('pages.backend.admin.kategori_kuliner.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriKulinerRequest $request, $id)
    {
        $data = $request->validated();

        $item = KategoriKuliner::findOrFail($id);

        $item->update($data);

        alert()->success('Berhasil', 'data diperbarui' );

        return redirect()->route('admin.kategori_kuliner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = KategoriKuliner::findOrFail($id);
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );

        return redirect()->route('admin.kategori_kuliner.index');
    }
}

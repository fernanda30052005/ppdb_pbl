<?php

namespace App\Http\Controllers\Backend\admin;

use Illuminate\Http\Request;
use App\Models\KategoriBooking;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kategori\KategoriKulinerRequest;

class KategoriBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriBooking::all();                                                         
    
        return view('pages.backend.admin.kategori_booking.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.kategori_booking.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriKulinerRequest $request)
    {

        $data = $request->validated();
        
        KategoriBooking::create($data);

        alert()->success('Berhasil', 'data ditambah' );

    
        return redirect()->route('admin.kategori_booking.index')->with('success', 'Created successfully.');
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
        $item = KategoriBooking::findOrFail($id);

        return view('pages.backend.admin.kategori_booking.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriKulinerRequest $request, $id)
    {
        $data = $request->validated();

        $item = KategoriBooking::findOrFail($id);

        $item->update($data);

        alert()->success('Berhasil', 'data diperbarui' );

        return redirect()->route('admin.kategori_booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = KategoriBooking::findOrFail($id);
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );

        return redirect()->route('admin.kategori_booking.index');
    }
}

<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Galeri::all();

        return view('pages.backend.admin.galeri.index', compact('items'));      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debug request data
        // dd($request->all());
    
        // Validasi input
        $this->validate($request, [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:5120',
        ]);
    
        if ($request->hasFile('foto')) {
            $resource = $request->file('foto');
            $name = $resource->getClientOriginalName();
            $finalName = date('His')  . $name;
            $request->file('foto')->storeAs('images/galeri/', $finalName, 'public');
            Galeri::create([
                'foto' => $finalName,
            ]);
        } else {
            alert()->error('Error', 'empty foto' );
        }

        alert()->success('Berhasil', 'data ditambah' );

    
        return redirect()->route('admin.galeri.index')->with('success', 'Created Succesfully.');
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
    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);

        Storage::disk('public')->delete('images/galeri/' . $item->thumbnail);
    
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );
    
        return redirect()->route('admin.galeri.index')->with('success', 'Berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Backend\umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\Outlet\OutletRequest;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Auth::user()->outlet;    
            
        return view('pages.backend.umkm.outlet.index', compact('item'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.umkm.outlet.create');
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
        $item = Outlet::findOrFail($id);

        return view('pages.backend.umkm.outlet.edit', compact('item'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $resource = $request->file('foto');
            $name = $resource->getClientOriginalName();
            $finalName = date('His')  . $name;
            $request->file('foto')->storeAs('images/', $finalName, 'public');
            $item = Outlet::findOrFail($id);
            $item->update([
                'nama' => $request->nama,
                'foto' => $finalName,
                'deskripsi' => $request->deskripsi,
                'kontak' => $request->kontak,
            ]);
        } else {
            $item = Outlet::findOrFail($id);
            $item->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'kontak' => $request->kontak,
            ]);
        }

        return redirect()->route('umkm.outlet.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

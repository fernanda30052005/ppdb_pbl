<?php

namespace App\Http\Controllers\Backend\umkm;

use App\Models\Kuliner;
use Illuminate\Http\Request;
use App\Models\KategoriKuliner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Auth::user()->outlet->kuliner; 

        // dd($item);
    
        return view('pages.backend.umkm.kuliner.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Auth::user()->outlet->kuliner;
        
        $kategori_kuliners = KategoriKuliner::all();

        return view('pages.backend.umkm.kuliner.create', compact('items', 'kategori_kuliners'));

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
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Inisialisasi variabel
        $finalName = 'foto-default.jpg';
    
        // Cek apakah file diunggah
        if ($request->hasFile('foto')) {
            $resource = $request->file('foto');
            $name = $resource->getClientOriginalName();
            $finalName = date('His') . $name;
    
            // Simpan file ke storage
            $request->file('foto')->storeAs('images/', $finalName, 'public');
        }
    
        // Buat entri berita
        Kuliner::create([
            'id_outlet' => Auth::user()->outlet->id,
            'id_kategori_kuliner' => $request->id_kategori_kuliner,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $finalName,
        ]);
    
        return redirect()->route('umkm.kuliner.index')->with('success', 'Berita berhasil dibuat.');
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
        $item = Kuliner::findOrFail($id);

        $kategori_kuliners = KategoriKuliner::all();

        return view('pages.backend.umkm.kuliner.edit', compact('item', 'kategori_kuliners'));   
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
            $item = Kuliner::findOrFail($id);
            $item->update([
                'id_outlet' => Auth::user()->outlet->id,
                'id_kategori_kuliner' => $request->id_kategori_kuliner,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'foto' => $finalName,
            ]);
        } else {
            $item = Kuliner::findOrFail($id);
            $item->update([
                'id_outlet' => Auth::user()->outlet->id,
                'id_kategori_kuliner' => $request->id_kategori_kuliner,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
            ]);
        }

        return redirect()->route('umkm.kuliner.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan entri berita berdasarkan ID
        $item = Kuliner::findOrFail($id);

        // Hapus file thumbnail dari penyimpanan
        Storage::disk('public')->delete('images/' . $item->foto);
    
        // Hapus entri berita dari database
        $item->delete();
    
        // Redirect ke halaman indeks berita dengan pesan sukses
        return redirect()->route('umkm.kuliner.index')->with('success', 'Berhasil dihapus.');
    }
}

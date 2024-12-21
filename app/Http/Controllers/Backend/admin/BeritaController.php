<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Berita\BeritaRequest;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Berita::all();

        return view('pages.backend.admin.berita.index', compact('items'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.berita.create');
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
            'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Inisialisasi variabel
        $finalName = 'thumbnail-default.jpg';
        $slug = strtolower(str_replace(" ", "-", strip_tags($request->judul)));
        $slug = strlen($slug) > 100 ? substr($slug, 0, 100) : $slug;
    
        // Cek apakah file diunggah
        if ($request->hasFile('thumbnail')) {
            $resource = $request->file('thumbnail');
            $name = $resource->getClientOriginalName();
            $finalName = date('His') . $name;
    
            // Simpan file ke storage
            $request->file('thumbnail')->storeAs('images/', $finalName, 'public');
        }
    
        // Buat entri berita
        Berita::create([
            'slug' => $slug,
            'judul' => $request->judul,
            'thumbnail' => $finalName,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'konten' => $request->konten,
        ]);

        alert()->success('Berhasil', 'data ditambah' );

    
        // Redirect ke halaman indeks berita dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dibuat.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Berita::findOrFail($id);

        return view('pages.backend.admin.berita.detail', compact('item'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Berita::findOrFail($id);

        return view('pages.backend.admin.berita.edit', compact('item'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'thumbnail' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $resource = $request->file('thumbnail');
            $name = $resource->getClientOriginalName();
            $finalName = date('His')  . $name;
            $request->file('thumbnail')->storeAs('images/', $finalName, 'public');
            $slug = strtolower(str_replace(" ", "-", strip_tags($request->judul)));
            $slug = strlen($slug) > 100 ? substr($slug, 0, 100) : $slug;
            $item = Berita::findOrFail($id);
            $item->update([
                'slug' => $slug,
                'judul' => $request->judul,
                'thumbnail' => $finalName,
                'tanggal' => $request->tanggal,
                'penulis' => $request->penulis,
                'konten' => $request->konten,
            ]);
        } else {
            $slug = strtolower(str_replace(" ", "-", strip_tags($request->judul)));
            $slug = strlen($slug) > 100 ? substr($slug, 0, 100) : $slug;
            $item = Berita::findOrFail($id);
            $item->update([
                'slug' => $slug,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'penulis' => $request->penulis,
                'konten' => $request->konten,
            ]);
        }
        alert()->success('Berhasil', 'data diperbarui' );

        return redirect()->route('admin.berita.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan entri berita berdasarkan ID
        $item = Berita::findOrFail($id);

        // Hapus file thumbnail dari penyimpanan
        Storage::disk('public')->delete('images/' . $item->thumbnail);
    
        // Hapus entri berita dari database
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );

    
        // Redirect ke halaman indeks berita dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berhasil dihapus.');
    }
    
}

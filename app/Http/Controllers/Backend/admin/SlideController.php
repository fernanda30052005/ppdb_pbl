<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Slide::all();
    
        return view('pages.backend.admin.slide.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.slide.create');
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
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Inisialisasi variabel
        $finalName = 'image-default.jpg';
        $slug = strtolower(str_replace(" ", "-", strip_tags($request->judul)));
        $slug = strlen($slug) > 100 ? substr($slug, 0, 100) : $slug;
    
        // Cek apakah file diunggah
        if ($request->hasFile('image')) {
            $resource = $request->file('image');
            $name = $resource->getClientOriginalName();
            $finalName = date('His') . $name;
    
            // Simpan file ke storage
            $request->file('image')->storeAs('images/', $finalName, 'public');
        }
    
        // Buat entri berita
        Slide::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $finalName,
            'description' => $request->description,
        ]);
    
        alert()->success('Berhasil', 'data ditambah' );

        // Redirect ke halaman indeks berita dengan pesan sukses
        return redirect()->route('admin.slide.index')->with('success', 'Berhasil dibuat.');
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
        $item = Slide::findOrFail($id);

        return view('pages.backend.admin.slide.edit', compact('item'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $resource = $request->file('image');
            $name = $resource->getClientOriginalName();
            $finalName = date('His')  . $name;
            $request->file('image')->storeAs('images/', $finalName, 'public');
            $item = Slide::findOrFail($id);
            $item->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $finalName,
                'description' => $request->description,
            ]);
        } else {
            $item = Slide::findOrFail($id);
            $item->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
        }

        alert()->success('Berhasil', 'data diperbarui' );


        return redirect()->route('admin.slide.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan entri berita berdasarkan ID
        $item = Slide::findOrFail($id);

        // Hapus file image dari penyimpanan
        Storage::disk('public')->delete('images/' . $item->image);
    
        // Hapus entri berita dari database
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );

    
        // Redirect ke halaman indeks berita dengan pesan sukses
        return redirect()->route('admin.slide.index')->with('success', 'Berhasil dihapus.');
    }
}

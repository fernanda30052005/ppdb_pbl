<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            
            $userId = auth()->user()->id;
            // $request = Booking::where('id_user', $userId)->get();
            return view('pages.frontend.pendaftaran');
        } else {
            return redirect()->route('register.index')->with('error', 'Anda harus terdaftar dan masuk untuk mengakses halaman booking.');
        }
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
        //$data = $request->validated();
        
        Pendaftaran::create($data);

        // alert()->info('info', 'pengajuan berhasil mohon dicek berkala di bagian pesan');

        return redirect()->back()->with('success', 'pengajuan berhasil mohon dicek berkala di bagian pesan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\KategoriBooking;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\Booking\BookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        if (auth()->check()) {
            $kategori_bookings = KategoriBooking::all();
            $userId = auth()->user()->id;
            // $request = Booking::where('id_user', $userId)->get();
            return view('pages.frontend.booking', compact('kategori_bookings'));
        } else {
            return redirect()->route('register.index')->with('error', 'Anda harus terdaftar dan masuk untuk mengakses halaman booking.');
        }
    }

    public function getUserBookings()
    {
        $userId = auth()->id();
        $bookings = Booking::where('id_user', $userId)->get();

        return response()->json($bookings);
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
    public function store(BookingRequest $request)
    {

        $data = $request->validated();
        
        Booking::create($data);

        // alert()->info('info', 'pengajuan berhasil mohon dicek berkala di bagian pesan');

        return redirect()->back()->with('success', 'pengajuan berhasil mohon dicek berkala di bagian pesan');
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

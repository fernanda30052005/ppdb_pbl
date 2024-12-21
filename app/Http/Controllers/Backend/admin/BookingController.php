<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\KategoriBooking;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Booking\BookingRequest;
use App\Http\Requests\Admin\Booking\BookingUpdateRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Booking::where('status', 'pengajuan')->get();
    
        return view('pages.backend.admin.booking.index', compact('items'));
    }

    public function index_all()
    {
        $items = Booking::all();        
        $kategori_bookings = KategoriBooking::all();

    
        return view('pages.backend.admin.booking.index-all', compact('items', 'kategori_bookings'));
    }
    // public function index_ditolak()
    // {
    //     $items = Booking::where('status', 'ditolak')->get();        
    
    //     return view('pages.backend.admin.booking.ditolak', compact('items'));
    // }
 


    public function create()
    {
        $users = User::where('role', 'user')->get();
        $kategori_bookings = KategoriBooking::all();
        
        return view('pages.backend.admin.booking.create', compact('kategori_bookings', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {

        $data = $request->validated();
        
        Booking::create($data);

        alert()->success('Berhasil', 'data ditambah' );
    
        return redirect()->route('admin.booking.index')->with('success', 'Created successfully.');
    }
    public function terima(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'diterima';
        $booking->keterangan_admin = $request->keterangan_admin;
        $booking->save();

        alert()->success('Berhasil', 'diterima' );

        return redirect()->route('admin.booking.index')->with('success', 'Booking diterima.');
    }

    public function tolak(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'ditolak';
        $booking->keterangan_admin = $request->keterangan_admin;
        $booking->save();

        alert()->success('Berhasil', 'ditolak' );

        return redirect()->route('admin.booking.index')->with('success', 'Booking ditolak.');
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
        $item = Booking::findOrFail($id);
        
        // $users = User::where('role', 'user')->get();
        $kategori_bookings = KategoriBooking::all();

        return view('pages.backend.admin.booking.edit', compact('item', 'kategori_bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $item = Booking::findOrFail($id);

        $item->update($data);

        return redirect()->route('admin.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Booking::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.booking.index');
    }

}

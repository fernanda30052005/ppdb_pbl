<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Booking::where('status', 'diterima')->get();
    
        return view('pages.backend.admin.laporan.index', compact('items'));    
    }
    public function generatePDF()
    {
        // Ambil data
        $items = Booking::where('status', 'diterima')->get();

        // Bagikan data ke view
        $data = ['items' => $items];

        // Dapatkan instance dari service container
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pages.pdf.booking-report', $data);

        // Kembalikan PDF yang dihasilkan
        return $pdf->download('booking_report.pdf');
    }

    public function generatePDFWeek()
    {
        // Dapatkan tanggal mulai dan akhir minggu ini
        $startOfWeek = now()->startOfWeek(); // Senin
        $endOfWeek = now()->endOfWeek(); // Minggu
    
        // Ambil data untuk minggu ini
        $items = Booking::where('status', 'diterima')
                        ->whereBetween('tanggal_booking', [$startOfWeek, $endOfWeek])
                        ->get();
    
        // Cek jika data kosong
        if ($items->isEmpty()) {
            // Set pesan flash dan redirect ke halaman sebelumnya
            alert()->info('info', 'Tidak ada kegiatan dalam satu minggu ini');
            return redirect()->back();
        }
    
        // Bagikan data ke view
        $data = ['items' => $items];
    
        // Dapatkan instance dari service container
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pages.pdf.booking-report', $data);
    
        // Kembalikan PDF yang dihasilkan
        return $pdf->download('booking_report_week.pdf');
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
        //
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

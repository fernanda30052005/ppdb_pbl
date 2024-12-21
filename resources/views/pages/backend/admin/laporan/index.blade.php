@extends('layouts.backend.master')

@section('title', 'Laporan — Taman Kenangan')
@section('content')

    @push('datatable-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/scrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
    @endpush

<!-- file wrapper for better tabs start-->
    <div>
        <div class="page-title">
            <div class="card card-absolute mt-5 mt-md-4">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        Laporan Kegiatan Acara
                    </h5>
                </div>
                <div class="card-body">
                    <p>
                        Dibawah ini adalah laporan kegiatan yang sudah <a href="" class="text-primary">diterima</a>
                        Anda bisa melakukan cetak laporan sesuai kebutuhan
                    </p>
                </div>
            </div>
        </div>

        
        <!-- pages title header end-->
        <!-- main content start-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <div class="d-flex justify-content mb-3">
                                    <button id="pdf-btn" class="btn btn-danger mr-4" onclick="window.location.href='{{ route('admin.generatePDF') }}'">Cetak PDF</button>
                                    <div class="dropdown-container">
                                        <button id="pdf-btn-week" class="btn btn-success" onclick="window.location.href='{{ route('admin.generatePDFWeek') }}'">Cetak PDF Seminggu</button>
                                    </div>
                                </div>                                
                                <table class="display" id="auto-fill">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th>Nama</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td> <div class="font-weight-bold">
                                                    {{ $item->user->name }} <br> </div> 
                                                    <a href="#" data-toggle="modal" data-target="#userDetailsModal{{ $item->id }}">Rincian</a>                                
                                            </td>                  
                                            <td>
                                                {{ $item->nama_kegiatan }} <br>
                                                <a href="#" data-toggle="modal" data-target="#detailsModal{{ $item->id }}">
                                                    Rincian
                                                </a>
                                            </td>                    
                                            <td>{{ $item->kategori_booking->nama ?? 'Tidak ada Kategori' }}</td>
                                            <td>{{ $item->tanggal_booking }}</td>
                                        </tr>
                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailsModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Kegiatan: {{ $item->nama_kegiatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Waktu Mulai:</strong> {{ $item->waktu_mulai }}</p>
                                                        <p><strong>Waktu Selesai:</strong> {{ $item->waktu_selesai }}</p>
                                                        <p><strong>Keterangan:</strong> {{ $item->keterangan }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- User Details Modal -->
                                        <div class="modal fade" id="userDetailsModal{{ $item->id }}" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="userDetailsModalLabel">User: {{ $item->user->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Nama:</strong> {{ $item->user->name }}</p>
                                                        <p><strong>Email:</strong> {{ $item->user->email }}</p>
                                                        <p><strong>No. Hp:</strong> {{ $item->user->no_hp ?? 'Tidak tersedia' }} </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                    
                                        @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot style="display:none;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Rincian</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content end-->
    </div>
    <!-- file wrapper for better tabs start-->

    @push('datatable-scripts')
        <script src="{{ url('cuba/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
        <script src="{{ url('cuba/assets/js/datatable/datatable-extension/custom.js') }}"></script>
        <script src="{{ url('cuba/assets/js/tooltip-init.js') }}"></script>
    @endpush

@endsection

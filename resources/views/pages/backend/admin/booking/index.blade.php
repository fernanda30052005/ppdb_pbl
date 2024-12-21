@extends('layouts.backend.master')

@section('title', 'Data Booking — Taman Kenangan')
@section('content')

    @push('datatable-styles')
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/scrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('cuba/assets/css/vendors/datatable-extension.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @endpush

    <!-- file wrapper for better tabs start-->
    <div>
        <!-- pages title header start-->
        <div class="container-fluid">
            <div class="page-title">
                <div class="card card-absolute">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Pengajuan Booking</h5>
                    </div>
                    <div class="card-body">
                        <p>Dibawah ini adalah data pengajuan booking yang tersedia. Untuk mengubah data bisa dengan mengklik logo pensil atau menghapus dengan logo keranjang sampah.Anda juga bisa melihat rincian dan melakukan tindakan menolak atau menerima dan memberikan keterangan.
                        </p>
                    </div>
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
                                <table class="display" id="auto-fill">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th>Nama</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
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
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#acceptModal{{ $item->id }}" class="btn btn-success px-2">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#rejectModal{{ $item->id }}" class="btn btn-danger px-2">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
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
                                        
                                        <!-- Modal Terima -->
                                        <div class="modal fade" id="acceptModal{{ $item->id }}" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="acceptModalLabel">Masukkan Keterangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.booking.terima', $item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="keterangan" name="keterangan_admin" rows="3">Kegiatan {{ $item->nama_kegiatan }} diterima, silahkan hubungi : +62 811-762-665 (Yana) H-1 Sebelum kegiatan</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Tolak -->
                                        <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel">Masukkan Keterangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.booking.tolak', $item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="keterangan" name="keterangan_admin" rows="3">Mohon maaf kegiatan {{ $item->nama_kegiatan}} ditolak karena alasan administrator silahkan hubungi : +62 811-762-665 (Yana)</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                    </form>
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
                                            <th>Opsi</th>
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

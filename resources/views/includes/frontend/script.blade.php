<script src="{{ url('solatec/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('solatec/assets/js/plugins.js') }}"></script>
<script src="{{ url('solatec/assets/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#pesanModal').on('show.bs.modal', function() {
            $.ajax({
                url: '{{ route('user.bookings') }}',
                method: 'GET',
                success: function(data) {
                    // Menampilkan data di konsol untuk memastikan data diterima dengan benar
                    console.log(data);

                    let bookingRequests = '';
                    data.forEach(function(booking) {
                        bookingRequests += `
                             <tr>
                                <td>${booking.nama_kegiatan}</td>
                                <td>${booking.tanggal_booking}</td>
                                <td>${booking.status} 
                                ${booking.keterangan_admin ? `<br> Keterangan : ${booking.keterangan_admin}` : ''}
                                </td>
                            </tr>
                        `;
                    });
                    $('#bookingRequests').html(bookingRequests);
                },
                error: function(xhr, status, error) {
                    // Menampilkan error di konsol jika permintaan AJAX gagal
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

    




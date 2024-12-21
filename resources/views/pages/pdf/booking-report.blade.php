<!DOCTYPE html>
<html>
<head>
    <title>Laporan Jadwal Kegiatan Taman Kenangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Jadwal Kegiatan Taman Kenangan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Nama Kegiatan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Kategori</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->user->no_hp ?? 'Tidak tersedia' }}</td>
                <td>{{ $item->nama_kegiatan }}</td>
                <td>{{ $item->waktu_mulai }}</td>
                <td>{{ $item->waktu_selesai }}</td>
                <td>{{ $item->kategori_booking->nama ?? 'Tidak ada Kategori' }}</td>
                <td>{{ $item->tanggal_booking }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

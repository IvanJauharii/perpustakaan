<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        img {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1rem;
            /* mb-4 = 1rem */
            width: 120px;
            /* w-24 = 24 * 0.25rem = 6rem */
            /* height: 6rem; */
            /* h-24 = 6rem */
            object-fit: contain;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('img/marbabu/marbabu-logo4.png') }}" alt="Logo">
    <h1>Bukti Peminjaman Buku</h1>
    <p><strong>Nama Peminjam:</strong> {{ $notifikasi->peminjam->nama_lengkap }}</p>
    <p><strong>Email:</strong> {{ $notifikasi->peminjam->user->email }}</p>
    <p><strong>Petugas:</strong> {{ $notifikasi->nama_petugas }}</p>

    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Kode Buku</th>
                <th>Jumlah Dipinjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $notifikasi->buku->judul }}</td>
                <td>{{ $notifikasi->buku->code }}</td>
                <td>{{ $notifikasi->jumlah }}</td>
                <td>{{ $notifikasi->tanggal_peminjaman }}</td>
                <td>{{ $notifikasi->tanggal_pengembalian }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d-m-Y H:i:s') }}
    </div>
</body>

</html>

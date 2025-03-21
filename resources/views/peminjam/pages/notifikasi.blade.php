@foreach ($notifikasi as $notif)
    <div class="border rounded p-4 mb-4">
        <div class="flex gap-4">
            <img src="{{ asset('storage/' . $notif->buku->cover) }}" alt="cover" class="w-20 h-28 object-cover">
            <div>
                <h3 class="font-bold text-lg">{{ $notif->buku->judul }}</h3>
                <p>Jumlah: {{ $notif->jumlah }} buku</p>
                <p>Tanggal Pinjam: {{ $notif->tanggal_peminjaman }}</p>
                <p>Tanggal Kembali: {{ $notif->tanggal_pengembalian }}</p>
                <p>Status: <span class="font-bold text-green-500">{{ ucfirst($notif->status) }}</span></p>
                @if ($notif->status == 'confirmed')
                    <p>Petugas: {{ $notif->pesan }}</p>
                    <a href="{{ route('notifikasi.download', $notif->id) }}"
                        class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                        Download Bukti
                    </a>
                @endif
            </div>
        </div>
    </div>
@endforeach

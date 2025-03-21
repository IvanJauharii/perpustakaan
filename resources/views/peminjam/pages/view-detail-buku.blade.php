@extends('peminjam.layout.app')
@section('title', $bukuss->judul)
@section('content')
    {{-- <x-search mt="mt-28"></x-search> --}}
    <div class="max-w-4xl mx-auto mb-12 bg
    e-white p-6 rounded shadow-md">
        <div class="flex justify-between items-start">
            <img src="{{ asset($bukuss->poto_buku) }}" class="w-48 h-64 object-cover mr-6" alt="Cover Buku">
            <div class="flex-grow">
                <h2 class="text-2xl font-bold">{{ $bukuss->judul }}</h2>
                <p class="text-gray-700">Oleh: <span class="text-blue-600">{{ $bukuss->penulis }}</span></p>
                <p class="mt-2 text-gray-600">{{ $bukuss->description }}</p>
                <p class="mt-2"><span class="font-semibold">Penerbit:</span> {{ $bukuss->penerbit }},
                    {{ $bukuss->tahun_terbit }}</p>
                <p class="mt-2"><span class="font-semibold">Kode Buku:</span> {{ $bukuss->code }}</p>
                <p class="mt-2"><span class="font-semibold">Kategori:</span>
                    {{ $bukuss->relasi_kategori->nama_kategori }}
                </p>
                <p class="mt-2"><span class="font-semibold">Ketersediaan:</span>

                    <span>{{ $bukuss->jumlah }}</span>
                </p>

                @auth
                    <div class="flex flex-row gap-4 justify-end">
                        <button onclick="openPinjamModal()"
                            class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white  mt-2 p-2">
                            Pinjam Buku
                        </button>
                        <button type="button"
                            class="add-to-koleksi bg-blue-700 hover:bg-blue-600 duration-100 cursor-pointer rounded text-white flex mt-2 p-2"
                            data-buku-id="{{ $bukuss->id }}">
                            <i data-feather="bookmark"></i>
                        </button>
                    </div>
                @endauth

                <!-- Jika belum login, tampilkan tombol  modal login -->
                @guest
                    <div class="flex flex-row gap-4 justify-end">
                        <button onclick="openLoginModal()"
                            class="bg-green-700 hover:bg-green-600 duration-100 cursor-pointer rounded text-white  mt-2 p-2">
                            Pinjam Buku
                        </button>
                        <button onclick="openLoginModal()"
                            class="bg-blue-700 hover:bg-blue-600 duration-100 cursor-pointer rounded text-white flex mt-2 p-2">
                            <i data-feather="bookmark"></i>
                        </button>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <div class="w-[80%] mx-auto bg-white p-6 rounded shadow-md mt-8">
        <h3 class="text-xl font-semibold mb-4">Ulasan Buku</h3>
        @forelse ($ulasanBuku as $review)
            <div class="mb-4 border-b pb-2">
                <p class="font-semibold">{{ $review->peminjam->nama_lengkap }}</p>
                <p class="text-gray-700">{{ $review->ulasan }}</p>
            </div>
        @empty
            <p class="text-gray-500">Belum ada ulasan untuk buku ini.</p>
        @endforelse
    </div>
    @auth
        <div class="w-[80%] mx-auto bg-white p-6 rounded shadow-md mt-6">
            <h4 class="text-lg font-semibold mb-2">Tambahkan Ulasan Anda</h4>
            <form action="{{ route('ulasan.store', $bukuss->id) }}" method="POST">
                @csrf
                <textarea name="ulasan" rows="3" class="w-full p-2 border rounded mb-3"
                    placeholder="Tulis ulasan Anda di sini..."></textarea>
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded">Kirim
                    Ulasan</button>
            </form>
        </div>
    @endauth

    @if (session('peminjaman_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showSuccessModal();
            });
        </script>
    @endif

    @if (session('ulasan_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showUlasan();
            });
        </script>
    @endif

    <!-- Modal Peminjaman -->
    <div id="pinjamModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Form Peminjaman</h2>
            <form action="{{ route('peminjaman.ajukan') }}" method="POST">
                @csrf
                <input type="hidden" name="id_buku" value="{{ $bukuss->id }}">

                <!-- Input Jumlah Buku -->
                <label class="block text-gray-700">Jumlah Buku:</label>
                <input type="number" name="jumlah" min="1" max="{{ $bukuss->jumlah, 5 }}" required
                    class="w-full p-2 border rounded mb-3">

                <!-- Input Tanggal Peminjaman -->
                <label class="block text-gray-700">Tanggal Peminjaman:</label>
                <input type="date" id="tgl_pinjam" name="tanggal_peminjaman" required
                    class="w-full p-2 border rounded mb-3">

                <!-- Input Tanggal Pengembalian -->
                <label class="block text-gray-700">Tanggal Pengembalian:</label>
                <input type="date" id="tgl_kembali" name="tanggal_pengembalian" required
                    class="w-full p-2 border rounded mb-3">

                <!-- Pesan Error -->
                <p id="error-message" class="text-red-500 text-sm hidden">Tanggal pengembalian tidak boleh kurang dari
                    peminjaman!</p>

                <div class="flex justify-end">
                    <button type="button" onclick="closePinjamModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Ajukan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Peminjaman berhasil --}}
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4 text-green-600">Peminjaman Berhasil!</h2>
            <p class="text-gray-700 mb-4">Permintaan peminjaman buku Anda telah diajukan dan menunggu konfirmasi petugas.
            </p>
            <button onclick="closeSuccessModal()"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    {{-- Ulasan Start --}}
    <div id="ulasanSuccess" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4 text-green-600">Ulasan ditambahkan</h2>
            <button onclick="closeSuccessModal()"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
    {{-- Koleksi berhasil --}}
    <div id="koleksiModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-80">
            <h2 class="text-xl font-bold mb-4">Pilih Koleksi</h2>
            <form action="" id="addToKoleksiForm" method="POST">
                @csrf
                <input type="hidden" name="id_buku" id="bukuIdInput">
                <select name="koleksiId" id="koleksiSelect" required class="w-full border rounded px-2 py-1 mb-4">
                    <option value="">-- Pilih Koleksi --</option>
                    @foreach ($koleksis as $koleksi)
                        <option value="{{ $koleksi->id }}">{{ $koleksi->nama }}</option>
                    @endforeach
                </select>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeKoleksiModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white rounded px-4 py-2">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white rounded px-4 py-2">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openPinjamModal() {
            document.getElementById('pinjamModal').classList.remove('hidden');
        }

        function closePinjamModal() {
            document.getElementById('pinjamModal').classList.add('hidden');
        }

        // Validasi tanggal pengembalian
        document.getElementById('tgl_pinjam').addEventListener('change', function() {
            let tglPinjam = new Date(this.value);
            let tglKembali = new Date(tglPinjam);
            tglKembali.setDate(tglKembali.getDate() + 7);
            document.getElementById('tgl_kembali').min = this.value;
            document.getElementById('tgl_kembali').max = tglKembali.toISOString().split('T')[0];
        });

        document.getElementById('tgl_kembali').addEventListener('change', function() {
            let tglPinjam = new Date(document.getElementById('tgl_pinjam').value);
            let tglKembali = new Date(this.value);
            let errorMsg = document.getElementById('error-message');

            if (tglKembali < tglPinjam) {
                errorMsg.classList.remove('hidden');
                this.value = '';
            } else {
                errorMsg.classList.add('hidden');
            }
        });

        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        function showUlasan() {
            document.getElementById('ulasanSuccess').classList.remove('hidden');
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        function openKoleksiModal(bukuId) {
            document.getElementById('bukuIdInput').value = bukuId;
            document.getElementById('koleksiModal').classList.remove('hidden');
        }

        function closeKoleksiModal() {
            document.getElementById('koleksiModal').classList.add('hidden');
        }

        document.querySelectorAll('.add-to-koleksi').forEach(button => {
            button.addEventListener('click', function() {
                const bukuId = this.getAttribute('data-buku-id');
                openKoleksiModal(bukuId);
            });
        });
        document.getElementById('addToKoleksiForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Cegah submit dulu

            const koleksiId = document.getElementById('koleksiSelect').value;
            if (!koleksiId) {
                alert('Pilih koleksi terlebih dahulu!');
                return;
            }

            const form = this;
            form.action = `/peminjam/koleksi/${koleksiId}/add-buku`;
            form.submit(); // Submit setelah action sudah diset
        });
    </script>

@endsection

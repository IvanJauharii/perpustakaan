@extends('admin.layout.admin')
@section('title', 'Edit Peminjam')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Peminjam</h2>

        <form action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="text" name="email" value="{{ $peminjam->email }}" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $peminjam->nama_lengkap }}"
                    class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">No. Telepon</label>
                <input type="text" name="phone" value="{{ $peminjam->phone }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Province</label>
                <select name="provinsi" class="provinsi-dropdown" data-modal-id="{{ $peminjam->id }}" required>
                    <option value="{{ $peminjam->location['provinsi_id'] ?? '' }}"
                        @if (isset($peminjam->location['provinsi_id']) && $peminjam->location['provinsi_id'] != null) selected @endif>
                        {{ $peminjam->location['provinsi'] ?? 'Pilih Province' }}
                    </option>
                    <option value="">Pilih Province</option>
                </select>
                <input type="hidden" name="provinsi_name" class="provinsi-name" data-modal-id="{{ $peminjam->id }}"
                    value="{{ $peminjam->location['provinsi'] ?? '' }}">

            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Lokasi</label>
                <select name="provinsi" class="provinsi-dropdown" data-modal-id="{{ $peminjam->id }}" required>
                    <option value="{{ $peminjam->location['provinsi_id'] ?? '' }}"
                        @if (isset($peminjam->location['provinsi_id']) && $peminjam->location['provinsi_id'] != null) selected @endif>
                        {{ $peminjam->location['provinsi'] ?? 'Pilih Provinsi' }}
                    </option>
                    <option value="">Select Province</option>
                </select>
                <input type="hidden" name="provinsi_name" class="provinsi-name" data-modal-id="{{ $peminjam->id }}"
                    value="{{ $peminjam->location['provinsi'] ?? '' }}">
            </div>
            <div class="mb-4">
                <select name="kabupaten" class="kabupaten-dropdown" data-modal-id="{{ $peminjam->id }}" required>
                    <option value="{{ $peminjam->location['kabupaten_id'] ?? '' }}"
                        @if (isset($peminjam->location['kabupaten_id']) && $peminjam->location['kabupaten_id'] != null) selected @endif>
                        {{ $peminjam->location['kabupaten'] ?? 'Pilih Kabupaten' }}
                    </option>
                    <option value="">Select Kabupaten</option>
                </select>
                <input type="hidden" name="kabupaten_name" class="kabupaten-name" data-modal-id="{{ $peminjam->id }}"
                    value="{{ $peminjam->location['kabupaten'] ?? '' }}">
            </div>
            <div class="mb-4">
                <select name="kecamatan" class="kecamatan-dropdown" data-modal-id="{{ $peminjam->id }}" required>
                    <option value="{{ $peminjam->location['kecamatan_id'] ?? '' }}"
                        @if (isset($peminjam->location['kecamatan_id']) && $peminjam->location['kecamatan_id'] != null) selected @endif>
                        {{ $peminjam->location['kecamatan'] ?? 'Pilih Kecamatan' }}
                    </option>
                    <option value="">Pilih Kecamatan</option>
                </select>
                <input type="hidden" name="kecamatan_name" class="kecamatan-name" data-modal-id="{{ $peminjam->id }}"
                    value="{{ $peminjam->location['kecamatan'] ?? '' }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Alamat</label>
                <input type="text" name="alamat" value="{{ $peminjam->alamat }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Foto</label>
                <input type="file" name="poto" value="{{ $peminjam->poto }}" class="w-full border rounded p-2">
                {{-- @if ($petugas->poto)
            <img src="{{ asset('storage/' . $petugas->poto) }}" class="mt-2" alt="Foto Petugas" style="max-width: 200px;">
        @endif --}}
            </div>

            <div class="flex justify-end">
                <a href="{{ route('peminjam.index') }}" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.provinsi-dropdown').each(function() {
                let modalId = $(this).data('modal-id');
                let provinsiDropdown = $(this);
                let kabupatenDropdown = $('.kabupaten-dropdown[data-modal-id="' + modalId + '"]');
                let kecamatanDropdown = $('.kecamatan-dropdown[data-modal-id="' + modalId + '"]');

                // Mengambil data provinsi dari API
                $.get('/petugas/location/get-provinces', function(data) {
                    // Kosongkan dropdown sebelum mengisi
                    provinsiDropdown.empty().append('<option value="">Select Province</option>');
                    $.each(data, function(index, province) {
                        provinsiDropdown.append('<option value="' + province.id + '">' +
                            province.name + '</option>');
                    });
                });

                // Ketika provinsi dipilih
                provinsiDropdown.on('change', function() {
                    let provinsiId = $(this).val();
                    let provinsiName = $(this).find('option:selected').text();
                    $('.provinsi-name[data-modal-id="' + modalId + '"]').val(provinsiName);

                    if (provinsiId) {
                        // Ambil kabupaten berdasarkan provinsi
                        $.get('/petugas/location/get-kabupaten/' + provinsiId, function(data) {
                            kabupatenDropdown.empty().append(
                                '<option value="">Select Regency</option>');
                            $.each(data, function(index, kabupaten) {
                                kabupatenDropdown.append('<option value="' +
                                    kabupaten.id + '">' + kabupaten.name +
                                    '</option>');
                            });
                            kabupatenDropdown.prop('disabled', false);
                        });
                    } else {
                        kabupatenDropdown.empty().prop('disabled', true);
                        kecamatanDropdown.empty().prop('disabled', true);
                    }
                });

                // Ketika kabupaten dipilih
                kabupatenDropdown.on('change', function() {
                    let kabupatenId = $(this).val();
                    let kabupatenName = $(this).find('option:selected').text();
                    $('.kabupaten-name[data-modal-id="' + modalId + '"]').val(kabupatenName);

                    if (kabupatenId) {
                        // Ambil kecamatan berdasarkan kabupaten
                        $.get('/petugas/location/get-kecamatan/' + kabupatenId, function(data) {
                            kecamatanDropdown.empty().append(
                                '<option value="">Select District</option>');
                            $.each(data, function(index, kecamatan) {
                                kecamatanDropdown.append('<option value="' +
                                    kecamatan.id + '">' + kecamatan.name +
                                    '</option>');
                            });
                            kecamatanDropdown.prop('disabled', false);
                        });
                    } else {
                        kecamatanDropdown.empty().prop('disabled', true);
                    }
                });

                // Ketika kecamatan dipilih
                kecamatanDropdown.on('change', function() {
                    let kecamatanName = $(this).find('option:selected').text();
                    $('.kecamatan-name[data-modal-id="' + modalId + '"]').val(kecamatanName);
                });
            });
        });
    </script>
@endsection

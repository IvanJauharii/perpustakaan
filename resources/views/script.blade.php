<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Modal Content Start --}}
<script>
    function openModal() {
        const modal = document.getElementById("popup-modal");
        const content = document.getElementById("popup-content");

        modal.classList.remove("hidden");
        setTimeout(() => {
            content.classList.remove("opacity-0", "scale-95");
            content.classList.add("opacity-100", "scale-100");
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById("popup-modal");
        const content = document.getElementById("popup-content");

        content.classList.remove("opacity-100", "scale-100");
        content.classList.add("opacity-0", "scale-95");

        setTimeout(() => {
            modal.classList.add("hidden");
        }, 300);
    }
</script>
{{-- Modal Content End --}}

{{-- Script Cari Buku Start --}}
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let keyword = $(this).val().trim();



            if (keyword.length > 0) {
                $.ajax({
                    url: "{{ route('buku.cari') }}",
                    type: "GET",
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        let resultDiv = $('#search-results');
                        console.log('Response:', response);
                        resultDiv.empty().removeClass('hidden');

                        if (response.length > 0) {
                            resultDiv.append(
                                `<p class="text-black font-semibold">Ditemukan ${response.length} hasil dari pencarian "<span class="font-bold">${keyword}</span>"</p>`
                            );

                            response.forEach(buku => {
                                let imageUrl = buku.poto_buku.startsWith('http') ?
                                    buku.poto_buku :
                                    `{{ asset('') }}${buku.poto_buku}`;

                                let highlightedTitle = buku.judul.replace(
                                    new RegExp(keyword, "gi"), match => {
                                        return `<span class="bg-yellow-300 ">${match}</span>`;
                                    });

                                resultDiv.append(`
                                    <div class="p-2 border-b text-left ">
                                        <div class="flex gap-6">
                                            
                                            <img src="${imageUrl}" alt="Cover Buku" class="w-16 h-24 object-cover ">
                                            <div>
                                                <p class="text-lg font-bold text-black">${highlightedTitle}</p>
                                                <p class="text-gray-600">Oleh: <span class="text-blue-600">${buku.penulis}</span></p>
                                                <a href="/detailbuku/${buku.id}" class="mt-2 inline-block px-2 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">Detail Buku</a>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            resultDiv.append(
                                '<p class="text-red-500">Buku tidak ditemukan.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            } else {
                $('#search-results').addClass('hidden');
            }
        });
    });
    // $(document).ready(function() {
    //     $('#search').on('keyup', function() {
    //         let keyword = $(this).val().trim();

    //         if (keyword.length > 0) {
    //             $.ajax({
    //                 url: "{{ route('buku.cari') }}",
    //                 type: "GET",
    //                 data: {
    //                     keyword: keyword
    //                 },
    //                 success: function(response) {
    //                     let resultDiv = $('#search-results');
    //                     resultDiv.empty().removeClass('hidden');

    //                     if (response.length > 0) {
    //                         // Menampilkan jumlah hasil pencarian
    //                         resultDiv.append(
    //                             `<p class="font-bold text-gray-700">Ditemukan ${response.length} hasil dari pencarian "${keyword}"</p>`
    //                         );

    //                         response.forEach(buku => {
    //                             // Menyorot kata yang cocok
    //                             let highlightedTitle = buku.judul.replace(
    //                                 new RegExp(keyword, "gi"), match => {
    //                                     return `<span class="bg-yellow-300">${match}</span>`;
    //                                 });

    //                             // Menampilkan hasil pencarian
    //                             resultDiv.append(`
    //                                 <div class="p-2 border-b flex items-center">
    //                                     <img src="${buku.poto_buku}" alt="Cover Buku" class="w-12 h-16 object-cover mr-3">
    //                                     <div>
    //                                         <p class="text-lg font-bold">${highlightedTitle}</p>
    //                                         <a href="/detailbuku/${buku.id}" class="text-blue-500">Detail Buku</a>
    //                                     </div>
    //                                 </div>
    //                             `);
    //                         });
    //                     } else {
    //                         resultDiv.append(
    //                             '<p class="text-red-500">Buku tidak ditemukan.</p>');
    //                     }
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.error('AJAX Error:', error);
    //                 }
    //             });
    //         } else {
    //             $('#search-results').addClass('hidden');
    //         }
    //     });
    // });
</script>
{{-- Script Cari Buku End --}}

{{-- Script Modal Pinjam buku jika belum login --}}
<script>
    function openLoginModal() {
        document.getElementById('loginModal').classList.remove('hidden');
    }

    function closeLoginModal() {
        document.getElementById('loginModal').classList.add('hidden');
    }
</script>
{{-- Script Modal End --}}

{{-- Script Modal Notifikasi dan Profile Start --}}
<script>
    function toggleProfileMenu() {
        document.getElementById('profileMenu').classList.toggle('hidden');
    }

    function toggleNotification() {
        document.getElementById('notificationModal').classList.toggle('hidden');
    }

    function closeNotification() {
        document.getElementById('notificationModal').classList.add('hidden');
    }

    // Tutup modal jika klik di luar
    document.addEventListener('click', function(event) {
        let profileMenu = document.getElementById('profileMenu');
        let notificationModal = document.getElementById('notificationModal');

        if (!event.target.closest('[onclick="toggleProfileMenu()"]') && !event.target.closest('#profileMenu')) {
            profileMenu.classList.add('hidden');
        }

        if (!event.target.closest('[onclick="toggleNotification()"]') && !event.target.closest(
                '#notificationModal')) {
            notificationModal.classList.add('hidden');
        }
    });
</script>
{{-- Script Modal Notifikasi dan Profile End --}}

{{-- Form peminjaman buku Start --}}
<script>
    function openPinjamModal() {
        document.getElementById('pinjamModal').classList.remove('hidden');
    }

    function closePinjamModal() {
        document.getElementById('pinjamModal').classList.add('hidden');
    }


    // Validasi tanggal pengembalian
    document.addEventListener('DOMContentLoaded', function() {
        let today = new Date().toISOString().split('T')[0];

        // Set min pada tanggal peminjaman agar tidak bisa memilih sebelum hari ini
        document.getElementById('tgl_pinjam').min = today;

        // Set event listener untuk mengupdate min pada tanggal pengembalian
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
    });
</script>
{{-- Form peminjaman buku End --}}

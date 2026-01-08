@extends('layouts.app')

@section('title', 'Penilaian Magang')

@section('header_title', 'Penilaian')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    @media print {
        body * { visibility: hidden; box-shadow: none !important; }
        #printArea, #printArea * { visibility: visible !important; }
        #printArea { position: absolute; left: 0; top: 0; width: 100% !important; margin: 0 !important; padding: 0 !important; display: block !important; }
        .fade-up { opacity: 1 !important; transform: none !important; animation: none !important; }
        .no-print, aside, nav, header, button, .file-management, #fileDisplayArea { display: none !important; }
        table { border-collapse: collapse !important; width: 100% !important; }
        th, td { border: 1px solid #000 !important; -webkit-print-color-adjust: exact; }
        .bg-teal-50 { background-color: #f0fdfa !important; -webkit-print-color-adjust: exact; }
    }

    .table-input { width: 100%; background: transparent; border: none; outline: none; padding: 4px; text-align: center; }
    .table-input:focus { background: #f0fdfa; border-radius: 4px; }
    .footer-center { text-align: center !important; vertical-align: middle !important; }
</style>

<div class="w-full pb-10">
    {{-- Form Wrapper untuk Backend --}}
    <form id="formPenilaian" enctype="multipart/form-data">
        @csrf
        <div id="printArea" class="max-w-5xl mx-auto print-container">
            
            {{-- Card Judul Program --}}
            <div class="fade-up bg-white border border-gray-200 rounded-3xl p-8 mb-6 shadow-sm">
                <h2 class="text-3xl font-bold text-gray-800">Program Website Penjualan</h2>
                <p class="text-xl text-gray-500 mt-2">PT. Tiga Serangkai</p>
                <div class="mt-5">
                    <span class="bg-teal-50 text-teal-700 px-6 py-2 rounded-full text-sm font-semibold border border-teal-100 uppercase tracking-wide">
                        Frontend Developer
                    </span>
                </div>
            </div>

            {{-- Grid Nilai --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="fade-up delay-100 bg-white border border-gray-200 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center border-l-8 border-l-tsu-blue">
                    <h3 class="text-gray-600 font-semibold text-lg mb-2">Nilai Program</h3>
                    <span class="text-[100px] font-black text-tsu-blue leading-none tracking-tighter">87</span>
                    <p class="text-gray-400 mt-4 font-medium text-sm">Kuriman Tech, S.Kom, M.Kom.</p>
                </div>

                <div class="fade-up delay-200 bg-white border border-gray-200 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center border-l-8 border-l-tsu-teal">
                    <h3 class="text-gray-600 font-semibold text-lg mb-2">Nilai Dosen Pembimbing</h3>
                    <span class="text-[100px] font-black text-tsu-teal leading-none tracking-tighter">85</span>
                    <p class="text-gray-400 mt-4 font-medium text-sm">Wawan Laksito, S.Kom, M.M.</p>
                </div>
            </div>

            {{-- Komentar Pembimbing --}}
            <div class="fade-up delay-300 mb-10">
                <h3 class="text-xl font-bold text-gray-800 mb-4 px-2">Komentar Pembimbing</h3>
                <div class="bg-gray-50 border border-gray-100 rounded-3xl p-8 shadow-inner text-center md:text-left">
                    <p class="text-gray-600 leading-relaxed italic text-lg">
                        "Website magang penjualan ini sudah memenuhi seluruh kriteria penilaian yang telah ditetapkan. 
                        Layout website bagus, responsif, dan fitur-fitur sudah berfungsi dengan baik."
                    </p>
                    <div class="mt-6 text-right border-t border-gray-200 pt-4">
                        <p class="text-tsu-teal font-black text-lg">Wawan Laksito, S.Kom, M.M.</p>
                    </div>
                </div>
            </div>

            {{-- Tabel Konversi --}}
            <div class="fade-up delay-400 mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 px-2">Konversi Mata Kuliah</h3>
                <div class="overflow-hidden border border-gray-200 rounded-2xl shadow-sm">
                    <table class="w-full text-sm text-left bg-white">
                        <thead class="bg-gray-50 text-gray-700 uppercase font-bold text-xs">
                            <tr>
                                <th class="px-4 py-4 text-center border-b w-12">No</th>
                                <th class="px-4 py-4 border-b text-center">Nama Mata Kuliah</th>
                                <th class="px-4 py-4 border-b text-center w-40">Kode MK</th>
                                <th class="px-4 py-4 border-b text-center w-32">Konversi SKS</th>
                                <th class="px-4 py-4 border-b text-center w-32 bg-teal-50">Nilai (Dosen)</th>
                            </tr>
                        </thead>
                        <tbody id="conversionTableBody">
                            @for ($i = 1; $i <= 7; $i++)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 text-center font-semibold text-gray-500">{{ $i }}</td>
                                <td class="px-4 py-3">
                                    <input type="text" name="mk_name[]" placeholder="..." class="table-input">
                                </td>
                                <td class="px-4 py-3">
                                    <input type="text" name="mk_code[]" placeholder="Kode" class="table-input">
                                </td>
                                <td class="px-4 py-3">
                                    <input type="number" name="mk_sks[]" placeholder="0" class="table-input sks-input" oninput="calculateTotalSKS()">
                                </td>
                                <td class="px-4 py-3 bg-teal-50/30">
                                    <input type="text" value="-" disabled class="table-input font-bold text-tsu-teal">
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                        <tfoot class="bg-gray-100 font-bold text-gray-800">
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-right pr-10">TOTAL</td>
                                <td class="px-4 py-4 text-center footer-center text-tsu-blue" id="totalSKS">0</td>
                                <td class="px-4 py-4 text-center footer-center text-tsu-teal bg-teal-50/50" id="totalNilai">-</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        {{-- File Management Display --}}
        <div id="fileDisplayArea" class="max-w-5xl mx-auto mb-10 hidden fade-up">
            <div class="flex items-center justify-between mb-4 px-2">
                <h3 class="text-xl font-bold text-gray-800">File Terlampir (Sertifikat & Nilai)</h3>
                <button type="button" onclick="resetFiles()" class="text-xs font-bold text-red-500 hover:text-red-700 uppercase tracking-wider">Hapus Semua</button>
            </div>
            <div id="fileListContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                </div>
        </div>

        {{-- Group Tombol Utama --}}
        <div class="fade-up delay-600 max-w-5xl mx-auto flex flex-col md:flex-row gap-4 no-print px-4 md:px-0">
            {{-- Tombol Cetak (Secondary) --}}
            <button type="button" onclick="handlePrint()" class="flex-1 flex items-center justify-center gap-3 border-2 border-gray-300 text-gray-600 px-8 py-4 rounded-2xl font-bold hover:bg-gray-100 transition-all active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak PDF
            </button>

            {{-- Tombol Pilih File --}}
            <input type="file" id="fileSertifikat" name="files[]" class="hidden" accept=".pdf" multiple onchange="handleFileSelect(this)">
            <button type="button" id="mainUploadBtn" onclick="document.getElementById('fileSertifikat').click()" class="flex-1 flex items-center justify-center gap-3 border-2 border-tsu-teal text-tsu-teal px-8 py-4 rounded-2xl font-bold hover:bg-teal-50 transition-all active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span id="uploadBtnText">Upload File Magang</span>
            </button>
            
            {{-- TOMBOL FINAL: SIMPAN KE SISTEM --}}
            <button type="button" onclick="submitFinal()" class="flex-[1.5] flex items-center justify-center gap-3 bg-tsu-teal text-white px-8 py-4 rounded-2xl font-bold hover:bg-teal-800 transition-all shadow-xl active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Simpan & Kirim Penilaian
            </button>
        </div>
    </form>
</div>

<script>
    function calculateTotalSKS() {
        let total = 0;
        document.querySelectorAll('.sks-input').forEach(input => {
            total += parseInt(input.value) || 0;
        });
        document.getElementById('totalSKS').innerText = total;
    }

    // Fungsi Pilih File
    function handleFileSelect(input) {
        const files = input.files;
        const container = document.getElementById('fileListContainer');
        const displayArea = document.getElementById('fileDisplayArea');
        const btnText = document.getElementById('uploadBtnText');

        if (files.length === 0) return;
        if (files.length > 2) {
            Swal.fire('Terlalu Banyak!', 'Maksimal 2 file PDF saja.', 'error');
            input.value = '';
            return;
        }

        container.innerHTML = '';
        displayArea.classList.remove('hidden');

        Array.from(files).forEach((file) => {
            container.innerHTML += `
                <div class="bg-white border border-gray-200 p-4 rounded-2xl shadow-sm flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="bg-red-50 text-red-500 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm font-bold text-gray-800 truncate w-40 sm:w-64">${file.name}</p>
                            <p class="text-[10px] text-green-600 font-bold uppercase tracking-wider">Siap Dikirim</p>
                        </div>
                    </div>
                </div>
            `;
        });
        btnText.innerText = "Ganti File";
    }

    // Fungsi Reset
    function resetFiles() {
        document.getElementById('fileSertifikat').value = '';
        document.getElementById('fileDisplayArea').classList.add('hidden');
        document.getElementById('uploadBtnText').innerText = "Upload File Magang";
    }

    // FUNGSI SUBMIT KE BACKEND
    function submitFinal() {
        const fileInput = document.getElementById('fileSertifikat');
        
        // Validasi Minimal 1 file
        if (fileInput.files.length === 0) {
            Swal.fire('File Kosong', 'Harap upload sertifikat magang terlebih dahulu.', 'warning');
            return;
        }

        Swal.fire({
            title: 'Kirim Penilaian?',
            text: "Data konversi dan file akan dikirim ke server.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Kirim Sekarang',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading
                Swal.fire({
                    title: 'Sedang Mengirim...',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });

                // Simulasi pengiriman form menggunakan FormData (untuk dihubungkan ke backend)
                const formData = new FormData(document.getElementById('formPenilaian'));
                
                // Di sini nanti AJAX / Axios kamu:
                // axios.post('/api/penilaian', formData)...

                setTimeout(() => {
                    Swal.fire({
                        title: 'Berhasil Terkirim!',
                        text: 'Penilaian dan file berhasil disimpan di sistem.',
                        icon: 'success',
                        confirmButtonColor: '#086375'
                    });
                }, 2000);
            }
        });
    }

    function handlePrint() {
        Swal.fire({
            title: 'Cetak Laporan?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Cetak Sekarang'
        }).then((result) => {
            if (result.isConfirmed) {
                window.print();
            }
        });
    }
</script>
@endsection
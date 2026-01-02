@extends('layouts.app')

@section('title', 'Penilaian Magang')

@section('header_title', 'Penilaian')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    @media print {
        body * {
            visibility: hidden;
            box-shadow: none !important;
        }
        
        #printArea, #printArea * {
            visibility: visible !important;
        }

        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            display: block !important;
        }

        .fade-up, .delay-100, .delay-200, .delay-300 {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
            animation: none !important;
        }

        .no-print, aside, nav, header, button {
            display: none !important;
        }

        table {
            border-collapse: collapse !important;
            width: 100% !important;
        }
        th, td {
            border: 1px solid #000 !important;
            -webkit-print-color-adjust: exact;
        }
        
        .bg-teal-50 {
            background-color: #f0fdfa !important;
            -webkit-print-color-adjust: exact;
        }
    }

    .table-input {
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
        padding: 4px;
        text-align: center;
    }
    .table-input:focus {
        background: #f0fdfa;
        border-radius: 4px;
    }
    .footer-center {
        text-align: center !important;
        vertical-align: middle !important;
    }
</style>

<div class="w-full pb-10">
    <div id="printArea" class="max-w-5xl mx-auto fade-up print-container">
        
        <div class="bg-white border border-gray-200 rounded-3xl p-8 mb-6 shadow-sm">
            <h2 class="text-3xl font-bold text-gray-800">Program Website Penjualan</h2>
            <p class="text-xl text-gray-500 mt-2">PT. Tiga Serangkai</p>
            <div class="mt-5">
                <span class="bg-teal-50 text-teal-700 px-6 py-2 rounded-full text-sm font-semibold border border-teal-100 uppercase tracking-wide">
                    Frontend Developer
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white border border-gray-200 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center border-l-8 border-l-tsu-blue">
                <h3 class="text-gray-600 font-semibold text-lg mb-2">Nilai Program</h3>
                <span class="text-[100px] font-black text-tsu-blue leading-none tracking-tighter">87</span>
                <p class="text-gray-400 mt-4 font-medium text-sm">Kuriman Tech, S.Kom, M.Kom.</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center border-l-8 border-l-tsu-teal">
                <h3 class="text-gray-600 font-semibold text-lg mb-2">Nilai Dosen Pembimbing</h3>
                <span class="text-[100px] font-black text-tsu-teal leading-none tracking-tighter">85</span>
                <p class="text-gray-400 mt-4 font-medium text-sm">Wawan Laksito, S.Kom, M.M.</p>
            </div>
        </div>

        <div class="mb-10">
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

        <div class="mb-6">
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
                                <input type="text" placeholder="..." class="table-input">
                            </td>
                            <td class="px-4 py-3">
                                <input type="text" placeholder="Kode" class="table-input">
                            </td>
                            <td class="px-4 py-3">
                                <input type="number" placeholder="0" class="table-input sks-input" oninput="calculateTotalSKS()">
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

        <div class="flex justify-end mb-10 no-print">
            <button onclick="saveConversion()" class="flex items-center gap-2 bg-gray-800 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-black transition-all shadow-md active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Simpan Konversi
            </button>
        </div>
    </div>

    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row gap-4 no-print px-4 md:px-0">
        <button onclick="handlePrint()" class="group flex items-center justify-center gap-3 bg-tsu-teal text-white px-8 py-4 rounded-2xl font-bold hover:bg-teal-700 transition-all shadow-lg active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak Laporan Nilai (PDF)
        </button>
        
        <input type="file" id="fileSertifikat" class="hidden" accept=".pdf,.jpg,.png" onchange="uploadSuccess()">
        <button onclick="document.getElementById('fileSertifikat').click()" class="flex items-center justify-center gap-3 border-2 border-tsu-teal text-tsu-teal px-8 py-4 rounded-2xl font-bold hover:bg-teal-50 transition-all active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
            Upload Sertifikat Magang
        </button>
    </div>
</div>

<script>
    function calculateTotalSKS() {
        let total = 0;
        const inputs = document.querySelectorAll('.sks-input');
        inputs.forEach(input => {
            let val = parseInt(input.value) || 0;
            total += val;
        });
        document.getElementById('totalSKS').innerText = total;
    }

    function saveConversion() {
        Swal.fire({
            title: 'Simpan Konversi?',
            text: "Data konversi akan tersimpan di sistem.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1f2937',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({ title: 'Berhasil!', text: 'Data konversi mata kuliah telah disimpan.', icon: 'success', timer: 1500, showConfirmButton: false });
            }
        });
    }

    function uploadSuccess() {
        const fileInput = document.getElementById('fileSertifikat');
        if (fileInput.files.length > 0) {
            Swal.fire({ title: 'Berhasil!', text: 'Sertifikat berhasil diunggah.', icon: 'success', confirmButtonColor: '#086375' });
        }
    }

    function handlePrint() {
        const allInputs = document.querySelectorAll('input');
        allInputs.forEach(input => {
            input.setAttribute('value', input.value);
        });

        Swal.fire({
            title: 'Cetak Laporan?',
            text: "Pastikan data tabel sudah terisi.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Cetak Sekarang'
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(() => {
                    window.print();
                }, 300);
            }
        });
    }
</script>
@endsection
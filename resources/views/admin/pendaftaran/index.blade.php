@extends('layouts.app')

@section('title', 'ACC Pendaftaran Mahasiswa')
@section('header_title', 'Verifikasi Pendaftaran')

@section('content')
<div class="space-y-6">
    <div class="flex gap-4 fade-up">
        <button class="px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20">Semua Pendaftar</button>
        <button class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100">Menunggu Verifikasi</button>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Pilihan</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Berkas (Klik untuk Cek)</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Tanggal Daftar</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">AM</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Andi Maulana</p>
                                    <p class="text-[10px] text-gray-400">22430099</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-bold text-gray-600 bg-gray-100 px-3 py-1 rounded-lg">Web Development</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewDoc('CV - Andi Maulana', 'CV')" class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold hover:bg-purple-100 transition">📄 CV</button>
                                <button onclick="previewDoc('KRS - Andi Maulana', 'KRS')" class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold hover:bg-orange-100 transition">📄 KRS</button>
                                <button onclick="previewDoc('Transkrip - Andi Maulana', 'Transkrip')" class="p-2 bg-green-50 text-green-600 rounded-xl text-[10px] font-bold hover:bg-green-100 transition">📄 Trnskp</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-500 font-medium">12 Jan 2024</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <button onclick="handleAcc('Andi Maulana')" class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md shadow-tsu-teal/20 transition">ACC</button>
                                <button onclick="handleReject('Andi Maulana')" class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalPreview" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/60 backdrop-blur-md p-4">
    <div class="bg-white w-full max-w-4xl h-[90vh] rounded-[2.5rem] shadow-2xl overflow-hidden transform transition-all scale-95 duration-300 flex flex-col">
        <div class="p-6 bg-white border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-800" id="previewTitle">Preview Dokumen</h3>
            <button onclick="closePreview()" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">✕</button>
        </div>
        <div class="flex-1 bg-gray-200 relative">
            <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-500">
                <span class="text-5xl mb-4">📄</span>
                <p class="font-bold" id="docTypeDisplay">Memuat Dokumen...</p>
                <p class="text-xs">Backend Link: /storage/mahasiswa/dokumen.pdf</p>
                <div class="mt-6 w-1/2 h-4 bg-gray-300 rounded-full animate-pulse"></div>
                <div class="mt-2 w-1/3 h-4 bg-gray-300 rounded-full animate-pulse"></div>
            </div>
            </div>
        <div class="p-6 bg-gray-50 border-t flex justify-end">
            <button onclick="closePreview()" class="px-8 py-3 bg-gray-800 text-white font-bold rounded-2xl">Selesai Meninjau</button>
        </div>
    </div>
</div>

<script>
    function previewDoc(title, type) {
        const modal = document.getElementById('modalPreview');
        document.getElementById('previewTitle').innerText = title;
        document.getElementById('docTypeDisplay').innerText = "Menampilkan File " + type + "...";
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
    }

    function closePreview() {
        const modal = document.getElementById('modalPreview');
        modal.querySelector('div').classList.replace('scale-100', 'scale-95');
        setTimeout(() => modal.classList.replace('flex', 'hidden'), 200);
    }

    function handleAcc(name) {
        Swal.fire({
            title: 'ACC Mahasiswa?',
            text: "Mahasiswa " + name + " akan terdaftar di program ini.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, ACC Sekarang!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Berhasil!', name + ' telah diterima di program.', 'success');
            }
        })
    }

    function handleReject(name) {
        Swal.fire({
            title: 'Tolak Pendaftaran?',
            text: "Berikan alasan penolakan untuk " + name,
            input: 'textarea',
            inputPlaceholder: 'Alasan penolakan (misal: Transkrip tidak memenuhi syarat)',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            confirmButtonText: 'Tolak Pendaftaran'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Ditolak', 'Pendaftaran telah ditolak.', 'error');
            }
        })
    }
</script>
@endsection

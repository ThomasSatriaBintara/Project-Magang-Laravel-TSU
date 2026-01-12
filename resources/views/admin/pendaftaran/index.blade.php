@extends('layouts.app')

@section('title', 'ACC Pendaftaran Mahasiswa')
@section('header_title', 'Verifikasi Pendaftaran')

@section('content')
<div class="space-y-6">
    <div class="flex gap-4 fade-up">
        <button id="tab-all-btn" onclick="filterTab('pending')" class="px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all">
            Semua Pendaftar (Pending)
        </button>
        <button id="tab-lolos-btn" onclick="filterTab('lolos')" class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100 transition-all">
            Pendaftar Lolos
        </button>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Pilihan</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Berkas</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Status/Aksi</th>
                    </tr>
                </thead>
                <tbody id="pendaftaran-body" class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="pending" id="row-thomas">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">TS</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Thomas Satria Bintara</p>
                                    <p class="text-[10px] text-gray-400">22430035</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="viewProgramDetail('Project Website Penjualan', 'Pengembangan website e-commerce menggunakan Laravel dan Tailwind CSS. Fokus pada integrasi payment gateway.')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition">
                                Project Website Penjualan ℹ️
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewDoc('CV - Thomas', 'CV')" class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄 CV</button>
                                <button onclick="previewDoc('KRS - Thomas', 'KRS')" class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄 KRS</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center action-cell">
                            <div class="flex justify-center gap-2 btn-group">
                                <button onclick="handleAcc('Thomas Satria Bintara', 'row-thomas')" class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md shadow-tsu-teal/20 transition">ACC</button>
                                <button onclick="handleReject('Thomas Satria Bintara', 'row-thomas')" class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div id="empty-state" class="hidden p-20 text-center text-gray-400">
                <span class="text-5xl block mb-4">📂</span>
                <p class="font-bold" id="empty-text">Belum ada data pendaftar.</p>
            </div>
        </div>
    </div>
</div>

<div id="modalPreview" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/60 backdrop-blur-md p-4">
    <div class="bg-white w-full max-w-4xl h-[80vh] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col">
        <div class="p-6 bg-white border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-800" id="previewTitle">Preview Dokumen</h3>
            <button onclick="closePreview()" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">✕</button>
        </div>
        <div class="flex-1 bg-gray-100 flex items-center justify-center">
            <p class="text-gray-400 font-bold" id="docTypeDisplay">Memuat File...</p>
        </div>
    </div>
</div>

<script>
    let currentActiveTab = 'pending';

    function filterTab(status) {
        currentActiveTab = status;
        const rows = document.querySelectorAll('.mhs-row');
        const btnPending = document.getElementById('tab-all-btn');
        const btnLolos = document.getElementById('tab-lolos-btn');
        const emptyState = document.getElementById('empty-state');
        const emptyText = document.getElementById('empty-text');
        let count = 0;

        // Toggle UI Button
        if(status === 'pending') {
            btnPending.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20";
            btnLolos.className = "px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 border border-gray-100";
            emptyText.innerText = "Tidak ada pendaftaran baru yang perlu diproses.";
        } else {
            btnLolos.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20";
            btnPending.className = "px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 border border-gray-100";
            emptyText.innerText = "Belum ada mahasiswa yang diloloskan.";
        }

        rows.forEach(row => {
            if (row.getAttribute('data-status') === status) {
                row.style.display = "";
                count++;
            } else {
                row.style.display = "none";
            }
        });

        emptyState.style.display = count === 0 ? "block" : "none";
    }

    function handleAcc(name, rowId) {
        Swal.fire({
            title: 'ACC Mahasiswa?',
            text: `Apakah anda yakin meloloskan ${name}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Loloskan!'
        }).then((result) => {
            if (result.isConfirmed) {
                const row = document.getElementById(rowId);
                row.setAttribute('data-status', 'lolos'); // Ubah status data
                
                // Ubah kolom aksi jadi badge permanen
                row.querySelector('.action-cell').innerHTML = `
                    <span class="inline-block px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest">
                        ✅ LOLOS SELEKSI
                    </span>
                `;

                Swal.fire('Berhasil!', `${name} telah dipindahkan ke daftar pendaftar lolos.`, 'success');
                
                // Jalankan filter ulang agar baris yang baru di-ACC langsung hilang dari tab pending
                filterTab(currentActiveTab);
            }
        })
    }

    function viewProgramDetail(title, desc) {
        Swal.fire({
            title: `<span class="text-tsu-teal">${title}</span>`,
            html: `<div class="text-left text-sm text-gray-600 p-4 bg-gray-50 rounded-2xl">${desc}</div>`,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Tutup'
        });
    }

    function previewDoc(title, type) {
        const modal = document.getElementById('modalPreview');
        document.getElementById('previewTitle').innerText = title;
        document.getElementById('docTypeDisplay').innerText = `Preview ${type} Mahasiswa`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closePreview() {
        document.getElementById('modalPreview').classList.replace('flex', 'hidden');
    }

    function handleReject(name, rowId) {
        Swal.fire({
            title: 'Tolak Pendaftaran?',
            input: 'textarea',
            inputPlaceholder: 'Alasan penolakan...',
            showCancelButton: true,
            confirmButtonColor: '#EF4444'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(rowId).remove();
                Swal.fire('Ditolak', 'Data pendaftaran telah dihapus.', 'error');
                filterTab(currentActiveTab);
            }
        })
    }

    window.onload = () => filterTab('pending');
</script>
@endsection
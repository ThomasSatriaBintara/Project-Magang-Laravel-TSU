@extends('layouts.app')

@section('title', 'ACC Pendaftaran Mahasiswa')
@section('header_title', 'Verifikasi Pendaftaran')

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap gap-4 fade-up">
        <button id="tab-all-btn" onclick="filterTab('pending')" class="px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all">
            Validasi Pendaftar
        </button>
        <button id="tab-lolos-btn" onclick="filterTab('lolos')" class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100 transition-all">
            Pendaftar Lolos
        </button>
        <button id="tab-tolak-btn" onclick="filterTab('rejected')" class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100 transition-all">
            Pendaftar Ditolak
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
                            <button onclick="viewProgramDetail('Project Website Penjualan', 'PT. Digital Solusi Indonesia', 'Fullstack Developer')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                <span>Project Website Penjualan</span>
                                <span class="text-[10px]">ℹ️</span>
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewDoc('CV - Thomas', 'CV')" class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄 CV</button>
                                <button onclick="previewDoc('KRS - Thomas', 'KRS')" class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄 KRS</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center action-cell">
                            <div class="flex justify-center gap-2">
                                <button onclick="handleAcc('Thomas Satria Bintara', 'row-thomas')" class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md">ACC</button>
                                <button onclick="handleReject('Thomas Satria Bintara', 'row-thomas')" class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="pending" id="row-lucky">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center font-bold text-emerald-600">LA</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Lucky Ardiansyah</p>
                                    <p class="text-[10px] text-gray-400">22430010</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="viewProgramDetail('AI Research & Dev', 'Tech Innovators Corp', 'Data Scientist')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                <span>AI Research & Dev</span>
                                <span class="text-[10px]">ℹ️</span>
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewDoc('CV - Lucky', 'CV')" class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄 CV</button>
                                <button onclick="previewDoc('Transkrip - Lucky', 'Transkrip')" class="p-2 bg-green-50 text-green-600 rounded-xl text-[10px] font-bold">📄 TRNSK</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center action-cell">
                            <div class="flex justify-center gap-2">
                                <button onclick="handleAcc('Lucky Ardiansyah', 'row-lucky')" class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md">ACC</button>
                                <button onclick="handleReject('Lucky Ardiansyah', 'row-lucky')" class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="pending" id="row-dewa">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-600">DW</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Dewa Saputra</p>
                                    <p class="text-[10px] text-gray-400">22430055</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="viewProgramDetail('UI/UX Design Masterclass', 'Creative Studio XYZ', 'Junior Designer')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                <span>UI/UX Design Masterclass</span>
                                <span class="text-[10px]">ℹ️</span>
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewDoc('CV - Dewa', 'CV')" class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄 CV</button>
                                <button onclick="previewDoc('KRS - Dewa', 'KRS')" class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄 KRS</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center action-cell">
                            <div class="flex justify-center gap-2">
                                <button onclick="handleAcc('Dewa Saputra', 'row-dewa')" class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md">ACC</button>
                                <button onclick="handleReject('Dewa Saputra', 'row-dewa')" class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
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
    <div class="bg-white w-full max-w-4xl h-[85vh] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col">
        <div class="p-6 bg-white border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-800" id="previewTitle">Preview Dokumen</h3>
            <button onclick="closePreview()" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">✕</button>
        </div>
        <div class="flex-1 bg-gray-100 flex flex-col items-center justify-center text-gray-400">
            <span class="text-5xl mb-2">📄</span>
            <p class="font-bold" id="docTypeDisplay">Memuat File...</p>
        </div>
        <div class="p-6 bg-gray-50 border-t flex justify-end">
            <button onclick="closePreview()" class="px-8 py-3 bg-gray-800 text-white font-bold rounded-2xl">Tutup Preview</button>
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
        const btnTolak = document.getElementById('tab-tolak-btn');
        const emptyState = document.getElementById('empty-state');
        const emptyText = document.getElementById('empty-text');
        let count = 0;

        [btnPending, btnLolos, btnTolak].forEach(btn => {
            btn.className = "px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 border border-gray-100 transition-all";
        });

        if(status === 'pending') {
            btnPending.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all";
            emptyText.innerText = "Tidak ada pendaftaran baru.";
        } else if(status === 'lolos') {
            btnLolos.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all";
            emptyText.innerText = "Belum ada mahasiswa yang diloloskan.";
        } else {
            btnTolak.className = "px-6 py-2 bg-red-500 text-white rounded-full text-xs font-bold shadow-lg shadow-red-500/20 transition-all";
            emptyText.innerText = "Tidak ada pendaftar yang ditolak.";
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

    function viewProgramDetail(name, company, role) {
        Swal.fire({
            title: '<span class="text-lg font-bold">Detail Program Magang</span>',
            html: `
                <div class="text-left space-y-4 p-2">
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nama Program</p>
                        <p class="text-sm font-bold text-gray-800">${name}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Perusahaan</p>
                        <p class="text-sm font-bold text-tsu-teal">${company}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Role Pekerjaan</p>
                        <p class="text-sm font-bold text-gray-800">${role}</p>
                    </div>
                </div>
            `,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Tutup'
        });
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
                row.setAttribute('data-status', 'lolos');
                row.querySelector('.action-cell').innerHTML = `
                    <span class="inline-block px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest">
                        ✅ LOLOS SELEKSI
                    </span>
                `;
                Swal.fire('Berhasil!', `${name} telah lolos.`, 'success');
                filterTab(currentActiveTab);
            }
        })
    }

    function handleReject(name, rowId) {
        Swal.fire({
            title: 'Tolak Pendaftaran?',
            text: `Berikan alasan penolakan untuk ${name}`,
            input: 'textarea',
            showCancelButton: true,
            confirmButtonColor: '#EF4444'
        }).then((result) => {
            if (result.isConfirmed) {
                const row = document.getElementById(rowId);
                const reason = result.value || "Alasan tidak disertakan";
                row.setAttribute('data-status', 'rejected');
                row.querySelector('.action-cell').innerHTML = `
                    <div class="flex flex-col items-center">
                        <span class="inline-block px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest">❌ DITOLAK</span>
                        <p class="text-[9px] text-gray-400 italic">Alasan: ${reason}</p>
                    </div>
                `;
                Swal.fire('Ditolak', 'Mahasiswa dipindahkan ke daftar ditolak.', 'error');
                filterTab(currentActiveTab);
            }
        })
    }

    function previewDoc(title, type) {
        const modal = document.getElementById('modalPreview');
        document.getElementById('previewTitle').innerText = title;
        document.getElementById('docTypeDisplay').innerText = `Preview ${type} Mahasiswa`;
        modal.classList.replace('hidden', 'flex');
    }

    function closePreview() {
        document.getElementById('modalPreview').classList.replace('flex', 'hidden');
    }

    window.onload = () => filterTab('pending');
</script>
@endsection
@extends('layouts.app')

@section('title', 'Validasi Logbook - Dosen')

@section('header_title', 'Validasi Logbook Mahasiswa')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="fade-up bg-white p-6 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-5">
            <div class="bg-orange-50 text-orange-500 p-4 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-400">Total Perlu Validasi</p>
                <h4 id="count-pending" class="text-2xl font-black text-gray-800">10</h4>
            </div>
        </div>
        <div class="fade-up delay-100 bg-white p-6 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-5">
            <div class="bg-green-50 text-green-500 p-4 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-400">Total Sudah Divalidasi</p>
                <h4 id="count-success" class="text-2xl font-black text-gray-800">0</h4>
            </div>
        </div>
    </div>

    <div class="fade-up delay-200 bg-white border border-gray-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <h3 class="text-xl font-black text-gray-800">Daftar Mahasiswa Bimbingan</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest font-black">
                        <th class="px-8 py-5">Mahasiswa</th>
                        <th class="px-8 py-5">Program</th>
                        <th class="px-8 py-5">Status Logbook</th>
                        <th class="px-8 py-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="group hover:bg-gray-50 transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name=Thomas+Satria+Bintara&background=0d9488&color=fff" class="w-12 h-12 rounded-2xl shadow-sm">
                                <div>
                                    <p class="font-bold text-gray-800">Thomas Satria Bintara</p>
                                    <p class="text-xs text-gray-400">22430001</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-sm font-medium text-gray-600">Frontend Developer</td>
                        <td class="px-8 py-6">
                            <span class="bg-orange-100 text-orange-600 px-4 py-1.5 rounded-full text-xs font-bold">3 Perlu Validasi</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <button onclick="showDetailLogbook('Thomas Satria Bintara')" class="bg-tsu-blue text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-blue-100">Periksa</button>
                        </td>
                    </tr>

                    <tr class="group hover:bg-gray-50 transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name=Lucky+Reza&background=3b82f6&color=fff" class="w-12 h-12 rounded-2xl shadow-sm">
                                <div>
                                    <p class="font-bold text-gray-800">Lucky Reza</p>
                                    <p class="text-xs text-gray-400">22430002</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-sm font-medium text-gray-600">UI/UX Designer</td>
                        <td class="px-8 py-6">
                            <span class="bg-orange-100 text-orange-600 px-4 py-1.5 rounded-full text-xs font-bold">5 Perlu Validasi</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <button onclick="showDetailLogbook('Lucky Reza')" class="bg-tsu-blue text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-blue-100">Periksa</button>
                        </td>
                    </tr>

                    <tr class="group hover:bg-gray-50 transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name=Dewanata&background=f59e0b&color=fff" class="w-12 h-12 rounded-2xl shadow-sm">
                                <div>
                                    <p class="font-bold text-gray-800">Dewanata</p>
                                    <p class="text-xs text-gray-400">22430003</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-sm font-medium text-gray-600">Backend Developer</td>
                        <td class="px-8 py-6">
                            <span class="bg-orange-100 text-orange-600 px-4 py-1.5 rounded-full text-xs font-bold">2 Perlu Validasi</span>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <button onclick="showDetailLogbook('Dewanata')" class="bg-tsu-blue text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-blue-100">Periksa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalDetail" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[99] hidden flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden animate-zoom-in">
        <div class="p-8 border-b flex justify-between items-center bg-gray-50">
            <div>
                <h3 class="text-2xl font-black text-gray-800" id="mhsName">Logbook Mahasiswa</h3>
                <p class="text-gray-500 text-sm italic">Hanya menampilkan logbook Mingguan & Bulanan.</p>
            </div>
            <button onclick="closeModal()" class="p-3 bg-white rounded-2xl shadow-sm hover:bg-red-50 hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        
        <div class="p-8 max-h-[60vh] overflow-y-auto space-y-6">
            
            <div class="logbook-card p-6 border border-gray-100 rounded-[2rem] bg-gray-50/50 flex flex-col md:flex-row justify-between items-start gap-4 transition-all">
                <div class="space-y-3">
                    <div class="flex gap-2">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase">Logbook Mingguan</span>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">01 Jan 2026 - 07 Jan 2026</span>
                    </div>
                    <h5 class="font-bold text-gray-800 text-lg">Penyelesaian Modul Autentikasi</h5>
                    <p class="text-gray-600 text-sm leading-relaxed">Berhasil mengimplementasikan sistem login multi-role dan integrasi dengan middleware Laravel.</p>
                </div>
                <div class="flex gap-2 shrink-0 action-area">
                    <button onclick="validasiAction(this)" class="bg-tsu-teal text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-teal-700 transition">Validasi</button>
                    <button onclick="rejectAction(this)" class="bg-white border border-red-200 text-red-500 px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-red-50 transition">Tolak</button>
                </div>
            </div>

            <div class="logbook-card p-6 border border-gray-100 rounded-[2rem] bg-gray-50/50 flex flex-col md:flex-row justify-between items-start gap-4 transition-all">
                <div class="space-y-3">
                    <div class="flex gap-2">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase">Logbook Bulanan</span>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">01 Jan 2026 - 31 Jan 2026</span>
                    </div>
                    <h5 class="font-bold text-gray-800 text-lg">Laporan Kemajuan Bulan Januari</h5>
                    <p class="text-gray-600 text-sm leading-relaxed">Seluruh target sprint 1 dan 2 telah terpenuhi dengan persentase penyelesaian sebesar 90%.</p>
                </div>
                <div class="flex gap-2 shrink-0 action-area">
                    <button onclick="validasiAction(this)" class="bg-tsu-teal text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-teal-700 transition">Validasi</button>
                    <button onclick="rejectAction(this)" class="bg-white border border-red-200 text-red-500 px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-red-50 transition">Tolak</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    let pendingCount = 10;
    let successCount = 0;

    function updateStats() {
        document.getElementById('count-pending').innerText = pendingCount;
        document.getElementById('count-success').innerText = successCount;
    }

    function showDetailLogbook(name) {
        document.getElementById('mhsName').innerText = "Logbook: " + name;
        document.getElementById('modalDetail').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalDetail').classList.add('hidden');
    }

    function validasiAction(btn) {
        Swal.fire({
            title: 'Validasi Logbook?',
            text: "Konfirmasi bahwa laporan ini sudah sesuai.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d9488',
            confirmButtonText: 'Ya, Validasi!'
        }).then((result) => {
            if (result.isConfirmed) {
                pendingCount--;
                successCount++;
                updateStats();

                const actionArea = btn.closest('.action-area');
                actionArea.innerHTML = '<span class="text-green-500 font-bold flex items-center gap-1 text-sm animate-bounce"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg> Berhasil Validasi</span>';
                
                Swal.fire('Tervalidasi!', 'Statistik telah diperbarui.', 'success');
            }
        });
    }

    function rejectAction(btn) {
        Swal.fire({
            title: 'Tolak Logbook?',
            input: 'textarea',
            inputPlaceholder: 'Berikan alasan penolakan...',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Kirim Revisi'
        }).then((result) => {
            if (result.isConfirmed) {
                pendingCount--;
                updateStats();
                const actionArea = btn.closest('.action-area');
                actionArea.innerHTML = '<span class="text-red-500 font-bold flex items-center gap-1 text-sm">❌ Menunggu Revisi</span>';
                Swal.fire('Dikirim', 'Mahasiswa akan segera merevisi.', 'info');
            }
        });
    }

    window.onclick = function(event) {
        let modal = document.getElementById('modalDetail');
        if (event.target == modal) closeModal();
    }
</script>
@endsection
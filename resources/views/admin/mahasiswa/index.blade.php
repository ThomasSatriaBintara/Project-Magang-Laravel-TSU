@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('header_title', 'Database Mahasiswa')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 fade-up">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Manajemen Data Mahasiswa</h3>
            <p class="text-sm text-gray-500">Total 120 mahasiswa terdaftar dalam sistem</p>
        </div>
        <div class="relative w-full md:w-72">
            <input type="text" placeholder="Cari Nama atau NIM..." 
                   class="w-full bg-white border-none rounded-2xl py-3 px-11 shadow-sm focus:ring-2 focus:ring-tsu-teal transition">
            <span class="absolute left-4 top-3.5 text-gray-400">🔍</span>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Kontak & Email</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Saat Ini</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Berkas Inti</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Detail</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-tsu-teal/10 flex items-center justify-center font-bold text-tsu-teal">TS</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Thomas Satria</p>
                                    <p class="text-[10px] text-gray-400">NIM: 22430035</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-gray-700">thomas@student.ac.id</p>
                            <p class="text-[10px] text-gray-400">0812-3456-7890</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-tsu-teal uppercase tracking-wider">Magang Aktif</span>
                                <span class="text-xs font-medium text-gray-600">Fullstack Web - PT. Digital Optima</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewFile('CV', 'Thomas Satria')" class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition" title="Lihat CV">📄</button>
                                <button onclick="previewFile('KRS', 'Thomas Satria')" class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition" title="Lihat KRS">📋</button>
                                <button onclick="previewFile('Transkrip', 'Thomas Satria')" class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition" title="Lihat Transkrip">📊</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="viewFullDetail('Thomas Satria')" class="text-gray-400 hover:text-tsu-teal transition text-lg">👁️</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-tsu-blue/10 flex items-center justify-center font-bold text-tsu-blue">LA</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Lucky Ardiansyah</p>
                                    <p class="text-[10px] text-gray-400">NIM: 22430010</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs font-bold text-gray-700">lucky.a@student.ac.id</p>
                            <p class="text-[10px] text-gray-400">0899-8877-6655</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Belum Ada Program</span>
                                <span class="text-xs font-medium text-gray-300">-</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button onclick="previewFile('CV', 'Lucky Ardiansyah')" class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition">📄</button>
                                <button onclick="previewFile('KRS', 'Lucky Ardiansyah')" class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition">📋</button>
                                <button onclick="previewFile('Transkrip', 'Lucky Ardiansyah')" class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">📊</button>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="viewFullDetail('Lucky Ardiansyah')" class="text-gray-400 hover:text-tsu-teal transition text-lg">👁️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalDetailMhs" class="fixed inset-0 z-[70] hidden justify-end bg-black/50 backdrop-blur-sm">
    <div class="bg-white w-full max-w-lg h-full shadow-2xl transform transition-transform translate-x-full duration-300 overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-bold text-gray-800">Profil Lengkap</h3>
                <button onclick="closeDetailMhs()" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">✕</button>
            </div>

            <div class="text-center mb-10">
                <div class="w-24 h-24 rounded-3xl bg-tsu-teal mx-auto mb-4 flex items-center justify-center text-3xl font-bold text-white shadow-xl shadow-tsu-teal/20" id="detailInitial">TS</div>
                <h4 class="text-2xl font-bold text-gray-800" id="detailName">Thomas Satria</h4>
                <p class="text-gray-400 font-medium" id="detailNIM">22430035</p>
            </div>

            <div class="space-y-6">
                <div class="bg-gray-50 p-6 rounded-[2rem] border border-gray-100">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-4 tracking-widest">Informasi Akademik</p>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Program Studi</span>
                            <span class="text-sm font-bold text-gray-800">Informatika</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Semester</span>
                            <span class="text-sm font-bold text-gray-800">6 (Enam)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">IPK Terakhir</span>
                            <span class="text-sm font-bold text-tsu-teal">3.85</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-[2rem] border border-gray-100">
                    <p class="text-[10px] font-bold text-gray-400 uppercase mb-4 tracking-widest">Dokumen Pendukung</p>
                    <div class="grid grid-cols-1 gap-3">
                        <button class="w-full py-3 bg-white border border-gray-200 rounded-xl text-xs font-bold text-gray-700 hover:border-tsu-teal hover:text-tsu-teal transition flex items-center justify-between px-4">
                            <span>📄 Curriculum Vitae (CV)</span>
                            <span class="text-gray-300">→</span>
                        </button>
                        <button class="w-full py-3 bg-white border border-gray-200 rounded-xl text-xs font-bold text-gray-700 hover:border-tsu-teal hover:text-tsu-teal transition flex items-center justify-between px-4">
                            <span>📋 Kartu Rencana Studi (KRS)</span>
                            <span class="text-gray-300">→</span>
                        </button>
                        <button class="w-full py-3 bg-white border border-gray-200 rounded-xl text-xs font-bold text-gray-700 hover:border-tsu-teal hover:text-tsu-teal transition flex items-center justify-between px-4">
                            <span>📊 Transkrip Nilai</span>
                            <span class="text-gray-300">→</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <button class="w-full mt-10 py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-black transition">Hubungi Mahasiswa</button>
        </div>
    </div>
</div>

<script>
    function viewFullDetail(name) {
        const modal = document.getElementById('modalDetailMhs');
        const content = modal.querySelector('div');
        
        document.getElementById('detailName').innerText = name;
        document.getElementById('detailInitial').innerText = name.split(' ').map(n => n[0]).join('');
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => content.classList.replace('translate-x-full', 'translate-x-0'), 10);
    }

    function closeDetailMhs() {
        const modal = document.getElementById('modalDetailMhs');
        const content = modal.querySelector('div');
        
        content.classList.replace('translate-x-0', 'translate-x-full');
        setTimeout(() => modal.classList.replace('flex', 'hidden'), 300);
    }

    function previewFile(type, mhs) {
        Swal.fire({
            title: 'Membuka ' + type,
            text: 'Menghubungkan ke server untuk file ' + mhs + '...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }
</script>
@endsection
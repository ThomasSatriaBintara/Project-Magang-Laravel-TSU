@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('header_title', 'Database Mahasiswa')

@section('content')
<div class="space-y-6">
    {{-- Header & Toolbar --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 fade-up">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Manajemen Data Mahasiswa</h3>
            <p class="text-sm text-gray-500">Total <span id="student-count" class="font-bold text-tsu-teal">0</span> mahasiswa terdaftar</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
            @php
                $adminRole = request()->get('role', 'fakultas');
            @endphp

            @if($adminRole == 'universitas')
            <select id="filterFakultas" class="bg-white border-none rounded-2xl py-3 px-4 shadow-sm focus:ring-2 focus:ring-tsu-teal text-sm font-medium text-gray-600 outline-none">
                <option value="">Semua Fakultas</option>
                <option value="FTI">Fakultas Teknologi Informasi</option>
                <option value="FEB">Fakultas Ekonomi & Bisnis</option>
                <option value="FK">Fakultas Kedokteran</option>
            </select>
            @endif

            @if($adminRole == 'universitas' || $adminRole == 'fakultas')
            <select id="filterProdi" class="bg-white border-none rounded-2xl py-3 px-4 shadow-sm focus:ring-2 focus:ring-tsu-teal text-sm font-medium text-gray-600 outline-none">
                <option value="">Semua Program Studi</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
            @endif

            <button onclick="exportToWord()" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl shadow-sm transition font-bold text-sm">
                <span>📄</span>
                <span>Export Word</span>
            </button>

            <div class="relative w-full md:w-64">
                <input type="text" id="searchInput" onkeyup="searchMahasiswa()" placeholder="Cari Nama atau NIM..." 
                       class="w-full bg-white border-none rounded-2xl py-3 px-11 shadow-sm focus:ring-2 focus:ring-tsu-teal transition text-sm">
                <span class="absolute left-4 top-3.5 text-gray-400">🔍</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="mahasiswaTable">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Kontak & Email</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Saat Ini</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Berkas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/50 transition mhs-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-tsu-teal/10 flex items-center justify-center font-bold text-tsu-teal">TS</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800 student-name">Thomas Satria Bintara</p>
                                    <p class="text-[10px] text-gray-400">NIM: 22430035</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs font-bold text-gray-700">thomas@tsu.ac.id</td>
                        <td class="px-6 py-4">
                            <button onclick="viewProgramDetail('Project Website Penjualan', 'PT. Digital Solusi Indonesia', 'Fullstack Developer')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                <span>Project Website Penjualan</span>
                                <span class="text-[10px]">ℹ️</span>
                            </button>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick="previewFile('CV', 'Thomas Satria Bintara')" class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition">📄</button>
                                <button onclick="previewFile('KRS', 'Thomas Satria Bintara')" class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition">📋</button>
                                <button onclick="previewFile('Transkrip', 'Thomas Satria Bintara')" class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">📊</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition mhs-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">LR</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800 student-name">Lucky Reza</p>
                                    <p class="text-[10px] text-gray-400">NIM: 22430010</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs font-bold text-gray-700">lucky@tsu.ac.id</td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-medium text-gray-400 italic">Belum Mengikuti Program</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick="previewFile('CV', 'Lucky Reza')" class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition">📄</button>
                                <button onclick="previewFile('KRS', 'Lucky Reza')" class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition">📋</button>
                                <button onclick="previewFile('Transkrip', 'Lucky Reza')" class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">📊</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 transition mhs-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-600">DW</div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800 student-name">Dewa Saputra</p>
                                    <p class="text-[10px] text-gray-400">NIM: 22430055</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs font-bold text-gray-700">dewa@tsu.ac.id</td>
                        <td class="px-6 py-4">
                            <button onclick="viewProgramDetail('UI/UX Design Masterclass', 'Creative Studio XYZ', 'Junior Designer')" 
                                    class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                <span>UI/UX Design Masterclass</span>
                                <span class="text-[10px]">ℹ️</span>
                            </button>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick="previewFile('CV', 'Dewanata')" class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition">📄</button>
                                <button onclick="previewFile('KRS', 'Dewanata')" class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition">📋</button>
                                <button onclick="previewFile('Transkrip', 'Dewanata')" class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">📊</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function updateStudentCount() {
        const rows = document.querySelectorAll('.mhs-row');
        let visibleCount = 0;
        rows.forEach(row => {
            if (row.style.display !== "none") visibleCount++;
        });
        document.getElementById('student-count').innerText = visibleCount;
    }

    function searchMahasiswa() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.mhs-row');
        
        rows.forEach(row => {
            const name = row.querySelector('.student-name').innerText.toLowerCase();
            const nim = row.innerText.toLowerCase();
            if (name.includes(input) || nim.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
        updateStudentCount();
    }

    function exportToWord() {
        const fakultas = document.getElementById('filterFakultas')?.value || 'Semua';
        const prodi = document.getElementById('filterProdi')?.value || 'Semua';
        
        let infoText = `Mengekspor data mahasiswa untuk:<br><b>Fakultas: ${fakultas}</b><br><b>Prodi: ${prodi}</b>`;
        
        Swal.fire({
            title: 'Generating Word File...',
            html: infoText,
            icon: 'info',
            showConfirmButton: false,
            timer: 2000,
            didOpen: () => {
                Swal.showLoading();
            }
        }).then(() => {
            Swal.fire({
                title: 'Berhasil!',
                text: 'File Word mahasiswa berhasil diunduh.',
                icon: 'success',
                confirmButtonColor: '#086375',
            });
            
            // Arahne ke route backendmu lukk
            // window.location.href = `/mahasiswa/export?fakultas=${fakultas}&prodi=${prodi}`;
        });
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

    function previewFile(type, mhs) {
        Swal.fire({
            title: 'Membuka ' + type,
            text: 'Menghubungkan ke server untuk file ' + mhs + '...',
            icon: 'info',
            timer: 1000,
            showConfirmButton: false
        });
    }

    const filterFakultas = document.getElementById('filterFakultas');
    const filterProdi = document.getElementById('filterProdi');

    if(filterFakultas) {
        filterFakultas.addEventListener('change', () => {
            Swal.fire({
                title: 'Memfilter Fakultas',
                text: 'Menampilkan data mahasiswa dari ' + filterFakultas.value,
                icon: 'success',
                timer: 800,
                showConfirmButton: false
            });
        });
    }

    if(filterProdi) {
        filterProdi.addEventListener('change', () => {
            Swal.fire({
                title: 'Memfilter Prodi',
                text: 'Menampilkan data mahasiswa program studi ' + filterProdi.value,
                icon: 'success',
                timer: 800,
                showConfirmButton: false
            });
        });
    }

    window.onload = updateStudentCount;
</script>
@endsection
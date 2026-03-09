@extends('layouts.app')

@section('title', 'Validasi Konversi Matkul - Admin Prodi')

@section('header_title', 'Validasi Konversi Mata Kuliah')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{
    showModal: false,
    selectedUsulan: null,
    // Data Dummy Usulan Mahasiswa
    usulans: [
        { id: 1, nama: 'Thomas Satria Bintara', nim: '22430035', tgl: '08 Maret 2026', file: '/images/dummy-usulan.jpg', status: 'Menunggu' },
        { id: 2, nama: 'Lucky Reza', nim: '22400005', tgl: '09 Maret 2026', file: '/images/dummy-usulan-2.jpg', status: 'Menunggu' },
        { id: 3, nama: 'Dewanata', nim: '22430033', tgl: '10 Maret 2026', file: '/images/dummy-usulan-3.jpg', status: 'Menunggu' }
    ],
    // State untuk form input matkul
    konversiMatkul: [
        { kode: '', nama: '', sks: '' }
    ],
    addMatkul() {
        this.konversiMatkul.push({ kode: '', nama: '', sks: '' });
    },
    removeMatkul(index) {
        this.konversiMatkul.splice(index, 1);
    },
    openValidasi(usulan) {
        this.selectedUsulan = usulan;
        this.showModal = true;
    },
    submitValidasi() {
        Swal.fire({
            title: 'Simpan Konversi?',
            text: 'Pastikan data mata kuliah sudah sesuai dengan bukti gambar.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Validasi'
        }).then((result) => {
            if (result.isConfirmed) {
                this.selectedUsulan.status = 'Disetujui';
                this.showModal = false;
                Swal.fire('Berhasil!', 'Usulan konversi telah divalidasi.', 'success');
            }
        });
    }
}">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 fade-up">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Perlu Validasi</p>
                <p class="text-2xl font-black text-gray-800">12</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Tervalidasi</p>
                <p class="text-2xl font-black text-gray-800">145</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-tsu-teal text-white rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Total Mahasiswa</p>
                <p class="text-2xl font-black text-gray-800">250</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-md border border-gray-200 overflow-hidden fade-up delay-100">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-gray-700">Daftar Usulan Konversi</h3>
            <div class="relative">
                <input type="text" placeholder="Cari Mahasiswa..." class="pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-tsu-teal/20 outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
        </div>

        <table class="w-full border-collapse">
            <thead class="bg-gray-50 text-gray-500 text-[11px] font-black uppercase tracking-widest">
                <tr>
                    <th class="py-4 px-6 text-left">Mahasiswa</th>
                    <th class="py-4 px-6 text-center">Tanggal Kirim</th>
                    <th class="py-4 px-6 text-center">Status</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="u in usulans" :key="u.id">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-tsu-teal/10 flex items-center justify-center text-tsu-teal font-bold text-xs" x-text="u.nama.charAt(0)"></div>
                                <div>
                                    <p class="font-bold text-gray-800" x-text="u.nama"></p>
                                    <p class="text-xs text-gray-400" x-text="u.nim"></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center text-sm text-gray-600" x-text="u.tgl"></td>
                        <td class="py-4 px-6 text-center">
                            <span :class="{
                                'bg-yellow-100 text-yellow-700': u.status === 'Menunggu',
                                'bg-green-100 text-green-700': u.status === 'Disetujui'
                            }" class="px-3 py-1 rounded-full text-[10px] font-black uppercase" x-text="u.status"></span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <button @click="openValidasi(u)" 
                                    class="bg-tsu-teal text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-tsu-teal-dark transition shadow-sm active:scale-95">
                                Periksa & Input
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div x-show="showModal" x-transition x-cloak class="fixed inset-0 z-[99] flex items-center justify-center p-4 md:p-10">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showModal = false"></div>
        
        <div class="bg-white w-full max-w-6xl h-full max-h-[90vh] rounded-[32px] shadow-2xl overflow-hidden relative z-10 flex flex-col md:flex-row">
            
            <div class="w-full md:w-1/2 bg-gray-100 p-6 flex flex-col border-r border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-black text-gray-700 uppercase text-xs tracking-widest">Bukti Usulan Mahasiswa</h4>
                    <span class="text-[10px] text-gray-400">Scroll untuk Zoom</span>
                </div>
                <div class="flex-1 bg-white rounded-2xl overflow-hidden border border-gray-200 relative group">
                    <div class="w-full h-full flex items-center justify-center bg-gray-50 border-2 border-dashed border-gray-200">
                         <div class="text-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                             <p class="text-xs text-gray-400 font-medium tracking-tight">File Gambar Bukti Magang</p>
                         </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 p-8 flex flex-col overflow-y-auto no-scrollbar">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <h3 class="text-2xl font-black text-gray-800">Form Konversi</h3>
                        <p class="text-sm text-gray-400" x-text="selectedUsulan ? selectedUsulan.nama + ' (' + selectedUsulan.nim + ')' : ''"></p>
                    </div>
                    <button @click="showModal = false" class="p-2 hover:bg-gray-100 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18" /></svg>
                    </button>
                </div>

                <div class="space-y-4 flex-1">
                    <template x-for="(item, index) in konversiMatkul" :key="index">
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-200 relative group animate-fade-in-up">
                            <button @click="removeMatkul(index)" x-show="konversiMatkul.length > 1" 
                                    class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18" /></svg>
                            </button>
                            
                            <div class="grid grid-cols-12 gap-3">
                                <div class="col-span-4">
                                    <label class="text-[9px] font-black text-gray-400 uppercase mb-1 block ml-1">Kode Matkul</label>
                                    <input type="text" x-model="item.kode" placeholder="INF101" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-tsu-teal/20 outline-none">
                                </div>
                                <div class="col-span-8">
                                    <label class="text-[9px] font-black text-gray-400 uppercase mb-1 block ml-1">Nama Mata Kuliah</label>
                                    <input type="text" x-model="item.nama" placeholder="Basis Data Terdistribusi" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-tsu-teal/20 outline-none">
                                </div>
                                <div class="col-span-6">
                                    <label class="text-[9px] font-black text-gray-400 uppercase mb-1 block ml-1">Jumlah SKS Konversi</label>
                                    <input type="number" x-model="item.sks" placeholder="4" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-tsu-teal/20 outline-none">
                                </div>
                            </div>
                        </div>
                    </template>

                    <button @click="addMatkul" class="w-full py-3 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400 text-xs font-bold hover:border-tsu-teal hover:text-tsu-teal transition flex items-center justify-center gap-2 uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Tambah Mata Kuliah
                    </button>
                </div>

                <div class="pt-6 mt-6 border-t border-gray-100 flex gap-3">
                    <button @click="Swal.fire('Ditolak', 'Usulan ditolak dengan alasan tertentu.', 'error')" class="flex-1 py-3 bg-red-50 text-red-600 font-bold rounded-2xl hover:bg-red-100 transition active:scale-95 text-sm uppercase tracking-wide">Tolak</button>
                    <button @click="submitValidasi" class="flex-[2] py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/20 transition active:scale-95 text-sm uppercase tracking-wide">Simpan & Validasi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
</style>

@endsection
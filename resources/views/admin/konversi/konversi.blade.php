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
        { id: 1, nama: 'Thomas Satria Bintara', nim: '22430035', file: '/images/dummy-usulan.jpg', status: 'Menunggu' },
        { id: 2, nama: 'Lucky Reza', nim: '22400005', file: '/images/dummy-usulan-2.jpg', status: 'Menunggu' },
        { id: 3, nama: 'Dewanata', nim: '22430033', file: '/images/dummy-usulan-3.jpg', status: 'Menunggu' }
    ],
    // State untuk form input matkul
    konversiMatkul: [
        { kode: '', nama: '', sks: '' }
    ],
    // Statistik Sinkron
    get totalPerluValidasi() {
        return this.usulans.filter(u => u.status === 'Menunggu').length;
    },
    get totalTervalidasi() {
        return this.usulans.filter(u => u.status === 'Disetujui').length;
    },
    get totalMahasiswa() {
        return this.usulans.length;
    },
    addMatkul() {
        this.konversiMatkul.push({ kode: '', nama: '', sks: '' });
    },
    removeMatkul(index) {
        this.konversiMatkul.splice(index, 1);
    },
    openValidasi(usulan) {
        this.selectedUsulan = usulan;
        this.konversiMatkul = [{ kode: '', nama: '', sks: '' }]; 
        this.showModal = true;
    },
    submitValidasi() {
        if (!this.konversiMatkul[0].nama || !this.konversiMatkul[0].kode) {
            Swal.fire('Perhatian', 'Mohon isi setidaknya satu mata kuliah konversi.', 'warning');
            return;
        }

        Swal.fire({
            title: 'Simpan Konversi?',
            text: 'Pastikan data mata kuliah sudah sesuai dengan bukti gambar.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Validasi'
        }).then((result) => {
            if (result.isConfirmed) {
                let index = this.usulans.findIndex(u => u.id === this.selectedUsulan.id);
                if (index !== -1) {
                    this.usulans[index].status = 'Disetujui';
                }
                this.showModal = false;
                Swal.fire('Berhasil!', 'Usulan konversi telah divalidasi.', 'success');
            }
        });
    }
}">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 fade-up">
        <div class="bg-gradient-to-br from-amber-50 to-white p-6 rounded-3xl shadow-sm border border-amber-100 flex items-center gap-5 transition hover:shadow-md">
            <div class="w-14 h-14 bg-amber-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-amber-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-[10px] text-amber-600 font-black uppercase tracking-widest">Perlu Validasi</p>
                <p class="text-3xl font-black text-slate-800" x-text="totalPerluValidasi"></p>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-emerald-50 to-white p-6 rounded-3xl shadow-sm border border-emerald-100 flex items-center gap-5 transition hover:shadow-md">
            <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-[10px] text-emerald-600 font-black uppercase tracking-widest">Tervalidasi</p>
                <p class="text-3xl font-black text-slate-800" x-text="totalTervalidasi"></p>
            </div>
        </div>

        <div class="bg-gradient-to-br from-tsu-teal/10 to-white p-6 rounded-3xl shadow-sm border border-tsu-teal/20 flex items-center gap-5 transition hover:shadow-md">
            <div class="w-14 h-14 bg-tsu-teal text-white rounded-2xl flex items-center justify-center shadow-lg shadow-tsu-teal/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <div>
                <p class="text-[10px] text-tsu-teal font-black uppercase tracking-widest">Total Mahasiswa</p>
                <p class="text-3xl font-black text-slate-800" x-text="totalMahasiswa"></p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden fade-up delay-100">
        <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
            <div>
                <h3 class="font-black text-slate-800 text-lg">Daftar Usulan Konversi</h3>
                <p class="text-xs text-slate-400 mt-1">Kelola dan validasi usulan mata kuliah mahasiswa</p>
            </div>
            <div class="relative">
                <input type="text" placeholder="Cari nama atau NIM..." class="pl-12 pr-6 py-3 bg-white border border-slate-200 rounded-2xl text-sm shadow-sm focus:ring-4 focus:ring-tsu-teal/10 focus:border-tsu-teal outline-none transition-all w-64">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-3.5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
        </div>

        <table class="w-full border-collapse">
            <thead class="bg-slate-50/80 text-slate-400 text-[10px] font-black uppercase tracking-[0.15em]">
                <tr>
                    <th class="py-5 px-8 text-left">Informasi Mahasiswa</th>
                    <th class="py-5 px-8 text-center">Status Verifikasi</th>
                    <th class="py-5 px-8 text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <template x-for="u in usulans" :key="u.id">
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="py-6 px-8">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-tsu-teal to-emerald-400 flex items-center justify-center text-white font-black text-sm shadow-md shadow-tsu-teal/20" x-text="u.nama.charAt(0)"></div>
                                <div>
                                    <p class="font-black text-slate-700 group-hover:text-tsu-teal transition-colors" x-text="u.nama"></p>
                                    <p class="text-xs text-slate-400 font-medium tracking-wide" x-text="u.nim"></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-6 px-8 text-center">
                            <span :class="{
                                'bg-amber-100 text-amber-700 ring-4 ring-amber-50': u.status === 'Menunggu',
                                'bg-emerald-100 text-emerald-700 ring-4 ring-emerald-50': u.status === 'Disetujui'
                            }" class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest inline-block" x-text="u.status"></span>
                        </td>
                        <td class="py-6 px-8 text-center">
                            <button @click="openValidasi(u)" 
                                    :disabled="u.status === 'Disetujui'"
                                    :class="u.status === 'Disetujui' ? 'bg-slate-100 text-slate-400 cursor-not-allowed' : 'bg-tsu-teal text-white hover:shadow-xl hover:shadow-tsu-teal/30 active:scale-95 shadow-lg shadow-tsu-teal/10'"
                                    class="px-6 py-2.5 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all">
                                <span x-text="u.status === 'Disetujui' ? 'Selesai' : 'Periksa Usulan'"></span>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div x-show="showModal" x-transition x-cloak class="fixed inset-0 z-[99] flex items-center justify-center p-4 md:p-6">
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-md" @click="showModal = false"></div>
        
        <div class="bg-white w-full max-w-6xl h-full max-h-[94vh] rounded-[48px] shadow-2xl overflow-hidden relative z-10 flex flex-col md:flex-row border border-white/20">
            
            <div class="w-full md:w-5/12 bg-slate-50 p-10 flex flex-col border-r border-slate-100">
                <div class="mb-8">
                    <span class="px-4 py-1.5 bg-tsu-teal text-white text-[10px] font-black uppercase rounded-full tracking-[0.2em] shadow-lg shadow-tsu-teal/20">Verifikasi Dokumen</span>
                    <h4 class="font-black text-slate-800 text-2xl mt-4 leading-tight">Lampiran Mahasiswa</h4>
                </div>
                
                <div class="flex-1 bg-slate-200/50 rounded-[40px] overflow-hidden border-4 border-white shadow-2xl flex items-center justify-center relative group">
                    <div class="text-center p-10">
                         <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-slate-300/50 transition group-hover:rotate-12">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-tsu-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                         </div>
                         <p class="text-sm text-slate-500 font-black uppercase tracking-widest">Pratinjau Berkas</p>
                         <p class="text-xs text-slate-400 mt-2">Pastikan data di samping sesuai dengan gambar ini</p>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-7/12 p-12 flex flex-col overflow-y-auto no-scrollbar bg-white">
                <div class="flex justify-between items-start mb-12">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-1 bg-tsu-teal rounded-full"></div>
                            <span class="text-[11px] font-black text-tsu-teal uppercase tracking-widest">Form Input Konversi</span>
                        </div>
                        <h3 class="text-4xl font-black text-slate-800 tracking-tighter" x-text="selectedUsulan ? selectedUsulan.nama : ''"></h3>
                        <p class="text-slate-400 font-medium mt-1 tracking-wide" x-text="selectedUsulan ? 'NIM: ' + selectedUsulan.nim : ''"></p>
                    </div>
                    <button @click="showModal = false" class="p-4 bg-slate-50 hover:bg-red-50 text-slate-400 hover:text-red-500 rounded-3xl transition-all active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="space-y-8 flex-1">
                    <template x-for="(item, index) in konversiMatkul" :key="index">
                        <div class="p-8 bg-slate-50/40 rounded-[32px] border-2 border-transparent relative group transition-all hover:border-tsu-teal/20 hover:bg-white hover:shadow-2xl hover:shadow-slate-200/60 animate-fade-in-up">
                            
                            <div class="absolute -left-4 top-8 w-10 h-10 bg-white border-4 border-slate-50 rounded-2xl flex items-center justify-center text-xs font-black text-tsu-teal shadow-lg" x-text="index + 1"></div>
                            
                            <button @click="removeMatkul(index)" x-show="konversiMatkul.length > 1" 
                                    class="absolute -top-3 -right-3 w-9 h-9 bg-red-500 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-red-200 hover:bg-red-600 transition-all opacity-0 group-hover:opacity-100 scale-50 group-hover:scale-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                            
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 md:col-span-4">
                                    <label class="text-[10px] font-black text-slate-400 uppercase mb-2 block ml-1 tracking-[0.15em]">Kode MK</label>
                                    <input type="text" x-model="item.kode" placeholder="4W1304" class="w-full bg-white border-2 border-slate-100 rounded-2xl px-5 py-3.5 text-sm font-bold text-slate-700 focus:ring-0 focus:border-tsu-teal outline-none transition-all placeholder:text-slate-300 shadow-sm">
                                </div>
                                <div class="col-span-12 md:col-span-8">
                                    <label class="text-[10px] font-black text-slate-400 uppercase mb-2 block ml-1 tracking-[0.15em]">Nama Mata Kuliah</label>
                                    <input type="text" x-model="item.nama" placeholder="Masukkan Mata Kuliah" class="w-full bg-white border-2 border-slate-100 rounded-2xl px-5 py-3.5 text-sm font-bold text-slate-700 focus:ring-0 focus:border-tsu-teal outline-none transition-all placeholder:text-slate-300 shadow-sm">
                                </div>
                                <div class="col-span-12">
                                    <label class="text-[10px] font-black text-slate-400 uppercase mb-2 block ml-1 tracking-[0.15em]">Konversi SKS</label>
                                    <div class="flex items-center gap-6">
                                        <div class="relative flex-1 max-w-[120px]">
                                            <input type="number" x-model="item.sks" placeholder="0" class="w-full bg-white border-2 border-slate-100 rounded-2xl px-5 py-3.5 text-sm font-black text-tsu-teal focus:ring-0 focus:border-tsu-teal outline-none transition-all shadow-sm">
                                            <span class="absolute right-4 top-3.5 text-[10px] font-black text-slate-300 uppercase">SKS</span>
                                        </div>
                                        <p class="text-xs text-slate-400 font-medium italic">Sesuai dengan lampiran bukti mahasiwa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <button @click="addMatkul" class="w-full py-5 border-2 border-dashed border-slate-200 rounded-[32px] text-slate-400 text-[11px] font-black hover:border-tsu-teal hover:text-tsu-teal hover:bg-tsu-teal/5 transition-all flex items-center justify-center gap-3 uppercase tracking-[0.2em] group">
                        <div class="w-6 h-6 bg-slate-100 group-hover:bg-tsu-teal group-hover:text-white rounded-lg flex items-center justify-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                        </div>
                        Tambah Mata Kuliah
                    </button>
                </div>

                <div class="pt-10 mt-12 border-t-2 border-slate-50 flex gap-5">
                    <button @click="showModal = false" class="flex-1 py-4 bg-slate-100 text-slate-500 font-black rounded-3xl hover:bg-slate-200 transition-all active:scale-95 text-[11px] uppercase tracking-widest">Batal</button>
                    <button @click="submitValidasi" class="flex-[2.5] py-4 bg-gradient-to-r from-tsu-teal to-emerald-500 text-white font-black rounded-3xl hover:shadow-2xl hover:shadow-tsu-teal/40 transition-all active:scale-95 text-[11px] uppercase tracking-widest">Simpan & Validasi Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    
    @keyframes fadeInUps {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUps 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

@endsection
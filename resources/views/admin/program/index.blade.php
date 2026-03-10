@extends('layouts.app')

@section('title', 'Kelola Program Magang')
@section('header_title', 'Manajemen Program')

@section('content')

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ 
    tab: 'mandiri', 
    showModal: false,
    isEdit: false,
    editId: null,
    page: 1,
    perPage: 6,
    // Data Form
    formData: {
        title: '',
        company: '',
        role: '',
        type: 'mandiri',
        kuota: 0,
        prodi: ['IF', 'SI']
    },
    // Mock Data Program
    programs: [
        { id: 1, type: 'mandiri', role: 'Frontend Developer', company: 'PT. Tiga Serangkai', title: 'Website Penjualan', kuota: 10, terisi: 2, mhs: ['Thomas Satria Bintara', 'Lucky Reza'], prodi: ['IF'] },
        { id: 2, type: 'mandiri', role: 'Backend Engineer', company: 'Jujura Academy', title: 'API Management', kuota: 5, terisi: 1, mhs: ['Dewanata'], prodi: ['IF', 'SI'] },
        { id: 3, type: 'mandiri', role: 'UI/UX Designer', company: 'Creative Agency', title: 'Mobile App Project', kuota: 8, terisi: 0, mhs: [], prodi: ['SI'] },
        { id: 4, type: 'mandiri', role: 'Data Analyst', company: 'Big Data Corp', title: 'Data Visualization', kuota: 4, terisi: 0, mhs: [], prodi: ['IF', 'SI'] },
        { id: 5, type: 'mandiri', role: 'DevOps Intern', company: 'Cloud Infrastructure', title: 'Automation Ops', kuota: 3, terisi: 0, mhs: [], prodi: ['IF'] },
        { id: 6, type: 'mandiri', role: 'QA Engineer', company: 'Bug Free Tech', title: 'Testing Apps', kuota: 12, terisi: 0, mhs: [], prodi: ['IF', 'SI'] },
        { id: 11, type: 'studi', role: 'Android Developer', company: 'Bangkit Academy', title: 'Mobile Specialist', kuota: 100, terisi: 0, mhs: [], prodi: ['IF'] }
    ],
    // Filter & Pagination
    get filteredPrograms() {
        let filtered = this.programs.filter(p => p.type === this.tab);
        return filtered.slice((this.page - 1) * this.perPage, this.page * this.perPage);
    },
    get totalPages() {
        let total = this.programs.filter(p => p.type === this.tab).length;
        return Math.ceil(total / this.perPage) || 1;
    },
    // Handle Simpan
    saveProgram() {
        if(this.formData.prodi.length === 0) {
            Swal.fire('Peringatan', 'Pilih minimal satu Program Studi!', 'warning');
            return;
        }

        if(this.isEdit) {
            let index = this.programs.findIndex(p => p.id === this.editId);
            this.programs[index] = { ...this.programs[index], ...this.formData };
            Swal.fire('Berhasil!', 'Program telah diperbarui.', 'success');
        } else {
            const newProg = { id: Date.now(), ...this.formData, terisi: 0, mhs: [] };
            this.programs.push(newProg);
            Swal.fire('Berhasil!', 'Program baru telah ditambahkan.', 'success');
        }
        this.showModal = false;
        this.resetForm();
    },
    resetForm() {
        this.formData = { title: '', company: '', role: '', type: 'mandiri', kuota: 0, prodi: ['IF', 'SI'] };
        this.isEdit = false;
        this.editId = null;
    },
    openEdit(prog) {
        this.isEdit = true;
        this.editId = prog.id;
        this.formData = JSON.parse(JSON.stringify(prog)); // Deep copy agar tidak reaktif langsung
        this.showModal = true;
    },
    deleteProgram(id) {
        Swal.fire({
            title: 'Hapus Program?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.programs = this.programs.filter(p => p.id !== id);
                Swal.fire('Terhapus!', 'Program telah dihapus.', 'success');
            }
        });
    },
    viewParticipants(prog) {
        let listMhs = prog.mhs.length > 0 
            ? `<ul class='text-left space-y-2'>${prog.mhs.map(m => `<li class='p-3 bg-gray-50 rounded-xl font-bold text-gray-700 flex items-center gap-2'><span class='w-2 h-2 bg-tsu-teal rounded-full'></span>${m}</li>`).join('')}</ul>`
            : `<p class='text-gray-400 italic'>Belum ada mahasiswa yang bergabung.</p>`;

        Swal.fire({
            title: `<span class='text-lg font-black'>Peserta: ${prog.title}</span>`,
            html: `<div class='mt-4'>${listMhs}</div>`,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Tutup',
            customClass: { popup: 'rounded-[2.5rem]' }
        });
    }
}">

    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 fade-up">
        <div>
            <h3 class="text-xl font-black text-gray-800">Daftar Program Tersedia</h3>
            <p class="text-sm text-gray-500 font-medium">Kelola informasi, kuota, prodi, dan tipe program magang.</p>
        </div>
        <button @click="resetForm(); showModal = true" class="px-6 py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/30 transition flex items-center gap-2 active:scale-95">
            <span class="text-xl">+</span> Tambah Program
        </button>
    </div>

    <div class="fade-up delay-100 border border-gray-200 bg-white rounded-[2.5rem] p-8 mb-8 shadow-sm">
        <div class="flex bg-gray-100 p-1.5 rounded-2xl w-full md:w-max mb-8">
            <button @click="tab = 'mandiri'; page = 1" 
                    :class="tab === 'mandiri' ? 'bg-tsu-teal text-white shadow-sm' : 'text-gray-500'"
                    class="flex-1 md:flex-none px-10 py-3 rounded-xl text-sm font-bold transition-all duration-300">
                Magang Mandiri
            </button>
            <button @click="tab = 'studi'; page = 1" 
                    :class="tab === 'studi' ? 'bg-tsu-teal text-white shadow-sm' : 'text-gray-500'"
                    class="flex-1 md:flex-none px-10 py-3 rounded-xl text-sm font-bold transition-all duration-300">
                Studi Independen
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[400px]"> 
            <template x-for="(prog, index) in filteredPrograms" :key="tab + prog.id">
                <div class="fade-up border border-gray-100 rounded-[2.5rem] p-6 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all bg-white group relative overflow-hidden"
                     :style="`animation-delay: ${index * 0.1}s`">
                    
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-4 bg-gray-50 rounded-2xl group-hover:bg-teal-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-tsu-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <button @click="viewParticipants(prog)" class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1.5 rounded-full uppercase hover:bg-blue-100 transition whitespace-nowrap">
                            👥 <span x-text="prog.terisi"></span> Peserta
                        </button>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-bold text-xl mb-1 text-gray-800 group-hover:text-tsu-teal transition-colors" x-text="prog.title"></h4>
                        <div class="text-sm text-gray-500 mb-3 font-medium" x-text="prog.company"></div>
                        
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            <template x-for="p in prog.prodi">
                                <span class="px-2 py-1 bg-gray-800 text-white text-[9px] font-black rounded-lg tracking-wider" x-text="p"></span>
                            </template>
                        </div>

                        <div class="flex items-center gap-2 mb-4">
                            <span class="inline-block bg-teal-50 text-tsu-teal font-black text-[10px] uppercase px-3 py-1.5 rounded-lg border border-teal-100" x-text="prog.role"></span>
                            <span class="text-[10px] text-gray-400 font-bold" x-text="prog.terisi + '/' + prog.kuota + ' Kuota'"></span>
                        </div>

                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-tsu-teal transition-all duration-500" :style="`width: ${(prog.terisi/prog.kuota)*100}%`"></div>
                        </div>
                    </div>
                    
                    <div class="flex gap-2 mt-auto">
                        <a :href="`{{ url('admin/program/detail') }}/${prog.id}`" class="flex-1 bg-tsu-teal text-white text-xs font-bold py-3 rounded-xl hover:bg-tsu-teal-dark shadow-md shadow-teal-100 text-center transition-all active:scale-95">Detail</a>
                        <button @click="openEdit(prog)" class="p-3 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 transition active:scale-95">✏️</button>
                        <button @click="deleteProgram(prog.id)" class="p-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition active:scale-95">🗑️</button>
                    </div>
                </div>
            </template>
        </div>

        <div class="flex items-center justify-center gap-2 mt-12" x-show="totalPages > 1">
            <button @click="page = Math.max(1, page - 1)" :disabled="page === 1" class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
            </button>
            <template x-for="p in totalPages">
                <button @click="page = p" :class="page === p ? 'bg-tsu-teal text-white' : 'border border-gray-200 text-gray-600'"
                        class="w-10 h-10 rounded-lg font-bold text-sm transition-all" x-text="p"></button>
            </template>
            <button @click="page = Math.min(totalPages, page + 1)" :disabled="page === totalPages" class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
            </button>
        </div>
    </div>

    <div x-show="showModal" 
         class="fixed inset-0 z-[70] flex items-center justify-center bg-black/60 backdrop-blur-md p-4"
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-cloak>
        
        <div class="bg-white w-full max-w-2xl rounded-[3rem] shadow-2xl overflow-hidden transform transition-all" @click.away="showModal = false">
            <div class="p-8 bg-tsu-teal text-white flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-black" x-text="isEdit ? '✏️ Edit Program' : '🚀 Tambah Program Baru'"></h3>
                    <p class="text-teal-50/70 text-xs">Atur informasi dan target program studi.</p>
                </div>
                <button @click="showModal = false" class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center hover:bg-white/20 transition">✕</button>
            </div>

            <form @submit.prevent="saveProgram()" class="p-10 space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2 flex items-center gap-1">📌 Nama Program</label>
                        <input type="text" x-model="formData.title" class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-4 px-6 focus:border-tsu-teal focus:bg-white transition mt-2 outline-none font-bold text-gray-700" placeholder="Contoh: Website Penjualan" required>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2 flex items-center gap-1">🏢 Perusahaan</label>
                        <input type="text" x-model="formData.company" class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-4 px-6 focus:border-tsu-teal focus:bg-white transition mt-2 outline-none font-bold text-gray-700" placeholder="Contoh: PT. Tiga Serangkai" required>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2 flex items-center gap-1">💼 Role Magang</label>
                        <input type="text" x-model="formData.role" class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-4 px-6 focus:border-tsu-teal focus:bg-white transition mt-2 outline-none font-bold text-gray-700" placeholder="Contoh: Frontend Developer" required>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2 flex items-center gap-1">📂 Tipe Program</label>
                        <select x-model="formData.type" class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-4 px-6 focus:border-tsu-teal focus:bg-white transition mt-2 outline-none font-bold text-gray-700">
                            <option value="mandiri">Magang Mandiri</option>
                            <option value="studi">Studi Independen</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2 flex items-center gap-1">👥 Kuota (Mhs)</label>
                        <input type="number" x-model="formData.kuota" class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-4 px-6 focus:border-tsu-teal focus:bg-white transition mt-2 outline-none font-bold text-gray-700" placeholder="Minimal 1" min="1" required>
                    </div>

                    <div class="col-span-2 bg-gray-50 p-6 rounded-[2rem] border border-dashed border-gray-200">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4 block">🎓 Target Program Studi</label>
                        <div class="flex gap-4">
                            <label class="flex-1 relative cursor-pointer group">
                                <input type="checkbox" value="IF" x-model="formData.prodi" class="peer hidden">
                                <div class="p-4 rounded-2xl border-2 border-transparent bg-white text-center transition-all peer-checked:border-tsu-teal peer-checked:bg-teal-50">
                                    <span class="block text-sm font-black text-gray-400 peer-checked:text-tsu-teal group-hover:text-gray-600 transition-colors">Informatika</span>
                                </div>
                            </label>
                            <label class="flex-1 relative cursor-pointer group">
                                <input type="checkbox" value="SI" x-model="formData.prodi" class="peer hidden">
                                <div class="p-4 rounded-2xl border-2 border-transparent bg-white text-center transition-all peer-checked:border-tsu-teal peer-checked:bg-teal-50">
                                    <span class="block text-sm font-black text-gray-400 peer-checked:text-tsu-teal group-hover:text-gray-600 transition-colors">Sistem Informasi</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="button" @click="showModal = false" class="flex-1 py-4 text-gray-400 font-black rounded-2xl hover:bg-gray-50 transition uppercase text-xs tracking-widest">Batal</button>
                    <button type="submit" class="flex-[2] py-4 bg-tsu-teal text-white font-black rounded-2xl hover:bg-tsu-teal-dark transition shadow-xl uppercase text-xs tracking-widest" x-text="isEdit ? 'Simpan Perubahan' : '🚀 Tambahkan Sekarang'"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
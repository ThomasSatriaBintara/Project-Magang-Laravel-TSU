@extends('layouts.app')

@section('title', 'Logbook Kegiatan Magang')

@section('header_title', 'Logbook Kegiatan')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{
    startDate: '2026-01-01',
    perPage: 5,
    showAll: false,
    weeks: [
        { id: 1, date: '01/01/2026', title: 'Analisis Sistem', desc: 'Melakukan observasi awal.', type: 'Individu', saved: true, validated: true },
        { id: 2, date: '08/01/2026', title: '', desc: '', type: 'Individu', saved: false, validated: false },
        { id: 3, date: '15/01/2026', title: '', desc: '', type: 'Individu', saved: false, validated: false },
        { id: 4, date: '22/01/2026', title: '', desc: '', type: 'Individu', saved: false, validated: false },
        { id: 5, date: '29/01/2026', title: '', desc: '', type: 'Individu', saved: false, validated: false },
        { id: 6, date: '05/02/2026', title: '', desc: '', type: 'Individu', saved: false, validated: false }
    ],
    get filteredWeeks() {
        return this.showAll ? this.weeks : this.weeks.slice(0, this.perPage);
    },
    saveLog(id) {
        let week = this.weeks.find(w => w.id === id);
        if (!week.title || !week.desc) {
            Swal.fire('Perhatian', 'Harap isi nama dan uraian kegiatan!', 'warning');
            return;
        }

        Swal.fire({
            title: 'Simpan Logbook?',
            text: 'Data yang sudah disimpan tidak dapat diubah atau dihapus kembali.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                week.saved = true;
                Swal.fire('Tersimpan!', 'Logbook minggu ke-' + id + ' berhasil dikunci.', 'success');
            }
        });
    }
}">

    <div class="fade-up bg-tsu-teal text-white rounded-xl p-6 mb-8 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold mb-2">Logbook Kegiatan Mingguan</h2>
            <p class="text-sm text-teal-50/80 font-light">Isilah kegiatan Anda setiap minggu. Data yang telah disimpan akan dikunci secara otomatis.</p>
        </div>
        <button @click="Swal.fire('Upload Laporan', 'Pilih file PDF laporan akhir Anda.', 'info')" 
                class="bg-white text-tsu-teal font-bold py-2.5 px-6 rounded-lg shadow-md hover:bg-gray-100 transition active:scale-95 text-sm">
            Upload Laporan Akhir
        </button>
    </div>

    <div class="fade-up delay-100 bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-6 flex flex-wrap justify-between items-center gap-4">
        <div class="flex items-center gap-3">
            <label class="text-sm font-bold text-gray-600">Lihat Minggu:</label>
            <select x-model="showAll" class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-tsu-teal outline-none cursor-pointer">
                <option :value="false">5 Minggu Terakhir</option>
                <option :value="true">Tampilkan Semua</option>
            </select>
        </div>
        
        <button onclick="window.print()" class="flex items-center gap-2 text-gray-600 hover:text-tsu-teal font-bold text-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
            Cetak Logbook
        </button>
    </div>

    <div class="fade-up delay-200 overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-tsu-teal text-white text-sm">
                <tr>
                    <th class="py-4 px-4 text-center font-bold w-16 border-r border-white/10">Minggu</th>
                    <th class="py-4 px-4 text-center font-bold w-40 border-r border-white/10">Tanggal</th>
                    <th class="py-4 px-4 text-left font-bold w-1/4 border-r border-white/10">Nama Kegiatan</th>
                    <th class="py-4 px-4 text-left font-bold border-r border-white/10">Uraian Kegiatan</th>
                    <th class="py-4 px-4 text-center font-bold w-32 border-r border-white/10">Jenis</th>
                    <th class="py-4 px-4 text-center font-bold w-44">Status & Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="(week, index) in filteredWeeks" :key="week.id">
                    <tr class="hover:bg-gray-50 transition text-sm" :class="!week.saved ? 'bg-red-50/30' : ''">
                        <td class="py-4 px-4 text-center font-black text-gray-700 border-r border-gray-100" x-text="week.id"></td>
                        <td class="py-4 px-4 text-center text-gray-600 font-medium border-r border-gray-100" x-text="week.date"></td>
                        
                        <td class="py-4 px-4 border-r border-gray-100">
                            <template x-if="!week.saved">
                                <input type="text" x-model="week.title" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2 focus:ring-1 focus:ring-tsu-teal outline-none">
                            </template>
                            <template x-if="week.saved">
                                <span class="font-bold text-gray-800" x-text="week.title"></span>
                            </template>
                        </td>

                        <td class="py-4 px-4 border-r border-gray-100">
                            <template x-if="!week.saved">
                                <textarea x-model="week.desc" rows="1" class="w-full bg-gray-50 border border-gray-200 rounded-lg p-2 focus:ring-1 focus:ring-tsu-teal outline-none resize-none"></textarea>
                            </template>
                            <template x-if="week.saved">
                                <span class="text-gray-600 leading-relaxed" x-text="week.desc"></span>
                            </template>
                        </td>

                        <td class="py-4 px-4 text-center border-r border-gray-100">
                            <template x-if="!week.saved">
                                <select x-model="week.type" class="bg-white border border-gray-200 rounded px-2 py-1 text-xs outline-none">
                                    <option>Individu</option>
                                    <option>Kelompok</option>
                                </select>
                            </template>
                            <template x-if="week.saved">
                                <span class="text-gray-700" x-text="week.type"></span>
                            </template>
                        </td>

                        <td class="py-4 px-4 text-center">
                            <div class="flex flex-col items-center gap-2">
                                <template x-if="!week.saved">
                                    <div class="flex flex-col items-center gap-2">
                                        <span class="text-[9px] font-black text-red-500 uppercase tracking-tighter animate-pulse">Belum Diisi</span>
                                        <button @click="saveLog(week.id)" class="bg-tsu-teal text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-teal-700 transition active:scale-95 shadow-sm">
                                            Simpan
                                        </button>
                                    </div>
                                </template>

                                <template x-if="week.saved">
                                    <span class="inline-block px-3 py-1 text-[10px] font-bold uppercase rounded-full"
                                          :class="week.validated ? 'text-green-700 bg-green-100' : 'text-yellow-700 bg-yellow-100'"
                                          x-text="week.validated ? 'Sudah Divalidasi' : 'Belum Divalidasi'">
                                    </span>
                                </template>
                            </div>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex gap-4 text-[11px] font-medium text-gray-500 italic">
        <div class="flex items-center gap-1"><span class="w-3 h-3 bg-red-50 border border-red-100 rounded"></span> Minggu yang belum diisi</div>
        <div class="flex items-center gap-1"><span class="w-3 h-3 bg-white border border-gray-200 rounded"></span> Minggu yang sudah disimpan</div>
    </div>
</div>

@endsection
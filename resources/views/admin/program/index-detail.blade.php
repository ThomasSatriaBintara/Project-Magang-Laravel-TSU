@extends('layouts.detail')

@section('title', 'Kelola Detail Program')

@section('content')

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ 
    isEdit: false,
    data: {
        title: 'Project Website Penjualan',
        company: 'PT. Tiga Serangkai University',
        duration: '3 Bulan',
        deadline: '2026-02-01',
        location: 'Jl. K.H Samanhudi No.84-86, Purwosari, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57149',
        pendaftar: 31,
        description: 'Magang Project Website Penjualan akan berperan dalam proses pengembangan sistem penjualan berbasis website.',
        jobdesk: [
            'Membuat tampilan antarmuka (UI) menggunakan design guideline.',
            'Melakukan integrasi API antara frontend dan backend.',
            'Mengembangkan fitur utama seperti manajemen produk dan transaksi.',
            'Menguji fungsionalitas sistem dan memastikan alur kerja berjalan baik.',
            'Mendokumentasikan proses pengembangan.'
        ],
        kriteria: [
            'Mahasiswa aktif S1/D3 jurusan Informatika atau terkait.',
            'Memiliki kemampuan dasar HTML, CSS, dan JavaScript.',
            'Memahami framework Laravel / NodeJS / React (nilai tambah).',
            'Mampu bekerja secara mandiri maupun tim.',
            'Teliti dan memiliki minat tinggi dalam pengembangan web.'
        ],
        capaian: 'Setelah mengikuti program magang ini, mahasiswa mampu menerapkan konsep pengembangan web dalam pembuatan aplikasi penjualan, menguasai proses pembuatan fitur CRUD serta integrasi frontend–backend menggunakan REST API, memahami penerapan standar UI/UX pada halaman operasional, menggunakan Git sebagai alat kolaborasi dan manajemen versi, melakukan pengujian aplikasi untuk memastikan kualitas fungsionalitas, serta berkomunikasi efektif dalam tim pengembang untuk menyelesaikan project sesuai kebutuhan.'
    },
    saveChanges() {
        this.isEdit = false;
        Swal.fire({
            icon: 'success',
            title: 'Detail Diperbarui!',
            text: 'Informasi program telah berhasil disimpan.',
            confirmButtonColor: '#086375',
            customClass: { popup: 'rounded-[2rem]' }
        });
    }
}">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div class="w-full md:w-auto">
            <template x-if="!isEdit">
                <h2 class="fade-up text-3xl font-bold text-black mb-2" x-text="data.title"></h2>
            </template>
            <template x-if="isEdit">
                <input type="text" x-model="data.title" class="fade-up text-3xl font-bold text-black mb-2 border-b-2 border-tsu-teal outline-none w-full bg-transparent">
            </template>
            
            <span class="fade-up delay-100 inline-block bg-blue-100 text-blue-600 font-semibold px-4 py-1 rounded-full text-sm mb-3" x-text="data.company"></span>

            <div class="flex flex-wrap items-center gap-4 mt-1">
                <span class="fade-up delay-200 bg-green-100 text-green-700 px-4 py-0.5 rounded-full text-sm font-bold">Status: Aktif (Admin)</span>
                
                <div class="fade-up delay-200 flex items-center gap-1 text-black font-bold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <template x-if="!isEdit"><span x-text="'Durasi: ' + data.duration"></span></template>
                    <input x-show="isEdit" type="text" x-model="data.duration" class="border-b border-gray-300 outline-none w-24">
                </div>

                <div class="fade-up delay-200 flex items-center gap-1 text-black font-bold text-sm border-l-2 border-gray-200 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <template x-if="!isEdit"><span x-text="'Deadline: ' + data.deadline"></span></template>
                    <input x-show="isEdit" type="date" x-model="data.deadline" class="border-b border-gray-300 outline-none">
                </div>
            </div>
        </div>

        <button @click="isEdit ? saveChanges() : isEdit = true" 
                :class="isEdit ? 'bg-orange-500 hover:bg-orange-600' : 'bg-tsu-teal hover:bg-tsu-teal-dark'"
                class="fade-up delay-300 text-white font-bold py-3 px-8 rounded-full flex items-center gap-2 shadow-lg transition transform hover:-translate-y-0.5">
            <svg x-show="!isEdit" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
            <svg x-show="isEdit" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M5 13l4 4L19 7" /></svg>
            <span x-text="isEdit ? 'Simpan Detail' : 'Edit Detail Program'"></span>
        </button>
    </div>

    <div class="fade-up delay-400 grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
        <div class="lg:col-span-3 border border-gray-300 bg-white rounded-2xl p-5 flex items-start gap-4 shadow-sm">
            <div class="mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20" fill="currentColor"><path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" /></svg></div>
            <div class="w-full">
                <h3 class="font-bold text-black text-lg">Lokasi Penempatan</h3>
                <template x-if="!isEdit">
                    <p class="text-sm text-gray-800 font-medium leading-relaxed mt-1" x-text="data.location"></p>
                </template>
                <textarea x-show="isEdit" x-model="data.location" class="w-full mt-2 p-3 text-sm border rounded-xl outline-none focus:border-tsu-teal" rows="2"></textarea>
            </div>
        </div>
        <div class="lg:col-span-2 border border-gray-300 bg-white rounded-2xl p-5 flex flex-col items-center justify-center shadow-sm text-center">
            <h3 class="font-bold text-black text-lg mb-1">Total Pelamar</h3>
            <span class="text-4xl font-extrabold text-red-600" x-text="data.pendaftar"></span>
        </div>
    </div>

    <div class="fade-up delay-500 border border-gray-300 bg-white rounded-2xl p-6 mb-6 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            <h3 class="font-bold text-black text-lg">Deskripsi Jobdesk</h3>
        </div>
        <div class="space-y-4">
            <template x-if="!isEdit">
                <p class="text-sm text-black leading-relaxed" x-text="data.description"></p>
            </template>
            
            <ul class="list-disc ml-5 space-y-2 marker:text-tsu-teal text-sm text-black">
                <template x-for="(item, index) in data.jobdesk" :key="index">
                    <li>
                        <template x-if="!isEdit"><span x-text="item"></span></template>
                        <div x-show="isEdit" class="flex gap-2">
                            <input type="text" x-model="data.jobdesk[index]" class="flex-1 border-b border-gray-200 outline-none p-1">
                            <button @click="data.jobdesk.splice(index, 1)" class="text-red-500">✕</button>
                        </div>
                    </li>
                </template>
            </ul>
            <button x-show="isEdit" @click="data.jobdesk.push('')" class="text-xs font-bold text-tsu-teal">+ Tambah Poin Jobdesk</button>
        </div>
    </div>

    <div class="fade-up delay-600 border border-gray-300 bg-white rounded-2xl p-6 mb-6 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" /></svg>
            <h3 class="font-bold text-black text-lg">Kriteria Pendaftar</h3>
        </div>
        <ul class="list-disc ml-5 space-y-2 marker:text-tsu-teal text-sm text-black">
            <template x-for="(item, index) in data.kriteria" :key="index">
                <li>
                    <template x-if="!isEdit"><span x-text="item"></span></template>
                    <div x-show="isEdit" class="flex gap-2">
                        <input type="text" x-model="data.kriteria[index]" class="flex-1 border-b border-gray-200 outline-none p-1">
                        <button @click="data.kriteria.splice(index, 1)" class="text-red-500">✕</button>
                    </div>
                </li>
            </template>
        </ul>
        <button x-show="isEdit" @click="data.kriteria.push('')" class="text-xs font-bold text-tsu-teal mt-3">+ Tambah Kriteria</button>
    </div>

    <div class="fade-up delay-700 border border-gray-300 bg-white rounded-2xl p-6 mb-8 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
            <h3 class="font-bold text-black text-lg">Capaian Pembelajaran</h3>
        </div>
        <template x-if="!isEdit">
            <p class="text-sm text-black leading-relaxed" x-text="data.capaian"></p>
        </template>
        <textarea x-show="isEdit" x-model="data.capaian" class="w-full p-3 text-sm border rounded-xl outline-none" rows="4"></textarea>
    </div>

</div>

<style>
    input:focus, textarea:focus {
        border-color: #086375 !important;
        background-color: #f0fdfa;
    }
</style>

@endsection
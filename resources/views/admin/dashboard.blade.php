@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('header_title', 'Dashboard Admin')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 fade-up">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-gray-400 text-[10px] font-bold uppercase">Total Mahasiswa</p>
            <h3 class="text-2xl font-bold text-tsu-teal">120</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-gray-400 text-[10px] font-bold uppercase">Program Aktif</p>
            <h3 class="text-2xl font-bold text-tsu-blue">8</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-gray-400 text-[10px] font-bold uppercase">Pendaftar Baru</p>
            <h3 class="text-2xl font-bold text-tsu-orange">15</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <p class="text-gray-400 text-[10px] font-bold uppercase">Dosen Pembimbing</p>
            <h3 class="text-2xl font-bold text-green-600">24</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 fade-up delay-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Buat Pengumuman Baru</h3>
                <span class="text-2xl">📢</span>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Judul Pengumuman</label>
                    <input type="text" placeholder="Contoh: Jadwal Pengumpulan Logbook" 
                           class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition">
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Isi Pesan</label>
                    <textarea rows="4" placeholder="Tuliskan detail informasi di sini..." 
                              class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition"></textarea>
                </div>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="text-xs font-bold text-gray-400 uppercase ml-2">Target Audience</label>
                        <select class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition mt-1">
                            <option>Semua (Dosen & Mahasiswa)</option>
                            <option>Hanya Mahasiswa</option>
                            <option>Hanya Dosen</option>
                        </select>
                    </div>
                    <button type="submit" class="self-end px-8 py-4 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/30 transition">
                        Kirim Notifikasi
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-gray-50 rounded-[2.5rem] p-8 border border-gray-100 fade-up delay-200">
            <h3 class="font-bold text-gray-800 mb-6">Pengumuman Terakhir</h3>
            <div class="space-y-4">
                <div class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-tsu-teal">
                    <p class="font-bold text-sm">Batas Akhir Pendaftaran</p>
                    <p class="text-[10px] text-gray-400">2 jam yang lalu</p>
                </div>
                <div class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-tsu-orange">
                    <p class="font-bold text-sm">Maintenance Server</p>
                    <p class="text-[10px] text-gray-400">Kemarin, 14:00</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
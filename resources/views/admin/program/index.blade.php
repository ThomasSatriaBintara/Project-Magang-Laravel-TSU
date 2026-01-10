@extends('layouts.app')

@section('title', 'Kelola Program Magang')
@section('header_title', 'Manajemen Program')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center fade-up">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Daftar Program Magang</h3>
            <p class="text-sm text-gray-500">Kelola kuota dan detail informasi program magang</p>
        </div>
        <button onclick="openProgramModal()" class="px-6 py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/30 transition flex items-center gap-2">
            <span class="text-lg">+</span> Tambah Program
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 fade-up delay-100">
        <div class="bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
            <div class="h-32 bg-gradient-to-br from-tsu-teal to-blue-500 p-6 relative">
                <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] text-white font-bold uppercase">Aktif</div>
                <h4 class="text-white font-bold text-lg mt-4">Web Development</h4>
                <p class="text-teal-50/80 text-xs">PT. Digital Solusi Indonesia</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-gray-400">
                    <span>Terisi</span>
                    <span>Kuota: 10</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-tsu-teal rounded-full transition-all duration-1000" style="width: 80%"></div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">JD</div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">AS</div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">+6</div>
                    </div>
                    <span class="text-sm font-bold text-gray-700">8 / 10 Mhs</span>
                </div>
                <hr class="border-gray-50">
                <div class="flex gap-2">
                    <button class="flex-1 py-2 bg-gray-50 text-gray-600 text-xs font-bold rounded-xl hover:bg-gray-100 transition">Detail</button>
                    <button class="px-4 py-2 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 transition">✏️</button>
                    <button class="px-4 py-2 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition">🗑️</button>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group">
            <div class="h-32 bg-gradient-to-br from-purple-500 to-indigo-600 p-6 relative">
                <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-[10px] text-white font-bold uppercase">Penuh</div>
                <h4 class="text-white font-bold text-lg mt-4">UI/UX Research</h4>
                <p class="text-purple-50/80 text-xs">Creative Studio Malang</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between text-xs font-bold uppercase tracking-wider text-gray-400">
                    <span>Terisi</span>
                    <span>Kuota: 5</span>
                </div>
                <div class="w-full h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-purple-500 rounded-full" style="width: 100%"></div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">BR</div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] font-bold">+4</div>
                    </div>
                    <span class="text-sm font-bold text-gray-700">5 / 5 Mhs</span>
                </div>
                <hr class="border-gray-50">
                <div class="flex gap-2">
                    <button class="flex-1 py-2 bg-gray-50 text-gray-600 text-xs font-bold rounded-xl">Detail</button>
                    <button class="px-4 py-2 bg-orange-50 text-orange-500 rounded-xl">✏️</button>
                    <button class="px-4 py-2 bg-red-50 text-red-500 rounded-xl">🗑️</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalProgram" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/50 backdrop-blur-md p-4">
    <div class="bg-white w-full max-w-2xl rounded-[2.5rem] shadow-2xl overflow-hidden transform transition-all scale-95 duration-300">
        <div class="p-8 bg-tsu-teal text-white flex justify-between items-center">
            <h3 class="text-2xl font-bold">Tambah Program Magang</h3>
            <button onclick="closeProgramModal()" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition">✕</button>
        </div>
        <form class="p-8 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Nama Program</label>
                    <input type="text" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition mt-1" placeholder="Contoh: Android Developer">
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Perusahaan</label>
                    <input type="text" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition mt-1" placeholder="Nama Perusahaan">
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Kuota Mahasiswa</label>
                    <input type="number" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition mt-1" placeholder="0">
                </div>
                <div class="col-span-2">
                    <label class="text-xs font-bold text-gray-400 uppercase ml-2">Deskripsi Program</label>
                    <textarea rows="3" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-tsu-teal transition mt-1" placeholder="Jelaskan detail program..."></textarea>
                </div>
            </div>
            <div class="flex gap-4 pt-4">
                <button type="button" onclick="closeProgramModal()" class="flex-1 py-4 bg-gray-100 text-gray-500 font-bold rounded-2xl hover:bg-gray-200 transition">Batal</button>
                <button type="submit" class="flex-[2] py-4 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark transition shadow-xl shadow-tsu-teal/30">Simpan Program</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openProgramModal() {
        const modal = document.getElementById('modalProgram');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
    }
    function closeProgramModal() {
        const modal = document.getElementById('modalProgram');
        modal.querySelector('div').classList.replace('scale-100', 'scale-95');
        setTimeout(() => modal.classList.replace('flex', 'hidden'), 200);
    }
</script>
@endsection
@extends('layouts.app')

@section('title', 'Logbook Kegiatan Magang')

@section('header_title', 'Logbook Kegiatan')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{
    today: new Date('2026-01-10'), 
    startDate: new Date('2026-01-01'),
    weeks: [],
    // State untuk upload laporan
    reportFile: null,
    reportName: '',
    
    init() {
        for (let i = 0; i < 10; i++) {
            let start = new Date(this.startDate);
            start.setDate(start.getDate() + (i * 7));
            
            let end = new Date(start);
            end.setDate(end.getDate() + 6);

            let isLockedByDate = this.today < start;

            this.weeks.push({
                id: i + 1,
                dateRange: this.formatRange(start, end),
                rawStart: start,
                title: i === 0 ? 'Analisis Sistem' : '',
                desc: i === 0 ? 'Melakukan observasi awal pada sistem yang berjalan.' : '',
                type: 'Individu',
                saved: i === 0 ? true : false,
                validated: i === 0 ? true : false,
                isLocked: isLockedByDate
            });
        }
    },

    formatRange(s, e) {
        const opt = { day: '2-digit', month: 'short' };
        return `${s.toLocaleDateString('id-ID', opt)} - ${e.toLocaleDateString('id-ID', opt)}`;
    },

    saveLog(id) {
        let week = this.weeks.find(w => w.id === id);
        if (!week.title || !week.desc) {
            Swal.fire('Perhatian', 'Harap isi nama dan uraian kegiatan!', 'warning');
            return;
        }

        Swal.fire({
            title: 'Simpan Logbook?',
            text: 'Setelah disimpan, data minggu ini akan dikunci.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#086375',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                week.saved = true;
                Swal.fire('Tersimpan!', 'Logbook berhasil dikunci.', 'success');
            }
        });
    },

    // Fungsi untuk handle pilih file
    handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            this.reportFile = file;
            this.reportName = file.name;
            Swal.fire({
                title: 'File Terpilih',
                text: 'Laporan: ' + file.name,
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        }
    },

    // Fungsi untuk ganti file
    triggerUpload() {
        this.$refs.fileInput.click();
    }
}">

    <div class="fade-up bg-tsu-teal text-white rounded-xl p-6 mb-8 shadow-md">
        <h2 class="text-xl font-bold mb-2">Logbook Kegiatan Mingguan</h2>
        <p class="text-sm text-teal-50/80 font-light">
            Logbook hanya dapat diisi jika sudah memasuki range tanggal yang ditentukan. 
        </p>
    </div>

    <div class="fade-up delay-200 overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
        <table id="tableLogbook" class="min-w-full border-collapse">
            <thead class="bg-tsu-teal text-white text-sm">
                <tr>
                    <th class="py-4 px-4 text-center font-bold w-16 border-r border-white/10">Minggu</th>
                    <th class="py-4 px-4 text-center font-bold w-48 border-r border-white/10">Range Tanggal</th>
                    <th class="py-4 px-4 text-left font-bold w-1/4 border-r border-white/10">Nama Kegiatan</th>
                    <th class="py-4 px-4 text-left font-bold border-r border-white/10">Uraian Kegiatan</th>
                    <th class="py-4 px-4 text-center font-bold w-32 border-r border-white/10">Jenis</th>
                    <th class="py-4 px-4 text-center font-bold w-44 no-export">Status & Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <template x-for="week in weeks" :key="week.id">
                    <tr class="transition text-sm" 
                        :class="week.isLocked ? 'bg-gray-50 opacity-60' : (week.saved ? 'bg-white' : 'bg-red-50/40')">
                        
                        <td class="py-4 px-4 text-center font-black text-gray-700 border-r border-gray-100" x-text="week.id"></td>
                        <td class="py-4 px-4 text-center text-gray-600 font-medium border-r border-gray-100" x-text="week.dateRange"></td>
                        
                        <td class="py-4 px-4 border-r border-gray-100 data-cell">
                            <template x-if="!week.saved && !week.isLocked">
                                <input type="text" x-model="week.title" placeholder="Input kegiatan..."
                                       class="w-full bg-white border border-gray-300 rounded-lg p-2 outline-none">
                            </template>
                            <template x-if="week.saved || week.isLocked">
                                <span class="font-bold text-gray-800" x-text="week.isLocked ? '' : (week.title || '-')"></span>
                            </template>
                        </td>

                        <td class="py-4 px-4 border-r border-gray-100 data-cell">
                            <template x-if="!week.saved && !week.isLocked">
                                <textarea x-model="week.desc" placeholder="Ceritakan detail kegiatan..."
                                          class="w-full bg-white border border-gray-300 rounded-lg p-2 outline-none min-h-[42px]"></textarea>
                            </template>
                            <template x-if="week.saved || week.isLocked">
                                <span class="text-gray-600 leading-relaxed block whitespace-pre-line" x-text="week.isLocked ? '' : (week.desc || '-')"></span>
                            </template>
                        </td>

                        <td class="py-4 px-4 text-center border-r border-gray-100 data-cell">
                            <span x-text="week.isLocked ? '' : week.type"></span>
                        </td>

                        <td class="py-4 px-4 text-center no-export">
                            <div class="flex flex-col items-center gap-2">
                                <template x-if="week.isLocked">
                                    <span class="text-[10px] font-bold text-gray-400 uppercase italic">Belum Dibuka</span>
                                </template>

                                <template x-if="!week.saved && !week.isLocked">
                                    <div class="flex flex-col items-center gap-2">
                                        <span class="text-[9px] font-black text-red-500 uppercase tracking-widest animate-pulse">Belum Diisi</span>
                                        <button @click="saveLog(week.id)" class="bg-tsu-teal text-white px-5 py-1.5 rounded-full text-xs font-bold hover:bg-teal-700 shadow-sm transition active:scale-95">
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

    <div class="mt-10 flex flex-col md:flex-row justify-between items-center gap-6 pb-10">
        <button onclick="exportLogbookToWord()" class="flex items-center gap-2 bg-gray-800 text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-black transition shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            Download Logbook (.doc)
        </button>

        <div class="bg-white p-4 rounded-2xl border-2 border-dashed border-gray-300 flex items-center gap-4 shadow-sm">
            <div class="text-right">
                <template x-if="!reportName">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase">Sudah Selesai Magang?</p>
                        <p class="text-sm font-bold text-gray-700">Upload Laporan Akhir</p>
                    </div>
                </template>
                <template x-if="reportName">
                    <div>
                        <p class="text-xs font-black text-green-500 uppercase tracking-widest">File Berhasil Dipilih:</p>
                        <p class="text-sm font-bold text-gray-700 truncate max-w-[200px]" x-text="reportName"></p>
                    </div>
                </template>
            </div>

            <input type="file" x-ref="fileInput" class="hidden" accept=".pdf" @change="handleFileUpload($event)">
            
            <button @click="triggerUpload()" 
                    class="transition shadow-md p-3 rounded-xl text-white"
                    :class="reportName ? 'bg-orange-500 hover:bg-orange-600' : 'bg-tsu-teal hover:bg-teal-700'">
                
                <template x-if="!reportName">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                </template>

                <template x-if="reportName">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                </template>
            </button>
        </div>
    </div>
</div>

<script>
    function exportLogbookToWord() {
        const originalTable = document.getElementById('tableLogbook');
        const clonedTable = originalTable.cloneNode(true);
        
        // 1. Hapus kolom 'Status & Aksi' dari header dan body
        const headers = clonedTable.querySelectorAll('th');
        if(headers.length > 0) headers[headers.length - 1].remove();

        const rows = clonedTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            // Hapus cell terakhir (kolom aksi)
            if(row.lastElementChild) row.lastElementChild.remove();

            // 2. Bersihkan isi cell
            const cells = row.querySelectorAll('td');
            cells.forEach((cell) => {
                const input = cell.querySelector('input');
                const textarea = cell.querySelector('textarea');
                const span = cell.querySelector('span');

                if (input) {
                    cell.innerHTML = input.value || '';
                } else if (textarea) {
                    cell.innerHTML = textarea.value.replace(/\n/g, '<br>') || '';
                } else if (span) {
                    let textValue = span.innerText;
                    if (textValue === 'Belum Waktunya') textValue = '';
                    cell.innerHTML = textValue;
                }
            });
        });

        const headerDoc = `
            <html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
            <head><meta charset='utf-8'>
            <style>
                table { border-collapse: collapse; width: 100%; font-family: Arial; }
                th { border: 2px solid black; padding: 10px; background-color: #f2f2f2; text-align: center; font-weight: bold; }
                td { border: 1px solid black; padding: 8px; vertical-align: top; }
                .title { text-align: center; font-size: 16pt; font-weight: bold; margin-bottom: 20px; text-decoration: underline; }
            </style>
            </head><body>
            <div class='title'>LOGBOOK KEGIATAN MAGANG MAHASISWA</div>
        `;
        
        const footerDoc = "</body></html>";
        const combinedHTML = headerDoc + clonedTable.outerHTML + footerDoc;
        
        const blob = new Blob(['\ufeff', combinedHTML], { type: 'application/msword' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'Logbook_Magang_Mahasiswa.doc';
        link.click();
        
        Swal.fire({
            title: 'Berhasil!',
            text: 'Tabel logbook telah diekspor ke Word.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    }
</script>

@endsection
@extends('layouts.app')

@section('title', 'Penilaian Magang')

@section('header_title', 'Penilaian Mahasiswa')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .file-card {
        @apply transition-all duration-300 border-2 border-dashed border-slate-200 rounded-[2rem] p-8 flex flex-col items-center justify-center gap-4 bg-white hover:border-tsu-teal hover:bg-teal-50/30 group cursor-pointer;
    }
    
    .file-icon-wrapper {
        @apply w-16 h-16 rounded-2xl flex items-center justify-center transition-all duration-300;
    }

    [x-cloak] { display: none !important; }

    @media print {
        .no-print { display: none !important; }
        #printArea { width: 100%; margin: 0; padding: 20px; }
        .rounded-3xl { border: 1px solid #ddd !important; border-radius: 12px !important; }
        .bg-slate-50\/80 { background-color: #f8fafc !important; -webkit-print-color-adjust: exact; }
    }
</style>

<div class="w-full pb-20 px-4 md:px-0">
    <div id="printArea" class="max-w-5xl mx-auto">
        
        <div class="fade-up bg-gradient-to-br from-white to-slate-50 border border-slate-200 rounded-[2.5rem] p-10 mb-8 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-tsu-teal/5 rounded-full -mr-20 -mt-20"></div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <span class="px-4 py-1.5 bg-tsu-teal text-white text-[10px] font-black uppercase rounded-full tracking-widest shadow-lg shadow-tsu-teal/20">Program Berjalan</span>
                    <h2 class="text-4xl font-black text-slate-800 mt-4 tracking-tighter">Program Website Penjualan</h2>
                    <p class="text-lg text-slate-500 font-medium">PT. Tiga Serangkai • <span class="text-tsu-teal">Frontend Developer</span></p>
                </div>
                <div class="flex flex-col items-end">
                    <p class="text-sm font-black text-slate-400 uppercase tracking-widest">Periode Selesai</p>
                    <p class="text-xl font-bold text-slate-700">{{ date('d F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="fade-up bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 flex flex-col items-center justify-center relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-2 h-full bg-tsu-blue"></div>
                <h3 class="text-slate-400 font-black text-xs uppercase tracking-widest mb-2">Nilai Industri</h3>
                <span class="text-7xl font-black text-tsu-blue tracking-tighter group-hover:scale-110 transition-transform">87</span>
                <p class="text-slate-500 mt-4 font-bold text-xs text-center leading-relaxed">Kuriman Tech, S.Kom.<br><span class="text-[10px] text-slate-300 font-medium">Pembimbing Lapangan</span></p>
            </div>

            <div class="fade-up bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 flex flex-col items-center justify-center relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-2 h-full bg-tsu-teal"></div>
                <h3 class="text-slate-400 font-black text-xs uppercase tracking-widest mb-2">Nilai Akademik</h3>
                <span class="text-7xl font-black text-tsu-teal tracking-tighter group-hover:scale-110 transition-transform">85</span>
                <p class="text-slate-500 mt-4 font-bold text-xs text-center leading-relaxed">Wawan Laksito, M.M.<br><span class="text-[10px] text-slate-300 font-medium">Dosen Pembimbing</span></p>
            </div>

            <div class="fade-up md:col-span-1 bg-gradient-to-br from-indigo-900 to-slate-900 rounded-[2.5rem] p-8 text-white flex flex-col justify-center relative overflow-hidden shadow-2xl shadow-indigo-900/20 group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400/20 absolute -right-2 -bottom-2" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H14.017C13.4647 8 13.017 8.44772 13.017 9V15C13.017 16.3261 13.3468 17.6143 13.9366 18.7291L14.017 21ZM6.017 21L6.017 18C6.017 16.8954 6.91243 16 8.017 16H11.017C11.5693 16 12.017 15.5523 12.017 15V9C12.017 8.44772 11.5693 8 11.017 8H6.017C5.46472 8 5.017 8.44772 5.017 9V15C5.017 16.3261 5.34684 17.6143 5.93661 18.7291L6.017 21Z" /></svg>
                <p class="text-sm italic font-medium leading-relaxed text-indigo-100 relative z-10">
                    "Website sudah memenuhi kriteria. Layout responsif dan fitur berfungsi dengan baik."
                </p>
                <div class="mt-4 pt-4 border-t border-white/10 text-right">
                    <p class="text-[10px] font-black uppercase tracking-tighter text-indigo-400">Review Dosen</p>
                </div>
            </div>
        </div>

        <div class="fade-up no-print space-y-8 mb-10">
            <div class="flex items-center gap-4 px-2">
                <div class="h-8 w-2 bg-tsu-teal rounded-full"></div>
                <h3 class="text-2xl font-black text-slate-800 tracking-tight">Kelengkapan Berkas Magang</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="fade-up flex flex-col gap-4">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest ml-2">1. Dokumen Usulan Konversi</p>
                    <input type="file" id="fileKonversi" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="updateFilePreview('fileKonversi', 'previewKonversi')">
                    <div onclick="document.getElementById('fileKonversi').click()" class="file-card border-tsu-teal/20 bg-tsu-teal/[0.02]">
                        <div id="previewKonversi" class="flex flex-col items-center">
                            <div class="file-icon-wrapper bg-amber-50 text-amber-500 group-hover:bg-amber-500 group-hover:text-white group-hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-sm font-black text-slate-700">Upload Usulan Konversi</p>
                                <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-tight">Format: PDF/Gambar (Maks 2MB)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fade-up flex flex-col gap-4">
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest ml-2">2. Sertifikat & Nilai Industri</p>
                    <input type="file" id="fileSertif" class="hidden" accept=".pdf" onchange="updateFilePreview('fileSertif', 'previewSertif')">
                    <div onclick="document.getElementById('fileSertif').click()" class="file-card border-tsu-teal/20 bg-tsu-teal/[0.02]">
                        <div id="previewSertif" class="flex flex-col items-center">
                            <div class="file-icon-wrapper bg-tsu-teal/10 text-tsu-teal group-hover:bg-tsu-teal group-hover:text-white group-hover:-rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-sm font-black text-slate-700 text-tsu-teal">Upload Sertifikat & Nilai</p>
                                <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-tight">Wajib Format PDF</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="tableToExport" class="fade-up mb-10 overflow-hidden border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/40 bg-white">
            <div class="bg-slate-50/50 p-6 border-b border-slate-100 flex justify-between items-center no-word-export">
                <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest">Daftar Konversi Mata Kuliah</h3>
                <span class="px-4 py-1.5 bg-emerald-100 text-emerald-600 text-[10px] font-black rounded-xl border border-emerald-200 uppercase tracking-tighter">Tervalidasi Prodi</span>
            </div>
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] bg-white">
                        <th class="px-6 py-5 text-center border-b w-16">No</th>
                        <th class="px-6 py-5 text-left border-b">Nama Mata Kuliah</th>
                        <th class="px-6 py-5 text-center border-b w-40">Kode MK</th>
                        <th class="px-6 py-5 text-center border-b w-24">SKS</th>
                        <th class="px-6 py-5 text-center border-b w-32 bg-slate-50/80">Nilai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 font-bold text-slate-700">
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">1</td>
                        <td class="px-6 py-5">Pemrograman Framework</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF1234</td>
                        <td class="px-6 py-5 text-center">4</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">2</td>
                        <td class="px-6 py-5">Interaksi Manusia & Komputer</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF5678</td>
                        <td class="px-6 py-5 text-center">3</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">3</td>
                        <td class="px-6 py-5">Pemrograman Framework</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF1234</td>
                        <td class="px-6 py-5 text-center">4</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">4</td>
                        <td class="px-6 py-5">Interaksi Manusia & Komputer</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF5678</td>
                        <td class="px-6 py-5 text-center">3</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">5</td>
                        <td class="px-6 py-5">Pemrograman Framework</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF1234</td>
                        <td class="px-6 py-5 text-center">4</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 text-center text-slate-400 font-medium">6</td>
                        <td class="px-6 py-5">Interaksi Manusia & Komputer</td>
                        <td class="px-6 py-5 text-center text-tsu-teal">IF5678</td>
                        <td class="px-6 py-5 text-center">3</td>
                        <td class="px-6 py-5 text-center bg-slate-50/30 font-black text-tsu-blue">A</td>
                    </tr>
                </tbody>
                <tfoot class="bg-slate-50/80">
                    <tr class="font-black text-slate-800">
                        <td colspan="3" class="px-6 py-5 text-right uppercase text-[10px] tracking-[0.2em] text-slate-400">Total SKS Dikonversi</td>
                        <td class="px-6 py-5 text-center text-lg text-tsu-teal">21</td>
                        <td class="px-6 py-5 bg-slate-100/50"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="no-print flex justify-center mt-12 mb-20">
            <button type="button" onclick="exportOnlyTableToWord()" class="flex items-center gap-3 bg-blue-700 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-blue-800 transition-all shadow-2xl active:scale-95 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                Cetak Laporan Word
            </button>
        </div>
    </div>
</div>

<script>
    function updateFilePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const file = input.files[0];

        if (file) {
            Swal.fire({ title: 'Berhasil!', text: file.name + ' dipilih.', icon: 'success', timer: 1000, showConfirmButton: false });
            preview.innerHTML = `
                <div class="file-icon-wrapper bg-emerald-500 text-white shadow-lg shadow-emerald-100 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm font-black text-emerald-600 truncate w-48">${file.name}</p>
                    <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-widest">Ganti File</p>
                </div>`;
        }
    }

    function exportOnlyTableToWord() {
        const tableElement = document.getElementById('tableToExport').querySelector('table').outerHTML;
        
        const header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Daftar Konversi Mata Kuliah</title><style>"+
            "body { font-family: 'Arial', sans-serif; } "+
            "h2 { text-align: center; margin-bottom: 20px; } "+
            "table { border-collapse: collapse; width: 100%; margin-top: 10px; } "+
            "th, td { border: 1px solid #333; padding: 10px; text-align: center; } "+
            "th { background-color: #f2f2f2; font-weight: bold; } "+
            ".text-left { text-align: left; }"+
            "</style></head><body>"+
            "<h2>DAFTAR KONVERSI MATA KULIAH MAGANG</h2>";
            
        const footer = "</body></html>";
        const sourceHTML = header + tableElement + footer;
        
        const source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        const fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'Laporan-Konversi-Mata-Kuliah.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);

        Swal.fire({
            title: 'Berhasil!',
            text: 'Dokumen Word tabel konversi berhasil diunduh.',
            icon: 'success',
            confirmButtonColor: '#086375'
        });
    }
</script>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard - Program Magang')

@section('header_title', 'Program Magang')

@section('content')

<style>
    html { scroll-behavior: smooth; }
</style>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ 
        tab: 'mandiri', 
        page: 1, 
        perPage: 6,
        jobs: [
            /* 10 DATA MAGANG MANDIRI */
            { id: 1, type: 'mandiri', role: 'Frontend Developer', company: 'PT. Tiga Serangkai', title: 'Website Penjualan' },
            { id: 2, type: 'mandiri', role: 'Backend Engineer', company: 'Jujura Academy', title: 'API Management' },
            { id: 3, type: 'mandiri', role: 'UI/UX Designer', company: 'Creative Hub', title: 'Mobile App Design' },
            { id: 4, type: 'mandiri', role: 'QA Tester', company: 'Tech Solutions', title: 'Automation Testing' },
            { id: 5, type: 'mandiri', role: 'Data Entry', company: 'Global Logistik', title: 'Inventory System' },
            { id: 6, type: 'mandiri', role: 'IT Support', company: 'Bank Central', title: 'Network Maintenance' },
            { id: 7, type: 'mandiri', role: 'Fullstack Dev', company: 'Startup XYZ', title: 'SaaS Project' },
            { id: 8, type: 'mandiri', role: 'Database Admin', company: 'Data Center', title: 'SQL Optimization' },
            { id: 9, type: 'mandiri', role: 'Security Analyst', company: 'Cyber Guard', title: 'Audit System' },
            { id: 10, type: 'mandiri', role: 'DevOps Intern', company: 'Cloud Tech', title: 'Docker Deployment' },

            /* 10 DATA STUDI INDEPENDENT */
            { id: 11, type: 'studi', role: 'Android Developer', company: 'Bangkit Academy', title: 'Mobile Specialist' },
            { id: 12, type: 'studi', role: 'Cloud Architect', company: 'Google Cloud', title: 'Infrastructure' },
            { id: 13, type: 'studi', role: 'Machine Learning', company: 'AI Research', title: 'Neural Networks' },
            { id: 14, type: 'studi', role: 'Cyber Security', company: 'BSSN Academy', title: 'Ethical Hacking' },
            { id: 15, type: 'studi', role: 'Digital Marketing', company: 'RevoU', title: 'Growth Hacking' },
            { id: 16, type: 'studi', role: 'Blockchain Dev', company: 'Crypto Hub', title: 'Smart Contract' },
            { id: 17, type: 'studi', role: 'Data Science', company: 'DQLab', title: 'Big Data Analysis' },
            { id: 18, type: 'studi', role: 'Internet of Things', company: 'Makers Lab', title: 'Smart Home' },
            { id: 19, type: 'studi', role: 'Game Development', company: 'Agate Academy', title: 'Unity 3D' },
            { id: 20, type: 'studi', role: 'Product Management', company: 'PM School', title: 'Agile Framework' }
        ],
        get filteredJobs() {
            let filtered = this.jobs.filter(j => j.type === this.tab);
            return filtered.slice((this.page - 1) * this.perPage, this.page * this.perPage);
        },
        get totalPages() {
            return Math.ceil(this.jobs.filter(j => j.type === this.tab).length / this.perPage);
        }
    }">

    <div class="fade-up bg-tsu-teal text-white rounded-2xl p-8 mb-8 shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-2xl font-extrabold mb-2">Pilih Jalur Masa Depanmu!</h2>
            <p class="text-sm text-teal-50/80 font-light max-w-lg">
                Klik kategori di bawah untuk melihat lowongan Magang Mandiri atau Studi Independen.
            </p>
        </div>
    </div>

    <div id="about" class="fade-up delay-100 border border-gray-200 bg-white rounded-2xl p-8 mb-8 shadow-sm">
        
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <h3 class="text-xl font-black text-gray-800">Lowongan Tersedia - 2026</h3>

            <div class="flex bg-gray-100 p-1 rounded-xl w-full md:w-auto">
                <button @click="tab = 'mandiri'; page = 1" 
                        :class="tab === 'mandiri' ? 'bg-white text-tsu-teal shadow-sm' : 'text-gray-500'"
                        class="flex-1 md:flex-none px-8 py-2.5 rounded-lg text-sm font-bold transition-all">
                    Magang Mandiri
                </button>
                <button @click="tab = 'studi'; page = 1" 
                        :class="tab === 'studi' ? 'bg-white text-tsu-teal shadow-sm' : 'text-gray-500'"
                        class="flex-1 md:flex-none px-8 py-2.5 rounded-lg text-sm font-bold transition-all">
                    Studi Independen
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> 
            <template x-for="(job, index) in filteredJobs" :key="job.id">
                <div class="fade-up border border-gray-200 rounded-2xl p-5 flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition-all bg-white group"
                     :style="`animation-delay: ${index * 0.1}s`"
                     x-show="true">
                    
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-gray-50 rounded-xl group-hover:bg-teal-50 transition-colors">
                                <svg x-show="tab === 'mandiri'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tsu-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <svg x-show="tab === 'studi'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tsu-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            </div>
                            <span class="text-[9px] font-black px-2 py-1 rounded bg-gray-100 text-gray-500 uppercase tracking-tighter" x-text="tab === 'mandiri' ? 'Mandiri' : 'Studi Independen'"></span>
                        </div>
                        <h4 class="font-bold text-lg mb-1 text-gray-800 group-hover:text-tsu-teal transition-colors" x-text="job.title"></h4>
                        <div class="text-sm text-gray-500 mb-4 font-medium" x-text="job.company"></div>
                        <span class="inline-block bg-teal-50 text-tsu-teal font-bold text-[10px] uppercase px-3 py-1.5 rounded-lg mb-6 border border-teal-100" x-text="job.role"></span>
                    </div>
                    
                    <a :href="`{{ url('mahasiswa/program/detail') }}/${job.id}`" class="flex items-center justify-center gap-2 w-full bg-tsu-teal text-white text-sm font-bold py-3 rounded-xl hover:bg-tsu-teal-dark transition-all active:scale-95 shadow-md shadow-teal-100">
                        Lihat Detail Program
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </template>
        </div>

        <div class="flex items-center justify-center gap-2 mt-12">
            <button @click="page = Math.max(1, page - 1)" 
                    :disabled="page === 1"
                    class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <template x-for="p in totalPages">
                <button @click="page = p" 
                        :class="page === p ? 'bg-tsu-teal text-white' : 'border border-gray-200 text-gray-600'"
                        class="w-10 h-10 rounded-lg font-bold text-sm transition-all" 
                        x-text="p"></button>
            </template>

            <button @click="page = Math.min(totalPages, page + 1)" 
                    :disabled="page === totalPages"
                    class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>

    <div class="fade-up delay-[800ms] border border-gray-300 rounded-xl p-6 mb-8 text-center">
        <h3 class="text-lg font-bold mb-6">Jumlah Peserta Yang Telah Bergabung</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="fade-up delay-[900ms] text-center p-6 rounded-2xl bg-red-50/50 border border-red-80">
                <div class="text-4xl font-bold text-tsu-red mb-1">30</div>
                <div class="text-sm font-medium text-gray-600">Peserta Terdaftar</div>
            </div>
            <div class="fade-up delay-[1000ms] text-center p-6 rounded-2xl bg-green-50/50 border border-green-80">
                <div class="text-4xl font-bold text-green-500 mb-1">10</div>
                <div class="text-sm font-medium text-gray-600">Peserta Aktif</div>
            </div>
            <div class="fade-up delay-[1100ms] text-center p-6 rounded-2xl bg-blue-50/50 border border-blue-80">
                <div class="text-4xl font-bold text-tsu-blue mb-1">50</div>
                <div class="text-sm font-medium text-gray-600">Peserta Lulus</div>
            </div>
        </div>
    </div>

    <div class="fade-up delay-[1200ms] bg-tsu-teal text-white rounded-2xl p-10 shadow-lg flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
            <h2 class="text-2xl font-black mb-2">Bangun Karir Lewat Magang Sesuai Skill Kamu!</h2>
            <p class="text-sm text-teal-50/80 font-light max-w-xl">Bergabunglah dengan ribuan mahasiswa lainnya dan dapatkan pengalaman kerja nyata di perusahaan impian.</p>
        </div>
        <a href="#about" class="bg-white text-tsu-teal px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition shadow-xl active:scale-95 whitespace-nowrap">
            Daftar Sekarang
        </a>
    </div>

@endsection
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Detail Program TSU')</title> 
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tsu-teal': '#086375',       
                        'tsu-teal-dark': '#064e5c',
                        'tsu-header-detail': '#09697E', 
                        'tsu-blue-light': '#E0F2FE', 
                        'tsu-blue-text': '#0284c7',  
                        'tsu-green-light': '#dcfce7', 
                        'tsu-green-text': '#16a34a',
                        'tsu-red': '#ef4444',
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 4px; }
        
        .fade-up {
            opacity: 0;
            animation: fadeUp 0.6s cubic-bezier(0.21, 1.02, 0.73, 1) forwards;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans text-gray-800 min-h-screen">

    @php
        // Deteksi Role untuk Link Dinamis
        $isMahasiswa = request()->is('mahasiswa*');
        $isDosen = request()->is('dosen*');

        // Link Kembali ke Dashboard/Program sesuai role
        $backLink = $isMahasiswa ? route('mahasiswa.program') : ($isDosen ? route('dosen.dashboard') : url('/'));
        
        // Link Setting sesuai role
        $settingLink = '#';
        if($isMahasiswa) $settingLink = route('mahasiswa.setting');
        elseif($isDosen) $settingLink = route('dosen.setting');
    @endphp

    <header class="bg-tsu-header-detail text-white shadow-md relative z-50">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center max-w-6xl">
            
            <div class="flex items-center gap-8">
                {{-- Link logo kembali ke rute yang benar --}}
                <a href="{{ $backLink }}" class="transition hover:opacity-80">
                    <img src="{{ asset('images/logo_tsu_white.svg') }}" class="h-12" alt="Logo TSU">
                </a>
                <div class="h-8 w-[1.5px] bg-white/30 hidden md:block"></div>
                <h1 class="text-xl font-bold tracking-wide hidden md:block">@yield('header_title', 'Detail Magang')</h1>
            </div>

            <div class="relative group">
                {{-- Menggunakan Hover daripada Click Toggle agar lebih konsisten dengan App Sidebar --}}
                <button class="flex items-center gap-3 hover:bg-white/10 p-2 rounded-xl transition">
                    <img src="{{ asset('images/ic_profile.png') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white/50 shadow-sm">
                    <div class="text-left hidden sm:block leading-tight">
                        <p class="font-bold text-sm flex items-center gap-1">
                            {{ $isDosen ? 'Dosen Pembimbing' : 'Thomas Satria Bintara' }}
                            <span class="text-[10px] transition-transform group-hover:rotate-180 inline-block">▼</span>
                        </p>
                        <p class="text-[11px] text-gray-200 font-light">{{ $isDosen ? 'NIDN. 061234567' : '22430035' }}</p>
                    </div>
                </button>

                {{-- Dropdown Menu (Muncul saat hover group) --}}
                <div class="absolute right-0 mt-0 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right z-[100]">
                    <a href="{{ $settingLink }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </a>
                    <hr class="my-1 border-gray-100">
                    {{-- Tombol Logout memicu Modal --}}
                    <button id="logoutBtnHeader" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8 max-w-6xl">
        @yield('content')
    </main>

    {{-- Modal Logout (Sama dengan app.blade agar seragam) --}}
    <div id="logoutModalHeader" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-sm p-8 transform transition-transform duration-300 scale-95">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2 text-center">Konfirmasi Keluar</h3>
            <p class="text-gray-500 mb-8 text-center leading-relaxed">Sesi Anda akan berakhir. Pastikan semua progres telah tersimpan.</p>
            
            <div class="flex gap-4">
                <button id="cancelLogoutHeader" class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 font-bold rounded-2xl hover:bg-gray-200 transition">Batal</button>
                <a href="{{ route('login') }}" class="flex-1 px-4 py-3 bg-tsu-red text-white font-bold rounded-2xl hover:bg-red-700 transition text-center">Keluar</a>
            </div>
        </div>
    </div>

    <script>
        // Logic Modal Logout
        const logoutModal = document.getElementById('logoutModalHeader');
        const logoutBtn = document.getElementById('logoutBtnHeader');
        const cancelBtn = document.getElementById('cancelLogoutHeader');

        logoutBtn.addEventListener('click', () => {
            logoutModal.classList.remove('hidden');
            logoutModal.classList.add('flex');
        });

        cancelBtn.addEventListener('click', () => {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
        });

        // Menutup modal jika klik di luar area modal
        window.addEventListener('click', (e) => {
            if (e.target === logoutModal) {
                logoutModal.classList.add('hidden');
                logoutModal.classList.remove('flex');
            }
        });
    </script>

</body>
</html>
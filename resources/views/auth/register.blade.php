<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TSU</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tsu-teal': '#086375',
                        'tsu-teal-dark': '#064e5c',
                        'tsu-light': '#f0f9fa',
                    },
                    fontFamily: { 'sans': ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        .rotate-180 { transform: rotate(180deg); }
        .transition-transform { transition: transform 0.3s ease; }
        
        .custom-scroll::-webkit-scrollbar { width: 6px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #086375; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#f4f7f6] font-sans min-h-screen flex items-center justify-center overflow-hidden">

    <div class="flex w-full h-screen bg-white shadow-2xl overflow-hidden">
        
        <div class="w-full lg:w-[55%] h-full flex flex-col px-8 sm:px-16 lg:px-24 py-10 overflow-y-auto custom-scroll">
            
            <div class="flex items-center gap-4 mb-10">
                <img src="/images/logo_tsu.svg" class="h-16 w-auto" alt="Logo TSU">
                <div class="h-10 w-[2px] bg-gray-200"></div>
                <span class="text-[11px] font-medium text-gray-500 uppercase tracking-wider leading-tight">
                    Sistem Informasi Magang<br>
                    <b class="text-gray-800 text-xs">Universitas Tiga Serangkai</b>
                </span>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">Buat Akun Baru</h2>
            <p class="text-gray-500 text-sm mb-8">Silakan lengkapi data di bawah ini untuk bergabung.</p>

            <div class="inline-flex p-1 bg-gray-100 rounded-xl mb-8 w-full max-w-md">
                <button id="tab-mahasiswa" onclick="switchTab('mahasiswa')" 
                    class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 bg-tsu-teal text-white shadow-sm">
                    Mahasiswa
                </button>
                <button id="tab-dosen" onclick="switchTab('dosen')" 
                    class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700">
                    Dosen Pembimbing
                </button>
            </div>

            <form id="formRegister" onsubmit="handleRegister(event)" class="space-y-5 w-full max-w-md pb-10">
                
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" id="input-nama" placeholder="Contoh: Gibran Rakabuming" required
                        class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none transition-all">
                </div>

                <div id="field-nim" class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">NIM</label>
                    <input type="text" placeholder="Masukkan NIM Anda"
                        class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none transition-all">
                </div>

                <div id="field-nuptk" class="hidden space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">NUPTK</label>
                    <input type="text" placeholder="Masukkan NUPTK Anda"
                        class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none transition-all">
                </div>

                <div id="field-prodi" class="space-y-1.5 relative">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Program Studi</label>
                    
                    <div id="dropdown-trigger" onclick="toggleDropdown()" 
                        class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm cursor-pointer flex justify-between items-center hover:border-tsu-teal transition-all">
                        <span id="selected-prodi" class="text-gray-400">Pilih Program Studi</span>
                        <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <div id="dropdown-menu" class="hidden absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden animate-in fade-in zoom-in duration-200">
                        <ul class="py-2 text-sm text-gray-700 max-h-48 overflow-y-auto custom-scroll">
                            <li onclick="selectOption('S1 - Informatika')" class="px-4 py-2.5 hover:bg-tsu-light hover:text-tsu-teal cursor-pointer transition-colors">S1 - Informatika</li>
                            <li onclick="selectOption('S1 - Sistem Informasi')" class="px-4 py-2.5 hover:bg-tsu-light hover:text-tsu-teal cursor-pointer transition-colors">S1 - Sistem Informasi</li>
                            <li onclick="selectOption('D3 - Teknologi Informasi')" class="px-4 py-2.5 hover:bg-tsu-light hover:text-tsu-teal cursor-pointer transition-colors">D3 - Teknologi Informasi</li>
                            <li onclick="selectOption('D3 - Sistem Informasi Akuntansi')" class="px-4 py-2.5 hover:bg-tsu-light hover:text-tsu-teal cursor-pointer transition-colors">D3 - Sistem Informasi Akuntansi</li>
                            <li onclick="selectOption('D3 - Sistem Informasi')" class="px-4 py-2.5 hover:bg-tsu-light hover:text-tsu-teal cursor-pointer transition-colors">D3 - Sistem Informasi</li>
                        </ul>
                    </div>
                    <input type="hidden" name="prodi" id="prodi-input" required>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Email Institusi</label>
                    <input type="email" placeholder="nama@tsu.ac.id" required
                        class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none transition-all">
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 uppercase tracking-wide">Password</label>
                    <div class="relative group">
                        <input type="password" id="password" placeholder="••••••••" required
                            class="w-full bg-gray-50 border border-gray-200 px-4 py-3 rounded-xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none transition-all">
                        <button type="button" onclick="togglePassword('password', 'eye-1')" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-tsu-teal transition-colors">
                            <svg id="eye-1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-tsu-teal text-white font-bold py-3.5 rounded-xl hover:bg-tsu-teal-dark shadow-xl shadow-tsu-teal/20 transition-all active:scale-[0.98]">
                        Daftar Akun
                    </button>
                </div>

                <p class="text-center text-sm text-gray-500">
                    Sudah punya akun? <a href="/login" class="text-tsu-teal font-bold hover:underline">Masuk</a>
                </p>
            </form>
        </div>

        <div class="hidden lg:flex w-[45%] bg-tsu-teal flex-col justify-center items-center relative p-12 overflow-hidden">
            <div class="absolute top-[-10%] right-[-10%] w-[300px] h-[300px] bg-tsu-teal-dark rounded-full blur-[80px] opacity-50"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[300px] h-[300px] bg-[#4EA7B2] rounded-full blur-[80px] opacity-30"></div>

            <div class="relative z-10 text-center">
                <img src="/images/ic_logreg.svg" class="w-full max-w-sm mx-auto mb-10 drop-shadow-2xl" alt="Illustration">
                <h2 class="text-white text-3xl font-bold mb-4">Gapai Karir Impianmu</h2>
                <p class="text-white/70 text-sm max-w-xs mx-auto leading-relaxed">
                    Platform resmi Universitas Tiga Serangkai untuk manajemen magang mahasiswa yang lebih transparan dan efisien.
                </p>
            </div>
        </div>

    </div>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById('dropdown-menu');
            const arrow = document.getElementById('arrow-icon');
            const isHidden = menu.classList.contains('hidden');
            
            if (isHidden) {
                menu.classList.remove('hidden');
                arrow.classList.add('rotate-180');
            } else {
                menu.classList.add('hidden');
                arrow.classList.remove('rotate-180');
            }
        }

        function selectOption(val) {
            document.getElementById('selected-prodi').innerText = val;
            document.getElementById('selected-prodi').classList.replace('text-gray-400', 'text-gray-800');
            document.getElementById('prodi-input').value = val;
            toggleDropdown();
        }

        window.addEventListener('click', function(e) {
            if (!document.getElementById('field-prodi').contains(e.target)) {
                document.getElementById('dropdown-menu').classList.add('hidden');
                document.getElementById('arrow-icon').classList.remove('rotate-180');
            }
        });

        function switchTab(type) {
            const tabMhs = document.getElementById('tab-mahasiswa');
            const tabDsn = document.getElementById('tab-dosen');
            const fieldNim = document.getElementById('field-nim');
            const fieldNuptk = document.getElementById('field-nuptk');
            const fieldProdi = document.getElementById('field-prodi');
            const inputNama = document.getElementById('input-nama');

            if (type === 'mahasiswa') {
                tabMhs.className = "flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 bg-tsu-teal text-white shadow-sm";
                tabDsn.className = "flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700";
                fieldNim.classList.remove('hidden');
                fieldProdi.classList.remove('hidden');
                fieldNuptk.classList.add('hidden');
                inputNama.placeholder = "Contoh: Gibran Rakabuming";
            } else {
                tabDsn.className = "flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 bg-tsu-teal text-white shadow-sm";
                tabMhs.className = "flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all duration-300 text-gray-500 hover:text-gray-700";
                fieldNuptk.classList.remove('hidden');
                fieldNim.classList.add('hidden');
                fieldProdi.classList.add('hidden');
                inputNama.placeholder = "Contoh: Prabowo Subianto";
            }
        }

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }

        function handleRegister(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Registrasi Berhasil!',
                text: 'Akun Anda sudah terdaftar.',
                icon: 'success',
                confirmButtonColor: '#086375'
            }).then(() => {
                window.location.href = "/login";
            });
        }
    </script>
</body>
</html>
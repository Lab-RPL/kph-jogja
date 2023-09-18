<div class="container">
    <div class="navigation scrollable-container">
            {{-- Hanya untuk user_type user --}}
            @if(session('user_type') === 'user') 
                {{-- Semua navigation item untuk user --}}
                <ul>
                    <li>
                        <a href="/dashboard">
                            <span class="icon">
                                <img src="{{ asset('images/LogoKPH.png') }}" alt="Logo">
                            </span>
                            <span class="title">KPH Yogyakarta</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/dashboard">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-utama">
                            <span class="icon">
                                <ion-icon name="stats-chart-outline"></ion-icon>
                            </span>
                            <span class="title">Data Inventaris</span>
                        </a> 
                    </li>
        
                    <li class="nav-item dropdown">
                        <a href="/data-bdh">
                            <span class="icon">
                                <i class="fas fa-tree fa-2x"></i>
                            </span>
                            <span class="title">Luas Hutan Per-BDH 
                                <ion-icon name="chevron-forward-outline" id="dropdown-icon" class="rotate-icon"></ion-icon>
                            </span>
                        </a>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="/bdh-read">BDH</a>
                            <a href="/ul-rph">RPH</a>
                            <a href="/petak-read">Petak</a>
                        </div>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-izin">
                            <span class="icon">
                                <ion-icon name="shield-checkmark-outline"></ion-icon>
                            </span>
                            <span class="title">Perizinan Berusaha</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-potensi">
                            <span class="icon">
                                <ion-icon name="leaf-outline"></ion-icon>
                            </span>
                            <span class="title">Potensi Hasil Hutan</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-produksi">
                            <span class="icon">
                                <ion-icon name="settings-outline"></ion-icon>
                            </span>
                            <span class="title">Produksi Hasil Hutan</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-pnbp">
                            <span class="icon">
                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                            </span>
                            <span class="title">Penerimaan Negara Bukan Pajak</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-rusak">
                            <span class="icon">
                                <i class="fas fa-heart-broken fa-lg"></i>
                            </span>
                            <span class="title">Kerusakan/Kehilangan</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/data-luas">
                            <span class="icon">
                                <i class="fab fa-pagelines fa-2x"></i>
                            </span>
                            <span class="title">Luas Hutan</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a href="/logout">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                    @endif
                    
                    {{-- Hanya untuk user_type admin --}}
                    @if(session('user_type') === 'admin') 
                    {{-- Semua navigation item untuk admin --}}
                    <li class="nav-item">
                        <a href="/admin">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Tambah User</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/logout">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
                
            @endif
        </div>
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            


        </div>

        <script>
            document.getElementById("dropdown-icon").addEventListener("click", function() {
              var dropdownContent = document.getElementById("myDropdown");
              if (dropdownContent.style.visibility === "hidden" || dropdownContent.style.visibility === "") {
                dropdownContent.style.visibility = "visible";
                dropdownContent.style.opacity = "1";
                dropdownContent.style.transform = "translateY(0)";
              } else {
                dropdownContent.style.visibility = "hidden";
                dropdownContent.style.opacity = "0";
                dropdownContent.style.transform = "translateY(-10px)";
              }
            });
          </script>
        
        <script>
            // Fungsi yang menetapkan kelas 'active' pada elemen navigasi yang diklik dan menghapusnya dari yang lain
            function setActiveNavItem(event) {
            const clickedElement = event.target; // Dapatkan elemen yang diklik

            // Cek apakah elemen yang diklik adalah ion-icon
            const isIonIcon = clickedElement.tagName.toLowerCase() === 'ion-icon';

            // Jika elemen yang diklik adalah ion-icon, mencegah tindakan default
            if (isIonIcon) {
            event.preventDefault();
            clickedElement.classList.toggle('rotated');
            }
                // Dapatkan semua elemen 'nav-item'
                const navItems = document.querySelectorAll('.navigation ul li.nav-item');

                // Hapus kelas 'active' dan 'clicked' dari semua elemen 'nav-item'
                navItems.forEach((navItem) => {
                    navItem.classList.remove('active');
                    navItem.classList.remove('clicked');
                });

                // Tambahkan kelas 'active' dan 'clicked' ke elemen yang diklik
                event.currentTarget.classList.add('active');
                event.currentTarget.classList.add('clicked');
            }

            function setActivePage() {
                const currentPathname = window.location.pathname;

                const navLinks = document.querySelectorAll('.nav-item a');
                navLinks.forEach((navLink) => {
                    if (
                        navLink.pathname === currentPathname || 
                        //DATA-UTAMA
                        (navLink.pathname === '/data-utama' && currentPathname ==='/data-option') ||
                        (navLink.pathname === '/data-utama' && currentPathname ==='/data-result') ||
                        (navLink.pathname === '/data-utama' && currentPathname ==='/edit-data') ||
                        //DATA-BDH
                        (navLink.pathname === '/data-bdh' && currentPathname ==='/tambah-bdh') ||
                        (navLink.pathname === '/data-bdh' && currentPathname === '/bdh-read') ||
                        (navLink.pathname === '/data-bdh' && currentPathname === '/ul-rph') ||
                        (navLink.pathname === '/data-bdh' && currentPathname === '/petak-read') ||
                        (navLink.pathname === '/data-bdh' && currentPathname === '/tambah-rph') ||
                        (navLink.pathname === '/data-bdh' && currentPathname === '/tambah-petak') ||
                        (navLink.pathname === '/data-bdh' && currentPathname.startsWith('/rph/')) ||
                        (navLink.pathname === '/data-bdh' && currentPathname.startsWith('/petak/')) ||
                        (navLink.pathname === '/data-bdh' && currentPathname.startsWith('/data-bdh/') && currentPathname.endsWith('/edit')) ||
                        //DATA-IZIN
                        (navLink.pathname === '/data-izin' && currentPathname ==='/tambah-izin') || 
                        (navLink.pathname === '/data-rusak' && currentPathname ==='/tambah-rosak') ||
                        //DATA-POTENSI
                        (navLink.pathname === '/data-potensi' && currentPathname ==='/tambah-potensi') ||
                        //DATA-PNPB
                        (navLink.pathname === '/data-pnbp' && currentPathname ==='/tambah-pnbp') ){
                        navLink.parentElement.classList.add('active');
                        navLink.parentElement.classList.add('clicked');
                    } else {
                        navLink.parentElement.classList.remove('active');
                        navLink.parentElement.classList.remove('clicked');
                    }
                });

                // Call setActivePage() again after page transitions
                window.addEventListener('popstate', () => {
                    setActivePage();
                });
            }

            // Inisialisasi
            function init() {
                // Dapatkan semua elemen 'nav-item'
                const navItems = document.querySelectorAll('.navigation ul li.nav-item');

                // Atur event listener klik untuk semua elemen 'nav-item'
                navItems.forEach((navItem) => {
                    navItem.addEventListener('click', setActiveNavItem);
                });
            }

            // Panggil fungsi init ketika konten DOM telah dimuat
            document.addEventListener('DOMContentLoaded', () => {
                init();
                setActivePage();
            });

            //dropdow
            
            
        </script>




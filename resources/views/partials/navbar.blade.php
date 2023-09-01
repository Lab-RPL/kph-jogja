<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <img src="{{ asset('images/logohutan1.png') }}" alt="Logo">
                    </span>
                    <span class="title">KPH Yogyakarta</span>
                </a>
            </li>

            <li>
                <a href="/data-utama">
                    <span class="icon">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </span>
                    <span class="title">Data Inventaris</span>
                </a>
            </li>

            <li>
                <a href="/data-bdh" onmouseover="showDropdown()">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Luas Hutan Per-BDH</span>
                </a>
                <ul id="dropdown" style="display: none;">
                    <li><a href="#">Dropdown Item 1</a></li>
                    <li><a href="#">Dropdown Item 2</a></li>
                    <li><a href="#">Dropdown Item 3</a></li>
                </ul>
            </li>

            <li>
                <a href="/data-izin">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title">Perizinan Berusaha</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="help-outline"></ion-icon>
                    </span>
                    <span class="title">Potensi Hasil Hutan</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Produksi Hasil Hutan</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Penerima Bukan Pajak</span>
                </a>
            </li>

            <li>
                <a href="/data-rusak">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Kerusakan/Kehilangan</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Luas Hutan</span>
                </a>
            </li>

            <li>
                <a href="/logout">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

        </div>

<script>
    function showDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = "block";
    }
</script>

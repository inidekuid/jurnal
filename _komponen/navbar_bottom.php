<nav class="navbar fixed-bottom" style="background-color: #5291f7" p-0>
    <ul class="nav col-12 col-lg-auto my-2 justify-content-center text-center my-md-0 fs-6">
        <li>
            <a href="./" class="nav-link text-white text-center">
                <i class="bi d-block mx-auto mb-1 bi-house-fill" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                Home
            </a>
        </li>

        <li>
            <a href="<?php if ($data_user['STATE'] == 5) {
                            echo 'presensi1.php" class="nav-link text-white text-center">
                            <i class="bi d-block mx-auto mb-1 bi-alarm" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                            Presensi';
                        } elseif ($data_user['STATE'] == 6) {
                            echo 'presensi2.php" class="nav-link text-white text-center">
                            <i class="bi d-block mx-auto mb-1 bi-alarm" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                            Presensi';
                        } elseif ($data_user['STATE'] == 2) {
                            echo 'rekapguru.php" class="nav-link text-white text-center">
                            <i class="bi d-block mx-auto mb-1 bi-alarm" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                            Rkp Personal';
                        } ?> </a>
        </li>
        <li>
            <a href=" rekap.php" class="nav-link text-white text-center">
                <i class="bi d-block mx-auto mb-1 bi-table" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                Rekap
            </a>
        </li>
        <li>
            <a href="akun.php" class="nav-link text-white text-center">
                <i class="bi d-block mx-auto mb-1 bi-person" style="font-size: 1rem; color: rgb(207, 217, 236);" width="10" height="10"></i>
                Akun
            </a>
        </li>
    </ul>
</nav>
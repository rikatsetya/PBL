<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SideBar</title>
    <link rel="stylesheet" href="sideBar.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navba navbar-expand-lg">
        <ul class="nav">
            <li class="left"><img class="img_nav" src="img/logo_polinema2.png" alt="LOGO POLINEMA"></li>
            <li class="left_pol"><a href="homepage_awal.php"><b>POLINEMA</b></a></li>
            <li class="right"><a href="login.php"><u>login</u></a></li> 
        </ul>
    </nav>
   
    <input type="checkbox" id="check">
    <label for="check">
        <img src="img/garis3.png" alt="garis" class="btn" id="btn">
    </label>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box d-flex justify-content-between align-items-center">
                <label for="check">
                    <img src="img/cancel.jpg" alt="cancel" class="cancel" id="cancel">
                </label>
            </div>
            <ul>
            <h3 class="h3_sidebar">POLINEMA</h3>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="isi_survey.php">Isi Survey</a></li>
                <li>
                    <a href="#" class="sidebar-dropdown" id="hasilSurveyBtn">Hasil Survey</a>
                    <ul class="dropdown-container" id="hasilSurveyDropdown">
                        <li><a href="alumni.php">Alumni</a></li>
                        <li><a href="dosen.php">Dosen</a></li>
                        <li><a href="mahasiswa.php">Mahasiswa</a></li>
                        <li><a href="mitra.php">Mitra Kerjasama</a></li>
                        <li><a href="orangtua.php">Orangtua</a></li>
                        <li><a href="tenaga.php">Tenaga Kependidikan</a></li>
                    </ul>
                </li>
                <li><a href="review_survey.php">Review Survey Anda</a></li>
                <li><a href="homepage_awal.php">Logout</a></li>
            </ul>
        </div>
        <div class="content"></div>
    </div>

    <script>
        document.getElementById('check').addEventListener('change', function() {
            document.getElementById('side_nav').style.left = this.checked ? '0' : '-250px';
        });

        document.getElementById('hasilSurveyBtn').addEventListener('click', function(event) {
            event.preventDefault();
            var dropdown = document.getElementById('hasilSurveyDropdown');
            dropdown.classList.toggle('show');
        });
    </script>
</body>
</html>

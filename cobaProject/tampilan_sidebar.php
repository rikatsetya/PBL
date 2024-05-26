<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SideBar</title>
    <link rel="stylesheet" type="text/css" href="sideBar1.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
</head>

<body>
    <header class="navba navbar-expand-lg">
        <?php if (isset($_SESSION['user'])) { ?>
            <div class="menu">
                <input type="checkbox" id="check">
                <label for="check">
                    <p class='bx bx-menu' id="menu-icon">
                        <!-- <img src="img/garis3.png" alt="garis" class="btn" id="btn"> -->
                </label>
            </div>
        <?php } else {
        } ?>

        <div class="logo">
            <img class="img_nav" src="img/logo_polinema2.png" alt="LOGO POLINEMA">
            <a href="homepage_awal.php" class="left_pol"><b>POLINEMA</b></a>
        </div>
        <?php if (isset($_SESSION['user'])) {
            echo "<nav class='navigation'>";
            echo "<img class='profile' src='img/profile.png'>";
            echo "<div class='identitas'>";
            echo $_SESSION['user']['nama'] . "<br>";
            echo $_SESSION['user']['username'] . "</div>";
            echo "</nav>";
        } else {
            echo "<nav class='navigation'>";
            echo "<a href='login.php'><u>login</u></a>";
            echo "<a href='SignUp.php'><u>Sign Up</u></a>";
            echo "</nav>";
        } ?>
    </header>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box d-flex justify-content-between align-items-center">
                <label for="check">
                    <p class='bx bx-x' id="close-icon">
                        <!-- <img src="img/cancel.jpg" alt="cancel" class="cancel" id="cancel"> -->
                </label>
            </div>
            <ul>
                <h3 class="h3_sidebar">POLINEMA</h3>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="adminEdit.php">edit Survey</a></li>
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
                <li><a href="logout.php">Logout</a></li>
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
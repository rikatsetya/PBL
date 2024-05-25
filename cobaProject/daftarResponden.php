<?php
session_start();
require_once 'crud.php';
$crud = new Crud();

?>
<?php include 'tampilan_sidebar.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Daftar Responden</title>
</head>

<body>
    <link rel="stylesheet" href="styleResponden.css">
    <h2>User= <?php echo $_SESSION['user']['username']; ?></h2>
    <br>
    <div class="wrapper">
        <div class="container">
            <input type="radio" name="box" id="box1" class="box" checked>
            <label for="box1">Alumni</label>
            <div class="contentResp">
                Tabel daftar Alumni yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box1"); ?>
                    </tbody>
                </table>
            </div>
            <input type="radio" name="box" id="box2" class="box">
            <label for="box2">Mahasiswa</label>
            <div class="contentResp">
                Tabel daftar Mahasiswa yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box2"); ?>
                    </tbody>
                </table>
            </div>
            <input type="radio" name="box" id="box3" class="box">
            <label for="box3">Dosen</label>
            <div class="contentResp">
                Tabel daftar Dosen yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box3"); ?>
                    </tbody>
                </table>
            </div>
            <input type="radio" name="box" id="box4" class="box">
            <label for="box4">Orang Tua</label>
            <div class="contentResp">
                Tabel daftar Orang Tua yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box4"); ?>
                    </tbody>
                </table>
            </div>
            <input type="radio" name="box" id="box5" class="box">
            <label for="box5">Tenaga Kependidikan</label>
            <div class="contentResp">
                Tabel daftar Tenaga Kependidikan yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box5"); ?>
                    </tbody>
                </table>
            </div>
            <input type="radio" name="box" id="box6" class="box">
            <label for="box6">Mitra Kerjasama</label>
            <div class="contentResp">
                Tabel daftar Mitra Kerjasama yang telah mengisi survey
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tampil = $crud->readResponden("box6"); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


</html>
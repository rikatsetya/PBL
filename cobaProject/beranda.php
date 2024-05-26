
<?php include 'tampilan_sidebar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kepuasan Pelanggan Polinema</title>
</head>
<body>
    <h1>Selamat datang!</h1>
    <h2><?php echo $_SESSION['user']['username'];?></h2>

        <a href="adminEdit.php">edit soal</a>
        <a href="logOut.php">Log Out</a>
        <a href="daftarResponden.php">Daftar Responden</a>
</body>
</html>
<?php
include 'koneksi.php';

class Crud
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function create($nama, $username, $email, $status, $password_hash)
    {
        $idCheck = "SELECT id, status FROM user WHERE username ='$username'";
        $queryInsert = "INSERT INTO user (nama, username, email, status, password) VALUES ('$nama','$username','$email','$status','$password_hash')";
        $queryCheck = "SELECT username FROM user WHERE username = '$username'";
        $connresult = $this->database->conn->query($queryCheck);
        $usedUser = mysqli_fetch_assoc($connresult);
        if ($usedUser == null) {
            $this->database->conn->query($queryInsert);
            $userCheck = $this->database->conn->query($idCheck);
            $userId = mysqli_fetch_assoc($userCheck);
            $id = $userId['id'];
            $statusSurvey = $userId['status'];
            $querySurvey = "INSERT INTO survey (user_id, survey_status) VALUES ('$id','untouched')";
            $this->database->conn->query($querySurvey);
            $selectSurvey = "SELECT * FROM survey WHERE user_id = '$id'";
            $aboutSurvey = $this->database->conn->query($selectSurvey);
            $surveyId = mysqli_fetch_assoc($aboutSurvey);
            $idSurvey = $surveyId['id_survey'];

            switch ($statusSurvey) {
                case 'alumni':
                    $queryResponden = "INSERT INTO responden_alumni (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                case 'dosen':
                    $queryResponden = "INSERT INTO responden_dosen (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                case 'mahasiswa':
                    $queryResponden = "INSERT INTO responden_mahasiswa (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                case 'mitra':
                    $queryResponden = "INSERT INTO responden_mitra (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                case 'ortu':
                    $queryResponden = "INSERT INTO responden_ortu (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                case 'tendik':
                    $queryResponden = "INSERT INTO responden_tendik (survey_id, nama, username, email, status) VALUES ('$idSurvey','$nama','$username','$email','untouched')";
                    $this->database->conn->query($queryResponden);
                    break;
                default:
                    die($this->database->conn->error);
                    break;
            }
            header("Location: login.php");
        } else {
            echo "Username already taken";
        }
    }

    public function readByUsername($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->database->conn->query($query);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: beranda.php");
            } else {
                echo "login gagal";
            }
        } else {
            echo "username not found";
        }
    }

    public function readResponden($pilihan)
    {
        switch ($pilihan) {
            case 'box1':
                $queryCheck = "SELECT * FROM responden_alumni";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Alumni yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Alumni yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;
            case 'box2':
                $queryCheck = "SELECT * FROM responden_mahasiswa";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Mahasiswa yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Mahasiswa yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;
            case 'box3':
                $queryCheck = "SELECT * FROM responden_Dosen";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        }
                        if ($hasil['status'] == 'untouched') {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Dosen yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Dosen yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;
            case 'box4':
                $queryCheck = "SELECT * FROM responden_ortu";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Orang Tua yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Orang Tua yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;
            case 'box5':
                $queryCheck = "SELECT * FROM responden_tendik";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Tenaga Kependidikan yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Tenaga Kependidikan yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;
            case 'box6':
                $queryCheck = "SELECT * FROM responden_mitra";
                $runResponden = $this->database->conn->query($queryCheck);
                $show = [];
                if ($runResponden->num_rows > 0) {
                    while ($row = $runResponden->fetch_assoc()) {
                        $show[] = $row;
                    }
                    foreach ($show as $hasil) {
                        if ($hasil['status'] == 'taken') {
                            echo "<tr>";
                            echo "<td>" . $hasil['nama'] . "</td>";
                            echo "<td>" . $hasil['username'] . "</td>";
                            echo "<td>" . $hasil['email'] . "</td>";
                            echo "</tr>";
                        } else if ($hasil['status'] == 'untouched') {
                            echo "<tr align='center'>";
                            echo "<td colspan='3'>Belum ada Mitra Kerjasama yang mengisi survey</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr align='center'>";
                    echo "<td colspan='3'>Belum ada Mitra Kerjasama yang mengisi survey</td>";
                    echo "</tr>";
                }
                break;

            default:
                die($this->database->conn->error);
                break;
        }
    }

    public function addKategori($namaKategori)
    {
        $querykategori = "INSERT INTO kategori_survey (kategori) VALUES ('$namaKategori')";
        $this->database->conn->query($querykategori);
    }

    public function readKategori()
    {
        $queryCheck = "SELECT * FROM kategori_survey";
        $runKategori = $this->database->conn->query($queryCheck);
        $show = [];
        if ($runKategori->num_rows > 0) {
            while ($row = $runKategori->fetch_assoc()) {
                $show[] = $row;
            }
        }
        return $show;
    }

    public function deleteKategori($id)
    {
        $queryCheck = "SELECT * FROM soal_survey WHERE kategori_id = '$id'";
        $runKategori = $this->database->conn->query($queryCheck);
        if ($runKategori->num_rows > 0) {
            $querysoal = "DELETE FROM soal_survey WHERE kategori_id = '$id'";
            $this->database->conn->query($querysoal);
            $querykategori = "DELETE FROM kategori_survey WHERE id = '$id'";
            $result = $this->database->conn->query($querykategori);
            return $result;
        } else {
            $querykategori = "DELETE FROM kategori_survey WHERE id = '$id'";
            $result = $this->database->conn->query($querykategori);
            return $result;
        }
    }

    public function addSoal($idKategori, $soal)
    {
        $querysoal = "INSERT INTO soal_survey (kategori_id, soal_nama) VALUES ('$idKategori','$soal')";
        $this->database->conn->query($querysoal);
    }

    public function readSoal($id)
    {
        $queryCheck = "SELECT * FROM soal_survey WHERE kategori_id = '$id'";
        $runKategori = $this->database->conn->query($queryCheck);
        $show = [];
        if ($runKategori->num_rows > 0) {
            while ($row = $runKategori->fetch_assoc()) {
                $show[] = $row;
            }
        }
        return $show;
    }

    public function deleteSoal($id)
    {
        $querysoal = "DELETE FROM soal_survey WHERE id_soal = '$id'";
        $result = $this->database->conn->query($querysoal);
        return $result;
    }

    public function updateKategori($id,$namaKategori)
    {
        $querykategori = "UPDATE kategori_survey SET kategori='$namaKategori' WHERE id='$id'";
        $this->database->conn->query($querykategori);
    }

    public function updateSoal($idSoal, $soal)
    {
        $querysoal = "UPDATE soal_survey SET soal_nama='$soal' WHERE id_soal='$idSoal'";
        $this->database->conn->query($querysoal);
    }
}

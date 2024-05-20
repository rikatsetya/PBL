<?php
include 'koneksi.php';

class Crud
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function create($nama,$username,$email,$status,$password_hash){
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
        }else {
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

    public function addKategori($namaKategori){
        $querykategori = "INSERT INTO kategori_survey (kategori) VALUES ('$namaKategori')";
        $this->database->conn->query($querykategori);
    }

    public function addSoal($namaKategori,$soal){
        $querysoal = "INSERT INTO soal_survey (kategori_id, soal_nama) VALUES ('$namaKategori','$soal')";
        $this->database->conn->query($querysoal);
    }

    public function addKategoriSoal($namaKategori,$soal){
        $querykategori = "INSERT INTO kategori_survey (kategori) VALUES ('$namaKategori')";
        $this->database->conn->query($querykategori);
        $selectKategori = "SELECT * FROM kategori_survey WHERE kategori = '$namaKategori'";
        $runKategori = $this->database->conn->query($selectKategori);
        $resultKategori = mysqli_fetch_assoc($runKategori);
        $noKategori = $resultKategori['id'];
        $querysoal = "INSERT INTO soal_survey (kategori_id, soal_nama) VALUES ('$noKategori','$soal')";
        $this->database->conn->query($querysoal);
        if ($this->database->conn->error) {
            die("Error");
        }else {
            echo ("Data berhasil ditambahkan");
        }
    }
}
?>
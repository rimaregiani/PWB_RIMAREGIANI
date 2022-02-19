<?php
class Mahasiswa_model
{
    //contoh menggunakan data static
    // private $mhs = [
    //     [
    //     "nama" => "Fajar Septian",
    //     "nim" => "0409098901",
    //     "email" => "fajarseptian45@gmail.com",
    //     "jurusan" => "Teknik Informatika"
    // ],
    // [
    //     "nama" => "Imam Shalahudin",
    //     "nim" => "0317076801",
    //     "email" => "shalahudinhasby@gmail.com",
    //     "jurusan" => "Teknik Industri"
    // ],
    // [
    //     "nama" => "Juli Yanto",
    //     "nim" => "0321077201",
    //     "email" => "juli.tomoko@gmail.com",
    //     "jurusan" => "Teknik Mesin"
    // ]
    // ];
    
    // public function getAllMahasiswa() //method utk mendapatkan data mhs
    // {
    //     return $this->mhs;
    // }

    // private $dbh;
    // private $stmt;

    private $table = 'mahasiswa';
    private $db;
    
    public function __construct()
    {
        //$dsn = data source name
        // $dsn = "mysql:host=localhost; dbname=phpmvc";
        // try {

        //     $this->dbh = new PDO($dsn, 'root', '');

        // } catch (PDOException $e) {

        //     die($e->getMessage());

        // }
        $this->db = new Database;
    }
    public function getAllMahasiswa() //method utk mendapatkan data mhs
    {
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute(); //eksekusi query
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //mengembalikan hasil ke array asosiatif

        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultAll();
    }

    public function getMahasiswaById($id) //method utk mendapatkan 1 data mhs
    {
        // $this->db->query("SELECT * FROM " . $this->table . 'WHERE id=:id');
        $this->db->query("SELECT * FROM mahasiswa WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO " . $this->
        table . "VALUES ('',:nama, :nim :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
        nama = :nama,
        nim = :nim,
        email = :email,
        jurusan = :jurusan
        WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }
    
}
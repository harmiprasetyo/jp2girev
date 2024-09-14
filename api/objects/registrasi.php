<?php
class Registrasi{
 
  // Database connection and table name
  private $conn;
  private $table_name = "registrasi";

  // Object properties
  public $reg_id;
  public $nama;
  public $jenis_kelamin;
  public $alamat;
  public $phone;
  public $email;
  public $biaya;
  public $tanggal_daftar;
  public $nama_ortu;
  public $phone_ortu;
  public $email_ortu;


  /*=== Constructor with $db as database connection ===*/
  public function __construct($db){
      $this->conn = $db;
  }

  /*=== Read products ===*/
  function read()
  {
    // Select all query
    $query = "SELECT * FROM $this->table_name ORDER BY reg_id ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }

}
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/registrasi.php';
 
// instantiate database and registrasi object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$registrasi = new Registrasi($db);

// query registrasi
$stmt = $registrasi->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // registrasi array
    $registrasi_arr=array();
    $registrasi_arr["data"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $registrasi_item=array(
            "reg_id" => $reg_id,
            "nama" => $nama,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "phone" => $phone,
            "email" => $email,
            "tanggal_daftar" => $tanggal_daftar,
            "biaya" => $biaya,
            "nama_ortu" => $nama_ortu,
            "phone_ortu" => $phone_ortu,
            "email_ortu" => $email_ortu,
        );
 
        array_push($registrasi_arr["data"], $registrasi_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show registrasi data in json format
    echo json_encode($registrasi_arr);
}
else
{
  // set response code - 404 Not found
  http_response_code(404);
  // tell the user no registrasi found
  echo json_encode(
      array("message" => "Data registrasi tidak ditemukan")
  );
}
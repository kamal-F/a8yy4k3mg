<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
// https://trinitytuts.com/build-first-web-service-php/


function mhs ($nama,$nim)
{
  //normally this info would be pulled from a database.
  //build JSON array
  $nama= $_POST['nama'];
  $nim= $_POST['nim'];
  $app_list ="Hello, Selamat Datang ".$nama." , NIM Anda ".$nim;

  return $app_list;
}

function mhs1 ($nama,$nim)
{
  //normally this info would be pulled from a database.
  //build JSON array

  $app_list ="Hello, Selamat Datang ".$nama." , NIM Anda ".$nim;

  return $app_list;
}

function tambah ($angka1,$angka2)
{
  //normally this info would be pulled from a database.
  //build JSON array

  $app_list =$angka1+$angka2;

  return $app_list;
}

function kurang ($angka1,$angka2)
{
  //normally this info would be pulled from a database.
  //build JSON array

  $app_list =$angka1-$angka2;

  return $app_list;
}

$possible_url = array("get_app_list", "get_app","mhs","mhs1","tambah","kurang");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      
      case "mhs1";
      if (isset ($_GET["nama"]) && ($_GET["nim"]))
        $value = mhs1 ($_GET["nama"], $_GET["nim"]);
      break;

      case "tambah";
      if (isset ($_GET["angka1"]) && ($_GET["angka2"]))
        $value = tambah ($_GET["angka1"], $_GET["angka2"]);
      break;

      case "kurang";
      if (isset ($_GET["angka1"]) && ($_GET["angka2"]))
        $value = kurang ($_GET["angka1"], $_GET["angka2"]);
      break;
    }
}



// kamal

if($_SERVER['REQUEST_METHOD'] == "POST"){
  // TODO: gunakan authentication 
  //curl -i  -H "Accept:application/json" -H "Content-Type:application/json" -XPOST "http://localhost/latihan/wsphpserver/api.php/" -d '{"kode": "x2", "nama": "termos","deskripsi":"barang bagus","id_kantor":"10"}'
  //$au = $_SERVER['PHP_AUTH_USER'];
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  $value = mhs($_POST["nama"], $_POST["nim"]);
}


header('Content-type: application/json');
//return JSON array
exit(json_encode($value));
?>

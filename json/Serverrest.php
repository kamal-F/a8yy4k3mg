<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
// https://trinitytuts.com/build-first-web-service-php/

function kuis($nama,$npm)

{
  $app_list = "Hello Selamat Datang, ".$nama.", Nim Anda ".$npm;
  return $app_list;
}
function getkuis($nama,$npm)

{
  $nama = $_POST ['nama'];
  $npm = $_POST['npm'];
  $app_list = "Hello Selamat Datang, ".$nama.", Nim Anda ".$npm;
  return $app_list;
}


$possible_url = array("get_app_list", "get_app","kuis");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
         case "quis":
        $value = quis();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
      case "kuis":
        if (isset($_GET["nama"]) && ($_GET["npm"]))
          $value = kuis($_GET["nama"], $_GET["npm"]);
        break;
    }
}

// kamal

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  //$value = "berhasil diinput  ". $obj->{'nama'};
 $value = getkuis($_GET["nama"], $_GET["npm"]);
}

if($_SERVER['REQUEST_METHOD'] == "PUT"){
  $json = file_get_contents('php://input');
  $obj = json_decode($json);  
  $id= $_SERVER['HTTP_ID'];
  
  $value = "Berhasil Diupdate ".$id." ".$obj->{'nama'};
}

if($_SERVER['REQUEST_METHOD'] == "DELETE"){
  $id= $_SERVER['HTTP_ID']; 
  $value = "dihapus ". $id;
  
}

header('Content-type: application/json');
//return JSON array
exit(json_encode($value));
?>

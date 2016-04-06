<?php 
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
// https://trinitytuts.com/build-first-web-service-php/

function krs($nama, $npm)
{
	$nama = $_POST ['nama'];
	$npm = $_POST ['npm'];
	$data = "hello, selamat datang ". $nama. " NPM anda ".$npm;
	return $data;
}

function tambah($prm1, $prm2)
{
	//normally this info would be pulled from a database.
	//build JSON array
	$jumlah = $prm1+$prm2;

	return $jumlah;
}

function kurang($prm1, $prm2)
{
	//normally this info would be pulled from a database.
	//build JSON array
	$operation = $prm1-$prm2;

	return $operation;
}

$possible_url = array("krs", "tambah", "kurang");
$value = "An error has occurred";
if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
	switch ($_GET["action"])
	{
		case "kurang":
			if (isset($_GET["prm1"]) && ($_GET["prm2"]))
				$value = kurang($_GET["prm1"],$_GET["prm2"]);
				break;
	 case "tambah":
	 	if (isset($_GET["prm1"]) && ($_GET["prm2"]))
	 		$value = tambah($_GET["prm1"],$_GET["prm2"]);
	 		break;
	 case "krs":
	 			if (isset($_GET["nama"]) && ($_GET["npm"]))
	 				$value = krs ($_GET["nama"],$_GET["npm"]);
	 				break;
	 		 
	 	}
}
				// kamal
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$json = file_get_contents('php://input');
					$obj = json_decode($json);
					$value = krs($_POST["nama"],$_POST["npm"]);
		}
				if($_SERVER['REQUEST_METHOD'] == "PUT"){
					$json = file_get_contents('php://input');
					$obj = json_decode($json);
					$id= $_SERVER['HTTP_ID'];
					$value = "berhasil diupdate ".$id." ".$obj->{'nama'};
		}
				if($_SERVER['REQUEST_METHOD'] == "DELETE"){
					$id= $_SERVER['HTTP_ID'];
					$value = "dihapus ". $id;

		}
				header('Content-type: application/json');
				//return JSON array
				exit(json_encode($value));
?>
<?php
   // Loon andmebaasi ühenduse
	require_once("../config_global.php");
	$database= "if15_mats_3";


   //võtab andmed ja sisestab ab'i
   function createUser(){
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	$stmt = $mysqli->prepare("INSERT INTO user_sample (email,password) VALUES (?,?)");
	$stmt->bind_param("ss", $create_email, $hash);
	$stmt->execute();
	$stmt->close();
	   
	   
   }
   
   function loginUser (){
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	$stmt = $mysqli->prepare ("SELECT id, email FROM user_sample WHERE email=? AND password=?");
	$stmt->bind_param("ss", $email, $hash);
	$stmt->bind_result($id_from_db, $email_from_db);
	$stmt->execute ();
	if($stmt->fetch()){
		echo "Email ja parool õiged, kasutaja id=".$id_from_db;
	}else{
				//ei leidnud
			echo  "Wrong credentials";
		}
				
		$stmt->close();
	   
   }
    
	// Paneme ühenduse kinni
	$mysqli->close();
    
 ?>
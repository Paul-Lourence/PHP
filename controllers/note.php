<?php 

$config = require ("config.php");
$db = new Database ($config["database"]);


$heading = "Note";



$notes = $db->query("select * from notes where id = :id", [
    
    "id" => $_GET["id"]
    
    ])->findOrFail();


authorize($note["user_id"] != $currentUserId );



require "view/note.view.php";
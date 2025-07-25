<?php 


$heading = "My Notes";
 
$notes = $db->query("select * from notes where user_id = 1")->get();



require "view/notes.view.php";
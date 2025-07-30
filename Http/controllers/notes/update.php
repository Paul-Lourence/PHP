<?php 

use Core\App;
use Core\Database;
use Core\validator;

$db = App:: resolve(Database::class);    


$currentUserId = 1;


    $note = $db->query("select * from notes where id = :id", [

        "id" => $_POST["id"]

    ])->findOrFail();

    authorize($note["user_id"] === $currentUserId);

    $error = [];

         if (! Validator::string($_POST["body"], 1 , 1000)) {

        $errors["body"] = "A body that of no more than 1,000 characters is required.";

     } 

     if (count($errors)) {

        return view("notes/edit.view.php", [

            "heading" => "Edit Note" , 
            "errors" => $errors, 
            "note" => $note

        ]);

     }

     $db->query("update notes set  body = :body where id= :id", [

        "id" => $_POST["id"],
        "body" => $_POST["body"]

     ]);


     header("locattion: /notes");
     
     die();
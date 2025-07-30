<?php 
namespace Core;
use Core\App;
use Core\Database;

$db = App:: resolve(Database::class);    


$currentUserId = 1;


    $note = $db->query("select * from notes where id = :id", [

        "id" => $_GET["id"]

    ])->findOrFail();

    authorize($note["user_id"] === $currentUserId);

view("view/notes/edit.view.php", [

    "heading" => "Create Note",
    "errors" => [],
    "note" => $note
]); 

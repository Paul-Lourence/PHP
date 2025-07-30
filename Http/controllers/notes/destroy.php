<?php 
namespace Core;
use Core\App;
use Core\Database;

$db = App:: resolve(Database::class);    

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", [

"id" => $_POST["id"]    

])->findOrFail();

function authorize($condition) {
    if (!$condition) {
        http_response_code(403);
        die('Unauthorized');
    }
}

authorize($note["user_id"] === $currentUserId);

$db->query("delete from notes where id = :id",[

    "id" => $_POST["id"]

]);

header("location: /notes");

exit();

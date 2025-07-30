<?php 

namespace Core;

use Core\validator;
use Core\App;
use Core\Database;


$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
if (!validator::email($email)) {

    $errors["email"] = "Please provide a valid email address.";

}

if (!validator::string($password, 7 , 255)) {

    $errors["password"] = "Please provide a password at least seven characters.";

}

if (!empty($errors)) {

    return view("registration/create.view.php", [

        "errors" => $errors

    ]);

}

$db = App::resolve(Database::class);

$user = $db->$query("select * from users where email", [

    "email" => $email

])->find();

if ($user) {

    header("location:/ ");
    exit();

}else {

    $db->query("INSERT INTO  users(email, password) VALUES(:email, :password)", [
        
        "email" => $email,
        "passowrd" =>password_hash($password, PASSWORD_BCRYPT)

    ]);

        login($user);

    header('location: /');
    exit();

}
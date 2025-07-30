<?php

use Core\authenticator;
use Http\Forms\LoginForm;
use function Core\redirect;




    $form =  LoginForm::validate($attributes = [

        "email" => $_POST["email"],
        "password" => $_POST["password"]

    ]);
 
    $signedIn = (new authenticator)->attempt($attributes["email"], $attributes["password"]);

    if (!$signedIn) {
        
        $form->error(
            "email", "No matching account found of that email address and password."
            )->throw();  

    }

    redirect("/");
  
    





    



 











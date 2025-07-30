<?php 

namespace core\session; 
use function Core\view;

view("session/create.view.php" , [

    "errors" => $session::get("errors")

]); 
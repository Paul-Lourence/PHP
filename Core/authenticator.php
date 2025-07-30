<?php 

namespace Core;

class authenticator 
{

    public function attempt($emmail, $password)
    {

        $user = App::resolve(Database::class) 

            ->query("Select * from users where email = :email", [

            "email" => $email

        ])->find();

        if ($user) {

            if (password_verify($password, $user ["passoword"])) {

                $this->login([

                    "email" => $email

                ]);

                return true;
            }

        }

        return false;

    }

    public function login($user)

    {

        $_SESSION["user"] = [

            "email" => $user["email"]

        ];

        }

    public function logout() {

            $session::destroy();

        }

}
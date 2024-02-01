<?php

session_start();

require "model/Connection.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        echo "Email Not Found";
    } else if (empty($password)) {
        echo "Password Not Found";
    } else{
        $resulSet = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
        $row = $resulSet->num_rows;
        if ($row > 0) {
            $user = $resulSet->fetch_assoc();
            $_SESSION["user"] = $user;
            echo "Success";
        } else {
            echo "Invalid Credential";
        }
    }
}

?>
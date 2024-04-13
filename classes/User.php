<?php
require_once 'Database.php';

class User
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function register($firstname, $lastname, $email, $password)
    {
        $query = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
            $this->createSession($user);
            return true;
        }
        return false;
    }

    public function found($email)
    {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function createSession($user)
    {
        $_SESSION["id"] = $user->id;
        $_SESSION["firstname"] = $user->firstname;
        $_SESSION["lastname"] = $user->lastname;
        $_SESSION["email"] = $user->email;
    }
}

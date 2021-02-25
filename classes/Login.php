<?php
class Login
{
    private $db;
    public $L_username,
        $L_password;

    function __construct($_conn)
    {
        $this->db = $_conn;
    }

    public function Check_login($username, $password)
    {
        $this->L_username = $username;
        $this->L_password = $password;

        $signinquery = mysqli_query($this->db, "SELECT * FROM register WHERE r_username = '$this->L_username' AND r_password = '$this->L_password'");
        return $signinquery;
    }

    public function Logout()
    {
        session_start();
        session_destroy();
        header("location: ../index.php");
    }
}

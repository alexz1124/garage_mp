<?php
class Register
{
    private $db;
    public $R_username,
        $R_name,
        $R_password,
        $R_confirm_password,
        $R_phone;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function Register($username, $name, $password, $c_password, $phone)
    {
        $this->R_username = $username;
        $this->R_name = $name;
        $this->R_password = $password;
        $this->R_confirm_password = $c_password;
        $this->R_phone = $phone;

        $reg = mysqli_query($this->db, "INSERT INTO register (r_username,r_name,r_phone, r_password, r_confirmpassword,r_status) 
        VALUES ('$this->R_username','$this->R_name','$this->R_phone','$this->R_password','$this->R_confirm_password','User')");
        return $reg;
    }
}

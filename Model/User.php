<?php
class User
{
    private ?int $id= null;
    private ?string $name= null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $user_type = null;

    public function __construct($id = null, $na, $em, $pa, $utc)
    {
        $this->id= $id;
        $this->name = $na;
        $this->email = $em;
        $this->password = $pa;
        $this->user_type = $utc;
    }

    /**
     * Get the value of idClient
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of lastName
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getpassword()
    {
        return $this->password;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setpassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getuser_type()
    {
        return $this->user_type;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setuser_type($user_type)
    {
        $this->user_type = $user_type;

        return $this;
    }
}

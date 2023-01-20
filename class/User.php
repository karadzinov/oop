<?php


class User extends DB implements Model
{

    private $first_name;
    private $last_name;
    private $dob;
    private $email;
    private $image;
    private $password;
    private $id;

    const TABLE = 'users';

    // parent::
    // self::TABLE;

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @return mixed
     */
    public function getLastName(): string
    {

        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {

        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function create()
    {
        $data = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "dob" => $this->dob,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image
        ];

        $this->id = $this->insert($data);

    }

    public function save()
    {
        $data = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "dob" => $this->dob,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image
        ];


        $this->update($this->id, $data);
    }

    public function first($id)
    {
       $result = $this->get($id);
       $this->id = $result->id;
       $this->first_name = $result->first_name;
       $this->last_name = $result->last_name;
       $this->dob = $result->dob;
       $this->email = $result->email;
       $this->password = $result->password;
       $this->image = $result->image;

       return $this;
    }

    public function delete()
    {
        $this->remove($this->id);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


}
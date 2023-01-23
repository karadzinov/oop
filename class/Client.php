<?php

class Client extends DB implements Model
{
    private $id;
    private $name;
    private $location;
    private $email;
    private $password;
    private $image;

    const tableName = 'client';

    public function __construct()
    {
        parent::__construct(self::tableName);
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function save()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'location' => $this->location,
            'password' => $this->password,
            'image' => $this->image
        ];
        return $this->update($this->id, $data);
    }
    public function create()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'location' => $this->location,
            'password' => $this->password,
            'image' => $this->image
        ];
        return $this->insert($data);
    }
    public function first($id)
    {
        $result = $this->get($id);
        $this->name = $result->name;
        $this->email = $result->email;
        $this->password = $result->password;
        $this->location = $result->location;
        $this->image = $result->image;
        $this->id = $result->id;

        return $this;
    }
}
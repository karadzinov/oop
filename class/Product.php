<?php


class Product extends DB
{
    private $id;
    private $name;
    private $type;
    private $price;
    private $description;
    private $image;
    private $cat_id;


    const TABLE = "products";


    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * @param mixed $cat_id
     */
    public function setCatId($cat_id): void
    {
        $this->cat_id = $cat_id;
    }

    public function first($id)
    {
        $result = $this->get($id);
        $this->id = $result->id;
        $this->name = $result->name;
        $this->type = $result->type;
        $this->description = $result->description;
        $this->price = $result->price;
        $this->image = $result->image;
        $this->cat_id = $result->cat_id;

        return $this;
    }

    public function save()
    {
        $data = [
            "name"          => $this->name,
            "type"          => $this->type,
            "description"   => $this->description,
            "price"         => $this->price,
            "image"         => $this->image,
            "cat_id"        => $this->cat_id
        ];
        $this->update($this->id, $data);
    }

    public function create()
    {
        $data = [
            "name"          => $this->name,
            "type"          => $this->type,
            "description"   => $this->description,
            "price"         => $this->price,
            "image"         => $this->image,
            "cat_id"        => $this->cat_id
        ];

        $this->id = $this->insert($data);

    }



}
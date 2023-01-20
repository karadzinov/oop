<?php

class Categories extends DB implements Model
{

    use Helper;

    public $id;
    public $name;
    public $parent_id;
    private $depth;

    private $tableName = 'categories';


    public function __construct()
    {
        parent::__construct($this->tableName);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getParent()
    {
        return $this->parent_id;
    }


    public function save()
    {
        $data = [
            "name"      => $this->name,
            "parent_id" => $this->parent_id
        ];

        $categories = $this->update($this->id, $data);
        return $categories;
    }

    public function updateCategories()
    {
        $data = [
            "id"        => $this->id,
            "name"      => $this->name,
            "parent_id" => $this->parent_id
        ];
        return $this->update($this->id, $data);
    }

    public function getCategory($id)
    {
        $category = $this->get($id);
        return $category;
    }

    public function first($id)
    {
        $result = $this->get($id);
        $this->id = $result->id;
        $this->name = $result->name;
        $this->parent_id = $result->parent_id;

        return $this;
    }

    public function create()
    {
        $data = [
            "name"          => $this->name,
            "parent_id"     => $this->parent_id
        ];

        $this->id = $this->insert($data);

    }


    public function getCategories()
    {
        return $this->getAll();
    }

    public function getTree()
    {
        $categories = $this->getCategories();


        $lists = '<ul>';
        foreach ($categories as $category) {
            if ($category->parent_id == 0) {

                $lists .= $this->renderNode($category);
            }
        }
        $lists .= "</ul>";
        return $lists;
    }
    public function renderNode($node)
    {
        $id = $node->id;

        $list = '<li><a href="/editcategory.php?cat_id=' . $node->id . '">' . $node->name . '</a> 
                <a href="/process/deletecategory.php?cat_id=' . $node->id . '"> <span class="text-danger">x</span> </a>
            </li>';
        $children = $this->getChildren($id);
        $count = count($children);
        if ($count > 0) {
            $list .= '<ul>';
            foreach ($children as $child) {
                $list .= $this->renderNode($child);
            }
            $list .= "</ul>";
        }
        return $list;
    }
    public function getChildren($id)
    {

        $result = $this->conn->query("SELECT * FROM categories WHERE parent_id='$id'");
        $results = [];

        $children = [];
        while ($child = $result->fetch_object()) {
            $children[] = $child;
        }
        return $children;
    }
    public function getList()
    {
        $categories = $this->getCategories();
        $this->depth = 0;
        $lists = '';
        foreach ($categories as $category) {
            if ($category->parent_id == 0) {
                $lists .= $this->renderOption($category);
            }
        }
        return $lists;
    }
    public function renderOption($node)
    {

        $id = $node->id;
        $list = '<option value="' . $node->id . '">' . $this->dash($this->depth) . ' '. $node->name . '</option>';
        $children = $this->getChildren($id);

        $count = count($children);


        if ($count > 0) {
            $this->depth++;
            foreach ($children as $child) {
                $list .= $this->renderOption($child);
            }
            $this->depth--;
        }
        return $list;
    }
    private function dash($depth)
    {
        $dash = '';
        for ($i = 1; $i <= $depth; $i++) {
            $dash .= '-';
        }
        return $dash;
    }
}
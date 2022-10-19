<?php
namespace LateMotivApp\Models;
use LateMotivApp\Models\TasksModel;

class CategoriesModel extends Model
{
    protected $id;
    protected $category;
    protected $user_id;
    protected $active;

    public function __construct()
    {
        $this->table = 'categories';
    }
    
    
    
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function getCategory()
    {
        return $this->category;
    }

   
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
    
    public function getUser_id()
    {
        return $this->user_id;
    }

   
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
    
    public function getActive():int
    {
        return $this->active;
    }

   
    public function setActive(int $active)
    {
        $this->active = $active;

        return $this;
    }

}
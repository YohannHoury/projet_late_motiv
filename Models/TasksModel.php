<?php
namespace LateMotivApp\Models;

class TasksModel extends Model
{   
    protected $id;
    protected $title;
    protected $description;
    protected $date;
    protected $category_id;
    protected $author_id;
    protected $active;

    public function __construct()
    {
        $this->table = 'tasks';
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

   
    public function getTitle()
    {
        return $this->title;
    }

   
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

   
    public function getDescription()
    {
        return $this->description;
    }

   
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public function getDate()
    {
        return $this->date;
    }

    
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

   

   public function getCategory_id()
    {
        return $this->category_id;
    }

    
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
    
     public function getAuthor_id()
    {
        return $this->author_id;
    }

    
    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;

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
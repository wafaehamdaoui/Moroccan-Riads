<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //id
    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    //title
    public function getTitle(){
        return $this->attributes['title'];
    }
    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }
    //content
    public function getContent()
    {
        return $this->attributes['content'];
    }
    public function setContent($content)
    {
        $this->attributes['description'] = $content;
    }
    //image
    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }
}

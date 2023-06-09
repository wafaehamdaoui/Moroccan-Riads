<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //id
    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    //name
    public function getName()
    {
        return $this->attributes['name'];
    }
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }//rating
    public function getRating()
    {
        return $this->attributes['ratting'];
    }
    public function setRating($ratting)
    {
        $this->attributes['ratting'] = $ratting;
    }
    //comment
    public function getComment()
    {
        return $this->attributes['comment'];
    }
    public function setComment($comment)
    {
        $this->attributes['comment'] = $comment;
    }
    //created_at
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }
    //updated_at
    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt){
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

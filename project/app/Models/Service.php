<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
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
    }
     //price
     public function getPrice()
     {
         return $this->attributes['price'];
     }
     public function setPrice($price)
     {
         $this->attributes['price'] = $price;
     }
    //description
    public function getDescription()
    {
        return $this->attributes['description'];
    }
    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
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
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}

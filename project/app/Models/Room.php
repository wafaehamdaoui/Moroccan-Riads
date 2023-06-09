<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //id
    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
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
    //image
    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }
    //capacity
    public function getCapacity(){
        return $this->attributes['capacity'];
    }
    public function setCapacity($capacity)
    {
        $this->attributes['capacity'] = $capacity;
    }
    //size
    public function getSize(){
        return $this->attributes['size'];
    }
    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }
    //number
    public function getNumber(){
        return $this->attributes['number'];
    }
    public function setNumber($number)
    {
        $this->attributes['number'] = $number;
    }
    //price
    public function getPrice(){
        return $this->attributes['price'];
    }
    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    // status
    public function getStatus(){
        return $this->attributes['status'];
    }
    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }
    // category
    public function getCategory(){
        return $this->attributes['category_id'];
    }
    public function setCategory($category)
    {
        $this->attributes['category_id'] = $category;
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
    //users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    //category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //riad
    public function riad()
    {
        return $this->belongsTo(Riad::class);
    }
    //services
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    //reveiw
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

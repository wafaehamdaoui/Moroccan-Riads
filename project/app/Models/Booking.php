<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //id
    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    //price
    public function getTotalPrice(){
        return $this->attributes['total_price'];
    }
    public function setTotalPrice($price)
    {
        $this->attributes['total_price'] = $price;
    }
    //payement status
    public function getStatus(){
        return $this->attributes['payement_status'];
    }
    public function setStatus($status)
    {
        $this->attributes['payement_status'] = $status;
    }
    //guests
    public function getGuests(){
        return $this->attributes['guests'];
    }
    public function setGuests($guests)
    {
        $this->attributes['guests'] = $guests;
    }
    //check_in
    public function getCheckIn(){
        return $this->attributes['check_in_date'];
    }
    public function setCheckIn($check_in)
    {
        $this->attributes['check_in_date'] = $check_in;
    }
    //check_out
    public function getCheckOut(){
        return $this->attributes['check_out_date'];
    }
    public function setCheckOut($check_out)
    {
        $this->attributes['check_out_date'] = $check_out;
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
    //room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

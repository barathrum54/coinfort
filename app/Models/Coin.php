<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;
/*
    public function getVoteCount(){
        if($this->votes !== null){
            $this->votes = json_decode($this->votes);
            return $this->votes->count();
        }else{
            return "0";
        }
    }
*/
}

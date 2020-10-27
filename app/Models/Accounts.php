<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
  protected $fillable = ["name", "email", "phone", "address"];

    public function contacts(){
        return $this->hasMany(Contacts::class);
    }
}

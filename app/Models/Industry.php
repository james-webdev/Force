<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    public $fillable = ['industry'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function scopeSearch($query, $search)
    {

          return $query->where('industry', 'like', "%{$search}%");


    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = ["called", "met", "proposed", "assisted", "comments", "contact_id"];


    public function contacts(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}

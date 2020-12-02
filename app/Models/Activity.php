<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = ["comments", "contact_id", "activity_type_id"];


    public function contacts()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function type()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id');
    }

}

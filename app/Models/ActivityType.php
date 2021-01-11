<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    public $fillable = [ 'activity' ];

    /**
     * Activities relationship
     * 
     * @return [type] [description]
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * [scopeSearch description]
     *
     * @param [type] $query  [description]
     * @param [type] $search [description]
     *
     * @return [type]         [description]
     */
    public function scopeSearch($query, $search)
    {
         return $query->where('activity', 'like', "%{$search}%");
    }
}

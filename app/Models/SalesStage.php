<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStage extends Model
{
    use HasFactory;
    public $table = 'sales_stages';
    /**
     * [opportunities description]
     * 
     * @return [type] [description]
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'stage_id', 'id');
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
         return $query->where('stage', 'like', "%{$search}%");
    }
}

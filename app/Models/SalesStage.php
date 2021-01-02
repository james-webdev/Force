<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStage extends Model
{
    use HasFactory;
    public $table = 'sales_stages';

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'stage_id', 'id');
    }
}

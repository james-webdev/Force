<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    public $fillable = [
            'title', 
            'description', 
            'expected_close', 
            'actual_close', 
            'value', 
            'status'
        ];

    public $dates = ['expected_close', 'actual_close'];
    /**
     * [owner description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class);

    }
    /**
     * [account description]
     * 
     * @return [type] [description]
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }


}

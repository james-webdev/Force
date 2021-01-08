<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    public $fillable = ['type'];
    public $table = 'account_types';
    public function accounts()
    {
        return $this->hasMany(Account::class);
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
         return $query->where('type', 'like', "%{$search}%");
    }
}

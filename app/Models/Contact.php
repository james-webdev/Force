<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
 protected $fillable = ["name", "city", "phone", "account_id"];

  public function accounts(){
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function scopeFilter($query, $search = null)
    {

        $query->when($search ?? null, function ($query, $search) {
            $query->where('name', 'like', '%'.$search.'%');
        });
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

}

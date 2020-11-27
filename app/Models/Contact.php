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

}

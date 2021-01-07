<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $fillable = [
        "id",
        "contact_id",
        "what_id",
        "subject",
        "activity_date",
        "status",
        "priority",
        "owner_id",
        "details",
        "activity_type_id",
        "account_id",
        "completed",
        "created_at"
    ];

    /**
     * [contact description]
     * 
     * @return [type] [description]
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
    /**
     * [owner description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    /**
     * [account description]
     * 
     * @return [type] [description]
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }


    public function type()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('subject', 'like', "%{$search}%")
            ->orWhereHas(
                'account', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                }
            )
            ->orWhereHas(
                'contact', function ($q) use ($search) {
                    $q->where('firstName', 'like', "%{$search}%")
                        ->orWhere('lastName', 'like', "%{$search}%");
                }
            );;
    }
   

}

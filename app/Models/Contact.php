<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $fillable = [
            "id",
            "account_id",
            "salutation",
            "firstName",
            "lastName",
            "street",
            "city",
            "state",
            "postalCode",
            "country",
            "phone",
            "fax",
            "mobile_phone",
            "home_phone",
            "other_phone",
            "assistant_phone",
            "reports_to ",
            "email",
            "title",
            "department",
            "assistantName",
            "leadsource ",
            "description",
            "user_id",
            "optOut"
        ];

    
    /**
     * [scopeFilter description]
     * 
     * @param [type] $query  [description]
     * @param [type] $search [description]
     * 
     * @return [type]         [description]
     */
    public function scopeSearch($query, $search = null)
    {

        $query->when(
            $search ?? null, function ($query, $search) {
                $query->where('firstname', 'like', '%'.$search.'%')
                    ->orWhere('lastname', 'like', '%'.$search.'%')
                    ->orWhereHas(
                        'company', function ($q) use ($search) {
                            $q->where('name', 'like',  "%{$search}%");
                        }
                    );
            }
        );
    }

    /**
     * [activities description]
     * 
     * @return [type] [description]
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * [company description]
     * 
     * @return [type] [description]
     */
    public function company()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    /**
     * [company description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * [lastActivity description]
     * 
     * @return [type] [description]
     */
    public function lastActivity()
    {
        return $this->belongsTo(Activity::class);
    }
    /**
     * [scopeWithLastActivityId description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeWithLastActivityId($query)
    {
         return $query
             ->select('contacts.*')
             ->selectSub('select id as last_activity_id from activities where contact_id = contacts.id and completed=1 order by activities.activity_date desc limit 1', 'last_activity_id');
       
    }
    /**
     * [fullName description]
     * 
     * @return [type] [description]
     */
    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
    /**
     * [recentActivities description]
     * 
     * @return [type] [description]
     */
    public function recentActivities()
    {
        return $this->hasMany(Activity::class, 'contact_id', 'id')
            ->where('completed', 1)
            ->where('activity_date', '>',  now()->subMonth(3));
    }

    
}

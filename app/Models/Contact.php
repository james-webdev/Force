<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
 protected $fillable = [
            "firstname",
            'lastname', 
            'address', 
            "city",
            'state',
            'zipcode',
            'email' ,
            "phone", 
            "account_id"
        ];

    
    /**
     * [scopeFilter description]
     * 
     * @param [type] $query  [description]
     * @param [type] $search [description]
     * 
     * @return [type]         [description]
     */
    public function scopeFilter($query, $search = null)
    {

        $query->when(
            $search ?? null, function ($query, $search) {
                $query->where('firstname', 'like', '%'.$search.'%');
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
        return $this->belongsTo(Account::class, 'account_id');
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

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function recentActivities()
    {
        return $this->hasMany(Activity::class, 'contact_id', 'id')
            ->where('completed', 1)
            ->where('activity_date','>', now()->subMonth(3));
    }
}

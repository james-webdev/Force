<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ["name", "email", "phone", "address"];
    /**
     * [contacts description]
     * 
     * @return [type] [description]
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    /**
     * [scopeFilter description]
     * @param [type] $query  [description]
     * @param [type] $search [description]
     * 
     * @return [type]         [description]
     */
    public function scopeFilter($query, $search = null)
    {

        $query->when(
            $search ?? null, function ($query, $search) {
                $query->where('name', 'like', '%{$search}%');
            }
        );
    }
    /**
     * [opportunities description]
     * 
     * @return [type] [description]
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function openOpportunities()
    {
        return $this->hasMany(Opportunity::class)->where('status', 0);
    }
    /**
     * [user description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('address', 'like', "%{$search}%")
            ->orWhere('city',  'like', "%{$search}%");
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
     * 
     * @param [type] $query [description]
     * 
     * @return [type]        [description]
     */
    public function scopeWithLastActivityId($query)
    {
         return $query
             ->select('accounts.*')
             ->selectSub('select id as last_activity_id from activities where account_id = accounts.id and completed=1 order by activities.activity_date desc limit 1', 'last_activity_id');
       
    }

    
}

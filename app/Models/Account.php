<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $fillable = [
        'owner_id',
        'parent_id',
        'name', 
        'phone',
        'fax',
        'website',
        'description',
        'street',
        'city',
        'state',
        'country',
        'postalcode'
        ];
    /**
     * [contacts description]
     * 
     * @return [type] [description]
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'account_id', 'id');
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
        return $this->hasMany(Opportunity::class, 'account_id', 'id');
    }
    /**
     * [type description]
     * 
     * @return [type] [description]
     */
    public function type()
    {
        return $this->belongsTo(AccountType::class);
    }
    /**
     * [industry description]
     * 
     * @return [type] [description]
     */
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
    /**
     * [activities description]
     * 
     * @return [type] [description]
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'account_id', 'id');
    }
    /**
     * [openOpportunities description]
     * 
     * @return [type] [description]
     */
    public function openOpportunities()
    {
        return $this->hasMany(Opportunity::class, 'account_id', 'id')->where('status', 0);
    }
    /**
     * [user description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('street', 'like', "%{$search}%")
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
             ->selectSub('select id as last_activity_id from activities where account_id = accounts.id and status=1 order by activities.activity_date desc limit 1', 'last_activity_id');
       
    }

    
}

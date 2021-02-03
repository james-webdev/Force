<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
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
        'postalcode',
        'drive',
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
        return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
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
     * [wonOpportunities description]
     * 
     * @return [type] [description]
     */
    public function wonOpportunities()
    {
        return $this->hasMany(Opportunity::class, 'account_id', 'id')->where('status', 1);
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
            ->orWhere('street', 'like', "%{$search}%")
            ->orWhere('city',  'like', "%{$search}%");
    }

    public function fullAddress()
    {
        return $this->street . " " . $this->city . " " . $this->state;
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
    public function scopeTotalBusiness($query, $year=null)
    {
        return $query
            ->withCount(
                ['opportunities as closed_business'=>function ($q) use ($year) {
                    $q->select(\DB::raw('SUM(value) as closed_business'))
                        ->where('status', 1)
                        ->when(
                            $year, function ($q) use ($year) {
                                $q->whereRaw('year(close_date) = ' . $year);
                            }
                        );
                }
                ]
            );

    }
    
}

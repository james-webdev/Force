<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

   
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $guard_name = 'api';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * Account relationship
     * 
     * @return model Accounts
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    /**
     * Activities relationship
     * 
     * @return Activity model
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    /**
     * Opportunities realtionship
     * 
     * @return Opportunity model
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
    /**
     * Contacts relationship
     * 
     * @return Contacts model
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    /**
     * ScopeSearch query 
     * 
     * @param Eloquent $query  [description]
     * @param string   $search [description]
     * 
     * @return [type]         [description]
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%");
    }
}

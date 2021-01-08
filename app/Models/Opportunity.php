<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    public $statuses = [
            0=>'Open',
            1=> 'Closed Won',
            2=>'Closed Lost'
        ];

    public $fillable = [
            'id',
            'account_id',
            'title',
            'description',
            'close_date',
            'value',
            'status',
            'stage',
            'probability',
            'type',
            'next_step',
            'lead_source',
            'owner_id',
            'contact_id',
            'partner',
            'created_at'
        ];

    public $dates = ['close_date'];
    /**
     * [owner description]
     * 
     * @return [type] [description]
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
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
     * [account description]
     * 
     * @return [type] [description]
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    /**
     * [opportunityValue description]
     * 
     * @return [type] [description]
     */
    public function opportunityValue()
    {
        if ($this->value) {
            return $this->value /100;
        }
        return $this->value;
    }

    public function stage()
    {
        return $this->belongsTo(SalesStage::class, 'stage_id', 'id');
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
        return $query->where('title', 'like', "%{$search}%")
            ->orWhereHas(
                'account', function ($q) use ($search) {
                    $q->where('name', 'like',  "%{$search}%");
                }
            );
    }

}

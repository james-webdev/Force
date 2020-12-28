<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountImport extends Model
{
    use HasFactory;
    public $fields = [
        0 => "id",
        3 => "name",
        4 => "type",
        5 => "parentid",
        6 => "billingstreet",
        7 => "billingcity",
        8 => "billingstate",
        9 => "billingpostalcode",
        10 => "billingcountry",
        14 => "shippingstreet",
        15 => "shippingcity",
        16 => "shippingstate",
        17 => "shippingpostalcode",
        18 => "shippingcountry",
        22 => "phone",
        23 => "fax",
        25 => "website",
        27 => "industry",
        28 => "annualrevenue",
        29 => "numberofemployees",
        30 => "ownership",
        31 => "tickersymbol",
        32 => "description",
        33 => "rating",
        34 => "site",
        35 => "ownerid",
        36 => "created_at",
        38 => "updated_at",
    ];

}

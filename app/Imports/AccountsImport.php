<?php

namespace App\Imports;

use App\Accounts;
use Maatwebsite\Excel\Concerns\ToModel;

class AccountsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Accounts([
            "name" => $row["name"],
            "email" => $row["email"],
            "phone" => $row["phone"],
            "address" => $row["address"],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Account;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AccountImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   

    public function collection(Collection $rows)
    {
        $account = new Account();
        $fields = $account->fields;
        foreach ($rows as $row) {
            Account::create(
                [
                    "name" => $row["name"],
                    "email" => $row["email"],
                    "phone" => $row["phone"],
                    "address" => $row["address"],
                ]
            );
        }

    }
}

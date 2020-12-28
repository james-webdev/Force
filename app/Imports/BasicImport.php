<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class BasicImport implements ToCollection, WithHeadingRow
{
    
    use Importable;
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}

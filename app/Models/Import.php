<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    public $fillable = ['type', 'filename', 'header', 'data'];
    public $imports = [
        'user', 
        'account', 
        'contact', 
        'activity', 
        'opportunity'];

    public function getImports()
    {
        return $this->imports;
    }
}

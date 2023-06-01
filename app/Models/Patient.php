<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $tableName="patient";
    public $table="patient";
    public $timestamps=false;
    public $timestamp=false;
    public $primary="MRN";
    public $primaryKey="MRN";


}

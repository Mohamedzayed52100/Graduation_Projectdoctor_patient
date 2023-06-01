<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $tableName="relative";
    public $table="relative";
     public $timestamp=false;
    public $primary="relative_id";
    public $primaryKey="relative_id";
}

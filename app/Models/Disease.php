<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    public $timestamps=false;
    public $tableName="disease";
    public $table="disease";
     public $timestamp=false;
    public $primary="disease_id";
    public $primaryKey="disease_id";
}

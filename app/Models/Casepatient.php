<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casepatient extends Model
{
    use HasFactory;
    protected $table = 'casepatients';

    protected $fillable = [
            'stable',
            'unstable',
            'emergency',
            'created_at',
            'updated_at',
        ];
}

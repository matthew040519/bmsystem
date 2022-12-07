<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurokModel extends Model
{
    use HasFactory;

    protected $table = 'tblpurok';
    protected $primaryKey = 'id';
    protected $fillable = ['barangay_id', 'purok_name'];
}

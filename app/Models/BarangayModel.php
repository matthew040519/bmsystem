<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayModel extends Model
{
    use HasFactory;

    protected $table = 'tblbarangay';
    protected $primaryKey = 'id';
    protected $fillable = ['barangay_name', 'barangay_address'];
}

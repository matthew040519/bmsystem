<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurokAdminModel extends Model
{
    use HasFactory;

    protected $table = 'tblpurokadmin';
    protected $primaryKey = 'id';
    protected $fillable = ['barangay_id', 'purok_id', 'username', 'email', 'password', 'contact_number'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayAdminModel extends Model
{
    use HasFactory;

    protected $table = 'tblbarangay_admin';
    protected $primaryKey = 'id';
    protected $fillable = ['barangay_id', 'username', 'email', 'password', 'contact_number', 'address'];
}

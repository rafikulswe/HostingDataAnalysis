<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDB extends Model
{
    use HasFactory;
    protected $table = 'work_d_b_s';
    protected $fillable = ['name', 'email', 'phone', 'ip', 'card_name', 'card_details', 'status'];
}

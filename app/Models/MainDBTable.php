<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainDBTable extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'ip', 'card_name', 'card_details', 'status'];
}
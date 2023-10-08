<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VWEvent extends Model
{
    use HasFactory;

    protected $table = 'vw_events';

    protected $primaryKey = 'id';
}

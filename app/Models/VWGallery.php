<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VWGallery extends Model
{
    use HasFactory;

    protected $table = 'vw_gallery';

    protected $primaryKey = 'gallery_group';
}

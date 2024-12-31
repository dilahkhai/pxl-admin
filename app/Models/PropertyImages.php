<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyImages extends Model
{
    use HasFactory;

    protected $table = 'property_images';

    protected $fillable = ['property_id', 'image_path'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

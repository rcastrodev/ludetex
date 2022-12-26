<?php

namespace App;

use App\Color;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    protected $table = 'product_picture';
    protected $fillable = ['product_id', 'image', 'order', 'color_id'];

    function color()
    {
        return $this->belongsTo(Color::class);
    }
}

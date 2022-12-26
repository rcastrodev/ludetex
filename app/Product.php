<?php

namespace App;

use App\Color;
use App\SubCategory;
use App\ProductPicture;
use App\ProductPicture2;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sub_category_id',  'name', 'characteristic', 'width', 'presentation_and_measurements', 'presentation', 'order', 'extra'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function banner()
    {
        return $this->hasMany(ProductPicture2::class);
    }

    public function colores()
    {
        return $this->belongsToMany(Color::class);
    }

    public function fingerprint()
    {
        if ($this->subCategory->name == $this->subCategory->category->name)
            return $this->subCategory->name;
        else 
            return "{$this->subCategory->category->name} {$this->subCategory->name}";
    }

}

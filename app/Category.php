<?php

namespace App;

use App\Product;
use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'order', 'image', 'outstanding'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function productsTable()
    {
        $subCategoriesId    = $this->subcategories()->pluck('id')->toArray();
        return Product::whereIn('sub_category_id', $subCategoriesId)->orderBy('order', 'ASC')->get(); 
    }

    public function colors()
    {
        $productsTable = $this->productsTable();
        $colors = [];
        if(! $productsTable) return [];

        foreach ($productsTable as $product) 
            if ($product->colores) 
                foreach ($product->colores as $color) 
                    $colors[] = $color->name;

        return array_unique($colors);
    }

    public function presentations()
    {
        $productsTable = $this->productsTable();
        $presentations      = [];

        if(! $productsTable) return [];

        foreach ($productsTable as $product) 
            if ($product->presentation) 
                foreach (Str::of($product->presentation)->explode('|') as $presentation) 
                    $presentations[] = $presentation;

        return array_unique($presentations);
    }
}

<?php

namespace App;

use App\Section;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'keywords'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}

<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['company_id', 'description', 'address', 'email', 'email2', 'phone1', 'phone2', 'phone3', 'phone4','logo_header', 'logo_footer', 'youtube', 'facebook', 'instagram', 'linkedin'];

    public function company()
    {
        return $this->belongsTo (Company::class);
    }
}

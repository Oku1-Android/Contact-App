<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['first_name', 'last_name','address', 'address', 'email', 'id','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);


    }


}

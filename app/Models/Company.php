<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\factories\Administration\CompanyFactory;


class Company extends Model
{
    use HasFactory;

   // use Database\factories\CompanyFactory;

    protected static function newFactory()
    {
        return CompanyFactory::new();
    }




    protected $fillable = ['name','address','website','email', 'id', 'users_id'];

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

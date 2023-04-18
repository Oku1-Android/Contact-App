<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return new CompanyFactory();
    }




    protected $fillable = ['name','address','website','email', 'id'];

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

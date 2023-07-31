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
    public static function userCompanies(){
        // this displays all the companies in the drop down
        //return Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');

        //This retrieves user's infor but refuses to display on the screen
        return self::where('user_id', auth()->id())->orderBy('name')->pluck('name','id')->prepend('All Companies', '');
    }

}

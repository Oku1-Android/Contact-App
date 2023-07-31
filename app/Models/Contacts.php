<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use App\Scopes\ContactSearchScope;
use App\Models\User;
use Database\Seeders;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'address', 'phone', 'email', 'id', 'company_id', 'user_id'];

    protected $filterColumns = ['company_id'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


public function scopeLatestFirst($query){

       return  $query->orderBy('id', 'desc');
}

protected static function boot(){

parent::boot();

static::addGlobalScope(new FilterScope);
static::addGlobalScope(new ContactSearchScope);
}

}

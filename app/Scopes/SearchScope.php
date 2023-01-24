<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\Buider;
use App\Scopes;


class SearchScope implements Scope
{


public function apply(Builder $builder, Model $model)
{
    

    if($search = request('search')){
        $builder->where('first_name', 'LIKE', "%{$search}%");
        $builder->orwhere('last_name', 'LIKE', "%{$search}%");
        $builder->orwhere('email', 'LIKE', "%{$search}%");
    }

       

}

}


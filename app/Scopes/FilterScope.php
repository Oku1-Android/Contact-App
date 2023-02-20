<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\Buider;
use App\Scopes;


class FilterScope implements Scope
{

//protected $filterColumns = ['company_id'];


public function apply(Builder $builder, Model $model)
{ 
    // foreach($this->filterColumns  as $column)
    // {
    //     if($model = request($column)){
    //         $builder->where($column, $value);
    //         }
    
    // }
    if($companyId = request('company_id')){
        $builder->where('company_id', $companyId);
        }

    // if($search = request('search')){
    //         $builder->where('first_name', 'LIKE', "%{$search}%");
    //         $builder->orWhere('last_name', 'LIKE', "%{$search}%");
    //         $builder->orWhere('email', 'LIKE', "%{$search}%");
            
          //  }


    



}

}


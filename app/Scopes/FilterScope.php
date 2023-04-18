<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\Buider;
use App\Scopes;


class FilterScope implements Scope
{

protected $filterColumns = [];


public function apply(Builder $builder, Model $model)
{ 
    $columns = property_exists($model, 'filter_columns') ? $model->filterColumns: $this->filterColumns;
    
    foreach($this->filterColumns  as $column)
    {
        if($value = request($column)){
            $builder->where($column, $value);
            }
      
    }

    // if($companyId = request('company_id')){
    //     $builder->where('company_id', $companyId);
    //     }

    // if($search = request('search')){
    //         $builder->where('first_name', 'LIKE', "%{$search}%");
    //         $builder->orWhere('last_name', 'LIKE', "%{$search}%");
    //         $builder->orWhere('email', 'LIKE', "%{$search}%");
            
          //  }


    



}

}


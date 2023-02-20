<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
// 

class SearchScope implements Scope
{

    protected $searchColumns= []; //makes the scope reusable


public function apply(Builder $builder, Model $model)
{
    

    if($search = request('search')){
        
        //search through the columns
        foreach($this->searchColumns as $column){

            $arr = explode('.', $column);

            if(count($arr) == 2){
                
                list($relationship, $col) = $arr;

                $builder->orWhereHas($relationship, function($query)use($search, $col){
                 $query->where($col, 'LIKE', "%{$search}%");
                });
            }
            else{
                $builder->orWhere($column, 'LIKE', "%{$search}%");
            }
           
        }
        // $builder->orwhere('email', 'LIKE', "%{$search}%");
        // 
       // });

    }      

}

}


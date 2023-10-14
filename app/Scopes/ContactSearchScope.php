<?php

namespace App\Scopes;

class ContactSearchScope extends SearchScope
{
    protected $searchColumns= ['first_name', 'last_name', 'email', 'company.name'];
    protected $filterColumns = ['company_id'];

// } foreach($model->filterColumns  as $column)
// {
//     if($model = request($column)){
//         $builder->where($column, $value);
//         }

}

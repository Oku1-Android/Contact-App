<?php

namespace App\Scopes;

class companySearchScope extends SearchScope
{
    protected $searchColumns= ['name', 'address', 'email', 'website'];
    //protected $filterColumns = ['company_id'];
}

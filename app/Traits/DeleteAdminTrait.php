<?php

namespace App\Traits;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

trait DeleteAdminTrait
{
    
    protected function setupDelete()
    {  
        if(backpack_user()->hasRole('admin')) {
            $this->crud->addClause('whereHas', 'roles', function($query) {
                $query->where('name', '!=', 'admin');
            }); 
    }
    }
}
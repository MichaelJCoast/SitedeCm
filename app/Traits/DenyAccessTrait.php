<?php

namespace App\Traits;

trait DenyAccessTrait
{
    protected function setupAccess()
    {
        if (!backpack_user()->hasRole('admin')) {
            $this->crud->denyAccess('create');
            $this->crud->denyAccess('update');
            $this->crud->denyAccess('delete');
        }
        
    }
}
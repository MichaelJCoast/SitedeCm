<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class equipaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EquipaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Equipa');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/equipa');
        $this->crud->setEntityNameStrings('membro', 'equipa');
      
    }

        /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('nome');
        CRUD::column('image');
        CRUD::column('Role');
        CRUD::column('Department');
     
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

/**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
        protected function setupCreateOperation()
        {
            CRUD::addField([
            'name' => 'nome',
            'type' => 'text',
            'label' => "Nome"
        ]);

        CRUD::addField([   
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
        

        CRUD::addField([    // SELECT2
            'name'          => 'role_id',
            'label'         => 'Role',
            'type'          => 'select',
            'placeholder'   => 'Select a role',
            'entity'        => 'role',
            'attribute'     => 'type',
           
            
        ]);
        
        CRUD::addField([    // SELECT2
            'name'          => 'dep_id',
            'label'         => 'Department',
            'type'          => 'select',
            'placeholder'   => 'Select a Dep',
            'entity'        => 'department',
            'attribute'     => 'name',
            'model'     =>  'App\Models\Department',
        ]);
     


        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        // add asterisk for fields that are required in equipaRequest
       
    }
     /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

/*
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('title');
        CRUD::column('dep_id');
        CRUD::column('role_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
    /*    
    }
/*
    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
    
    protected function setupCreateOperation()
    {
        CRUD::setValidation(equipaRequest::class);

        CRUD::field('id');
        CRUD::field('title');
        CRUD::field('dep_id');
        CRUD::field('role_id');
        CRUD::field('created_at');
        CRUD::field('updated_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
  
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }   */
}
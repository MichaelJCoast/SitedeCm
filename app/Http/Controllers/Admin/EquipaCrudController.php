<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Traits\DenyAccessTrait; 
use App\Models\Equipa;

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
    use DenyAccessTrait;
  
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
        $this->crud->setModel(\App\Models\Equipa::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/equipa');
        $this->crud->setEntityNameStrings('membro', 'equipa');
        $this->setupAccess();
        $this->setupViewAccess();
        $this->crud->orderBy('mandato_id', 'DESC');
      
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
        CRUD::addColumn([
            'name' => 'image', 
            'label' => 'Imagem',
            'type' => 'image',
            'height' => '30px',
            'width'  => '30px',
        ]);
        $this->crud->addColumns( [
            [
                'label' => 'Cargo',
                'name' => 'roles.type',
            ],
        ]);
        $this->crud->addColumns( [
            [
                'label' => 'Departmento',
                'name' => 'departments.name',
            ],
        ]);
        $this->crud->addColumns( [
            [
                'label' => 'Ano do Mandato',
                'name' => 'mandatos.year',
            ],
        ] );
     
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
            CRUD::setValidation(EquipaRequest::class);
            
            CRUD::addField([
            'name' => 'nome',
            'type' => 'text',
            'label' => "Nome"
        ]);

        CRUD::addField([   
            'name'      => 'image',
            'label'     => 'Imagem',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
        

        CRUD::addField([    // SELECT2
            'name'          => 'role_id',
            'label'         => 'Cargo',
            'type'          => 'select',
            'entity'        => 'role',
            'attribute'     => 'type',  
        ]);
        
        CRUD::addField([    // SELECT2
            'name'          => 'dep_id',
            'label'         => 'Departmento',
            'type'          => 'select',
            'entity'        => 'department',
            'attribute'     => 'name',
            'model'     =>  'App\Models\Department',
        ]);

        CRUD::addField([    // SELECT2
            'name'          => 'mandato_id',
            'label'         => 'Ano do Mandato',
            'type'          => 'select',
            'entity'        => 'mandato',
            'attribute'     => 'year',
            'model'     =>  'App\Models\Mandato',
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
        CRUD::setValidation(EditEquipaRequest::class);
    }

}
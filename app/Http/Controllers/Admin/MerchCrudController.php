<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MerchRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Post;

/**
 * Class MerchCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MerchCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Merch::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/merch');
        CRUD::setEntityNameStrings('merch', 'merches');
        if (!backpack_user()->hasRole('admin')) {
            CRUD::denyAccess('create');
            CRUD::denyAccess('update');
            CRUD::denyAccess('delete');
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::column('name');
        CRUD::column('photo');
        CRUD::column('price');
        CRUD::column('size');
        CRUD::column('quantity');




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
            'name' => 'name',
            'type' => 'text',
            'label' => "Nome"
        ]);

        CRUD::addField([   
            'name'      => 'photo',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
        
        CRUD::addField([  
            'name'          => 'price',
            'label'         => 'Price',
            'type'          => 'text',
            'placeholder'   => '19,99',
        ]);

        CRUD::addField([  
            'name'          => 'size',
            'label'         => 'Size',
            'type'          => 'text',
        ]);
        
        CRUD::addField([ 
            'name'          => 'quantity',
            'label'         => 'quantidade',
            'type'          => 'text',
        ]);

        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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


protected function showMerch(Merch $merch)
    {
        return view('merch', [
            'merch' => $merch
        ]);
    }

}
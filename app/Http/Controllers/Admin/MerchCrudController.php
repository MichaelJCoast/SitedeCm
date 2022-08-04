<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MerchRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Merch;
use App\Traits\DenyAccessTrait; 

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
    use DenyAccessTrait;
  

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Merch::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/merch');
        CRUD::setEntityNameStrings('merch', 'merch');
        $this->setupAccess();
        $this->setupViewAccess();
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
       
        CRUD::addColumn([
            'name' => 'name', 
            'label' => 'Nome do Produto',
            'type'  => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'description', 
            'label' => 'Descrição',
            'type'  => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'photo', 
            'label' => 'Imagem',
            'type' => 'image',
            'height' => '30px',
            'width'  => '30px',
        ]);
        CRUD::addColumn([
            'name' => 'price', 
            'label' => 'Preço',
            'type' => 'number',
            'suffix'        => ' EUR',
            'decimals'      => 2,
            'dec_point'     => ',',
        ]);
        $this->crud->addColumns( [
            [
                'label' => 'Tamanhos',
                'type' => "select_multiple",
                'entity' => 'sizes', // the method that defines the relationship in your Model
                'name' => 'sizes',
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Size",
                'pivot'     => true,
            ],
        ]);

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
        CRUD::setValidation(MerchRequest::class);
        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => "Nome"
        ]);

        CRUD::addField([
            'name'          => 'description',
            'label'         => 'Descrição',
            'type'          => 'summernote',
            'options'       => [
                'toolbar'   => [
                ['style', ['bold', 'underline', 'italic']],
                ['font', ['color', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen']],
                ]
            ],
        ]);

        CRUD::addField([   
            'name'      => 'photo',
            'label'     => 'Imagem',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
        
        CRUD::addField([  
            'name'          => 'price',
            'label'         => 'Preço',
            'type' => 'number',
             // optionals
             'attributes' => ["step" => "any"], // allow decimals
             'suffix' => '€',
        ]);

        CRUD::addField([
            'label'     => 'Tamanhos',
            'type'      => 'checklist',
            'name'      => 'sizes',
            'entity'    => 'sizes',
            'attribute' => 'name',
            'model'     => 'App\Models\Size',
            'pivot'     => true,
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
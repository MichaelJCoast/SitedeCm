<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarouselRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarouselCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarouselCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Carousel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/carousel');
        CRUD::setEntityNameStrings('ao Carousel', 'carousel');
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
            'name' => 'title', 
            'label' => 'Título',
            'type'  => 'text',
        ]);
        CRUD::column('router_link');
        CRUD::addColumn([
            'name' => 'has_button', 
            'label' => 'Botão',
            'type'  => 'boolean',
            'options' => [
                0 => 'Não tem botão', 
                1 => 'Tem botão',
            ]
        ]);
        CRUD::addColumn([
            'name' => 'image', 
            'label' => 'Imagem',
            'type' => 'image',
            'height' => '30px',
            'width'  => '40px',
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
        CRUD::setValidation(CarouselRequest::class);

        CRUD::addField([
            'name' => 'title', 
            'label' => 'Título',
            'type'  => 'text',
        ]);
        CRUD::addField([
            'name'      => 'image',
            'label'     => 'Imagem',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);

        CRUD::field('router_link');

        CRUD::addField([   // Checkbox
            'name'  => 'has_button',
            'label' => 'Tem botão de hiperligação?',
            'type'  => 'checkbox'
        ],);

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
}

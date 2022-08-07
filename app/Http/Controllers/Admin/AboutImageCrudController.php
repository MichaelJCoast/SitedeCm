<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutImageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AboutImageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AboutImageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AboutImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/about-image');
        CRUD::setEntityNameStrings('Imagem para a página sobre', 'Imagem da página sobre');
        $this->crud->denyAccess('delete');
        if (\App\Models\AboutImage::count() > 1) {
            $this->crud->denyAccess('create');
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

        CRUD::addColumn([
            'name' => 'image', 
            'label' => 'Imagem',
            'type' => 'image',
            'height' => '30px',
            'width'  => '40px',
        ]);
        
        CRUD::addColumn([
            'name' => 'mode', 
            'label' => 'Modo',
            'type'  => 'boolean',
            'options' => [
                0 => 'Modo Noturno', 
                1 => 'Modo Diurno',
            ]
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
        CRUD::setValidation(AboutImageRequest::class);

        CRUD::addField([
            'name'      => 'image',
            'label'     => 'Imagem',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);

        CRUD::addField([   // select_from_array
            'name'        => 'mode',
            'label'       => "Modo",
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Modo Noturno', 
                1 => 'Modo Diurno'],
            'allows_null' => false,
            'default'     => 0,
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
        CRUD::setValidation(AboutImageRequest::class);

        CRUD::addField([
            'name'      => 'image',
            'label'     => 'Imagem',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);

    }
}

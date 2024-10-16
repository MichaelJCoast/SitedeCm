<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LinkRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LinkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LinkCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Link::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/link');
        CRUD::setEntityNameStrings('link', 'links');
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
            'label' => 'Nome do Link',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'link_to',
            'label' => 'Link para',
            'type' => 'text',
            'wrapper' => [
                // 'element' => 'a', // the element will default to "a" so you can skip it here
                'href' => function ($crud, $column, $entry, $related_key) {
                    return url($entry->link_to);
                },
                'target' => '_blank',
            ],
        ]);
        CRUD::addColumn([
            'name' => 'link_icon',
            'label' => 'Icone do Link',
            'type' => 'text',
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
        CRUD::setValidation(LinkRequest::class);

        CRUD::addField([
            'name' => 'name',
            'label' => 'Nome do Link',
            'type' => 'text',
        ]);

        CRUD::addField([
            'name' => 'link_to',
            'label' => 'Link para:',
            'type' => 'text',
        ]);

        CRUD::addField([
            'name' => 'link_icon',
            'label' => 'Ícone do link (opcional)',
            'hint' => "Pesquisar icons disponíveis em: https://fontawesome.com/icons. Colocar o nome do ícon com o prefixo 'fa-'. (ex:'fa-shield-alt'). Caso seja uma rede social colocar também o prefixo 'fab' (ex:'fab fa-facebook').",
            'type' => 'text',
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
}

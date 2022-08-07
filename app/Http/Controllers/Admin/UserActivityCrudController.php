<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\LogActivity\Activity;
use App\Traits\DenyAccessTrait; 

/**
 * Class LogUserActivityCrudController.
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserActivityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use DenyAccessTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Activity::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/log-activity');
        CRUD::setEntityNameStrings('log-user', 'Atividade de Users');
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
        $this->crud->set('show.setFromDb', false);


        $this->crud->addColumn([
            'name'      => 'created_at',
            'label'     => 'Data',
            'type'      => 'model_function',
            'function_name' => 'getDate',
        ]);

        $this->crud->addColumn([
            'name'      => 'description',
            'label'     => 'Ação',
            'type'      => 'text',
            'wrapper'   => [
                'element'   => 'span',
                'class'     => function ($crud, $column, $entry, $related_key) {
                    switch ($entry->description) {
                        case 'created':
                            $class = 'badge badge-success';
                            break;

                        case 'updated':
                            $class = 'badge badge-warning text-white';
                            break;

                        case 'deleted':
                            $class = 'badge badge-danger text-white';
                            break;

                        default:
                            $class = 'badge badge-info';
                            break;
                    }

                    return $class;
                },
            ],
        ]);

        $this->crud->addColumn([
            'name'      => 'subject',
            'label'     => 'Página',
            'type'      => 'model_function',
            'function_name' => 'getTableName',
        ]);

        $this->crud->addColumn([
            'name'      => 'causer',
            'label'     => 'Utilizador',
            'type'      => 'model_function',
            'function_name' => 'getUser',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->setShowContentClass('col-md-12');

        $this->crud->addColumn([
            'name'      => 'created_at',
            'label'     => 'Data',
            'type'      => 'model_function',
            'function_name' => 'getDate',
        ]);

        $this->crud->addColumn([
            'name'      => 'description',
            'label'     => 'Ação',
            'type'      => 'text',
            'wrapper'   => [
                'element'   => 'span',
                'class'     => function ($crud, $column, $entry, $related_key) {
                    switch ($entry->description) {
                        case 'created':
                            $class = 'badge badge-success';
                            break;

                        case 'updated':
                            $class = 'badge badge-warning text-white';
                            break;

                        case 'deleted':
                            $class = 'badge badge-danger text-white';
                            break;

                        default:
                            $class = 'badge badge-info';
                            break;
                    }

                    return $class;
                },
            ],
        ]);

        $this->crud->addColumn([
            'name'      => 'subject',
            'label'     => 'Página',
            'type'      => 'model_function',
            'function_name' => 'getTableName',
        ]);

        $this->crud->addColumn([
            'name'      => 'causer',
            'label'     => 'Utilizador',
            'type'      => 'model_function',
            'function_name' => 'getUser',
        ]);

        $this->crud->addColumn([
            'name'      => 'properties',
            'label'     => 'Dados',
            'type'      => 'properties',
        ]);
    }
}

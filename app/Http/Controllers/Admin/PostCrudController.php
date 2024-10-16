<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
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

        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');

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
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'body',
            'label' => 'Body',
            'type' => 'text',
        ]);
        CRUD::column('slug');
        CRUD::addColumn([
            'name' => 'categories.name',
            'label' => 'Categoria',
            'type' => 'text',
        ]);
        CRUD::addColumn([
            'name' => 'created_at',
            'label' => 'Criado a',
            'type' => 'date',
        ]);
        CRUD::addColumn([
            'name' => 'portrait_image',
            'label' => 'Portrait',
            'type' => 'image',
            'height' => '30px',
            'width' => '30px',
        ]);
        CRUD::addColumn([
            'name' => 'landscaped_image',
            'label' => 'Landscaped',
            'type' => 'image',
            'height' => '30px',
            'width' => '40px',
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
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'name' => 'title',
            'label' => 'Título',
            'type' => 'text',
        ]);
        CRUD::addField([
            'name' => 'body',
            'label' => 'Text',
            'type' => 'summernote',
            'options' => [
                'toolbar' => [
                    ['style', ['bold', 'underline', 'italic']],
                    ['font', ['color', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
            ],
        ]);

        CRUD::addField([ // SELECT2
            'name' => 'category_id',
            'label' => 'Categoria',
            'type' => 'select',
            'placeholder' => 'Select a Category',
            'entity' => 'category',

        ]);

        CRUD::addField([
            'name' => 'portrait_image',
            'label' => 'Portrait Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);

        CRUD::addField([
            'name' => 'landscaped_image',
            'label' => 'Landscape Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
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
        CRUD::setValidation(EditPostRequest::class);
    }

    protected function showPosts(Post $post)
    {
        return view('blog-post', [
            'post' => $post,
        ]);
    }

    protected function blogPostIndex(Post $post)
    {
        return view('blog', [
            'posts' => $post::orderBy('created_at', 'DESC')->paginate(18),
        ]);
    }
}

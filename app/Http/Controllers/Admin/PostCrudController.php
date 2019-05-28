<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\CrudPanel;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PostRequest as StoreRequest;
use App\Http\Requests\PostRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Post');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/posts');
        $this->crud->setEntityNameStrings('post', 'posts');
        $this->crud->with('category', 'user', 'tags');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();


        $this->crud->addField([  // Select2
           'label' => "Author",
           'type' => 'select2',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User", // foreign key model
        ]);

        $this->crud->addField([  // Select2
           'label' => "Category",
           'type' => 'select2',
           'name' => 'category_id', // the db column for the foreign key
           'entity' => 'category', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Category", // foreign key model
        ]);

        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Tags",
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Tag", // foreign key model
            'pivot' => true,
        ]);

        $this->crud->addField([ // image
            'label' => "Cover",
            'name' => "cover",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

        $this->crud->addField([
            'label' => 'Article Body',
            'name' => 'body',
            'type' => 'summernote'
        ]);

        $this->crud->addField([
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'col-md-6'
            ],
        ]);

        $this->crud->addField([
            'label' => 'Slug',
            'name' => 'slug',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'col-md-6'
            ],
        ]);

        $this->crud->removeColumns(['slug', 'body', 'preview']);

        $this->crud->addColumn([
            'name' => 'cover',
            'label' => 'Cover',
            'type' => 'image'
        ]);

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Author", // Table column heading
           'type' => "select",
           'name' => 'user_id', // the column that contains the ID of that connected entity;
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\User", // foreign key model
        ]);

        $this->crud->addColumn([
           // 1-n relationship
           'label' => "Category", // Table column heading
           'type' => "select",
           'name' => 'category_id', // the column that contains the ID of that connected entity;
           'entity' => 'category', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Category", // foreign key model
        ]);

        $this->crud->addFilter([ // select2 filter
          'name' => 'category_id',
          'type' => 'select2',
          'label'=> 'Category'
        ], function () {
            return \App\Category::has('posts')->get()->pluck('name', 'id')->toArray();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'category_id', $value);
        });

        $this->crud->addFilter([ // select2 filter
          'name' => 'user_id',
          'type' => 'select2',
          'label'=> 'User'
        ], function () {
            return \App\User::has('posts')->get()->pluck('name', 'id')->toArray();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'user_id', $value);
        });


        // add asterisk for fields that are required in PostRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}

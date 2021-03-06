<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ReferenceRequest as StoreRequest;
use App\Http\Requests\ReferenceRequest as UpdateRequest;

class ReferenceCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setModel('App\Models\Reference');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/references');
        $this->crud->setEntityNameStrings('reference', 'references');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

         $this->crud->addColumns([
            ['name' => 'name', 'label' => 'Name'],
            ['name' => 'phone', 'label' => 'Phone No.'],
            ['name' => 'email', 'label' => 'E-mail Address'],
            ['name' => 'code', 'label' => 'Reference code'],
            ['name' => 'points', 'label' => 'Points']
        ]);

        $this->crud->addFields([
            
            ['name' => 'name', 'label' => 'Name  <span style="color: red;">*</span>'],

            ['name' => 'phone', 'label' => 'Phone No.  <span style="color: red;">*</span>'],
            
            ['name' => 'email', 'label' => 'E-mail Address  <span style="color: red;">*</span>'],

            ['name' => 'code', 'label' => 'Referral Code  <span style="color: red;">*</span>'],

            ['name' => 'valid_from', 'label' => 'Valid From  <span style="color: red;">*</span>', 'type' => 'date_picker'],

            ['name' => 'valid_through', 'label' => 'Valid Uptil  <span style="color: red;">*</span>', 'type' => 'date_picker'],


        ]);

        

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry

        sendSMS($this->crud->entry->phone, 'Register on Droghers and use my referral code ' . $this->crud->entry->code . ' to get 10% off on your first booking.');

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

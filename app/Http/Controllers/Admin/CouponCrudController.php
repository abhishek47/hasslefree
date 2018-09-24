<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CouponRequest as StoreRequest;
use App\Http\Requests\CouponRequest as UpdateRequest;

class CouponCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Coupon');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/coupons');
        $this->crud->setEntityNameStrings('coupon', 'coupons');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

         $this->crud->addColumns([
            ['name' => 'code', 'label' => 'Coupon Code'],
            ['name' => 'discount_type_text', 'label' => 'Discount Type'],
            ['name' => 'discount', 'label' => 'Discount (Rs.)'],
        ]);

        $this->crud->addFields([

            ['name' => 'code', 'label' => 'Coupon Code  <span style="color: red;">*</span>'],

            ['name' => 'promo_text', 'label' => 'Promo Text (optional)', 'type' => 'textarea'],

            [ // select_from_array
                'name' => 'discount_type',
                'label' => 'Flat or Percentage? <span style="color: red;">*</span>',
                'type' => 'select2_from_array',
                'options' => [0 => 'Flat Discount', 1 => 'Percentage Base', 2 => 'Direct Amount'],
                'allows_null' => false,
                'default' => 0,
            ],

            ['name' => 'discount', 'label' => 'Discount  <span style="color: red;">*</span>', 'type' => 'number', 'attributes' => ["min" => 1]],

            ['name' => 'min_order', 'label' => 'Min Order Amount <span style="color: red;">*</span>', 'type' => 'number', 'attributes' => ["min" => 1]],

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

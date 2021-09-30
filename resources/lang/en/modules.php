<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for modules for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'comman' => array(
    	'buttons' => array(
    		'submit' => 'Submit',
    		'login' => 'Login',
    		'edit' => 'Edit',
    		'update' => 'Update',
    		'delete' => 'Delete',
    		'view' => 'View'
    	),
    	'field_names' => array(
    		'product_name' => 'Product Name',
    		'product_price' => 'Product Price',
    		'category' => 'Category',
    		'product_description' => 'Product Description',
    	),
    	'field_placeholders' => array(
    		'product_name' => 'Product Name',
    		'product_price' => 'Product Price',
    		'category' => 'Select Category',
    		'product_description' => 'Product Description',
    	),
    	'column_names' => array(
    		'id' => '#',
    		'product_name' => 'Product Name',
    		'product_price' => 'Product Price',
    		'product_description' => 'Product Description',
    		'category' => 'Category',
    		'actions' => 'Actions',
    	),
    	'messages' => array(
    		'no_data' => 'No data found',
    		'not_found' => 'Page not found',
    		'success' => array(
    			'store' => 'Record inserted successfully',
				'update' => 'Record updated successfully',
				'delete' => 'Record deleted successfully'
    		),
    		'error' => array(
    			'not_found' => 'Record could not be found',
    			'store' => 'Record could not be inserted',
    			'update' => 'Record could not be updated',
    			'delete' => 'Record could not be deleted'
    		)
    	)
    ),
    'login' => array(
    	'title' => 'Login',    	
    ),
    'category' => array(
    	'title' => 'Categories',
    	'menu' => array(
    		'add' => 'Add Category',
    		'edit' => 'Edit Category',    		
    		'view' => 'All Categories',
    	)
    ),
    'product' => array(
    	'title' => 'Products',
    	'menu' => array(
    		'add' => 'Add Product',
    		'update' => 'Update Product',
    		'view' => 'All Products',
    		'show' => 'Product Details',
    	),
    	'buttons' => array(
    		'new' => 'New'
    	)
    )
];

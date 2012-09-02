<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Ecommerce Project Administration',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),
	// application components
	'components'=>array(
		'image'=>array(
				'class'=>'application.extensions.image.CImageComponent',
				'driver'=>'GD',	
			),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
    		'caseSensitive'=>false,  
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=funwork_yep',
			'emulatePrepare' => true,
			'username' => 'funwork_rkc',
			'password' => 'linkplus!@#',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				/* array(
					'class'=>'CWebLogRoute',
				), */
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
			'adminEmail'=>'ramkrishna.chaulagain@arhant.com',
			'notifyAdminEmail' => 'ramkrishna.chaulagain@arhant.com',//'rkcbabu@gmail.com',
			'debug' => false,
			'useWithYum' => false,
			
			'categoryTable' => 'yc_category',
			'productsTable' => 'yc_products',
			'orderTable' => 'yc_order',
			'orderPositionTable' => 'yc_order_position',
			'customerTable' => 'yc_customer',
			'addressTable' => 'yc_address',
			'imageTable' => 'yc_image',
			'shippingMethodTable' => 'yc_shipping_method',
			'paymentMethodTable' => 'yc_payment_method',
			'taxTable' => 'yc_tax',
			'productSpecificationTable' => 'yc_product_specification',
			'productVariationTable' => 'yc_product_variation',
	
			'currencySymbol' => '$',
			'logoPath' => 'logo.jpg',
			'slipView' => '/order/slip',
			'invoiceView' => '/order/invoice',
			'footerView' => '/order/footer',
			'dateFormat' => 'd/m/Y',
			'imageWidthThumb' => 100,
			'imageWidth' => 200,
			'termsView' => '/order/terms',
			'successAction' => array('/order/success'),
			'failureAction' => array('/order/failure'),
			'loginUrl' => array('/site/login'),
			'productImagesFolder' => 'productimages',
			'layout' => 'application.views.layouts.column2',
	),	
	
);
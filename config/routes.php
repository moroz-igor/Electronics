<?php
return array(
		'product/([0-9]+)' => 'product/view/$1',                        // actionView in ProductController
		'search/([0-9]+)' => 'product/search/$1', 					    // actionSearch in ProductController
		'sectionproduct1/([0-9]+)' => 'product/sectionproduct/$1',      //actionSectionproduct in ProductController
		'catalog' => 'catalog/index',
		'category/([0-9]+)' => 'catalog/category/$1', 					 // actionCategory in CatalogController
		'section1' => 'section/section',              					 // actionSection in SectionController
		'section/([0-9]+)' => 'section/category/$1',  					 // actionCategory in SectionController
		'section2' => 'section2/section',             					 // actionSection in Section2Controller
		'brand/([0-9]+)/([0-9]+)/([\w])' => 'catalog/brand/$1/$2/$3',    // actionBrand in CatalogController
		'brand_s1/([0-9]+)/([0-9]+)/([\w])' => 'section/brand/$1/$2/$3', // actionBrand in SectionController


		'cart/checkout' => 'cart/checkout',                             // actionAdd в CartController
		'cart/delete/([0-9]+)' => 'cart/delete/$1',                     // actionDelete в CartController
		'cart/clearAll' => 'cart/clearAll',                             // actionClearAll в CartController
		'cart/add/([0-9]+)' => 'cart/add/$1',                           // actionAdd в CartController
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',                   // actionAddAjax в CartController
		'cart/changeCart/([0-9]+)' => 'cart/changeCart/$1',             // actionChangeCart в CartController
		'cart' => 'cart/index', 					  					// actionIndex в CartController
		'/cart/recount' => '/cart/recount',                             // actionRecount в CartController
        // User
		'cabinet' => 'cabinet/index',                 					// actionIndex в CabinetController
		'edit' => 'cabinet/edit',
		'user/register' => 'user/register',
		'user/login' => 'user/login',
		'user/logout' => 'user/logout',

		'contacts' => 'site/contact',
		// Управление товарами:
	    'admin/product/create' => 'adminProduct/create',
	    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
	    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
	    'admin/product' => 'adminProduct/index',
	    // Управление категориями:
	    'admin/category/create' => 'adminCategory/create',
	    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
	    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
	    'admin/category' => 'adminCategory/index',
	    // Управление заказами:
	    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
	    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
	    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
	    'admin/order' => 'adminOrder/index',

		// Админпанель:
		'admin' => 'admin/index',

		'' => 'site/index',             // если после localhost пусто вызывать 'site/index


	);

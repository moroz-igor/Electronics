<?php
return array(
		'product/([0-9]+)' => 'product/view/$1',
		'sectionproduct1/([0-9]+)' => 'product/sectionproduct/$1',  //actionSectionproduct in ProductController
		'catalog' => 'catalog/computers',
		'section1' => 'section/section',              					// actionSection in Section1Controller
		'section2' => 'section2/section',             					// actionSection in Section2Controller
		'category/([0-9]+)' => 'catalog/category/$1', 					// actionCategory in CatalogController
		'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',  // actionCategory в CatalogController
		'section/([0-9]+)' => 'section/category/$1',  					// actionCategory in SectionController

		'cart/add/([0-9]+)' => 'cart/add/$1',                           // actionAdd в CartController
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',                   // actionAddAjax в CartController
		'cart' => 'cart/index', 					  					// actionIndex в CartController

		'cabinet' => 'cabinet/index',                 					// actionIndex в CabinetController
		'edit' => 'cabinet/edit',

		'user/register' => 'user/register',
		'user/login' => 'user/login',
		'user/logout' => 'user/logout',

		'contacts' => 'site/contact',

		'' => 'site/index',                           					// если после localhost пусто вызывать 'site/index
	);

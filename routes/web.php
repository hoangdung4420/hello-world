<?php
Route::pattern('id','([0-9]*)');
Route::pattern('number','([0-9]*)');
Route::pattern('name','(.*)');

$name="admin";
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Auth'], function(){
	Route::get('login', [
		'uses' => 'AuthController@getLogin',
		'as' => 'auth.login'
	]);

	Route::post('login', [
		'uses' => 'AuthController@postLogin',
		'as' => 'login'
	]);

	Route::get('logout', [
			'uses' => 'AuthController@logout',
			'as' => 'logout'
		]);

	Route::get('register', [
		'uses' => 'AuthController@getRegister',
		'as' => 'auth.register'
	]);
	Route::post('register', [
		'uses' => 'AuthController@postRegister',
		'as' => 'auth.register'
	]);
});

Route::group(['namespace'=>'Plus'], function(){
	Route::post('ajax-distric', [
		'uses' => 'PlusController@ajaxDistrict',
		'as' => 'plus.ajaxdistric'
	]);
	
});

Route::group(['namespace'=>'Job'], function (){
	Route::get('/', [
		'uses' => 'PagesController@index',
		'as' => 'jobs.index'
	]);

	Route::get('search', function () {
	    return view('jobs.search');
	});

	Route::get('contact', function () {
	    return view('jobs.contact');
	});

	Route::get('company', function () {
	    return view('jobs.company');
	});

	Route::get('detail_job', function () {
	    return view('jobs.detail_job');
	});

	Route::get('detail_company', function () {
	    return view('jobs.detail_company');
	});
});
Route::group(['prefix'=>'williamsheakpear', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
	Route::get('img', [
		'uses' => 'CkfinderController@ckfinder_view',
		'as' => 'admin.ckfinder.ckfinder_view'
	]);
});

Route::group(['prefix'=>$name, 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
	Route::get('/', [
		'uses' => 'IndexController@index',
		'as' => 'admin.index.index'
	]);

	Route::group(['prefix'=>'about'], function (){
		Route::get('/', [
			'uses' => 'AboutController@index',
			'as' => 'admin.about.index'
			]);
		Route::post('edit', [
			'uses' => 'AboutController@postEdit',
			'as' => 'admin.about.edit'
			]);
	
	});

	Route::group(['prefix'=>'category'], function(){
		Route::get('/', [
			'uses' => 'CategoryController@index',
			'as' => 'admin.category.index'
			]);
		Route::post('add', [
			'uses' => 'CategoryController@postAdd',
			'as' => 'admin.category.add'
			]);
		Route::get('del/{id}', [
			'uses' => 'CategoryController@del',
			'as' => 'admin.category.del'
			]);
		Route::get('add/{id}', [
			'uses' => 'CategoryController@getEdit',
			'as' => 'admin.category.edit'
			]);
		Route::post('add/{id}', [
			'uses' => 'CategoryController@postEdit',
			'as' => 'admin.category.edit'
			]);
		
	});
	
	Route::group(['prefix'=>'job'], function (){
		Route::get('/', [
			'uses' => 'JobController@index',
			'as' => 'admin.job.index'
		]);

		Route::get('add', [
			'uses' => 'JobController@getAdd',
			'as' => 'admin.job.add'
		]);

		Route::post('add', [
			'uses' => 'JobController@postAdd',
			'as' => 'admin.job.add'
		]);

		Route::get('edit/{id}', [
			'uses' => 'JobController@getAdd',
			'as' => 'admin.job.edit'
		]);

		Route::post('edit/{id}', [
			'uses' => 'JobController@postAdd',
			'as' => 'admin.job.edit'
		]);

		Route::get('cv',function () {
		    return view('admin.job.cv');
		});

	
	});

	Route::group(['prefix'=>'company'], function (){
		Route::get('/', [
			'uses' => 'CompanyController@index',
			'as' => 'admin.company.index'
		]);

		Route::get('edit/{id}', [
			'uses' => 'CompanyController@getEdit',
			'as' => 'admin.company.edit'
		]);

		Route::post('edit/{id}', [
			'uses' => 'CompanyController@postEdit',
			'as' => 'admin.company.edit'
		]);

		Route::post('add_cat_company', [
			'uses' => 'ListCategoryController@addCat',
			'as' => 'admin.company.addcat'
		]);

		Route::post('del_cat_company', [
			'uses' => 'ListCategoryController@delCat',
			'as' => 'admin.company.delcat'
		]);
	});

	Route::group(['prefix'=>'listcategory'], function (){
		Route::post('add_cat', [
			'uses' => 'ListCategoryController@addCat',
			'as' => 'admin.listcategory.addcat'
		]);

		Route::post('del_cat', [
			'uses' => 'ListCategoryController@delCat',
			'as' => 'admin.listcategory.delcat'
		]);
	});

	Route::group(['prefix'=>'candidate'], function (){
		Route::get('/', [
			'uses' => 'CandidateController@index',
			'as' => 'admin.candidate.index'
		]);

		Route::get('edit/{id}', [
			'uses' => 'CandidateController@getEdit',
			'as' => 'admin.candidate.edit'
		]);

		Route::get('view/{id}', [
			'uses' => 'CandidateController@getView',
			'as' => 'admin.candidate.view'
		]);

		Route::post('edit/{id}', [
			'uses' => 'CandidateController@postEdit',
			'as' => 'admin.candidate.edit'
		]);

	/*	Route::post('add_cat', [
			'uses' => 'CandidateController@addCat',
			'as' => 'admin.candidate.addcat'
		]);

		Route::post('del_cat', [
			'uses' => 'CandidateController@delCat',
			'as' => 'admin.candidate.delcat'
		]);
	*/
	});

	Route::group(['prefix'=>'user'], function (){
		Route::get('/', [
			'uses' => 'UserController@index',
			'as' => 'admin.user.index'
		]);

		Route::get('add', [
			'uses' => 'UserController@getAdd',
			'as' => 'admin.user.add'
		]);

		Route::post('add', [
			'uses' => 'UserController@postAdd',
			'as' => 'admin.user.add'
		]);

		Route::get('edit/{id}', [
			'uses' => 'UserController@getEdit',
			'as' => 'admin.user.edit'
		]);

		Route::post('edit/{id}', [
			'uses' => 'UserController@postEdit',
			'as' => 'admin.user.edit'
		]);
		Route::get('del/{id}', [
			'uses' => 'UserController@del',
			'as' => 'admin.user.del'
		]);
	
	});

	Route::group(['prefix'=>'lien-he'], function (){
		Route::get('/',function () {
		    return view('admin.contact.index');
		});

	
	});

	Route::group(['prefix'=>'binh-luan'], function (){
		Route::get('/',function () {
		    return view('admin.comment.index');
		});

	
	});

	Route::group(['prefix'=>'adv'], function (){
		Route::get('/', [
			'uses' => 'AdvController@index',
			'as' => 'admin.adv.index'
			]);
		Route::get('arrange/{id}', [
			'uses' => 'AdvController@getArrange',
			'as' => 'admin.adv.arrange'
			]);

		Route::get('add', [
			'uses' => 'AdvController@getAdd',
			'as' => 'admin.adv.add'
			]);

		Route::post('add', [
			'uses' => 'AdvController@postAdd',
			'as' => 'admin.adv.add'
			]);
		Route::get('edit/{id}', [
			'uses' => 'AdvController@getEdit',
			'as' => 'admin.adv.edit'
			]);
		Route::post('edit/{id}', [
			'uses' => 'AdvController@postEdit',
			'as' => 'admin.adv.edit'
			]);
		Route::get('del/{id}', [
			'uses' => 'AdvController@del',
			'as' => 'admin.adv.del'
			]);
	});
});

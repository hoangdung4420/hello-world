<?php
 
Route::pattern('id','([0-9]*)');
Route::pattern('status','([0-9]*)');
Route::pattern('number','([0-9]*)');
Route::pattern('name','(.*)');
$name ="admin";
session_start();
if(isset($_SESSION['level']) ){
	if($_SESSION['level'] == 3){
		$name = "congty";
	}elseif($_SESSION['level'] == 4){
		$name = "ungvien";
	}
}

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
	Route::get('signup', [
		'uses' => 'AuthController@ajaxSignup',
		'as' => 'auth.signup'
	]);
	Route::get('logina', [
		'uses' => 'AuthController@ajaxLogin',
		'as' => 'auth.ajaxlogin'
	]);

	Route::post('logincandiate', [
		'uses' => 'AuthController@postLoginCandidate',
		'as' => 'logincandiate'
	]);

	Route::get('companylogin', [ 
			'uses' => 'AuthController@companyLogin',
			'as' => 'auth.companylogin'
		]);

	Route::get('login', [
			'uses' => 'AuthController@getLogin',
			'as' => 'login'
		]);

	Route::post('loginn', [
		'uses' => 'AuthController@postLogin',
		'as' => 'loginn'
	]);

	Route::get('logout', [
			'uses' => 'AuthController@logout',
			'as' => 'logout'
		]);
	
	Route::post('sigupcandidate', [
		'uses' => 'AuthController@postSignupCandidate',
		'as' => 'auth.sigupcandidate'
	]);
	Route::post('signupCom', [
		'uses' => 'AuthController@signupCom',
		'as' => 'auth.signupcom'
	]);
});

Route::group(['namespace'=>'Plus'], function(){
	Route::post('ajax-distric', [
		'uses' => 'PlusController@ajaxDistrict',
		'as' => 'plus.ajaxdistric'
	]);

	Route::post('addlike', [
		'uses' => 'PlusController@addLike',
		'as' => 'admin.addlike'
	])->middleware('limit:1|2|3|4');

	Route::post('adddislike', [
		'uses' => 'PlusController@addDisLike',
		'as' => 'admin.adddislike'
	])->middleware('limit:1|2|3|4');
	
	Route::post('changefollow',[
		'uses' => 'PlusController@changeFollow',
		'as' => 'plus.changefollow'
	]);

	Route::get('autocompleteprovince',[
		'uses' => 'PlusController@autocompleteProvince',
		'as' => 'plus.autocompleteprovince'
	]);
	Route::get('autocompletecategory',[
		'uses' => 'PlusController@autocompleteCategory',
		'as' => 'plus.autocompletecategory'
	]);
});

Route::group(['namespace'=>'Job'], function (){
	Route::get('/', [
		'uses' => 'PagesController@index',
		'as' => 'jobs.index'
	]);

	Route::get('job-province/{id}', [
		'uses' => 'PagesController@getJobProvince',
		'as' => 'jobs.jobprovince'
	]);
	Route::get('searchjob', [
		'uses' => 'PagesController@searchJob',
		'as' => 'jobs.searchjob'
	]);
	Route::get('searchcompany', [
		'uses' => 'PagesController@searchCompany',
		'as' => 'jobs.searchcompany'
	]);
	
	Route::get('job', [
		'uses' => 'PagesController@getJob',
		'as' => 'jobs.job'
	]);

	Route::get('{name}-{id}-nn', [
		'uses' => 'PagesController@getJobCat',
		'as' => 'jobs.jobcat'
	]);

	Route::get('contact', [
		'uses' => 'PagesController@getContact',
		'as' => 'jobs.contact'
	]);

	Route::post('contact', [
		'uses' => 'PagesController@postContact',
		'as' => 'jobs.contact'
	]);
	Route::post('contactcheckmember', [
			'uses' => 'PagesController@postContactCheckMemBer',
			'as' => 'jobs.contactcheckmember'
		]);

	Route::get('company', [
		'uses' => 'PagesController@getCompany',
		'as' => 'jobs.company'
	]);

	Route::get('{name}-{id}-cv', [
		'uses' => 'PagesController@getDetailJob',
		'as' => 'jobs.detail_job'
	]);

	Route::get('{name}-{id}-ct', [
		'uses' => 'PagesController@getDetailCompany',
		'as' => 'jobs.detail_company'
	]);

	Route::post('gui-cmt', [
		'uses' => 'PagesController@sendCmt',
		'as' => 'jobs.sendcmt'
	]);

	Route::post('rep-cmt', [
		'uses' => 'PagesController@repCmt',
		'as' => 'jobs.repcmt'
	]);

	Route::post('rep-cmt', [
		'uses' => 'PagesController@repCmt',
		'as' => 'jobs.repcmt'
	]);

	Route::post('sendcv/{id}', [
		'uses' => 'PagesController@sendCV',
		'as' => 'jobs.sendcv'
	])->middleware('limit:4');
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
	])->middleware('limit:1');

	Route::group(['prefix'=>'about','middleware' => 'limit:1|2'], function (){
		Route::get('/', [
			'uses' => 'AboutController@index',
			'as' => 'admin.about.index'
			]);
		Route::get('edit/{id}', [
			'uses' => 'AboutController@getEdit',
			'as' => 'admin.about.edit'
			])->middleware('limit:1');
		Route::post('edit/{id}', [
			'uses' => 'AboutController@postEdit',
			'as' => 'admin.about.edit'
			])->middleware('limit:1');
	
	});

	Route::group(['prefix'=>'category','middleware' => 'limit:1|2'], function(){
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
			])->middleware('limit:1');
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

		Route::get('search-job', [
			'uses' => 'JobController@searchJob',
			'as' => 'admin.job.searchjob'
		]);

		Route::get('jobofcom/{id}', [
			'uses' => 'JobController@jobOfCompany',
			'as' => 'admin.job.jobofcompany'
		]);

		Route::get('like/{id}', [
			'uses' => 'JobController@indexLike',
			'as' => 'admin.job.likejob'
		]);

		Route::get('dislike/{id}', [
			'uses' => 'JobController@indexDisLike',
			'as' => 'admin.job.dislikejob'
		]);

		Route::get('hadsendcv/{id}', [
			'uses' => 'JobController@hadSendCv',
			'as' => 'admin.job.hadsendcv'
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
			'uses' => 'JobController@getEdit',
			'as' => 'admin.job.edit'
		]);

		Route::post('edit/{id}', [
			'uses' => 'JobController@postEdit',
			'as' => 'admin.job.edit'
		]);

		Route::get('del/{id}', [
			'uses' => 'JobController@del',
			'as' => 'admin.job.del'
		])->middleware('limit:1|3');

		Route::get('cv/{id}', [
			'uses' => 'ListJobController@getCV',
			'as' => 'admin.job.cv'
		])->middleware('limit:1|3');

		Route::post('sendmanymail/{id}', [
			'uses' => 'ListJobController@sendManyMail',
			'as' => 'admin.job.sendmanymail'
		]);

		Route::get('selectCV/{id}/{status}', [
			'uses' => 'ListJobController@selectCV',
			'as' => 'admin.job.selectcv'
		]);
		Route::get('assess/{id}', [
			'uses' => 'ListJobController@getAssess',
			'as' => 'admin.job.assesscv'
		]);
		Route::post('assess/{id}', [
			'uses' => 'ListJobController@postAssess',
			'as' => 'admin.job.assesscv'
		]);
	});
	 
	Route::group(['prefix'=>'company'], function (){
		Route::get('/', [
			'uses' => 'CompanyController@index',
			'as' => 'admin.company.index'
		]);

		Route::get('search-company', [
			'uses' => 'CompanyController@searchcompany',
			'as' => 'admin.company.searchcompany'
		]);

		Route::get('edit/{id}', [
			'uses' => 'CompanyController@getEdit',
			'as' => 'admin.company.edit'
		])->middleware('limit:1|2|3');

		Route::post('edit/{id}', [
			'uses' => 'CompanyController@postEdit',
			'as' => 'admin.company.edit'
		])->middleware('limit:1|2|3');

		Route::post('add_cat_company', [
			'uses' => 'ListCategoryController@addCat',
			'as' => 'admin.company.addcat'
		])->middleware('limit:1|2|3');

		Route::post('del_cat_company', [
			'uses' => 'ListCategoryController@delCat',
			'as' => 'admin.company.delcat'
		])->middleware('limit:1|2|3');
		Route::get('del-follow/{id}',[
			'uses' => 'CompanyController@delFollow',
			'as' => 'admin.company.delfollow'
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

		Route::get('search-candidate', [
			'uses' => 'CandidateController@searchCandidate',
			'as' => 'admin.candidate.searchcandidate'
		]);

		Route::get('edit/{id}', [
			'uses' => 'CandidateController@getEdit',
			'as' => 'admin.candidate.edit'
		])->middleware('limit:1|2|4');

		Route::get('view/{id}', [
			'uses' => 'CandidateController@getView',
			'as' => 'admin.candidate.view'
		]);

		Route::post('edit/{id}', [
			'uses' => 'CandidateController@postEdit',
			'as' => 'admin.candidate.edit'
		])->middleware('limit:1|2|4');
	});

	Route::group(['prefix'=>'user'], function (){
		Route::get('/', [
			'uses' => 'UserController@index',
			'as' => 'admin.user.index'
		])->middleware('limit:1');

		Route::get('add', [
			'uses' => 'UserController@getAdd',
			'as' => 'admin.user.add'
		])->middleware('limit:1');

		Route::post('add', [
			'uses' => 'UserController@postAdd',
			'as' => 'admin.user.add'
		])->middleware('limit:1');

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
		])->middleware('limit:1');
	
	});

	Route::group(['prefix'=>'contact'], function (){
		Route::get('/', [
			'uses' => 'ContactController@index',
			'as' => 'admin.contact.index'
		]);
		Route::get('send', [
			'uses' => 'ContactController@indexSend',
			'as' => 'admin.contact.send'
		]);
		Route::get('other', [
			'uses' => 'ContactController@indexOther',
			'as' => 'admin.contact.indexother'
		])->middleware('limit:1|2');
		Route::get('del/{id}', [
			'uses' => 'ContactController@del',
			'as' => 'admin.contact.del'
		])->middleware('limit:1');
		Route::post('repcontact/{id}', [
			'uses' => 'ContactController@repContact',
			'as' => 'admin.contact.repcontact'
		]);
	});

	Route::group(['prefix'=>'comment'], function (){
		Route::get('/', [
			'uses' => 'CommentController@index',
			'as' => 'admin.comment.index'
		]);
		Route::get('rep/{id}', [
			'uses' => 'CommentController@getRep',
			'as' => 'admin.comment.rep'
		]);
		Route::post('rep/{id}', [
			'uses' => 'CommentController@postRep',
			'as' => 'admin.comment.rep'
		]);
		Route::post('delmany', [
			'uses' => 'CommentController@delmany',
			'as' => 'admin.comment.delmany'
		])->middleware('limit:1');
	});

	Route::group(['prefix'=>'adv','middleware' => 'limit:1|2'], function (){
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
			])->middleware('limit:1');
	});
});

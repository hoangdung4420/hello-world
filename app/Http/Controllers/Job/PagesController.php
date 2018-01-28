<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactAddRequest;
use Illuminate\Support\Facades\Hash; 
use App\User;
use App\Company;
use App\Job;
use App\Position;
use App\Category;
use App\Contact; 
use App\Comment;
use App\Like;
use App\Time;
use App\File;
use App\Follow;
use App\ListJob;
use App\Province;
use App\District;
use Auth;
class PagesController extends Controller
{
    public  function __construct(Like $mLike)
    {
        $this->mLike = $mLike;
    }
    public function index()
    {
    	$title = "Trang chủ";
    	$arCompanies = Company::join('users','user_id','id')->where('feature',1)->where('level_id',3)->select('id','fullname','picture')->limit(10)->get();
    	$arJobs = Job::join('users','user_id','id')->where('feature',1)->select('id_job','title','fullname','picture')->get();
    	//công việc lương cao
    	return view ('jobs.index',['title'=>$title, 'arCompanies'=>$arCompanies, 'arJobs' => $arJobs]);
    }
    public function getJobProvince($id = 0)
    {
        $oItem = Province::findOrFail($id);
        $province = $oItem->name;
        $title = 'Công việc ở '.$oItem->type.$province;
        $arItems = Job::join('users','user_id','id')->where('jobs.address','LIKE','%'.$province.'%')->select('jobs.*','fullname','picture')->orderBy('expired','DESC');

        $sum = $arItems->count();
        $arItems = $arItems->paginate(getenv('ADMIN_ROWS'));
        return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }
    public function getJobCat($name, $id)
    {
    	$oItem = Category::findOrFail($id);
    	$title = $oItem->name;
    	//ưu tiên: công việc kết thúc hôm nay, công việc đã hết hạn thì xếp sau
	 	$today = date('Y-m-d');
    	$arItems = Job::join('users','user_id','id')->where('job_categories',$id)->select('jobs.*','fullname','picture')->orderBy('expired','DESC');

    	$sum = $arItems->count();
    	$arItems = $arItems->paginate(getenv('ADMIN_ROWS'));
    	return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }

    public function getJob()
    {
    	$title = "Tìm kiếm";
    	//$today = date('Y-m-d');
    	$arItems = Job::join('users','user_id','id')->select('jobs.*','fullname','picture');
    	$sum = $arItems->count();
    	$arItems = $arItems->orderBy('expired','DESC')->paginate(getenv('ADMIN_ROWS'));

    	return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ]);
    }

    public function searchJob(Request $request)
    {
        $title = "Tìm kiếm";
        $arItems = Job::join('users','user_id','id')->select('jobs.*','fullname','picture')->orderBy('expired','DESC');

        //title
        $key['name'] = $request->name;
        if($key['name'] != ''){
           $arItems = $arItems->where('title','like','%'.$key['name'].'%');
        }
        //categories_job
        $key['category'] = $request->category;
        $catItem = Category::where('name',$key['category'])->where('parent_id','!=',0)->get();
        if(count($catItem) == 1){
            $category = $catItem[0]->id_jobcat;
        }else{
            $category = '';
        }
        if($category != ''){
           $arItems = $arItems->where('job_categories',$category);
        }
        //address
        $arDistrict = null;
        $key['cities'] = $request->cities;
        if($key['cities'] != ''){
          $arItems = $arItems->where('jobs.address','like','%'.$key['cities'].'%');
          //lấy quận huyện thuộc tỉnh/thành phố
          $arDistrict = District::join('provinces','id_province','province_id')->where('provinces.name','like','%'.$key['cities'].'%')->select('districts.*')->get();
        }
        //$key['district']
        $key['district'] = $request->district;
        if($key['district'] != ''){
            //đưa quận/huyện tìm lên đầu
             $arItems = $arItems->where('jobs.address','like','%'.$key['district'].'%');
             foreach ($arDistrict as $k=> $value) {
                 if($value->name == $key['district']){
                    $tmp = $arDistrict[0];
                    $arDistrict[0] = $arDistrict[$k];
                    $arDistrict[$k] = $tmp;
                 }
             }
        }

        //salary
        $salary = $request->salary;
        $key['salary'] = $salary;

        if($salary == 'agree'){
            $arItems = $arItems->where('salary',0)->orderBy('salary','DESC');
        }else{
           if($salary !== null){
            $pos = strpos( $salary,'-');
            
            if($pos !== false){
                $salary = explode('-',$salary);
                $arItems = $arItems->where('salary','<=',(int)$salary[1])->where('salary','>=',(int)$salary[0])->orderBy('salary','DESC');
            }else{
                $salary = str_replace('than','',$salary);
                $arItems = $arItems->where('salary','>=',(int)$salary)->orderBy('salary','DESC');
            }
         } 
        }

        //position
         $key['position'] = $request->position;
        
        if($key['position'] != null){
          $arItems = $arItems->where('jobs.job_level',(int)$key['position']);
        }
       //time
       $key['time'] = $request->time;
        if($key['time'] != null){
          $arItems = $arItems->where('jobs.time_id',$key['time']);
        }

        //đếm số việc làm
        $sum = $arItems->count();
        
        $arItems = $arItems->paginate(getenv('ADMIN_ROWS'));

        return view ('jobs.search',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'key'=>$key, 'arDistrict'=>$arDistrict]);
    }

    public function getCompany()
    {
    	$title = "Công ty tham gia";
    	$arItems = Company::join('users','user_id','id');
    	$sum = $arItems->count();
    	$arItems = $arItems->paginate(12);
        if(Auth::check()){
           foreach ($arItems as $val) {
            $check = Follow::where('company_id',$val->user_id)->where('user_id',Auth::user()->id)->count();
            if($check == 1){
                $val->checkFollow = 1;
            }else{
                $val->checkFollow = 0;
            }
            } 
        }

        //lây 10 cong ty moi tham gia
        $arItemsTopNew = Company::join('users','user_id','id')->orderBy('id_company','DESC')->limit(6)->get();
        if(Auth::check()){
           foreach ($arItemsTopNew as $val) {
            $check = Follow::where('company_id',$val->user_id)->where('user_id',Auth::user()->id)->count();
            if($check == 1){
                $val->checkFollow = 1;
            }else{
                $val->checkFollow = 0;
            }
            } 
        }
    	return view ('jobs.company',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'arItemsTopNew'=>$arItemsTopNew]);
    }

    public function searchCompany(Request $request)
    {
        $title = "Công ty tham gia";
        $arItems = Company::join('users','user_id','id');
        
        //title
        $key['name'] = $request->name;
        if($key['name'] != ''){
           $arItems = $arItems->where('fullname','like','%'.$key['name'].'%');
        }
        //categories_job
        $key['category'] = $request->category;
       $catItem = Category::where('name',$key['category'])->where('parent_id','!=',0)->get();
        if(count($catItem) == 1){
            $category = $catItem[0]->id_jobcat;
        }else{
            $category = '';
        }
        if($category != ''){
           $arItems = $arItems->join('list_categories','id','list_categories.user_id')->where('jobcat_id',$category);
        }
        //address
        $arDistrict = null;
        $key['cities'] = $request->cities;
        if($key['cities'] != ''){
          $arItems = $arItems->where('users.address','like','%'.$key['cities'].'%');
        }
        $sum = $arItems->count();
        $arItems = $arItems->paginate(12);
        if(Auth::check()){
           foreach ($arItems as $val) {
            $check = Follow::where('company_id',$val->user_id)->where('user_id',Auth::user()->id)->count();
            if($check == 1){
                $val->checkFollow = 1;
            }else{
                $val->checkFollow = 0;
            }
            } 
        }
         //lây 10 cong ty moi tham gia
        $arItemsTopNew = Company::join('users','user_id','id')->orderBy('id_company','DESC')->limit(6)->get();
        if(Auth::check()){
           foreach ($arItemsTopNew as $val) {
            $check = Follow::where('company_id',$val->user_id)->where('user_id',Auth::user()->id)->count();
            if($check == 1){
                $val->checkFollow = 1;
            }else{
                $val->checkFollow = 0;
            }
            } 
        }
        return view ('jobs.company',['title'=>$title, 'arItems' => $arItems, 'sum' =>$sum ,'arItemsTopNew'=>$arItemsTopNew,'key'=>$key]);
    }

    public function getContact()
    {
    	$title = "Gửi liên hệ";
    	return view ('jobs.contact');
    }

    public function postContact(ContactAddRequest $request)
    {
    	$oItem = new Contact;
        $oItem->fullname = $request->fullname;
        $oItem->email = $request->email;
        $oItem->subject = $request->subject;
        $oItem->content = $request->content;
        $oItem->rep_id = 1;
        $oItem->status = 0;
        $oItem->parent_id = 0;
        $check = User::where('email',$request->email)->count();
        if($check == 1){
            $request->session()->put('lienhe',$oItem);
            $request->session()->flash('msg','Bạn đã là thành viên của chúng tôi, hãy nhập mật khẩu để xác nhận');
            return view('auth.checkpassword');
        }
        $result = $oItem->save();
        if($result){
            $request->session()->flash('msgS','Gửi thành công');
        }else{
            $request->session()->flash('msgW','Có lỗi khi gửi');
        }    
        return redirect()->back();
    }

    public function postContactCheckMemBer(Request $request)
    {
        $contact = $request->session()->get('lienhe');
        $obj = User::where('email',$contact->email)->get();
        if(count($obj) == 1){
            if (Hash::check($request->password, $obj[0]->password)) {
                $oItem = new Contact;
                $oItem = $contact;
                $oItem->fullname = $obj[0]->fullname;
                $result = $oItem->save();
                if($result){
                    $request->session()->flash('msgS','Gửi thành công');
                }else{
                    $request->session()->flash('msgW','Có lỗi khi gửi');
                }    
                return redirect()->route('jobs.contact');
            }else{
                $request->session()->flash('msg','Sai mật khẩu');
                 return view('auth.checkpassword');
            }
        }
        
    }

    public function getDetailJob($name, $id)
    {
    	$oItem = Job::join('users','user_id','id')->select('jobs.*','picture','fullname')->where('id_job',$id)->get();
        //tăng lượt xem-->dùng cookie
        $oItem[0]->reader++;
        $oItem[0]->save();

    	$title = $oItem[0]->title;
    	$job_level = Position::all();

		foreach ($job_level as $val) {
			if($oItem[0]->job_level == $val->id_joblevel){
				$oItem[0]->job_level = $val->name;
			}
		} 
        $time_id = Time::all();
        foreach ($time_id as $val) {
            if($oItem[0]->time_id == $val->id_time){
                $oItem[0]->time_id = $val->detail;
            }
        } 
		$job_categories = Category::all();
		foreach ($job_categories as $val) {
			if($oItem[0]->job_categories == $val->id_jobcat){
				$oItem[0]->job_categories_name = $val->name;
			}
		}
        $oItem[0]->like = $this->mLike->countJobLikes($id);
        $oItem[0]->dislike = $this->mLike->countJobDislikes($id);
		//lấy việc làm khác cùng công ty
        $arJobInCompany = Job::orderBy('id_job','DESC')->where('user_id',$oItem[0]->user_id)->where('id_job','!=',$id)->get();
		//lấy bình luận cho công việc này
         $arCmtParent = Comment::where('parent_id',0)->where('job_id',$id)->orderBy('id_comment','DESC')->get();
        $arCmtChild = Comment::where('parent_id','!=',0)->where('job_id',$id)->get();
		//lấy công việc tương tự
        $arJobSame = Job::join('users','user_id','id')->select('jobs.*','picture','fullname')->where('id_job','!=',$id)->where('job_categories',$oItem[0]->job_categories)->inRandomOrder()->limit(6)->get();
        //nếu ko đủ 6 thì thêm công việc đk tương tự thấp hơn
        //dd($arJobSame);
        //kiểm tra người đang đăng nhập có thích công việc này chưa
        $checkLike = 0;
        $checkDisLike = 0;

        if(Auth::check()){
            $checkLike = Like::where('oitem_id',$id)->where('user_id',Auth::user()->id)->where('status',1)->count();
            $checkDisLike = Like::where('oitem_id',$id)->where('user_id',Auth::user()->id)->where('status',0)->count();
        }
        //check đã gủi cv chưa
        $checksendCV = 0;
        if(Auth::check()){
             $checksendCV = ListJob::where('job_id',$id)->where('user_id',Auth::user()->id)->count();
        }
    	return view ('jobs.detail_job',['title'=>$title, 'oItem'=>$oItem[0], 'arCmtParent'=>$arCmtParent,'arCmtChild'=>$arCmtChild,'arJobInCompany'=>$arJobInCompany,'arJobSame'=>$arJobSame, 'checkLike'=>$checkLike, 'checkDisLike'=>$checkDisLike, 'checksendCV'=>$checksendCV]);
    }

    public function getDetailCompany($name, $id)
    {
    	$oItem = Company::join('users','user_id','id')->where('id',$id)->get();
        
    	$title = $oItem[0]->fullname;
    	$listJob = Job::join('users','user_id','id')->select('jobs.*')->where('id',$id)->orderBy('id_job','DESC')->get();
    	$job_level = Position::all();

    	foreach ($listJob as $value) {
    		foreach ($job_level as $val) {
    			if($value->job_level == $val->id_joblevel){
    				$value->job_level = $val->name;
    			}
    		} 
    	}
        //kiểm tra đã theo dõi công ty này chưa
        $checkFollow = 0;
        if(Auth::check()){
            $ar = Follow::where('user_id',Auth::user()->id)->where('company_id',$oItem[0]->user_id)->count();
            if($ar == 1){
                $checkFollow = 1;
            }
        }
        
       //tăng lượt xem-->dùng cookie
        $oItem[0]->reader++;
        $oItem[0]->save();

        //đếm số theo dõi
        $oItem[0]->follow = Follow::where('company_id',$oItem[0]->user_id)->count();
    	return view ('jobs.detail_company',['title' => $title, 'oItem' => $oItem[0], 'listJob' => $listJob , 'checkFollow' => $checkFollow]);
    }

    public function sendCmt(Request $request){

        $arData =$request->all();
        $cmt = new Comment;

        $cmt->fullname = $arData['ahoten'];
        $cmt->email = $arData['aemail'];
        $cmt->job_id = $arData['aid_job'];
        $cmt->parent_id = 0;
        $cmt->content = $arData['acontent'];
        $cmt->status = 0;
        $result = $cmt->save();
        if($result){
            $request->session()->flash('msg','Thêm thành công');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
        }
        
        return view('jobs.sendcmt',['cmt'=>$cmt]);
    }

    public function repCmt(Request $request){

        $arData =$request->all();
        $cmt = new Comment();
  
        $cmt->fullname = $arData['ahoten'];
        $cmt->email = $arData['aemail'];
        $cmt->job_id = $arData['aid_job'];
        $cmt->parent_id = $arData['aidReCmt'];
        $cmt->content = $arData['acontent'];
        $cmt->status = 0;
        $result = $cmt->save();

        $oItem=Comment::findOrFail($cmt->id_comment);
        if($result){
            $request->session()->flash('msg','Thêm thành công');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
        }
        return view('jobs.repcmt',['child'=>$oItem]);
    }

    public function sendCv($id, Request $request)
    {
        //kiểm tra ứng viên đã từng gửi hồ sơ cho công việc này chưa
        $check = ListJob::where('job_id',$id)->where('user_id',Auth::user()->id)->count();
        if($check != 0){
             $request->session()->flash('msgR','Bạn đã gửi hồ sơ cho công việc này trước đây');
            return redirect()->back();
        }
        //
        $phone = $request->phone;
        $user = User::findOrFail(Auth::user()->id);
        $user->phone = $phone;
        $user->save;
        $oItem = new ListJob;
        $oItem->job_id = $id;
        $oItem->user_id =  Auth::user()->id;
        $oItem->status = 0;
        $oItem->company_del = 0;
        $oItem->candidate_del = 0;
        $oItem->sendmail = 0;
        if($request->cv){
             //tải cv file lên
          $cv_file = $request->cv_file; 
           if($cv_file != ''){
            //dd($cv_file);
            $duoiFile = $cv_file->getClientOriginalExtension();
            if($duoiFile != 'pdf'){
               $request->session()->flash('msgR','File tải lên phải có định dạng là pdf');
               return redirect()->back();
            }else{
                if($cv_file->getSize() > getenv('MAX_FILE')*1024){
                    $request->session()->flash('msgR','Kích thước file phải bé hơn 250kb');
                     return redirect()->back();
                }
              $tmp = $request->file('cv_file')->store('cv');
              $arTmp = explode('/',$tmp);
              $cvName = end($arTmp);
              $oItem->cv_file = $cvName;
              //kiem tra ho sơ chưa có cv thì lưu nó luôn
              $file = File::where('user_id',Auth::user()->id)->get();
                if($file[0]->cv_file == ''){
                     $file[0]->cv_file = $cvName;
                     $file[0]->save();
                }
            }
           }else{
            $request->session()->flash('msgR','Bạn chưa chọn file');
               return redirect()->back();
           }
       }else{
            $file = File::where('user_id',Auth::user()->id)->get();
            if($file[0]->cv_file != ''){
                $oItem->cv_file = $file[0]->cv_file;
            }else{
                 $request->session()->flash('msgR','Trong hồ sơ của bạn chưa có cv');
                 return redirect()->back();
            }
       }
        $result = $oItem->save();
         if($result){
            $request->session()->flash('msgS','Gửi hồ sơ thành công');
            if($request->session()->has('ungtuyen')){
                $request->session()->forget('ungtuyen');
            }
        }else{
            $request->session()->flash('msgR','Có lỗi khi gửi hồ sơ');
        } 
        return redirect()->back();
    }


}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class CkfinderController extends Controller
{
   
    public function ckfinder_view(){
      return view('admin.ckfinder.ckfinder_view');
    }

   
}

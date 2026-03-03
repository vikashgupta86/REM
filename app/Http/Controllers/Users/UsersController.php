<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prop\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\User;
use App\Models\Prop\Saveprops;

class UsersController extends Controller
{
  public function allRequests()
  {

    $home_type = 'villa';
    $allrequests = UserRequest::where('user_id', Auth::id())->get();
    $propsByHomeType = Property::select()->where('home_type', $home_type)->get();
    $singleprop = Property::find(1);

    return view('users.allrequests', compact('allrequests', 'propsByHomeType', 'singleprop'));
  }


  public function allsaved()
  {
    $home_type = 'villa';
    $allsaved = Saveprops::where('user_id', Auth::id())->get();
    $propsByHomeType = Property::select()->where('home_type', $home_type)->get();
    $singleprop = Property::find(1);
    return view('users.allsaved', compact('allsaved', 'propsByHomeType', 'singleprop'));
  }
}

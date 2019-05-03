<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ServiceCat;
use Illuminate\Support\Facades\Auth;
use Validator;

class ServiceController extends Controller
{
public $successStatus = 200;

  /**
  * Register Service api
  *
  * @return \Illuminate\Http\Response
  */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $service = ServiceCat::create($input);
        $success['name'] =  $service->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }


}
?>

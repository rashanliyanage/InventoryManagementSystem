<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/3/2019
 * Time: 11:25 AM
 */

namespace App\Http\Controllers;
use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public function index(){
        $data = array();
        $data['usersList'] = User::all();
        return view('admin.users.index')->with($data);
    }

    public function create()
    {
        $data = array();
        $data['userRoles'] = Role::all();
        $data['branches'] =Branch::all();

        return view('admin.users.create')->with($data);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'role'      => 'required',
                'name'     => 'required|max:64',
                'email'     => 'required|email|max:255|unique:users',
                'password'  => 'required|min:6|confirmed',
                'status'    => 'required',
                'branch'    =>  'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $slug = $request->fname . ' ' . $request->lname;

            $createdUser =User::create([
                'role_id'   => $request->role,
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'status'    => $request->status,
                'branch_id'    => $request->branch
            ]);

//            $createdUser->notify(new CustomerNotification($request->name, $request->email, $request->subject, $request->message, $request->emailCopy));
            if($createdUser){
                $createdUser->sendWelcomeMessage(array('name'=>$request->name,'password'=>$request->password,'url'=>route('login')));
                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));
            }else{
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => array('Error! Please try again.')
                ));
            }

        }else{
            return redirect()->action('UsersController@create');
        }
    }

    public  function  edit($id){
        $data =array();
        $data['usersRoles'] = Role::all();
        $data['userInfo'] =User::find($id);
        $data['branches'] = Branch::all();

        return view('admin.users.edit')->with($data);
    }

    public  function  editSubmit(Request $request){


        if($request->ajax()){

            if($request->password != '' && $request->password_confirmation != ''){
                $valPass = 'min:6|';
            }else{
                $valPass = '';
            }

            $validator = Validator::make($request->all(), [
                'role'      => 'required',
                'name'     => 'required|max:64',
                'email'     => 'required|email|max:255|unique:users,email,'.$request->user_id,
                'password'  => $valPass.'confirmed',
                'status'    => 'required',
                'branch'    => 'required',
                'user_id'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $data = array(
                'role_id'   => $request->role,
                'branch_id'   => $request->branch,
                'name'     => $request->name,
                'email'     => $request->email,
                'status'    => $request->status,
            );

            if($request->password != '' && $request->password_confirmation != ''){
                $data['password'] = bcrypt($request->password);
            }

            if(User::find($request->user_id)->update($data)){
                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));
            }else{
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => array('Error! Please try again.')
                ));
            }

        }else{
            return redirect()->action('UsersController@edit');
        }
    }

    public function destroy(Request $request)
    {

        if($request->ajax()){
            if(User::destroy($request->user_id)){
                return response()->json(array(
                    'success' => true
                ));
            }
        }else{
            return redirect()->action('UsersController@index');
        }
    }
}
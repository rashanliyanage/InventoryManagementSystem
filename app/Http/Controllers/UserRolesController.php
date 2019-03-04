<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/2/2019
 * Time: 5:23 PM
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Validator;

class UserRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth_admin']);
    }

    public function index()
    {
        $data = array();
        $data['roleList'] = Role::all();
        return view('admin.roles.index')->with($data);
    }

    public function create(){
        return view('admin.roles.create');
    }


    public function createRole(Request $request)
    {


        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'role'   => 'required|max:64|unique:roles,role',
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $role       = new Role;
            $role->role = $request->role;
            $role->save();

            return response()->json(array(
                'success' => true,
                'alert'   => 'success',
                'message' => 'Record has been added successfully.'
            ));
        }else{
            return redirect()->action('UserRolesController@index');
        }
    }

    public function edit($id){
        $data =array();
        $data['roleInfo'] =Role::find($id);
        return view('admin.roles.edit')->with($data);

    }

    public function editRole(Request $request){

        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'role'   => 'required|max:64|unique:roles,role,'.$request['roleId'],
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $role       = Role::find($request['roleId']);
            $role->role = $request->role;
            $role->save();

            return response()->json(array(
                'success' => true,
                'alert'   => 'success',
                'message' => 'Record has been updated successfully.'
            ));
        }else{
            return redirect()->action('UserRolesController@edit');
        }
    }

    public function destroy(Request $request)
    {

        if($request->ajax()){
            if(Role::destroy($request['role_id'])){
                return response()->json(array(
                    'success' => true
                ));
            }
        }else{
            return redirect()->action('MenusController@index');
        }
    }

}
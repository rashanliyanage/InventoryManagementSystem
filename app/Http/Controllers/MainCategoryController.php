<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/12/2019
 * Time: 3:09 PM
 */

namespace App\Http\Controllers;
use App\MainCatagory;
use Validator;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public function index(){

        $data =array();
        $data['categoryInfo'] =MainCatagory::all();
        return view('admin.manageCategory.mainCategory.index')->with($data);
    }

    public function create(){

        return view('admin.manageCategory.mainCategory.create');
    }

    public function store(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'category'   => 'required|max:64|unique:maincategories,category',
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $category       = new MainCatagory();
            $category->category = $request->category;
            $category->save();

            return response()->json(array(
                'success' => true,
                'alert'   => 'success',
                'message' => 'Record has been added successfully.'
            ));
        }else{
            return redirect()->action('UserRolesController@index');
        }
    }

    public  function edit($id){
        $data =array();

        $data['categoryInfo'] = MainCatagory::find($id);

        return view('admin.manageCategory.mainCategory.edit')->with($data);

    }

    public  function editSubmit(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'category'   => 'required|max:64|unique:maincategories,category,'.$request['category'],
                'categoryId'=> 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $category       = MainCatagory::find($request['categoryId']);
            $category->category = $request->category;
            $category->save();

            return response()->json(array(
                'success' => true,
                'alert'   => 'success',
                'message' => 'Record has been updated successfully.'
            ));
        }else{
            return redirect()->action('UserRolesController@edit');
        }
    }

    public  function  destroy(Request $request){
        if($request->ajax()){
            if(MainCatagory::destroy($request['category_id'])){
                return response()->json(array(
                    'success' => true
                ));
            }
        }else{
            return redirect()->action('MainCategoryController@index');
        }
    }


}
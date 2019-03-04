<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/12/2019
 * Time: 7:14 PM
 */

namespace App\Http\Controllers;


use App\MainCatagory;
use App\SubCategory;
use Illuminate\Http\Request;
use Validator;
class SubCategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public function index(){
        $data = array();
        $data['subCategoryInfo'] = SubCategory::all();
        return view('admin.manageCategory.subCategory.index')->with($data);
    }

    public function create(){

      $data = array();
      $data['mainCategoryInfo'] =MainCatagory::all();
        return view('admin.manageCategory.subCategory.create')->with($data);
    }

    public  function store(Request $request){

        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'category'   => 'required|max:64|unique:subcategories,category',
                'main_category_id'   => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $category       = new SubCategory();
            $category->category = $request->category;
            $category->mainCategoryId = $request->main_category_id;
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

        $data['categoryInfo'] = SubCategory::find($id);

        $data['mainCategoryInfo'] =MainCatagory::all();

        return view('admin.manageCategory.subCategory.edit')->with($data);

    }

    public  function editSubmit(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'category'   => 'required',
                'categoryId'=> 'required',
                'main_category_id'=>'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            $category       = SubCategory::find($request['categoryId']);
            $category->category = $request->category;
            $category->mainCategoryId =$request->main_category_id;
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
            if(SubCategory::destroy($request['category_id'])){
                return response()->json(array(
                    'success' => true
                ));
            }
        }else{
            return redirect()->action('MainCategoryController@index');
        }
    }

}
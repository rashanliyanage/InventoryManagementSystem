<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/13/2019
 * Time: 9:32 AM
 */

namespace App;

namespace App\Http\Controllers;
use App\MainCatagory;
use Image;
use App\Item;
use App\SubCategory;
use Validator;
use Illuminate\Http\Request;

class ItemsController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth_admin',]);
    }

    public  function index(){
          $data['mainCategory'] =MainCatagory::all();
        return view('admin.items.index')->with($data);
    }

    public function create(){

        $data['plantsCategory'] = SubCategory::where('mainCategoryId',config('constant.mainCategory.Plants'))->get();
        $data['chemicalCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Chemicals'))->get();
        $data['accessoriesCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Accessories'))->get();
        $data['toolsCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Tools'))->get();

        return view('admin.items.create')->with($data);
    }

    public  function store(Request $request){


        $validator =null;
        if($request->ajax()){

            if($request->main_category_type == config('constant.mainCategory.Plants') || $request->main_category_type == config('constant.mainCategory.Chemicals')){

               $validator = Validator::make($request->all(), [
                    'common_name'   => 'required',
                     'bot_name'  =>'required',
                    'sub_category'=>'required',
                   'min_order_level'=>'required',
                   'item_image'=>'required|mimes:jpeg,png,jpg|max:2048'
                ]);


                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }



                $path =null;
                if($request->hasFile('item_image')){
                    $originalImage= $request->file('item_image');
                    $input['imagename'] =rand(10,10000).time().'.'.$originalImage->getClientOriginalName();
                    $img = Image::make($originalImage->getRealPath())->resize(800,400);
                    $destinationPath = public_path('/itemsImages');

                    $img->resize(800, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename'],90);

                    $path ='itemsImages/'.$input['imagename'];


                }

                $newItem = new Item();
                $newItem->sub_category_id =$request->sub_category;
                $newItem->name =$request->common_name;
                $newItem->bot_name =$request->bot_name;
                $newItem->min_order_level =$request->min_order_level;
                $newItem->img_path =$path;
                $newItem->save();



                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));

            }else{

                $validator = Validator::make($request->all(), [
                    'common_name'   => 'required',
                    'sub_category'=>'required',
                    'min_order_level'=>'required',
                    'item_image'=>'required|mimes:jpeg,png,jpg|max:2048'
                ]);

                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }

                $path =null;
                if($request->hasFile('item_image')){
                    $originalImage= $request->file('item_image');
                    $input['imagename'] =rand(10,10000).time().'.'.$originalImage->getClientOriginalName();
                    $img = Image::make($originalImage->getRealPath())->resize(800,400);
                    $destinationPath = public_path('/itemsImages');

                    $img->resize(800, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename'],90);

                    $path ='itemsImages/'.$input['imagename'];


                }

                $newItem = new Item();
                $newItem->sub_category_id =$request->sub_category;
                $newItem->name =$request->common_name;
                $newItem->bot_name =$request->bot_name;
                $newItem->min_order_level =$request->min_order_level;
                $newItem->img_path =$path;

                $newItem->save();

                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));

            }

        }else{
            return redirect()->action('UserRolesController@index');
        }
    }

    public  function manageItems(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'main_category'   => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }
            $data['subCategory'] =SubCategory::where('mainCategoryId',$request['main_category'])->get();
            return view('admin.items.sub_category_info')->with($data)->render();
        }else{
            return redirect()->action('UserRolesController@edit');
        }
    }

    public function getItems(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'main_category'   => 'required',
                'sub_category'    =>'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }

            if(isset($request['sub_category']) && $request['sub_category'] != null){

                $data['items'] =Item::where('sub_category_id',$request['sub_category'])->get();

                return view('admin.items.item_detail')->with($data)->render();
            }

            return response()->json(array(
                'success' => true,
                'alert'   => 'success',
                'message' => 'Successfully getting your records'

            ));
          
        }else{
            return redirect()->action('UserRolesController@edit');
        }  
    }

    public function edit($id){

         $data['item'] =Item::find($id);
         $data['subCategory'] =SubCategory::all();
         $data['mainCategory'] =MainCatagory::all();

         return view('admin.items.edit')->with($data);
    }

    public function editItemUbmit(Request $request){

        $validator =null;
        if($request->ajax()){

            if($request->main_category == config('constant.mainCategory.Plants') || $request->main_category == config('constant.mainCategory.Chemicals')){

                $validator = Validator::make($request->all(), [
                    'main_category'=>'required',
                    'item_id'=>'required',
                    'common_name'   => 'required',
                    'bot_name'  =>'required',
                    'sub_category'=>'required',
                    'min_order_level'=>'required',

                ]);


                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }



                $path =null;
                if($request->hasFile('item_image')){
                    $originalImage= $request->file('item_image');
                    $input['imagename'] =rand(10,10000).time().'.'.$originalImage->getClientOriginalName();
                    $img = Image::make($originalImage->getRealPath())->resize(800,400);
                    $destinationPath = public_path('/itemsImages');

                    $img->resize(800, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename'],90);

                    $path ='itemsImages/'.$input['imagename'];


                }

                $newItem = Item::find($request['item_id']);
                $newItem->sub_category_id =$request->sub_category;
                $newItem->name =$request->common_name;
                $newItem->bot_name =$request->bot_name;
                $newItem->min_order_level =$request->min_order_level;
                if(!is_null($path)){
                    $newItem->img_path =$path;
                }

                $newItem->save();



                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));

            }else{

                $validator = Validator::make($request->all(), [
                    'common_name'   => 'required',
                    'sub_category'=>'required',
                    'min_order_level'=>'required',
                    'main_category'=>'required',
                    'item_id'=>'required',
                    'bot_name'  =>'required',



                ]);

                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }

                $path =null;
                if($request->hasFile('item_image')){
                    $originalImage= $request->file('item_image');
                    $input['imagename'] =rand(10,10000).time().'.'.$originalImage->getClientOriginalName();
                    $img = Image::make($originalImage->getRealPath())->resize(800,400);
                    $destinationPath = public_path('/itemsImages');

                    $img->resize(800, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename'],90);

                    $path ='itemsImages/'.$input['imagename'];


                }

                $newItem = Item::find($request['item_id']);
                $newItem->sub_category_id =$request->sub_category;
                $newItem->name =$request->common_name;

                $newItem->min_order_level =$request->min_order_level;
                if(!is_null($path)){
                    $newItem->img_path =$path;
                }

                $newItem->save();



                return response()->json(array(
                    'success' => true,
                    'alert'   => 'success',
                    'message' => 'Record has been added successfully.'
                ));



            }

        }else{
            return redirect()->action('UserRolesController@index');
        }



    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 2/21/2019
 * Time: 6:51 PM
 */

namespace App\Http\Controllers;


use App\Branch;
use App\Girth;
use App\Height;
use App\Inventory;
use App\Item;
use App\MainCatagory;
use App\PotSize;
use App\SubCategory;
use App\UpdatePermission;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
class NewInventoryController extends Controller
{

    public function index(){

        $data['branches'] =Branch::where('id','<>',config('constant.branch.Head_Office'))->get();
        $data['plantsCategory'] = SubCategory::where('mainCategoryId',config('constant.mainCategory.Plants'))->get();
        $data['chemicalCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Chemicals'))->get();
        $data['accessoriesCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Accessories'))->get();
        $data['toolsCategory'] =SubCategory::where('mainCategoryId',config('constant.mainCategory.Tools'))->get();

        return view('admin.inventory.index')->with($data);

    }

    public function inventoryLogin(){
        return view('admin.inventory.permission.login');
    }

    public function createNewPermission(){
        return view('admin.inventory.permission.createPermission');
    }

    public function submitPermission(Request $request){
        Validator::make($request->all(), [
            'reason' => 'required',

        ])->validate();

        $inventory =   UpdatePermission::create([
            'reason'=>$request['reason'],
            'user_id'=>Auth::user()->id,


        ]);
    }

    public  function getFilters(Request $request){

        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'sub_category'   => 'required',
                'main_category_type'=>'required'
            ]);

            if ($validator->fails()) {
                return response()->json(array(
                    'success' => false,
                    'alert'   => 'danger',
                    'errors'  => $validator->errors()->toArray()
                ));
            }
            if($request['main_category_type']==config('constant.mainCategory.Plants') ){
                $data =array();
                  if($request['sub_category'] ==config('constant.subCategories.Shrubs') || $request['sub_category'] ==config('constant.subCategories.Ground_Cover')  ){

                        $data['heights'] =Height::all();
                        $data['potSizes'] =PotSize::all();
                        $data['branches'] =Branch::where('id','<>',config('constant.branch.Head_Office'))->get();
                        $data['items']   =Item::where('sub_category_id',$request['sub_category'])->get();
                        return view('admin.inventory.elements.plant_shrubs_stuff')->with($data)->render();

                  }else{

                      $data['heights'] =Height::all();
                      $data['potSizes'] =PotSize::all();
                      $data['girth'] =Girth::all();
                      $data['branches'] =Branch::where('id','<>',config('constant.branch.Head_Office'))->get();
                      $data['items']   =Item::where('sub_category_id',$request['sub_category'])->get();
                      return view('admin.inventory.elements.plant_common_stuff')->with($data)->render();
                  }
            }else if($request['main_category_type']==config('constant.mainCategory.Chemicals')){
                $data =array();
                $data['items']   =Item::where('sub_category_id',$request['sub_category'])->get();
                return view('admin.inventory.elements.chemical_stuff')->with($data)->render();
            }else if($request['main_category_type']==config('constant.mainCategory.Tools')){
                $data['items']   =Item::where('sub_category_id',$request['sub_category'])->get();
                return view('admin.inventory.elements.tools_stuff')->with($data)->render();
            }else if($request['main_category_type']==config('constant.mainCategory.Accessories')){
                $data['items']   =Item::where('sub_category_id',$request['sub_category'])->get();
                return view('admin.inventory.elements.accessories_stuff')->with($data)->render();
            }

        }else{
            return redirect()->action('UserRolesController@edit');
        }

    }

    public function findInventory(Request $request){


        if($request->ajax()){

            if($request['main_category_type']==config('constant.mainCategory.Plants') ){
                if($request['sub_category'] ==config('constant.subCategories.Shrubs') || $request['sub_category'] ==config('constant.subCategories.Ground_Cover')  ){
                        $validator = Validator::make($request->all(), [
                            'branch'=>'required',
                            'sub_category'=> 'required',
                            'select-item'=> 'required',
                            'height'=>'required',
                            'pot_size'=>'required',

                        ]);
                        if ($validator->fails()) {
                            return response()->json(array(
                                'success' => false,
                                'alert'   => 'danger',
                                'errors'  => $validator->errors()->toArray()
                            ));
                        }
                    $data =array();
                        $checkExist =Inventory::where('branch_id',$request['branch'])
                                                ->where('item_id',$request['select-item'])
                                                ->where('height_id',$request['height'])
                                                ->where('pot_size_id',$request['pot_size'])
                                                ->where('girth_id',null)->first();

                    if(!$checkExist){
                        $inventory =   Inventory::create([
                            'item_id'=>$request['select-item'],
                            'branch_id'=>$request['branch'],
                            'height_id'=>$request['height'],
                            'pot_size_id'=>$request['pot_size'],
                            'girth_id'=>null,
                            'quantity'=>0,
                            'previous_quantity'=>0,
                            'finally_edited_user'=>Auth::user()->id,
                            'min_quantity_level'=>0

                        ]);

                        $data['item']=$inventory;
                        return view('admin.inventory.elements.plantInventory')->with($data)->render();

                    }else{
                        $data['item'] =$checkExist;
                        return view('admin.inventory.elements.plantInventory')->with($data)->render();
                    }

                }else{
                    $validator = Validator::make($request->all(), [
                        'branch'=>'required',
                        'sub_category'=> 'required',
                        'select-item'=> 'required',
                        'height'=>'required',
                        'pot_size'=>'required',
                        'girth'=>'required'
                    ]);
                    if ($validator->fails()) {
                        return response()->json(array(
                            'success' => false,
                            'alert'   => 'danger',
                            'errors'  => $validator->errors()->toArray()
                        ));
                    }
                      $checkExist =Inventory::where('branch_id',$request['branch'])
                                               ->where('item_id',$request['select-item'])
                                               ->where('height_id',$request['height'])
                                               ->where('pot_size_id',$request['pot_size'])
                                               ->where('girth_id',$request['girth'])->first();
                       $data =array();
                      if(!$checkExist){
                           $inventory =  Inventory::create([
                                 'item_id'=>$request['select-item'],
                                 'branch_id'=>$request['branch'],
                                 'height_id'=>$request['height'],
                                 'pot_size_id'=>$request['pot_size'],
                                 'girth_id'=>$request['girth'],
                                 'quantity'=>0,
                                 'previous_quantity'=>0,
                                 'finally_edited_user'=>Auth::user()->id,
                                 'min_quantity_level'=>0
                             ]);
                           $data['item']=$inventory;
                          return view('admin.inventory.elements.plantInventory')->with($data)->render();

                      }else{
                          $data['item'] =$checkExist;
                          return view('admin.inventory.elements.plantInventory')->with($data)->render();
                      }
                }
            }else if($request['main_category_type']==config('constant.mainCategory.Chemicals')){
                $checkExist =Inventory::where('branch_id',$request['branch'])
                    ->where('item_id',$request['select-item'])->first();
                $data =array();
                if(!$checkExist){
                    $inventory =  Inventory::create([
                        'item_id'=>$request['select-item'],
                        'branch_id'=>$request['branch'],
                        'quantity'=>0,
                        'previous_quantity'=>0,
                        'finally_edited_user'=>Auth::user()->id,
                        'min_quantity_level'=>0
                    ]);
                    $data['item']=$inventory;
                    return view('admin.inventory.elements.chemicalInventory')->with($data)->render();

                }else{
                    $data['item'] =$checkExist;
                    return view('admin.inventory.elements.chemicalInventory')->with($data)->render();
                }

            }else if($request['main_category_type']==config('constant.mainCategory.Tools')){
                $checkExist =Inventory::where('branch_id',$request['branch'])
                    ->where('item_id',$request['select-item'])->first();
                $data =array();
                if(!$checkExist){
                    $inventory =  Inventory::create([
                        'item_id'=>$request['select-item'],
                        'branch_id'=>$request['branch'],
                        'quantity'=>0,
                        'previous_quantity'=>0,
                        'finally_edited_user'=>Auth::user()->id,
                        'min_quantity_level'=>0
                    ]);
                    $data['item']=$inventory;
                    return view('admin.inventory.elements.ToolsInventory')->with($data)->render();

                }else{
                    $data['item'] =$checkExist;
                    return view('admin.inventory.elements.ToolsInventory')->with($data)->render();
                }

            }else if($request['main_category_type']==config('constant.mainCategory.Accessories')){
                $checkExist =Inventory::where('branch_id',$request['branch'])
                    ->where('item_id',$request['select-item'])->first();
                $data =array();
                if(!$checkExist){
                    $inventory =  Inventory::create([
                        'item_id'=>$request['select-item'],
                        'branch_id'=>$request['branch'],
                        'quantity'=>0,
                        'previous_quantity'=>0,
                        'finally_edited_user'=>Auth::user()->id,
                        'min_quantity_level'=>0
                    ]);
                    $data['item']=$inventory;
                    return view('admin.inventory.elements.AccessoriesInventory')->with($data)->render();

                }else{
                    $data['item'] =$checkExist;
                    return view('admin.inventory.elements.AccessoriesInventory')->with($data)->render();
                }

            }

        } else{
            return redirect()->action('UserRolesController@edit');
        }
    }
    public function plant(){
        $data['item'] =Inventory::find(1);
         return view('admin.inventory.elements.plantInventory')->with($data);
    }

    public function updateInventory(Request $request){


        if($request->ajax()){
            $validator =[];
            if(isset($request['add_quantity'])&& $request['add_quantity'] !=null){
                $validator = Validator::make($request->all(), [
                    'add_quantity'   => 'required|numeric|min:1',
                    'min_quantity_lev'   => 'numeric|min:1',
                    'item_id'=>'required'
                ]);
                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }

                $findQuntity =Inventory::find($request['item_id']);
                $findQuntity->quantity = $findQuntity->quantity + $request['add_quantity'];
                if(isset($request['min_quantity_lev'])&& ($request['min_quantity_lev']!=0 || $request['min_quantity_lev']!=null)){
                    $findQuntity->min_quantity_level =$request['min_quantity_lev'];
                }
                if($findQuntity->save()){
                    return response()->json(array(
                        'success' => true,
                        'alert'   => 'success',
                        'message'  => "Record has been updated successfully."
                    ));
                }

            }else if(isset($request['reduce_quantity'])&& $request['reduce_quantity']!=null){
                $validator = Validator::make($request->all(), [
                    'reduce_quantity'   => 'required|numeric|min:1',
                    'min_quantity_lev'   => 'numeric|min:1',
                    'item_id'=>'required'
                ]);
                if ($validator->fails()) {
                    return response()->json(array(
                        'success' => false,
                        'alert'   => 'danger',
                        'errors'  => $validator->errors()->toArray()
                    ));
                }

                $findQuntity =Inventory::find($request['item_id']);
                if($findQuntity->quantity>=$request['reduce_quantity']){
                    $findQuntity->quantity = $findQuntity->quantity - $request['reduce_quantity'];
                }else {
                    return response()->json(array(
                        'success' => true,
                        'alert'   => 'danger',
                        'message'  => "can't reduce current  inventory"
                    ));
                }
                if(isset($request['min_quantity_lev'])&& ($request['min_quantity_lev']!=0 || $request['min_quantity_lev']!=null)){
                    $findQuntity->min_quantity_level =$request['min_quantity_lev'];
                }
                if($findQuntity->save()){
                    return response()->json(array(
                        'success' => true,
                        'alert'   => 'success',
                        'message'  => "Record has been updated successfully."
                    ));
                }
            }else if(isset($request['min_quantity_lev'])&& ($request['min_quantity_lev']!=null || $request['min_quantity_lev']!=0)){
                $findQuntity =Inventory::find($request['item_id']);
                $findQuntity->min_quantity_level =$request['min_quantity_lev'];
                if($findQuntity->save()){
                    return response()->json(array(
                        'success' => true,
                        'alert'   => 'success',
                        'message'  => "Record has been updated successfully."
                    ));
                }
            }else{
                return response()->json(array(
                    'success' => true,
                    'alert'   => 'danger',
                    'message'  => "You didn't update any record"
                ));
            }

        }else{
            return redirect()->action('UserRolesController@edit');
        }
    }
}
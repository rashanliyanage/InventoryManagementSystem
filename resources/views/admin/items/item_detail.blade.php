
     @if(sizeof($items)>0)
        <div class="table-responsive">
            <table id="jstable2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Botanical Name</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td width="30%">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                                    <span class="count_top" style="font-size: 25px;">{{$item->name}}</span>

                                </div>
                            </div>
                        </td>

                        <td  width="30%">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">

                                    <span class="count_top" style="font-size: 25px;">{{$item->bot_name}}</span>

                                </div>
                            </div>
                        </td>
                        <td  width="20%">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count" style="padding-left: 10px !important;margin: 0px !important;">

                                    <div class="count "> <img   src="{{URL::asset($item->img_path)}}"  class="" style="width: 100%;"></div>

                                </div>
                            </div>
                        </td>
                        <td  width="20%">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">

                                    <div class="count">
                                        <a type="button" id ="edit_main_category"  href="{{url('/items/edit/'.$item->id)}}" class="btn  btn-primary" value="">edit</a>
                                        <a type="button" id ="delete_main_category" data-delform ="" class="btn   btn-danger del-sub-category-btn" >Delete</a>
                                    </div>

                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
         @else
         <div class="row ">
             <div class="no-result p-2 " style="background-color: rgb(211,211,211)">
                <span style="font-size: 30px;color: #0c5480">
                    Sorry! We couldn't find any result.</span><br>

                 <span style="font-size: 20px">We couldn't find any result matching your search. Please adjust your filters and try again   </span>


                 </span>

             </div>
         </div>
     @endif





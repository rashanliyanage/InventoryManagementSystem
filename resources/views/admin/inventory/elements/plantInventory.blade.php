
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <section class="content invoice">
                                <!-- title row -->

                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <strong><span style="font-size: 25px;">Branch</span></strong>
                                        <address>
                                            <strong>{{$item->branch->branch}}</strong>
                                        </address>
                                        <strong><span style="font-size: 25px;">Quantity</span></strong>
                                        <address>
                                            <div class="row tile_count">
                                                <div class="col-md-6 col-sm-12 col-xs-12 tile_stats_count">
                                                    <input type="hidden" id ="quantity" name="quantity"  value="{{$item->quantity}}">
                                                    <div class="count <?php echo ($item->quantity >= $item->min_min_quantity_level)?"green":"red"?>" ><input type="text" id ="current_quantity" name="current_quantity"  value="{{$item->quantity}}" disabled style="border: 0px !important;background-color: white"></div>

                                                </div>
                                            </div>

                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <address>
                                            <strong><span style="font-size: 20px;">Common Name</span></strong>
                                            <br>{{$item->item->name}}


                                        </address>
                                        <address>

                                            <strong><br><span style="font-size: 20px;">Botanical Name</span></strong>
                                            <br>{{$item->item->bot_name}}

                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <div class="count "> <img   src="{{URL::asset($item->item->img_path)}}"  class="" style="width: 100%;"></div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Height</th>
                                                <th>PotSize</th>
                                                <th>Girth</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$item->height->height}}</td>
                                                <td>{{$item->potSize->pot_size}}</td>
                                                <td>{{$item->girth->girth}}</td>

                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <form id ="inventory-update-form">
                                    <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id ="item_id" name="item_id" value="{{ $item->id }}">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add Quantity</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" id="add_quantity" onkeyup ="adjustAddQuantity()" name="add_quantity"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                                    <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reduce Quantity</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" id="reduce_quantity" onkeyup ="adjustReduceQuantity()" name="reduce_quantity"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Quantity Level</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" id="min_quantity_lev"  name="min_quantity_lev" value="{{$item->min_quantity_level}}" disabled="" class="form-control col-md-7 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-4 col-xs-12">
                                            <span> <li onclick="editMinimumOrderLevel()"   class="btn btn-primary pull-left"><i class="fa fa-edit"></i>Edit</li></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                           <label> <span style="color: red"> <?php  echo($item->min_quantity_level==0)?"Please provide Minimum Quantity Level ":""?></span></label>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <br>
                                <div class="row no-print">
                                    <div class="col-xs-12">

                                        <button type="submit" id ="up-inventory" class="btn btn-primary pull-left"><i class="fa fa-credit-card"></i> Update Inventory</button>
                                    </div>
                                </div>

                                </form>
                                <div id="response-message"></div>
                            </section>
                        </div>
                    </div>
            </div>
            </div>

            <script>


                function adjustAddQuantity() {
                var current = parseInt($("#quantity").val()) + parseInt($("#add_quantity").val());
                if(isNaN(current)){
                $("#current_quantity").val($("#quantity").val()) ;
                }else{
                $('input[name="current_quantity"]').val(current);
                }

                }

                function adjustReduceQuantity() {
                var current = parseInt($("#quantity").val()) - parseInt($("#reduce_quantity").val());
                if(isNaN(current)){
                $("#current_quantity").val($("#quantity").val()) ;
                }else if(current<=0){
                $('input[name="current_quantity"]').val(0);
                }else {
                $('input[name="current_quantity"]').val(current);
                }
                }

                function editMinimumOrderLevel() {
                    $("#min_quantity_lev").prop("disabled",false);

                }
            </script>
            <script>
                var base = '{{ url('/') }}'

            </script>

            <script src="{{ url('js/custom_2.js') }}"></script>



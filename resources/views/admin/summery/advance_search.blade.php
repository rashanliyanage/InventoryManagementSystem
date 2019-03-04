
@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div id="response"></div>
                    </div>
                    <div class="search" style="border: 1px solid #b4b4b4;padding: 5px;">
                    <div class="row" >
                        <div class="col-md-3 col-xs-12">
                            <p>  <strong> <span >Select Catagory</span></strong></p>
                            <select required class=""  id="select-catagory" name="select-beast">
                                <option value="" id="0" >-- Select An Option --</option>
                                <option value="1" id="1">Plants</option>
                                <option value="2" id="2">Fertiliser</option>

                            </select>
                        </div>
                        <div class="col-md-3  col-xs-12">
                          <p> <strong> <span>Select Name</span></strong></p>
                            <select required class="" id="select-name" name="select-beast">
                                <option value="" id="0">-- Select An Option --</option>
                                <option value="1" id="1">Glossy abelia</option>
                                <option value="2" id="2">Glossy Abelia</option>
                                <option value="3" id="3">Hibiscus manihot</option>
                                <option value="4" id="4">Flowering Maple</option>
                                <option value="5" id="5">Bear's Breeches</option>
                                <option value="6" id="6">Pineapple Guava</option>
                                <option value="7" id="7">California Box Elder</option>
                                <option value="8" id="8">Japanese Maple</option>
                                <option value="9" id="9">Japanese Maple</option>
                                <option value="10" id="10">Japanese Maple</option>




                            </select>
                        </div>
                        <div class="col-md-3  col-xs-12">
                            <p>  <strong> <span>Select Bot Name</span></strong></p>
                            <select required class="" id="select-bot-name" name="select-beast">
                                <option value="" id="0">-- Select An Option --</option>
                                <option value="1" id="1">Abelia grandiflora</option>
                                <option value="2" id="2">Abelia x grandiflora 'Edward Goucher</option>
                                <option value="3" id="2">Abelmoschus manihot</option>
                                <option value="4" id="2">Abutilon pictum</option>
                                <option value="5" id="2">Acanthus mollis</option>
                                <option value="6" id="2">Acca sellowiana</option>
                                <option value="7" id="2">Acer negundo californicum</option>
                                <option value="8" id="2">Acer palmatum</option>
                                <option value="9" id="2">Acer palmatum 'Burgundy Lace</option>
                                <option value="10" id="2">Acer palmatum dissectum</option>>

                            </select>
                        </div>
                        <div class="col-md-3  col-xs-12">
                            <p>  <strong> <span>Select Height</span></strong></p>
                            <select required class="" id="select-height" name="select-beast">
                                <option value="" id="0">-- Select An Option --</option>
                                <option value="1" id="1">Small</option>
                                <option value="2" id="2">Medium</option>


                            </select>
                        </div>

                    </div>
                    <div class="row" style="text-align: center;margin-top: 10px;">
                        <div class="col-md-12 col-xs-12" style="text-align: center">
                                <button type="button" class="btn btn-round btn-primary" style="width: 100%;" >Search</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
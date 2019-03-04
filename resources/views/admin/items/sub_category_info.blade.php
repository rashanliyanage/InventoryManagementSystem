
<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
<div class="col-md-3 col-sm-3 col-xs-12">
    <select class="form-control" id="sub_category" name="sub_category"  required>
        <option value="" >--select Category--</option>
        @foreach($subCategory as $item)
        <option value="{{$item->id}}">{{$item->category}}</option>
        @endforeach
    </select>
</div>



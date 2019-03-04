<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <select class="" id="select-item" name="select-item"  required>
            <option value="" >--select Category--</option>
            @foreach($items as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Height</label>
<div class="col-md-3 col-sm-3 col-xs-12">
    <select class="form-control" id="height" name="height"  required>
        <option value="" >--select Category--</option>
        @foreach($heights as $height)
            <option value="{{$height->id}}">{{$height->height}}</option>
        @endforeach
    </select>
</div>
</div>
    <div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Pot Size</label>
<div class="col-md-3 col-sm-3 col-xs-12">
    <select class="form-control" id="pot_size" name="pot_size"  required>
        <option value="" >--select Category--</option>
        @foreach($potSizes as $potSizes)
            <option value="{{$potSizes->id}}">{{$potSizes->pot_size}}</option>
        @endforeach
    </select>
</div>
    </div>



<script>
    $(document).ready(function () {
        $("#select-item").selectize({
            create: true,
            sortField: "text",

        })

    })
</script>
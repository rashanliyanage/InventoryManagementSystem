<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Name</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <select class="" id="select-item-tools" name="select-item" required>
            <option value="" >--select Category--</option>
            @foreach($items as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#select-item-tools").selectize({
            create: true,
            sortField: "text",

        })

    })
</script>
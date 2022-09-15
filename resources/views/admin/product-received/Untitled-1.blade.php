<tbody>
    <tr>
        <td>
            <input type="text" name="product_name" id="product_name" class="form-control">
        </td>
        <td>
            <select class="form-control brand" name="brand_name" id="brand_select2" data-toggle="select2">
                <option>--Select Brand --</option>
                @foreach ($all_brand as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select class="form-control material" name="material_name" id="material_select2" data-toggle="select2">
                <option>--Select Material --</option>
                @foreach ($all_material as $material)
                    <option value="{{$material->id}}">{{$material->material_name}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select class="form-control color" name="color_name" id="color_select2" data-toggle="select2">
                <option>--Select Material --</option>
                @foreach ($all_color as $color)
                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                @endforeach
            </select>
        </td>
        <td> 
            <select class="form-control yarn" name="yarn_type" id="yarn_select2" data-toggle="select2">
                <option>--Select Yarn --</option>
                @foreach ($all_yarn as $yarn)
                    <option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>'
                {{-- <?php 
                    if(number > 1)
                    {
                        echo '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    
                    }
                    else
                    {
                        echo '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    
                    }
                ?> --}}
            </td>
    </tr>

   </tbody>
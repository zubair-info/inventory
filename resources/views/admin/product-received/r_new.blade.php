@extends('layouts.dashboard')
@section('content')
@can('product_received')
    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitBirds</a></li>
                    <li class="breadcrumb-item active">Product Received</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="received_chalan_id" class="form-label">Chalan Id</label>
                                        <input type="text" name="received_chalan_id" id="received_chalan_id" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label  class="form-label">Received Product</label>
                                    <div class="mt-2"> 
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline product_received">
                                            <input type="radio" id="supplier_buyer" value="supplier_buyer" name="product_received" class="form-check-input product_received">
                                            <label class="form-check-label" for="supplier_buyer">Bayer / Supplier</label>
                                        </div>
                                        <div class="form-check  form-checkbox-info mb-2 form-check-inline">
                                            <input type="radio" id="department"  value="department" name="product_received" class="form-check-input product_received">
                                            <label class="form-check-label" for="department">Department</label>
                                        </div>
                                        <span style="color:red;" id="product_received"></span>                                 
                                        
                                        <div class="mb-3 d-none" id="supplier_buyer_check" >
                                            <label for="supplier_select2" class="form-label">Supplier / Buyer</label>
                                            <div class="input-group">
                                                <select class="form-control supplier_select" name="supplier_buyer_name" id="supplier_select2" data-toggle="select2">
                                                    <option>--Select Supplier --</option>
                                                    @foreach ($all_supplier_buyer as $supplier_buyer)
                                                        <option value="{{$supplier_buyer->id}}">{{$supplier_buyer->supplier_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-none" id="department_check" >
                                            <label for="department_select2" class="form-label">Department</label>
                                            <div class="input-group">
                                                <select class="form-control select2" name="department_name" id="department_select2" data-toggle="select2">
                                                    <option>--Select Department --</option>
                                                    @foreach ($all_department as $department)
                                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="color:red;" id="received_product"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="brand_select2" class="form-label">Brand</label>
                                            <div class="input-group">
                                                <select class="form-control brand" name="brand_name" id="brand_select2" data-toggle="select2">
                                                    <option>--Select Brand --</option>
                                                    @foreach ($all_brand as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="yarn_select2" class="form-label">Yarn Type</label>
                                            <div class="input-group">
                                                <select class="form-control yarn" name="yarn_type" id="yarn_select2" data-toggle="select2">
                                                    <option>--Select Yarn --</option>
                                                    @foreach ($all_yarn as $yarn)
                                                        <option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="material_select2" class="form-label">Material</label>
                                            <div class="input-group">
                                                <select class="form-control material" name="material_name" id="material_select2" data-toggle="select2">
                                                    <option>--Select Material --</option>
                                                    @foreach ($all_material as $material)
                                                        <option value="{{$material->id}}">{{$material->material_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="color_select2" class="form-label">Color</label>
                                            <div class="input-group">
                                                <select class="form-control color" name="color_name" id="color_select2" data-toggle="select2">
                                                    <option>--Select Material --</option>
                                                    @foreach ($all_color as $color)
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="color_select2" class="form-label">Product Name</label>
                                    <div class="input-group">
                                        <select class="form-control product_name" name="product_name" id="product_select2" data-toggle="select2">
                                            <option value="">--Select Product --</option>
                                            @foreach ($add_all_product as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped" id="product">
                                    <thead>
                                        <tr>
                                            <th>Yarn</th>
                                            <th>Material</th>
                                            <th>Brand</th>
                                            <th>Color</th>
                                            <th>Unit</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product">
                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" align="right">&nbsp;</td>
                                            <td>
                                                @csrf
                                                <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Color</label>
                                            <div class="input-group">
                                                <select class="form-control color" name="color_name" id="color_select2" data-toggle="select2">
                                                    <option>--Select Material --</option>
                                                    @foreach ($all_color as $color)
                                                        <option value="{{$color->id}}">{{$color->color_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>  
                    <div class="table-responsive">
                        <form method="post" id="product">
                            <span id="result"></span>
                            <table class="table table-bordered table-striped" id="product">
                                <thead>
                                    <tr>
                                        <th>Yarn</th>
                                        <th>Material</th>
                                        <th>Brand</th>
                                        <th>Color</th>
                                        <th>Unit</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="right">&nbsp;</td>
                                        <td>
                                            @csrf
                                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

    {{-- department modal start --}}
        <div id="departmentAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="danger-header-modalLabel">Add department Form</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row mx-1">
                                <label class="form-label">Department Name</label>
                                <input type="text" class="form-control department_name" name="department_name"  placeholder="Enter department name">
                                <span style="color:red;" id="department_error"></span>
                            </div>
                            <div class="text-sm-end mt-2">
                                    <button class="btn btn-success dept-btn-submit">Add Department</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    {{-- department modal end --}}

    {{-- brand modal start --}}
        <div id="brandAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="danger-header-modalLabel">Add Brand</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row mx-1">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control brand_name" name="brand_name"  placeholder="Enter Brand Name ">
                                <span style="color:red;" id="brand_error"></span>
                            </div>
                            <div class="text-sm-end mt-2">
                                    <button class="btn btn-success brand-btn-submit">Add Brand</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    {{-- brand modal end --}}

    {{-- yarn modal start --}}
    <div id="yarnAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Add Yarn</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row mx-1">
                            <label class="form-label">Yarn Name</label>
                            <input type="text" class="form-control yarn_name" name="yarn_name"  placeholder="Enter Yarn Name ">
                            <span style="color:red;" id="yarn_error"></span>
                        </div>
                        <div class="text-sm-end mt-2">
                                <button class="btn btn-success yarn-btn-submit">Add Yarn</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->    
    </div>
    {{-- yarn modal end --}}

    {{-- material modal start --}}
    <div id="materialAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Add Material</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row mx-1">
                            <label class="form-label">Material Name</label>
                            <input type="text" class="form-control material_name" name="material_name"  placeholder="Enter Material Name ">
                            <span style="color:red;" id="material_error"></span>
                        </div>
                        <div class="text-sm-end mt-2">
                                <button class="btn btn-success material-btn-submit">Add Material</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->    
    </div>
    {{-- material modal end --}}

    {{-- material modal start --}}
    <div id="colorAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Add Color</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row mx-1">
                            <label class="form-label">Color Name</label>
                            <input type="text" class="form-control color_name" name="color_name"  placeholder="Enter Color Name ">
                            <span style="color:red;" id="color_error"></span>
                        </div>
                        <div class="text-sm-end mt-2">
                                <button class="btn btn-success color-btn-submit">Add Color</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->    
    </div>
    {{-- material modal end --}}
</div>
@else
    @include('admin.role.error');
@endcan 
@endsection

@section('footer_script')
{{-- product received  --}}
<script>
    $('input[name="product_received"]').change(function() {
        var  product_received =  $('input[name="product_received"]:checked').val();
        if(product_received == 'supplier_buyer'){   
            $('#supplier_buyer_check').removeClass('d-none');
            $('#supplier_buyer_check').addClass('block');
        }else{
            $('#supplier_buyer_check').removeClass('block');
            $('#supplier_buyer_check').addClass('d-none');       
        }
        if(product_received=='department'){
            
            $('#department_check').removeClass('d-none');
            $('#department_check').addClass('block');
            
        }else{
            $('#department_check').removeClass('block');
            $('#department_check').addClass('d-none');     
            
        }
    });
    
</script>  

{{-- department section start --}}
<script>
    $('#department_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><button type="button" data-bs-target="#departmentAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new item</button></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(".dept-btn-submit").click(function(e){ 
        e.preventDefault();
        var department_name = $(".department_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('departmentStore') }}",
           data:{department_name:department_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    toastr.success(data.success);
                    location.reload();
                }else{
                    $('#department_error').html(data.error);  
                }
           }
        });
    
    });
</script>
{{-- department section ends --}}

{{-- supplier section start --}}
<script>
    $('#supplier_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><a href="{{route('supplierAdd')}}" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new supplier</a></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });

</script>
{{-- supplier section ends --}}

{{-- brand section start --}}
<script>
    $('#brand_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><button type="button" data-bs-target="#brandAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new brand</button></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(".brand-btn-submit").click(function(e){ 
        e.preventDefault();
        var brand_name = $(".brand_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('brandNameStore') }}",
           data:{brand_name:brand_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                    toastr.success(data.success);
                }else{
                    $('#brand_error').html(data.error);  
                }
           }
        });
    
    });

</script>
{{-- brand section ends --}}

{{-- yarn section start --}}
<script>
    $('#yarn_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><button type="button" data-bs-target="#yarnAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new yarn</button></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(".yarn-btn-submit").click(function(e){ 
        e.preventDefault();
        var yarn_name = $(".yarn_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('yarnStore') }}",
           data:{yarn_name:yarn_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                    toastr.success(data.success);
                }else{
                    $('#yarn_error').html(data.error);  
                }
           }
        });
    
    });

</script>
{{-- yarn section ends --}}

{{-- material  section start --}}
<script>
    $('#material_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><button type="button" data-bs-target="#materialAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new material</button></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(".material-btn-submit").click(function(e){ 
        e.preventDefault();
        var material_name = $(".material_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('materialStore') }}",
           data:{material_name:material_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                    toastr.success(data.success);
                }else{
                    $('#material_error').html(data.error);  
                }
           }
        });
    
    });

</script>
{{-- material  section end --}}

{{-- color  section start --}}
<script>
    $('#color_select2').select2().on('select2:open', function () {
        var a = $(this).data('select2');
        if (!$('.select2-link').length) {
        a.$results.parents('.select2-results')
            .append('<div class="select2-link"><button type="button" data-bs-target="#colorAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create new color</button></div>')
            .on('click', function (b) {
                a.trigger('close');
            });
      }
   });

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(".color-btn-submit").click(function(e){ 
        e.preventDefault();
        var color_name = $(".color_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('colorStore') }}",
           data:{color_name:color_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                    toastr.success(data.success);
                }else{
                    $('#color_error').html(data.error);  
                }
           }
        });
    
    });

</script>
{{-- color  section end --}}


<script>
    $(document).ready(function(){
    
     var count = 1;
    
     dynamic_field(count);
    
     function dynamic_field(number)
     {
        
      html = '<tr>';
            html += '<td><input type="text" name="product_name[]" class="form-control" /></td>';
            html += '<td><input type="text" name="yarn_name[]" class="form-control" /></td>';
            html += '<td><select class="form-control" name="color_name" id="color_select2" data-toggle="select2"><option value="">Select</option>'+
                @foreach ($all_color as $color)
                     '<option value="{{$color->id}}">{{$color->color_name}}</option>'+
                @endforeach
                +'</select></td>';

            // html += '<td><select name="cablename_id[]" class="form-control" cablename_id="'+count+'">
            //         <option value="">Wähle Kabeltyp aus.</option>
            //         @foreach($cablenames as $cablename)
            //         <option value="{{$cablename->idcablenames}}">{{$cablename->IndNr}}</option>
            //         @endforeach
            //         <span class="text-danger">{{ $errors->first('IndNr') }}</span>
            //         </select></td>';
            //         html += '<select name="orderItem[]">';

            //             html += '<option value="">Menu Items</option>';

            //             html += "@foreach ($all_color as $item)";


            // html += '<option value="''">'{{$color->color_name}}'</option>';

            // html += "@endforeach";

            // html += '</select>';

            html += '<td><input type="text" name="cablenames_cabletyps_id[]" class="form-control" /></td>';
            html += '<td><input type="text" name="cablenames_cabletyps_id[]" class="form-control" /></td>';
            html += '<td><input type="text" name="typeofmachine_id[]" class="form-control" /></td>';
            html += '<td><input type="text" name="created_at[]" class="form-control" /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbodys').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbodys').html(html);
            }

     }
    
     $(document).on('click', '#add', function(){

      count++;
      dynamic_field(count);
      select()
     });
    
     $(document).on('click', '.remove', function(){
      count--;
      $(this).closest("tr").remove();
     });
    
    //  $('#dynamic_form').on('submit', function(event){
    //         event.preventDefault();
    //         $.ajax({
    //             url:'{{ route("cablelists.store") }}',
    //             method:'post',
    //             data:$(this).serialize(),
    //             dataType:'json',
    //             beforeSend:function(){
    //                 $('#save').attr('disabled','disabled');
    //             },
    //             success:function(data)
    //             {
    //                 if(data.error)
    //                 {
    //                     var error_html = '';
    //                     for(var count = 0; count < data.error.length; count++)
    //                     {
    //                         error_html += '<p>'+data.error[count]+'</p>';
    //                     }
    //                     $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
    //                 }
    //                 else
    //                 {
    //                     dynamic_field(1);
    //                     $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
    //                 }
    //                 $('#save').attr('disabled', false);
    //             }
    //         })
    //  });
    
    });
</script>

<script>
    $('#product_select2').change(function() {
        var  product_feature_id = $(this).val();
        $.ajax({
           type:'POST',
           url:'/productFeatureSearchData',
           data:{product_feature_id:product_feature_id},
           success:function(data){
                // alert(data.success.yarn_type);
                // if((data.success.yarn_type){
                // }
                var count = 1;
                html = '<tr>';
                    html += '<td><input type="text" name="idcablelists[]" value=" ' +count +'" class="form-control" /></td>';

                html += '<td><select class="form-control"  name="yarn_name" id="yarns_select2" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_yarn as $yarn)
                            '<option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>'+
                        @endforeach
                        +'</select></td>';
                html += '<td><select class="form-control" name="color_name" id="color_select2" data-toggle="select2"><option value="">Select</option>'+
                    @foreach ($all_color as $color)
                        '<option value="{{$color->id}}">{{$color->color_name}}</option> '+
                    @endforeach
                    +'</select></td>';

                 html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                 
                $('#product').append(html);
                count++
                
           }
        });
        
    });
</script>
@endsection
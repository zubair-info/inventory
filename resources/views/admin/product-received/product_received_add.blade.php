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
                    <form id="product_received_store">
                        <div class="row">
                            <div class="row">
                                @php
                                    $product_uid =time().uniqid( mt_rand( 10000, 999999));
                                @endphp
                                <input type="hidden" name="product_uid" id="product_uid" value="{{$product_uid}}" class="form-control form-control-sm">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="received_chalan_id" class="form-label">Chalan Id</label>
                                        <input type="text" name="received_chalan_id" id="received_chalan_id" class="form-control form-control-sm">
                                        <span style="color:red;" class="received_chalan_id_error"></span>                                 
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control form-control-sm">
                                        <span style="color:red;" class="date_error"></span>                                 
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label  class="form-label">Received Product</label>
                                    <div class="mt-2"> 
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="radio" id="supplier_buyer" value="supplier_buyer" name="product_received" class="form-check-input product_received">
                                            <label class="form-check-label" for="supplier_buyer">Bayer / Supplier</label>
                                        </div>
                                        <div class="form-check  form-checkbox-info mb-2 form-check-inline">
                                            <input type="radio" id="department"  value="department" name="product_received" class="form-check-input product_received">
                                            <label class="form-check-label" for="department">Department</label>
                                        </div>
                                        <div class="mb-3 d-none" id="supplier_buyer_check" >
                                            <label for="supplier_select2" class="form-label">Supplier / Buyer</label>
                                            <div class="input-group">
                                                <select class="form-control form-control-sm supplier_select" name="supplier_buyer_id" id="supplier_select2" data-toggle="select2">
                                                    <option value="">--Select Supplier --</option>
                                                    @foreach ($all_supplier_buyer as $supplier_buyer)
                                                    <option value="{{$supplier_buyer->id}}">{{$supplier_buyer->supplier_name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-none" id="department_check" >
                                            <label for="department_select2" class="form-label">Department</label>
                                            <div class="input-group">
                                                <select class="form-control form-control-sm select2" name="department_id" id="department_select2" data-toggle="select2">
                                                    <option value="">--Select Department --</option>
                                                    @foreach ($all_department as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                        </div>
                                                                    
                                    </div>
                                    <span style="color:red;" class="product_received_error"></span>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="color_select2" class="form-label">Product Name</label>
                                    <div class="input-group">
                                        <select class="form-control form-control-sm product_name"  id="product_select2" data-toggle="select2">
                                            <option value="">--Select Product --</option>
                                            @foreach ($add_all_product as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                    <span style="color:red;" class="product_name_error"></span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Yarn</th>
                                                <th>Material</th>
                                                <th>Brand</th>
                                                <th>Color</th>
                                                {{-- <th>Cartoon</th> --}}
                                                <th>Unit</th>
                                                <th>Rate</th>
                                                <th colspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="product">
                                            <input id="form_count" type="hidden" name="form_count">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" align="right">&nbsp;</td>
                                                <td>
                                                   
                                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <input id="form_count" type="hidden" name="form_count"> --}}
                    </form>  
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

    {{-- department modal start --}}
        <div id="departmentAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control form-control-sm department_name" name="department_name"  placeholder="Enter department name" >
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

        {{-- yarn modal start --}}
        <div id="yarnAdd" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info">
                        <h4 class="modal-title" id="danger-header-modalLabel">Add Yarn</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="yarnForm">
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

        {{-- brand modal start --}}
        <div id="brandAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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

        {{-- material modal start --}}
        <div id="materialAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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

        <div id="colorAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control color_name" name="color_name"  placeholder="Enter color Name ">
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

<script>
    var count =0;
    $('#product_select2').change(function() {
        
        // console.log(count)
        var  product_feature_id = $(this).val();
        $.ajax({
           type:'POST',
           url:'/productFeatureSearchData',
           data:{product_feature_id:product_feature_id},
           success:function(data){

                $('#form_count').val(count);
                
                html = '<tr>';
                // html += '<input type="hidden" name="form_count" id="form_count" value="'+count+'" class="form-control form-control-sm">';
                html += '<td style="width:15%;"><input type="text" name="product_name_'+count+'" value="'+data.success.product_name+'" class="form-control form-control-sm"  readonly><span style="color:red;" class="yarn_type_id_error_'+count+'"></span></td>';
                
                if(data.success.yarn_type==1){
                    
                    html += '<td style="width:15%;"><select class="form-control form-control-sm yarn_type_id"  id="yarn_type_id_'+count+'" aria-label="Example select with button addon"  name="yarn_type_id_'+count+'" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_yarn as $yarn)
                        '<option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>'+
                        @endforeach
                        +'</select><button class="btn btn-outline-secondary" type="button">Button</button><span style="color:red;" class="yarn_type_id_error_'+count+'"></span></td>';
                     html += '<h6 style="color:red;" class="yarn_type_id_error_'+count+'"></h6>';  

                }else{
                    // html += '<span>N/A</span>';
                    html += '<td><input type="text"   class="form-control form-control-sm" readonly></td>';
                }
                if(data.success.material_type==1){

                    html += '<td style="width:15%";><select class="form-control form-control-sm material" name="material_type_id_'+count+'" id="material_type_id_'+count+'" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_material as $material)
                        '<option value="{{$material->id}}">{{$material->material_name}}</option>'+
                        @endforeach
                        +'</select></td>';
                }else{
                    html += '<td><input type="text"  class="form-control form-control-sm" readonly></td>';
                }
                if(data.success.brand==1){
                    
                    html += '<td style="width:15%;"><select class="form-control form-control-sm brand" name="brand_id_'+count+'" id="brand_id_'+count+'" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_brand as $brand)
                        '<option value="{{$brand->id}}">{{$brand->brand_name}}</option>'+
                        @endforeach
                        +'</select></td>';
                }else{
                    html += '<td><input type="text"  class="form-control form-control-sm" readonly></td>';
                    
                }
                if(data.success.color==1){
                    html += '<td style="width:15%;"><div><select class="form-control form-control-sm" name="color_id_'+count+'" id="color_id_'+count+'" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_color as $color)
                        '<option value="{{$color->id}}">{{$color->color_name}}</option> '+
                        @endforeach
                        +'</select></div></td>';
                        
                }else{
                    html += '<td><input type="text"  class="form-control form-control-sm" readonly></td>';
                    
                }

                if(data.success.unit_type==1){
                    html +='<td>';
                            
                    html += '<input type="hidden" id="unit_type" name="unit_type_'+count+'" value="'+data.success.unit_type+'" class="form-control form-control-sm" >';
                    if(data.success.weight==1){
                                
                        html += '<input type="hidden"  name="weight_'+count+'" value="'+data.success.weight+'" class="form-control form-control-sm" >';
                        if(data.success.weight_kg){
                                html += '<input type="hidden" name="weight_kg_'+count+'" value="'+data.success.weight_kg+'" class="form-control form-control-sm">';
                                html +='<label class="form-label">Weight(kg)</label><input type="text" id="weight_kg_qty_'+count+'" name="weight_kg_qty_'+count+'" placeholder="Kg Qty" class="form-control form-control-sm" id="weight_kg" >';
                                html += '<span class="weight_kg_qty_error"></span>';
                        }
                        if(data.success.weight_pound){
                            html += '<input type="hidden" name="weight_pound_'+count+'" value="'+data.success.weight_pound+'" class="form-control form-control-sm">';
                            html +='<label class="form-label">Weight(pound)</label><input type="text" name="weight_pound_qty_'+count+'" placeholder="Pound Qty" class="form-control form-control-sm" id="weight_pound" >';
                        }
                    }
                    if(data.success.cartoon==1){
                            html += '<input type="hidden" name="cartoon_'+count+'" value="'+data.success.cartoon+'" class="form-control form-control-sm" >';
                        if(data.success.cartoon_small==1){
                            html += '<input type="hidden" name="cartoon_small_'+count+'" value="'+data.success.cartoon_small+'" class="form-control form-control-sm" >';
                            if(data.success.cartoon_qty_small){
                                html +='<label class="form-label">Cartoon(S)</label><input type="text" name="cartoon_qty_small_'+count+'" placeholder="Small Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="colFormLabelSm" >';
                            }
                        }
                        if(data.success.cartoon_medium==1){
                            html += '<input type="hidden" name="cartoon_medium_'+count+'" value="'+data.success.cartoon_medium+'" class="form-control form-control-sm" >';
                            if(data.success.cartoon_medium_qty){
                                html +='<label  class="form-label">>Cartoon(M)</label><input type="text" name="cartoon_medium_qty_'+count+'" placeholder="Medium Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_large==1){
                            html += '<input type="hidden" name="cartoon_large_'+count+'" value="'+data.success.cartoon_large+'" class="form-control form-control-sm" >';
                            if(data.success.cartoon_large_qty){
                                html +='<label  class="form-label">Cartoon(L)</label><input type="text" name="cartoon_large_qty_'+count+'" placeholder="Large Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_exrta_large==1){
                            html += '<input type="hidden" name="cartoon_exrta_large_'+count+'" value="'+data.success.cartoon_exrta_large+'" class="form-control form-control-sm" >';
                            if(data.success.cartoon_extar_large_qty){
                                html +='<label  class="form-label">Cartoon(XL)</label><input type="text" name="cartoon_extar_large_qty_'+count+'" placeholder="XL Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_exrta_xxl==1){
                            html += '<input type="hidden" name="cartoon_exrta_xxl_'+count+'" value="'+data.success.cartoon_exrta_xxl+'" class="form-control form-control-sm" >';
                            if(data.success.cartoon_extar_large_xxl_qty){
                                html +='<label  class="form-label">Cartoon(XXL)</label><input type="text" name="cartoon_extar_large_xxl_qty_'+count+'" placeholder="XXL Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="colFormLabelSm">';
                            }
                            
                        }

                    }

                    if(data.success.dozon){
                        html += '<input type="hidden" name="dozon_'+count+'" value="'+data.success.dozon+'" class="form-control form-control-sm" >';
                        if(data.success.dozon_qty){
                            html +='<label class="form-label">Dozon</label><input type="text" name="dozon_qty_'+count+'" placeholder="Dozon Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="dozon_qty" >';
                        }
                    }
                    if(data.success.box){
                        html += '<input type="hidden" name="box_'+count+'" value="'+data.success.box+'" class="form-control form-control-sm" >';
                        if(data.success.box_qty){
                            html +='<label class="form-label">Box</label><input type="text" name="box_qty_'+count+'" placeholder="Box Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="box_qty" >';
                        }
                    }
                    if(data.success.pices){
                        html += '<input type="hidden" name="pices_'+count+'" value="'+data.success.pices+'" class="form-control form-control-sm" >';
                        if(data.success.pices_qty){
                            html +='<label class="form-label">Pices</label><input type="text" name="pices_qty_'+count+'" placeholder="Pices Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="pices_qty" >';
                        }
                    }
                    if(data.success.roll){
                        html += '<input type="hidden" name="roll_'+count+'" value="'+data.success.roll+'" class="form-control form-control-sm" >';
                        if(data.success.roll_qty==1){
                            html +='<label class="form-label">Roll</label><input type="text" name="roll_qty_'+count+'" placeholder="Roll Qty" class="form-control form-control-sm form-control form-control-sm-sm" id="roll_qty" >';
                        }

                    }

                    html +='</td>';
                    
                    
                }else{
                    html +='<td><input type="text"  class="form-control form-control-sm"></td>'; 
                }

                html += '<td style="width:15%;"><input type="text" name="rate_'+count+'" class="form-control form-control-sm"></td>';

                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    
                $('#product').append(html);

                select2_brand();
                select2_yarn();
                select2_material();
                select2_color();
                count ++;
                
            }
        });
        
    });

    $(document).on('click', '.remove', function(){
        $(this).closest("tr").remove();
    });

    $('#product_received_store').on('submit', function(event) {
        event.preventDefault();

        var received_chalan_id= $('#received_chalan_id').val();
        var date= $('#date').val();
    //    var product_receiveds = (document.getElementsByClassName('product_received').checked == true;
    // $('.product_received').prop("checked") == false
    var product_received = document.getElementsByName('product_received');
        var product_received_value = false;

        for(var i=0; i<product_received.length;i++){
            if(product_received[i].checked == true){
                product_received_value = true;    
            }
        }
        // var  product_receiveds =  $('input[name="product_received"]:checked').val();
        // alert(product_receiveds)
        var product_name= $('#product_select2').val();
        if(received_chalan_id==''){
            $('.received_chalan_id_error').text('Received chalan no required');
        }else if(date==''){
            $('.date_error').text('Date field is required');
        }else if(!product_received_value){
            $('.product_received_error').text('Received Product field is required');
            return false;
        }else if(product_name==''){
            $('.product_name_error').text('Product name field is required');
        }
        else{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/product-received-store",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    // alert(data.error)
                    // var count = 0;
                    // $('.yarn_type_id_error_'+count).text(data.error);
                    if(data.error){

                        toastr.error(data.error);
                    }else{
                        toastr.success(data.success);
                        window.location.reload();
                    }
                    // var count = 0;
                    // var data_yarn_type_id=count-1;
                    // alert(data_yarn_type_id);
                    // alert(data.error.yarn_type_id_0);
                    // $.each(data.error,function(item,value ) {
                    //     // console.log(value);
                    //     alert(value)
                    //     // $('.yarn_type_id_error').text(value);
                    // });

                    // if(data.error){
                    //     if(data.error.received_chalan_id){
                    //         $('.received_chalan_id_error').text(data.error.received_chalan_id);
                    //     }
                    //     if(data.error.date){
                    //         $('.date_error').text(data.error.date);
                    //     }
                    //     if(data.error.product_received){
                    //         $('.product_received_id_error').text(data.error.product_received);
                    //     }
                    //     if(data.error.product_name){
                    //         $('.product_name_error').text(data.error.product_name);
                    //     }
                    //     if(data.error.yarn_type_id_+count){
                    //         $('.yarn_type_id_error').text(data.error.yarn_type_id_+count);
                    //     }
                    //     if(data.error.weight_kg_qty){
                    //         $('.weight_kg_qty_error').text(data.error.weight_kg_qty);
                    //     }
                    // }else{
                    //     toastr.success('Add Product Received Sucesfully!');
                    //     //  window.location.reload();
                    // }
                
                }
            });

        }
 
    });
    
</script>
<script>
    // In your Javascript (external.js resource or <script> tag)
    function select2_yarn(){
        $(document).ready(function() {
            var counts =count-1;
            // alert(counts)
            $("#yarn_type_id_"+counts).select2();
            $('#yarn_type_id_'+counts).select2().on('select2:open', function () {
            var a = $(this).data('select2');
            if (!$('.select2-link-yarn').length) {
                a.$results.parents('.select2-results')
                    .append('<div class="select2-link-yarn"><button type="button" data-bs-target="#yarnAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display:inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create</button></div>')
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
                            // $('#yarnForm').trigger("reset");
                            //     $('.modal').modal('hide');
                            // $("#product").load(location.href + " #product");
                            toastr.success(data.success);
                        }else{
                            $('#yarn_error').html(data.error);  
                        }
                }
                });
            
            });
        });

        
    }
    function select2_brand(){
        $("#brand_id_"+count).select2();
        $('#brand_id_'+count).select2().on('select2:open', function () {
            var a = $(this).data('select2');
            if (!$('.select2-link-brand').length) {
                a.$results.parents('.select2-results')
                .append('<div class="select2-link-brand"><button type="button" data-bs-target="#brandAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display:inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create</button></div>')
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


    }

    function select2_material(){
        $("#material_type_id_"+count).select2();
        $('#material_type_id_'+count).select2().on('select2:open', function () {
            var a = $(this).data('select2');
            if (!$('.select2-link-material').length) {
            a.$results.parents('.select2-results')
                .append('<div class="select2-link-material"><button type="button" data-bs-target="#materialAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display: inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create</button></div>')
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
    }

    function select2_color(){

        $("#color_id_"+count).select2();
        $('#color_id_'+count).select2().on('select2:open', function () {
            var a = $(this).data('select2');
            if (!$('.select2-link-color').length) {
                a.$results.parents('.select2-results')
                .append('<div class="select2-link-color"><button type="button" data-bs-target="#colorAdd" data-bs-toggle="modal" class="btn btn-success" style="padding:6px;margin:15px;height:36px;display:inline-table;"><i class="mdi mdi-plus-circle me-2"></i>Create</button></div>')
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

    }
              
</script>
    
{{-- <script>
    $('#product_received_store').validate({
        reles: {
            'yarn_type_id[]': {
                required: true,
            },
            'brand_id[]': {
                required:true,
            },
            'color_id[]': {
                required:true,
            },
        },
        messages: {
            'yarn_type_id[]' : "Please input file*",
            'brand_id[]' : "Please input file*",
            'color_id[]' : "Please input file*",
        },
    });
</script> --}}
@endsection

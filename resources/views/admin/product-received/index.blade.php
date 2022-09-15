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
                                <input type="text" name="product_uid" id="product_uid" value="{{$product_uid}}" class="form-control">
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
                                                <select class="form-control supplier_select" name="supplier_buyer_id" id="supplier_select2" data-toggle="select2">
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
                                                <select class="form-control select2" name="department_id" id="department_select2" data-toggle="select2">
                                                    <option value="">--Select Department --</option>
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
                                <div class="mb-3 col-lg-6">
                                    <label for="color_select2" class="form-label">Product Name</label>
                                    <div class="input-group">
                                        <select class="form-control product_name"  id="product_select2" data-toggle="select2">
                                            <option value="">--Select Product --</option>
                                            @foreach ($add_all_product as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                    </form>  
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
                                <input type="text" class="form-control department_name" name="department_name"  placeholder="Enter department name" >
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
        count ++;
        // console.log(count)
        var  product_feature_id = $(this).val();
        $.ajax({
           type:'POST',
           url:'/productFeatureSearchData',
           data:{product_feature_id:product_feature_id},
           success:function(data){

            // console.log(data.success);
            // console.log(data.success.yarn_type)
            // $.each(data.success, function( index, value ) {
            //     console.log(value.product_name);
            //     // html += '<li class="my-2 text-capitalize" style="cursor:pointer" data-id="'+ value.id +'">' + value.product_name +'</li>';
            // });

                html = '<tr>';
                html += '<input type="hidden" name="form_count[]" value="'+count+'" class="form-control">';
                html += '<td style="width:15%;"><input type="text" name="product_name[]" value="'+data.success.product_name+'" class="form-control" readonly></td>';
                if(data.success.yarn_type==1){

                    html += '<td style="width:15%;"><select class="form-control"  id="inputGroupSelect04" aria-label="Example select with button addon"  name="yarn_type_id[]" id="yarns_select2" data-toggle="select2"><option value="">Select</option>'+
                            @foreach ($all_yarn as $yarn)
                                '<option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>'+
                            @endforeach
                            +'</select><button class="btn btn-outline-secondary" type="button">Button</button></td>';
                }else{
                      html += '<td><input type="text" name="yarn_type_id[]"  class="form-control" readonly></td>';
                }
                if(data.success.material_type==1){

                    html += '<td style="width:15%";><select class="form-control material" name="material_type_id[]" id="material_select2" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_material as $material)
                            '<option value="{{$material->id}}">{{$material->material_name}}</option>'+
                        @endforeach
                        +'</select></td>';
                }else{
                     html += '<td><input type="text" name="material_type_id[]"  class="form-control" readonly></td>';
                }
                if(data.success.brand==1){

                    html += '<td style="width:15%;"><select class="form-control brand" name="brand_id[]" id="brand_select2" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_brand as $brand)
                            '<option value="{{$brand->id}}">{{$brand->brand_name}}</option>'+
                            @endforeach
                        +'</select></td>';
                }else{
                    html += '<td><input type="text" name="brand_id[]"  class="form-control" readonly></td>';

                }
                if(data.success.color==1){
                    html += '<td style="width:15%;"><div><select class="form-control" name="color_id[]" id="color_select2" data-toggle="select2"><option value="">Select</option>'+
                        @foreach ($all_color as $color)
                            '<option value="{{$color->id}}">{{$color->color_name}}</option> '+
                        @endforeach
                        +'</select></div></td>';

                }else{
                     html += '<td><input type="text" name="color_id[]"  class="form-control" readonly></td>';

                }

                if(data.success.unit_type==1){
                    html +='<td style="width:15%;">';

                    html += '<input type="hidden" name="unit_type[]" value="'+data.success.unit_type+'" class="form-control" >';
                    if(data.success.weight==1){
                        html += '<input type="hidden" name="weight[]" value="'+data.success.weight+'" class="form-control" >';
                        if(data.success.weight_kg){
                            html += '<input type="hidden" name="weight_kg[]" value="'+data.success.weight_kg+'" class="form-control">';
                            html +='<label class="form-label">Weight (kg)</label><input type="text" name="weight_kg_qty[]" placeholder="Kg Qty" class="form-control form-control-sm" id="weight_kg" >';
                        }
                        if(data.success.weight_pound){
                            html += '<input type="hidden" name="weight_pound[]" value="'+data.success.weight_pound+'" class="form-control">';
                            html +='<label class="form-label">Weight (pound)</label><input type="text" name="weight_pound_qty[]" placeholder="Pound Qty" class="form-control form-control-sm" id="weight_pound" >';
                        }
                    }   
                    if(data.success.cartoon==1){
                            html += '<input type="hidden" name="cartoon[]" value="'+data.success.cartoon+'" class="form-control" >';
                        if(data.success.cartoon_small==1){
                            html += '<input type="hidden" name="cartoon_small[]" value="'+data.success.cartoon_small+'" class="form-control" >';
                            if(data.success.cartoon_qty_small){
                                html +='<label class="form-label">Cartoon(S)</label><input type="text" name="cartoon_qty_small[]" placeholder="Small Qty" class="form-control form-control-sm" id="colFormLabelSm" >';
                            }
                        }
                        if(data.success.cartoon_medium==1){
                            html += '<input type="hidden" name="cartoon_medium[]" value="'+data.success.cartoon_medium+'" class="form-control" >';
                            if(data.success.cartoon_medium_qty){
                                html +='<label  class="form-label">>Cartoon(M)</label><input type="text" name="cartoon_medium_qty[]" placeholder="Medium Qty" class="form-control form-control-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_large==1){
                            html += '<input type="hidden" name="cartoon_large[]" value="'+data.success.cartoon_large+'" class="form-control" >';
                            if(data.success.cartoon_large_qty){
                                html +='<label  class="form-label">Cartoon(L)</label><input type="text" name="cartoon_large_qty[]" placeholder="Large Qty" class="form-control form-control-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_exrta_large==1){
                            html += '<input type="hidden" name="cartoon_exrta_large[]" value="'+data.success.cartoon_exrta_large+'" class="form-control" >';
                            if(data.success.cartoon_extar_large_qty){
                                html +='<label  class="form-label">Cartoon(XL)</label><input type="text" name="cartoon_extar_large_qty[]" placeholder="XL Qty" class="form-control form-control-sm" id="colFormLabelSm" >';
                            }
                            
                        }
                        if(data.success.cartoon_exrta_xxl==1){
                            html += '<input type="hidden" name="cartoon_exrta_xxl[]" value="'+data.success.cartoon_exrta_xxl+'" class="form-control" >';
                            if(data.success.cartoon_extar_large_xxl_qty){
                                html +='<label  class="form-label">Cartoon(XXL)</label><input type="text" name="cartoon_extar_large_xxl_qty[]" placeholder="XXL Qty" class="form-control form-control-sm" id="colFormLabelSm">';
                            }
                            
                        }

                    }

                    if(data.success.dozon){
                        html += '<input type="hidden" name="dozon[]" value="'+data.success.dozon+'" class="form-control" >';
                        if(data.success.dozon_qty){
                            html +='<label class="form-label">Dozon</label><input type="text" name="dozon_qty[]" placeholder="Dozon Qty" class="form-control form-control-sm" id="dozon_qty" >';
                        }
                    }
                    if(data.success.box){
                        html += '<input type="hidden" name="box[]" value="'+data.success.box+'" class="form-control" >';
                        if(data.success.box_qty){
                            html +='<label class="form-label">Box</label><input type="text" name="box_qty[]" placeholder="Box Qty" class="form-control form-control-sm" id="box_qty" >';
                        }
                    }
                    if(data.success.pices){
                        html += '<input type="hidden" name="pices[]" value="'+data.success.pices+'" class="form-control" >';
                        if(data.success.pices_qty){
                            html +='<label class="form-label">Pices</label><input type="text" name="pices_qty[]" placeholder="Pices Qty" class="form-control form-control-sm" id="pices_qty" >';
                        }
                    }
                    if(data.success.roll){
                        html += '<input type="hidden" name="roll[]" value="'+data.success.roll+'" class="form-control" >';
                        if(data.success.roll_qty==1){
                            html +='<label class="form-label">Roll</label><input type="text" name="roll_qty[]" placeholder="Roll Qty" class="form-control form-control-sm" id="roll_qty" >';
                        }

                    }

                    html +='</td>';
                    
                }else{
                    html +='<td><input type="text" name="unit_type[]" class="form-control"></td>'; 
                }

                html += '<td style="width:25%;"><input type="text" name="rate[]" class="form-control"></td>';

                 html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                 
                $('#product').append(html);

                
           }
        });
        
    });
    $(document).on('click', '.remove', function(){
      count--;
      $(this).closest("tr").remove();
    });

    $('#product_received_store').on('submit', function(event) {
        event.preventDefault();

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
            // beforeSend: function() {
            //     $("#seip_student_form_submit").html("<i class='fa fa-spinner fa-spin'></i> Processing");
            // },
            success: function(data) {


            }
        });
    });
    
</script>
@endsection
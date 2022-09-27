@extends('layouts.dashboard')
@section('content')
@can('product_received')
    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitBirds</a></li>
                    <li class="breadcrumb-item active">Product Feature</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
       
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h4 class="card-title">Manage Product Received</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <a href="{{route('product_received_add')}}" class="btn btn-success mb-3"><i class="mdi mdi-plus-circle me-2"></i> Add</a>
                        
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Received Chalan</th>
                                        <th>Product Name</th>
                                        <th>Product Received</th>
                                        <th>Yarn</th>
                                        <th>Material</th>
                                        <th>Brand</th>
                                        <th>Color</th>
                                        <th>Unit</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($count= 1)
                                    @foreach ($all_product_received as $key=>$product_received) 
                                        @php($product_feacture=App\Models\ProductFeature::where('product_name',$product_received->product_name)->first())
                                        <form class="product_received_update">   
                                            <tr>
                                                
                                                
                                                {{-- <td>{{$key+1}}</td> --}}
                                                {{-- <td>{{$count}}</td> --}}
                                                <td  class="data">
                                                    <input type="hidden" value="{{$product_received->id}}" name="product_received_id" readonly>
                                                    <input type="hidden" value="{{$count}}" class="count" readonly>
                                                    <input type="text" value="{{$product_received->received_chalan_id}}" class="form-control" id="" disabled="disabled" readonly>
                                                    {{-- <span> {{$product_received->received_chalan_id}}</span> --}}
                                                    </td>
                                                <td  class="data">
                                                    <input type="text" value="{{$product_received->product_name}}" class="form-control" name="{{$product_received->product_name}}" id="" disabled="disabled" readonly>
                                                    {{-- <span>  {{$product_received->product_name}}</span> --}}
                                                </td>
                                                <td class="data">
                                                    
                                                    @if($product_received->supplier_buyer_id)
                                                        <select class="form-control  supplier_select" name="supplier_buyer_id" id="supplier_select2" disabled="disabled">
                                                            <option value="">--Select Supplier --</option>
                                                            @foreach ($all_supplier_buyer as $supplier_buyer)
                                                            <option value="{{$supplier_buyer->id}}" {{ ( $supplier_buyer->id == $product_received->supplier_buyer_id) ? 'selected' : '' }}>{{$supplier_buyer->supplier_name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        {{-- <span> {{ $product_received->rel_to_suplier_buyer->supplier_name}}</span> --}}
                                                        @elseif($product_received->department_id)
                                                        <select class="form-control  department_select" name="department_id" id="department_id" disabled="disabled">
                                                            <option value="">--Select Department --</option>
                                                            @foreach ($all_department as $department)
                                                            <option value="{{$department->id}}" {{ ( $department->id == $product_received->department_id) ? 'selected' : '' }}>{{$department->department_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        {{-- <span > {{ $product_received->rel_to_department->department_name}}</span> --}}
                                                        {{-- {{ $product_received->rel_to_brand->supplier_name}} --}}
                                                
                                                    @else
                                                    {{ 'N/A'}}
                                                    @endif
                                                </td> 
                                                {{-- <td  class="data"> 
                                                    <style>
                                                        .yarn-span-hide span:last-child{
                                                            display: none;
                                                        }
                                                        .unit-span-hide span:last-child{
                                                            display: none;
                                                        }
                                                    </style>
                                                    <div class="yarn-span-hide data">
                                                        @if ($product_received->yarn_type_id)
                                                        <input type="text" value="{{ $product_received->rel_to_yarn->yarn_name}} " class="form-control" id="" disabled="disabled">
                                                            <span>,</span>
                                                        @endif
                                                        @if($product_received->brand_id)
                                                            {{ $product_received->rel_to_brand->brand_name}} <span>,</span>
                                                        @endif
                                                        @if($product_received->material_type_id)
                                                            {{ $product_received->rel_to_material->material_name}} <span>,</span>
                                                        @endif
                                                        @if($product_received->yarn_type_id=='' && $product_received->brand_id==''&& $product_received->material_type_id=='' )
                                                            {{'N/A'}}
                                                        @endif
        
                                                    </div>
        
                                                </td>     --}}
                                                <td>
                                                    @if ($product_received->yarn_type_id)
                                                    <select id="yarn_type_id_{{$count}}"  aria-label="Example select with button addon yarn_type_id"  name="yarn_type_id" class="form-control form-control-sm select2 yarn_type_id" disabled="disabled"><option value="">Select</option>
                                                        @foreach ($all_yarn as $yarn)
                                                        <option value="{{$yarn->id}}" {{ ( $yarn->id == $product_received->yarn_type_id) ? 'selected' : '' }}>{{$yarn->yarn_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                                
                                                    @else
                                                    <span><input type="text" class="form-control" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                                    {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product_received->material_type_id)
                                                    <select id="material_type_id{{$count}}"   name="material_type_id" class="form-control material_type_id" disabled="disabled"><option value="">Select</option>
                                                        @foreach ($all_material as $material)
                                                        <option value="{{$material->id}}" {{ ( $material->id == $product_received->material_type_id) ? 'selected' : '' }}>{{$material->material_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                                
                                                    @else
                                                    <span><input type="text" class="form-control" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                                    {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if ($product_received->brand_id)
                                                    <select id="brand_id_{{$count}}"    name="brand_id" class="form-control  brand_id" disabled="disabled"><option value="">Select</option>
                                                        @foreach ($all_brand as $brand)
                                                        <option value="{{$brand->id}}" {{ ( $brand->id == $product_received->brand_id) ? 'selected' : '' }}>{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                                
                                                    @else
                                                    <span><input type="text" class="form-control" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                                    {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product_received->color_id)
                                                    <select id="color_id{{$count}}"    name="color_id" class="form-control  color_id" disabled="disabled"><option value="">Select</option>
                                                        @foreach ($all_color as $color)
                                                        <option value="{{$color->id}}" {{ ( $color->id == $product_received->color_id) ? 'selected' : '' }}>{{$color->color_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                                
                                                    @else
                                                    <span><input type="text" class="form-control" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                                    {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                                    @endif
                                                </td>
                                                <td >
                                                    <div class="unit-span-hide ">
                                                    @if ($product_received->unit_type)
                                                        @if($product_received->cartoon)
                                                            @if($product_received->cartoon_qty_small)
                                                                {{-- Cartoon (S) : {{$product_received->cartoon_qty_small}}  <span>,</span> --}}
                                                                <label class="form-label">Cartoon (S) </label>
                                                                <input type="text" cartoon_qty_small="{{$product_feacture->cartoon_qty_small}}"  name="cartoon_qty_small" value=" {{$product_received->cartoon_qty_small}}" class="form-control form-control-sm cartoon_qty_small_{{$count}}" id="" disabled="disabled">
                                                            @elseif($product_received->cartoon_medium_qty)
                                                                {{-- Cartoon (M) : {{$product_received->cartoon_medium_qty}}  <span>,</span> --}}
                                                                <label class="form-label">Cartoon (M) </label>
                                                                <input type="text" cartoon_medium_qty="{{$product_feacture->cartoon_medium_qty}}"  name="cartoon_medium_qty" value=" {{$product_received->cartoon_medium_qty}}" class="form-control form-control-sm cartoon_medium_qty_{{$count}}" id="" disabled="disabled">
                                                            @elseif($product_received->cartoon_large_qty)  <span>,</span>
                                                                {{-- Cartoon (L) : {{$product_received->cartoon_large_qty}}  <span>,</span> --}}
                                                                <label class="form-label">Cartoon (L) </label>
                                                                <input type="text" cartoon_large_qty="{{$product_feacture->cartoon_large_qty}}" name="cartoon_large_qty" value=" {{$product_received->cartoon_large_qty}}" class="form-control form-control-sm cartoon_large_qty_{{$count}}" id="" disabled="disabled">
                                                            @elseif($product_received->cartoon_extar_large_qty)
                                                                {{-- Cartoon (XL) : {{$product_received->cartoon_extar_large_qty}}  <span>,</span> --}}
                                                                <label class="form-label">Cartoon (XL) </label>
                                                                <input cartoon_extar_large_qty="{{$product_feacture->cartoon_extar_large_qty}}"  type="text" name="cartoon_extar_large_qty" value=" {{$product_received->cartoon_extar_large_qty}}" class="form-control form-control-sm cartoon_extar_large_qty_{{$count}}" id="" disabled="disabled">
                                                            @elseif($product_received->cartoon_extar_large_xxl_qty	)  <span>,</span>
                                                                {{-- Cartoon (XXL) : {{$product_received->cartoon_extar_large_xxl_qty	}}  <span>,</span> --}}
                                                                <label class="form-label">Cartoon (XXL) </label>
                                                                <input cartoon_exrta_large_xxl="{{$product_feacture->cartoon_extar_large_xxl_qty}}" name="cartoon_extar_large_xxl_qty" type="text" value=" {{$product_received->cartoon_extar_large_xxl_qty}}" class="form-control form-control-sm cartoon_extar_large_xxl_qty_{{$count}}" id="" disabled="disabled">
                                                            @endif
                                                        @endif
                                                        @if($product_received->dozon_qty)
                                                            {{-- Dozon : {{$product_received->dozon_qty}}  <span>,</span> --}}
                                                            <label class="form-label">Dozon </label>
                                                            <input name="dozon_qty" type="text" value=" {{$product_received->dozon_qty}}" dozon_stock="{{$product_feacture->dozon_qty}}" class="form-control form-control-sm dozon_qty_{{$count}}" id="" disabled="disabled">
                                                        @endif
                                                        @if($product_received->box_qty)
                                                            <label class="form-label">Box </label>
                                                            <input name="box_qty"  type="text" value=" {{$product_received->box_qty}}"  box_stock="{{$product_feacture->box_qty}}" class="form-control form-control-sm box_qty_{{$count}}" id="" disabled="disabled">
                                                            {{-- Box : {{$product_received->box_qty}}  <span>,</span> --}}
                                                        @endif
                                                        @if($product_received->roll_qty)
                                                            {{-- Roll : {{$product_received->roll_qty}}  <span>,</span> --}}
                                                            <label class="form-label" style="opacity: 10;">Roll </label>
                                                            <input  name="roll_qty" roll_stock="{{$product_feacture->pices_qty}}" type="text" value=" {{$product_received->roll_qty}}" class="form-control form-control-sm roll_qty_{{$count}}" id="" disabled="disabled">
                                                        @endif
                                                        @if ($product_received->weight)
                                                            @if($product_received->weight_kg)
                                                                {{-- Weight (Kg) : {{$product_received->weight_kg_qty}}  <span>,</span> --}}
                                                                <label class="form-label" style="opacity: 10;">Kg</label>
                                                                <input type="text" weight_kg_stock="{{$product_feacture->weight_kg_qty}}"   name="weight_kg_qty" value=" {{$product_received->weight_kg_qty}}" class="form-control form-control-sm weight_kg_qty_{{$count}}" id="" disabled="disabled">
                                                            @elseif($product_received->weight_pound)
                                                                <label class="form-label" style="opacity: 10;">Pound</label>
                                                                <input type="text"  weight_pound_stock="{{$product_feacture->weight_pound_qty}}" name="weight_pound_qty" value=" {{$product_received->weight_pound_qty}}" class="form-control form-control-sm weight_pound_qty_{{$count}}" id="" disabled="disabled">
                                                            {{-- Weight (
                                                                Pound) : {{$product_received->weight_pound_qty}}  <span>,</span> --}}
                                                            @endif
                                                            
                                                        @endif
                                                        @if($product_received->pices_qty)
                                                            {{-- Pices : {{$product_received->pices_qty}}  <span>,</span> --}}
                                                            <label class="form-label" style="opacity: 10;">Pices </label>
                                                            <input name="pices_qty" type="text" value=" {{$product_received->pices_qty}}"  pices_stock="{{$product_feacture->pices_qty}}"  class="form-control form-control-sm  pices_qty_{{$count}}"  id="" disabled="disabled">
                                                        @endif
                                                        
                                                    @else
                                                    {{ 'N/A'}}
                                                    @endif
        
                                                    </div>
                                                    
                                                </td>   
                                                <td>
                                                    @if($product_received->rate)
                                                    {{-- Weight (Kg) : {{$product_received->weight_kg_qty}}  <span>,</span> --}}
                                                    {{-- <label class="form-label">Rate</label> --}}
                                                    <input type="text" name="rate" value=" {{$product_received->rate}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                    @endif
                                                </td> 
                                                <?php
                                                     $stock_last_value=  App\Models\ProductReceived::where('product_name', $product_received->product_name)->where('yarn_type_id',  $product_received->yarn_type_id)->where('brand_id',  $product_received->brand_id)->where('color_id',  $product_received->color_id)->where('material_type_id',  $product_received->material_type_id)->orderBy('created_at', 'DESC')->first();
                                                    //  dd($stock_last_value)

                                                ?>
                                              
                                                {{-- @if(isset($stock_last_value)) --}}
                                                    <td class="table-action">
                                                        <a title="Edit" class="action-icon edit"> <i class="mdi mdi-pencil"></i></a>
                                                        <button title="save" type="submit"  class="action-icon save d-none"><i class="fa fa-refresh" aria-hidden="true"></i>save</button>
                                                        <a title="Delete" class="action-icon" data-bs-target="#delete_modal_{{$product_received->id}}" data-bs-toggle="modal" href="#delete_modal_{{$product_received->id}}"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                {{-- @endif --}}
        
                                                <div id="delete_modal_{{$product_received->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal-colored-header bg-danger">
                                                                <h4 class="modal-title" id="danger-header-modalLabel">Delete</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="mb-4">Are you sure want to delete?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button name="{{$product_received->id }}" id="toastr-two" class="btn btn-danger btn_delete" id="btn-save-event">Delete</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div> 
                                            </tr>
                                            @php($count++)
                                        </form>   
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

@else
    @include('admin.role.error');
@endcan 
@endsection

@section('footer_script')
    <script>

        $(document).ready(function() {
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/productReceivedDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        
                        $('.delete_modal').hide();
                        // $('.modal-backdrop').hide();
                        toastr.error(data.success);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
    <script>
        // $(document).on('click', '.edit', function() {  
        //     $(this).parent().siblings('td.data').each(function() {  
        //         var content = $(this).html();  
        //         // alert(content);
        //         $(this).html('<input class="form-control" value="' + content + '" />');  
        //     });  
        //     // $(this).siblings('.save').show();  
        //     // $(this).siblings('.delete').hide();  
        //     // $(this).hide();  

        $(document).on('click', '.edit', function() {
            $(this).closest('tr').find('input,select').prop('disabled', false);	
            $(this).closest('tr').find('a').hide();
            $(this).closest('tr').find('button').removeClass('d-none');
            $(this).closest('tr').find('button').addClass('block');
            $(this).closest('tr').find('input,select',).removeClass('d-none');
            $(this).closest('tr').find('input,select').addClass('block');
            // $(this).closest('tr').find('span').addClass('d-none');
            // $(this).siblings('.save').show();  
        });

       

    </script>
    <script>
        $('.product_received_update').on('submit', function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/product-received-update",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    if(data.error){
                        toastr.error(data.error);
                    }else{
                        $('.save').hide();
                        $('.edit').closest('tr').find('input,select').prop('disabled', true);	
                        $('.edit').closest('tr').find('a').show();
                        // window.location.reload();
                        toastr.success(data.success);
                    }
                    
                }
            });
        });
    </script>
    <script>

        
        var count=$('.count').val();
        
        $(".yarn_type_id").select2();
        $(".department_select").select2();
        $(".supplier_select").select2();
        $(".brand_id").select2();
        $(".material_type_id").select2();
        $(".color_id").select2();

        box_stock_check(count);
        roll_stock_check(count)
        dozon_stock_check(count);
        pices_stock_check(count);
        cartoon_extar_large_xxl_stock_check(count);
        cartoon_extar_large_stock_check(count);
        cartoon_large_qty_stock_check(count);
        cartoon_medium_qty_stock_check(count);
        cartoon_qty_small_stock_check(count);
        weight_stock_check(count);
        function roll_stock_check(count){
           $(".roll_qty_"+count).on("keyup", function() {
              var roll_qty= $('.roll_qty_'+count).val();
              var roll_qty_stock=$('.roll_qty_'+count).attr('roll_stock');
              var pices_stock_store=roll_qty*roll_qty_stock;
              $('.pices_qty_'+count).val(pices_stock_store);
              $('.weight_kg_qty_'+count).val(pices_stock_store);
              $('.weight_pound_qty_'+count).val(pices_stock_store);
           });
        }
        function dozon_stock_check(count){
           $(".dozon_qty_"+count).on("keyup", function() {
              var dozon_qty= $('.dozon_qty_'+count).val();
              var dozon_qty_stock=$('.dozon_qty_'+count).attr('dozon_stock');
              var pices_stock_store=dozon_qty*dozon_qty_stock;
              $('.pices_qty_'+count).val(pices_stock_store);
              $('.weight_kg_qty_'+count).val(pices_stock_store);
              $('.weight_pound_qty_'+count).val(pices_stock_store);
           });
        }
   
        function cartoon_extar_large_xxl_stock_check(count){
           $(".cartoon_extar_large_xxl_qty_"+count).on("keyup", function() {
              var cartoon_extar_large_xxl_qty_qty= $('.cartoon_extar_large_xxl_qty_'+count).val();
              var cartoon_extar_large_xxl_qty_stock=$('.cartoon_extar_large_xxl_qty_'+count).attr('cartoon_exrta_large_xxl');
              var cartoon_extar_large_xxl_qty_store=cartoon_extar_large_xxl_qty_qty*cartoon_extar_large_xxl_qty_stock;
              $('.pices_qty_'+count).val(cartoon_extar_large_xxl_qty_store);
              $('.weight_kg_qty_'+count).val(cartoon_extar_large_xxl_qty_store);
              $('.weight_pound_qty_'+count).val(cartoon_extar_large_xxl_qty_store);
   
           });
        }
        function cartoon_extar_large_stock_check(count){
           $(".cartoon_extar_large_qty_"+count).on("keyup", function() {
              var cartoon_extar_large_qty= $('.cartoon_extar_large_qty_'+count).val();
              var cartoon_extar_large_qty_stock=$('.cartoon_extar_large_qty_'+count).attr('cartoon_extar_large_qty');
              var cartoon_extar_large_qty_store=cartoon_extar_large_qty*cartoon_extar_large_qty_stock;
              $('.pices_qty_'+count).val(cartoon_extar_large_qty_store);
              $('.weight_kg_qty_'+count).val(cartoon_extar_large_qty_store);
              $('.weight_pound_qty_'+count).val(cartoon_extar_large_qty_store);
           });
           
        }
        function cartoon_large_qty_stock_check(count){
           $(".cartoon_large_qty_"+count).on("keyup", function() {
               var cartoon_large_qty= $('.cartoon_large_qty_'+count).val();
               var cartoon_large_qty_stock=$('.cartoon_large_qty_'+count).attr('cartoon_large_qty');
               var cartoon_large_qty_store=cartoon_large_qty*cartoon_large_qty_stock;
               $('.pices_qty_'+count).val(cartoon_large_qty_store);
               $('.weight_kg_qty_'+count).val(cartoon_large_qty_store);
               $('.weight_pound_qty_'+count).val(cartoon_large_qty_store);
           });
        }
        function cartoon_medium_qty_stock_check(count){
           $(".cartoon_medium_qty_"+count).on("keyup", function() {
              var cartoon_medium_qty= $('.cartoon_medium_qty_'+count).val();
              var cartoon_medium_qty_stock=$('.cartoon_medium_qty_'+count).attr('cartoon_medium_qty');
              var cartoon_medium_qty_store=cartoon_medium_qty*cartoon_medium_qty_stock;
              $('.pices_qty_'+count).val(cartoon_medium_qty_store);
              $('.weight_kg_qty_'+count).val(cartoon_medium_qty_store);
              $('.weight_pound_qty_'+count).val(cartoon_medium_qty_store);
           });
        }
        function cartoon_qty_small_stock_check(count){
           $(".cartoon_qty_small_"+count).on("keyup", function() {
              var cartoon_qty_small= $('.cartoon_qty_small_'+count).val();
              var cartoon_qty_small_stock=$('.cartoon_qty_small_'+count).attr('cartoon_qty_small');
              var cartoon_qty_small_store=cartoon_qty_small*cartoon_qty_small_stock;
              $('.pices_qty_'+count).val(cartoon_qty_small_store);
              $('.weight_kg_qty_'+count).val(cartoon_qty_small_store);
              $('.weight_pound_qty_'+count).val(cartoon_qty_small_store);
           });
        }
       function box_stock_check(count){
           // var count =0;
           $(".box_qty_"+count).on("keyup", function() {
              var box_qty= $('.box_qty_'+count).val();
           //    var pices_qty= $('.box_qty_'+count).attr('pices_stock');
              var box_qty_stock=$('.box_qty_'+count).attr('box_stock');
              var pices_stock_store=box_qty*box_qty_stock;
              $('.pices_qty_'+count).val(pices_stock_store);
              $('.weight_kg_qty_'+count).val(pices_stock_store);
              $('.weight_pound_qty_'+count).val(pices_stock_store);
           //    console.log(pices_stock_store)
           });    
       }
   
       function pices_stock_check(count){
           // var count =0;
           $('.pices_qty_'+count).on("keyup", function() {
              var pices_qty= $('.pices_qty_'+count).val();
            //   console.log(pices_qty)
              var box_qty_stock=$('.box_qty_'+count).attr('box_stock');
              var box_pices_stock = pices_qty/box_qty_stock;
              $('.box_qty_'+count).val(box_pices_stock);
            //   var dozon_qty_stock=$('.dozon_qty_'+count).attr('dozon_stock');
            //   var dozon_stock = pices_qty/dozon_qty_stock;
            //   $('.dozon_qty_'+count).val(dozon_stock);
            //   var roll_qty_stock=$('.roll_qty_'+count).attr('roll_stock');
            //   var roll_stock = pices_qty/roll_qty_stock;
            //   $('.roll_qty_'+count).val(roll_stock);
   
   
            //   var cartoon_qty_small_stock=$('.cartoon_qty_small_'+count).attr('cartoon_qty_small');
            //   var cartoon_qty_small_stock = pices_qty/cartoon_qty_small_stock;
            //   $('.cartoon_qty_small_'+count).val(cartoon_qty_small_stock);
   
            //   var cartoon_medium_qty_stock=$('.cartoon_medium_qty_'+count).attr('cartoon_medium_qty');
            //   var  cartoon_medium_qty_stock = pices_qty/cartoon_medium_qty_stock;
            //   $('.cartoon_medium_qty_'+count).val(cartoon_medium_qty_stock);
   
            //   var cartoon_large_qty_stock=$('.cartoon_large_qty_'+count).attr('cartoon_large_qty');
            //   var  cartoon_large_qty_stock = pices_qty/cartoon_large_qty_stock;
            //   $('.cartoon_large_qty_'+count).val(cartoon_large_qty_stock);
            //   var cartoon_extar_large_qty_stock=$('.cartoon_extar_large_qty_'+count).attr('cartoon_extar_large_qty');
            //   var  cartoon_extar_large_qty_stock = pices_qty/cartoon_extar_large_qty_stock;
            //   $('.cartoon_extar_large_qty_'+count).val(cartoon_extar_large_qty_stock);
            //   var cartoon_exrta_large_xxl_qty_stock=$('.cartoon_extar_large_xxl_qty_'+count).attr('cartoon_exrta_large_xxl');
            //   var  cartoon_exrta_large_xxl_qty_stock = pices_qty/cartoon_exrta_large_xxl_qty_stock;
            //   $('.cartoon_extar_large_xxl_qty_'+count).val(cartoon_exrta_large_xxl_qty_stock);
         
   
           //  console.log(box_qty);
           //    var pices_stock= $('.pices_qty_'+count).attr('pices_stock');           
           //    var pices_stock_store=pices_qty/pices_stock;
          
           //    $('.dozon_qty_'+count).val(pices_stock_store);
           //    $('.cartoon_extar_large_xxl_qty_'+count).val(pices_stock_store);
           //    $('.cartoon_extar_large_qty_'+count).val(pices_stock_store);
           //    $('.cartoon_large_qty_'+count).val(pices_stock_store);
           //    $('.cartoon_medium_qty_'+count).val(pices_stock_store);
           //    $('.cartoon_qty_small_'+count).val(pices_stock_store);
           });
       }
       function weight_stock_check(count){
           // var count =0;
           $('.weight_kg_qty_'+count).on("keyup", function() {
              var weight_kg_qty= $('.weight_kg_qty_'+count).val();
               //    console.log(weight_kg_qty)
              var box_qty_stock=$('.box_qty_'+count).attr('box_stock');
              var box_kg_stock = weight_kg_qty/box_qty_stock;
              $('.box_qty_'+count).val(box_kg_stock);
   
              var dozon_qty_stock=$('.dozon_qty_'+count).attr('dozon_stock');
              var dozon_stock = weight_kg_qty/dozon_qty_stock;
              $('.dozon_qty_'+count).val(dozon_stock);
              var roll_qty_stock=$('.roll_qty_'+count).attr('roll_stock');
              var roll_stock = weight_kg_qty/roll_qty_stock;
              $('.roll_qty_'+count).val(roll_stock);
   
   
              var cartoon_qty_small_stock=$('.cartoon_qty_small_'+count).attr('cartoon_qty_small');
              var cartoon_qty_small_stock = weight_kg_qty/cartoon_qty_small_stock;
              $('.cartoon_qty_small_'+count).val(cartoon_qty_small_stock);
   
              var cartoon_medium_qty_stock=$('.cartoon_medium_qty_'+count).attr('cartoon_medium_qty');
              var  cartoon_medium_qty_stock = weight_kg_qty/cartoon_medium_qty_stock;
              $('.cartoon_medium_qty_'+count).val(cartoon_medium_qty_stock);
   
              var cartoon_large_qty_stock=$('.cartoon_large_qty_'+count).attr('cartoon_large_qty');
              var  cartoon_large_qty_stock = weight_kg_qty/cartoon_large_qty_stock;
              $('.cartoon_large_qty_'+count).val(cartoon_large_qty_stock);
              var cartoon_extar_large_qty_stock=$('.cartoon_extar_large_qty_'+count).attr('cartoon_extar_large_qty');
              var  cartoon_extar_large_qty_stock = weight_kg_qty/cartoon_extar_large_qty_stock;
              $('.cartoon_extar_large_qty_'+count).val(cartoon_extar_large_qty_stock);
              var cartoon_exrta_large_xxl_qty_stock=$('.cartoon_extar_large_xxl_qty_'+count).attr('cartoon_exrta_large_xxl');
              var  cartoon_exrta_large_xxl_qty_stock = weight_kg_qty/cartoon_exrta_large_xxl_qty_stock;
              $('.cartoon_extar_large_xxl_qty_'+count).val(cartoon_exrta_large_xxl_qty_stock);
           });
           $('.weight_pound_qty_'+count).on("keyup", function() {
               var weight_pound_qty= $('.weight_pound_qty_'+count).val();
                   //    console.log(weight_kg_qty)
               var box_qty_stock=$('.box_qty_'+count).attr('box_stock');
               var box_kg_stock = weight_pound_qty/box_qty_stock;
               $('.box_qty_'+count).val(box_kg_stock);
   
               var dozon_qty_stock=$('.dozon_qty_'+count).attr('dozon_stock');
               var dozon_stock = weight_pound_qty/dozon_qty_stock;
               $('.dozon_qty_'+count).val(dozon_stock);
               var roll_qty_stock=$('.roll_qty_'+count).attr('roll_stock');
               var roll_stock = weight_pound_qty/roll_qty_stock;
               $('.roll_qty_'+count).val(roll_stock);
   
   
               var cartoon_qty_small_stock=$('.cartoon_qty_small_'+count).attr('cartoon_qty_small');
               var cartoon_qty_small_stock = weight_pound_qty/cartoon_qty_small_stock;
               $('.cartoon_qty_small_'+count).val(cartoon_qty_small_stock);
   
               var cartoon_medium_qty_stock=$('.cartoon_medium_qty_'+count).attr('cartoon_medium_qty');
               var  cartoon_medium_qty_stock = weight_pound_qty/cartoon_medium_qty_stock;
               $('.cartoon_medium_qty_'+count).val(cartoon_medium_qty_stock);
   
               var cartoon_large_qty_stock=$('.cartoon_large_qty_'+count).attr('cartoon_large_qty');
               var  cartoon_large_qty_stock = weight_pound_qty/cartoon_large_qty_stock;
               $('.cartoon_large_qty_'+count).val(cartoon_large_qty_stock);
               var cartoon_extar_large_qty_stock=$('.cartoon_extar_large_qty_'+count).attr('cartoon_extar_large_qty');
               var  cartoon_extar_large_qty_stock = weight_pound_qty/cartoon_extar_large_qty_stock;
               $('.cartoon_extar_large_qty_'+count).val(cartoon_extar_large_qty_stock);
               var cartoon_exrta_large_xxl_qty_stock=$('.cartoon_extar_large_xxl_qty_'+count).attr('cartoon_exrta_large_xxl');
               var  cartoon_exrta_large_xxl_qty_stock = weight_pound_qty/cartoon_exrta_large_xxl_qty_stock;
               $('.cartoon_extar_large_xxl_qty_'+count).val(cartoon_exrta_large_xxl_qty_stock);
           });
       }
   </script>
@endsection
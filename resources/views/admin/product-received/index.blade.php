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
                    <table  class="table dt-responsive nowrap w-100">
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
                                <tr>
                                    <input type="hidden" id="{{$count}}">
                                    
                                    {{-- <td>{{$key+1}}</td> --}}
                                    {{-- <td>{{$count}}</td> --}}
                                    <td  class="data">
                                        <input type="text" value=" {{$product_received->received_chalan_id}}" class="form-control form-control-sm" id="" disabled="disabled">
                                        {{-- <span> {{$product_received->received_chalan_id}}</span> --}}
                                        </td>
                                    <td  class="data">
                                        <input type="text" value="{{$product_received->product_name}}" class="form-control form-control-sm" id="" disabled="disabled">
                                        {{-- <span>  {{$product_received->product_name}}</span> --}}
                                    </td>
                                    <td class="data">
                                        @if ($product_received->department_id)
                                            <select class="form-control form-control-sm department_id" name="department_id" id="department_select2" data-toggle="select2" disabled="disabled">
                                                <option value="">--Select Department --</option>
                                                @foreach ($all_department as $department)
                                                <option value="{{$department->id}}" {{ ( $department->id == $product_received->department_id) ? 'selected' : '' }}>{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                            {{-- <span > {{ $product_received->rel_to_department->department_name}}</span> --}}
                                            {{-- {{ $product_received->rel_to_brand->supplier_name}} --}}
                                        @elseif($product_received->supplier_buyer_id)
                                            <select class="form-control form-control-sm supplier_select" name="supplier_buyer_id" id="supplier_select2" data-toggle="select2" disabled="disabled">
                                                <option value="">--Select Supplier --</option>
                                                @foreach ($all_supplier_buyer as $supplier_buyer)
                                                <option value="{{$supplier_buyer->id}}" {{ ( $supplier_buyer->id == $product_received->supplier_buyer_id) ? 'selected' : '' }}>{{$supplier_buyer->supplier_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                            {{-- <span> {{ $product_received->rel_to_suplier_buyer->supplier_name}}</span> --}}
                                       
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
                                        <select id="yarn_type_id_{{$count}}"  aria-label="Example select with button addon yarn_type_id"  name="yarn_type_id" class="form-control select2 yarn_type_id" disabled="disabled"><option value="">Select</option>
                                            @foreach ($all_yarn as $yarn)
                                            <option value="{{$yarn->id}}">{{$yarn->yarn_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                       
                                        @else
                                        <span><input type="text" class="form-control form-control-sm" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                        {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product_received->material_type_id)
                                        <select id="brand_id_{{$count}}"   name="brand_id" class="form-control material_type_id" disabled="disabled"><option value="">Select</option>
                                            @foreach ($all_material as $material)
                                            <option value="{{$material->id}}">{{$material->material_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                       
                                        @else
                                        <span><input type="text" class="form-control form-control-sm" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                        {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                        @endif
                                    </td>
                                      
                                    <td>
                                        @if ($product_received->brand_id)
                                        <select id="brand_id_{{$count}}"    name="brand_id" class="form-control brand_id" disabled="disabled"><option value="">Select</option>
                                            @foreach ($all_brand as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                       
                                        @else
                                        <span><input type="text" class="form-control form-control-sm" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                        {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product_received->color_id)
                                        <select id="brand_id_{{$count}}"    name="color_id" class="form-control color_id" disabled="disabled"><option value="">Select</option>
                                            @foreach ($all_color as $color)
                                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <span>{{ $product_received->rel_to_yarn->yarn_name}}</span> --}}
                                       
                                        @else
                                        <span><input type="text" class="form-control form-control-sm" value="{{ 'N/A'}}" disabled="disabled" readonly></span>
                                        {{-- <input type="hidden" class="form-control" value="{{ 'N/A'}}"> --}}
                                        @endif
                                    </td>
                                      
                                    <td >
                                        <div class="unit-span-hide ">
                                        @if ($product_received->unit_type)
                                            @if ($product_received->weight)
                                                @if($product_received->weight_kg)
                                                    {{-- Weight (Kg) : {{$product_received->weight_kg_qty}}  <span>,</span> --}}
                                                    <label class="form-label">Weight(kg)</label>
                                                    <input type="text" value=" {{$product_received->weight_kg_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @elseif($product_received->weight_pound)
                                                    <label class="form-label">Weight(Pound)</label>
                                                    <input type="text" value=" {{$product_received->weight_pound_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                {{-- Weight (
                                                    Pound) : {{$product_received->weight_pound_qty}}  <span>,</span> --}}
                                                @endif
                                                
                                            @endif
                                            @if($product_received->cartoon)
                                                @if($product_received->cartoon_qty_small)
                                                    {{-- Cartoon (S) : {{$product_received->cartoon_qty_small}}  <span>,</span> --}}
                                                    <label class="form-label">Cartoon (S) </label>
                                                    <input type="text" value=" {{$product_received->cartoon_qty_small}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @elseif($product_received->cartoon_medium_qty)
                                                     {{-- Cartoon (M) : {{$product_received->cartoon_medium_qty}}  <span>,</span> --}}
                                                    <label class="form-label">Cartoon (M) </label>
                                                    <input type="text" value=" {{$product_received->cartoon_medium_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @elseif($product_received->cartoon_large_qty)  <span>,</span>
                                                     {{-- Cartoon (L) : {{$product_received->cartoon_large_qty}}  <span>,</span> --}}
                                                    <label class="form-label">Cartoon (L) </label>
                                                    <input type="text" value=" {{$product_received->cartoon_large_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @elseif($product_received->cartoon_extar_large_qty)
                                                    {{-- Cartoon (XL) : {{$product_received->cartoon_extar_large_qty}}  <span>,</span> --}}
                                                    <label class="form-label">Cartoon (XL) </label>
                                                    <input type="text" value=" {{$product_received->cartoon_extar_large_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @elseif($product_received->cartoon_extar_large_xxl_qty	)  <span>,</span>
                                                    {{-- Cartoon (XXL) : {{$product_received->cartoon_extar_large_xxl_qty	}}  <span>,</span> --}}
                                                    <label class="form-label">Cartoon (XXL) </label>
                                                    <input type="text" value=" {{$product_received->cartoon_extar_large_xxl_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                @endif
                                            @endif
                                            @if($product_received->dozon_qty)
                                                {{-- Dozon : {{$product_received->dozon_qty}}  <span>,</span> --}}
                                                <label class="form-label">Dozon </label>
                                                <input type="text" value=" {{$product_received->dozon_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                            @endif
                                            @if($product_received->box_qty)
                                                <label class="form-label">Box </label>
                                                <input type="text" value=" {{$product_received->box_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                                {{-- Box : {{$product_received->box_qty}}  <span>,</span> --}}
                                            @endif
                                            @if($product_received->pices_qty)
                                                {{-- Pices : {{$product_received->pices_qty}}  <span>,</span> --}}
                                                <label class="form-label">Pices </label>
                                                <input type="text" value=" {{$product_received->pices_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                            @endif
                                            @if($product_received->roll_qty)
                                                {{-- Roll : {{$product_received->roll_qty}}  <span>,</span> --}}
                                                <label class="form-label">Roll </label>
                                                <input type="text" value=" {{$product_received->roll_qty}}" class="form-control form-control-sm" id="" disabled="disabled">
                                            @endif
                                        @else
                                        {{ 'N/A'}}
                                        @endif

                                        </div>
                                        
                                    </td>   
                                    <td>
                                        @if($product_received->rate)
                                        {{-- Weight (Kg) : {{$product_received->weight_kg_qty}}  <span>,</span> --}}
                                        <label class="form-label">Rate</label>
                                        <input type="text" value=" {{$product_received->rate}}" class="form-control form-control-sm" id="" disabled="disabled">
                                        @endif
                                    </td>                               
                                
                                    <td class="table-action">
                                        <a title="Edit" class="action-icon edit"> <i class="mdi mdi-pencil"></i></a>
                                        <button title="save"  class="action-icon save d-none"><i class="fa fa-refresh" aria-hidden="true"></i>save</button>
                                        <a title="Delete" class="action-icon" data-bs-target="#delete_modal_{{$product_received->id}}" data-bs-toggle="modal" href="#delete_modal_{{$product_received->id}}"> <i class="mdi mdi-delete"></i></a>
                                    </td>

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
                            @endforeach
                        
                        </tbody>
                    </table>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    
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

        $(".edit").on("click", function(){
            $(this).closest('tr').find('input,select,button').prop('disabled', false);	
            $(this).closest('tr').find('a').hide();
            $(this).closest('tr').find('button').removeClass('d-none');
            $(this).closest('tr').find('button').addClass('block');
            $(this).closest('tr').find('input,select',).removeClass('d-none');
            $(this).closest('tr').find('input,select').addClass('block');
            // $(this).closest('tr').find('span').addClass('d-none');
            // $(this).siblings('.save').show();  
        });

        $(".yarn_type_id").select2();
        $(".department_id").select2();
        $(".supplier_select").select2();
        $(".brand_id").select2();
        $(".material_type_id").select2();
        // $(".department_id").select2();
        // $(".department_id").select2();
    </script>
@endsection
@extends('layouts.dashboard')
@section('content')
@can('product_feature')
    
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
                            <h4 class="card-title">Manage Product Feature</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('product_feacture_add')}}" class="btn btn-danger mb-3"><i class="mdi mdi-plus-circle me-2"></i> Add Product</a>
                            
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="row">
                        {{-- <div class="table-responsive"> --}}
                            <table  id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Feature</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($add_product_feacture as $key=>$product_feacture)       
                                        <tr>
                                            {{-- <td>{{$key+1}}</td> --}}
                                            <td> {{$product_feacture->product_name}}</td>
                                            <td> {{$product_feacture->category}}</td>
                                            <td>
                                                <style>
                                                    .product_feacture span:last-child{
                                                        display: none;
                                                    }
                                                    /* .product_feacturespan:last-child{
                                                        display: none;
                                                    }
                                                    .weifght_featcure span:last-child{
                                                        display: none;
                                                    } */
                                                </style>
                                                <div class="product_feacture">
                                                    @php
                                                       if($product_feacture->unit_type==1){
                                                            if($product_feacture->brand==1){
                                                            echo 'Brand' . ' , ';
                                                            }if($product_feacture->yarn_type==1){
                                                                echo 'YarnType' . ' <span> , </span> ';
                                                            }if($product_feacture->material_type==1){
                                                                echo 'Material' . '<span> , </span>';
                                                            }if($product_feacture->color==1){
                                                                echo 'Color' . '<span> , </span>';
                                                            }
                                                            if($product_feacture->weight==1){
                                                                echo '<div class="weifght_featcure">Weight' .' ( ';
                                                                if($product_feacture->weight_kg==1){
                                                                    echo 'Kg' .'<span> , </span>';
                                                                }if($product_feacture->weight_pound==1){
                                                                    echo 'Pound'.'<span> , </span>';
                                                                }
                                                                echo ' )</div>';
                                                            }                                                    
                                                            if($product_feacture->cartoon==1){
                                                                echo '<div class="cartoon_featcure"> Cartoon' .' ( ';
                                                                if($product_feacture->cartoon_small==1){
                                                                    echo 'S' .'<span> , </span>';
                                                                }if($product_feacture->cartoon_medium==1){
                                                                    echo 'M' .' <span> , </span> ';
                                                                }if($product_feacture->cartoon_large==1){
                                                                    echo 'L' .' <span> , </span> ';
                                                                }if($product_feacture->cartoon_exrta_large==1){
                                                                    echo 'XL' .' <span> , </span> ';
                                                                }if($product_feacture->cartoon_exrta_xxl==1){
                                                                    echo 'XXL'.' <span> , </span> ';
                                                                }
                                                                echo ' ) </div>';
                                                            }if($product_feacture->box==1){
                                                                echo ' Box' . ' <span> , </span>';
                                                            }if($product_feacture->dozon){
                                                                echo ' Dozon' . ' <span> , </span>';
                                                            }
                                                            if($product_feacture->pices==1){
                                                                echo ' Pices' . ' <span> , </span>';
                                                            }
                                                            if($product_feacture->roll==1){
                                                                echo ' Roll' . ' <span> , </span>';
                                                            }
                                                       }else{
                                                        echo 'N/A';
                                                       }
                                                    @endphp
                                                </div>
                                            </td>                                         
                                        
                                            <td class="table-action">
                                                <a title="Edit" href="{{route('product_feacture_edit',$product_feacture->id)}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                <a title="Delete" class="action-icon" data-bs-target="#delete_modal_{{$product_feacture->id}}" data-bs-toggle="modal" href="#delete_modal_{{$product_feacture->id}}"> <i class="mdi mdi-delete"></i></a>
                                            </td>

                                            <div id="delete_modal_{{$product_feacture->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                                            <button name="{{$product_feacture->id }}" id="toastr-two" class="btn btn-danger btn_delete" id="btn-save-event">Delete</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        {{-- </div> --}}
                    </div>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
@endcan
@endsection

@section('footer_script')
<script>
    $('input[name="unit_type"]').change(function() {
        var  unit_type =  $('input[name="unit_type"]:checked').val();
        if(unit_type ==1){       
            $('.unit_type_check').removeClass('d-none');
            $('.unit_type_check').addClass('block');
        }
        if(unit_type==0){
            $('.unit_type_check').removeClass('block');
            $('.unit_type_check').addClass('d-none');

            $('input[name="brand"]:checked').val('');
            $('input[name="yarn_type"]:checked').val('');
            $('input[name="mterial_type"]:checked').val('');
            $('input[name="unit_type"]:checked').val('');
            $('input[name="weight"]:checked').val('');
            $('input[name="Weights_kgs"]:checked').val('');
            $('input[name="Weights_pounds"]:checked').val('');
            $('input[name="cartoon"]:checked').val('');
            $('input[name="cartoon"]:checked').val('');
            $('input[name="cartoon_small"]:checked').val('');
            $('input[name="cartoon_medium"]:checked').val('');
            $('input[name="cartoon_large"]:checked').val('');
            $('input[name="cartoon_exrta_large"]:checked').val(''); 
            $('input[name="cartoon_exrta_xxl"]:checked').val(''); 
            $('input[name="color"]:checked').val('');
            $('input[name="box"]:checked').val('');
            $('input[name="dozon"]:checked').val('');
            $('input[name="pices"]:checked').val('');
            $('input[name="roll"]:checked').val('');
        }
    });
    $('#weight').click(function() {
        if($(this).is(":checked")) {
            $('.weight_check').removeClass('d-none');
            $('.weight_check').addClass('block');
        } else {
            $('.weight_check').removeClass('block');
            $('.weight_check').addClass('d-none');
        }
    });
    $('#cartoon').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_check').removeClass('d-none');
            $('.cartoon_check').addClass('block');
        } else {
            $('.cartoon_check').removeClass('block');
            $('.cartoon_check').addClass('d-none');
        }
    });
    $('input[name="cartoon_small"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_small_check').removeClass('d-none');
            $('.cartoon_qty_small_check').addClass('block');
        } else {
            $('.cartoon_qty_small_check').removeClass('block');
            $('.cartoon_qty_small_check').addClass('d-none');
        }
    });
    $('input[name="cartoon_medium"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_medium_check').removeClass('d-none');
            $('.cartoon_qty_medium_check').addClass('block');
        } else {
            $('.cartoon_qty_medium_check').removeClass('block');
            $('.cartoon_qty_medium_check').addClass('d-none');
        }
    });
    $('input[name="cartoon_large"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_large_check').removeClass('d-none');
            $('.cartoon_qty_large_check').addClass('block');
        } else {
            $('.cartoon_qty_large_check').removeClass('block');
            $('.cartoon_qty_large_check').addClass('d-none');
        }
    });
    $('input[name="cartoon_exrta_large"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_extra_large_check').removeClass('d-none');
            $('.cartoon_qty_extra_large_check').addClass('block');
        } else {
            $('.cartoon_qty_extra_large_check').removeClass('block');
            $('.cartoon_qty_extra_large_check').addClass('d-none');
        }
    });
    $('input[name="cartoon_exrta_xxl"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_extra_large_xxl_check').removeClass('d-none');
            $('.cartoon_qty_extra_large_xxl_check').addClass('block');
        } else {
            $('.cartoon_qty_extra_large_xxl_check').removeClass('block');
            $('.cartoon_qty_extra_large_xxl_check').addClass('d-none');
        }
    });
    $('input[name="box"]').click(function() {
        if($(this).is(":checked")) {
            $('.box_check').removeClass('d-none');
            $('.box_check').addClass('block');
        } else {
            $('.box_check').removeClass('block');
            $('.box_check').addClass('d-none');
        }
    });
    $('input[name="dozon"]').click(function() {
        if($(this).is(":checked")) {
            $('.dozon_check').removeClass('d-none');
            $('.dozon_check').addClass('block');
        } else {
            $('.dozon_check').removeClass('block');
            $('.dozon_check').addClass('d-none');
        }
    });
    $('input[name="pices"]').click(function() {
        if($(this).is(":checked")) {
            $('.pices_check').removeClass('d-none');
            $('.pices_check').addClass('block');
        } else {
            $('.pices_check').removeClass('block');
            $('.pices_check').addClass('d-none');
        }
    });
    $('input[name="roll"]').click(function() {
        if($(this).is(":checked")) {
            $('.roll_check').removeClass('d-none');
            $('.roll_check').addClass('block');
        } else {
            $('.roll_check').removeClass('block');
            $('.roll_check').addClass('d-none');
        }
    });

</script>

<script>

    $(document).ready(function() {
        $('.btn_delete').click(function() {
            var id=  $(this).attr('name');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "GET",
                dataType: "json",
                url:"/productFeactureDelete/"+id,
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
{{-- <script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('product_feacture') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'product_name', name: 'product_name'},
              {data: 'category', name: 'category'},
              {data: 'yarn_type', name: 'yarn_type'},
              {data: 'brand', name: 'brand'},
              {data: 'matiral_type', name: 'matiral_type'},
              {data: 'color', name: 'color'},
              {data: 'unit_type', name: 'unit_type'},
              {data: 'weight', name: 'weight'},
              {data: 'weight_kg', name: 'weight_kg'},
              {data: 'cartoon', name: 'cartoon'},
              {data: 'cartoon_small', name: 'cartoon_small'},
              {data: 'cartoon_medium', name: 'cartoon_medium'},
              {data: 'cartoon_large', name: 'cartoon_large'},
              {data: 'cartoon_exrta_large', name: 'cartoon_exrta_large'},
              {data: 'cartoon_exrta_xxl', name: 'cartoon_exrta_xxl'},
              {data: 'dozon', name: 'dozon'},
              {data: 'pices', name: 'pices'},
              {data: 'roll', name: 'roll'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script> --}}
    
@endsection
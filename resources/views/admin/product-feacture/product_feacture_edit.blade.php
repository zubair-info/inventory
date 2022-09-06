@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">Product Feacture Edit</li>
                </ol>
            </div>
            <h4 class="page-title">Feacture Edit</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('productFeactureUpdate')}}" method="post" id="addform">
                        @csrf
                        <input type="hidden" name="product_feacture_id"  value="{{$add_product_feacture->id}}">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4">
                                
                                    <h6 class="font-15">Product Name</h6>
                                    <div class="form-group mb-2">
                                        {{-- <label class="form-label">Product Name</label> --}}
                                        <input type="text" class="form-control product_name" value="{{$add_product_feacture->product_name}}" name="product_name"  placeholder="Enter product name">
                                        <span style="color:red;" id="product_name"></span>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <h6 class="font-15">Category</h6>
                                    <div class="form-group mb-2">
                                        {{-- <label class="form-label">Category</label> --}}
                                        <select class="form-control select2 category"  name="category" data-toggle="select2">
                                            <option value="">Select</option>
                                            <option value="Accessories" {{$add_product_feacture->category=='Accessories' ? 'selected' : ''}} >Accessories</option>
                                            <option value="Other"  {{$add_product_feacture->category=='Other' ? 'selected' : ''}}>Others</option>
                                        </select>
                                        <span style="color:red;" id="category"></span>
                                    </div>

                                    
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="font-15">Description</h6>
                                    <div class="form-group mt-2">
                                        {{-- <label class="form-label">Description</label> --}}
                                        <input type="text" class="form-control" value="{{$add_product_feacture->description}}" name="description"  placeholder="Enter product description">
                                       
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <h6 class="font-15 mt-3">Yarn Type</h6>
                                    <div class="mt-2">
                                        
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="radio" id="yarn_type_yes" value="1" {{$add_product_feacture->yarn_type=='1' ? 'checked' : ''}} name="yarn_type" class="form-check-input yarn_type">
                                            <label class="form-check-label" for="yarn_type_yes">Yes</label>
                                        </div>
                                        <div class="form-check  form-checkbox-danger mb-2 form-check-inline">
                                            <input type="radio" {{$add_product_feacture->yarn_type=='0' ? 'checked' : ''}} id="yarn_type_no"  value="0" name="yarn_type" class="form-check-input yarn_type">
                                            <label class="form-check-label" for="yarn_type_no">No</label>
                                        </div>
                                    </div>
                                    <span style="color:red;" id="yarn_type"></span>

                                </div>
                                <div class="col-lg-3">
                                    <h6 class="font-15 mt-3">Brand</h6>
                                    <div class="mt-2">
                                        
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="radio" id="barnd_yes" {{$add_product_feacture->brand=='1' ? 'checked' : ''}} value="1" name="brand" class="form-check-input brand">
                                            <label class="form-check-label" for="barnd_yes">Yes</label>
                                        </div>
                                        <div class="form-check  form-checkbox-danger mb-2 form-check-inline">
                                            <input type="radio" id="barnd_no" {{$add_product_feacture->yarn_type=='0' ? 'checked' : ''}} value="0" name="brand" class="form-check-input">
                                            <label class="form-check-label" for="barnd_no">No</label>
                                        </div>
                                    </div>
                                   
                                    <span style="color:red;" id="brand"></span>
                                </div>
                                <div class="col-lg-3">
                                    <h6 class="font-15 mt-3">Material Type</h6>
                                    <div class="mt-2">
                                        
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="radio" id="mterial_yes" {{$add_product_feacture->matiral_type=='1' ? 'checked' : ''}} value="1" name="mterial_type" class="form-check-input mterial_type">
                                            <label class="form-check-label"  for="mterial_yes">Yes</label>
                                        </div>
                                        <div class="form-check  form-checkbox-danger mb-2 form-check-inline">
                                            <input type="radio" id="mterial_no" {{$add_product_feacture->matiral_type=='0' ? 'checked' : ''}} value="0" name="mterial_type" class="form-check-input mterial_type">
                                            <label class="form-check-label" for="mterial_no">No</label>
                                        </div>
                                    </div>
                                    <span style="color:red;" id="mterial_type"></span>

                                </div>
                                <div class="col-lg-3">
                                    <h6 class="font-15 mt-3">Color</h6>
                                    <div class="mt-2">
                                        
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="radio" id="color_yes" {{$add_product_feacture->color=='1' ? 'checked' : ''}} value="1" name="color" class="form-check-input color">
                                            <label class="form-check-label" for="color_yes">Yes</label>
                                        </div>
                                        <div class="form-check  form-checkbox-danger mb-2 form-check-inline">
                                            <input type="radio" id="color_no" {{$add_product_feacture->color=='0' ? 'checked' : ''}} value="0" name="color" class="form-check-input color">
                                            <label class="form-check-label" for="color_no">No</label>
                                        </div>
                                    </div>
                                    <span style="color:red;" id="color"></span>
                                </div>
                            </div>
                            <div class="row">
                                <h6 class="font-15 mt-3">Unit</h6>
                                <div class="mt-2">                                           
                                    <div class="form-check form-checkbox-info mb-2 form-check-inline unit_type">
                                        <input type="radio" id="unit_type_yes" {{$add_product_feacture->unit_type=='1' ? 'checked' : ''}} value="1" name="unit_type" class="form-check-input unit_type">
                                        <label class="form-check-label" for="unit_type_yes">Yes</label>
                                    </div>
                                    <div class="form-check  form-checkbox-danger mb-2 form-check-inline">
                                        <input type="radio" id="unit_type_no" {{$add_product_feacture->unit_type=='0' ? 'checked' : ''}}  value="0" name="unit_type" class="form-check-input unit_type">
                                        <label class="form-check-label" for="unit_type_no">No</label>
                                    </div>
                                    <span style="color:red;" id="unit_type"></span>
                                </div>
                                <div class="unit_type_check d-none" style="margin-left:23px;" id="unit_type_check">
                                    <div class="mt-2">
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline weight">
                                            <input type="checkbox" name="weight" id="weight"  {{$add_product_feacture->weight=='1' ? 'checked' : ''}} id="weight" value="1" class="form-check-input">
                                            <label class="form-check-label" for="weight">Weight</label>
                                        </div>

                                        <div class="weight_check d-none"  style="margin-left: 23px;">
                                            <div class="form-check  mb-2 form-check-inline">
                                                <input type="checkbox" name="Weights_kgs"  {{$add_product_feacture->weight_kg=='1' ? 'checked' : ''}} value="1" class="form-check-input" id="weightKgCheck">
                                                <label class="form-check-label" for="weightKgCheck">Kg</label>
                                            </div>
                                            <div class="form-check  mb-2 form-check-inline">
                                                <input type="checkbox" {{$add_product_feacture->weight_pound=='1' ? 'checked' : ''}} name="Weights_pounds" value="1" class="form-check-input" id="weightPoundCheck">
                                                <label class="form-check-label" for="weightPoundCheck">Pound</label>
                                            </div>

                                        </div>
                                        <div class="form-check  form-checkbox-success mb-2 form-check-inline">
                                            <input type="checkbox" name="cartoon"  {{$add_product_feacture->cartoon=='1' ? 'checked' : ''}} id="cartoon" value="1"  class="form-check-input">
                                            <label class="form-check-label" for="cartoon">Cartoon</label>
                                        </div>
                                        <div class="cartoon_check d-none"  style="margin-left:23px;">
                                            <div class="form-check  mb-2 form-check-inline">
                                                <input type="checkbox" name="cartoon_small" {{$add_product_feacture->cartoon_small=='1' ? 'checked' : ''}} value="1" id="cartoon_small" class="form-check-input" id="cartoon_small">
                                                <label class="form-check-label" for="cartoon_small">S</label>
                                            </div>
                                            <div class="form-group mb-2 col-lg-2  cartoon_qty_small_check d-none" style="margin-left: 23px;">
                                                <input type="text"  value="{{$add_product_feacture->cartoon_qty_small}}" class="form-control" id="cartoon_small_qty" name="cartoon_qty_small"  placeholder="Enter quantity ">
                                                <span style="color:red;" id="cartoon_small_qty"></span>
                                            </div>

                                            <div class="form-check  mb-2 form-check-inline">
                                                <input type="checkbox" {{$add_product_feacture->cartoon_medium=='1' ? 'checked' : ''}} name="cartoon_medium" value="1" class="form-check-input" id="cartoon_medium">
                                                <label class="form-check-label" for="cartoon_medium">M</label>
                                            </div>
                                            <div class="form-group mb-2 col-lg-2 d-none cartoon_qty_medium_check" style="margin-left: 23px;">
                                                <input type="text" class="form-control" value="{{$add_product_feacture->cartoon_medium_qty}}" name="cartoon_medium_qty"  placeholder="Enter quantity ">
                                                <span style="color:red;" id="cartoon_medium_qty"></span>
                                            </div>

                                            <div class="form-check  mb-2 form-check-inline">
                                                <input type="checkbox" {{$add_product_feacture->cartoon_large=='1' ? 'checked' : ''}} name="cartoon_large" value="1"  class="form-check-input" id="cartoon_large">
                                                <label class="form-check-label" for="cartoon_large">L</label>
                                            </div>
                                            <div class="form-group mb-2 col-lg-2 d-none cartoon_qty_large_check" style="margin-left: 23px;">
                                                <input type="text" class="form-control" value="{{$add_product_feacture->cartoon_large_qty}}" id="cartoon_large_qty" name="cartoon_large_qty"  placeholder="Enter quantity ">
                                                <span style="color:red;" id="cartoon_large_qty"></span>
                                            </div>
                                            <div class="form-check mb-2 form-check-inline">
                                                <input type="checkbox" name="cartoon_exrta_large" value="1"  class="form-check-input" {{$add_product_feacture->cartoon_exrta_large=='1' ? 'checked' : ''}} id="cartoon_exrta_large">
                                                <label class="form-check-label" for="cartoon_exrta_large">XL</label>
                                            </div>
                                            <div class="form-group mb-2 col-lg-2 d-none cartoon_qty_extra_large_check" style="margin-left: 23px;">
                                                <input type="text" class="form-control" value="{{$add_product_feacture->cartoon_extar_large_qty}}" id="cartoon_extar_large_qty" name="cartoon_extar_large_qty"  placeholder="Enter quantity ">
                                                <span style="color:red;" id="cartoon_extar_large_qty"></span>
                                            </div>
                                            <div class="form-check mb-2 form-check-inline ">
                                                <input type="checkbox" {{$add_product_feacture->cartoon_exrta_xxl=='1' ? 'checked' : ''}} name="cartoon_exrta_xxl" value="1"  class="form-check-input" id="cartoon_exrta_xxl">
                                                <label class="form-check-label" for="cartoon_exrta_xxl">XXL</label>
                                            </div>
                                            <div class="form-group mb-2 col-lg-2 d-none cartoon_qty_extra_large_xxl_check" style="margin-left: 23px;">
                                                <input type="text" class="form-control" value="{{$add_product_feacture->cartoon_extar_large_xxl_qty}}"  id="cartoon_extar_large_xxl_qty" name="cartoon_extar_large_xxl_qty"  placeholder="Enter quantity ">
                                                <span style="color:red;" id="cartoon_extar_large_xxl_qty"></span>
                                            </div>

                                        </div>
                                        <div class="form-check form-checkbox-success  mb-2 form-check-inline">
                                            <input type="checkbox" id="box" name="box" value="1"  {{$add_product_feacture->box=='1' ? 'checked' : ''}} class="form-check-input" id="box">
                                            <label class="form-check-label" for="box">Box</label>
                                        </div>
                                        <div class="form-group mb-2 col-lg-2 d-none box_check" style="margin-left: 23px;">
                                            <input type="text"  class="form-control" value="{{$add_product_feacture->box_qty}}"  id="box_qty" name="box_qty"  placeholder="Enter quantity ">
                                            <span style="color:red;" id="box_qty"></span>
                                        </div>
                                        <div class="form-check form-checkbox-success  mb-2 form-check-inline">
                                            <input type="checkbox"  {{$add_product_feacture->dozon=='1' ? 'checked' : ''}} name="dozon" value="1" id="dozon" class="form-check-input" id="customCheckcolor4">
                                            <label class="form-check-label" for="dozon">Dozon</label>
                                        </div>
                                        <div class="form-group mb-2 col-lg-2 d-none dozon_check" style="margin-left: 23px;">
                                            <input type="text"  value="{{$add_product_feacture->dozon_qty}}"  class="form-control" id="dozon_qty" name="dozon_qty"  placeholder="Enter quantity ">
                                            <span style="color:red;" id="dozon_qty"></span>
                                        </div>
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="checkbox" {{$add_product_feacture->pices=='1' ? 'checked' : ''}} name="pices" value="1" class="form-check-input" id="pices">
                                            <label class="form-check-label" for="pices">Pices</label>
                                        </div>
                                        <div class="form-group mb-2 col-lg-2 d-none pices_check" style="margin-left: 23px;">
                                            <input type="text"  value="{{$add_product_feacture->pices_qty}}" class="form-control" id="pices_qty" name="pices_qty"  placeholder="Enter quantity ">
                                            <span style="color:red;" id="pices_qty"></span>
                                        </div>
                                        <div class="form-check form-checkbox-success mb-2 form-check-inline">
                                            <input type="checkbox" {{$add_product_feacture->roll=='1' ? 'checked' : ''}}  name="roll" value="1" id="roll" class="form-check-input" id="roll">
                                            <label class="form-check-label" for="roll">Roll</label>
                                        </div>
                                        <div class="form-group mb-2 col-lg-2 d-none roll_check" style="margin-left: 23px;">
                                            <input type="text"  value="{{$add_product_feacture->roll_qty}}" class="form-control" id="roll_qty" name="roll_qty"  placeholder="Enter quantity ">
                                            <span style="color:red;" id="roll_qty"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-sm-end mt-2">
                                <button type="button" class="btn btn-primary submit">
                                    <i class="mdi mdi-cash-multiple me-1 submit"></i>Update Feacture</button>
                            </div>
                
                        </div>
                    </form>
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->
@endsection

@section('footer_script')
<script>

$('.submit').on('click',function(){
        if(check_data()){
            $('.submit').attr( 'type','submit');        
        }
    }) ;

    function check_data(){
        var product_name= $('.product_name').val();
        var category= $('.category').val();
        var brand =   $('.brand').val();
        var brand = document.getElementsByName('brand');
        var brandValue = false;

        for(var i=0; i<brand.length;i++){
            if(brand[i].checked == true){
                brandValue = true;    
            }
        }
        var yarn_type = document.getElementsByName('yarn_type');
        var yarn_type_value = false;

        for(var i=0; i<yarn_type.length;i++){
            if(yarn_type[i].checked == true){
                yarn_type_value = true;    
            }
        }
        var mterial_type = document.getElementsByName('mterial_type');
        var mterial_type_value = false;

        for(var i=0; i<mterial_type.length;i++){
            if(mterial_type[i].checked == true){
                mterial_type_value = true;    
            }
        }
        var color = document.getElementsByName('color');
        var color_value = false;

        for(var i=0; i<color.length;i++){
            if(color[i].checked == true){
                color_value = true;    
            }
        }
        var unit_type = document.getElementsByName('unit_type');
        var unit_type_value = false;

        for(var i=0; i<unit_type.length;i++){
            if(unit_type[i].checked == true){
                unit_type_value = true;    
            }
        }
        if(product_name==''){
            $('.product_name').focus();
            $('#product_name').html('Enter Product Name');
            toastr.error("Enter Product Name");
            return false;
        }else if(category==''){
            $('.category').focus();
            $('#category').html('Enter Category');
            toastr.warning("EnterCategory");
            return false;
        }
        else if(!yarn_type_value){
            $('.yarn_type').focus();
            $('#yarn_type').html('Enter Yarn Type');
            toastr.warning("Enter Yarn Type");
            return false;
        }
        else if(!brandValue){
            $('.brand').focus();
            $('#brand').html('Enter Brand');
            toastr.warning("Enter Brand");
           
            return false;
        }
        else if(!mterial_type_value){
            $('.mterial_type').focus();
            $('#mterial_type').html('Enter Mterial Type');
            return false;
        }
        else if(!color_value){
            $('.color').focus();
            $('#color').html('Enter Mterial Type');
            toastr.warning("Enter Mterial Type");
            return false;
        }
        else if(!unit_type_value){
            $('.unit_type').focus();
            $('#unit_type').html('Enter Unit Type');
            toastr.warning("Enter Unit Type");
            return false;
        }else if(unit_type_value){
            var  unit_type =  $('input[name="unit_type"]:checked').val();
            if(unit_type ==1){       
                 // alert($(this).val());
                if($('#weight').prop("checked") == true){
                    console.log("Weight is checked.");
                    if($('#weightKgCheck').prop("checked") == true){
                        console.log("weightKgCheck is checked.");
                    }else if($('#weightPoundCheck').prop("checked") == true){
                        console.log("weightPoundCheck is checked.");
                    }else{
                        // alert('Weight kg  and pound at list one checked')
                        console.log("Weight is unhecked.");
                        toastr.warning("Weight kg  and pound at list one checked");
                        return false;

                    }
                }else if($('#pices').prop("checked") == true){
                    console.log("Pices is checked.");
                }else{
                    // alert('Weight and pices at list one checked');
                    toastr.warning("Weight and pices at list one checked");
                    console.log("Weight is unhecked.");
                    return false;
                }

                if($('#cartoon').prop("checked") == true){
                   
                    console.log("cartoon is checked.");
                    if($('#cartoon_small').prop("checked") == true){
                        console.log("cartoon_small is checked.");
                        var cartoon_small_qty = $('#cartoon_small_qty').val();
                        if(cartoon_small_qty==''){
                            toastr.warning("Cartoon Small Size");
                            return false;
                        }
                       
                    }
                    else if($('#cartoon_medium').prop("checked") == true){
                        console.log("cartoon_medium is checked.");
                        var cartoon_medium_qty = $('#cartoon_medium_qty').val();
                        if(cartoon_medium_qty==''){
                            toastr.warning("Cartoon M Size Requried");
                            return false;
                        }
                    
                    }
                    else if($('#cartoon_large').prop("checked") == true){
                        var cartoon_large_qty = $('#cartoon_large_qty').val();
                        if(cartoon_large_qty==''){
                            toastr.warning("Cartoon L Size Requried");
                            return false;
                        }
                        console.log("cartoon_large is checked.");
                    }
                    else if($('#cartoon_exrta_large').prop("checked") == true){
                        var cartoon_extar_large_qty = $('#cartoon_extar_large_qty').val();
                        if(cartoon_extar_large_qty==''){
                            toastr.warning("Cartoon XL Size Requried");
                            return false;
                        }
                        console.log("cartoon_exrta_large is checked.");
                    }else if($('#cartoon_exrta_xxl').prop("checked") == true){
                        var cartoon_extar_large_xxl_qty = $('#cartoon_extar_large_xxl_qty').val();
                        if(cartoon_extar_large_xxl_qty==''){
                            toastr.warning("Cartoon XLL Size Requried");
                            return false;
                        }
                        console.log("cartoon_exrta_xxl is checked.");
                    }
                    else{
                        toastr.warning("Size at list one checked");
                        return false;

                    }
                }
                if($('#dozon').prop("checked") == true){
                    console.log("dozon is checked.");
                    var dozon_qty = $('#dozon_qty').val();
                    if(dozon_qty==''){
                        toastr.warning("Dozon Value Requried");
                        return false;
                    }
                }
                if($('#pices').prop("checked") == true){
                    console.log("pices is checked.");
                    var pices_qty = $('#pices_qty').val();
                    if(pices_qty==''){
                        toastr.warning("Pices Value Requried");
                        return false;
                    }
                }
                if($('#roll').prop("checked") == true){
                    console.log("roll is checked.");
                    var roll_qty = $('#roll_qty').val();
                    if(roll_qty==''){
                        toastr.warning("Roll Value Requried");
                        return false;
                    }
                }

            }
        }
        return true;
    }
    //   $('input[name="weight"]:checked').attr("required", "true");
    // alert($('input[name="unit_type"]:checked').val());
   var unit_type =  $('input[name="unit_type"]:checked').val();
   if(unit_type==1){
       $('input[name="unit_type"]:checked').parent().parent().siblings('.unit_type_check').removeClass('d-none');
        $('input[name="unit_type"]:checked').parent().parent().siblings('.unit_type_check').addClass('block');
   }
   if(unit_type==0){
        $('input[name="unit_type"]:checked').parent().parent().siblings('.unit_type_check').removeClass('block');
        $('input[name="unit_type"]:checked').parent().parent().siblings('.unit_type_check').addClass('d-none');
   }


    // alert();
    $('input[name="weight"]:checked').parent().siblings('.weight_check').removeClass('d-none');
    $('input[name="cartoon"]:checked').parent().siblings('.cartoon_check').removeClass('d-none');
    $('input[name="box"]:checked').parent().siblings('.box_check').removeClass('d-none');
    $('input[name="dozon"]:checked').parent().siblings('.dozon_check').removeClass('d-none');
    $('input[name="pices"]:checked').parent().siblings('.pices_check').removeClass('d-none');
    $('input[name="roll"]:checked').parent().siblings('.roll_check').removeClass('d-none');
    $('input[name="cartoon_small"]:checked').parent().siblings('.cartoon_qty_small_check ').removeClass('d-none');
    $('input[name="cartoon_medium"]:checked').parent().siblings('.cartoon_qty_medium_check').removeClass('d-none');
    $('input[name="cartoon_large"]:checked').parent().siblings('.cartoon_qty_large_check').removeClass('d-none');
    $('input[name="cartoon_exrta_large"]:checked').parent().siblings('.cartoon_qty_extra_large_check').removeClass('d-none'); 
    $('input[name="cartoon_exrta_xxl"]:checked').parent().siblings('.cartoon_qty_extra_large_xxl_check').removeClass('d-none'); 
    // $('input[name="weight"]:checked').parent().parent().siblings().siblings('.weiget').removeClass('d-none');
    // $('input[name="unit_type"]:checked'). parent().parent().siblings('unit_type_check').addClass('block');
//    parent().parent().siblings('unit_type_check').removeClass('d-none');
//    parent().parent().siblings('unit_type_check').addClass('block');
   
    $('input[name="unit_type"]').change(function() {
        var  unit_type =  $('input[name="unit_type"]:checked').val();
        if(unit_type ==1){       
            $('.unit_type_check').removeClass('d-none');
            $('.unit_type_check').addClass('block');
        }
        if(unit_type==0){
            

            $('input[name="brand"]:checked').val(0);
            $('input[name="yarn_type"]:checked').val(0);
            $('input[name="mterial_type"]:checked').val(0);
            $('input[name="unit_type"]:checked').val(0);
            $('input[name="weight"]:checked').val(0);
            $('input[name="Weights_kgs"]:checked').val(0);
            $('input[name="Weights_pounds"]:checked').val(0);
            $('input[name="cartoon"]:checked').val(0);
            $('input[name="cartoon"]:checked').val(0);
            $('input[name="cartoon_small"]:checked').val(0);
            $('input[name="cartoon_medium"]:checked').val(0);
            $('input[name="cartoon_large"]:checked').val(0);
            $('input[name="cartoon_exrta_large"]:checked').val(0); 
            $('input[name="cartoon_exrta_xxl"]:checked').val(0); 
            $('input[name="box"]:checked').val(0);
            $('input[name="dozon"]:checked').val(0);
            $('input[name="pices"]:checked').val(0);
            $('input[name="roll"]:checked').val(0);
            
            $('input[name="cartoon_qty_small"]').val('');
            $('input[name="cartoon_medium_qty"]').val('');
            $('input[name="cartoon_large_qty"]').val('');
            $('input[name="cartoon_extar_large_qty"]').val('');
            $('input[name="cartoon_extar_large_xxl_qty"]').val('');

            $('.unit_type_check').removeClass('block');
            $('.unit_type_check').addClass('d-none');
            $('#unit_type_check').removeClass('block');
            $('#unit_type_check').addClass('d-none');
            
        }
    });
    $('#weight').click(function() {
       
        if($(this).is(":checked")) {
            $('.weight_check').removeClass('d-none');
            $('.weight_check').addClass('block');
            // $('input[name="weight"]:checked').attr("required", "true");
        } else {
            $('.weight_check').removeClass('block');
            $('.weight_check').addClass('d-none');

            $('input[name="weight"]:checked').val('');
            $('input[name="Weights_kgs"]:checked').val('');
            $('input[name="Weights_pounds"]:checked').val('');
            $('input[name="cartoon_extar_large_xxl_qty"]').val('');
            // $('input[name="weight"]:checked').attr("required", "false");
        }
    });
    $('#cartoon').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_check').removeClass('d-none');
            $('.cartoon_check').addClass('block');
        } else {
            $('.cartoon_check').removeClass('block');
            $('.cartoon_check').addClass('d-none');
            $('input[name="cartoon"]:checked').val('');
            $('input[name="cartoon"]:checked').val('');
            $('input[name="cartoon_small"]:checked').val('');
            $('input[name="cartoon_medium"]:checked').val('');
            $('input[name="cartoon_large"]:checked').val('');
            $('input[name="cartoon_exrta_large"]:checked').val(''); 
            $('input[name="cartoon_exrta_xxl"]:checked').val(''); 

            $('input[name="cartoon_qty_small"]').val('');
            $('input[name="cartoon_medium_qty"]').val('');
            $('input[name="cartoon_large_qty"]').val('');
            $('input[name="cartoon_extar_large_qty"]').val('');
            $('input[name="cartoon_extar_large_xxl_qty"]').val('');
        }
    });
    $('input[name="cartoon_small"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_small_check').removeClass('d-none');
            $('.cartoon_qty_small_check').addClass('block');
        } else {
            $('.cartoon_qty_small_check').removeClass('block');
            $('.cartoon_qty_small_check').addClass('d-none');
            $('input[name="cartoon_qty_small"]').val('');
        }
    });
    $('input[name="cartoon_medium"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_medium_check').removeClass('d-none');
            $('.cartoon_qty_medium_check').addClass('block');
        } else {
            $('.cartoon_qty_medium_check').removeClass('block');
            $('.cartoon_qty_medium_check').addClass('d-none');
            $('input[name="cartoon_medium_qty"]').val('');
        }
    });
    $('input[name="cartoon_large"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_large_check').removeClass('d-none');
            $('.cartoon_qty_large_check').addClass('block');
        } else {
            $('.cartoon_qty_large_check').removeClass('block');
            $('.cartoon_qty_large_check').addClass('d-none');
            $('input[name="cartoon_large_qty"]').val('');
        }
    });
    $('input[name="cartoon_exrta_large"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_extra_large_check').removeClass('d-none');
            $('.cartoon_qty_extra_large_check').addClass('block');
        } else {
            $('.cartoon_qty_extra_large_check').removeClass('block');
            $('.cartoon_qty_extra_large_check').addClass('d-none');
            $('input[name="cartoon_extar_large_qty"]').val('');
        }
    });
    $('input[name="cartoon_exrta_xxl"]').click(function() {
        if($(this).is(":checked")) {
            $('.cartoon_qty_extra_large_xxl_check').removeClass('d-none');
            $('.cartoon_qty_extra_large_xxl_check').addClass('block');
        } else {
            $('.cartoon_qty_extra_large_xxl_check').removeClass('block');
            $('.cartoon_qty_extra_large_xxl_check').addClass('d-none');
            $('input[name="cartoon_extar_large_xxl_qty"]').val('');
        }
    });
    $('input[name="box"]').click(function() {
        if($(this).is(":checked")) {
            $('.box_check').removeClass('d-none');
            $('.box_check').addClass('block');
        } else {
            $('.box_check').removeClass('block');
            $('.box_check').addClass('d-none');
            $('input[name="box"]:checked').val('');
        }
    });
    $('input[name="dozon"]').click(function() {
        if($(this).is(":checked")) {
            $('.dozon_check').removeClass('d-none');
            $('.dozon_check').addClass('block');
        } else {
            $('.dozon_check').removeClass('block');
            $('.dozon_check').addClass('d-none');
            $('input[name="dozon"]:checked').val('');
        
        }
    });
    $('input[name="pices"]').click(function() {
        if($(this).is(":checked")) {
            $('.pices_check').removeClass('d-none');
            $('.pices_check').addClass('block');
        } else {
            $('.pices_check').removeClass('block');
            $('.pices_check').addClass('d-none');
            $('input[name="pices"]:checked').val('');
           
        }
    });
    $('input[name="roll"]').click(function() {
        if($(this).is(":checked")) {
            $('.roll_check').removeClass('d-none');
            $('.roll_check').addClass('block');
        } else {
            $('.roll_check').removeClass('block');
            $('.roll_check').addClass('d-none');
            $('input[name="roll"]:checked').val('');
        }
    });
    // $( ".submit" ).click(function() {
    //     var product_name= $('.product_name').val();
    //     var brand =   $('input[name="brand"]:checked').val();
    //     var unit_type =   $('input[name="unit_type"]:checked').val();
    //         $('input[name="yarn_type"]:checked').val();
    //         $('input[name="mterial_type"]:checked').val();
    //         $('input[name="unit_type"]:checked').val();
    //         $('input[name="weight"]:checked').val();
    //         $('input[name="Weights_kgs"]:checked').val();
    //         $('input[name="Weights_pounds"]:checked').val();
    //     if(product_name==''){
    //         $('.product_name').attr("required", "true");
    //         $('.product_name').css('border','1px solid red');

    //     }else{
    //         // $('.submit').attr( 'type','submit');
    //     }
    //     if(brand==''){
    //         $('.brand').attr("required", "true");
    //         $('.brand').css('border','1px solid red');
    //     }
    //     if(unit_type==''){
    //         $('.unit_type').attr("required", "true");
    //         $('.unit_type').css('border','1px solid red');
    //     }
    //     // $('.submit').attr( 'type','submit');
       
    // });

    


</script>

    
@endsection
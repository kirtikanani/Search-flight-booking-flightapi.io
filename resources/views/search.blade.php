@include('layouts.header')

<content class="float-left w-100 " id="content" >

  <section class="section-1 section-about float-left w-100">


    <div class="container-fluid my-5">

    

      <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 adddata md-0">

    <?php if((!empty($cat_data) && count($cat_data) > 0) || (!empty($product) && count($product) > 0)){?>
        <div class="row" id="row">
          
          @foreach($product as $pro)
            
          

            <div class="col-md-3">
                <div class="banner_img_new">
                    <div class="discount_banner ">
                        <!-- <div class="discount_count">0% OFF</div> -->
                    </div>
                    <?php if($pro->label_tag != ''){ ?> 
                                <div class="image_set">
                                    <div class="image_off">
                                        {{$pro->label_tag}}
                                    </div>
                                </div>
                    <?php } ?>
                    <?php
                        $image = $pro->upload_file;
                        $destinationPath =url('assets/admin/uploads/products/'.$image);
                        
                    ?>    
                    <div class="items_banner height_img">
                        <a href="{{ route('products',$pro->product_slug) }}">
                            <img src="{{$destinationPath}}" class="images_banner">
                        </a>
                    </div>
                    <div class="img_details">
                        <div class="img_name_details">
                            <h4>{{$pro->product_name}}</h4>
                        </div>
                    </div>
                    <table class="product_table">
                        <tbody>
                        <?php 
                                    $variation = DB::table('product_attribute')->where('product_id',$pro->id)->get();
                                    $arr = json_decode($variation[0]->attribute, true);
                                    $AttKeyName = array();
                                    foreach($arr as $var){ 
                                        $keys = array_keys($var);
                                        $AttKeyName[] = $keys[0];
                                    }
                                    if(!empty($AttKeyName)){
                                        $AttKeyName_string = implode(',',$AttKeyName);
                                    }else{
                                        $AttKeyName_string = '';
                                    }
                                    ?>
                            <tr>
                                <td>Avg Price </td>
                                <!--<td class="text-right"><i class="fas fa-rupee-sign"></i> {{\AppHelper::instance()->get_price($pro->product_price)}}</td>-->
                                <td class="text-right">
                                    <!--<i class="fas fa-rupee-sign"></i> -->
                                    {{ \AppHelper::instance()->get_price($pro->product_price) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Total Design </td>
                                <td class="text-right">{{$pro->total_design}}</td>
                            </tr>
                            
                         
                            
                            <?php echo \AppHelper::instance()->get_attribute($pro->id,'home') ; ?>
                            
                            <?php
                                       
                                       $all_category = array();
                                       $pro_cat_id = explode(',',$pro->category);
                                        
                                       for($c = 0;$c < count($pro_cat_id);$c++){
                                           $category = DB::table('manage_category')->where('id',$pro_cat_id[$c])->get();
                                           $all_category[] = $category[0]->category_name;
                                       }
                                       
                                       if(count($all_category) > 1 ){
                                           $cat_srting = implode(',',$all_category);
                                           $cat_srting = substr($cat_srting,0,12);
                                           $cat_srting .= '....';
                                       }else{
                                           $cat_srting = $all_category[0];
                                       }
                                      
                                      ?>

                            <tr>
                                <td> Type</td>
                                <td class="text-right ">
                                    <span class="size-te">{{$cat_srting}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('products',$pro->product_slug) }}">
                                        <div class="product_view">View Catalog</div>
                                        <input type="hidden" name="variations_added_{{$pro->id}}" id="variations_added_{{$pro->id}}" value="{{$AttKeyName_string}}" >
                                    </a>
                                </td>
                                <td>
                                    <button type="button" data-id="{{$pro->id}}" class="product_cart_btn"> Add to cart 
                                    <img src="{{ asset('assets/frontend/images/loder.gif') }}" class="loder" style="display: none;"> 
                                    <img src="{{ asset('assets/frontend/images/right-icon.png') }}" class="right_replay" style="display: none;">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            

          @endforeach  

        </div>

        <div class="pull-right">
             {{ $product->links() }} 
        </div>
<?php }else{ ?>

            <div class="row" id="row">
                <h2>Wrong....</h2>
            </div>
            <?php } ?>
      </div>

      </div>

    </div>
  </section>

</content>

 <script type="text/javascript">

function product_add_to_cart_btn($product_this){
$(document).ready(function() {
   var $product_id= $($product_this).data('id');
    var variations_added =$('#variations_added_'+$product_id).val();
    var variations_data = variations_added.split(',');
    
    // var selected_values_att = [];

    // $.each(variations_data, function(index, element) {
    //     if(jQuery(this).parent('td').parent('tr').parent('tbody').find( "input[type='radio'][name="+element+"]" ).is(':checked')){
    //         var selected_values_att[element] = jQuery(this).parent('td').parent('tr').parent('tbody').find( "input[type='radio'][name="+element+"]" ).is(':checked').val();
    //     }else{
    //         jQuery('.alert-bar').show().delay(3000).fadeOut();
    //         jQuery('.alert-bar').html("Please Select "+ element +);
    //         return false;
    //     }
    // });


    var selected_values_att = []; 
        myjson_array = [];
        flag = 1;
        $.each(variations_data, function(index, element) {
            if ($($product_this).parent('td').parent('tr').parent('tbody').find("input[name='"+element+"']").is(':checked')) {

                selected_values_att[element] = $($product_this).parent('td').parent('tr').parent('tbody').find("input[type='radio'][name='" + element + "']:checked").val();
                
            }else {
               
                $('.alert-bar').show().delay(1000).fadeOut();
                $('.alert-bar').html("Please Select " + element);
                flag = 0;
                  return false;

            }
        });
        myjson_array.push(Object.assign({}, selected_values_att));
        myJsonString =JSON.stringify(myjson_array);
        console.log(myJsonString);
   //var ele = $product_this;
        if(flag == 1){
             $.ajax({
            
                 url: "{{ url('single-add-to-cart') }}",
                
                 method: "post",
                
                 data: {_token: '{{ csrf_token() }}', data_id: $product_id, quantity: 1,attribute:myJsonString},
                
                 success: function (response) {
                       $($product_this).parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".loder").css('display','none');
                     //ele.find(".right_replay").css('display','block');
                        $($product_this).parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".right_replay").show().delay(3000).fadeOut();
                      jQuery('.shopping_cart_count').html(response);
                        jQuery('.alert-bar-success').show().delay(1000).fadeOut();
                       jQuery('.alert-bar-success').html("Product added to cart successfully");
                  }
            
             });
         }

    // jQuery(this).parent('td').parent('tr').parent('tbody').find( "input[type='radio']" ).each(function( index ) {

    // });

// if(jQuery(this).parent('td').parent('tr').parent('tbody').find( "input[type='radio']" ).is(':checked')){
//     jQuery(this).parent('td').parent('tr').parent('tbody').find( "input[type='radio']" ).each(function( index ) {
//         if ($(this).is(':checked')) {
//           jQuery(this).parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".loder").css('display','block');
//           jQuery(this).parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".right_replay").css('display','none');
//           attribute = 'size:'+$(this).val();
//           console.log(attribute);
//             e.preventDefault();

//             var ele = jQuery(this);

//             // $.ajax({

//             //    url: "{{ url('single-add-to-cart') }}",

//             //    method: "post",

//             //    data: {_token: '{{ csrf_token() }}', data_id: ele.attr("data-id"), quantity: 1,attribute:attribute},

//             //    success: function (response) {
//             //         ele.parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".loder").css('display','none');
//             //         //ele.find(".right_replay").css('display','block');
//             //         ele.parent('div').parent('span').parent('td').parent('tr').parent('tbody').find(".right_replay").show().delay(3000).fadeOut();
//             //         jQuery('.shopping_cart_count').html(response);
//             //         jQuery('.alert-bar').show().delay(3000).fadeOut();
//             //         jQuery('.alert-bar').html("Product added to cart successfully");
//             //    }

//             // });
//         }
//     });
// }else{
//     jQuery('.alert-bar').show().delay(3000).fadeOut();
//     jQuery('.alert-bar').html("Please Select Size");
// }

});
}

        jQuery(".product_cart_btn").click(function (e) {
            
            //var product_id = $(this).data('id');
            product_add_to_cart_btn(this);
        });
        
        jQuery(".att_class").click(function (e) {
            $(this).parent('.form-check').parent('span').find(".att_class").css({'background-color':'#fff','box-shadow': 'inset 0 0 2px','color':'var(--main-color)'});
            $(this).css({'background-color':'var(--main-color)','color':'#fff'});
        });
        // jQuery(".Size_label").click(function (e) {
        //     jQuery('.Size_label').css({'background-color':'#fff','color':'var(--main-color)'});
        //     jQuery(this).css({'background-color':'var(--main-color)','color':'#fff'});
        // });

        // jQuery(".Color_label").click(function (e) {
        //     jQuery('.Color_label').css({'background-color':'#fff','color':'var(--main-color)'});
        //     jQuery(this).css({'background-color':'var(--main-color)','color':'#fff'});
        // });

    </script> 
@include('layouts.footer')
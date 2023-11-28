<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Session;

class AppHelper
{
      public function get_price($someValue)
      {
            
            $currency = session('currency');
            if($currency > 0){
            //print_r($currency);
                $curr_setting = DB::table('ecommerce_setting')->select('currency_position', 'thousand_separator', 'decimal_separator', 'number_of_decimals')->first();
                //print_r($curr_setting);
                if($curr_setting->currency_position == 'left'){
                    return $price = $currency['symbol'].number_format($someValue*$currency['amount'], $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator);
                }elseif($curr_setting->currency_position == 'right'){
                    return $price = number_format($someValue*$currency['amount'], $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator).$currency['symbol'];
                }elseif($curr_setting->currency_position == 'left_space'){
                    return $price = $currency['symbol'].' '.number_format($someValue*$currency['amount'], $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator);
                }elseif($curr_setting->currency_position == 'right_space'){
                    return $price = number_format($someValue*$currency['amount'], $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator).' '.$currency['symbol'];
                }
            }else{
                $curr_setting = DB::table('ecommerce_setting')->select('currency_position', 'thousand_separator', 'decimal_separator', 'number_of_decimals')->first();
                if($curr_setting->currency_position == 'left'){
                    return $price = '₹'.number_format($someValue, $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator);
                }elseif($curr_setting->currency_position == 'right'){
                    return $price = number_format($someValue, $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator).'₹';
                }elseif($curr_setting->currency_position == 'left_space'){
                    return $price = '₹'.' '.number_format($someValue, $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator);
                }elseif($curr_setting->currency_position == 'right_space'){
                    return $price = number_format($someValue, $curr_setting->number_of_decimals, $curr_setting->decimal_separator, $curr_setting->thousand_separator).' '.'₹';
                }
            }
      }


      public function get_attribute($product_id,$page)
      {

        $return_string = '';
       
        $variation = DB::table('product_attribute')->where('product_id',$product_id)->get();
        $arr = json_decode($variation[0]->attribute, true);
        
            foreach($arr as $var){ 
                $keys = array_keys($var);
                $AttKeyName = $keys[0];
                $all_size = implode(" | ",array_unique($var[$AttKeyName]));

                if($page == 'home'){
                        $return_string .= '<tr><td>'.$AttKeyName.'</td><td class="text-right"><span class="size-te sizes_item">';

                    for ($s = 0; $s < count($var[$AttKeyName]); $s++) { 
                        $return_string .= '<div class="form-check">
                                            <input class="form-check-input" data-id="'.$var[$AttKeyName][$s].'" type="radio" name="'.$AttKeyName.'" id="'.$product_id.$var[$AttKeyName][$s].'" value="'.$var[$AttKeyName][$s].'" style="display:none">
                                            <label class="form-check-label att_class '.$AttKeyName.'_label" for="'.$product_id.$var[$AttKeyName][$s].'">'.$var[$AttKeyName][$s].'</label>
                                          </div>';
                    } 
                        $return_string .=  '</span></td></tr>';
                }

                if($page == 'product_1'){
                    $return_string .= '<tr><td>'.$AttKeyName.'</td><td class="text-right "><span class="size-te sizes_item">'.$all_size.'</span></td></tr>'; 
                }

                if($page == 'product_2'){
                        $return_string .= '<div class="select_size_wrap"><h4>'.$AttKeyName.'</h4><div class="select_sizes">';

                    for($i = 0;$i < count($var[$AttKeyName]);$i++){
                        $return_string .= '<div class="form-check form-check-inline rad_btn">
                                             <input class="form-check-input" type="radio" name="'.$AttKeyName.'_'.$product_id.'" id="'.$var[$AttKeyName][$i].'" value="'.$var[$AttKeyName][$i].'">
                                             <label class="form-check-label" for="'.$var[$AttKeyName][$i].'">  '.$var[$AttKeyName][$i].'</label>
                                          </div>';
                    }

                        $return_string .= '</div></div>';

                    
                }


            }

            return $return_string;
      }

     public function startQueryLog()
     {
           \DB::enableQueryLog();
     }

     public function showQueries()
     {
          dd(\DB::getQueryLog());
     }

     public static function instance()
     {
         return new AppHelper();
     }
}
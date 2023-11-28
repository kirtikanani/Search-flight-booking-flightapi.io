<?php $airline_arr=array();  if(   (isset($dataoftrip1['data_filter']->airlines) ) && (isset($dataoftrip1['airlines'])) ){
    
        foreach($dataoftrip1['airlines'] as $airline_res){
            $airline_arr[$airline_res->code]=$airline_res->name;
        }    
    }
?>
<div class="MobileFilters_wrapper__SZEi_">
        <div class="MobileFilters_container__muWET ScrollIndicator_container__ejgDR">
            <div class="MobileFilters_sort__7Ka8s">
                <div class="Sort_container__O_4h2">
                    <select class="Sort_select__78U1Q">
                        <option  value="defultAmountFunction">Recommended Price</option>
                        <option  value="cheapestAmountFunction">Cheapest</option>
                        <option value="quickestAmountFunction">Quickest</option>
                    </select>
                    <div class="Sort_inner__2tTeU">
                        <span> Sort: Recommended</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="chevrons_svg__feather chevrons_svg__feather-chevrons-up">
                            <path d="M16 10l-4-4-4 4M8 14l4 4 4-4">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="MobileFilters_item__ImlYl" data-modal="Currency">Currency</div>
            <div class="MobileFilters_item__ImlYl" data-modal="Stops">Stops</div>
            <div class="MobileFilters_item__ImlYl" data-modal="Airlines">Airlines</div>
            <div class="MobileFilters_item__ImlYl" data-modal="Alliances">Alliances</div>
        </div>
        <div class="ScrollIndicator_track__5TkHb">
            <div class="ScrollIndicator_slider__vw2Dh" style="width: 34.3019%; left: 0.726392%;"></div>
        </div>
    </div>
<div class="theModal modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="theModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><h4>Showing <span class="fiter-count-value">{{$countingTrip}}</span> results</h4></h5>
          <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="Section_container__gsBYF Sort_By" style="display: none;">
                      <div class="section_container_fill">
       
                              <div class="section_title__exrbw">
  
                                  <h4>Sort By</h4>
  
                              </div>
  
                              <div class="sort_desc">
  
                                     <div class="checkbox_span defult">
  
                                         <div class="form-check">
  
                                             <input onClick="defultAmountFunction()" class="form-check-input" type="radio" name="exampleRadiosmodal"
  
                                                     id="defult" value="option1" checked>
  
                                             <label class="form-check-label" for="exampleRadios1">
  
                                                 Recommended
  
                                             </label>
  
                                         </div>
  
                                     </div>
  
                                            
                                  <div class="checkbox_span cheapest ">
  
                                      <div class="form-check">
  
                                          <input onClick="cheapestAmountFunction()" class="form-check-input cheapest " type="radio" name="exampleRadiosmodal"
  
                                              id="cheapest" value="option1" >
  
                                          <label class="form-check-label" for="exampleRadios1">
  
                                              Cheapest
  
                                          </label>
  
                                      </div>
  
                                  </div>
                                  <div class="checkbox_span quickest">
  
                                         <div class="form-check">
  
                                             <input onClick="quickestAmountFunction()" class="form-check-input quickest" type="radio" name="exampleRadiosmodal"
  
                                                 id="quickest" value="option1" >
  
                                             <label class="form-check-label" for="exampleRadios1">
  
                                                 Quickest
  
                                             </label>
  
                                         </div>
  
                                     </div>         
  
                                  </div>
  
                          </div>
              </div>
              <div class="Section_container__gsBYF Currency" style="display: none;">
                      <div class="accordion_container">
          
                              <div class="accordion_head">Currency<span class="plusminus"> <i
  
                                          class="fas fa-angle-down"></i> </span>
  
                              </div>
  
                              <div class="accordion_body" style="display: none;">
  
                                  <div class="checkbox_span">
  
                                      <div class="airlines_checkbox">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input" type="radio"
                                              @isset($Currency) @if($Currency == 'AUD') checked @endif @endisset
                                                  name="Currencymodal" id="Currency" value="AUD">
  
                                              <label class="form-check-label" for="Currency">
  
                                                      AUD
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="airlines_checkbox">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input" type="radio"
                                              @isset($Currency) @if($Currency == 'USD') checked @endif @endisset
                                                  name="Currencymodal" id="Currency" value="USD">
  
                                              <label class="form-check-label" for="Currency">
  
                                                      USD
  
                                              </label>
  
                                          </div>
  
                                      </div>
                                      <div class="airlines_checkbox">
  
                                              <div class="form-check">
  
                                                  <input class="form-check-input" type="radio"
                                                  @isset($Currency) @if($Currency == 'AED') checked @endif @endisset
                                                      name="Currencymodal" id="Currency" value="AED">
  
                                                  <label class="form-check-label" for="Currency">
  
                                                          AED
  
                                                  </label>
  
                                              </div>
  
                                          </div>
  
                                          <div class="airlines_checkbox">
                                              
                                              <div class="form-check">
                                                  
                                                  <input class="form-check-input" type="radio"
                                                  @isset($Currency) @if($Currency == 'EUR') checked @endif @endisset
                                                      name="Currencymodal" id="Currency" value="EUR">
  
                                                  <label class="form-check-label" for="Currency">
  
                                                          EUR
  
                                                  </label>
  
                                              </div>
  
                                          </div>
  
                                      <div class="airlkines_div"></div>
  
                                      <div class="airlkines_division">    
  
                                      </div>
  
                                  </div>
  
                              </div>
                          </div>
              </div>
              <div class="Section_container__gsBYF Stops" style="display: none;">
                      <div class="accordion_container">
       
                              <div class="accordion_head">Stops<span class="plusminus"> <i
  
                                          class="fas fa-angle-down"></i> </span>
  
                              </div>
  
                              <div class="accordion_body" style="display: none;">
  
                                  <div class="Checkbox_container___TimX">
  
                                      <div class="checkbox_span">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input stop_filter_chk" type="checkbox"
  
                                                  name="exampleRadiosmodal" id="exampleRadios1" value="ONE_STOP"
  
                                                  checked="">
  
                                              <label class="form-check-label" for="exampleRadios1">
  
                                                  One stop
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="price_right">
  
                                          <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[0]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[0]->price->currencyCode.' '.round($dataoftrip1['data_filter']->stops[0]->price->originalAmount,2);}?></h2>
  
                                      </div>
  
                                  </div>
  
                                  <div class="Checkbox_container___TimX">
  
                                      <div class="checkbox_span">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input stop_filter_chk" type="checkbox"
  
                                                  name="exampleRadiosmodal" id="exampleRadios1" value="MORE_THAN_ONE_STOP"
  
                                                  checked="">
  
                                              <label class="form-check-label" for="exampleRadios1">
  
                                                  More then one
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="price_right">
  
                                          <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[1]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[1]->price->currencyCode.' '.round($dataoftrip1['data_filter']->stops[1]->price->originalAmount,2);}?></h2>
  
                                      </div>
  
                                  </div>
  
                                  <div class="Checkbox_container___TimX">
  
                                      <div class="checkbox_span">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input stop_filter_chk" type="checkbox"
  
                                                  name="exampleRadiosmodal" id="exampleRadios1" value="DIRECT"
  
                                                  checked="">
  
                                              <label class="form-check-label" for="exampleRadios1">
  
                                                  DIRECT
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="price_right">
  
                                          <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[2]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[2]->price->currencyCode.' '.round($dataoftrip1['data_filter']->stops[2]->price->originalAmount,2);}?></h2>
  
                                      </div>
  
                                  </div>
  
                              </div>
  
  
  
                          </div>
              </div>                          
              <div class="Section_container__gsBYF Airlines" style="display: none;">
                      <div class="accordion_container">
       
                              <div class="accordion_head">Airlines<span class="plusminus"> <i
  
                                          class="fas fa-angle-down"></i> </span>
  
                              </div>
  
                              <div class="accordion_body" style="display: none;">
  
                                  <div class="checkbox_span">
  
                                      <div class="airlines_checkbox">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input" type="checkbox"
  
                                                  name="exampleRadiosmodal" id="exampleRadios1" value="option1"
  
                                                  checked="">
  
                                              <label class="form-check-label" for="exampleRadios1">
  
                                                  Only show results operated by a single airline
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="airlines_checkbox">
  
                                          <div class="form-check">
  
                                              <input class="form-check-input" type="checkbox"
  
                                                  name="exampleRadiosmodal" id="exampleRadios1" value="option1"
  
                                                  checked="">
  
                                              <label class="form-check-label" for="exampleRadios1">
  
                                                  Show results that only include my selected airlines
  
                                              </label>
  
                                          </div>
  
                                      </div>
  
                                      <div class="airlkines_div"></div>
  
                                      <div class="airlkines_division">
                                      
                                      <?php
                                    if(isset($dataoftrip1['data_filter']->airlines)){
                                             foreach ($airline_arr as $key => $value) {    
                                             foreach($dataoftrip1['data_filter']->airlines as $filter_key=>$filter_val){
                                                 if($key == $filter_val->code){
                                             ?>
                                             <div class="Checkbox_container___TimX">
  
                                              <div class="checkbox_span">
  
                                                  <div class="form-check">
  
                                                      <input class="form-check-input airlines_filter_sidebar_chk" type="checkbox"
  
                                                          name="exampleRadiosmodal" id="exampleRadios1_<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>"
  
                                                          value="<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>" checked="">
  
                                                      <label class="form-check-label" for="exampleRadios1_<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>">
  
                                                          <?php if(isset($airline_arr[$filter_val->code])){echo $airline_arr[$filter_val->code];} ?>
  
                                                      </label>
  
                                                  </div>
  
                                              </div>
  
                                              <div class="price_right">
  
                                                  <h2><?php if(isset($filter_val->price->originalAmount)){echo $Currency.' '.round($filter_val->price->originalAmount,2);}?></h2>
  
                                              </div>
  
                                          </div>
                                         <?php }
                                     }
                                 }
                                 }
                                      ?>
  
                                          
  
                                         
  
                                      </div>
  
                                  </div>
  
                              </div>
  
  
  
                          </div>
              </div>
              <div class="Section_container__gsBYF Alliances" style="display: none;">
                      <div class="accordion_container">
       
                              <div class="accordion_head">Alliances<span class="plusminus"> <i
  
                                          class="fas fa-angle-down"></i> </span>
  
                              </div>
  
                              <div class="accordion_body" style="display: none;">
  
                                  <div class="checkbox_span">
  
                                      <div class="airlkines_division">
                                         @foreach ($dataoftrip1['allianceResult'] as $allianceResult)
                                         @if($allianceResult != '')
                                           <div class="Checkbox_container___TimX">
  
                                              <div class="checkbox_span check_shangali">
  
                                                  <div class="form-check">
  
                                                      <input class="form-check-input allianceResultcheck" type="checkbox"
  
                                                          name="exampleRadiosmodal" id="exampleRadios1_{{$allianceResult}}"
  
                                                          value="{{$allianceResult}}" checked="">
  
                                                      <label class="form-check-label" for="exampleRadios1">
  
                                                          {{str_replace('_',' ',$allianceResult)}}
  
                                                      </label>
  
                                                  </div>
  
                                              </div>     
  
                                          </div>
                                          @endif
                                          @endforeach
                                      </div>
  
                                  </div>
  
                              </div>
  
                          </div>
              </div>
        </div>
      </div>
    </div>
  </div>

    
     <!-- Slide sec -->
         
         
         
             <div class="ribbon_item_sec">
         
                 <div class="container">
         
                     <div>
         
                         <div class="owl-carousel owl-theme" id="owl_flights">
         
                             <?php 
                              $CurrencyCodeValue = $Currency ;
                              if(isset($dataoftrip1['data_filter']->airlines)){
                                foreach ($airline_arr as $key => $value) {    
                                foreach($dataoftrip1['data_filter']->airlines as $filter_key=>$filter_val){
                                    if($key == $filter_val->code){
                                 ?>
                                    <div class="item">
         
                                 <div class="asiana_all_flights">
         
                                     <div class="flights_img">
         
                                         <img src="https://content.airhex.com/content/logos/airlines_{{$filter_val->code}}_300_150_r.gif" alt="">
         
                                     </div>
         
                                     <div class="flights_title_img">
         
                                         <h4><?php if(isset($airline_arr[$filter_val->code])){echo $airline_arr[$filter_val->code];} ?></h4>
         
                                         <p><?php if(isset($filter_val->price->originalAmount)){echo $CurrencyCodeValue.' '.round($filter_val->price->originalAmount,2);}?><?php /*?>659,013.92 ₹<?php */?></p>
         
                                     </div>
         
                                     <div class="check_flights">
         
                                         <input type="checkbox" class="air_line_filter_chk  <?php if(isset($filter_val->code)){echo $filter_val->code;} ?> " value="<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>" />
         
                                     </div>
         
                                 </div>
         
                             </div>
                                    <?php
                                }
                            } }
                            }?>
                             
                         </div>
         
                     </div>
         
                 </div>
         
             </div>
         
         
         
         
         
             <!-- flight details -->
             
             
             <div class="flight_details_gap">
         
                 <div class="container">
         
                     <div class="left_side_details">
         
                         <div class="row">
         
                             <div class="col-md-4">
         
                                 <div class="flights_filters_inner">
         
                                     <div class="filters_overlay ">
         
                                         <h4>Showing <span class="fiter-count-value">{{$countingTrip}}</span> results</h4>
         
                                     </div>
         
                                     <div>
         
                                         <div class="section_container_fill">
         
                                             <div class="section_title__exrbw">
         
                                                 <h4>Sort By</h4>
         
                                             </div>
         
                                             <div class="sort_desc">
         
                                                <div class="checkbox_span defult">
     
                                                    <div class="form-check">
        
                                                        <input onClick="defultAmountFunction()" class="form-check-input" type="radio" name="exampleRadios"
        
                                                                id="defult" value="option1" checked>
        
                                                        <label class="form-check-label" for="exampleRadios1">
        
                                                            Recommended
        
                                                        </label>
        
                                                    </div>
        
                                                </div>
         
                                                       
                                             <div class="checkbox_span cheapest ">
     
                                                 <div class="form-check">
     
                                                     <input onClick="cheapestAmountFunction()" class="form-check-input cheapest " type="radio" name="exampleRadios"
     
                                                         id="cheapest" value="option1" >
     
                                                     <label class="form-check-label" for="exampleRadios1">
     
                                                         Cheapest
     
                                                     </label>
     
                                                 </div>
     
                                             </div>
                                             <div class="checkbox_span quickest">
     
                                                    <div class="form-check">
        
                                                        <input onClick="quickestAmountFunction()" class="form-check-input quickest" type="radio" name="exampleRadios"
        
                                                            id="quickest" value="option1" >
        
                                                        <label class="form-check-label" for="exampleRadios1">
        
                                                            Quickest
        
                                                        </label>
        
                                                    </div>
        
                                                </div>         
         
                                             </div>
         
                                         </div>
         
                                         <div class="section_container_fill">
         
                                                <div class="accordion_container">
            
                                                    <div class="accordion_head">Currency<span class="plusminus"> <i
            
                                                                class="fas fa-angle-down"></i> </span>
            
                                                    </div>
            
                                                    <div class="accordion_body" style="display: none;">
            
                                                        <div class="checkbox_span">
            
                                                            <div class="airlines_checkbox">
            
                                                                <div class="form-check">
            
                                                                    <input class="form-check-input" type="radio"
                                                                    @isset($Currency) @if($Currency == 'AUD') checked @endif @endisset
                                                                        name="Currency" id="Currency" value="AUD">
            
                                                                    <label class="form-check-label" for="Currency">
            
                                                                            AUD
            
                                                                    </label>
            
                                                                </div>
            
                                                            </div>
            
                                                            <div class="airlines_checkbox">
            
                                                                <div class="form-check">
            
                                                                    <input class="form-check-input" type="radio"
                                                                    @isset($Currency) @if($Currency == 'USD') checked @endif @endisset
                                                                        name="Currency" id="Currency" value="USD">
            
                                                                    <label class="form-check-label" for="Currency">
            
                                                                            USD
            
                                                                    </label>
            
                                                                </div>
            
                                                            </div>
                                                            <div class="airlines_checkbox">
            
                                                                    <div class="form-check">
                
                                                                        <input class="form-check-input" type="radio"
                                                                        @isset($Currency) @if($Currency == 'AED') checked @endif @endisset
                                                                            name="Currency" id="Currency" value="AED">
                
                                                                        <label class="form-check-label" for="Currency">
                
                                                                                AED
                
                                                                        </label>
                
                                                                    </div>
                
                                                                </div>
                
                                                                <div class="airlines_checkbox">
                                                                    
                                                                    <div class="form-check">
                                                                        
                                                                        <input class="form-check-input" type="radio"
                                                                        @isset($Currency) @if($Currency == 'EUR') checked @endif @endisset
                                                                            name="Currency" id="Currency" value="EUR">
                
                                                                        <label class="form-check-label" for="Currency">
                
                                                                                EUR
                
                                                                        </label>
                
                                                                    </div>
                
                                                                </div>
            
                                                            <div class="airlkines_div"></div>
            
                                                            <div class="airlkines_division">    
            
                                                            </div>
            
                                                        </div>
            
                                                    </div>
            
            
            
                                                </div>
            
                                            </div>
         
                                         <div class="section_container_fill">
         
                                             <div class="accordion_container">
         
                                                 <div class="accordion_head">Stops<span class="plusminus"> <i
         
                                                             class="fas fa-angle-down"></i> </span>
         
                                                 </div>
         
                                                 <div class="accordion_body" style="display: none;">
         
                                                     <div class="Checkbox_container___TimX">
         
                                                         <div class="checkbox_span">
         
                                                             <div class="form-check">
         
                                                                 <input class="form-check-input stop_filter_chk" type="checkbox"
         
                                                                     name="exampleRadios" id="exampleRadios1" value="ONE_STOP"
         
                                                                     checked="">
         
                                                                 <label class="form-check-label" for="exampleRadios1">
         
                                                                     One stop
         
                                                                 </label>
         
                                                             </div>
         
                                                         </div>
         
                                                         <div class="price_right">
         
                                                             <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[0]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[0]->price->currencyCode .' '. round($dataoftrip1['data_filter']->stops[0]->price->originalAmount,2);}?></h2>
         
                                                         </div>
         
                                                     </div>
         
                                                     <div class="Checkbox_container___TimX">
         
                                                         <div class="checkbox_span">
         
                                                             <div class="form-check">
         
                                                                 <input class="form-check-input stop_filter_chk" type="checkbox"
         
                                                                     name="exampleRadios" id="exampleRadios1" value="MORE_THAN_ONE_STOP"
         
                                                                     checked="">
         
                                                                 <label class="form-check-label" for="exampleRadios1">
         
                                                                     More then one
         
                                                                 </label>
         
                                                             </div>
         
                                                         </div>
         
                                                         <div class="price_right">
         
                                                             <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[1]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[1]->price->currencyCode .' '. round($dataoftrip1['data_filter']->stops[1]->price->originalAmount,2);}?></h2>
         
                                                         </div>
         
                                                     </div>
         
                                                     <div class="Checkbox_container___TimX">
         
                                                         <div class="checkbox_span">
         
                                                             <div class="form-check">
         
                                                                 <input class="form-check-input stop_filter_chk" type="checkbox"
         
                                                                     name="exampleRadios" id="exampleRadios1" value="DIRECT"
         
                                                                     checked="">
         
                                                                 <label class="form-check-label" for="exampleRadios1">
         
                                                                     DIRECT
         
                                                                 </label>
         
                                                             </div>
         
                                                         </div>
         
                                                         <div class="price_right">
         
                                                             <h2><?php if(   (isset($dataoftrip1['data_filter']->stops[2]->price->originalAmount) )){echo $dataoftrip1['data_filter']->stops[2]->price->currencyCode.' '.round($dataoftrip1['data_filter']->stops[2]->price->originalAmount,2);}?></h2>
         
                                                         </div>
         
                                                     </div>
         
                                                 </div>
         
         
         
                                             </div>
         
                                         </div>
                                         
                                         <div class="section_container_fill">
         
                                             <div class="accordion_container">
         
                                                 <div class="accordion_head">Airlines<span class="plusminus"> <i
         
                                                             class="fas fa-angle-down"></i> </span>
         
                                                 </div>
         
                                                 <div class="accordion_body" style="display: none;">
         
                                                     <div class="checkbox_span">
         
                                                         <div class="airlines_checkbox">
         
                                                             <div class="form-check">
         
                                                                 <input class="form-check-input" type="checkbox"
         
                                                                     name="exampleRadios" id="exampleRadios1" value="option1"
         
                                                                     checked="">
         
                                                                 <label class="form-check-label" for="exampleRadios1">
         
                                                                     Only show results operated by a single airline
         
                                                                 </label>
         
                                                             </div>
         
                                                         </div>
         
                                                         <div class="airlines_checkbox">
         
                                                             <div class="form-check">
         
                                                                 <input class="form-check-input" type="checkbox"
         
                                                                     name="exampleRadios" id="exampleRadios1" value="option1"
         
                                                                     checked="">
         
                                                                 <label class="form-check-label" for="exampleRadios1">
         
                                                                     Show results that only include my selected airlines
         
                                                                 </label>
         
                                                             </div>
         
                                                         </div>
         
                                                         <div class="airlkines_div"></div>
         
                                                         <div class="airlkines_division">
                                                         
                                                         <?php
                                                         if(isset($dataoftrip1['data_filter']->airlines)){
                                                            foreach ($airline_arr as $key => $value) {    
                                                            foreach($dataoftrip1['data_filter']->airlines as $filter_key=>$filter_val){
                                                                if($key == $filter_val->code){
                                                                ?>
                                                                <div class="Checkbox_container___TimX">
         
                                                                 <div class="checkbox_span">
         
                                                                     <div class="form-check">
         
                                                                         <input class="form-check-input airlines_filter_sidebar_chk" type="checkbox"
         
                                                                             name="exampleRadios" id="exampleRadios1_<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>"
         
                                                                             value="<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>" checked="">
         
                                                                         <label class="form-check-label" for="exampleRadios1_<?php if(isset($filter_val->code)){echo $filter_val->code;} ?>">
         
                                                                             <?php if(isset($airline_arr[$filter_val->code])){echo $airline_arr[$filter_val->code];} ?>
         
                                                                         </label>
         
                                                                     </div>
         
                                                                 </div>
         
                                                                 <div class="price_right">
         
                                                                     <h2><?php if(isset($filter_val->price->originalAmount)){echo $CurrencyCodeValue .' '. round($filter_val->price->originalAmount,2);}?></h2>
         
                                                                 </div>
         
                                                             </div>
                                                            <?php }
                                                            }
                                                        }
                                                        }
                                                         ?>
         
                                                             
         
                                                            
         
                                                         </div>
         
                                                     </div>
         
                                                 </div>
         
         
         
                                             </div>
         
                                         </div>
                                         <div class="section_container_fill">
         
                                             <div class="accordion_container">
         
                                                 <div class="accordion_head">Alliances<span class="plusminus"> <i
         
                                                             class="fas fa-angle-down"></i> </span>
         
                                                 </div>
         
                                                 <div class="accordion_body" style="display: none;">
         
                                                    <div class="checkbox_span">
     
                                                        <div class="airlkines_division">
                                                           @foreach ($dataoftrip1['allianceResult'] as $allianceResult)
                                                           @if($allianceResult != '')
                                                             <div class="Checkbox_container___TimX">
        
                                                                <div class="checkbox_span check_shangali">
        
                                                                    <div class="form-check">
        
                                                                        <input class="form-check-input allianceResultcheck" type="checkbox"
        
                                                                            name="exampleRadios" id="exampleRadios1_{{$allianceResult}}"
        
                                                                            value="{{$allianceResult}}" checked="">
        
                                                                        <label class="form-check-label" for="exampleRadios1">
        
                                                                            {{str_replace('_',' ',$allianceResult)}}
        
                                                                        </label>
        
                                                                    </div>
        
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
        
                                                    </div>
         
                                                 </div>
         
                                             </div>
         
                                         </div>
         
         
                                     </div>
         
                                 </div>
         
                             </div>
         
                             <div class="col-md-8">
         
                                 <div class="flights_filters_right">
         
                                <a href="#" class="quickSort_item defult">

                                        <div class="quickSort_item_details">
        
                                            <h4>Recommended</h4>
        
                                            <span class="quickSort_item_span">
        
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        
                                                    stroke-linecap="round" stroke-linejoin="round"
        
                                                    class="QuickSort_info-icon__Zh3_Y">
        
                                                    <circle cx="12" cy="12" r="10"></circle>
        
                                                    <path d="M12 16v-4M12 8h.01"></path>
        
                                                </svg>
        
                                            </span>
        
                                        </div>
        
                                        <div class="quickSort_item_info">
        
                                            <h4> @isset($dataoftrip1['recommendedArr']['amount']) {{ $dataoftrip1['recommendedArr']['amount'] }} @endisset</h4>
            
                                            <h4>@isset($dataoftrip1['recommendedArr']['time']){{$dataoftrip1['recommendedArr']['time']}}  @endisset 
                                                (average)</h4>
            
                                        </div>
        
                                    </a>
         
                                     <a href="#" class="quickSort_item cheapest ">
         
                                         <div class="quickSort_item_details">
         
                                             <h4>Cheapest</h4>
         
         
         
                                         </div>
         
                                         <div class="quickSort_item_info">
     
                                            <h4> @isset($dataoftrip1['minPrice']['amount']) {{ $dataoftrip1['minPrice']['amount']}} @endisset</h4>
            
                                            <h4>@isset($dataoftrip1['minPrice']['time']){{$dataoftrip1['minPrice']['time']}}  @endisset 
                                                (average)</h4>
            
                                        </div>
         
                                     </a>
         
                                     <a href="#" class="quickSort_item quickest">
         
                                         <div class="quickSort_item_details">
         
                                             <h4>Quickest</h4>
         
         
         
                                         </div>
         
                                         <div class="quickSort_item_info">
     
                                            <h4>@isset($dataoftrip1['tripDurations']['amount']){{ $dataoftrip1['tripDurations']['amount'] }} @endisset</h4>
        
                                            <h4>@isset($dataoftrip1['tripDurations']['time']){{$dataoftrip1['tripDurations']['time']}} @endisset 
                                                (average)</h4>
        
                                        </div>
         
                                     </a>
         
                                    
         
                                 </div>
         
                                
                                   
                                    <div class="appendFlightDetails">
                                        <?php $defult = 0  ?>
                                        @foreach ($dataoftrip1['data'] as $incrementkey => $value) 
                                        @foreach ($value as $checkkey => $checkvalue)
                                        @if($checkkey == 'allianceCodesResult')
                                        @php
                                            $allianceCodesResult = $checkvalue
                                        @endphp                                        
                                        @endif

                                        @if($checkkey == 'durationnumber')
                                        @php
                                            $durationnumber = $checkvalue
                                        @endphp                                        
                                        @endif

                                        @if($checkkey == 'fare_original_amount')
                                        @php
                                            $originalAmountPrice = round($checkvalue,2)
                                        @endphp                                        
                                        @endif
                                        @if($checkkey == 'withoutDiscountPrice')
                                        @php
                                            $withoutDiscountPrice = round($checkvalue,2)
                                        @endphp                                        
                                        @endif
                                                                                
                                        @if($checkkey == 'flight_details')                                
                                        {{-- @php
                                        echo "<pre>" ; print_r($checkvalue['allianceCodes']) ; exit ;     
                                        @endphp --}}
                                        <form data-defult="{{$defult}}" data-amount="{{$originalAmountPrice}}" data-duration_time="{{$durationnumber}}" action="{{route('booking_details')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="flight_details" value="{{  json_encode($value) }}"> 
                               {{-- multiple - way  trip --}}
                               <input type="hidden" name="trip" value="3">
                               <?php
                                $number_of_adults = Session::get('number_of_adults') ;
                                $number_of_childrens = Session::get('number_of_childrens') ;
                                $number_of_infants = Session::get('number_of_infants'); 
                                ?>
                                <input type="hidden" name="number_of_adults" value="@if(isset($number_of_adults)){{Session::get('number_of_adults')}}@else @if(isset($request->adults)){{$request->adults}}@endif @endif">
                                <input type="hidden" name="number_of_childrens" value="@if(isset($number_of_childrens)){{Session::get('number_of_childrens')}}@else @if(isset($request->children)){{$request->children}}@endif @endif">
                                <input type="hidden" name="number_of_infants"  value="@if(isset($number_of_infants)){{Session::get('number_of_infants')}}@else @if(isset($request->infants)){{$request->infants}}@endif @endif" >
    <div class="result_flights_details  first_alliance_code_{{$allianceCodesResult}} count_filter_value first_flight_code_{{$checkvalue[0]['flight_code']}}   first_flite_stop_{{$checkvalue[0]['stopoverCode']}} " >
        
            <div class="Result_flights__Z1D3s">
        
                <div class="Result_header__uwm2t">
        
                    <div>
        
                        <div class="Price_wrapper__HcyeP DefaultPriceWidget_wrapper__abddu DefaultPriceWidget_large__WCkvW">
        
                            <div class="DefaultPriceWidget_price__TjRay">
        
                                <div class="Price_inner__6srg_">
        
                                    <div><span class="Price_price__WtdgG withoutDiscountPrice" >{{$CurrencyCodeValue}} {{ round($withoutDiscountPrice,2)}} </span></div>
        
                                    <div class="PriceBreakdown_info__vReDL">
        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
        
                                            stroke-width="2" stroke-linecap="round"
        
                                            stroke-linejoin="round" class="PriceBreakdown_icon__fZZUe"
        
                                            role="button">
        
                                            <circle cx="12" cy="12" r="10"></circle>
        
                                            <path d="M12 16v-4M12 8h.01"></path>
        
                                        </svg>
        
                                    </div>
                                    <div class="PriceBreakdown_info__vReDL">
                                        <span class="Price_price__WtdgG">{{$CurrencyCodeValue}} {{round($originalAmountPrice,2)}} </span>
                                    </div>
        
                                </div>
        
                            </div>
                            
                            <div class="Plaques_plaques__whgH6 DefaultPriceWidget_plaques__WLo4S" @if($defult > 4) style="display: none;" @endif>
        
                                <div class="Plaques_plaque__5yNHH"><img class="loder" src="{{asset("assets/images/zthumb.webp")}}"></div>
                            </div>
                            
        
                        </div>
        
                       
                    </div>
        
                </div>
                @foreach ($checkvalue as $key=>$item) 
                
                <div class="flight_city_to_ct">
        
                    <div class="GroupSegmentHeader_group-segment__bYK_U GroupSegmentHeader_group-segment--large__otuDu">
        
                        <div class="GroupSegmentHeader_destinations__T_m3P">
                            {{$item['segments'][0]->departureAirport_name}}
        
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        
                                stroke-linecap="round" stroke-linejoin="round"
        
                                class="arrow-right_svg__feather arrow-right_svg__feather-arrow-right">
        
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
        
                            </svg>
        
                            @if ((count($item['segments'])) >= 2)
                              @php 
                                $countSegments = count($item['segments']) - 1 ;
                                @endphp
                                {{$item['segments'][$countSegments]->arrivalAirportCode_name}}
                                @else                                                
                                {{$item['segments'][0]->arrivalAirportCode_name}}
                            @endif
        
                        </div>
        
                        <div class="GroupSegmentHeader_right__J2Bpw">
        
                            <div class="GroupSegmentHeader_date__vTEtc">{{$item['fromDate']}}</div>
        
                        </div>
        
                    </div>
        
                    <div>
        
                        <div>
        
                            <div class="FlightLarge_container__16ya5">
                                    <div class="FlightSmall_container__ux4g4 mobile-view-list">
                                            <div class="FlightSmall_details-row__yX5fq">
                                                <div class="AirlineLogos_container__kon63
                                                        FlightSmall_airline-logos__Agng3">
                                                    <div class="AirlineLogos_logos__lM3lx">
                                                        <div class="AirlineLogo_logo__RFs6c
                                                                AirlineLogos_logo__5vyxc"><object
                                                                data="https://content.airhex.com/content/logos/airlines_{{ $item['flight_code'] }}_300_150_r.gif"
                                                                type="image/png"></object></div>
                                                    </div>
                                                    <div class="AirlineLogos_airline-string__TBSKu"
                                                        title="{{ $item['flight_name'] }}">
                                                        {{ $item['flight_name'] }}</div>
                                                    <div class="Tooltip_tooltip__ViBRq
                                                            AirlineLogos_tooltip__b_MPP">
                                                        <div class="Tooltip_row__hoTNN">
                                                            <div>
                                                                <div class="AirlineLogo_logo__RFs6c"><object
                                                                        data="https://content.airhex.com/content/logos/airlines_{{ $item['flight_code'] }}_300_150_r.gif"
                                                                        type="image/png"></object></div>
                                                            </div>
                                                            <div>
                                                                <div class="Tooltip_title__iHHRq">
                                                                    {{ $item['flight_name'] }}
                                                                </div>
                                                                @php
                                                                       $segmentsItem = '';  
                                                                    @endphp
                                                                    @foreach ($item['segments'] as $segmentsItem)                                                            
                                                                    @php
                                                                       $segmentsItem =$segmentsItem->designatorCode;  
                                                                    @endphp
                                                                    @endforeach
                                                                <div> 
                                                                    {{$segmentsItem}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>{{$item['fromtime']}} - {{$item['totime']}} </div>
                                                    <div class="FlightSmall_small-text__CtatN">{{$item['segments'][0]->departureAirportCode}} - 
                                                        @if ((count($item['segments'])) >= 2)
                                                        @php 
                                                        $countSegments = count($item['segments']) - 1 ;
                                                        @endphp
                                                        {{$item['segments'][$countSegments]->arrivalAirportCode}}
                                                        @else                                                
                                                        {{$item['segments'][0]->arrivalAirportCode}}
                                                        @endif </div>
                                                </div>
                                                <div class="FlightSmall_checkbox__IUdIf">                                           
                                                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked="">
                                                </div>
                                            </div>
                                    </div>

                                <div class="FlightLarge_inner__P5CEz">
        
                                    <div class="Checkbox_container__W9LTB">
        
                                        <div class="form-check">
        
                                            <input class="form-check-input" type="checkbox"
        
                                                name="exampleRadios" id="exampleRadios1" value="option1"
        
                                                checked="">
        
        
        
                                        </div>
        
                                    </div>
        
                                    <div
        
                                        class="AirlineLogos_container__kon63 FlightLarge_airline-logos__Bp2gW">
        
                                        <div class="AirlineLogos_logos__lM3lx">
        
                                            <div
        
                                                class="AirlineLogo_logo__RFs6c AirlineLogos_logo__5vyxc">
        
                                                <img src="https://content.airhex.com/content/logos/airlines_{{$item['flight_code']}}_300_150_r.gif" type="image/png" />
        
                                            </div>
        
                                        </div>
        
                                        <div class="AirlineLogos_airline-string__TBSKu"
        
                                            title="{{$item['flight_name']}}">{{$item['flight_name']}}
        
                                        </div>
        
                                    </div>
        
                                    <div class="Bookend_container__3qkC5">
        
                                        <div class="Bookend_date__O477p fromdata">
        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
        
                                                height="24" viewBox="0 0 24 24" fill="none"
        
                                                stroke="currentColor" stroke-width="2"
        
                                                stroke-linecap="round" stroke-linejoin="round"
        
                                                class="Bookend_infoIcon__oQeRt">
        
                                                <circle cx="12" cy="12" r="10"></circle>
        
                                                <path d="M12 16v-4M12 8h.01"></path>
        
                                            </svg>
                                            {{$item['fromDate']}}
        
                                        </div>
        
                                        <div class="Bookend_time__Zjmyd fromtime">{{$item['fromtime']}}</div>
        
                                        <div class="formcode"> </div>
        
                                    </div>
        
                                    <div class="Duration_container__t69p4">
        
                                        <div class="Duration_duration__SQZPm">
        
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
        
                                                xmlns="http://www.w3.org/2000/svg"
        
                                                style="visibility: visible;">
        
                                                <path fill-rule="evenodd" clip-rule="evenodd"
        
                                                    d="M12.716 7.345l-2.04.95c-1.48-.473-3.59-.915-5.474-1.517a.2.2 0 00-.145.008l-.53.243a.199.199 0 00-.04.338c.96.736 2.18 1.616 3.13 2.355l-2.038.95c-.88-.186-1.813-.253-2.511-.399-.38-.079-.612.255-.254.533 1.692 1.32 2.37 1.852 2.37 1.852.293.229.656.373 1.007.212l9.333-4.352c.68-.345.653-.83.48-1.222-.41-.88-1.537-.752-3.288.048z"
        
                                                    fill="#636363"></path>
        
                                            </svg>
        
                                            <div class="Duration_text__0Ix3p">{{$item['duration']}}</div>
        
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
        
                                                xmlns="http://www.w3.org/2000/svg"
        
                                                style="visibility: visible;">
        
                                                <path fill-rule="evenodd" clip-rule="evenodd"
        
                                                    d="M12.082 10.515l-2.04-.951c-.588-1.44-1.606-3.34-2.355-5.17a.2.2 0 00-.1-.106l-.527-.25a.199.199 0 00-.284.187c.053 1.208.163 2.708.208 3.913l-2.04-.951c-.423-.794-.971-1.552-1.308-2.18-.184-.343-.589-.307-.572.148.078 2.143.106 3.004.106 3.004.013.373.136.743.484.908l9.334 4.353c.701.298 1.055-.032 1.244-.418.41-.88-.412-1.66-2.15-2.488v.001z"
        
                                                    fill="#636363"></path>
        
                                            </svg>
        
                                        </div>
        
                                        <div class="Duration_journey__vAxXN">
        
                                            <div class="Duration_journeyInner__og1AC">
        
                                                <div class="Duration_flight__ubpEl"
        
                                                    style="width: 100%;"></div>
        
                                            </div>
        
                                        </div>
        
                                        <div class="Duration_text__0Ix3p">
        
                                            <div class="Duration_text-item__PFLDC formcode">{{$item['segments'][0]->departureAirportCode}}</div>
        
                                            <div
        
                                                class="Duration_text-item__PFLDC Duration_text-item--stops__fR9e_">
        
                                                <div class="Duration_tooltip-container__E7P58 ">
        
                                                    <div class="Tooltip_tooltip__5dxEY Duration_tooltip__atnVI ">
        
                                                        <div class="ConnectionTooltip_tooltip__mkBha"
        
                                                            style="min-width: 300px;">A direct
        
                                                            flight that makes no stops between your
        
                                                            outbound and destination airport
        
                                                        </div>
        
                                                    </div>
                                                    <span class="stop_code">{{str_replace('_','-',$item['stopoverCode'])}}</span>
        
                                                </div>
        
                                            </div>
        
                                            <div class="Duration_text-item__PFLDC tocode">
                                                @if ((count($item['segments'])) >= 2)
                                                @php 
                                                $countSegments = count($item['segments']) - 1 ;
                                                @endphp
                                                {{$item['segments'][$countSegments]->arrivalAirportCode}}
                                                @else                                                
                                                {{$item['segments'][0]->arrivalAirportCode}}
                                                @endif
                                            
                                            </div>
        
                                        </div>
        
                                    </div>
        
                                    <div class="Bookend_container__3qkC5">
    
        
                                        <div class="Bookend_date__O477p todate">
        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
        
                                                height="24" viewBox="0 0 24 24" fill="none"
        
                                                stroke="currentColor" stroke-width="2"
        
                                                stroke-linecap="round" stroke-linejoin="round"
        
                                                class="Bookend_infoIcon__oQeRt">
        
                                                <circle cx="12" cy="12" r="10"></circle>
        
                                                <path d="M12 16v-4M12 8h.01"></path>
        
                                            </svg>
        
                                            {{$item['toDate']}}
        
                                        </div>
        
                                        <div class="Bookend_time__Zjmyd totime">{{$item['totime']}}</div>
        
                                        <div class="tocode"> </div>
        
                                    </div>
        
                                </div>
        
                                <div class="FlightLarge_right__ADJ_F FlightLarge_right__ADJ_F-mobile-one">
                                        <div class="mobile-view-list">
                                                <div class="FlightSmall_col__7aeq1" style="left: 11px; width: 38%;">
                                                    <div class="FlightSmall_info__BX8K4"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.29.533a2.075 2.075 0 00-.505 3.26L3.709 5.46 2.407 7.568a2.075 2.075 0 101.862 2.55l3.96.004a2.075 2.075 0 10.002-.958l-3.96-.003a2.077 2.077 0 00-.927-1.287l1.175-1.902 1.07-1.66a2.075 2.075 0 10-.3-3.778zm.01 2.356a1.117 1.117 0 111.963-1.068A1.117 1.117 0 015.301 2.89zm-4.03 7.283a1.117 1.117 0 111.962-1.069 1.117 1.117 0 01-1.963 1.069zm8.446-1.509a1.117 1.117 0 101.068 1.963 1.117 1.117 0 00-1.068-1.963z"
                                                                fill="#091A4B"></path>
                                                        </svg>{{str_replace('_','-',$item['stopoverCode'])}}</div>
                                                </div>
                                                <div class="FlightSmall_col__7aeq1" style="left: 96px; width: 38%;">
                                                        <div class="FlightSmall_info__BX8K4"><svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.25 4.667a.5.5 0 10-1 0V8a.5.5 0 00.235.424l2 1.25a.5.5 0 00.53-.848L9.25 7.723V4.667z"
                                                                    fill="currentCOlor"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M8.75 2.167a5.833 5.833 0 100 11.666 5.833 5.833 0 000-11.666zM3.917 8a4.833 4.833 0 119.666 0 4.833 4.833 0 01-9.666 0z"
                                                                    fill="currentCOlor"></path>
                                                            </svg>{{$item['duration']}}</div>
                                                </div>
                                            </div>
                                            <div class="FlightSmall_col__7aeq1 button"  style="">
                                    <button id="flight_details" type="button" onclick="flightsdetailsHideshow('flight_one_{{$incrementkey.$key}}')"
        
                                        class="Button_button__L2wUb MoreButton_button__ryX82 FlightLarge_more-button___jj35 Button_light-blue__NylWO Button_small__zynrH">Details
        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14"
        
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
        
                                            stroke-width="2" stroke-linecap="round"
        
                                            stroke-linejoin="round"
        
                                            class="chevron-down_svg__feather chevron-down_svg__feather-chevron-down"
        
                                            style="transform: rotate(0deg);">
        
                                            <path d="M6 9l6 6 6-6"></path>
        
                                        </svg>
        
                                    </button>
                                </div>
                                </div>
        
                            </div>
        
                            <div class="FlightDetails_wrapper__UA7l2" id="flight_one_{{$incrementkey.$key}}"
        
                                style="display: none;">
        
                                <div class="FlightDetails_container__RZDm7">
        
                                    <div class="Header_header__IYteF">
        
                                        <div class="Header_cities__kj9SL">
                                                {{$item['segments'][0]->departureAirport_name}}
                                            <svg
        
                                                xmlns="http://www.w3.org/2000/svg" width="24"
        
                                                height="24" viewBox="0 0 24 24" fill="none"
        
                                                stroke="currentColor" stroke-width="2"
        
                                                stroke-linecap="round" stroke-linejoin="round"
        
                                                class="arrow-right_svg__feather arrow-right_svg__feather-arrow-right">
        
                                                <path d="M5 12h14M12 5l7 7-7 7"></path>
        
                                            </svg>
                                            @if ((count($item['segments'])) >= 2)
                                            @php 
                                              $countSegments = count($item['segments']) - 1 ;
                                              @endphp
                                              {{$item['segments'][$countSegments]->arrivalAirportCode_name}}
                                              @else                                                
                                              {{$item['segments'][0]->arrivalAirportCode_name}}
                                          @endif
                                        </div>
        
                                        <div class="Header_eft__Flh6E">{{$item['duration']}}</div>
        
                                    </div>
        
                                    @foreach ($item['segments'] as $keysegmentsItem=>$segmentsItem)                                
                                    <div class="Flight_wrapper__O4_en Flight_wrapper--large__3Wrew">
        
                                        <div class="FlightOverview_wrapper__Tdp7A FlightOverview_wrapper--large__lwzAp">
        
                                            <div class="FlightOverview_container__tdKDy">
        
                                                <div class="AirlineLogos_container__kon63">
        
                                                    <div class="AirlineLogos_logos__lM3lx">
        
                                                        <div
        
                                                            class="AirlineLogo_logo__RFs6c AirlineLogos_logo__5vyxc">
        
                                                            <img src="https://content.airhex.com/content/logos/airlines_{{$item['flight_code']}}_300_150_r.gif" alt="">
        
                                                        </div>
        
                                                    </div>
        
                                                    <div class="AirlineLogos_airline-string__TBSKu"
        
                                                        title="{{$item['flight_name']}}">{{$item['flight_name']}}</div>
        
                                                    <div
        
                                                        class="Tooltip_tooltip__ViBRq AirlineLogos_tooltip__b_MPP">
        
                                                        <div class="Tooltip_row__hoTNN">
        
                                                            <div>
        
                                                                <div class="AirlineLogo_logo__RFs6c">
        
                                                                    <img src="https://content.airhex.com/content/logos/airlines_{{$item['flight_code']}}_300_150_r.gif"
        
                                                                        alt="">
        
                                                                </div>
        
                                                            </div>
        
                                                            <div>
        
                                                                <div class="Tooltip_title__iHHRq">{{$item['flight_name']}}
        
                                                                </div>
        
                                                                <div>{{$segmentsItem->designatorCode}}</div>
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div>
        
                                                    <div>{{$item['flight_name']}} - @if($segmentsItem->cabin=='business' ) {{'Business Class'}} @endif
                                                            @if($segmentsItem->cabin=='first' ) {{'First Class'}} @endif
                                                            @if($segmentsItem->cabin=='economy' ) {{'Economy'}} @endif
                                                            @if($segmentsItem->cabin=='premium_economy' ) {{'Premium Economy'}}  @endif
                                                    </div><small><span>
                                                       @php
                                                        $formdate = date_create($segmentsItem->departureDateTime); 
                                                        $todate = date_create($segmentsItem->arrivalDateTime) ;  
                                                        $fromDate= date_format($formdate,"D M d");
                                                        $toDate= date_format($todate,"D M d");
                                                        $fromtime= date_format($formdate," g:ia");
                                                        $totime= date_format($todate,"g:ia");  
                                                        
                                                       $minutes = $segmentsItem->durationMinutes;
                                                        $hours = floor($minutes / 60);
                                                        if($hours < 10){
                                                        $hours = "0".$hours;
                                                        } 
                                                        $min = $minutes - ($hours * 60);
                                                        if($min < 10){
                                                        $min = "0".$min;
                                                        }
                                                        echo $hours."h ".$min."m";                                                     
                                                        @endphp    
                                                    </span><svg
        
                                                            class="Dot_dot__IjkkU" viewBox="0 0 12 10">
        
                                                            <circle fill="currentColor" r="1.5" cx="6"
        
                                                                cy="4"></circle>
        
                                                        </svg><span>{{$segmentsItem->designatorCode}}</span></small>
        
                                                </div>
        
                                            </div><button
        
                                                class="Button_button__L2wUb FlightOverview_button__g7bLA Button_light-blue__NylWO Button_small__zynrH">Inflight
        
                                                experience</button>
        
                                        </div>
        
                                        <div class="Flight_container__HdtP8">
        
                                            <div class="Flight_line__eZyQX"></div>
        
                                            <div class="Flight_row__Tjg6U">
        
                                                <div class="Flight_spacer__oPDYj">
        
                                                    <div class="Flight_dot__aQBX7"></div>
        
                                                </div>
        
                                                <div class="Flight_col__uwdep">
        
                                                    <div class="Flight_airport__0j3um">
        
                                                        <div class="Flight_date-time__tT2Cd">
        
                                                        <div>{{$fromtime}}</div><small>{{$fromDate}}</small>
        
                                                        </div>
        
                                                        <div>
                                                            <div>{{$segmentsItem->departureAirport_name}}</div><small>Terminal
        
                                                                Terminal I</small>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div class="Flight_row__Tjg6U">
        
                                                <div class="Flight_spacer__oPDYj"></div>
        
                                                <div class="Flight_col__uwdep">
        
                                                    <div class="Flight_details__b7gGI">
        
                                                        <div class="Flight_detail__M0_vW"> Airbus A320
        
                                                        </div>
        
                                                        <div class="Flight_detail__M0_vW"> Main Cabin
        
                                                        </div>
        
                                                        {{-- <div class="Flight_detail__M0_vW" role="button">
        
                                                            <svg width="9" height="13"
        
                                                                viewBox="0 0 9 13" fill="none"
        
                                                                xmlns="http://www.w3.org/2000/svg">
        
                                                                <path
        
                                                                    d="M7.875 3.907h-6.75C.504 3.907 0 4.41 0 5.032v5.25c0 .62.504 1.125 1.125 1.125H1.5v.375c0 .207.168.375.375.375h.75A.375.375 0 003 11.782v-.375h3v.375c0 .207.168.375.375.375h.75a.375.375 0 00.375-.375v-.375h.375c.621 0 1.125-.504 1.125-1.125v-5.25c0-.622-.504-1.125-1.125-1.125zM7.5 8.969a.187.187 0 01-.188.188H1.688a.187.187 0 01-.187-.188v-.375c0-.103.084-.187.188-.187h5.625c.103 0 .187.084.187.187v.375zm0-2.25a.187.187 0 01-.188.188H1.688a.187.187 0 01-.187-.188v-.375c0-.103.084-.187.188-.187h5.625c.103 0 .187.084.187.187v.375zM3.375 1.282h2.25v1.875H6.75V1.282C6.75.66 6.246.157 5.625.157h-2.25C2.754.157 2.25.66 2.25 1.282v1.875h1.125V1.282z"
        
                                                                    fill="currentColor"></path>
        
                                                            </svg> 0
        
                                                        </div> --}}
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div class="Flight_row__Tjg6U">
        
                                                <div class="Flight_spacer__oPDYj">
        
                                                    <div class="Flight_dot__aQBX7"></div>
        
                                                </div>
        
                                                <div class="Flight_col__uwdep">
        
                                                    <div class="Flight_airport__0j3um">
        
                                                        <div class="Flight_date-time__tT2Cd">
        
                                                            <div>{{$totime}}</div><small>{{$toDate}}</small>
        
                                                        </div>
        
                                                        <div>
        
                                                            <div>{{$segmentsItem->arrivalAirportCode_name}}</div>
        
                                                            <small>Terminal Terminal 3</small>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                        </div>
        
                                    </div>

                                    @if((count($item['segments'])-1) != $keysegmentsItem )
                                        <div
                
                                        class="custom-group-segment GroupSegmentHeader_group-segment--large__otuDu">
                        
                                        <div class="GroupSegmentHeader_destinations__T_m3P " style="color: red;font-size: 13px;font-weight: 500;"> {{ $item['stopoverDuration']}}
                        
                                        </div>
                        
                                        <div class="" style="weight: 100%;">
                        
                                            <div class=""style="weight: 100%;color: red;font-size: 13px;font-weight: 500;">{{"Connect in airport"}}</div>
                        
                                        </div>
                            
                                        </div>
                                    @endif
                                    @endforeach
        
                                    <div class="FlightDetails_inner__eOp7F">
        
                                        <div class="FlightDetails_small__V3bcn">* All times are local
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                            </div>
    
    
        
                            <div class="Flight_line__iITBR">
        
                                <div></div>
        
                            </div>
        
                        </div>
        
                    </div>
        
                </div>
                @endforeach     
               
                <div class="Result_row__TV0nZ">
        
                    <div class="Result_buttons__Ozpli">
        
                        <button class="Button_button__L2wUb Result_select-flights__Vl5i8"
        
                        type="button">Select
                            flights
        
                        </button>
        
                    </div>
        
                </div>        
            </div>
        
        </div>
        @if($defult == 0)
    <div class="canselled_pan_faimaly">
     
            <div class="AncillariesResultsBanner_image">
        
                <div class="AncillariesResultsBanner_inner">
        
                    <div class="AncillariesResultsBanner_title">
        
                        <h4>Cancellation protection</h4>
        
                    </div>
        
                    <div class="AncillariesResultsBanner_text">
        
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
        
                            xmlns="http://www.w3.org/2000/svg">
        
                            <path fill-rule="evenodd" clip-rule="evenodd"
        
                                d="M6.17 2.166A3.742 3.742 0 019 .875c1.13 0 2.144.5 2.83 1.29a3.741 3.741 0 012.916 1.09 3.741 3.741 0 011.089 2.914A3.74 3.74 0 0117.125 9a3.742 3.742 0 01-1.29 2.83 3.743 3.743 0 01-1.09 2.915 3.742 3.742 0 01-2.914 1.09A3.742 3.742 0 019 17.124a3.742 3.742 0 01-2.83-1.29 3.742 3.742 0 01-3.778-2.428 3.743 3.743 0 01-.227-1.576A3.741 3.741 0 01.875 9c0-1.13.5-2.144 1.29-2.83a3.742 3.742 0 011.09-2.915 3.742 3.742 0 012.914-1.09zm5.838 5.322a.625.625 0 10-1.016-.726l-2.697 3.775-1.353-1.354a.625.625 0 00-.884.884l1.875 1.875a.625.625 0 00.95-.079l3.125-4.375z"
        
                                fill="#fff"></path>
        
                        </svg>
        
                        {{-- <span>Stress-free flying thanks to Cancellation Protection</span> --}}
        
                    </div>
        
                </div>
        
            </div>
        
        </div>
    @endif
    </form>
    <?php $defult = $defult + 1 ; ?> 
    @endif
    @endforeach
    

    @endforeach
                         </div>  
         
                             </div>
         
                         </div>
         
                     </div>
         
                 </div>
         
             </div>
    
    
             <div id="modal-root">
             </div>
    <?php echo exit;?>
    
    
    
    
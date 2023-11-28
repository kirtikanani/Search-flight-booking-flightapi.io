@extends('layouts.main')
@section('contente')
<style>       
    .ui-state-active,.ui-state-hover,.ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active{
        border: 0px solid #aaa !important;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
        border: 0px solid #d3d3d3 !important;
    }
    .HorizontalFlightSearch_row__3maZ1 .comiseo-daterangepicker-triggerbutton {
        display: none !important;
    }
    .comiseo-daterangepicker-presets{
      display: none !important;
    }
    .ui-datepicker .ui-datepicker-header{
          background: transparent;
      border: none;
    }
    .ui-datepicker-calendar tr th{
      color: #636363;
    }
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
          border: none;
          background: transparent;
      border-radius: 50%;
      padding: 10px;
      width: 35px;
      line-height: 35px;
      display: table;
      text-align: center;
    }
     .comiseo-daterangepicker-calendar .ui-state-highlight:first-child a.ui-state-default.ui-state-active {
        color: #fff !important;
      }
    .comiseo-daterangepicker-calendar .ui-state-highlight a.ui-state-default.ui-state-active {
         background: #2563eb;
      color: #fff;
      border-radius: 50%;
      padding: 10px;
      width: 35px;
      line-height: 35px;
      display: table;
      text-align: center;
  }
    
  .ui-datepicker-multi-2{
      width: 50em !important;
  }
  .comiseo-daterangepicker-right .comiseo-daterangepicker-calendar{
        border: none;
  }
  .comiseo-daterangepicker-buttonpanel .ui-priority-primary{
    display: none;
  }
  /* .comiseo-daterangepicker-buttonpanel .ui-priority-secondary{
    display: none;
  }
   */
  td.cstm_class a{ 
    background:#ffde59 !important;
  }
  td.cstm_class123 a{ 
    background:#ffde59 !important;
  }
 
  
  @media (max-width: 700px) {
    .comiseo-daterangepicker{
      top: 0 !important;
      left: 0 !important;
    } 
    .comiseo-daterangepicker-right .comiseo-daterangepicker-calendar{
      border-left-width: 0px;
    }
    
    .ui-datepicker.ui-datepicker-multi{
      width: 100% !important; 
    }
    .ui-datepicker-multi .ui-datepicker-group {
      float: left;
      width: 100%;
  }
    .comiseo-daterangepicker-right .comiseo-daterangepicker-calendar{
      border-left-width: 0px;
    }
    .ui-datepicker-multi-2 .ui-datepicker-group {
        width: 100% !important;
    }
  }
  </style>
<style>
.flight_loader {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    display: inline-block;
    border-top: 3px solid #fbbf24;
    border-right: 3px solid transparent;
    box-sizing: border-box;
    animation: rotation 1.5s linear infinite;
}

.static-baground {
    width: 60px;
    height: 59px;
    background: #f4f4f4;
    border-radius: 50px;
}

.atlant-load-details {
    color: #495662;
    font-size: 18px;
}

.atlant-load-details-text {
    color: #495662;
    font-size: 12px;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.round-trip-error{
    color:red;
}
.oneway-trip-error{
    color:red;
}
.multicity-trip-error1{
    color:red;
}
.multicity-trip-error2{
    color:red;
}
.multicity-trip-error3{
    color:red;
}

</style>

<!-- first sec -->
<div class="Mobile_container__nNrIR" role="button" tabindex="0">
    <div class="Mobile_col__Bhq1t">
    @for ($i = 0; $i < 3; $i++)
    @if ( $i < $request->numberofFlights)
            <div class="Mobile_cities__gpFp_">
                    @if($i == 0)
                    @php
                    $checkvalueform = 'multiwherefrom';
                    @endphp
                    @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                    @else
                    @php
                    $checkvalueform = 'multiwherefrom'.$i ;
                    @endphp
                    @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                    @endif
                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="Cities_icon__ApkDt">
                    <path d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z" fill="currentColor"></path>
                </svg>
                @if($i == 0)
                @php
                $checkvaluewhereto = 'multiwhereto';
                @endphp
                @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                @else
                @php
                $checkvaluewhereto= 'multiwhereto'.$i ;
                @endphp
                @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                @endif
            </div>
            <div class="Mobile_details__stgqH">
                    @php
                    $checkvaluedatetimes= 'datetimes'.$i+3 ;
                    @endphp


                    @isset($request->$checkvaluedatetimes)
                    @php
                    $date = explode(' - ',$request->$checkvaluedatetimes);
                    if(date('d/m/Y') == $date[0] ){				
                        $date = date('Y-m-d', strtotime(' +1 day'));
                    }else{
                        $date = $date[0];
                    }
                    @endphp
                    @endisset
            <span>{{date_format(date_create($date),"D, d M ")}}</span>
            
            </div>
            @endif
            @endfor
            • <span>@isset($request->adults){{$request->adults}}@endisset Adult,Economy/Coach</span>
        </div>
    <div class="Mobile_icon__zkRJs">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search_svg__feather search_svg__feather-search">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="M21 21l-4.35-4.35"></path>
        </svg>
    </div>
</div>

<div class="modal fade" id="exampleModal-for-search" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      
        <div class="modal-body">
                   
    <div class="slider_tab multiple">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">

                    <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home-mobile"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Round-trip</button>

                </li>

                <li class="nav-item" role="presentation">

                    <button class="nav-link " id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile-mobile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">One Way</button>

                </li>

                <li class="nav-item multiple" role="presentation">

                    <button class="nav-link active" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact-mobile" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Multi-city</button>

                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade " id="pills-home-mobile" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{route('search-flights')}}" method="get">
                        <div class="slider_flights_details">

                            <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">

                                <div>

                                    <div
                                        class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                                    <div class="Inputs_row__pnlIe Wherefromresult ">

                                                        <div class="Inputs_col__mZfV_">

                                                            <div class="Inputs_input__placeholder___r5Tt">Where from?
                                                            </div>

                                                            <div class="Inputs_input__value__zMd_E countryname">
                                                                <span></span></div>

                                                        </div>

                                                        <div class="Inputs_badge__pARWW"></div>

                                                    </div>

                                                    <input readonly="">

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search
                                                            airports</div>

                                                        <div class="AirportField_airport-search__X9tnw">

                                                            <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                placeholder="Where from?" id="wherefrom_mobile">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_swap__9pfyZ">

                                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path
                                                        d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                        fill="currentColor"></path>

                                                </svg>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                                    <div class="Inputs_row__pnlIe Wheretolist ">

                                                        <div class="Inputs_col__mZfV_">

                                                            <div class="Inputs_input__placeholder___r5Tt">Where to?
                                                            </div>

                                                            <div class="Inputs_input__value__zMd_E countryname">
                                                                <span></span></div>

                                                        </div>

                                                        <div class="Inputs_badge__pARWW"></div>

                                                    </div>

                                                    <input readonly="">

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search
                                                            airports</div>

                                                        <div class="AirportField_airport-search__X9tnw">

                                                            <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                placeholder="Where to?" id="whereto_mobile">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date ">

                                            <div class="date-range-picker-mobile"> 
                                                <input type="text" name="datetimes" id="e5" class="datetimes_mobile">
                                            </div>
                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker_mobile"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Departure date</div>

                                                    <div class="Inputs_input__value__zMd_E"><span
                                                            id="startDate" class="startDate">6/13/2023</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker_mobile"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Return date</div>

                                                    <div class="Inputs_input__value__zMd_E"><span
                                                            id="endDate" class="endDate">6/13/2023</span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                                    <div class="Inputs_input__value__zMd_E"><span>1 Adult,
                                                            Economy/Coach</span>

                                                    </div>

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>

                                                        <div class="Passengers_container__GLqfw">

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">adults
                                                                        </span><input type="hidden" name="adults"
                                                                            id='adults' value='1'><span
                                                                            class="Passengers_age__Bbl89"> (12+) </span>
                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="1"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">children</span><input
                                                                            type="hidden" name="children" id='children'
                                                                            value='0'><span
                                                                            class="Passengers_age__Bbl89"> (2-11)
                                                                        </span>

                                                                        <!--<button class="InfoButton_button__0uLFR">-->

                                                                        <!--    <svg-->

                                                                        <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                        <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                        <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                        <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                        <!--    </path>-->

                                                                        <!--</svg>-->

                                                                        <!--</button>-->

                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="0"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">infants</span><input
                                                                            type="hidden" name="infants" id='infants'
                                                                            value='0'><span
                                                                            class="Passengers_age__Bbl89"> (0-1) </span>

                                                                        <!--<button class="InfoButton_button__0uLFR">-->

                                                                        <!--    <svg-->

                                                                        <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                        <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                        <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                        <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                        <!--    </path>-->

                                                                        <!--</svg></button>-->

                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="0"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_footer__aoTDb"><select
                                                                    name="cabin_class" class="Passengers_select__57i9p">

                                                                    <option value="Economy">Economy</option>

                                                                    <option value="Premium_Economy">Premium Economy
                                                                    </option>

                                                                    <option value="Business">Business Class</option>

                                                                    <option value="First">First Class</option>

                                                                </select><button type="button"
                                                                    class="Passengers_done__qJyHR">Done</button></div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC"><button
                                                    class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search

                                                    Flights</button></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-profile-mobile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form action="{{route('search-flights-one-way')}}" method="get">
                            <div class="slider_flights_details">
        
                                <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">
        
                                    <div>
        
                                        <div
                                            class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
        
                                                        <div class="Inputs_row__pnlIe onewaywherefromresult">
        
                                                            <div class="Inputs_col__mZfV_">
        
                                                                <div class="Inputs_input__placeholder___r5Tt">Where from?</div>
        
                                                                <div class="Inputs_input__value__zMd_E countryname">
                                                                    <span></span></div>
        
                                                            </div>
        
                                                            <div class="Inputs_badge__pARWW"></div>
        
                                                        </div>
        
                                                        <input readonly="">
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                            </div>
        
                                                            <div class="AirportField_airport-search__X9tnw">
        
                                                                <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                    placeholder="Where from?" id="onewaywherefrom_mobile">
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_swap__9pfyZ">
        
                                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
        
                                                        <path
                                                            d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                            fill="currentColor"></path>
        
                                                    </svg>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
        
                                                        <div class="Inputs_row__pnlIe onewaywheretolist">
        
                                                            <div class="Inputs_col__mZfV_">
        
                                                                <div class="Inputs_input__placeholder___r5Tt">Where to?</div>
        
                                                                <div class="Inputs_input__value__zMd_E countryname">
                                                                    <span></span></div>
        
                                                            </div>
        
                                                            <div class="Inputs_badge__pARWW"></div>
        
                                                        </div>
        
                                                        <input readonly="">
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                            </div>
        
                                                            <div class="AirportField_airport-search__X9tnw">
        
                                                                <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                    placeholder="Where to?" id="onewaywhereto_mobile">
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date custome_data_time">
        
                                                <input type="text" name="datetimes2" class="datetimes2_mobile">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker2_mobile"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Departure date</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span
                                                                id="startDate2" class="startDate2">06/14/2023</span>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 oneway"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Return date</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span id="endDate__">(One
                                                                way)</span>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Passengers</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span>1 Adult,
                                                                Economy/Coach</span>
        
                                                        </div>
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>
        
                                                            <div class="Passengers_container__GLqfw">
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">adults </span>
                                                                            <input type="hidden" name="adults" id='adults'
                                                                                value='1'>
                                                                            <span class="Passengers_age__Bbl89"> (12+) </span>
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="1"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">children</span>
                                                                            <input type="hidden" name="children" id='children'
                                                                                value='0'><span class="Passengers_age__Bbl89">
                                                                                (2-11) </span>
        
                                                                            <!--<button class="InfoButton_button__0uLFR">-->
        
                                                                            <!--    <svg-->
        
                                                                            <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->
        
                                                                            <!--    viewBox="0 0 24 24" xml:space="preserve">-->
        
                                                                            <!--    <path fill="currentColor" class="info_svg__st0"-->
        
                                                                            <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->
        
                                                                            <!--    </path>-->
        
                                                                            <!--</svg>-->
        
                                                                            <!--</button>-->
        
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="0"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">infants</span><input
                                                                                type="hidden" name="infants" id='infants'
                                                                                value='0'><span class="Passengers_age__Bbl89">
                                                                                (0-1) </span>
        
                                                                            <!--<button class="InfoButton_button__0uLFR">-->
        
                                                                            <!--    <svg-->
        
                                                                            <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->
        
                                                                            <!--    viewBox="0 0 24 24" xml:space="preserve">-->
        
                                                                            <!--    <path fill="currentColor" class="info_svg__st0"-->
        
                                                                            <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->
        
                                                                            <!--    </path>-->
        
                                                                            <!--</svg></button>-->
        
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="0"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_footer__aoTDb"><select name="cabin_class"
                                                                        class="Passengers_select__57i9p">
        
                                                                        <option value="Economy">Economy</option>
        
                                                                        <option value="Premium_Economy">Premium Economy</option>
        
                                                                        <option value="Business">Business Class</option>
        
                                                                        <option value="First">First Class</option>
        
                                                                    </select><button type="button"
                                                                        class="Passengers_done__qJyHR">Done</button></div>
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC"><button
                                                        class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search
        
                                                        Flights</button></div>
        
                                            </div>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                            </div>
                        </form>
                    </div>
        
           
                <div class="tab-pane fade active show" id="pills-contact-mobile" role="tabpanel"
                    aria-labelledby="pills-contact-tab">
                    <form action="{{route('search-flights-multiple-way')}}" method="get">
                        <input type="hidden" name="numberofFlights"
                            value="@isset($request->numberofFlights){{$request->numberofFlights}}@endisset">
                        <div class="add_flight_mobile">
                            @for ($i = 0; $i < 3; $i++)
                                @if ( $i < $request->numberofFlights)
                                <div
                                class="HorizontalFlightSearch HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">

                                <div
                                    class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                            <div class="Inputs_row__pnlIe Wherefromresult ">

                                                <div class="Inputs_col__mZfV_">

                                                    <div class="Inputs_input__placeholder___r5Tt">Where from?</div>

                                                    <div class="Inputs_input__value__zMd_E countryname"><span>
                                                            @if($i == 0)
                                                            @php
                                                            $checkvalueform = 'multiwherefrom';
                                                            @endphp
                                                            @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                                                            @else
                                                            @php
                                                            $checkvalueform = 'multiwherefrom'.$i ;
                                                            @endphp
                                                            @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                                                            @endif

                                                        </span></div>

                                                </div>

                                                <div class="Inputs_badge__pARWW">
                                                    @if($i == 0)
                                                    @php
                                                    $checkvaluefrom_shortname = 'multiwherefrom_shortname';
                                                    @endphp
                                                    @isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset
                                                    @else
                                                    @php
                                                    $checkvaluefrom_shortname = 'multiwherefrom'.$i.'_shortname' ;
                                                    @endphp
                                                    @isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset
                                                    @endif
                                                </div>

                                            </div>

                                            <input readonly="">
                                            <input type="hidden" name="{{$checkvalueform}}"
                                                value="@isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset">
                                            <input type="hidden" name="{{$checkvaluefrom_shortname}}"
                                                value="@isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset">
                                        </div>

                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                            <div>

                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                </div>

                                                <div class="AirportField_airport-search__X9tnw">

                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        value="@isset($request->$checkvaluefrom_shortname){{preg_replace('/\s+/', '',$request->$checkvaluefrom_shortname)}}@endisset"
                                                        placeholder="Where from?" id="{{$checkvalueform}}_mobile">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_swap__9pfyZ">

                                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path
                                                d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                fill="currentColor"></path>

                                        </svg>

                                    </div>

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                            <div class="Inputs_row__pnlIe Wheretolist ">

                                                <div class="Inputs_col__mZfV_">

                                                    <div class="Inputs_input__placeholder___r5Tt">Where to?</div>

                                                    <div class="Inputs_input__value__zMd_E countryname"><span>
                                                            @if($i == 0)
                                                            @php
                                                            $checkvaluewhereto = 'multiwhereto';
                                                            @endphp
                                                            @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                                                            @else
                                                            @php
                                                            $checkvaluewhereto= 'multiwhereto'.$i ;
                                                            @endphp
                                                            @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                                                            @endif
                                                        </span></div>

                                                </div>

                                                <div class="Inputs_badge__pARWW">
                                                    @if($i == 0)
                                                    @php
                                                    $checkvaluewhereto_shortname = 'multiwhereto_shortname';
                                                    @endphp
                                                    @isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset
                                                    @else
                                                    @php
                                                    $checkvaluewhereto_shortname= 'multiwhereto'.$i.'_shortname' ;
                                                    @endphp
                                                    @isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset
                                                    @endif</div>

                                            </div>

                                            <input readonly="">

                                            <input type="hidden" name="{{$checkvaluewhereto}}"
                                                value="@isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset">
                                            <input type="hidden" name="{{$checkvaluewhereto_shortname}}"
                                                value="@isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset">
                                        </div>

                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                            <div>

                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                </div>

                                                <div class="AirportField_airport-search__X9tnw">

                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        value="@isset($request->$checkvaluewhereto_shortname){{ preg_replace('/\s+/', '',$request->$checkvaluewhereto_shortname)}}@endisset"
                                                        placeholder="Where to?" id="{{$checkvaluewhereto}}_mobile">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div
                                    class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date">
                                   

                                    <div class="HorizontalFlightSearch_col__f_ElC">
                                        <div>
                                            <div>
                                        <input type="text" name="datetimes{{$i+3}}"
                                            value="@isset($request->$checkvaluedatetimes){{ str_replace('.', '/',$date[0])}}@endisset"
                                            style=" color: #fff;border: none;line-height: 0;padding: 0;
                                        height: 0;" class="{{$checkvaluedatetimes}}_mobile">
                                        </div>
                                    </div>
                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker{{$i+3}}_mobile"
                                            tabindex="0">

                                            @php
                                            $checkvaluedatetimes= 'datetimes'.$i+3 ;
                                            @endphp


                                            @isset($request->$checkvaluedatetimes)
                                            @php
                                            $date = explode(' - ',$request->$checkvaluedatetimes);
                                            if(date('d/m/Y') == $date[0] ){				
                                                $date = date('Y-m-d', strtotime(' +1 day'));
                                            }else{
                                                $date = $date[0];
                                            }
                                            @endphp
                                            @endisset
                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>

                                            <div class="Inputs_input__value__zMd_E"><span
                                                    id="startDate{{$i+3}}" class="startDate{{$i+3}}">@isset($request->$checkvaluedatetimes){{ str_replace('.', '/',$date)}}@endisset</span>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo"
                                            data-journey="2">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="x_svg__feather x_svg__feather-x">

                                                <path d="M18 6L6 18M6 6l12 12"></path>

                                            </svg> Remove

                                        </div>

                                    </div>
                                    
                                </div>

                            </div>
                                @else

                                @php
                                $checkvalueform = 'multiwherefrom'.$i ;
                                $checkvalueto = 'multiwhereto'.$i ;
                                @endphp
                                <div id="hide{{$i}}" class=" HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">
    
                                <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
    
                                            <div class="Inputs_row__pnlIe Wherefromresult ">
    
                                                <div class="Inputs_col__mZfV_">
    
                                                    <div class="Inputs_input__placeholder___r5Tt">Where from?</div>
    
                                                    <div class="Inputs_input__value__zMd_E countryname"><span></span></div>
    
                                                </div>
    
                                                <div class="Inputs_badge__pARWW"></div>
    
                                            </div>
    
                                            <input readonly="">
    
                                        </div>
    
                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
    
                                            <div>
    
                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports</div>
    
                                                <div class="AirportField_airport-search__X9tnw">
    
                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        placeholder="Where from?" id="{{$checkvalueform}}_mobile">
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_swap__9pfyZ">
    
                                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
    
                                            <path
                                                d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                fill="currentColor"></path>
    
                                        </svg>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
    
                                            <div class="Inputs_row__pnlIe Wheretolist ">
    
                                                <div class="Inputs_col__mZfV_">
    
                                                    <div class="Inputs_input__placeholder___r5Tt">Where to?</div>
    
                                                    <div class="Inputs_input__value__zMd_E countryname"><span></span></div>
    
                                                </div>
    
                                                <div class="Inputs_badge__pARWW"></div>
    
                                            </div>
    
                                            <input readonly="">
    
                                        </div>
    
                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
    
                                            <div>
    
                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports</div>
    
                                                <div class="AirportField_airport-search__X9tnw">
    
                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        placeholder="Where to?" id="{{$checkvalueto}}_mobile">
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                                <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date">
                                        <div>
                                                <div>
                                        <input type="text" name="datetimes{{$i+3}}" style=" color: #fff;border: none;line-height: 0;padding: 0;
                                        height: 0;" value="{{date('d/m/Y')}}" class="datetimes{{$i+3}}_mobile">
                                        </div>
                                    </div>
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker{{$i+3}}_mobile"
                                            tabindex="0">
    
                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>
    
                                            <div class="Inputs_input__value__zMd_E"><span id="startDate{{$i+3}}" class="startDate{{$i+3}}"></span>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo"
                                            data-journey="2">
    
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="x_svg__feather x_svg__feather-x">
    
                                                <path d="M18 6L6 18M6 6l12 12"></path>
    
                                            </svg> Remove
    
                                        </div>
    
                                    </div>
                                    

                                </div>
                                </div>
                               
                                @endif
                              
                                
                            @endfor
                        </div>

                        <div class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">

                            <div
                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--add-flight__0SO45">

                                <div class="HorizontalFlightSearch_col__f_ElC"><button type="button"
                                        class="Button_button__L2wUb HorizontalFlightSearch_add-flight__BEoAN Button_light-blue__NylWO">Add

                                        Flight</button></div>

                                <div class="HorizontalFlightSearch_col__f_ElC"></div>

                                <div class="HorizontalFlightSearch_col__f_ElC"></div>

                            </div>

                            <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0" tabindex="0">

                                        <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                        <div class="Inputs_input__value__zMd_E"><span>
                                                @isset($request->adults){{$request->adults}}@endisset Adult,
                                                @if($request->cabin_class=='Business' ) {{'Business Class'}} @endif
                                                @if($request->cabin_class=='First' ) {{'First Class'}} @endif
                                                @if($request->cabin_class=='Economy' ) {{'Economy'}} @endif
                                                @if($request->cabin_class=='Premium_Economy' ) {{'Premium Economy'}} @endif 
                                                /Coach</span>
                                        </div>

                                    </div>

                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                        style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                        <div>

                                            <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>

                                            <div class="Passengers_container__GLqfw">

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->adults) @if($request->adults == 1) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">adults
                                                            </span><input type="hidden" name="adults" class="adults_round_trip_search_page"
                                                                id='adults'
                                                                value='@isset($request->adults){{$request->adults}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (12+) </span>
                                                        </div><input
                                                            class="Passengers_input__PbNMU quantity__input"
                                                            value="@isset($request->adults){{$request->adults}}@endisset"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->children) @if($request->children == 0) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">children</span><input
                                                                type="hidden" name="children" id='children' class="children_round_trip_search_page"
                                                                value='@isset($request->children){{$request->children}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (2-11)
                                                            </span>


                                                        </div><input class="Passengers_input__PbNMU quantity__input" value="@isset($request->children){{$request->children}}@endisset"><button type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->infants) @if($request->infants == 0) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">infants</span><input
                                                                type="hidden" class="infants_round_trip_search_page" name="infants" id='infants'
                                                                value='@isset($request->infants){{$request->infants}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (0-1) </span>

                                                        </div><input
                                                            class="Passengers_input__PbNMU quantity__input"
                                                            value="@isset($request->infants){{$request->infants}}@endisset"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_footer__aoTDb"><select
                                                        name="cabin_class" class="Passengers_select__57i9p cabin_round_trip_search_page">

                                                        <option value="Economy" @if($request->cabin_class ==
                                                            'Economy' ) selected @endif>Economy</option>

                                                        <option value="Premium_Economy" @if($request->
                                                            cabin_class == 'Premium_Economy' ) selected
                                                            @endif>Premium Economy</option>

                                                        <option value="Business" @if($request->cabin_class
                                                            == 'Business' ) selected @endif>Business Class
                                                        </option>

                                                        <option value="First" @if($request->cabin_class ==
                                                            'First' ) selected @endif >First Class</option>

                                                    </select><button type="button"
                                                        class="Passengers_done__qJyHR">Done</button></div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="HorizontalFlightSearch_col__f_ElC"><button
                                        class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search

                                        Flights</button></div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
   
         </div>
        
        <div class="modal-footer-close-button">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>
<div class="FlightSearch_container FlightSearch_container_mobile">

    <div class="container">

        <div class="slider_tab multiple">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">

                    <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Round-trip</button>

                </li>

                <li class="nav-item" role="presentation">

                    <button class="nav-link " id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">One Way</button>

                </li>

                <li class="nav-item multiple" role="presentation">

                    <button class="nav-link active" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Multi-city</button>

                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{route('search-flights')}}" method="get">
                        <div class="slider_flights_details">

                            <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">

                                <div>

                                    <div
                                        class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                                    <div class="Inputs_row__pnlIe Wherefromresult ">

                                                        <div class="Inputs_col__mZfV_">

                                                            <div class="Inputs_input__placeholder___r5Tt">Where from?
                                                            </div>

                                                            <div class="Inputs_input__value__zMd_E countryname">
                                                                <span></span></div>

                                                        </div>

                                                        <div class="Inputs_badge__pARWW"></div>

                                                    </div>

                                                    <input readonly="">

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search
                                                            airports</div>

                                                        <div class="AirportField_airport-search__X9tnw">

                                                            <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                placeholder="Where from?" id="wherefrom">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_swap__9pfyZ">

                                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path
                                                        d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                        fill="currentColor"></path>

                                                </svg>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                                    <div class="Inputs_row__pnlIe Wheretolist ">

                                                        <div class="Inputs_col__mZfV_">

                                                            <div class="Inputs_input__placeholder___r5Tt">Where to?
                                                            </div>

                                                            <div class="Inputs_input__value__zMd_E countryname">
                                                                <span></span></div>

                                                        </div>

                                                        <div class="Inputs_badge__pARWW"></div>

                                                    </div>

                                                    <input readonly="">

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search
                                                            airports</div>

                                                        <div class="AirportField_airport-search__X9tnw">

                                                            <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                placeholder="Where to?" id="whereto">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date custome_data_time datafrom_custom">

                                            <div class="date-range-picker">  
                                                    <input type="text" name="datetimes" id="e4" class="datetimes">
                                            </div>


                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Departure date</div>

                                                    <div class="Inputs_input__value__zMd_E"><span class="startDate"
                                                        id="startDate">6/13/2023</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Return date</div>

                                                    <div class="Inputs_input__value__zMd_E"><span  class="endDate"
                                                        id="endDate">6/13/2023</span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                            <div class="HorizontalFlightSearch_col__f_ElC">

                                                <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0"
                                                    tabindex="0">

                                                    <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                                    <div class="Inputs_input__value__zMd_E"><span>1 Adult,
                                                            Economy/Coach</span>

                                                    </div>

                                                </div>

                                                <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                    style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                                    <div>

                                                        <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>

                                                        <div class="Passengers_container__GLqfw">

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">adults
                                                                        </span><input type="hidden" name="adults"
                                                                            id='adults' value='1'><span
                                                                            class="Passengers_age__Bbl89"> (12+) </span>
                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="1"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">children</span><input
                                                                            type="hidden" name="children" id='children'
                                                                            value='0'><span
                                                                            class="Passengers_age__Bbl89"> (2-11)
                                                                        </span>

                                                                        <!--<button class="InfoButton_button__0uLFR">-->

                                                                        <!--    <svg-->

                                                                        <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                        <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                        <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                        <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                        <!--    </path>-->

                                                                        <!--</svg>-->

                                                                        <!--</button>-->

                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="0"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_row__hDnMI">

                                                                <div class="Passengers_picker__AweCF"><button
                                                                        type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                        aria-label="decrement" disabled>-</button>

                                                                    <div class="Passengers_description__WNjFy"><span
                                                                            class="Passengers_name__NRRNi">infants</span><input
                                                                            type="hidden" name="infants" id='infants'
                                                                            value='0'><span
                                                                            class="Passengers_age__Bbl89"> (0-1) </span>

                                                                        <!--<button class="InfoButton_button__0uLFR">-->

                                                                        <!--    <svg-->

                                                                        <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                        <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                        <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                        <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                        <!--    </path>-->

                                                                        <!--</svg></button>-->

                                                                    </div><input
                                                                        class="Passengers_input__PbNMU quantity__input"
                                                                        value="0"><button type="button"
                                                                        class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                        aria-label="increment">+</button>

                                                                </div>

                                                            </div>

                                                            <div class="Passengers_footer__aoTDb"><select
                                                                    name="cabin_class" class="Passengers_select__57i9p">

                                                                    <option value="Economy">Economy</option>

                                                                    <option value="Premium_Economy">Premium Economy
                                                                    </option>

                                                                    <option value="Business">Business Class</option>

                                                                    <option value="First">First Class</option>

                                                                </select><button type="button"
                                                                    class="Passengers_done__qJyHR">Done</button></div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="HorizontalFlightSearch_col__f_ElC"><button
                                                    class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search

                                                    Flights</button></div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form action="{{route('search-flights-one-way')}}" method="get">
                            <div class="slider_flights_details">
        
                                <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">
        
                                    <div>
        
                                        <div
                                            class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
        
                                                        <div class="Inputs_row__pnlIe onewaywherefromresult">
        
                                                            <div class="Inputs_col__mZfV_">
        
                                                                <div class="Inputs_input__placeholder___r5Tt">Where from?</div>
        
                                                                <div class="Inputs_input__value__zMd_E countryname">
                                                                    <span></span></div>
        
                                                            </div>
        
                                                            <div class="Inputs_badge__pARWW"></div>
        
                                                        </div>
        
                                                        <input readonly="">
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                            </div>
        
                                                            <div class="AirportField_airport-search__X9tnw">
        
                                                                <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                    placeholder="Where from?" id="onewaywherefrom">
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_swap__9pfyZ">
        
                                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
        
                                                        <path
                                                            d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                            fill="currentColor"></path>
        
                                                    </svg>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
        
                                                        <div class="Inputs_row__pnlIe onewaywheretolist">
        
                                                            <div class="Inputs_col__mZfV_">
        
                                                                <div class="Inputs_input__placeholder___r5Tt">Where to?</div>
        
                                                                <div class="Inputs_input__value__zMd_E countryname">
                                                                    <span></span></div>
        
                                                            </div>
        
                                                            <div class="Inputs_badge__pARWW"></div>
        
                                                        </div>
        
                                                        <input readonly="">
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                            </div>
        
                                                            <div class="AirportField_airport-search__X9tnw">
        
                                                                <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                                    placeholder="Where to?" id="onewaywhereto">
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date">
        
                                                <input type="text" name="datetimes2" class="datetimes2">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker2"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Departure date</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span
                                                            id="startDate2" class="startDate2">06/14/2023</span>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 oneway"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Return date</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span id="endDate__">(One
                                                                way)</span>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                            </div>
        
                                            <div
                                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">
        
                                                <div class="HorizontalFlightSearch_col__f_ElC">
        
                                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0"
                                                        tabindex="0">
        
                                                        <div class="Inputs_input__placeholder___r5Tt">Passengers</div>
        
                                                        <div class="Inputs_input__value__zMd_E"><span>1 Adult,
                                                                Economy/Coach</span>
        
                                                        </div>
        
                                                    </div>
        
                                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                                        style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">
        
                                                        <div>
        
                                                            <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>
        
                                                            <div class="Passengers_container__GLqfw">
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">adults </span>
                                                                            <input type="hidden" name="adults" id='adults'
                                                                                value='1'>
                                                                            <span class="Passengers_age__Bbl89"> (12+) </span>
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="1"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">children</span>
                                                                            <input type="hidden" name="children" id='children'
                                                                                value='0'><span class="Passengers_age__Bbl89">
                                                                                (2-11) </span>
        
                                                                            <!--<button class="InfoButton_button__0uLFR">-->
        
                                                                            <!--    <svg-->
        
                                                                            <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->
        
                                                                            <!--    viewBox="0 0 24 24" xml:space="preserve">-->
        
                                                                            <!--    <path fill="currentColor" class="info_svg__st0"-->
        
                                                                            <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->
        
                                                                            <!--    </path>-->
        
                                                                            <!--</svg>-->
        
                                                                            <!--</button>-->
        
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="0"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_row__hDnMI">
        
                                                                    <div class="Passengers_picker__AweCF"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                                            aria-label="decrement" disabled>-</button>
        
                                                                        <div class="Passengers_description__WNjFy"><span
                                                                                class="Passengers_name__NRRNi">infants</span><input
                                                                                type="hidden" name="infants" id='infants'
                                                                                value='0'><span class="Passengers_age__Bbl89">
                                                                                (0-1) </span>
        
                                                                            <!--<button class="InfoButton_button__0uLFR">-->
        
                                                                            <!--    <svg-->
        
                                                                            <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->
        
                                                                            <!--    viewBox="0 0 24 24" xml:space="preserve">-->
        
                                                                            <!--    <path fill="currentColor" class="info_svg__st0"-->
        
                                                                            <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->
        
                                                                            <!--    </path>-->
        
                                                                            <!--</svg></button>-->
        
                                                                        </div><input
                                                                            class="Passengers_input__PbNMU quantity__input"
                                                                            value="0"><button type="button"
                                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                                            aria-label="increment">+</button>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="Passengers_footer__aoTDb"><select name="cabin_class"
                                                                        class="Passengers_select__57i9p">
        
                                                                        <option value="Economy">Economy</option>
        
                                                                        <option value="Premium_Economy">Premium Economy</option>
        
                                                                        <option value="Business">Business Class</option>
        
                                                                        <option value="First">First Class</option>
        
                                                                    </select><button type="button"
                                                                        class="Passengers_done__qJyHR">Done</button></div>
        
                                                            </div>
        
                                                        </div>
        
                                                    </div>
        
                                                </div>
        
                                                <div class="HorizontalFlightSearch_col__f_ElC"><button
                                                        class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search
        
                                                        Flights</button></div>
        
                                            </div>
        
                                        </div>
        
                                    </div>
        
                                </div>
        
                            </div>
                        </form>
                    </div>
        
           
                <div class="tab-pane fade active show" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab">
                    <form action="{{route('search-flights-multiple-way')}}" method="get">
                        <input type="hidden" name="numberofFlights"
                            value="@isset($request->numberofFlights){{$request->numberofFlights}}@endisset">
                        <div class="add_flight">
                            @for ($i = 0; $i < 3; $i++)
                                @if ( $i < $request->numberofFlights)
                                <div
                                class="HorizontalFlightSearch HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">

                                <div
                                    class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                            <div class="Inputs_row__pnlIe Wherefromresult ">

                                                <div class="Inputs_col__mZfV_">

                                                    <div class="Inputs_input__placeholder___r5Tt">Where from?</div>

                                                    <div class="Inputs_input__value__zMd_E countryname"><span>
                                                            @if($i == 0)
                                                            @php
                                                            $checkvalueform = 'multiwherefrom';
                                                            @endphp
                                                            @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                                                            @else
                                                            @php
                                                            $checkvalueform = 'multiwherefrom'.$i ;
                                                            @endphp
                                                            @isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset
                                                            @endif

                                                        </span></div>

                                                </div>

                                                <div class="Inputs_badge__pARWW">
                                                    @if($i == 0)
                                                    @php
                                                    $checkvaluefrom_shortname = 'multiwherefrom_shortname';
                                                    @endphp
                                                    @isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset
                                                    @else
                                                    @php
                                                    $checkvaluefrom_shortname = 'multiwherefrom'.$i.'_shortname' ;
                                                    @endphp
                                                    @isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset
                                                    @endif
                                                </div>

                                            </div>

                                            <input readonly="">
                                            <input type="hidden" name="{{$checkvalueform}}"
                                                value="@isset($request->$checkvalueform){{$request->$checkvalueform}}@endisset">
                                            <input type="hidden" name="{{$checkvaluefrom_shortname}}"
                                                value="@isset($request->$checkvaluefrom_shortname){{$request->$checkvaluefrom_shortname}}@endisset">
                                        </div>

                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                            <div>

                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                </div>

                                                <div class="AirportField_airport-search__X9tnw">

                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        value="@isset($request->$checkvaluefrom_shortname){{preg_replace('/\s+/', '',$request->$checkvaluefrom_shortname)}}@endisset"
                                                        placeholder="Where from?" id="{{$checkvalueform}}">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_swap__9pfyZ">

                                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path
                                                d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                fill="currentColor"></path>

                                        </svg>

                                    </div>

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                            <div class="Inputs_row__pnlIe Wheretolist ">

                                                <div class="Inputs_col__mZfV_">

                                                    <div class="Inputs_input__placeholder___r5Tt">Where to?</div>

                                                    <div class="Inputs_input__value__zMd_E countryname"><span>
                                                            @if($i == 0)
                                                            @php
                                                            $checkvaluewhereto = 'multiwhereto';
                                                            @endphp
                                                            @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                                                            @else
                                                            @php
                                                            $checkvaluewhereto= 'multiwhereto'.$i ;
                                                            @endphp
                                                            @isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset
                                                            @endif
                                                        </span></div>

                                                </div>

                                                <div class="Inputs_badge__pARWW">
                                                    @if($i == 0)
                                                    @php
                                                    $checkvaluewhereto_shortname = 'multiwhereto_shortname';
                                                    @endphp
                                                    @isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset
                                                    @else
                                                    @php
                                                    $checkvaluewhereto_shortname= 'multiwhereto'.$i.'_shortname' ;
                                                    @endphp
                                                    @isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset
                                                    @endif</div>

                                            </div>

                                            <input readonly="">

                                            <input type="hidden" name="{{$checkvaluewhereto}}"
                                                value="@isset($request->$checkvaluewhereto){{$request->$checkvaluewhereto}}@endisset">
                                            <input type="hidden" name="{{$checkvaluewhereto_shortname}}"
                                                value="@isset($request->$checkvaluewhereto_shortname){{$request->$checkvaluewhereto_shortname}}@endisset">
                                        </div>

                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                            <div>

                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports
                                                </div>

                                                <div class="AirportField_airport-search__X9tnw">

                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        value="@isset($request->$checkvaluewhereto_shortname){{ preg_replace('/\s+/', '',$request->$checkvaluewhereto_shortname)}}@endisset"
                                                        placeholder="Where to?" id="{{$checkvaluewhereto}}">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div
                                    class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date">

                                    <div>
                                            
                                </div>
                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker{{$i+3}}"
                                            tabindex="0">

                                            @php
                                            $checkvaluedatetimes= 'datetimes'.$i+3 ;
                                            @endphp


                                            @isset($request->$checkvaluedatetimes)
                                            @php
                                            $date = explode(' - ',$request->$checkvaluedatetimes);
                                            if(date('d/m/Y') == $date[0] ){				
                                                $date = date('Y-m-d', strtotime(' +1 day'));
                                            }else{
                                                $date = $date[0];
                                            }
                                            @endphp
                                            @endisset
                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>
<div>
                                    <input type="text" name="datetimes{{$i+3}}"
                                        value="@isset($request->$checkvaluedatetimes){{ str_replace('-', '/',$date)}}@endisset"
                                        style=" color: #fff;border: none;line-height: 0;padding: 0;
                                    height: 0;" class="datetimes{{$i+3}}">
                                    </div>
                                            <div class="Inputs_input__value__zMd_E"><span
                                                    id="startDate{{$i+3}}" class="startDate{{$i+3}}">@isset($request->$checkvaluedatetimes){{ str_replace('-', '/',$date)}}@endisset</span>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_col__f_ElC">

                                        <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo"
                                            data-journey="2">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="x_svg__feather x_svg__feather-x">

                                                <path d="M18 6L6 18M6 6l12 12"></path>

                                            </svg> Remove

                                        </div>

                                    </div>
                                    

                                </div>

                            </div>
                                @else

                                @php
                                $checkvalueform = 'multiwherefrom'.$i ;
                                $checkvalueto = 'multiwhereto'.$i ;
                                @endphp
                                <div id="hide{{$i}}" class=" HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">
    
                                <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
    
                                            <div class="Inputs_row__pnlIe Wherefromresult ">
    
                                                <div class="Inputs_col__mZfV_">
    
                                                    <div class="Inputs_input__placeholder___r5Tt">Where from?</div>
    
                                                    <div class="Inputs_input__value__zMd_E countryname"><span></span></div>
    
                                                </div>
    
                                                <div class="Inputs_badge__pARWW"></div>
    
                                            </div>
    
                                            <input readonly="">
    
                                        </div>
    
                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
    
                                            <div>
    
                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports</div>
    
                                                <div class="AirportField_airport-search__X9tnw">
    
                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        placeholder="Where from?" id="{{$checkvalueform}}">
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_swap__9pfyZ">
    
                                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
    
                                            <path
                                                d="M2.52 1.354a.5.5 0 10-.707-.708L.48 1.98a.5.5 0 000 .707L1.813 4.02a.5.5 0 00.707-.707l-.48-.48h6.793a.5.5 0 100-1H2.04l.48-.48zM8.48 5.98a.5.5 0 000 .707l.48.48H2.167a.5.5 0 100 1H8.96l-.48.48a.5.5 0 10.707.707L10.52 8.02a.5.5 0 000-.707L9.187 5.98a.5.5 0 00-.707 0z"
                                                fill="currentColor"></path>
    
                                        </svg>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">
    
                                            <div class="Inputs_row__pnlIe Wheretolist ">
    
                                                <div class="Inputs_col__mZfV_">
    
                                                    <div class="Inputs_input__placeholder___r5Tt">Where to?</div>
    
                                                    <div class="Inputs_input__value__zMd_E countryname"><span></span></div>
    
                                                </div>
    
                                                <div class="Inputs_badge__pARWW"></div>
    
                                            </div>
    
                                            <input readonly="">
    
                                        </div>
    
                                        <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                            style="max-width: 500px; opacity: 1; transform: translate(0px, 0px); display: none;">
    
                                            <div>
    
                                                <div class="Dropdown_title__cEB8Z Dropdown_title__cEB8Z_modile">Begin typing to search airports</div>
    
                                                <div class="AirportField_airport-search__X9tnw">
    
                                                    <input class="Input_input__LYUld AirportField_input__C0fpS"
                                                        placeholder="Where to?" id="{{$checkvalueto}}">
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                                <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn search-flight-custome-date">
                                        <div>
                                                <div>
                                        <input type="text" name="datetimes{{$i+3}}" style=" color: #fff;border: none;line-height: 0;padding: 0;
                                        height: 0;" value="{{date('d/m/Y')}}" class="datetimes{{$i+3}}">
                                        </div>
                                    </div>
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker{{$i+3}}"
                                            tabindex="0">
    
                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>
    
                                            <div class="Inputs_input__value__zMd_E"><span id="startDate{{$i+3}}" class="startDate{{$i+3}}"></span>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                    <div class="HorizontalFlightSearch_col__f_ElC">
    
                                        <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo"
                                            data-journey="2">
    
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="x_svg__feather x_svg__feather-x">
    
                                                <path d="M18 6L6 18M6 6l12 12"></path>
    
                                            </svg> Remove
    
                                        </div>
    
                                    </div>
                                    

                                </div>
                                </div>
                               
                                @endif
                              
                                
                            @endfor
                        </div>

                        <div class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">

                            <div
                                class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--add-flight__0SO45">

                                <div class="HorizontalFlightSearch_col__f_ElC"><button type="button"
                                        class="Button_button__L2wUb HorizontalFlightSearch_add-flight__BEoAN Button_light-blue__NylWO">Add

                                        Flight</button></div>

                                <div class="HorizontalFlightSearch_col__f_ElC"></div>

                                <div class="HorizontalFlightSearch_col__f_ElC"></div>

                            </div>

                            <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0" tabindex="0">

                                        <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                        <div class="Inputs_input__value__zMd_E"><span>
                                                @isset($request->adults){{$request->adults}}@endisset Adult,
                                                @if($request->cabin_class=='Business' ) {{'Business Class'}} @endif
                                                @if($request->cabin_class=='First' ) {{'First Class'}} @endif
                                                @if($request->cabin_class=='Economy' ) {{'Economy'}} @endif
                                                @if($request->cabin_class=='Premium_Economy' ) {{'Premium Economy'}} @endif 
                                                /Coach</span>

                                        </div>

                                    </div>

                                    <div class="modal airport-list Dropdown_dropdown__YFvvQ withModal_dropdown__8cMNJ"
                                        style="max-width: 300px; opacity: 1; transform: translate(0px, 0px); display: none;">

                                        <div>

                                            <div class="Dropdown_title__cEB8Z Dropdown_title_Passengers_mobile">Passengers</div>

                                            <div class="Passengers_container__GLqfw">

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->adults) @if($request->adults == 1) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">adults
                                                            </span><input type="hidden" name="adults" class="adults_round_trip_search_page"
                                                                id='adults'
                                                                value='@isset($request->adults){{$request->adults}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (12+) </span>
                                                        </div><input
                                                            class="Passengers_input__PbNMU quantity__input"
                                                            value="@isset($request->adults){{$request->adults}}@endisset"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->children) @if($request->children == 0) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">children</span><input
                                                                type="hidden" name="children" id='children' class="children_round_trip_search_page"
                                                                value='@isset($request->children){{$request->children}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (2-11)
                                                            </span>


                                                        </div><input class="Passengers_input__PbNMU quantity__input" value="@isset($request->children){{$request->children}}@endisset"><button type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_row__hDnMI">

                                                    <div class="Passengers_picker__AweCF"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--decrement__EEmwZ quantity__minus_one"
                                                            aria-label="decrement" @isset($request->infants) @if($request->infants == 0) disabled @endif @endisset>-</button>

                                                        <div class="Passengers_description__WNjFy"><span
                                                                class="Passengers_name__NRRNi">infants</span><input
                                                                type="hidden" class="infants_round_trip_search_page" name="infants" id='infants'
                                                                value='@isset($request->infants){{$request->infants}}@endisset'><span
                                                                class="Passengers_age__Bbl89"> (0-1) </span>

                                                        </div><input
                                                            class="Passengers_input__PbNMU quantity__input"
                                                            value="@isset($request->infants){{$request->infants}}@endisset"><button
                                                            type="button"
                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"
                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_footer__aoTDb"><select
                                                        name="cabin_class" class="Passengers_select__57i9p cabin_round_trip_search_page">

                                                        <option value="Economy" @if($request->cabin_class ==
                                                            'Economy' ) selected @endif>Economy</option>

                                                        <option value="Premium_Economy" @if($request->
                                                            cabin_class == 'Premium_Economy' ) selected
                                                            @endif>Premium Economy</option>

                                                        <option value="Business" @if($request->cabin_class
                                                            == 'Business' ) selected @endif>Business Class
                                                        </option>

                                                        <option value="First" @if($request->cabin_class ==
                                                            'First' ) selected @endif >First Class</option>

                                                    </select><button type="button"
                                                        class="Passengers_done__qJyHR">Done</button></div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="HorizontalFlightSearch_col__f_ElC"><button
                                        class="HorizontalFlightSearch_submit__Pwl4r" type="submit">Search

                                        Flights</button></div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>
<div class="modal fade modal_img_comntent" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            {{-- <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">courses List</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            
            <div class="modal-body">
                <center> 
                    <div class="static-baground">
                        <span class="flight_loader"></span>
                    </div>
                    <div>
                        <svg width="50" height="100" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: visible;margin-top: -91px;">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.716 7.345l-2.04.95c-1.48-.473-3.59-.915-5.474-1.517a.2.2 0 00-.145.008l-.53.243a.199.199 0 00-.04.338c.96.736 2.18 1.616 3.13 2.355l-2.038.95c-.88-.186-1.813-.253-2.511-.399-.38-.079-.612.255-.254.533 1.692 1.32 2.37 1.852 2.37 1.852.293.229.656.373 1.007.212l9.333-4.352c.68-.345.653-.83.48-1.222-.41-.88-1.537-.752-3.288.048z"
                        fill="#fbbf24"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="atlant-load-details"> We're checking availability </span>
                    </div>
                    <div>
                        <span class="atlant-load-details-text">This might take us a minute </span> 
                    </div>   
                     <div class="owl_theme_img_slider">
                        <div class="owl-carousel owl-theme" id="owl_theme_img_2">
                            <div class="item">
                                <div class="owl_img_popup">
                                    <div class="canselled_pan_faimaly">
                                        <div class="AncillariesResultsBanner_image">
                                            <div class="AncillariesResultsBanner_inner">
                                                <div class="AncillariesResultsBanner_title">
                                                    <h4>Cancellation protection</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div> 
                               
                </center>
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> --}}
          </div>
        </div>
      </div>

<div class="bar-three bar-con">
        <div class="bar" data-percent="80"></div>
      </div>
      
<div class="Ribbon_ribbon__i17Lw ">
        <div class="Ribbon_wrapper__tkKRC">
            <div class="Ribbon_inner__KOu_1">
                <div class="Ribbon_item___rdPd">
                    <div class="FlightsLoading_container__2XGRF">
                        <div class="FlightsLoading_icon__MMb6c"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="search_svg__feather search_svg__feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                            </svg></div>
                        <div>
                            <div class="FlightsLoading_title__NnS8I">Searching flights</div>
                            <div class="FlightsLoading_text__VZ2BX">
                                <div class="FlightsLoading_airline__WEtXE">
                                    <div class="custome-animation">
                                        
                                        <span>
                                                with @isset($request->multiwherefrom){{$request->multiwherefrom}} @endisset<br /> 
                                                with @isset($request->multiwhereto){{$request->multiwhereto}} @endisset<br />
                                                with @isset($request->multiwherefrom){{$request->multiwherefrom}} @endisset<br /> 
                                                with @isset($request->multiwhereto){{$request->multiwhereto}} @endisset<br />
                                                with @isset($request->multiwherefrom){{$request->multiwherefrom}} @endisset<br /> 
                                                with @isset($request->multiwhereto){{$request->multiwhereto}} @endisset<br />
                                          </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<div class="list_ajax_response_wrappper"></div>



@endsection
@section('jsfile')

<script>
    $('#owl_theme_img_2').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
         autoplay: true,
            autoplayTimeout: 1500,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>



<script>

    $(document).ready(function () {
        var scrollPos =  $(".bar-three").offset().top;
        $(window).scrollTop(scrollPos);
        $('#owl_flights').owlCarousel({

            loop: false,

            margin: 10,

            nav: true,

            navText: [

                "<i class='fa fa-caret-left'></i>",

                "<i class='fa fa-caret-right'></i>"

            ],

            responsive: {

                0: {

                    items: 1

                },

                600: {

                    items: 3

                },

                1000: {

                    items: 4

                }

            }





        });

        // $(".owl-prev").click(function () {
        $(document).on('click', '.owl-prev', function (e) {

            $(".slick-list").slick("slickPrev");

        });



        //$(".owl-next").click(function () {
        $(document).on('click', '.owl-next', function (e) {
            $(".slick-list").slick("slickNext");

        });

        $(".owl-prev").addClass("slick-disabled");

        $(".slick-list").on("afterChange", function () {

            if ($(".slick-prev").hasClass("slick-disabled")) {

                $(".owl-prev").addClass("slick-disabled");

            } else {

                $(".owl-prev").removeClass("slick-disabled");

            }

            if ($(".slick-next").hasClass("slick-disabled")) {

                $(".owl-next").addClass("slick-disabled");

            } else {

                $(".owl-next").removeClass("slick-disabled");

            }

        });



    });

</script>



<script>



    $('.nonloop').owlCarousel({

        center: true,

        items: 6,

        loop: false,

        margin: 25,

        responsive: {

            600: {

                items: 6

            }

        }

    });

</script>



<script>

    $(document).ready(function () {

        //toggle the component with class accordion_body

        // $(".accordion_head").click(function () {
        $(document).on('click', '.accordion_head', function (e) {

            if ($('.accordion_body').is(':visible')) {

                $(".accordion_body").slideUp(300);

                $(".plusminus").html('<i class="fas fa-angle-down"></i>');

            }

            if ($(this).next(".accordion_body").is(':visible')) {

                $(this).next(".accordion_body").slideUp(300);

                $(this).children(".plusminus").html('<i class="fas fa-angle-down"></i>');

            } else {

                $(this).next(".accordion_body").slideDown(300);

                $(this).children(".plusminus").html('<i class="fas fa-angle-up"></i>');

            }

        });

    });

</script>



<!-- hide show -->



<script>


    function flightsdetailsHideshow(para) {
        if (($('#' + para).attr('style')) == "display: none;") {
            $('#' + para).css('display', 'block');
        } else {
            $('#' + para).css('display', 'none');
        }
    }

</script>



<script>
    $(document).on('click', '.Inputs_input__gSCDv', function (e) {
        $(".Dropdown_dropdown__YFvvQ").hide();
        $(this).closest(".HorizontalFlightSearch_col__f_ElC").find('.Dropdown_dropdown__YFvvQ').css('display', 'block');
        $(this).closest(".HorizontalFlightSearch_col__f_ElC").find('.Dropdown_dropdown__YFvvQ').find('input').focus()
        e.stopPropagation();
    });
    $(document).on('click.Dropdown_dropdown__YFvvQ', '.Dropdown_dropdown__YFvvQ', function (e) {
        e.stopPropagation();
    });
    $(document).on('click.Dropdown_dropdown__YFvvQ', function (e) {
        $(".Dropdown_dropdown__YFvvQ").hide();
        e.stopPropagation();
    });

    $(".oneway").click(function () {

        $('#pills-home-tab').trigger("click");

        $("input[name='datetimes']").trigger("click");

    });
</script>


<script>
    function autocomplete(inp, arr) {

        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false; }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            const parent = a.getAttribute('id');
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the ..*/
            $.ajax({
                url: "search-airport/" + inp.value, success: function (result) {
                    var response = jQuery.parseJSON(result);
                    response = response.suggestions;

                    for (i = 0; i < response.length; i++) {
                        // if (response[i].data.name.substr(0, val.length).toUpperCase() == val.toUpperCase() || response[i].data.city.substr(0, val.length).toUpperCase() == val.toUpperCase() || response[i].data.country.substr(0, val.length).toUpperCase() == val.toUpperCase()|| response[i].data.code.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        var responsedata = response[i];
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        var flagimage = (response[i].data.country_code).toLowerCase();
                        var shortname = response[i].data.code;
                        b.innerHTML = `<div class="divlistclick Airport_airport__nNby_ Airport_airport--highlighted__p1ETq" role="button" tabindex="0">
                            <img class="flag flag--medium flag-img" src="{{asset('assets/flag-icons-main/flag-icons-main/flags/4x3/${flagimage}.svg')}}" >
                            <div class="Airport_text__UyplE">
                                <div>${response[i].value}</div>
                            <div class="Airport_country__2eciM">
                                ${response[i].data.country}
                            </div></div><div class="Airport_code__rkNaN" data-notranslate="true">${shortname}</div></div>
                            `;
                        var valueselected = response[i].value;
                        /*insert a input field that will hold the current arr.countriesay item's value:*/
                        b.innerHTML += "<input type='hidden' data-shortname='" + shortname + "' value='" + response[i].value + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/

                        b.addEventListener("click", function (e) {

                            var closetelement = inp.getAttribute('id');
                            /*insert the value for the autocomplete text field:*/
                            var inputvalue = this.getElementsByTagName("input")[0].value;
                            var inputshortname = this.getElementsByTagName("input")[0].getAttribute('data-shortname');
                            if (closetelement == 'wherefrom') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'whereto') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'onewaywherefrom') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                $('.onewaywherefromresult').find('.countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $('.onewaywherefromresult').find('.Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'onewaywhereto') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                $('.onewaywheretolist').find('.countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $('.onewaywheretolist').find('.Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'multiwherefrom') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'multiwhereto') {
                                $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                //document.getElementsByClassName('Wheretolist')
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            }
                            var array = $('.add_flight .HorizontalFlightSearch_inner__v18wS').map(function () {
                                return this.getAttribute('class');
                            }).get();
                            var increment = array.length;

                            for (var i = 0; i <= increment; i++) {
                                if (closetelement == 'multiwherefrom' + i) {
                                    $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                    $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                                } else if (closetelement == 'multiwhereto' + i) {
                                    //document.getElementsByClassName('Wheretolist')
                                    $('[name="'+closetelement+'"]').remove();
                                    $('[name="'+closetelement+'_shortname"]').remove();
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                    <input type='hidden' name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                    $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                                }

                            }
                            /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        if (closetelement == 'wherefrom_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'whereto_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'onewaywherefrom_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                $('.onewaywherefromresult').find('.countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $('.onewaywherefromresult').find('.Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'onewaywhereto_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                $('.onewaywheretolist').find('.countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $('.onewaywheretolist').find('.Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'multiwherefrom_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            } else if (closetelement == 'multiwhereto_mobile') {
                                $('[name="' + closetelement + '"]').remove();
                                $('[name="' + closetelement + '_shortname"]').remove();
                                //document.getElementsByClassName('Wheretolist')
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                 $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                            }
                            var array = $('.add_flight_mobile .HorizontalFlightSearch_inner__v18wS').map(function () {
                                return this.getAttribute('class');
                            }).get();
                            var increment = array.length;

                            for (var i = 0; i <= increment; i++) {
                                if (closetelement == 'multiwherefrom_mobile' + i) {
                                    $('[name="' + closetelement + '"]').remove();
                                    $('[name="' + closetelement + '_shortname"]').remove();
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden'  name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .Inputs_badge__pARWW').html(inputshortname);
                                    $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                                } else if (closetelement == 'multiwhereto_mobile' + i) {
                                    //document.getElementsByClassName('Wheretolist')
                                    $('[name="' + closetelement + '"]').remove();
                                    $('[name="' + closetelement + '_shortname"]').remove();
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html(inputvalue + `<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
                                        <input type='hidden' name='${closetelement}_shortname'  value='${inputshortname}' >`);
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .Inputs_badge__pARWW').html(inputshortname);
                                    $('.airport-list').modal('hide');                                 
                                     $('.airport-list').css({
                                        'max-width': '500px',
                                        'opacity': 1,
                                        'transform': 'translate(0px, 0px)',
                                        'display': 'none',
                                    });
                                }

                            }
                        });
                        a.appendChild(b);
                    }
                    // }
                }
            });

        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arresow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {

            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];


    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

    autocomplete(document.getElementById("wherefrom"), countries);
    autocomplete(document.getElementById("whereto"), countries);
    autocomplete(document.getElementById("onewaywherefrom"), countries);
    autocomplete(document.getElementById("onewaywhereto"), countries);
    autocomplete(document.getElementById("multiwherefrom"), countries);
    autocomplete(document.getElementById("multiwhereto"), countries);
    autocomplete(document.getElementById("multiwherefrom1"), countries);
    autocomplete(document.getElementById("multiwhereto1"), countries);
    autocomplete(document.getElementById("multiwherefrom2"), countries);
    autocomplete(document.getElementById("multiwhereto2"), countries);

    // mobile view 
    autocomplete(document.getElementById("wherefrom_mobile"), countries);
    autocomplete(document.getElementById("whereto_mobile"), countries);
    autocomplete(document.getElementById("onewaywherefrom_mobile"), countries);
    autocomplete(document.getElementById("onewaywhereto_mobile"), countries);
    autocomplete(document.getElementById("multiwherefrom_mobile"), countries);
    autocomplete(document.getElementById("multiwhereto_mobile"), countries);
    autocomplete(document.getElementById("multiwherefrom1_mobile"), countries);
    autocomplete(document.getElementById("multiwhereto1_mobile"), countries);
    autocomplete(document.getElementById("multiwherefrom2_mobile"), countries);
    autocomplete(document.getElementById("multiwhereto2_mobile"), countries);


    $(".HorizontalFlightSearch_add-flight__BEoAN").click(function () {
        var array = $('.add_flight .HorizontalFlightSearch').map(function () {
            return this.getAttribute('class');
        }).get();
        if (array.length < 3) {
            $('#hide').show().removeAttr('id').addClass('HorizontalFlightSearch');
            $('#hide'+array.length).show().removeAttr('id').addClass('HorizontalFlightSearch');
            $('[name="numberofFlights"]').val(array.length + 1);
        } else {
            alert('maximum value is 3');
        }
    });

    $(document).on('click', '.HorizontalFlightSearch_remove-button__pD4oo', function () {
        $(this).closest('.HorizontalFlightSearch_inner__v18wS').attr('id', 'hide').removeClass('HorizontalFlightSearch').hide();
        var array = $('.add_flight .HorizontalFlightSearch').map(function () {
            return this.getAttribute('class');
        }).get();
        $('[name="numberofFlights"]').val(array.length);
    });
  

 

</script>
<script>

    $(document).ready(function () {
       var data = '{{print_r(json_encode($request->all()))}}';
        var url = "{{route('search-flights-multiple-way-details')}}";
        $.ajax({
            url: url,
            data: {
                data: data,
                Currency : "{{$Currency}}"
            },
            success: function (response) {
                 $(".bar-three .bar").css("width", 100+"%");
                setTimeout(function() {
                    $('.bar-three').hide();
                    $('.Ribbon_ribbon__i17Lw').hide();   
                    $('.list_ajax_response_wrappper').html(response);

                /**/
                $('#owl_flights').owlCarousel({

                    loop: false,

                    margin: 10,

                    nav: true,

                    navText: [

                        "<i class='fa fa-caret-left'></i>",

                        "<i class='fa fa-caret-right'></i>"

                    ],

                    responsive: {

                        0: {

                            items: 1

                        },

                        600: {

                            items: 3

                        },

                        1000: {

                            items: 4

                        }

                    }
                });
                /**/
            }, 5000);      
                }
        });
    });
    

    var html ='Begin typing to search airports';
    var passagerhtml = 'Passengers';
    if ($(window).width() < 700) {
        $('.airport-list').addClass('modal');
            html += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            passagerhtml += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            $('.Dropdown_title__cEB8Z_modile').html(html);
            $('.Dropdown_title_Passengers_mobile').html(passagerhtml);
    }else{
        $('.airport-list').removeClass('modal');
        $('.Dropdown_title__cEB8Z_modile').html(html);
        $('.Dropdown_title_Passengers_mobile').html(passagerhtml);
    }
    }
    $(document).ready(function () {
        resize()
    })

    //watch window resize
    $(window).on('resize', function() {
    resize()
    });

    $(document).on('click', '.Dropdown_title__cEB8Z_modile .btn-close', function () {
        $('.airport-list').modal('hide');                                 
        $('.airport-list').css({
            'max-width': '500px',
            'opacity': 1,
            'transform': 'translate(0px, 0px)',
            'display': 'none',
        });
    });
    $(document).on('click', '.Dropdown_title_Passengers_mobile .btn-close', function () {
        $('.airport-list').modal('hide');                                 
        $('.airport-list').css({
            'max-width': '500px',
            'opacity': 1,
            'transform': 'translate(0px, 0px)',
            'display': 'none',
        });
    });

    $(document).on('click', '.Mobile_icon__zkRJs', function () {
        $('#exampleModal-for-search').modal('show');
        $('.FlightSearch_container_mobile').show();
    });
    
    $(document).on('click', '.modal-footer-close-button', function () {
        $('#exampleModal-for-search').modal('hide');
        $('.FlightSearch_container_mobile').hide();
    });
    $(document).on('change', '.Sort_select__78U1Q', function () {
        var value = $(this).val()
        if(value == 'defultAmountFunction'){
            defultAmountFunction();
        }
        if(value == 'cheapestAmountFunction'){
            cheapestAmountFunction();
        }
        if(value == 'quickestAmountFunction'){
            quickestAmountFunction();
        }
    });
</script>

<script>
    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate()+1;
    var currentYear = date.getFullYear();

        function runDatePicker(datevalue) {
                $(function () {
                    $("#e4").daterangepicker({
                        datepickerOptions: {
                            minDate: new Date(currentYear, currentMonth, currentDate), 
                            maxDate: null,
                            numberOfMonths: datevalue,
                        }
                    });
                   
                    $(".datetimes2,.datetimes3,.datetimes4,.datetimes5").datepicker({ 
                        
                        minDate: new Date(currentYear, currentMonth, currentDate),                       
                        datepickerOptions: {
                            minDate: 0,
                            maxDate: null,
                        },                        
                    numberOfMonths: datevalue,
                    });
                    $(".datetimes2_mobile,.datetimes3_mobile,.datetimes4_mobile,.datetimes5_mobile").datepicker({                        
                        minDate: new Date(currentYear, currentMonth, currentDate),
                        datepickerOptions: {
                            minDate: 0,
                            maxDate: null,
                        },
                    numberOfMonths: datevalue,
                    });
                });
        
            }
            
            $('.date_picker').click(function (e) {
                $(".date-range-picker .comiseo-daterangepicker-triggerbutton").trigger("click");
            });
            $('.date_picker2').click(function (e) {
                $(".datetimes2").focus();
            });
            
            $('.date_picker3').click(function (e) {
                $(".datetimes3").focus();
            });           
            $('.date_picker4').click(function (e) {
                $(".datetimes4").focus();

            });           
            $('.date_picker5').click(function (e) {              
                $(".datetimes5").focus();
            });

            // mobile 
            $(document).on('click','.date_picker_mobile',function (e) {
                systemresize()
                $('#drp_autogen0').trigger("click");
              $('.comiseo-daterangepicker-mask').show()
              $('.comiseo-daterangepicker').show();
              $(".date-range-picker .comiseo-daterangepicker-triggerbutton").trigger("click");
                $(".date-range-picker button").trigger("click");
            });
          
            $('.date_picker2_mobile').click(function (e) {
                $(".datetimes2_mobile").focus();
            });
            
            $('.date_picker3_mobile').click(function (e) {
                $(".datetimes3_mobile").focus();
            });           
            $('.date_picker4_mobile').click(function (e) {
                $(".datetimes4_mobile").focus();

            });           
            $('.date_picker5_mobile').click(function (e) {               
                $(".datetimes5_mobile").focus();
            });
        
            function resize() {
                datevalue = 2;
                if ($(window).width() < 700) {
                    datevalue = 12;
                    $('.comiseo-daterangepicker-calendar .ui-datepicker-inline').css({
                        'overflow': 'scroll',
                        'height': 'auto',
                    });
                }
                return datevalue;
            }
            $(document).ready(function () {
                runDatePicker(resize());
            })
        
            //watch window resize
            $(window).on('resize', function () {
                runDatePicker(resize());
            });
            $(document).on('change','#e4',function(){
                response = jQuery.parseJSON($(this).val());
                $(this).val(response.start+' - '+response.end)
                $('.startDate').html(response.start);
                $('.endDate').html(response.end);
            })
            $(document).on('change','.datetimes_mobile',function(){
                response = jQuery.parseJSON($(this).val());
                $(this).val(response.start+' - '+response.end)
                $('.startDate').html(response.start);
                $('.endDate').html(response.end);
            })
            
            $(document).on('change','.datetimes2',function(){
                $('.startDate2').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes3',function(){
                $('.startDate3').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes4',function(){
                $('.startDate4').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes5',function(){
                $('.startDate5').html($(this).val());
                $('.ui-datepicker').hide()
            })

            // mobile view 
            
            $(document).on('change','.datetimes2_mobile',function(){
                $('.startDate2').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes3_mobile',function(){
                $('.startDate3').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes4_mobile',function(){
                $('.startDate4').html($(this).val());
                $('.ui-datepicker').hide()
            })
            $(document).on('change','.datetimes5_mobile',function(){
                $('.startDate5').html($(this).val());
                $('.ui-datepicker').hide()
            })
            
            $(document).on('click','.mobile-close-div-datepicker',function(){
                $('.ui-datepicker').hide();
                $('#ui-datepicker-div').hide();
            });

        </script>
        <script src="https://cdn.jsdelivr.net/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="https://tamble.github.io/jquery-ui-daterangepicker/assets/js/setup.js"></script>
        <script src="https://tamble.github.io/jquery-ui-daterangepicker/prettify/prettify.min.js"></script>
@endsection
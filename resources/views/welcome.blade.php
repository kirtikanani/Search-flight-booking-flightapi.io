@extends('layouts.main')

@section('contente')
<style>
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
<style>
        /* .comiseo-daterangepicker{
            top: 43% !important;
            left: 15% !important;
        }  */
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





       

       

        <div class="slider_tab" >

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">

                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"

                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Round-trip</button>

                </li>

                <li class="nav-item" role="presentation">

                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"

                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">One Way</button>

                </li>

                <li class="nav-item multiple" role="presentation">

                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"

                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Multi-city</button>

                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="{{route('search-flights')}}" method="get" id="round_trip_home_submit">
                        {{-- @csrf --}}

                    <div class="round-trip-error"></div>
                    <div class="slider_flights_details">

                        <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">

                            <div>

                                <div class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">

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

                                                            placeholder="Where to?" id="whereto">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn custome_data_time">

                                        <div class="date-range-picker">                                       
                                        <input type="text" name="datetimes" id="e4"  class="datetimes datetimes_position ">
                                          
                                        </div>
                                        <div class="HorizontalFlightSearch_col__f_ElC datafrom_custom">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker"

                                                tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Departure date</div>

                                                <div class="Inputs_input__value__zMd_E"><span id="startDate">6/13/2023</span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker"

                                                tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Return date</div>

                                                <div class="Inputs_input__value__zMd_E"><span id="endDate">6/13/2023</span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0" tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                                <div class="Inputs_input__value__zMd_E"><span>1 Adult, Economy/Coach</span>

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

                                                                        class="Passengers_name__NRRNi">adults </span><input type="hidden" class="adults_round_trip" name="adults" id='adults' value='1'><span

                                                                        class="Passengers_age__Bbl89"> (12+) </span></div><input

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

                                                                        class="Passengers_name__NRRNi">children</span><input type="hidden" class="children_round_trip" name="children" id='children' value='0'><span

                                                                        class="Passengers_age__Bbl89"> (2-11) </span>

                                                                    <!--<button class="InfoButton_button__0uLFR">-->

                                                                    <!--    <svg-->

                                                                    <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                    <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                    <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                    <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                    <!--    </path>-->

                                                                    <!--</svg>-->

                                                                    <!--</button>-->

                                                                </div><input class="Passengers_input__PbNMU quantity__input"

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

                                                                        class="Passengers_name__NRRNi">infants</span><input class="infants_round_trip" type="hidden" name="infants" id='infants' value='0'><span

                                                                        class="Passengers_age__Bbl89"> (0-1) </span>

                                                                    <!--<button class="InfoButton_button__0uLFR">-->

                                                                    <!--    <svg-->

                                                                    <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                    <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                    <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                    <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                    <!--    </path>-->

                                                                    <!--</svg></button>-->

                                                                </div><input class="Passengers_input__PbNMU quantity__input"

                                                                    value="0"><button type="button"

                                                                    class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"

                                                                    aria-label="increment">+</button>

                                                            </div>

                                                        </div>

                                                        <div class="Passengers_footer__aoTDb"><select
                                                            name="cabin_class"
                                                                class="Passengers_select__57i9p cabin_round_trip">

                                                                <option value="Economy">Economy</option>

                                                                <option value="Premium_Economy">Premium Economy</option>

                                                                <option value="Business">Business Class</option>

                                                                <option value="First">First Class</option>

                                                            </select><button type="button" class="Passengers_done__qJyHR">Done</button></div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="HorizontalFlightSearch_col__f_ElC"><button

                                                class="HorizontalFlightSearch_submit__Pwl4r" id="round_trip_home_page" type="button">Search

                                                Flights</button></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="{{route('search-flights-one-way')}}" id="oneway_trip_home_submit" method="get">
                    <div class="oneway-trip-error"></div>
                    <div class="slider_flights_details">

                        <div class="Collapse_container__b8tZ3" style="overflow: visible; height: 79px;">

                            <div>

                                <div class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--standard__sN3_r">

                                    <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--airports__1Js1q">

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0">

                                                <div class="Inputs_row__pnlIe onewaywherefromresult">

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

                                                            placeholder="Where to?" id="onewaywhereto">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn custome_data_time">

                                            <div class="date-range-picker2">   
                                                    <input type="text" value="{{date('d/m/Y')}}" name="datetimes2"  class="datetimes2">
                                            </div>

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker2"

                                                tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Departure date</div>

                                                <div class="Inputs_input__value__zMd_E">
                                                    
                                                        {{-- <input type="text" name="datetimes2" id="e2" class="datetimes2"> --}}
                                                    <span id="startDate2">06/14/2023</span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 oneway"

                                                tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Return date</div>

                                                <div class="Inputs_input__value__zMd_E"><span id="endDate__">(One way)</span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                        <div class="HorizontalFlightSearch_col__f_ElC">

                                            <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0" tabindex="0">

                                                <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                                <div class="Inputs_input__value__zMd_E"><span>1 Adult, Economy/Coach</span>

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
                                                                        <input type="hidden" class="adults_oneway_trip" name="adults" id='adults' value='1'>
                                                                        <span

                                                                        class="Passengers_age__Bbl89"> (12+) </span></div><input

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

                                                                        class="Passengers_name__NRRNi">children</span> <input type="hidden" class="children_oneway_trip" name="children" id='children' value='0'><span

                                                                        class="Passengers_age__Bbl89"> (2-11) </span>

                                                                    <!--<button class="InfoButton_button__0uLFR">-->

                                                                    <!--    <svg-->

                                                                    <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                    <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                    <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                    <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                    <!--    </path>-->

                                                                    <!--</svg>-->

                                                                    <!--</button>-->

                                                                </div><input class="Passengers_input__PbNMU quantity__input"

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

                                                                        class="Passengers_name__NRRNi">infants</span><input type="hidden" class="infants_oneway_trip" name="infants" id='infants' value='0'><span

                                                                        class="Passengers_age__Bbl89"> (0-1) </span>

                                                                    <!--<button class="InfoButton_button__0uLFR">-->

                                                                    <!--    <svg-->

                                                                    <!--    id="info_svg__Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"-->

                                                                    <!--    viewBox="0 0 24 24" xml:space="preserve">-->

                                                                    <!--    <path fill="currentColor" class="info_svg__st0"-->

                                                                    <!--        d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1.5 15.1c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5V12c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v5.1zM12 8.4c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5c0 .9-.7 1.5-1.5 1.5z">-->

                                                                    <!--    </path>-->

                                                                    <!--</svg></button>-->

                                                                </div><input class="Passengers_input__PbNMU quantity__input"

                                                                    value="0"><button type="button"

                                                                    class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"

                                                                    aria-label="increment">+</button>

                                                            </div>

                                                        </div>

                                                        <div class="Passengers_footer__aoTDb"><select
                                                                name="cabin_class"
                                                                class="Passengers_select__57i9p cabin_oneway_trip">

                                                                <option value="Economy">Economy</option>

                                                                <option value="Premium_Economy">Premium Economy</option>

                                                                <option value="Business">Business Class</option>

                                                                <option value="First">First Class</option>

                                                            </select><button  type="button" class="Passengers_done__qJyHR">Done</button></div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="HorizontalFlightSearch_col__f_ElC"><button

                                                class="HorizontalFlightSearch_submit__Pwl4r" id="oneway_trip_home_page" type="button">Search

                                                Flights</button></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <form action="{{route('search-flights-multiple-way')}}" id="multicity_trip_home_submit" method="get">
                            <input type="hidden" name="numberofFlights" id="numberofFlights" value="2">
                    <div class="add_flight">

                    <div class="multicity-trip-error1"></div>

                        <div class="HorizontalFlightSearch HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_ multicity_1">

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

                                                    placeholder="Where from?" id="multiwherefrom">

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

                                                    placeholder="Where to?" id="multiwhereto">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn custome_data_time">
                                    

                                    <div class="HorizontalFlightSearch_col__f_ElC">
                                        <div class="date-range-picker3">   
                                            <input type="text" name="datetimes3" value="{{date('d/m/Y')}}"  style=" color: #fff;border: none;line-height: 0;padding: 0;
                                            height: 0;" class="datetimes3">
                                            </div>
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker3"

                                            tabindex="0">

                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>

                                            <div class="Inputs_input__value__zMd_E"><span id="startDate3">06/14/2023</span>

                                            </div>

                                        </div>

                                    </div>

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo" data-journey="2">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"

                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" class="x_svg__feather x_svg__feather-x">

                                            <path d="M18 6L6 18M6 6l12 12"></path>

                                        </svg> Remove

                                    </div>

                                </div>
                                
                                

                            </div>

                        </div>

                        <div class="multicity-trip-error2"></div>

                        <div class="HorizontalFlightSearch HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_ multicity_2">

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

                                                    placeholder="Where from?" id="multiwherefrom1">

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

                                                    placeholder="Where to?" id="multiwhereto1">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn custome_data_time">

                                    <div class="HorizontalFlightSearch_col__f_ElC">
                                        <div class="date-range-picker4">  
                                            <input type="text" name="datetimes4"  value="{{date('d/m/Y')}}" style=" color: #fff;border: none;line-height: 0;padding: 0;
                                            height: 0;" class="datetimes4">
                                            </div>
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker4"

                                            tabindex="0">

                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>

                                            <div class="Inputs_input__value__zMd_E"><span id="startDate4"></span>

                                            </div>

                                        </div>

                                    </div>

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo" data-journey="2">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"

                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" class="x_svg__feather x_svg__feather-x">

                                            <path d="M18 6L6 18M6 6l12 12"></path>

                                        </svg> Remove

                                    </div>

                                </div>
                                

                            </div>

                        </div>

                        <div class="multicity-trip-error3"></div>

                        <div  id="hide" class=" HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_ multicity_3" >

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

                                                    placeholder="Where from?" id="multiwherefrom2">

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

                                                    placeholder="Where to?" id="multiwhereto2">

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--dates__iOHJn custome_data_time">

                                    <div class="HorizontalFlightSearch_col__f_ElC">
                                        <div class="date-range-picker5">  
                                            <input type="text" name="datetimes5" value="{{date('d/m/Y')}}" style=" color: #fff;border: none;line-height: 0;padding: 0;
                                            height: 0;" class="datetimes5">
                                            </div>
                                        <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0 date_picker5"

                                            tabindex="0">

                                            <div class="Inputs_input__placeholder___r5Tt">Date</div>

                                            <div class="Inputs_input__value__zMd_E"><span id="startDate5"></span>

                                            </div>

                                        </div>

                                    </div>

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div role="button" class="HorizontalFlightSearch_remove-button__pD4oo" data-journey="2">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"

                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"

                                            stroke-linejoin="round" class="x_svg__feather x_svg__feather-x">

                                            <path d="M18 6L6 18M6 6l12 12"></path>

                                        </svg> Remove

                                    </div>

                                </div>
                                

                            </div>

                        </div>
                        

                    </div>

                    <div class="HorizontalFlightSearch_inner__v18wS HorizontalFlightSearch_inner--multi__Vjso_">

                        <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--add-flight__0SO45">

                            <div class="HorizontalFlightSearch_col__f_ElC"><button
                                    type="button"
                                    class="Button_button__L2wUb HorizontalFlightSearch_add-flight__BEoAN Button_light-blue__NylWO">Add

                                    Flight</button></div>

                            <div class="HorizontalFlightSearch_col__f_ElC"></div>

                            <div class="HorizontalFlightSearch_col__f_ElC"></div>

                        </div>

                        <div class="HorizontalFlightSearch_row__3maZ1 HorizontalFlightSearch_row--submit__PPu_I">

                                <div class="HorizontalFlightSearch_col__f_ElC">

                                    <div class="Inputs_input__gSCDv HorizontalFlightSearch_input__FisR0" tabindex="0">

                                        <div class="Inputs_input__placeholder___r5Tt">Passengers</div>

                                        <div class="Inputs_input__value__zMd_E"><span>1 Adult, Economy/Coach</span>

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

                                                                class="Passengers_name__NRRNi">adults </span><input type="hidden" class="adults_multicity_trip" name="adults" id='adults' value='1'><span

                                                                class="Passengers_age__Bbl89"> (12+) </span></div><input

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

                                                                class="Passengers_name__NRRNi">children</span><input type="hidden" class="children_multicity_trip" name="children" id='children' value='0'><span

                                                                class="Passengers_age__Bbl89"> (2-11) </span>

                                                        </div><input class="Passengers_input__PbNMU quantity__input"

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

                                                                class="Passengers_name__NRRNi">infants</span><input type="hidden" class="infants_multicity_trip" name="infants" id='infants' value='0'><span

                                                                class="Passengers_age__Bbl89"> (0-1) </span>


                                                        </div><input class="Passengers_input__PbNMU quantity__input"

                                                            value="0"><button type="button"

                                                            class="Passengers_button__CoEym Passengers_button--increment__NaOnP quantity__plus_one"

                                                            aria-label="increment">+</button>

                                                    </div>

                                                </div>

                                                <div class="Passengers_footer__aoTDb"><select
                                                    name="cabin_class"
                                                        class="Passengers_select__57i9p cabin_multicity_trip">

                                                        <option value="Economy">Economy</option>

                                                        <option value="Premium_Economy">Premium Economy</option>

                                                        <option value="Business">Business Class</option>

                                                        <option value="First">First Class</option>

                                                    </select><button type="button" class="Passengers_done__qJyHR">Done</button></div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="HorizontalFlightSearch_col__f_ElC"><button

                                        class="HorizontalFlightSearch_submit__Pwl4r" id="multicity_trip_home_page" type="button">Search

                                        Flights</button></div>

                            </div>

                    </div>
                    </form>
                </div>

            </div>

        </div>



    











 

    
           
     

@endsection

@section('jsfile')






<script>
  $(document).on('click','.Inputs_input__gSCDv',function(e){
        $(".Dropdown_dropdown__YFvvQ").hide();
        $(this).closest(".HorizontalFlightSearch_col__f_ElC").find('.Dropdown_dropdown__YFvvQ').css('display', 'block');
        $(this).closest(".HorizontalFlightSearch_col__f_ElC").find('.Dropdown_dropdown__YFvvQ').find('input').focus()
        e.stopPropagation();
    });
    $(document).on('click.Dropdown_dropdown__YFvvQ','.Dropdown_dropdown__YFvvQ',function(e){
        e.stopPropagation();
    });
    $(document).on('click.Dropdown_dropdown__YFvvQ',function(e){
        $(".Dropdown_dropdown__YFvvQ").hide();
        e.stopPropagation();
    });
</script>
    <script>
        let today = "{{date('Y-m-d', strtotime(' +1 day'))}}";

        
        $("#startDate").html(today);
        $("#endDate").html(today);
        $("#startDate2").html(today);
        $("#startDate3").html(today);
        $("#startDate4").html(today);
        $("#startDate5").html(today);
        $("#hide").hide();

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
                            var responsedata = response[i] ; 
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
                            var valueselected =response[i].value ;
                            /*insert a input field that will hold the current arr.countriesay item's value:*/
                            b.innerHTML += "<input type='hidden' data-shortname='" + shortname + "' value='" + response[i].value + "'>";
                            /*execute a function when someone clicks on the item value (DIV element):*/
                            
                            b.addEventListener("click", function (e) {
                                 
                                var closetelement = inp.getAttribute('id');
                                /*insert the value for the autocomplete text field:*/
                                var inputvalue = this.getElementsByTagName("input")[0].value ; 
                                var inputshortname = this.getElementsByTagName("input")[0].getAttribute('data-shortname');
                                if (closetelement == 'wherefrom') {
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                    //document.getElementsByClassName('Wheretolist')
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                    $('.onewaywherefromresult').find('.countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                    $('.onewaywheretolist').find('.countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                    //document.getElementsByClassName('Wheretolist')
                                    $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                        $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wherefromresult .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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
                                        $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Wheretolist .countryname span').html( inputvalue+`<input type='hidden'  name='${closetelement}' value='${inputvalue}'>
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


    $(".HorizontalFlightSearch_add-flight__BEoAN").click(function () {
        var array = $('.add_flight .HorizontalFlightSearch').map(function () {
            return this.getAttribute('class');
        }).get();        
        if(array.length < 3 ){           
            $('#hide').show().removeAttr('id').addClass('HorizontalFlightSearch');
            $('[name="numberofFlights"]').val(array.length+1); 
        }else{
            alert('maximum value is 3'); 
        }       
    });

    $(document).on('click', '.HorizontalFlightSearch_remove-button__pD4oo', function () {
        $(this).closest('.HorizontalFlightSearch_inner__v18wS').attr('id','hide').removeClass('HorizontalFlightSearch').hide();
        var array = $('.add_flight .HorizontalFlightSearch').map(function () {
            return this.getAttribute('class');
        }).get(); 
        $('[name="numberofFlights"]').val(array.length); 
    });
    $(document).on('click', '.Passengers_button__CoEym', function () {
        var passengerValue = $(this).closest('.Passengers_picker__AweCF').find('.Passengers_input__PbNMU').val();
        var getcurrentvalue = $(this).closest('.Passengers_picker__AweCF').find('.Passengers_name__NRRNi').html();
        if ($(this).hasClass('Passengers_button--increment__NaOnP')) {
            $(this).closest('.Passengers_picker__AweCF').find('.Passengers_button--decrement__EEmwZ').removeAttr('disabled');
            $(this).closest('.Passengers_picker__AweCF').find('.Passengers_input__PbNMU').val(Number(passengerValue) + Number(1))
            $(this).closest('.Passengers_picker__AweCF').find('#' + $.trim(getcurrentvalue)).val(Number(passengerValue) + Number(1));

        } else if ($(this).hasClass('Passengers_button--decrement__EEmwZ')) {
            //var passengerValue =  $(this).closest('.Passengers_picker__AweCF').find('.Passengers_input__PbNMU').val();           
            if ($.trim(getcurrentvalue) == 'adults') {
                if (passengerValue == 2) {
                    $(this).attr('disabled', 'disabled');
                }
                if (passengerValue != 1) {
                    $(this).closest('.Passengers_picker__AweCF').find('.Passengers_input__PbNMU').val(Number(passengerValue) - Number(1));
                    $(this).closest('.Passengers_picker__AweCF').find('#' + $.trim(getcurrentvalue)).val(Number(passengerValue) - Number(1));
                }

            } else {
                if (passengerValue == 1) {
                    $(this).attr('disabled', 'disabled');
                }
                if (passengerValue != 0) {
                    $(this).closest('.Passengers_picker__AweCF').find('.Passengers_input__PbNMU').val(Number(passengerValue) - Number(1));
                    $(this).closest('.Passengers_picker__AweCF').find('#' + $.trim(getcurrentvalue)).val(Number(passengerValue) - Number(1));
                }
            }
        }
    });

    $(document).on('click', '.Passengers_done__qJyHR', function () {
        var getcurrentvalue = $(this).closest('.Passengers_container__GLqfw').find('.Passengers_name__NRRNi').html();
        var adultsCurrentValue = $(this).closest('.Passengers_container__GLqfw').find('#' + $.trim(getcurrentvalue)).val();
        var cabin_class = $(this).closest('.Passengers_container__GLqfw').find('[name="cabin_class"]').val();
        var appendValue = adultsCurrentValue + " " + $.trim(getcurrentvalue) + "," + cabin_class + "/Coach";
        $(this).closest('.HorizontalFlightSearch_col__f_ElC').find('.Inputs_input__value__zMd_E span').html(appendValue);
        $('.Dropdown_dropdown__YFvvQ ').hide();
    });
    //Resize window
    function windowResize() {
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
        windowResize()
    })

    //watch window resize
    $(window).on('resize', function() {
        windowResize()
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
                });
        
            }
            
            $('.date_picker').click(function (e) {
                $(".date-range-picker .comiseo-daterangepicker-triggerbutton").trigger("click");
            });
            $('.date_picker2').click(function (e) {
                // alert('dfgh');
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
                $('#startDate').html(response.start);
                $('#endDate').html(response.end);
            })
            $(document).on('change','.datetimes2',function(){
                $('.ui-datepicker').hide()
                $('#startDate2').html($(this).val());
            })
            $(document).on('change','.datetimes3',function(){
                $('.ui-datepicker').hide()
                $('#startDate3').html($(this).val());
            })
            $(document).on('change','.datetimes4',function(){
                $('.ui-datepicker').hide()
                $('#startDate4').html($(this).val());
            })
            $(document).on('change','.datetimes5',function(){
                $('.ui-datepicker').hide()
                $('#startDate5').html($(this).val());
            })
            $(document).on('click','.mobile-close-div-datepicker',function(){
                    $('.ui-datepicker').hide();
                    $('#ui-datepicker-div').hide();
                });
        </script>
        <script src="https://cdn.jsdelivr.net/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="https://tamble.github.io/jquery-ui-daterangepicker/assets/js/setup.js"></script>
        <script src="https://tamble.github.io/jquery-ui-daterangepicker/prettify/prettify.min.js"></script>
        <script>
                let dt = new Date("@isset(DB::table('ecommerce_setting')->first()->countdown_date){{DB::table('ecommerce_setting')->first()->countdown_date}}@endisset");
                 
                    // Set the date we're counting down to
                    var countDownDate = dt;
                    
                    // Update the count down every 1 second
                    var x = setInterval(function() {
                    
                      // Get today's date and time
                      var now = new Date().getTime();
                        
                      // Find the distance between now and the count down date
                      var distance = countDownDate - now;
                        
                      // Time calculations for days, hours, minutes and seconds
                      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        
                      // Output the result in an element with id="demo"
                      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                      + minutes + "m " + seconds + "s ";
                        
                      // If the count down is over, write some text 
                      if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "";
                      }
                    }, 1000);
                    </script>

        @endsection

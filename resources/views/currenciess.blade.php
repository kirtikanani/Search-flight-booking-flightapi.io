    <div class="Panel_panel__uttaE Panel_open__hNXbh">
        <div class="Panel_overlay__PYCjF" role="button" tabindex="0"></div>
        <div></div>
        <div class="Panel_container__tLkEI">
            <div class="Panel_header__xdR8o">
                <div class="Panel_title__qjegB">Select a Currency</div>
                <div role="button" class="Panel_button__Bja1d">Close</div>
            </div>
            <div class="Panel_inner__4Okxa">
                <div class="Switcher_switcher__kREuj CurrencyPicker_switcher__DO19K">
                    <div class="Switcher_switcher-item__tN6yu Switcher_switcher-item--active__AExx4" role="button">
                        Currency</div>
                </div>
                <div class="TextInput_wrapper__uWefA Search_wrapper__LfrUg">
                    <div class="TextInput_container__KcVcb">
                        <div class="TextInput_outer__Gco7M Search_outer__jot4s"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="Search_icon__U5xzQ">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                            </svg>
                            <div class="TextInput_inner__PwEjk"><input id="qYxTeRQWN3"
                                    class="TextInput_text-input__W_lDp Search_text-input__CTKrE"><label for="qYxTeRQWN3"
                                    class="TextInput_label__qftt9 Search_label__b4Gy1">Search</label></div>
                        </div>
                        <div class="TextInput_validation-message__oTE_x"></div>
                    </div>
                </div>
                <div class="CurrencyPicker_currencies__W25Wf">
                    @foreach ($response_data as $key=>$item)
                    {{-- @php
                     echo "<pre>" ; print_r($key);   
                    @endphp --}}
                    @if ($key =='fiat')
                    @foreach ($item as $key=>$value)
                        @isset($value)
                         <div class="Currency_item__5BXBw" title="{{$value->name}}" role="button" tabindex="0" data-value="{{$value->code}}">
                                <div class="Currency_icon__XZ2od">
                                    <div class="CurrencyPicker_flag__GBIfA flag flag--usd">
                                        @php
                                        $imageUrl = 'assets/flag-icons-main/flag-icons-main/flags/4x3/'.strtolower($value->default_country).'.svg'    
                                        @endphp
                                            <img class="flag flag--medium flag-img" src="{{$imageUrl}}">
                                    </div>
                                </div>
                                <div class="Currency_content__YNrjn">
                                    <div class="Currency_title__iXJYc">{{$value->name}}</div>
                                    <div class="Currency_sub-title__DPBXw">{{$value->code}}</div>
                                </div>
                                <div class="Checkbox_container__4a_zm Checkbox_container--radio__ix_9M">
                                    <div class="round">
                                        <input type="checkbox"   />
                                        <label for="checkbox"></label>
                                    </div>
                                </div>
                            </div>
                            @endisset
                    @endforeach
                    @endif
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
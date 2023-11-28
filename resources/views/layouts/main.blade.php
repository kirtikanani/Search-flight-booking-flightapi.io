<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
      <?php 
      $checjstringEsixt = false ; 
          if(str_contains(str_replace('_','-',Request::segment(1)),'search-flights')){
            $checjstringEsixt = true ; 
          }
         ?>
           
       
    </title>
    


    <style id="INLINE_PEN_STYLESHEET_ID">
        .bar-con {
      background-color: #ccc;
      height: 0.5em;
      margin-bottom: 1em;
    }
    .bar {
      float: left;
      height: 100%;
      width: 0%;
    }
       
    .bar-three .bar {
      background-color: #FF9900;
      transition: width cubic-bezier(0.72, 0.45, 0.9, 0.12) 8s;
      -webkit-transition: width cubic-bezier(0.72, 0.45, 0.9, 0.12) 6s;
      -moz-transition: width cubic-bezier(0.72, 0.45, 0.9, 0.12) 6s;
      -o-transition: width cubic-bezier(0.72, 0.45, 0.9, 0.12) 6s;
    }
    
      </style>
  
    <!-- favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('https://sofkpvtltd.com/wp-content/uploads/2022/12/mainlogo.png')}}">


    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/dist/duDatepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/dist/duDatepicker-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/sliderform.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/new_style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/Airport.module.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/flags.css')}}">

    <link rel="stylesheet" href="{{asset('assets/flag-icons-main/flag-icons-main/css/flag-icons.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/css/Panel.module.css')}}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
<link rel="stylesheet" href="https://tamble.github.io/jquery-ui-daterangepicker/assets/css/styles.css">
<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.css')}}">

</head>



<body>
    @include('layouts.header')

    @yield('contente')

    @include('layouts.footer')
{{--  
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
  {{-- <script src="https://cdpn.io/cpe/boomboom/pen.js?key=pen.js-979de8de-d629-6a5a-f78a-94475fbc5d42" crossorigin=""></script> --}}



    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="{{asset('assets/js/datepicker/jquery-ui.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
    <script src="{{asset('assets/js/datepicker/jquery.comiseo.daterangepicker.js')}}"></script>
    
    <script src="{{asset('assets/js/owl.carousel.js')}}"></script>

    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}




    @yield('jsfile')
    <script>
      
(function ( $ ) {
  $.fn.progress = function() {
    var percent = this.data("percent");
    this.css("width", percent+"%");
  };
}( jQuery ));

$(document).ready(function(){
  $(".bar-three .bar").progress();
  // setInterval(myFunction,1000);
});
function myFunction() {
  console.clear();
}
    (function(window, $){
  "use strict";

  var defaultConfig = {
    type: '',
    autoDismiss: false,
    container: '#toasts',
    autoDismissDelay: 4000,
    transitionDuration: 500
  };

  $.toast = function(config){
    var size = arguments.length;
    var isString = typeof(config) === 'string';
    
    if(isString && size === 1){
      config = {
        message: config
      };
    }

    if(isString && size === 2){
      config = {
        message: arguments[1],
        type: arguments[0]
      };
    }
    
    return new toast(config);
  };

  var toast = function(config){
    config = $.extend({}, defaultConfig, config);
    // show "x" or not
    var close = config.autoDismiss ? '' : '&times;';
    
    // toast template
    var toast = $([
      '<div class="toast ' + config.type + '">',
      '<p>' + config.message + '</p>',
      '<div class="close">' + close + '</div>',
      '</div>'
    ].join(''));
    
    // handle dismiss
    toast.find('.close').on('click', function(){
      var toast = $(this).parent();

      toast.addClass('hide');

      setTimeout(function(){
        toast.remove();
      }, config.transitionDuration);
    });
    
    // append toast to toasts container
    $(config.container).append(toast);
    
    // transition in
    setTimeout(function(){
      toast.addClass('show');
    }, config.transitionDuration);

    // if auto-dismiss, start counting
    if(config.autoDismiss){
      setTimeout(function(){
        toast.find('.close').click();
      }, config.autoDismissDelay);
    }

    return this;
  };
  
})(window, jQuery);

/* ---- start demo code ---- */

var count = 1;
var types = ['default', 'error', 'warning', 'info'];

$('button').click(function(){
  var data = this.dataset;

  switch(data.type){
    case 'types':
      $.toast(data.kind, 'This is a ' + data.kind + ' toast.');
      break;
    case 'html':
      $.toast('<div class="custom-toast"><img src="https://dysfunc.github.io/animat.io/images/ron_burgundy.png"><p>You stay classy San Deigo</p></div>');
      break;

    case 'auto':
      $.toast({
        autoDismiss: true,
        message: 'This is my auto-dismiss toast message'
      });

      break;
      
    default:
       $.toast('Hello there!');
  }
});


/* ---- end demo code ---- */

    </script>
    <script>
      //   $(document).on('click', '.currency_ok', function (e) {
      //   var url = "{{route('currencies')}}"; 
      //   $.ajax({
      //       url: url,            
      //       success: function (response) {
      //          $('#modal-root').html(response) ; 
      //       }
      //     });

      // });
      // $(document).on('click', '.Panel_button__Bja1d', function (e) {
      //     $(this).closest('.Panel_open__hNXbh').remove(); 
      // });
      $(document).on('click','#Currency',function(){
        $('#pills-tabContent .active form').append(`<input type="hidden" name="Currency" value="${$(this).val()}">`);
        $('#pills-tabContent .active form').submit(); 
    });
    function cheapestAmountFunction() 
            {
                var $wrap = $('.appendFlightDetails');
                $wrap.find('form').sort(function(a, b) 
                    {
                        return +a.dataset.amount -
                            +b.dataset.amount;
                    })
                    .appendTo($wrap);
            }
    function quickestAmountFunction() 
    {
        var $wrap = $('.appendFlightDetails');
        $wrap.find('form').sort(function(a, b) 
            {
                return +a.dataset.duration_time -
                    +b.dataset.duration_time;
            })
            .appendTo($wrap);
    }
    function defultAmountFunction() 
    {
        var $wrap = $('.appendFlightDetails');
        $wrap.find('form').sort(function(a, b) 
            {
                return +a.dataset.defult -
                    +b.dataset.defult;
            })
            .appendTo($wrap);
            
    }

      $(document).on('click','.defult',function(){
        defultAmountFunction(); 
        $('#defult').prop('checked',true);
      });

      $(document).on('click','.cheapest',function(){
        cheapestAmountFunction(); 
        $('#cheapest').prop('checked',true);
      });

      $(document).on('click','.quickest',function(){
        quickestAmountFunction(); 
        $('#quickest').prop('checked',true);
      });
    </script>

    <script>
      $('#round_trip_home_page').click(function(){
            var wherefrom = $('#wherefrom').val();
            var whereto = $('#whereto').val();
            var startDate = $('#startDate').html();
            var endDate = $('#endDate').html();
            var adults_round_trip = $('.adults_round_trip').val();
            var children_round_trip = $('.children_round_trip').val();
            var infants_round_trip = $('.infants_round_trip').val();
            var cabin_round_trip = $('.cabin_round_trip').val();

            
            hasNotError = 1;
            if(wherefrom == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select From');
            }

            else if(whereto == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select To');
            }

            else if(startDate == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Start Date');
            }
            
            else if(endDate == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select End Date');
            }

            else if((adults_round_trip == '' && children_round_trip == "" && infants_round_trip == "" ) || (adults_round_trip == '0' && children_round_trip == '0' && infants_round_trip == '0')  ){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Passengers');
            }

            else if(cabin_round_trip == '' || cabin_round_trip == 'undefined'){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Cabin');
            }

         
            if(hasNotError == 1){
                $('#round_trip_home_submit').submit();
            }else {
              setInterval(function() {
                $(".round-trip-error").html("");
            }, 10000);
          }

      });


      $('#oneway_trip_home_page').click(function(){
            var onewaywherefrom = $('#onewaywherefrom').val();
            var onewaywhereto = $('#onewaywhereto').val();
            var startDate2 = $('#startDate2').html();
            var adults_oneway_trip = $('.adults_oneway_trip').val();
            var children_oneway_trip = $('.children_oneway_trip').val();
            var infants_oneway_trip = $('.infants_oneway_trip').val();
            var cabin_oneway_trip = $('.cabin_oneway_trip').val();

            
            hasNotError = 1;
            if(onewaywherefrom == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select From');
            }

            else if(onewaywhereto == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select To');
            }

            else if(startDate2 == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Date');
            }
            

            else if((adults_oneway_trip == '' && children_oneway_trip == "" && infants_oneway_trip == "" ) || (adults_oneway_trip == '0' && children_oneway_trip == '0' && infants_oneway_trip == '0')  ){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Passengers');
            }

            else if(cabin_oneway_trip == '' || cabin_oneway_trip == 'undefined'){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Cabin');
            }

         
            if(hasNotError == 1){
                $('#oneway_trip_home_submit').submit();
            }else {
              setInterval(function() {
                $(".oneway-trip-error").html("");
            }, 10000);
          }

      });


      $('#multicity_trip_home_page').click(function(){

            var numberofFlights = $('#numberofFlights').val();
            var multiwherefrom = $('#multiwherefrom').val();
            var multiwhereto = $('#multiwhereto').val();
            var startDate3 = $('#startDate3').html();
            var multiwherefrom1 = $('#multiwherefrom1').val();
            var multiwhereto1 = $('#multiwhereto1').val();
            var startDate4 = $('#startDate4').html();
            var multiwherefrom2 = $('#multiwherefrom2').val();
            var multiwhereto2 = $('#multiwhereto2').val();
            var startDate5 = $('#startDate5').html();

            var adults_multicity_trip = $('.adults_multicity_trip').val();
            var children_multicity_trip = $('.children_multicity_trip').val();
            var infants_multicity_trip = $('.infants_multicity_trip').val();
            var cabin_multicity_trip = $('.cabin_multicity_trip').val();


            hasNotError = 1;

            if(numberofFlights == 1){

              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }
            }

            else if(numberofFlights == 2){


              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if(multiwherefrom1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select From');
              }

              else if(multiwhereto1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select To');
              }

              else if(startDate4 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }


            }
            else if(numberofFlights == 3){

              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if(multiwherefrom1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select From');
              }

              else if(multiwhereto1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select To');
              }

              else if(startDate4 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select Date');
              }
              else if(multiwherefrom2 == ''){
                hasNotError = 0;
                $('.multicity-trip-error3').html('Please Select From');
              }

              else if(multiwhereto2 == ''){
                hasNotError = 0;
                $('.multicity-trip-error3').html('Please Select To');
              }

              else if(startDate5 == ''){
                startDate5 = 0;
                $('.multicity-trip-error3').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }

            }

            
            if(hasNotError == 1){
                $('#multicity_trip_home_submit').submit();
            }else {
              setInterval(function() {
                $(".multicity-trip-error1").html("");
                $(".multicity-trip-error2").html("");
                $(".multicity-trip-error3").html("");
            }, 10000);
          }

      });
    </script>



<script>
      $('#round_trip_search_page').click(function(){
        
            var wherefrom = $('.wherefrom').val();
            var whereto = $('.whereto').val();
            var startDate = $('.startDate').html();
            var endDate = $('.endDate').html();
            var adults_round_trip = $('.adults_round_trip_search_page').val();
            var children_round_trip = $('.children_round_trip_search_page').val();
            var infants_round_trip = $('.infants_round_trip_search_page').val();
            var cabin_round_trip = $('.cabin_round_trip_search_page').val();

            
            hasNotError = 1;
            if(wherefrom == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select From');
            }

            else if(whereto == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select To');
            }

            else if(startDate == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Start Date');
            }
            
            else if(endDate == ''){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select End Date');
            }

            else if((adults_round_trip == '' && children_round_trip == "" && infants_round_trip == "" ) || (adults_round_trip == '0' && children_round_trip == '0' && infants_round_trip == '0')  ){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Passengers');
            }

            else if(cabin_round_trip == '' || cabin_round_trip == 'undefined'){
              hasNotError = 0;
              $('.round-trip-error').html('Please Select Cabin');
            }

         
            if(hasNotError == 1){
                $('#round_trip_search_submit').submit();
            }else {
              setInterval(function() {
                $(".round-trip-error").html("");
            }, 10000);
          }

      });


      $('#oneway_trip_search_page').click(function(){
            var onewaywherefrom = $('.onewaywherefrom').val();
            var onewaywhereto = $('.onewaywhereto').val();
            var startDate2 = $('.startDate2').html();
            var adults_oneway_trip = $('.adults_oneway_trip_search_page').val();
            var children_oneway_trip = $('.children_oneway_trip_search_page').val();
            var infants_oneway_trip = $('.infants_oneway_trip_serach_page').val();
            var cabin_oneway_trip = $('.cabin_oneway_trip_search_page').val();

            
            hasNotError = 1;
            if(onewaywherefrom == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select From');
            }

            else if(onewaywhereto == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select To');
            }

            else if(startDate2 == ''){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Date');
            }
            

            else if((adults_oneway_trip == '' && children_oneway_trip == "" && infants_oneway_trip == "" ) || (adults_oneway_trip == '0' && children_oneway_trip == '0' && infants_oneway_trip == '0')  ){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Passengers');
            }

            else if(cabin_oneway_trip == '' || cabin_oneway_trip == 'undefined'){
              hasNotError = 0;
              $('.oneway-trip-error').html('Please Select Cabin');
            }

         
            if(hasNotError == 1){
                $('#oneway_trip_search_submit').submit();
            }else {
              setInterval(function() {
                $(".oneway-trip-error").html("");
            }, 10000);
          }

      });


      $('#multicity_trip_search_page').click(function(){

            var numberofFlights = $('.numberofFlights').val();
            var multiwherefrom = $('.multiwherefrom').val();
            var multiwhereto = $('.multiwhereto').val();
            var startDate3 = $('.startDate3').html();
            var multiwherefrom1 = $('.multiwherefrom1').val();
            var multiwhereto1 = $('.multiwhereto1').val();
            var startDate4 = $('.startDate4').html();
            var multiwherefrom2 = $('.multiwherefrom2').val();
            var multiwhereto2 = $('.multiwhereto2').val();
            var startDate5 = $('.startDate5').html();

            var adults_multicity_trip = $('.adults_multicity_trip_search_page').val();
            var children_multicity_trip = $('.children_multicity_trip_search_page').val();
            var infants_multicity_trip = $('.infants_multicity_trip_search_page').val();
            var cabin_multicity_trip = $('.cabin_multicity_trip_search_page').val();


            hasNotError = 1;

            if(numberofFlights == 1){

              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }
            }

            else if(numberofFlights == 2){


              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if(multiwherefrom1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select From');
              }

              else if(multiwhereto1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select To');
              }

              else if(startDate4 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }


            }
            else if(numberofFlights == 3){

              if(multiwherefrom == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select From');
              }

              else if(multiwhereto == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select To');
              }

              else if(startDate3 == ''){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Date');
              }

              else if(multiwherefrom1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select From');
              }

              else if(multiwhereto1 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select To');
              }

              else if(startDate4 == ''){
                hasNotError = 0;
                $('.multicity-trip-error2').html('Please Select Date');
              }
              else if(multiwherefrom2 == ''){
                hasNotError = 0;
                $('.multicity-trip-error3').html('Please Select From');
              }

              else if(multiwhereto2 == ''){
                hasNotError = 0;
                $('.multicity-trip-error3').html('Please Select To');
              }

              else if(startDate5 == ''){
                startDate5 = 0;
                $('.multicity-trip-error3').html('Please Select Date');
              }

              else if((adults_multicity_trip == '' && children_multicity_trip == "" && infants_multicity_trip == "" ) || (adults_multicity_trip == '0' && children_multicity_trip == '0' && infants_multicity_trip == '0')  ){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Passengers');
              }

              else if(cabin_multicity_trip == '' || cabin_multicity_trip == 'undefined'){
                hasNotError = 0;
                $('.multicity-trip-error1').html('Please Select Cabin');
              }

            }

            
            if(hasNotError == 1){
                $('#multicity_trip_search_submit').submit();
            }else {
              setInterval(function() {
                $(".multicity-trip-error1").html("");
                $(".multicity-trip-error2").html("");
                $(".multicity-trip-error3").html("");
            }, 10000);
          }

      });
           	
      $('.nav-item').click(function(){	
        if($(this).hasClass('multiple')){	
          $(this).closest('.slider_tab').addClass('multiple')	
        }else{	
          $(this).closest('.slider_tab').removeClass('multiple')	
        }	
      });
    </script>
</body>

</html>


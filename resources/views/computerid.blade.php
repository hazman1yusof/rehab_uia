<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <title></title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <style type="text/css">
            .ui.vertical.menu .item>i.icon {
                width: 1.18em !important;
                float: left !important;
                margin: 0 .5em 0 .5em !important;
            }

            @if (Request::is('login'))
                body{
                  background-image:url( {{ asset('img/imsc_lobby.jpg') }} ) !important;
                  background-repeat: no-repeat !important;
                  background-size: cover !important;
                  background-position: center !important;
                  height: 100% !important;
                  width: 100% !important;
                }
            @else
                body{
                    background: #dddddd26 !important;
                }
            @endif

            div.ui-jqgrid-bdiv{
                overflow-x: hidden !important;
            }

            @yield('style')

            .preloader {
                width: 100%;
                height: 100%;
                top: 0;
                position: fixed;
                z-index: 99999;
                background: #fff;
            }
            .wrap{
                word-wrap: break-word;
                white-space: pre-line !important;
                vertical-align: top !important;
            }
            .cssload-speeding-wheel {
                position: absolute;
                top: calc(50% - 3.5px);
                left: calc(50% - 3.5px);
                width: 31px;
                height: 31px;
                margin: 0 auto;
                border: 2px solid rgba(97,100,193,0.98);
                border-radius: 50%;
                border-left-color: transparent;
                border-right-color: transparent;
                animation: cssload-spin 425ms infinite linear;
                -o-animation: cssload-spin 425ms infinite linear;
                -ms-animation: cssload-spin 425ms infinite linear;
                -webkit-animation: cssload-spin 425ms infinite linear;
                -moz-animation: cssload-spin 425ms infinite linear;
            }

            @keyframes cssload-spin {
              100%{ transform: rotate(360deg); transform: rotate(360deg); }
            }

            @-o-keyframes cssload-spin {
              100%{ -o-transform: rotate(360deg); transform: rotate(360deg); }
            }

            @-ms-keyframes cssload-spin {
              100%{ -ms-transform: rotate(360deg); transform: rotate(360deg); }
            }

            @-webkit-keyframes cssload-spin {
              100%{ -webkit-transform: rotate(360deg); transform: rotate(360deg); }
            }

            @-moz-keyframes cssload-spin {
              100%{ -moz-transform: rotate(360deg); transform: rotate(360deg); }
            }
            .ui.fixed.menu, .ui[class*="top fixed"].menu {
                height: 30px;
            }
            .sidebar.inverted.icon{
                height: 20px;
                width: 10px;
            }

            .thisseg{
                margin: auto !important;
                width: 40%;
                margin-top: 100px !important;
            }

            .bluecloudsegment{
                background: #e7f6ff !important;
            }


        </style>

        @yield('css')
        @yield('header')



    </head>
    <body>
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        
        <div class="ui segments thisseg" style="position: relative;">
            <div class="ui secondary segment bluecloudsegment">
                <h4>Setup Computer ID</h4>
            </div>
            <div class="ui segment diaform">
                <form class="ui form">
                  <div class="field">
                    <label>Computer ID</label>
                    <input type="text" name="computerid" id="computerid" autocomplete="off">
                  </div>
                   <button type="button" class="ui button" onclick="setcompid()">Set ID</button>
                </form>
            </div>
        </div>
    </body>


    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/moment.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
    <script src="{{ asset('js/utility.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $(".preloader").fadeOut();
            if(!computerid){
                $('#computerid').val(computerid);
            }
        });
        var computerid = localStorage.getItem('computerid');

        function setcompid(){
            if($('#computerid').val() !== ''){
                localStorage.setItem('computerid', $('#computerid').val());
            }else{
                alert('Computerid field cant be blank!');
            }
        }
    </script>  
    
    @yield('js')
</html>
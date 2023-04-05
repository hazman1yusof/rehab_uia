@extends('layouts.main')

@section('title', 'Setup Computer ID')
@section('style')

.thisseg{
    margin: auto !important;
    width: 40%;
    margin-top: 100px !important;
}

.bluecloudsegment{
    background: #e7f6ff !important;
}

@endsection

@section('content')
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
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;500&family=Open+Sans:wght@300;700&family=Syncopate&display=swap" rel="stylesheet">

@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
@endsection



@section('script')

    var computerid = localStorage.getItem('computerid');
    console.log(computerid);
    if(computerid){
        $('#computerid').val(computerid);
    }
    function setcompid(){
        if($('#computerid').val() !== ''){
            localStorage.setItem('computerid', $('#computerid').val());
        }else{
            alert('Computerid field cant be blank!');
        }
    }
@endsection



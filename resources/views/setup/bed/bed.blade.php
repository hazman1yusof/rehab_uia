@extends('layouts.main')

@section('title', 'Bed Setup')

@section('style')

.panel-heading i.fa {
		cursor: pointer;
		float: right;
		<!--  margin-right: 5px; -->
	}

.position i {
	position: relative;
	line-height: 1;
	top: -10px;
}	

input.uppercase {
	text-transform: uppercase;
}

.justify {
	text-align: -webkit-center;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px; float: center;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  background-color: #f1f1f1;
}

@endsection

@section('body')

	<!--***************************** Search + table ******************-->
	<div class='row'>
		<form id="searchForm" class="formclass" style='width:99%; position:relative' onkeydown="return event.key != 'Enter';">
			<fieldset>
				<input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}">

				<div class='col-md-12' style="padding:0 0 15px 0;">
					<div class="form-group"> 
						<div class="col-md-2">
							<label class="control-label" for="Scol">Search By : </label>  
							<select id='Scol' name='Scol' class="form-control input-sm" tabindex="1"></select>
		              	</div>

					  	<div class="col-md-5">
					  		<label class="control-label"></label>  
							<input  name="Stext" type="search" seltext='true' placeholder="Search here ..." class="form-control text-uppercase" tabindex="2">
						
							<div  id="show_bedtype" style="display:none">
								<div class='input-group'>
									<input id="s_bedtype" name="s_bedtype" type="text" maxlength="12" class="form-control input-sm">
									<a class='input-group-addon btn btn-primary'><span class='fa fa-ellipsis-h'></span></a>
								</div>
								<span class="help-block"></span>
							</div>

							<div  id="show_occup" style="display:none">
								<div class='input-group'>
									<input id="occup" name="occup" type="text" maxlength="12" class="form-control input-sm">
									<a class='input-group-addon btn btn-primary'><span class='fa fa-ellipsis-h'></span></a>
								</div>
								<span class="help-block"></span>
							</div>														
						</div>

						<div class="col-md-1" style="padding-left: 0px;">
							<div id="div_bedtype" style="padding-left: 0px;max-width: 45px;display:none">
								<label class="control-label"></label>
								<a class='form-control btn btn-primary' id="btn_bedtype"><span class='fa fa-ellipsis-h'></span></a>
							</div>
							<div id="div_occup" style="padding-left: 0px;max-width: 45px;display:none;margin: 0px">
								<label class="control-label"></label>
								<a class='form-control btn btn-primary' id="btn_occup"><span class='fa fa-ellipsis-h'></span></a>
							</div>
						</div>
						<div class="col-md-5" style="padding-top: 20px;text-align: center;color: red">
					  		<p id="p_error"></p>
					  	</div>
		            </div>
				</div>
			</fieldset> 
		</form>
		
        <div class="panel panel-default">
		    <div class="panel-heading">Bed Setup Header</div>
		    <div class="panel-body">
		    	<div class='col-md-12' style="padding:0 0 15px 0">
            		<table id="jqGrid" class="table table-striped"></table>
            		<div id="jqGridPager"></div>
					<div id="myDiv">
						<hr>
						<center><h3>Bed Information</h3></center>
						<div class="row">
							<div class="column">
								<div class="card">
								<img src="img/bedonly.png" height="10" width="14"></img> VACANT : <span id="bed-vac"></span> <br>
								<i class="fa fa fa-bed"></i> OCCUPIED : <span id="bed-occ"></span> <br>
								<i class="fa fa fa-ban"></i> RESERVE : <span id="bed-res"></span> <br>
								<i class="fa fa-female"></i> HOUSEKEEPING : <span id="bed-hou"></span> <br>
								<i class="fa fa-gavel"></i> MAINTENANCE : <span id="bed-mai"></span> <br>
								<i class="fa fa-bullhorn"></i> ISOLATED : <span id="bed-iso"></span><br>
								
								</div>
							</div>

							<div class="column">
								<div class="card">
								<h4>Bed Number : <span id="myNumber"></span> </h4>
								<p>Bed Type :<span id="myType"></span></p>
								<p>Bed Name : -</p>
								<p>Total No of Bed : <span id="bed-tot"></span></p>
								</div>
							</div>
							
							<div class="column">
								<div class="card">
								<h4>Tel.Ext : </h4>
								<p>0000 8</p>
								<p>Status : Active<p id="myStatus"></p></p>
								</div>
							</div>
							
							
					</div>
        		</div>
			
		    </div>
		</div>
		
    </div>
	<!-- ***************End Search + table ********************* -->

@endsection


@section('scripts')
	<script type="text/javascript">
		$(document).ready(function () {
			if(!$("table#jqGrid").is("[tabindex]")){
				$("#jqGrid").bind("jqGridGridComplete", function () {
					$("table#jqGrid").attr('tabindex',3);
					$("td#input_jqGridPager input.ui-pg-input.form-control").attr('tabindex',4);
					$("td#input_jqGridPager input.ui-pg-input.form-control").on('focus',onfocus_pageof);
					if($('table#jqGrid').data('enter')){
						$('td#input_jqGridPager input.ui-pg-input.form-control').focus();
						$("table#jqGrid").data('enter',false);
					}

				});
			}

			function onfocus_pageof(){
				$(this).keydown(function(e){
					var code = e.keyCode || e.which;
					if (code == '9'){
						e.preventDefault();
						$('input[name=Stext]').focus();
					}
				});

				$(this).keyup(function(e) {
					var code = e.keyCode || e.which;
					if (code == '13'){
						$("table#jqGrid").data('enter',true);
					}
				});
			}
		});
	</script>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="plugins/bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="plugins/bootstrap-select-1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="js/setup/bed/bed.js"></script>
@endsection
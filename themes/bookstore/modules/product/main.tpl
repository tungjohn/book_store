<!-- BEGIN: main -->

<div class="col-xs-5 col-sm-5 col-md-5 ">
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading text-center"><h1> <i class="fa fa-briefcase"></i> - {LANG.category_id}</h1></div>
    <!-- BEGIN: cate -->
    <table class="table">
		<td>
            <h3> <i class="fa fa-book"></i> - <a href ="{CATE.url_product}">{CATE.name} </a>
            <!-- BEGIN: count --> ({COUNT.category_id}) <!-- END: count -->
            </h3>
           
    </table>
    <!-- END: cate -->

</div>
</div>

<div class="col-xs-19 col-sm-19 col-md-19">
<!-- BEGIN: loop -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<div class="panel panel-default"  >
    <div class="thumbnail">
    	<div class="panel-body" style="height:50px" >
    		<h3 class="name">{LANG.name}: {ROW.name}</h3>
    	</div>
	</div>
	
	<div class="thumbnail">
		<div class="panel">
			<a href="{ROW.url_detail}" >
				<img src="{ROW.image}" style="border: 1px solid red; height:300px">
			</a>
		</div>
	</div>
		
	<div class="caption">
			<div class="panel-footer">
				<h3>{LANG.price} : {ROW.price} </h3>
			</p></div>
			<div class="text-center">
				<p><form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="POST">
				<input type="hidden" value="{DATA.id}">
				<button type="submit" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
				</form></p>
			</div>
	</div>
            
		
	
	</div>
		
</div>
	
<!-- END: loop -->
<!-- BEGIN: page -->
    {GENERATE_PAGE}
<!-- END: page -->	
</div>




<!-- END: main -->
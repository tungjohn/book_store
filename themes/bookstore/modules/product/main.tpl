<!-- BEGIN: main -->
<!-- BEGIN: dataLoop -->
<div class="col-md-8">

<div class="panel panel-default">
	<div class="panel-body">
		<h3>{LANG.name}: {DATA.name}</h3>
	</div>
	
	<div class="thumbnail">
		<a href="{DATA.url_detail}"><img src="{DATA.image}" alt="" class="avt"></a>
		
	</div>
	<div class="caption">
			<div class="panel-footer">
				<h3>{LANG.price} : {DATA.price} </h3>
			</p></div>
			<div class="text-center">
				<p><form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="POST">
				<input type="hidden" value="{DATA.id}">
				<button type="submit" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
				</form></p>
			</div>
			</div ">
		
	
	</div>
		
</div>
	
<!-- END: dataLoop -->	


<!-- END: main -->
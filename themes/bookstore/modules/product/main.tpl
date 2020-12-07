<!-- BEGIN: main -->
<!-- BEGIN: dataLoop -->
<div class="col-md-8">

<div class="panel panel-default"  >
<div class="thumbnail">
	<div class="panel-body" style="height:50px" >
		<h3 class="name">{LANG.name}: {DATA.name}</h3>
	</div>
	</div>
	
	<div class="thumbnail">
		<div class="panel">
			<a href="{DATA.url_detail}" >
				<img src="{DATA.image}" style="border: 1px solid yellow; height:300px">
			</a>
		</div>
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
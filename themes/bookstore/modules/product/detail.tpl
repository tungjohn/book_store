<!-- BEGIN: main -->
<div class="container">
	<div class="row">
		<div>
			<div class="col-xs-8 col-sm-8 col-md-8 text-center">		
				<img src="{ROW.image}" alt="" class="avt">
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 ">
				<h3>{ROW.name}</h3>
				</br>
				<div class="container">
				<p>
					{LANG.price} : {ROW.price} 
					
				</p>
				<p>{LANG.category_id}: {ROW_CATE.name}</p>
				</div>
				<p>
					<a href="#" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</p>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8">	
				<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
					
					<h2>Điền thông tin </h2>
					
					<div class="form-group ">
				        <label for="">{LANG.name_user}: </label>
				        <input type="text" class="form-control" name="name" value="{POST.price}">
				    </div>
				    
				    <div class="form-group ">
				        <label for="">{LANG.email}: </label>
				        <input type="text" class="form-control" name="name" value="{POST.price}">
				    </div>
				    
				    <div class="form-group ">
				    	<div class="col-xs-12 col-sm-12 col-md-12">
					        <label for="">{LANG.phone}: </label>
					        <input type="text" class="form-control" name="name" value="{POST.price}">
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <label for="">{LANG.quantity}: </label>
					        <input type="number" class="form-control" name="name" value="{POST.price}">
					    </div>
				    </div>
				    
				    <div class="form-group ">
				        <label for="">{LANG.address}: </label>
				        <input type="text" class="form-control" name="name" value="{POST.price}">
				    </div>
				    
				    
				    
				</form>
			</div>
		</div>	
	</div>
	
	</br>
		<div class="panel-body text-center">
			<h2>Nội dung chính</h2>
		</div>
		<div class="col-md-18 col-md-offset-3">
			<p>{LANG.content}: {ROW.content}</p>
	</div>
</div>
<!-- END: main -->
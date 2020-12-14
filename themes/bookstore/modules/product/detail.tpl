<!-- BEGIN: main -->
<div class="container">
	<div class="row">
		<div>
			<div class="col-xs-8 col-sm-8 col-md-8 text-center">		
				<img src="{ROWDETAIL.image}" alt="" class="avt">
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 ">
				<h3>{ROWDETAIL.name}</h3>
				</br>
				<div class="container">
				<p>
					{LANG.price} : {ROWDETAIL.price} 
					
				</p>
				<p>{LANG.category_id}: {ROWCATE.name}</p>
				</div>
				<p>
					<a href="{ROWDETAIL.url_order}" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                    
				</p>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8">
            <caption>Một số loại sách liên quan</caption>	
            <!-- BEGIN: row_rd -->
				<div class="thumbnail">
                
                    <h3 class="text-center">{ROWRD.name}</h3>
                    <a href="{ROWRD.url_detail}"><img src="{ROWRD.image}" alt="" class="avt"></a>
                </div>
            <!-- END: row_rd -->
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
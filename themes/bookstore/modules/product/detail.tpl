<!-- BEGIN: main -->
<div class="container">
	<div class="row">
		<div>
			<div class="col-xs-8 col-sm-8 col-md-8 text-center">		
				<img src="{ROWDETAIL.image}" alt="" class="avt" style="width:200px; height:300px; border: red 2px solid ">
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 ">
				<h1>{ROWDETAIL.name}</h1>
				</br>
				<div class="container">
				<h2>
					  {ROWDETAIL.sale_price} {ROWDETAIL.price} {LANG.vnd} 
					
				</h2>
				<p>{LANG.category_id}: {ROWCATE.name}</p>
				</div>
				<p>
					<a href="{ROWDETAIL.url_order}" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Buy now</a>
                    
				</p>
                </br>
                <p>{LANG.content}: {ROW.content}</p>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8">
            <h1 class="text-center">Một số loại sách liên quan</h1>	
            <!-- BEGIN: row_rd -->
				<div class="thumbnail">
                
                    <h3 class="text-center">{ROWRD.name}</h3>
                    <a href="{ROWRD.url_detail}"><img src="{ROWRD.image}" alt="" class="avt"></a>
                </div>
            <!-- END: row_rd -->
			</div>
		</div>	
	</div>
    </div>
<!-- END: main -->
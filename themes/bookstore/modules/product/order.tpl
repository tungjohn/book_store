<!-- BEGIN: main -->
<h1 class="text-center"> Hóa Đơn </h1>
                    <!-- BEGIN: error -->
                        <div class="alert alert-warning">
                            <strong>{ERROR} </strong> 
                        </div>
                    <!-- END: error -->
            <div class="col-xs-16 col-sm-16 col-md-16">        
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{LANG.stt}</th>
                            <th>{LANG.name}</th>
                            <th>{LANG.img}</th>
                            <th>{LANG.quantity}</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{ROWORDER.stt}</td>
                            <td>{ROWORDER.name}</td>
                            <td><img src="{ROWORDER.image}"></td>
                            <td><input type="number" name="quantity"></td>
                            <td>{ROWORDER.price}</td>
                        </tr>
                        
                    </tbody>
                                 
                     </table>
                     <tr>
                        <th>{LANG.total_price} :<td>{ROWORDER.total_price}</th>
                    </tr>  
            </div>
    <form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
    
    
            
            <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="thumbnail">
                <input type="hidden" class="form-control" name="id" value="{ROWORDER.id}">
                <input type="hidden" class="form-control" name="price" value="{ROWORDER.price}">        
                <div class="form-group ">
				        <label for="">{LANG.name_user}: </label>
				        <input type="text" class="form-control" name="name_user" value="{POST.name_user}">
				    </div>
				    
				    <div class="form-group ">
				        <label for="">{LANG.email}: </label>
				        <input type="text" class="form-control" name="email" value="{POST.email}">
				    </div>
				    
				    <div class="form-group ">   
				        <label for="">{LANG.phone}: </label>
				        <input type="text" class="form-control" name="phone" value="{POST.phone}">
				    </div>
				    
				    <div class="form-group ">
				        <label for="">{LANG.address}: </label>
				        <input type="text" class="form-control" name="address" value="{POST.address}">
				    </div>
                    
                    <div class="form-group ">
                        <label for="">{LANG.order_note}: </label>
                        <textarea name="order_note" id="input" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" name="submit" class="btn btn-primary">Buy</button>
                    </div>
                    </div>
                
            </div>
            </form>
<!-- END: main -->

<!-- BEGIN: main -->
<!-- BEGIN: alert -->
    <div class='alert alert-info' role="alert">{ALERT}</div>
<!-- END: alert -->
<!-- BEGIN: error -->
    <div class='alert alert-danger' role="alert">{ERROR}</div>
<!-- END: error -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id" value="{POST.id}">

    <div class="form-group">
        <label for="">Tên khách hàng: </label>
        <input type="text" class="form-control" name="name" value="{POST.name}" disabled>
    </div>
    <div class="form-group">
        <label for="">Email: </label>
        <input type="text" class="form-control" name="email" value="{POST.email}" disabled>
       
    </div>
    <div class="form-group ">
        <label for="">Số điện thoại: </label>
        <input type="text" class="form-control" name="phone" value="{POST.phone}" disabled>
    </div>
    
    <div class="form-group">
        <label for="">Địa chỉ: </label>
        <input type="text" class="form-control" name="address" value="{POST.address}" disabled>
    </div>
    <div class="form-group">
        <label for="">Lưu ý đơn hàng: </label>
        <textarea class="form-control" name="order_note" disabled>{POST.order_note}</textarea>
    </div>
    <div class="form-group">
        <label for="">Phương Thức Thanh Toán: </label>
        <select name="payment_method" class="form-control">
            <option value="">Chọn Phương Thức</option>
            <!-- BEGIN: pmLoop -->
            <option value="{PAYMENT.key}" {PAYMENT.selected}>{PAYMENT.value}</option>
            <!-- END: pmLoop -->
        </select>
    </div>
    <div class="form-group">
        <label for="">Trạng thái đơn hàng: </label>
        <select name="active" class="form-control">
            <option value="">Chọn Trạng Thái</option>
            <!-- BEGIN: activeLoop -->
            <option value="{ACTIVE.key}" {ACTIVE.selected}>{ACTIVE.value}</option>
            <!-- END: activeLoop -->
        </select>
    </div>
    
    <!-- order_detail -->
    <h3>Thông tin đơn hàng</h3>
    <div class="table-responsive">          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID đơn hàng</th>
        <th>ID sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Tổng giá sản phẩm</th>
        <th>Hành Động</th>
        
      </tr>
    </thead>
    <tbody>
    <!-- BEGIN: dataLoop -->
      <tr>
        <td>{DATA.order_id}</td>
        <td>
          <input type="hidden" class="form-control" name="product_id[]" value="{DATA.product_id}">

          {DATA.product_id}
        
        </td>
        <td>{DATA.name}</td>
        <td>
            <img src="{DATA.image}">
        </td>
        <td>
          {DATA.quantity}
            
        </td>
        <td>{DATA.price}</td>
        <td>{DATA.line_price}</td>
        <td class="text-center">
          
          <a href="{DATA.url_delete}" class="delete btn btn-danger ">Xóa</a>
        </td>
      </tr>
    <!-- END: dataLoop -->
    </tbody>
  </table>
  
  </div>
  <div class="form-group">
        <label for="">Tổng giá trị đơn hàng: </label>
        <input type="text" class="form-control" name="total_price" value="{POST.total_price}" disabled>
    </div>
<!-- order_detail -->

    <div class="text-center" ><input style="margin-top:10px;" class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
</form>
<script type='text/javascript'>

      $(document).ready(function() {
          $('.delete').click(function() {
              
              var xn = confirm('Bạn có chắc chắn muốn xóa?');
              if (xn == true) {
                return true;
                
              } else { 
                return false; 
              }
              
          });
         
      });
</script>
<!-- END: main -->
<!-- BEGIN: list -->
<div class="container">
  <h2>Danh sách sản phẩm</h2>
    <!-- search -->
    <form action="{NV_BASE_ADMINURL}index.php?" method="get">
      <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}">
      <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}">
      <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}">
      <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" value="{POST.name}" maxlength="64" name="name" placeholder="Tìm kiếm theo tên">
                </div>
            </div>
            
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <select class="form-control" name="category_id" id="category_id" tabindex="-1" aria-hidden="true">
                        <option value="0" selected="selected" data-select2-id="2">-- Tất cả Danh mục --</option>
                        <!-- BEGIN: catloop -->
                        <option value="{ROW_CAT.id}" {ROW_CAT.selected}>{ROW_CAT.name}</option>
                        <!-- END: catloop -->
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <select class="form-control" name="active">
                        <option value=""> -- Tất cả Trạng thái -- </option>
                        <!-- BEGIN: activeLoop -->
                        <option value="{ACTIVE.key}" {ACTIVE.selected}>{ACTIVE.value}</option>
                        <!-- END: activeLoop -->

                       
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Tìm kiếm">
                </div>
            </div>
        </div>
    </form>
    <!-- search -->
  <div class="table-responsive">          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Mô tả sản phẩm</th>
        <th>Slug</th>
        <th>Danh mục</th>
        <th>Trạng Thái</th>
        <th>Hành Động</th>
        
      </tr>
    </thead>
    <tbody>
    <!-- BEGIN: dataLoop -->
      <tr>
        <td>{DATA.id}</td>
        <td>{DATA.name}</td>
        <td><img src="{DATA.image}"</td>
        <td>{DATA.price}</td>
        <td>{DATA.content}</td>
        <td>{DATA.slug}</td>
        <td>{DATA.category}</td>
        <td>{DATA.active}</td>
        <td>
          <a href="{DATA.url_edit}" class="edit btn btn-warning">Sửa</a>
          <a href="{DATA.url_delete}" class="delete btn btn-danger">Xóa</a>
        </td>
      </tr>
    <!-- END: dataLoop -->
    </tbody>
  </table>
  </div>
  <!-- BEGIN: page -->
    {GENERATE_PAGE}
  <!-- END: page -->
</div>

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
<!-- END: list -->
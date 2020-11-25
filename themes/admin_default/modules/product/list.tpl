<!-- BEGIN: list -->
<div class="container">
  <h2>Danh sách sản phẩm</h2>
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
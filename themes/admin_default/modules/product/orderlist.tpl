<!-- BEGIN: list -->
<h2>Danh sách đơn hàng</h2>
<div class="table-responsive">          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên người mua</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa Chỉ</th>
        <th>Tổng giá trị đơn hàng</th>
        <th>Ghi chú đơn hàng</th>
        <th>Phương Thức Thanh Toán</th>
        <th>Trạng thái đơn hàng</th>
        <th>Hành Động</th>
        
      </tr>
    </thead>
    <tbody>
    <!-- BEGIN: dataLoop -->
      <tr>
        <td>{DATA.id}</td>
        <td>{DATA.name}</td>
        <td>{DATA.email}</td>
        <td>{DATA.phone}</td>
        <td>{DATA.address}</td>
        <td>{DATA.total_price}</td>
        <td>{DATA.order_note}</td>
        <td>{DATA.payment_method}</td>
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
<!-- END: list -->
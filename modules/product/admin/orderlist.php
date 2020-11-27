<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    die('Stop!!!');
}

$page_title = $lang_module['order.list'];

/* CODE PHÂN TRANG PAGINATION*/
//gán số lượng hiển thị mỗi trang
$perpage = 5;
//nhận biến page từ url
$page = $nv_Request->get_int('page', 'get', 1);
// đếm dòng dữ liệu trong bảng nv4_vi_student_info
$db->sqlreset()
    ->select('COUNT(*)')
    ->from('nv4_vi_book_orders');

$sql = $db->sql();
//đếm số bản ghi
$total = $db->query($sql)->fetchColumn();

$xtpl = new XTemplate('orderlist.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

$db->select('*')
    ->limit($perpage)
    ->offset(($page - 1) * $perpage);
 
    
    $sql = $db->sql();
    $result = $db->query($sql);

foreach ($result as $data)
{
    switch ($data['payment_method']) {
        case 2:
            $data['payment_method'] = 'Chuyển khoản';
            break;
        case 3:
            $data['payment_method'] = 'Thẻ tín dụng';
            break;
        default:
            $data['payment_method'] = 'Tiền mặt';
            break;
    }
    $data['active'] = $data['active'] == 2 ? 'Đã Giao Hàng' : 'Chưa giao hàng';
    $data['total_price'] = number_format($data['total_price']);
    $xtpl->assign('DATA', $data);
    $xtpl->parse('list.dataLoop');
}

$xtpl->parse('list');
$contents = $xtpl->text('list');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

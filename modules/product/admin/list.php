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

$page_title = $lang_module['list'];


/* CODE PHÂN TRANG PAGINATION*/
//gán số lượng hiển thị mỗi trang
$perpage = 5;
//nhận biến page từ url
$page = $nv_Request->get_int('page', 'get', 1);
// đếm dòng dữ liệu trong bảng nv4_vi_student_info
$db->sqlreset()
    ->select('COUNT(*)')
    ->from('nv4_vi_book_product');
$sql = $db->sql();
//đếm số bản ghi
$total = $db->query($sql)->fetchColumn();
/* END PAGINATION  */
//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$post['action'] = $nv_Request->get_title('action', 'get', '');
$post['id'] = $nv_Request->get_title('id', 'post, get', '');
$checksess = $nv_Request->get_title('checksess', 'post, get', '');
/* DELETE Sinh viên */
if (!empty($post['action']) && $post['action'] == 'delete' && $post['id']>0 && $checksess == md5($post['id'] . NV_CHECK_SESSION))
{
    $sql = "SELECT `image` FROM `nv4_vi_book_product` WHERE id=" . $post['id'];
    $result = $db->query($sql);
    $row = $result->fetch();
    if (file_exists(NV_UPLOADS_REAL_DIR . '/product' . '/' . $row['image']))
    {
        unlink(NV_UPLOADS_REAL_DIR . '/product' . '/' . $row['image']);
    }
    $sql = "DELETE FROM `nv4_vi_book_product` WHERE id=" . $post['id'];
    $db->query($sql);
    
    
}
/* END DELETE */



$xtpl = new XTemplate('list.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
    $data['url_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=list&amp;action=delete&amp;id=' . $data['id'] . '&checksess=' . md5($data['id'] . NV_CHECK_SESSION);
    $data['url_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main&amp;action=edit&amp;id=' . $data['id'];
    //gán đường dẫn hiển thị ngoài list
    $data['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $data['image'];
    $data['price'] = number_format($data['price']);
    $sql = "SELECT `id`, `name` FROM `nv4_vi_book_category` WHERE `id`=" . $data['category_id'];
    $_result = $db->query($sql);
    foreach ($_result as $_data)
    {
        $data['category'] = $_data['name'];

    }


    $xtpl->assign('DATA', $data);
    
    $xtpl->parse('list.dataLoop');
}



$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=list';
$generate_page = nv_generate_page($base_url, $total, $perpage, $page);
$xtpl->assign('GENERATE_PAGE', $generate_page);

if ($total > 5 )
{
    $xtpl->parse('list.page');
}
//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('list');
$contents = $xtpl->text('list');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

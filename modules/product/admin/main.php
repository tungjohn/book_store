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

$page_title = $lang_module['main'];

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error = [];
$post = [];


$post['submit'] = $nv_Request->get_title('submit', 'post', '');
$post['name'] = check_input($nv_Request->get_title('name', 'post', ''));
$post['price'] = $nv_Request->get_int('price', 'post', 0);
$post['slug'] = check_input($nv_Request->get_title('slug', 'post', ''));
$post['category'] = $nv_Request->get_int('category', 'post', 0);
$post['content'] = check_input($nv_Request->get_title('content', 'post', ''));

if(!empty($post['submit']))
{
    if (empty($post['name']))
    {
        $error[] = 'Bạn chưa nhập tên sản phẩm';
    }
    if (empty($post['price']))
    {
        $error[] = 'Bạn chưa nhập giá';
    }
    if (empty($post['slug']))
    {
        $error[] = 'Bạn chưa nhập slug';
    }
    if (empty($post['category']))
    {
        $error[] = 'Bạn chưa nhập danh mục';
    }
    if (empty($post['content']))
    {
        $error[] = 'Bạn chưa nhập mô tả';
    }

    if (empty($error))
    {
        $sql = "INSERT INTO `nv4_vi_book_product`(`name`, `price`, `content`, `slug`, `category_id`) VALUES (:name , :price , :content , :slug , :category)";
        $db->prepare($sql);
        $s = $db->bindParam('name', $post['name']);
        $s = $db->bindParam('price', $post['price']);
        $s = $db->bindParam('content', $post['content']);
        $s = $db->bindParam('slug', $post['slug']);
        $s = $db->bindParam('category', $post['category']);
        $s->execute();

        if ($s->execute())
        {
            $alert = 'Sửa Thành Công';
        }
    }
}



//------------------------------
// Viết code xử lý chung vào đây
//------------------------------

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('POST', $post);

$sql = "SELECT id,name FROM `nv4_vi_book_category`";
$result = $db->query($sql);
foreach ($result as $data)
{
    $xtpl->assign('DATA', $data);
    $xtpl->parse('main.loopCat');
}

if (!empty($alert)) {
    $xtpl->assign('ALERT', $alert);
    $xtpl->parse('main.alert');
}
if (!empty($error)) {
    $xtpl->assign('ERROR', $error);
    $xtpl->parse('main.error');
}
//-------------------------------
// Viết code xuất ra site vào đây
//-------------------------------

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

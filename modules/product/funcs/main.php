<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 10 Nov 2020 06:56:08 GMT
 */

if (!defined('NV_IS_MOD_ALBUM')) {
    die('Stop!!!');
}

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$array_data = [];
$row_cate=[];

/* CODE PHÂN TRANG PAGINATION*/
//gán số lượng hiển thị mỗi trang
$perpage = 4;
//nhận biến page từ url
$page = $nv_Request->get_int('page', 'get', 1);

$db->sqlreset()
->select('COUNT(*)')
->from('nv4_vi_book_product');

$sql = $db->sql();
//đếm số bản ghi
$total = $db->query($sql)->fetchColumn();


//HIển thị sách
$db->sqlreset()
->select('*')
->from('nv4_vi_book_product')
->limit($perpage)
->offset(($page - 1) * $perpage);
$sql = $db->sql();

$result= $db->query($sql);
$array_data = $result->fetchAll();



//Hiển thị danh sách
$sql = "SELECT id, name FROM `nv4_vi_book_category";
$row_cate = $db->query($sql)->fetchAll();
// print_r($row_cate);die();

//Đếm id danh mục
// try {
//     $sql = "SELECT id, COUNT(category_id) FROM `nv4_vi_book_product` where `category_id` = " . $row_cate['id'];
//     //đếm số bản ghi
//     $row_count = $db->query($sql)->fetchColumn();
// } catch (PDOException $e) {
// }
// print_r($e);die();

//------------------
// Viết code vào đây
//------------------

$contents = nv_theme_album_main($array_data,$row_cate, $perpage, $page, $total, $row_count);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

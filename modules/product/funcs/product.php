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

$row_cate = [];
$row_cate=[];

$id = $nv_Request->get_int('id', 'post, get', '');

$sql = "SELECT id, name FROM `nv4_vi_book_category`";
$row_cate = $db->query($sql)->fetchAll();

$sql = "SELECT * FROM nv4_vi_book_product where category_id = " .$id;
$row_product = $db->query($sql)->fetchAll();

//------------------
// Viết code vào đây
//------------------

$contents = nv_theme_album_product($row_cate,$row_product);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

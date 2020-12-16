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

/**
 * nv_theme_album_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_main($array_data,$row_cate, $perpage, $page, $total, $row_count)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    
    if (!empty($array_data)) {
        $i = 1;
        foreach ($array_data as $row){
            $row['stt'] = $i;
            $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $row['image'];
            $row['price'] = number_format($row['price']);
//             $row['active'] = !empty($array_active[$row['active']]) ? $array_active[$row['active']] : '';
            $row['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $row['id'];
//             $row['url_delete'] = NV_BASE_ADMINURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=list&amp;id='. $row['id']. '&active=delete&checksess='. md5($row['id'] .$NV_CHECK_SESSION);
            $xtpl->assign('ROW', $row);
            $xtpl->parse('main.loop');
            $i++;
        }
    }
    
    if (!empty($row_cate)) {
        foreach ($row_cate as $cate){
//             $cate['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $cate['image'];
//             $cate['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $cate['id'];
            $cate['url_product'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=product&amp;id='. $cate['id'];
            $xtpl->assign('CATE', $cate);
            $xtpl->parse('main.cate');
        }
    }
    
    $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=main';
    $generate_page = nv_generate_page($base_url, $total, $perpage, $page);
    $xtpl->assign('GENERATE_PAGE', $generate_page);
    
    if (!empty($post['name']))
    {
        $base_url .= '&name=' . $post['name'];
    }
    if (!empty($post['category_id']))
    {
        $base_url .= '&category_id=' . $post['category_id'];
    }
    if (!empty($post['active']))
    {
        $base_url .= '&active=' . $post['active'];
    }
    
    if ($total > 5 )
    {
        $xtpl->parse('main.page');
    }
    
    $xtpl->assign('COUNT', $row_count);
    $xtpl->parse('main.cate.count');
    

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_detail($row_detail,$row_cate, $row_rd)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    
    $row_detail['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $row_detail['image'];
    $row_detail['price'] = number_format($row_detail['price']);
    $row_detail['url_order'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=order&amp;id='. $row_detail['id'];
    
    $xtpl->assign('ROWDETAIL', $row_detail);
    
    if (!empty($row_rd)) {
        foreach ($row_rd as $rd){
            $rd['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $rd['image'];
            $rd['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $rd['id'];
            $xtpl->assign('ROWRD', $rd);
            $xtpl->parse('main.row_rd');
        }
    }
    
    $xtpl->assign('ROWCATE', $row_cate);
    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}


function nv_theme_album_order($row_order, $post, $error, $array_province)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;
    
    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('OP', $op);
    $i = 1;
    $row_order['stt'] = $i;
//     $row_order['quantity'] = !empty($row_order['quantity']) ? $row_order['quantity'] : 1;
    $row_order['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $row_order['image'];
    $row_order['total_price'] = number_format($row_order['price'] * $row_order['quantity'] );
    
    $xtpl->assign('ROWORDER', $row_order);
    
    foreach ($array_province as $key => $province){
        
        
        
        $xtpl->assign('PROVINCE', array(
            'key' => $key,
            'title' => $province['title']
        ));
        $xtpl->parse('main.province');
    }
    
//     $post['quantity'] = !empty($post['quantity']) ? $post['quantity'] : 1;
    $xtpl->assign('POST', $post);
    $xtpl->assign('ERROR', implode('<br>',$error));
    if(!empty($error)){
        $xtpl->parse('main.error');
    };
    

    
    
    //------------------
    // Viết code vào đây
    //------------------
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}

function nv_theme_album_product($row_cate,$row_product)
{
    global $module_info, $lang_module, $lang_global,$module_name, $op;
    
    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    
    if (!empty($row_cate)) {
        foreach ($row_cate as $cate){
            //             $cate['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $cate['image'];
            //             $cate['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $cate['id'];
            $cate['url_product'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=product&amp;id='. $cate['id'];
            $xtpl->assign('CATE', $cate);
            $xtpl->parse('main.cate');
        }
    }
    
    if (!empty($row_product)) {
        foreach ($row_product as $product){
            $product['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $product['image'];
            $product['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $product['id'];
//             $product['url_detail'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=product&amp;id='. $product['id'];
//             $cate['url_product'] = NV_BASE_SITEURL .'index.php?'. NV_LANG_VARIABLE .'='. NV_LANG_DATA .'&amp;'. NV_NAME_VARIABLE .'='. $module_name .'&amp;'. NV_OP_VARIABLE .'=detail&amp;id='. $cate['id'];
            $xtpl->assign('PRODUCT', $product);
            $xtpl->parse('main.product');
        }
    }
    
    //------------------
    // Viết code vào đây
    //------------------
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_album_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_album_search($array_data)
{
    global $module_info, $lang_module, $lang_global, $op;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    //------------------
    // Viết code vào đây
    //------------------

    $xtpl->parse('main');
    return $xtpl->text('main');
}

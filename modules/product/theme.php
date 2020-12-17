<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Sat, 31 Oct 2020 02:20:33 GMT
 */

if (!defined('NV_IS_MOD_SAMPLES')) {
    die('Stop!!!');
}

/**
 * nv_theme_samples_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_main($array_data)
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

/**
 * nv_theme_samples_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_detail($array_data)
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

/**
 * nv_theme_samples_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_search($array_data)
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
/**
 * nv_theme_samples_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_cart($array_data, $result, $error, $alert, $post)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('OP', $op);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('POST', $post);
    //in ra sp trong giỏ hàng
    foreach ($_SESSION['cart_item'] as $key_cart => $val_cart_item)
    {
        $val_cart_item['format_price'] = number_format($val_cart_item['price']);
        $total_bill += $val_cart_item['price'];

        $xtpl->assign('VAL_CART_ITEM', $val_cart_item);
        $xtpl->parse('main.dataLoop');
    }
    //in tổng bill
    $xtpl->assign('TOTAL_BILL', number_format($total_bill));

    /* Xuất giá trị payment_method ra site */
    $array_payment = [];
    $array_payment[1] = 'Tiền mặt';
    $array_payment[2] = 'Chuyển khoản';
    $array_payment[3] = 'Thẻ tín dụng';
    foreach ($array_payment as $key => $value)
    {
        $xtpl->assign('PAYMENT', [
            'key' => $key,
            'value' => $value
        ]);
        $xtpl->parse('main.pmLoop');
    }
    /* End payment_method */

    /* BEGIN xuất ra province*/
    foreach ($result as $data)
    {
        $data['selected'] = ($data['id'] == $post['province']) ? 'selected' : '';
        $xtpl->assign('DATA_PROVINCE', $data);
        $xtpl->parse('main.loopProvince');
    }
    /* END code xuất ra site */
    /* Hiển thị err */
    $xtpl->assign('ERROR', implode('<br>', $error));

    if (!empty($error)) {
        //hiển thị khối main.error
        $xtpl->parse('main.error');
    }
    /* end err */

    /* Hiển thị alert */
    if (!empty($alert)) {
        $xtpl->assign('ALERT', $alert);
        //hiển thị khối main.alert
        $xtpl->parse('main.alert');
    }
    /* end alert */
    
    $xtpl->parse('main');
    return $xtpl->text('main');
}
/**
 * nv_theme_samples_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_category($array_data)
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

/**
 * nv_theme_samples_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_samples_list($array_data, $result, $total, $generate_page)
{
    global $module_info, $lang_module, $lang_global, $op, $module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
    $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
    $xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('OP', $op);

    foreach ($result as $data)
    {
        $data['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/'. $module_name . '/' . $data['image'];
        $data['price'] = number_format($data['price']);
        $data['active'] = $data['active'] == 1 ? 'Hết hàng' : 'Có hàng'; 
       
        $xtpl->assign('DATA', $data);
        
        $xtpl->parse('main.dataLoop');
    }

    $xtpl->assign('GENERATE_PAGE', $generate_page);

    if ($total > 5 )
    {
        $xtpl->parse('main.page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

<?php
// HIỆN TRƯỜNG TÙY BIẾN TRONG WOOCOMERCE
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
// LOẠI BỎ THẺ P TRONG CF7
add_filter('wpcf7_autop_or_not', '__return_false');
// ĐỔI ĐỢN VỊ SANG PX
if (! function_exists('hiepdesign_mce_text_sizes')) {
    function hiepdesign_mce_text_sizes($initArray)
    {
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 28px 30px 32px 34px 36px 40px 42px 44px 46px 48px 50px";
        return $initArray;
    }
    add_filter('tiny_mce_before_init', 'hiepdesign_mce_text_sizes', 99);
}

// THAY ĐỔI VIEWPORT TỪ 1 THÀNH 5
function remove_actions_parent_theme()
{
    remove_action('wp_head', 'flatsome_viewport_meta', 1);
}
add_action('init', 'remove_actions_parent_theme');

// Now re-add the customized action
function child_viewport_meta_replacing_parent_theme()
{
    echo apply_filters('child_viewport_meta_replacing_parent_theme', '<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=0.1, maximum-scale=5.0">'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action('wp_head', 'child_viewport_meta_replacing_parent_theme', 20);

// THÊM CSS CHO CUSTOMIZER
function gkinze_custom_admin_css()
{
    echo '<style>
.customize-pane-parent > li:nth-child(n+3) h3{
    padding-left: 5px;
}
.customize-pane-parent > li:nth-child(n+3) > h3{
    display: flex;
    align-items: center;
}
    </style>';
}
add_action('customize_controls_print_styles', 'gkinze_custom_admin_css');

// CHECK SVG
function check_svg($url)
{
    if (!$url) return false;

    $path = parse_url($url, PHP_URL_PATH);
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    return $ext === 'svg';
}

// RENDER ẢNH SVG
function get_svg($url)
{
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return ''; // Không trả về gì nếu lỗi
    }

    $svg = wp_remote_retrieve_body($response);

    if (!empty($svg)) {
        // Loại bỏ namespace như <ns0:svg>
        $svg = preg_replace('/<\s*\/?\s*ns\d*:/', '<', $svg);

        // Lọc mã độc
        $svg = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $svg);
        $svg = preg_replace('#on[a-z]+\s*=\s*["\'].*?["\']#i', '', $svg);
        $svg = preg_replace('#javascript:#i', '', $svg);

        // Thêm class nếu cần
        $svg = str_replace('<svg', '<svg class="icon-zalo"', $svg);

        return $svg;
    }

    return ''; // Không trả về gì nếu rỗng
}


// TẮT CẬP NHẬT THEME, PLUGIN
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
// TẮT THÔNG BÁO UPDATE THEME, PLUGIN
add_filter('pre_site_transient_update_plugins', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');
// TẮT UPDATE WORDPRESS
add_filter('pre_site_transient_update_core', '__return_null');

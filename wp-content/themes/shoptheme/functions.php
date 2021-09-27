<?php 
define('TPL_DIR_URI', get_template_directory_uri());
define('TPL_DIR', get_stylesheet_directory());

function my_custom_wc_theme_support(){
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );

//TODO: add file css,bootstrap
function svh_enqueue_styles(){
    wp_enqueue_style('bootstrap', TPL_DIR_URI . 
    '/assets/vendor/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style('bootstrap', TPL_DIR_URI . 
	'/style.css' );
	wp_enqueue_style('bootstrap', TPL_DIR_URI . 
    '/assets/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'svh_enqueue_styles');

//TODO: Add file js

function svh_enqueue_scripts(){
    wp_enqueue_script('popper', TPL_DIR_URI . 
    '/assets/vendor/popper/popper.min.js', ['jquery']);
    wp_enqueue_script('bootstrap', TPL_DIR_URI . 
    '/assets/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
}
add_action( 'wp_enqueue_scripts', 'svh_enqueue_scripts');

//TODO: register_navwalker
function register_navwalker(){
    require_once TPL_DIR . './inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

//TODO: register menu
function register_my_menu() {
	register_nav_menu('header-top',__( 'Menu top' ));
	register_nav_menu('header-main',__( 'Menu main' ));
    register_nav_menu('footer-menu',__( 'Menu footer' ));
}
add_action( 'init', 'register_my_menu' );


// TODO: register sidebar
if (function_exists('register_sidebar')){
    register_sidebar(array(
    'name'=> 'Cột bên',
    'id' => 'sidebar',
    'before_widget' => '<div class="widget"> ',
    'after_widget' => '</div>',
    'before_title' => '<h3>
    <i class="fa fa-bars"></i>' ,
    'after_title' => '</h3>',
));
}
// TODO: watch view
function set_post_view($postID){
    $count_key ='views';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function get_post_views($postID){
    $count_key ='views';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

//TODO:  widget wordpress about old editor //về trình soạn thạo cũ
add_filter('use_block_editor_for_post', '__return_false');
add_theme_support( 'post-thumbnails' );
//TODO: Register slider
function slider_post_type(){
    
    $label = array(
        'name' => 'Anh slider', //Tên post type dạng số nhiều
        'singular_name' => 'Anh slider' //Tên post type dạng số ít
    );
 
   
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Anh slider', //Mô tả của post type
        'supports' => array(
            'title',
            'thumbnail',
        ), //Các tính năng được hỗ trợ trong post type
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-image', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
}
add_action('init', 'slider_post_type');

function woo_share_and_ontact_hk(){ ?>
	<div class="social-product">
		<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
  		<g:plusone size="medium"></g:plusone>
	</div>
<?php }
add_action('woocommerce_single_product_summary', 'woo_share_and_ontact_hk', 60);

function viewedProduct(){
	session_start();
	if(!isset($_SESSION["viewed"])){
		$_SESSION["viewed"] = array();
	}
	if(is_singular('product')){
		$_SESSION["viewed"][get_the_ID()] = get_the_ID();
	}
}
add_action('wp', 'viewedProduct');


?>



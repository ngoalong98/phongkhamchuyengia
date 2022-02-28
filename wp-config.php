<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'phongkhamvietdoan' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'kr?w]Y a%0^MM)q;l`n(}UtR5;~N!E%EMW@c@N|`O%/H`|s$.L55wBCp6nZ(5U-r' );
define( 'SECURE_AUTH_KEY',  'I}97Ct%OX<DXgD*66@X@Y)zID:7WTH6_8! 2Etb+qcH/*phqHL^(0; CM-HJQh[^' );
define( 'LOGGED_IN_KEY',    '2F%xFhS&r84JpOimzn8,!/~Xrhcfk*&Ux~L,p.o{?IGAcD07W}R!4^$5]{Tt`%.!' );
define( 'NONCE_KEY',        'O `:1%01%}DI]DX~eV0| (R~.=7 *]G5Gc3XS 9UZI+Qn6N7}(1Qcf2zxpf /rvm' );
define( 'AUTH_SALT',        ',+U:WF8,-i,04XSE~P(:*sa.WDB?xB/ KlA[Ep@49RLEskTlUx!aZc;)8E]]G^.X' );
define( 'SECURE_AUTH_SALT', 'P .%Y[$.mElk9l$EkaIJ-!kTanuLumP|!NaHfa^GAsARA:Qc)`b5:fEmIaChlQE%' );
define( 'LOGGED_IN_SALT',   'R,Yyw:gn0hRo{w-_&0.!}Ct%R@3/U%I!-l/,CU5@ew7B. -L6&8ZhVmTke#d*HOL' );
define( 'NONCE_SALT',       'vgWLKQQj+$<%y|;<74]tLAgx3vF>z)<@_d[>R$$/W= )cD{YgRTSu?d05KSmQe8x' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

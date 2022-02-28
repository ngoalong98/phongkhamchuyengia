<?php
/**
 * The template for displaying search results.
 *
 * @package Hellowebsitedep
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main class="site-main" role="main">
	<?php if ( apply_filters( 'hello_websitedep_page_title', true ) ) : ?>
		<header class="page-header">
			<h1 class="entry-title">
				<?php esc_html_e( 'Search results for: ', 'hello-websitedep' ); ?>
				<span><?php echo get_search_query(); ?></span>
			</h1>
		</header>
	<?php endif; ?>
	<div class="page-content">
	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
					<div class="search">
					
						<div class="post">									
						<div class="post-image">									
							<a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
							  <?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="post-info">
							<a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
							<div class="location">Ngày đăng: <i><?php the_time('d/m/Y'); ?></i>, Update: <?php the_modified_time('d/m/Y'); ?> Vào lúc: <?php the_modified_time(); ?> </div>
							<p><?php the_excerpt(); ?> </p>
						</div>
						</div>
						
						
					</div>
					<?php endwhile; else: ?>
					<p>Từ khóa bạn tìm không thấy vui lòng thử lại.</p>
					<?php endif; ?>
				</div>
	</div>

	<?php wp_link_pages(); ?>

	<?php
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) :
		?>
		<nav class="pagination" role="navigation">
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-previous"><?php next_posts_link( sprintf( __( '%s older', 'hello-websitedep' ), '<span class="meta-nav">&larr;</span>' ) ); ?></div>
			<?php /* Translators: HTML arrow */ ?>
			<div class="nav-next"><?php previous_posts_link( sprintf( __( 'newer %s', 'hello-websitedep' ), '<span class="meta-nav">&rarr;</span>' ) ); ?></div>
		</nav>
	<?php endif; ?>
</main>

<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package Hellowebsitedep
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
while ( have_posts() ) : the_post();
	?>

<main <?php post_class( 'site-main' ); ?> role="main">
	<?php if ( apply_filters( 'hello_websitedep_page_title', true ) ) : ?>
		<!-- <header class="page-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header> -->
	<?php endif; ?>
	<div class="page-content">
		<?php
			$classes = get_body_class();
			if (in_array('single-goi-kham',$classes)) {
			   get_template_part( 'template-parts/single','goi-kham' );
			} elseif (in_array('single-post',$classes)) {
			   get_template_part( 'template-parts/single','post' );
			} else {
				 the_content();
			}
	?>

		
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-websitedep' ), null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

</main>

	<?php
endwhile;

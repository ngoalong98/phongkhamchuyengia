<div class="row single-post-custom">
					<div class="col-9 single-post-content">
						<h2 class="title-post"><?php echo get_the_title();?></h2>
						<p> <i class="far fa-clock"></i> Cập nhật: <?php echo '<time class="entry-date updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date( 'd/m/Y - g:i a' ) ) . '</time>'; ?>
						</p>
						 <div class="image-post">
							
						</div>
						<?php the_content();?>
					</div>
					<div class="col-3 single-post-sidebar">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-sidebar') ) : ?><?php endif; ?>
					</div>
	<?php 
$categories = get_the_category(get_the_ID());
if ($categories){
    echo '<div class="related-cat">';
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 6, // So bai viet dc hien thi
    );
    $my_query = new wp_query($args);
    if( $my_query->have_posts() ):
        echo '<h3>Xem thêm</h3><div class="post-relate-list"><ul>';
        while ($my_query->have_posts()):$my_query->the_post();
            ?>
            <li><i class="fa fa-caret-right"></i><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?></a></li>
            <?php
        endwhile;
        echo '</ul></div>';
    endif; wp_reset_query();
    echo '</div>';
}
?>
				</div>

		<div class="details-product row">
			<div class="col-6">
				<div class="box-img">
					<?php $url = get_the_post_thumbnail_url($post_id, 'full'); ?>
					<img src="<?php echo $url ?>" />
				</div>
			</div>
			<div class="col-6">
				<div class="box-text">
					<h1 class="title-product"><?php echo get_the_title(); ?></h1>
					<p class="price-product"><?php echo get_post_meta(get_the_ID(), 'gia_km', TRUE); ?></p>
					<p class="desc-product"><?php echo get_the_excerpt(); ?></p>
					<div class="btn-buy-now">
					<p class="buy-now-product"><a href="http://phongkhamchuyengia.vn/lien-he/">ĐẶT LỊCH KHÁM CHỮA BỆNH</a></p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="content-product">
			<h1 class="title-content-product">Chi tiết gói khám chữa bệnh</h1>
			<div class="description-product">
				<?php the_content(); ?>
			</div>
		</div>

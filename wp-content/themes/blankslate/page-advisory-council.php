<?php
/*
Template Name: Advisory Council (SSAC)
*/
?>
<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="wrapper wide">
			<div class="wrapper">
				<div class="featured-image">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="inner-wrapper">
				<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
				</header>
				<section class="entry-content">
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
				<ul class="advisory-council-list">
					<?php 
					$args = array( 
						'post_type' 		=> 'scientific_advisors', 
						'posts_per_page' 	=> -1,
						'orderby'			=> 'meta_value',
						'order'				=> 'ASC',
						'meta_key' 			=> 	'last_name'
						);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post(); ?>
						<li>
							<?php $link = slugify(get_the_title()); ?>
							<a href="#<?php echo $link;?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> - <?php print_custom_field('advisor_tagline'); ?>
						</li>
					<?php endwhile;?>
				</ul>
				<div class="advisory-council">
					<?php 
					$args = array( 
						'post_type' 		=> 'scientific_advisors', 
						'posts_per_page' 	=> -1,
						'orderby'			=> 'meta_value',
						'order'				=> 'ASC',
						'meta_key' 			=> 	'last_name'
						);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post(); ?>
						<?php $link = slugify(get_the_title()); ?>
						<div class="profile" id="<?php echo $link;?>">
							<h4><?php the_title(); ?></h4>
							<span class="tagline"><?php print_custom_field('advisor_tagline'); ?></span>
							<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
						</div>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	</article>
	<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
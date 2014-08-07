<?php
/*
Template Name: Investigator Teams
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
		<header class="header">
			<?php /* <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?> */ ?>
		</header>
		<div class="wrapper">
			<div class="inner-wrapper">
				<section class="entry-content">
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
				<div class="investigator-teams">
					<?php 
					$args = array( 
						'post_type' 		=> 'investigator_teams', 
						'posts_per_page' 	=> -1,
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC'
						);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post(); ?>
						<h4><?php the_title(); ?></h4>
						<span class="tagline"><?php print_custom_field('team_tagline'); ?></span>
						<?php the_content(); ?>
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
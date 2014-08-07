<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
<script src="<?php echo get_template_directory_uri() ?>/js/cycle.js" /></script>
<section id="content" role="main">
	<div class="wrapper wide">
		<div class="wrapper">
			<ul id="homepage-features">
				<?php 
					$args = array( 
						'post_type' 		=> 'homepage_feature', 
						'posts_per_page' 	=> -1,
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC'
						);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : 
						$loop->the_post(); ?>
						<li>
							<?php the_post_thumbnail(); ?>
							<div class="overlay">
								<?php print_custom_field('text_overlay'); ?>
							</div>
						</li>
						<?php endwhile;
				?>
			</ul>
		</div>
	</div>
	<div class="wrapper">
		<div class="inner-wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="entry-content">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
			</article>
			<ul class="homepage-categories">
				<?php 
					$args = array( 
						'post_type' 		=> 'homepage_category', 
						'posts_per_page' 	=> 4,
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC'
						);
					$loop = new WP_Query( $args );
					$n = 0;
					while ( $loop->have_posts() ) : 
						$loop->the_post(); 
						if($n % 2 == 0){
							$class = "even";
						}else{
							$class = "odd";
						}?>
						<li class="<?php echo $class; ?>"> 
							<a title="<?php the_title(); ?>" href="<?php print_custom_field('link_url:to_link_href','http://yoursite.com/default/page/');?>">
								<?php the_post_thumbnail(); ?>
								<div class="title">
									<?php the_title(); ?>
								</div>
							</a>
						</li>
						<?php $n++; ?>
					<?php endwhile;
				?>
			</ul>
		</div>
	</div>
	<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
</section>
<div class="wrapper">
	<section class="blog-columns">
		<div class="inner-wrapper">
			<h1>From the <span>Blog</span></h1>
			<ol class="blog">
				<?php
				$stories = get_blog_posts('blog.braintumor.org/feed/?cat=38');
				//create exclusion list of categories
				$exclude_list = array('Fundraising','Legislative Issues','Brain Tumor Information');
				$count = 0;
				foreach ($stories->channel->item as $storyinfo):
					$exclude = false;
					//check for excluding categories
					foreach ($storyinfo->category as $category) {
						if (in_array($category, $exclude_list)) {
						    $exclude = true;
						}
					}
					if ($exclude == false && $count < 3) {
						$title=$storyinfo->title;
						$url=$storyinfo->link;
						$date=$storyinfo->pubDate;
						$description=$storyinfo->description; 
						$count++; ?>
						<li>
							<article>
								<span class="date"><?php echo date('F j, Y',strtotime($date)); ?></span>
								<h1><?php echo $title; ?></h1>
								<p><?php echo $description; ?></p>
								<a href="<?php echo $url; ?>" class="more" title="<?php echo $title; ?>">Read more</a>
								<div class="sharebarDiv" id="sharebarDiv-<?php echo $count;?>"></div>
							</article>
							<script type="text/javascript">
							var act = new gigya.socialize.UserAction();
							
							act.setTitle("Advancing Research to Therapies Conference Connects Field | National Brain Tumor Society Blog");
							act.setLinkBack("<?php echo $url;?>");
							act.setDescription("<?php echo $description;?>");
							act.addActionLink("Read more", "<?php echo $url;?>");
							act.addMediaItem({ type: 'image', src: '', href: '<?php echo $url;?>' });
							var showShareBarUI_params=
							{ 
								containerID: 'sharebarDiv-<?php echo $count;?>',
								shareButtons: 'Share',
								userAction: act,
								buttonImages:{buttonLeftImgUp:'http://blog.braintumor.org/wp-content/themes/blankslate/images/share-bttn.png',buttonCenterBGImgUp:null,buttonRightImgUp:null}
							}
							</script>
							<script type="text/javascript">
									gigya.socialize.showShareBarUI(showShareBarUI_params);			
							</script>
						</li>
					<?php }
				endforeach;
				?>
			</ol>
			<a class="btn btn-blue" href="http://blog.braintumor.org/" title="View more from this blog">More from the blog</a>
		</div>
	</section>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#homepage-features').cycle({ 
			delay:  5000
		});
	});
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
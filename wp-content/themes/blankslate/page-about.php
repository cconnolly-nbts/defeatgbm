<?php
/*
Template Name: About
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
			</div>
		</div>
	</article>
	<?php if ( ! post_password_required() ) comments_template('', true); ?>
<?php endwhile; endif; ?>
</section>
<section class="blog-columns">
	<div class="wrapper">
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
			<a class="btn btn-blue" href="http://blog.braintumor.org/" title="More from the blog">More from the blog</a>
		</div>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
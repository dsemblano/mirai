<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="main" class="site-main" role="main">
	<div id="da-thumbs-portifolio" class="da-thumbs">
		
		<?php
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

		// Get the page as an Object
		$portfolio =  get_page_by_title('portifolio');

		// Filter through all pages and find Portfolio's children
		$portfolio_children = get_page_children( $portfolio->ID, $all_wp_pages );
		
		foreach ($portfolio_children as $children) {
			$html = '<div id=';
			$html .= $children->post_name;
			$html .= ' class="flex-item-portifolio">';
			$html .= '<a href="';
			$html .= $children->guid;
			$html .= '">';
			//$html .= get_the_post_thumbnail( $children->ID, 'gallery_down' );
			$html .= '<div><span>';
			$html .= $children->post_title;
			$html .= '</div></span></a></div>';
			echo $html;
		}
		
		?>

			
	</div>
</main>

<?php get_footer(); ?>
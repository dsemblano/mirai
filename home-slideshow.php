<div id="da-thumbs" class="da-thumbs">
	
	<?php /* Gallery Up */ ?>	
	<div id="gallery_up" class="flex-container">
		<div id="empresa" class="flex-item">
		<?php $page = get_page_by_title( 'A Empresa' ); ?>
			<a href="<?php echo ($page->guid); ?>">			
				<?php echo get_the_post_thumbnail( $page->ID, 'gallery_up' ); ?>
				<div><span><?php echo ($page->post_title); ?></div></span>
			</a>
		</div>
		
		<div id="portifolio" class="flex-item">
		<?php $page = get_page_by_title( 'Portifolio' ); ?>
			<a href="<?php echo ($page->guid); ?>">			
				<?php echo get_the_post_thumbnail( $page->ID, 'gallery_up' ); ?>
				<div><span><?php echo ($page->post_title); ?></div></span>
			</a>
		</div>
	</div>
	
	<div id="gallery_down" class="flex-container">
		<div id="curtimos" class="flex-item">
			<a href="<?php echo ($page->guid); ?>">			
		<?php $page = get_page_by_title( 'Curtimos' ); ?>
				<?php echo get_the_post_thumbnail( $page->ID, 'gallery_down' ); ?>
				<div><span><?php echo ($page->post_title); ?></div></span>
			</a>
		</div>
			
		<div id="equipe" class="flex-item">
		<?php $page = get_page_by_title( 'Equipe' ); ?>
			<a href="<?php echo ($page->guid); ?>">			
				<?php echo get_the_post_thumbnail( $page->ID, 'gallery_down' ); ?>
				<div><span><?php echo ($page->post_title); ?></div></span>
			</a>
		</div>
		
		<div id="contato" class="flex-item">
		<?php $page = get_page_by_title( 'Contato' ); ?>
			<a href="<?php echo ($page->guid); ?>">			
				<?php echo get_the_post_thumbnail( $page->ID, 'gallery_down' ); ?>
				<div><span><?php echo ($page->post_title); ?></div></span>
			</a>
		</div>
	</div>	
		
</div>

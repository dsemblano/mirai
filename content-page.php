<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package miraitotalle
 */
?>

<?php get_sidebar(); ?>

<?php if (is_page( 'portifolio' )) : ?>

	<?php get_template_part( 'home', 'slideshow'); ?>
	
<?php else: ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="<?php echo (is_page( 'contato' )) ? "entry-contato" : "entry-content"; ?>">
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'miraitotalle' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->

<?php endif; ?>

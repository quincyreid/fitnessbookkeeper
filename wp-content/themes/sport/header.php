<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>


<?php

/**
 * The header section for our theme.
 *
 *
 * @package Cromathemes
 * @subpackage Sport
 * @since 1.0
 */


$tlset = get_option( "tlset" );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php
echo '<title>' .  wp_title('-' , 0, 'right' ) . '</title>';

$ap 		= get_mapstack();
if ($ap != '') {echo $ap;}
$bgimg 		= (isset($tlset['cro_logobg']) && $tlset['cro_logobg'] != 2 )? 'cro_logowithbg' : 'cro_logonobg';



wp_head();
?>
</head>



<?php 
	if ($ap != '') { ?>
		<body <?php body_class(); ?> onload="initialize()">
	<?php } else { ?>
		<body <?php body_class(); ?>>
	<?php } 
?>

<div class="outer">
	<div class="logoresponsive">
		<?php 
			if(isset($tlset['logo']) && $tlset['logo'])  {
				echo '<a href="'. esc_url( home_url( '/' ) ) .'" class="logolink" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home"><img class="tllogo ' .  $bgimg . '" title="' .  esc_attr( get_bloginfo( 'name', 'display' )) . '" src="' .  $tlset['logo'] . '" alt="' .  esc_attr( get_bloginfo( 'name', 'display' )) . '" /></a>';
			} else {
				echo '&nbsp;';
			}
		?>
	</div>
	<div class="mbod">
		<div class="topper">
			<div id="mainmen">
				<div class="row">
					<div class="logorow">
						<?php 
						if(isset($tlset['logo']) && $tlset['logo'])  {
							echo '<a href="'. esc_url( home_url( '/' ) ) .'" class="logolink" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home"><img class="tllogo ' .  $bgimg . '" title="' .  esc_attr( get_bloginfo( 'name', 'display' )) . '" src="' .  $tlset['logo'] . '" alt="' .  esc_attr( get_bloginfo( 'name', 'display' )) . '" /></a>';
						} else {
							echo '&nbsp;';
						}
						?>
					</div>
					<div id="access">	
						<?php 
							if ( has_nav_menu('primary' ) ) {
								wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_id'  => 'cro-menu' ) ); 
							} 
						?>
					</div>	
				</div>
			</div>
			<div class="row">
			<?php echo ntfetch_social(); ?>	
		</div>
	</div>

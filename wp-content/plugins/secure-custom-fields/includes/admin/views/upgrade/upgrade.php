<?php
/**
 * Admin Database Upgrade
 *
 * Shows the database upgrade process.
 *
 * @package wordpress/secure-custom-fields
 */

?>
<style type="text/css">
	
	/* hide steps */
	.step-1,
	.step-2,
	.step-3 {
		display: none;
	}		
	
</style>
<div id="acf-upgrade-wrap" class="wrap">
	
	<h1><?php esc_html_e( 'Upgrade Database', 'secure-custom-fields' ); ?></h1>
	
<?php if ( acf_has_upgrade() ) : ?>

	<p><?php esc_html_e( 'Reading upgrade tasks...', 'secure-custom-fields' ); ?></p>
	<?php /* translators: %s the new ACF version */ ?>
	<p class="step-1"><i class="acf-loading"></i> <?php echo esc_html( sprintf( __( 'Upgrading data to version %s', 'secure-custom-fields' ), ACF_VERSION ) ); ?></p>
	<p class="step-2"></p>
	<?php /* translators: %s the url to the field group page. */ ?>
	<p class="step-3"><?php echo acf_esc_html( sprintf( __( 'Database upgrade complete. <a href="%s">See what\'s new</a>', 'secure-custom-fields' ), esc_url( admin_url( 'edit.php?post_type=acf-field-group' ) ) ) ); ?></p>
	
	<script type="text/javascript">
	(function($) {
		
		var upgrader = new acf.Model({
			initialize: function(){
				
				// allow user to read message for 1 second
				this.setTimeout( this.upgrade, 1000 );
			},
			upgrade: function(){
				
				// show step 1
				$('.step-1').show();
				
				// vars
				var response = '';
				var success = false;
				
				// send ajax request to upgrade DB
				$.ajax({
					url: acf.get('ajaxurl'),
					dataType: 'json',
					type: 'post',
					data: acf.prepareForAjax({
						action: 'acf/ajax/upgrade'
					}),
					success: function( json ){
						success = true;
					},
					error: function( jqXHR, textStatus, errorThrown ){
						response = '<?php esc_attr_e( 'Upgrade failed.', 'secure-custom-fields' ); ?>';
						if( error = acf.getXhrError(jqXHR) ) {
							response += ' <code>' + error +  '</code>';
						}
					},
					complete: this.proxy(function(){
						
						// remove spinner
						$('.acf-loading').hide();
						
						// display response
						if( response ) {
							$('.step-2').show().html( response );
						}
						
						// display success
						if( success ) {
							$('.step-3').show();
						}
					})
				});
			}
		});
				
	})(jQuery);	
	</script>

<?php else : ?>

	<p><?php esc_html_e( 'No updates available.', 'secure-custom-fields' ); ?></p>
	
<?php endif; ?>
</div>

<div class="wrap">
    <h1>Shop Admin !!!</h1>
    <?php settings_errors(); ?>


<form method ="post" action ="options.php">
    <?php 
        settings_fields( 'shop_cpt_group' );
        do_settings_sections( 'shop_cpt' );
        submit_button();
    ?>
</form>
</div>

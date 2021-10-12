<div class="wrap">
    <h1>Shop Admin !!!</h1>
    <?php settings_errors(); ?>
<ul class = "nav nav-tabs">
    <li class = "active"><a href = "#tab-1">Manage Settings</a></li>
    <li><a href = "#tab-2">Updates</a></li>
    <li><a href = "#tab-3">About</a></li>
</ul>
<div class = "tab-content">
    <div id= "tab-1" class = "tab-pane active">
    <form method ="post" action ="options.php">
        <?php 
            settings_fields( 'shop_cpt_group' );
            do_settings_sections( 'shop_cpt' );
            submit_button();
        ?>
    </form> 
    </div>

    <div id= "tab-2" class = "tab-pane">
</div>


</div>

<form class="navbar-form" role="search"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Buscar" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" value="<?php echo esc_attr_x( 'Buscar', 'submit button' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
    </div>
</form>
<?php get_header(); ?>

    <?php $title = myThemes::get( 'blog-title' ); ?>

    <div class="mythemes-page-header">
      <div class="container">
        	<div class="row">
				<div class="col-lg-12">
					<h1><?php echo $title; ?></h1>
					<nav class="mythemes-nav-inline">
				  	<ul class="mythemes-menu">
				    	<li><a href="<?php echo esc_attr( home_url( '/' ) ); ?>" title="<?php _e( 'go home' , 'myThemes' ); ?>"><i class="icon-home"></i> <?php _e( 'Home' , 'myThemes' ); ?></a></li>
				    	<li><?php echo $title; ?></li>
				  	</ul>
				</nav>
			</div>
        </div>
      </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
        
                <?php get_template_part( 'cfg/templates/loop' ); ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>
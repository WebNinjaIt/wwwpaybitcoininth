<div id="apus-header-mobile" class="header-mobile hidden-lg clearfix" style="padding:5px">    
    <div class="container">
        <div class="row">
            <div class="flex-middle">
                <div class="col-xs-6 text-left">
                    <?php
                        $logo = homeo_get_config('media-mobile-logo');
                        $logo_url = '';
                        if ( !empty($logo['id']) ) {
                            $img = wp_get_attachment_image_src($logo['id'], 'full');
                            if ( !empty($img[0]) ) {
                                $logo_url = $img[0];
                            }
                        }
                    ?>
                    <?php if( !empty($logo_url) ): ?>
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( $logo_url ); ?>" style="max-height:60px;" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="logo logo-theme">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri().'/images/logo.svg'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
				
                <div class="col-xs-2">
                        <?php
                            if ( homeo_get_config('header_mobile_login', true) && homeo_is_wp_realestate_activated() ) {
                                if ( is_user_logged_in() ) {
                                    $user_id = get_current_user_id();
                                    $menu_nav = 'user-menu';
                                    if ( WP_RealEstate_User::is_agency($user_id) ) {
                                        $menu_nav = 'agency-menu';
                                    } elseif ( WP_RealEstate_User::is_agent($user_id) ) {
                                        $menu_nav = 'agent-menu';
                                    }
                                    
                                    if ( !empty($menu_nav) && has_nav_menu( $menu_nav ) ) {
                                    ?>
                                        <div class="top-wrapper-menu pull-right">
                                            <a class="drop-dow btn-menu-account" href="javascript:void(0);">
                                                <i class="fas fa-user"></i>
                                            </a>
                                            <?php
                                                
                                                $args = array(
                                                    'theme_location' => $menu_nav,
                                                    'container_class' => 'inner-top-menu',
                                                    'menu_class' => 'nav navbar-nav topmenu-menu',
                                                    'fallback_cb' => '',
                                                    'menu_id' => '',
                                                    'walker' => new Homeo_Nav_Menu()
                                                );
                                                wp_nav_menu($args);
                                                
                                            ?>
                                        </div>
                                        <?php } ?>
                            <?php } else {
                                $login_register_page_id = wp_realestate_get_option('login_register_page_id');
                            ?>
                                    <div class="top-wrapper-menu pull-right">
                                        <a class="drop-dow btn-menu-account" href="<?php echo esc_url( get_permalink( $login_register_page_id ) ); ?>">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </div>
                            <?php }
                        }
                        ?>
                </div>
				
				
				
				
				<div class="col-xs-2 text-right">
				<div class="elementor-widget-container">
			        <div class="widget-currencies ">
            <div class="currencies-wrapper">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#">
    <span style="font-size: 13px; color: #F88304;">
 <i class="fas fa-coins"></i></span><i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" style="min-width: 115px;">
    	<form class="properties-currencies" method="get" action="https://paybitcoin.in.th/properties-in-thailand/">
			<ul class="currencies">
									<li class="">
						<label for="input-currency-THB">
							<input id="input-currency-THB" type="radio" name="currency" value="THB" class="hidden">
							฿ THB	</label>
					</li>
									
										<li class="">
						<label for="input-currency-BTC">
							<input id="input-currency-BTC" type="radio" name="currency" value="BTC" class="hidden">
							₿ BTC 				</label>
					</li>
									
										<li class="">
						<label for="input-currency-ETH">
							<input id="input-currency-ETH" type="radio" name="currency" value="ETH" class="hidden">
							Ξ ETH 				</label>
					</li>
									
										<li class="">
						<label for="input-currency-USDT">
							<input id="input-currency-USDT" type="radio" name="currency" value="USDT" class="hidden">
							₮ USDT				</label>
					</li>
								</ul>

					</form>
    </div>
</div>        </div>
        		</div>
				</div>
				
				
				
				
				
                <div class="col-xs-2 text-right">
                    
                        <a href="#" class="btn btn-showmenu btn-theme" id="mobilemenu">
                            <i class="fas fa-bars"></i>
                        </a>
                   	
					
                </div>
				
				
				
				
            </div>
        </div>
    </div>
</div>
<?php defined('ABSPATH') or die('No script kiddies please!'); ?>
<div class="eg-gallery-section-wrap" data-section-ref="layout" style="display:none;">
    <div class="eg-field-wrap">
        <label><?php _e('Image Source Type', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <select name="gallery_details[layout][image_source_type]" class="eg-gallery-form-field">
                <option value="full"><?php _e('Original Size', 'everest-gallery'); ?></option>
                <?php
                $selected_image_type = isset($gallery_details[ 'layout' ][ 'image_source_type' ]) ? esc_attr($gallery_details[ 'layout' ][ 'image_source_type' ]) : '';
                $image_sizes = get_intermediate_image_sizes();
                if ( count($image_sizes) > 0 ) {
                    foreach ( $image_sizes as $image_size ) {
                        ?>
                        <option value="<?php echo $image_size; ?>" <?php selected($image_size, $selected_image_type); ?>><?php echo ucfirst(str_replace('_', ' ', $image_size)); ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Layout Type', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <select name="gallery_details[layout][layout_type]" class="eg-gallery-form-field eg-gallery-layout-type">
                <?php
                $selected_layout_type = isset($gallery_details[ 'layout' ][ 'layout_type' ]) ? esc_attr($gallery_details[ 'layout' ][ 'layout_type' ]) : 'grid';
                $layout_types = array(
                    'grid' => __('Grid Layout', 'everest-gallery'),
                    'masonary' => __('Masonry Layout', 'everest-gallery'),
                    'slideshow' => __('Slideshow Layout', 'everest-gallery'),
                    'filmstrip' => __('Filmstrip Layout', 'everest-gallery'),
                    'blog' => __('Blog Layout', 'everest-gallery'),
                    'carousel' => __('Carousel Layout', 'everest-gallery')
                );
                /**
                 * Filters Layout types
                 *
                 * @param array $layout_types
                 * since 1.0.0
                 */
                $layout_types = apply_filters('eg_layout_types', $layout_types);
                foreach ( $layout_types as $layout_type => $layout_type_label ) {
                    ?>
                    <option value="<?php echo $layout_type; ?>" <?php selected($layout_type, $selected_layout_type); ?>><?php echo $layout_type_label; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Font', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <?php
            $selected_font = isset($gallery_details[ 'layout' ][ 'font' ]) ? $gallery_details[ 'layout' ][ 'font' ] : '';
            $fonts = array( 'Dosis', 'Open Sans', 'Raleway', 'Poppins', 'News Cycle', 'Dancing Script', 'BenchNine', 'Tangerine' );
            ?>
            <select name="gallery_details[layout][font]" class="eg-gallery-form-field eg-font-preview-trigger">
                <option value=""><?php _e('Default', 'everest-gallery'); ?></option>
                <?php
                foreach ( $fonts as $font ) {
                    ?>
                    <option value="<?php echo $font; ?>" <?php selected($selected_font, $font); ?>><?php echo $font; ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="eg-font-preview">The Quick Brown Fox Jumps Over The Lazy Dog. 1234567890</div>
            <style class="eg-font-preview-style">.eg-font-preview { font-family: "<?php echo $selected_font; ?>" !important; }</style>
        </div>
    </div>
    <div class="eg-field-wrap">
        <label><?php _e('Gallery Item Icon', 'everest-gallery'); ?></label>
        <div class="eg-field">
            <?php $item_icon = (isset($gallery_details[ 'layout' ][ 'item_icon' ])) ? 1 : 0; ?>
            <input type="checkbox" name="gallery_details[layout][item_icon]" <?php checked($item_icon, true); ?> class="eg-gallery-form-field"/>
            <p class="description"><?php _e('Enable if you want to show the item type icon on the center of image by default', 'everest-gallery'); ?></p>
        </div>
    </div>
    <?php
    $gallery_details[ 'layout' ][ 'layout_type' ] = (isset($gallery_details[ 'layout' ][ 'layout_type' ])) ? $gallery_details[ 'layout' ][ 'layout_type' ] : 'grid';
    ?>
    <div class="eg-grid-options eg-masonary-options eg-layout-options" <?php echo ($selected_layout_type == 'masonary' || $selected_layout_type == 'grid') ? '' : 'style="display:none"'; ?>>
        <label class="eg-section-heading"><?php _e('Configure Columns', 'everest-gallery') ?></label>
        <div class="eg-field-wrap">
            <label><?php _e('Desktops', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <div class="eg-ui-slider-wrap">
                    <?php
                    $desktop_column = isset($gallery_details[ 'layout' ][ 'columns' ][ 'desktop' ]) ? esc_attr($gallery_details[ 'layout' ][ 'columns' ][ 'desktop' ]) : '3';
                    ?>
                    <div class="eg-ui-slider" data-max="6" data-min="1" data-value="<?php echo $desktop_column; ?>"></div>
                    <input type="number" min="1" name="gallery_details[layout][columns][desktop]" max="5" class="eg-gallery-form-field" value="<?php echo $desktop_column; ?>" readonly="readonly"/>
                </div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Tablets/Ipad', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $tablet_columns = isset($gallery_details[ 'layout' ][ 'columns' ][ 'tablet' ]) ? esc_attr($gallery_details[ 'layout' ][ 'columns' ][ 'tablet' ]) : 3; ?>
                <div class="eg-ui-slider-wrap">
                    <div class="eg-ui-slider" data-min="1" data-max="6" data-value="<?php echo $tablet_columns; ?>"></div>
                    <input type="number" min="1" name="gallery_details[layout][columns][tablet]" max="5" class="eg-gallery-form-field" value="<?php echo $tablet_columns; ?>" readonly="readonly"/>
                </div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Mobiles', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $mobile_columns = isset($gallery_details[ 'layout' ][ 'columns' ][ 'mobile' ]) ? esc_attr($gallery_details[ 'layout' ][ 'columns' ][ 'mobile' ]) : 3; ?>
                <div class="eg-ui-slider-wrap">
                    <div class="eg-ui-slider" data-min="1" data-max="3" data-value="<?php echo $mobile_columns; ?>"></div>
                    <input type="number" min="1" name="gallery_details[layout][columns][mobile]" max="5" class="eg-gallery-form-field" value="<?php echo $mobile_columns; ?>" readonly="readonly"/>
                </div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Grid/Masonary Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][grid_masonary_layout]" class="eg-gallery-form-field eg-preview-trigger">
                    <?php
                    $selected_grid_masonary_layout = isset($gallery_details[ 'layout' ][ 'grid_masonary_layout' ]) ? esc_attr($gallery_details[ 'layout' ][ 'grid_masonary_layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 2; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($selected_grid_masonary_layout, 'layout-' . $i); ?>><?php echo __('Layout', 'everest-gallery') . ' ' . $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-preview-wrap">
                    <?php
                    for ( $i = 1; $i <= 2; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/grid/grid-layout-' . $i . '.png'; ?>" class="eg-preview-image" data-preview-id="<?php echo 'layout-' . $i; ?>" <?php echo ($selected_grid_masonary_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eg-slideshow-options eg-layout-options" <?php $this->eg_display_none($gallery_details[ 'layout' ][ 'layout_type' ], 'slideshow'); ?>>
        <label class="eg-section-heading"><?php _e('Configure Slideshow Options', 'everest-gallery'); ?></label>
        <div class="eg-field-wrap">
            <label><?php _e('Slideshow Pause Duration', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][slideshow][pause_duration]" min="1000" step="500" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'pause_duration' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'pause_duration' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the slideshow pause duration in milliseconds. Minimum duration is 1 sec i.e 1000 ms. Default duration is 2500 ms', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Slideshow Transition Duration', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][slideshow][transition_duration]" min="1000" step="500" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'transition_duration' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'transition_duration' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the slideshow transition duration in milliseconds. Minimum duration is 0.5 sec i.e 500 ms. Default duration is 500 ms', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Slideshow Mode', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][slideshow][mode]" class="eg-gallery-form-field">
                    <?php
                    $slideshow_mode = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'mode' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'mode' ]) : 'fade';
                    ?>
                    <option value="fade" <?php selected($slideshow_mode, 'fade'); ?>><?php _e('Fade', 'everest-gallery'); ?></option>
                    <option value="horizontal" <?php selected($slideshow_mode, 'horizontal'); ?>><?php _e('Slide', 'everest-gallery'); ?></option>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Next/Previous Controls', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $next_previous_controls = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'next_previous_controls' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'next_previous_controls' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][slideshow][next_previous_controls]" value="1" class="eg-gallery-form-field" <?php checked($next_previous_controls, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to show next/previous controls', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Play/Pause Controls', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $play_pause_controls = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'play_pause_controls' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'play_pause_controls' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][slideshow][play_pause_controls]" value="1" class="eg-gallery-form-field" <?php checked($play_pause_controls, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to show play/pause controls', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Auto Start', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $auto_start = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'auto_start' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'auto_start' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][slideshow][auto_start]" value="1" class="eg-gallery-form-field" <?php checked($auto_start, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to auto start the slideshow', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Adaptive Height', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $adaptive_height = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'adaptive_height' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'adaptive_height' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][slideshow][adaptive_height]" value="1" class="eg-gallery-form-field" <?php checked($adaptive_height, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to enable adaptive height', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Pager', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $pager = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'pager' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'pager' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][slideshow][pager]" value="1" class="eg-gallery-form-field" <?php checked($pager, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to enable pager for the slideshow.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Pager Type', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][slideshow][pager_type]" class="eg-gallery-form-field">
                    <?php
                    $pager_type = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'pager_type' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'pager_type' ]) : 'full';
                    ?>
                    <option value="full" <?php selected($pager_type, 'full'); ?>><?php _e('Dots', 'everest-gallery'); ?></option>
                    <option value="short" <?php selected($pager_type, 'short'); ?>><?php _e('Number', 'everest-gallery'); ?></option>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Slideshow Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][slideshow][layout]" class="eg-gallery-form-field eg-preview-trigger">
                    <?php
                    $selected_slideshow_layout = isset($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) ? esc_attr($gallery_details[ 'layout' ][ 'slideshow' ][ 'layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 5; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($selected_slideshow_layout, 'layout-' . $i); ?>><?php echo __('Layout', 'everest-gallery') . ' ' . $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-preview-wrap">
                    <?php
                    for ( $i = 1; $i <= 5; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/slideshow/slideshow-layout-' . $i . '.png'; ?>" class="eg-preview-image" data-preview-id="<?php echo 'layout-' . $i; ?>" <?php echo ($selected_slideshow_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eg-filmstrip-options eg-layout-options" <?php $this->eg_display_none($gallery_details[ 'layout' ][ 'layout_type' ], 'filmstrip'); ?>>
        <label class="eg-section-heading"><?php _e('Configure Filmstrip Options', 'everest-gallery'); ?></label>
        <div class="eg-field-wrap">
            <label><?php _e('Filmstrip Pause Duration', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][pause_duration]" min="1000" step="500" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'pause_duration' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'pause_duration' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the Filmstrip pause duration in milliseconds. Minimum duration is 1 sec i.e 1000 ms. Default duration is 1500 ms', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Filmstrip Mode', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][filmstrip][mode]" class="eg-gallery-form-field">
                    <?php
                    $filmstrip_mode = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'mode' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'mode' ]) : 'fade';
                    ?>
                    <option value="fade" <?php selected($filmstrip_mode, 'fade'); ?>><?php _e('Fade', 'everest-gallery'); ?></option>
                    <option value="horizontal" <?php selected($filmstrip_mode, 'horizontal'); ?>><?php _e('Slide', 'everest-gallery'); ?></option>
                </select>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Filmstrip Transition Duration', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][transition_duration]" min="1000" step="500" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'transition_duration' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'transition_duration' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the filmstrip transition duration in milliseconds. Minimum duration is 0.5 sec i.e 500 ms. Default duration is 500 ms', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Next/Previous Controls', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $next_previous_controls = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'next_previous_controls' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'next_previous_controls' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][filmstrip][next_previous_controls]" value="1" class="eg-gallery-form-field" <?php checked($next_previous_controls, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to show next/previous controls', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Play/Pause Controls', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $play_pause_controls = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'play_pause_controls' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'play_pause_controls' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][filmstrip][play_pause_controls]" value="1" class="eg-gallery-form-field" <?php checked($play_pause_controls, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to show play/pause controls', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Auto Start', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $auto_start = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'auto_start' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'auto_start' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][filmstrip][auto_start]" value="1" class="eg-gallery-form-field" <?php checked($auto_start, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to auto start the filmstrip', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Adaptive Height', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $adaptive_height = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'adaptive_height' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'adaptive_height' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][filmstrip][adaptive_height]" value="1" class="eg-gallery-form-field" <?php checked($adaptive_height, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to enable adaptive height', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-separator"></div>
        <h3><?php _e('Filmstrip Pager Options', 'everest-gallery'); ?></h3>
        <div class="eg-field-wrap">
            <label><?php _e('Min Slides', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][min_slides]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'min_slides' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'min_slides' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the minimum number of slides to be shown on filmstrip pagination. Default is 4. Please note that min slides should be less than max slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Max Slides', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][max_slides]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'max_slides' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'max_slides' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the maximum number of slides to be shown on filmstrip pagination. Default is 5. Please note that max slides should be greater than min slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Pager Thumbnail Width', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][slide_width]" min="80" step="5" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'slide_width' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'slide_width' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the width of each thubmnail. Default width is 170', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Pager Moves', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][filmstrip][pager_moves]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'pager_moves' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'pager_moves' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the number of pager to be moved on each next/previous click. Default is 1. Please note the pager moves should be less than min and max slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Flimstrip Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][filmstrip][layout]" class="eg-gallery-form-field  eg-preview-trigger">
                    <?php
                    $selected_filmstrip_layout = isset($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) ? esc_attr($gallery_details[ 'layout' ][ 'filmstrip' ][ 'layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 5; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($selected_filmstrip_layout, 'layout-' . $i); ?>><?php echo __('Layout', 'everest-gallery') . ' ' . $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-preview-wrap">
                    <?php
                    for ( $i = 1; $i <= 5; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/filmstrip/filmstrip-layout-' . $i . '.png'; ?>" class="eg-preview-image" data-preview-id="<?php echo 'layout-' . $i; ?>" <?php echo ($selected_filmstrip_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eg-carousel-options eg-layout-options" <?php $this->eg_display_none($gallery_details[ 'layout' ][ 'layout_type' ], 'carousel'); ?>>
        <label class="eg-section-heading"><?php _e('Configure Carousel Options', 'everest-gallery'); ?></label>
        <div class="eg-field-wrap">
            <label><?php _e('Min Slides', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][carousel][min_slides]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'carousel' ][ 'min_slides' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'min_slides' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the minimum number of slides to be shown on carousel pagination. Default is 4. Please note that min slides should be less than max slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Max Slides', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][carousel][max_slides]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'carousel' ][ 'max_slides' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'max_slides' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the maximum number of slides to be shown on carousel pagination. Default is 5. Please note that max slides should be greater than min slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Carousel Item Width', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][carousel][slide_width]" min="80" step="5" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'carousel' ][ 'slide_width' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'slide_width' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the width of each carousel item. Default width is 170', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Carousel Item Moves', 'everest-gallery') ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][carousel][item_moves]" min="1" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'carousel' ][ 'item_moves' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'item_moves' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the number of pager to be moved on each next/previous click. Default is 1. Please note the pager moves should be less than min and max slides.', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Carousel Pause Duration', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="number" name="gallery_details[layout][carousel][pause_duration]" min="1000" step="500" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'carousel' ][ 'pause_duration' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'pause_duration' ]) : ''; ?>"/>
                <p class="description"><?php _e('Please enter the carousel pause duration in milliseconds. Minimum duration is 1 sec i.e 1000 ms. Default duration is 1500 ms', 'everest-gallery'); ?></p>
            </div>
        </div>

        <div class="eg-field-wrap">
            <label><?php _e('Show Controls', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $controls = isset($gallery_details[ 'layout' ][ 'carousel' ][ 'controls' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'controls' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][carousel][controls]" value="1" class="eg-gallery-form-field" <?php checked($controls, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to show controls', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Auto Start', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <?php $auto_start = isset($gallery_details[ 'layout' ][ 'carousel' ][ 'auto_start' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'auto_start' ]) : 0; ?>
                <label><input type="checkbox" name="gallery_details[layout][carousel][auto_start]" value="1" class="eg-gallery-form-field" <?php checked($auto_start, true); ?>/></label>
                <p class="description"><?php _e('Please check if you want to auto start the carousel', 'everest-gallery'); ?></p>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Carousel Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][carousel][layout]" class="eg-gallery-form-field eg-preview-trigger">
                    <?php
                    $selected_carousel_layout = isset($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) ? esc_attr($gallery_details[ 'layout' ][ 'carousel' ][ 'layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($selected_carousel_layout, 'layout-' . $i); ?>><?php echo __('Layout', 'everest-gallery') . ' ' . $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-preview-wrap">
                    <?php
                    for ( $i = 1; $i <= 10; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/carousel/carousel-layout-' . $i . '.png'; ?>" class="eg-preview-image" data-preview-id="<?php echo 'layout-' . $i; ?>" <?php echo ($selected_carousel_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eg-blog-options eg-layout-options" <?php $this->eg_display_none($gallery_details[ 'layout' ][ 'layout_type' ], 'blog'); ?>>
        <label class="eg-section-heading"><?php _e('Configure Blog Options', 'everest-gallery'); ?></label>
        <div class="eg-field-wrap">
            <label><?php _e('Blog Layout', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <select name="gallery_details[layout][blog][layout]" class="eg-gallery-form-field eg-preview-trigger">
                    <?php
                    $selected_blog_layout = isset($gallery_details[ 'layout' ][ 'blog' ][ 'layout' ]) ? esc_attr($gallery_details[ 'layout' ][ 'blog' ][ 'layout' ]) : 'layout-1';
                    for ( $i = 1; $i <= 7; $i++ ) {
                        ?>
                        <option value="layout-<?php echo $i; ?>" <?php selected($selected_blog_layout, 'layout-' . $i); ?>><?php echo __('Layout', 'everest-gallery') . ' ' . $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="eg-preview-wrap">
                    <?php
                    for ( $i = 1; $i <= 7; $i++ ) {
                        ?>
                        <img src="<?php echo EG_IMG_DIR . 'previews/blog/blog-layout-' . $i . '.png'; ?>" class="eg-preview-image" data-preview-id="<?php echo 'layout-' . $i; ?>" <?php echo ($selected_blog_layout != 'layout-' . $i) ? 'style="display:none"' : ''; ?>/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="eg-field-wrap">
            <label><?php _e('Read More Text Label', 'everest-gallery'); ?></label>
            <div class="eg-field">
                <input type="text" name="gallery_details[layout][blog][read_more_label]" class="eg-gallery-form-field" value="<?php echo isset($gallery_details[ 'layout' ][ 'blog' ][ 'read_more_label' ]) ? esc_attr($gallery_details[ 'layout' ][ 'blog' ][ 'read_more_label' ]) : ''; ?>"/>
            </div>
        </div>
    </div>
</div>
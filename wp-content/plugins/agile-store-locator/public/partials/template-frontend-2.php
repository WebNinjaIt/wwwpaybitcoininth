<?php

//$all_configs['infobox_layout'] = '0';

$class = (isset($all_configs['css_class']))? ' '.$all_configs['css_class']: '';


//if time_switch and distance is off then no-advance filter
if($all_configs['time_switch'] == '0' && $all_configs['distance_slider'] == '0' && $all_configs['show_categories'] == '0')
  $all_configs['advance_filter'] = '0';


if($all_configs['display_list'] == '0' || $all_configs['first_load'] == '3'  || $all_configs['first_load'] == '4')
  $class .= ' map-full';

if($all_configs['full_width'])
  $class .= ' full-width';


if($all_configs['advance_filter'] == '0')
  $class .= ' no-asl-filters';

if($all_configs['layout'] == '1' || $all_configs['layout'] == '2' || $all_configs['advance_filter'] == '0'){
  $class .= ' asl-no-advance';
}
else if($all_configs['show_categories'] == '0') {
 $class .= ' asl-no-categories'; 
}


$layout_code  = ($all_configs['layout'] == '1'  || $all_configs['layout'] == '2')? '1': '0';


$default_addr = (isset($all_configs['default-addr']))?$all_configs['default-addr']: '';

//add Full height
if($all_configs['full_height'])
  $class .= ' '.$all_configs['full_height'];


$distance_control = ($all_configs['distance_control'] == '1')?'1':'0';


$has_filter         = ($all_configs['time_switch'] == '1' || $all_configs['distance_slider'] == '1')? true: false;


$geo_btn_class      = ($all_configs['geo_button'] == '1')?'asl-geo icon-direction-outline':'icon-search';
$search_type_class  = ($all_configs['search_type'] == '1')?'asl-search-name':'asl-search-address';
$panel_order        = (isset($all_configs['map_top']))?$all_configs['map_top']: '2';
?>
<link rel='stylesheet' id='asl-plugin-css'  href='<?php echo ASL_URL_PATH ?>public/css/asl-2.css?v=<?php echo ASL_CVERSION; ?>' type='text/css' media='all' />
<style type="text/css">
#asl-storelocator.asl-p-cont .Status_filter .onoffswitch-inner::before{content: "<?php echo __('OPEN', 'asl_locator') ?>" !important}
#asl-storelocator.asl-p-cont .Status_filter .onoffswitch-inner::after{content: "<?php echo __('ALL', 'asl_locator') ?>" !important}
#asl-storelocator.container.storelocator-main.asl-p-cont .asl-panel-box {order: <?php echo $panel_order ?>;}
</style>
<div id="asl-storelocator" class="container asl-template-2 storelocator-main asl-p-cont asl-layout-<?php echo $layout_code; ?>  asl-bg-<?php echo $all_configs['color_scheme_2'].$class; ?> asl-text-<?php echo $all_configs['font_color_scheme'] ?>">
  <?php if($all_configs['gdpr'] == '1'): ?>
  <div class="sl-gdpr-cont">
    <div class="gdpr-ol"></div>
    <div class="gdpr-ol-bg"></div>
    <div class="gdpr-box">
      <p><?php echo __( 'Due to the GDPR, we need your consent to load data from Google, more information in our privacy policy.', 'asl_locator') ?></p>
      <a class="btn btn-asl" id="sl-btn-gdpr"><?php echo __( 'Accept','asl_locator') ?></a>
    </div>
  </div>
  <?php endif; ?>
  <div class="row asl-loc-sec">
    <div class="col-sm-6 col-md-4 col-xs-12 asl-panel-box">
      <?php if($all_configs['advance_filter'] && $all_configs['layout'] == '0'): ?> 
        <?php if($has_filter): ?>
        <div class="row">
            <div class="filter-box asl-dist-ctrl-<?php echo $distance_control ?>">
              <div class="col-sm-4 col-xs-4 col-md-4 Status_filter">
                  <div class="asl-filter-cntrl">
                      <label class="asl-cntrl-lbl"><?php echo __('Status', 'asl_locator') ?></label>
                      <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="asl-open-close" checked>
                        <label class="onoffswitch-label" for="asl-open-close">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch asl-ico"></span>
                        </label>
                      </div>
                  </div>
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 pull-right">
                  <div class="range_filter hide">
                      <p class="rangeFilter">
                        <span><?php echo __( 'Distance Range','asl_locator') ?></span>
                        <input id="asl-radius-slide" type="text" class="span2" />
                        <span class="rad-unit"><?php echo __( 'Radius','asl_locator') ?>: <span id="asl-radius-input"></span> <span id="asl-dist-unit"><?php echo __( 'KM','asl_locator') ?></span></span>
                      </p>
                  </div>
              </div>
            </div>
        </div>
        <?php endif; ?>
      <?php else: ?>
        <div class="Num_of_store">
          <div class="calign"><?php echo $all_configs['head_title']  ?> <span class="count-result">0</span></div>
        </div>
      <?php endif; ?>
      <div class="asl-m--15">
        <div class="col-sm-12 col-xs-12 asl-panel">
          <?php if($all_configs['advance_filter'] && $all_configs['layout'] == '0'): ?> 

              <?php
              //if show_categories false
              if($all_configs['show_categories'] == '1'): ?> 
              <div class="Num_of_store hide">
                <div class="icon"><img src="<?php echo ASL_URL_PATH ?>public/img/icon-1.png"></div>
                <div class="asl-cat-name"><span class="sele-cat"></span> <span class="count-result">0</span></div>
                <div class="back-button"><i class="glyphicon icon-right-open"></i></div>
              </div>   
              <div class="cats-title">
                <span class="icon"><img src="<?php echo ASL_URL_PATH ?>public/img/category_icon.png"></span>
                <span><?php echo __('Categories', 'asl_locator') ?></span>
              </div>
              <?php else: ?>
                <div class="Num_of_store">
                <div class="calign"> <?php echo $all_configs['head_title']  ?> <span class="count-result">0</span></div>
              </div>   
              <?php endif; ?>

           <?php endif; ?>
          <!--  Panel Listing -->
          <?php if($all_configs['advance_filter'] == '1' && $all_configs['layout'] == '0' && $all_configs['show_categories'] == '1'): ?>
          <div class="categories-panel">
          </div>
          <?php endif ?>

          <div id="asl-list" class="storelocator-panel <?php if($all_configs['advance_filter'] && $all_configs['layout'] == '0' && $all_configs['show_categories'] == '1') echo 'hide'; ?>">
            <div class="asl-overlay" id="map-loading">
              <div class="white"></div>
              <div class="loading"><img style="margin-right: 10px;" class="loader" src="<?php echo ASL_URL_PATH ?>public/Logo/loading.gif"><?php echo __('Loading...', 'asl_locator') ?></div>
            </div>
            <div class="panel-cont">
                <div class="panel-inner">
                  <div class="col-md-12 asl-p-0">
                        <ul id="p-statelist" role="tablist" aria-multiselectable="true">
                      </ul>
                  </div>
                </div>
            </div>
            <div class="directions-cont hide" style="padding-top:12px">
              <div class="agile-modal-header">
                <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                <h4><?php echo __('Directions', 'asl_locator') ?></h4>
              </div>
              <div class="rendered-directions"></div>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <div class="col-sm-6 col-md-8 col-xs-12 asl-map">
      <div class="store-locator">
          
        <div class=" search_filter inside-map">
            <p>
              <input type="text" value="<?php echo $default_addr ?>" id="auto-complete-search" class="form-control <?php echo $search_type_class ?>" placeholder="<?php echo __( 'Find A Store','asl_locator') ?>">
              <span><i class="glyphicon <?php echo $geo_btn_class ?>" title="<?php echo ($all_configs['geo_button'] == '1')?__('Current Location','asl_locator'):__('Search Location','asl_locator') ?>"></i></span>
            </p>
        </div>
        <div id="asl-map-canv"></div>
        <!-- agile-modal -->
        <div id="agile-modal-direction" class="agile-modal fade">
          <div class="agile-modal-backdrop-in"></div>
          <div class="agile-modal-dialog in">
            <div class="agile-modal-content">
              <div class="agile-modal-header">
                <button type="button" class="close-directions close" data-dismiss="agile-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4><?php echo __('Get Your Directions', 'asl_locator') ?></h4>
              </div>
              <div class="form-group">
                <label for="frm-lbl"><?php echo __('From', 'asl_locator') ?>:</label>
                <input type="text" class="form-control frm-place" id="frm-lbl" placeholder="<?php echo __('Enter a Location', 'asl_locator') ?>">
              </div>
              <div class="form-group">
                <label for="frm-lbl"><?php echo __('To', 'asl_locator') ?>:</label>
                <input readonly="true" type="text"  class="directions-to form-control" id="to-lbl" placeholder="<?php echo __( 'Prepopulated Destination Address','asl_locator') ?>">
              </div>
              <div class="form-group">
                <span for="frm-lbl"><?php echo __('Show Distance In', 'asl_locator') ?></span>
                <label class="checkbox-inline">
                  <input type="radio" name="dist-type"  id="rbtn-km" value="0"> <?php echo __( 'KM','asl_locator') ?>
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="dist-type" checked id="rbtn-mile" value="1"> <?php echo __( 'Mile','asl_locator') ?>
                </label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default btn-submit"><?php echo __('GET DIRECTIONS', 'asl_locator') ?></button>
              </div>
            </div>
          </div>
        </div>

        <div id="asl-geolocation-agile-modal" class="agile-modal fade">
          
          <div class="agile-modal-backdrop-in"></div>
          <div class="agile-modal-dialog in">
          
            <div class="agile-modal-content">
              <button type="button" class="close-directions close" data-dismiss="agile-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php if($all_configs['prompt_location'] == '2'): ?>
              <div class="form-group">
                <h4><?php echo __('LOCATE YOUR GEOPOSITION', 'asl_locator') ?></h4>
              </div>
              <div class="form-group">
                <div class="">
                <div class="col-md-9 asl-p-0">
                  <input type="text" class="form-control" id="asl-current-loc" placeholder="<?php echo __('Your Address', 'asl_locator') ?>">
                </div>
                <div class="col-md-3 asl-p-0">
                  <button type="button" id="asl-btn-locate" class="btn btn-block btn-default"><?php echo __('LOCATE', 'asl_locator') ?></button>
                </div>
                </div>
              </div>
              <?php else: ?>
              <div class="form-group">
                <h4><?php echo __('Use my location to find the closest Service Provider near me', 'asl_locator') ?></h4>
              </div>
              <div class="form-group text-center">
                <button type="button" id="asl-btn-geolocation" class="btn btn-block btn-default"><?php echo __('USE LOCATION', 'asl_locator') ?></button>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- agile-modal end -->
      </div>
    </div>
  </div>
</div>
<!-- This plugin is developed by "Agile Store Locator for WordPress" https://agilestorelocator.com -->
<?php
////*SCRIPT TAGS STARTS FROM HERE:: FROM EVERY THING BELOW THIS LINE:: VARIALBLE LIMIT IS NOT SUPPORTING LONGER HTML*////
if($atts['no_script'] == 0):
?>
<script id="tmpl_list_item" type="text/x-jsrender">
  <div class="sl-item" data-id="{{:id}}">
    <div class="row">
      {{if path}}
      <div class="col-xs-4 img-section">
        <a class="thumb-a"><img src="<?php echo ASL_UPLOAD_URL ?>Logo/{{:path}}" alt="logo"></a>
      </div>
      {{/if}}
      <div class="col-xs-8 data-section">
        <div class="title-item">
          <p class="p-title">{{:title}}</p>
        </div>
        <div class="clear"></div>
        <div class="addr-sec">
          <p class="p-area">{{:address}}</p>
          {{if phone}}
          <p class="p-area"><span class="glyphicon icon-phone-outline"></span>{{:phone}}</p>
          {{/if}}
          {{if email}}
          <p class="p-area"><span class="glyphicon icon-at"></span><a href="mailto:{{:email}}" style="text-transform: lowercase">{{:email}}</a></p>
          {{/if}}
          {{if c_names}}
          <p class="p-category"><span class="glyphicon icon-tag"></span> {{:c_names}}</p>
          {{/if}}
          {{if open_hours}}
          <p class="p-time"><span class="glyphicon icon-clock-1"></span> {{:open_hours}}</p>
          {{/if}}
          {{if days_str}}
          <p class="p-time"><span class="glyphicon icon-calendar-outlilne"></span>{{:days_str}}</p>
          {{/if}}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6"><span class="s-distance">{{if dist_str}}{{:dist_str}}&nbsp;{{/if}}</span></div>
      <div class="col-xs-6">
          <a class="a-direction s-direction btn btn-asl pull-right"><?php echo __('Directions', 'asl_locator') ?></a>
      </div>
    </div>
  </div>
</script>



<script id="asl_too_tip" type="text/x-jsrender">
  {{if path}}
  <div class="image_map_popup" style="display:none"><img src="{{:URL}}Logo/{{:path}}" /></div>
  {{/if}}
  <h3>{{:title}}</h3>
  <div class="infowindowContent">
    <div class="{{if path}}info-addr{{else}}info-addr w-100-p{{/if}}">
      <div class="address"><span class="glyphicon icon-location"></span><span>{{:address}}</span></div>
      {{if phone}}
      <div class="phone"><span class="glyphicon icon-phone-outline"></span><a href="tel:{{:phone}}">{{:phone}}</a></div>
      {{/if}}
      {{if end_time && start_time}}
      <div class="p-time"><span class="glyphicon icon-clock-1"></span> {{:start_time}} - {{:end_time}}</div>
      {{/if}}
      {{if email}}
      <div class="p-time"><span class="glyphicon icon-at"></span><a href="mailto:{{:email}}" style="text-transform: lowercase">{{:email}}</a></div>
      {{/if}}
      {{if dist_str}}
      <div class="distance"><?php echo __('Distance', 'asl_locator') ?>: {{:dist_str}}</div>
      {{/if}}
    </div>
    {{if path}}
    <div class="img_box" style="display:none">
      <img src="{{:URL}}Logo/{{:path}}" alt="logo">
    </div>
    {{/if}}
  <div class="asl-buttons"></div>
</div><div class="arrow-down"></div>
</script>
<?php endif; ?>
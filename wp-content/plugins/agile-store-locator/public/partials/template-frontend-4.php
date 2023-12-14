<?php


$class = '';

if($all_configs['display_list'] == '0' || $all_configs['first_load'] == '3' || $all_configs['first_load'] == '4')
  $class = ' map-full';


//  Harcodes, always show tabs
$all_configs['show_categories'] = '1';
$all_configs['layout']          = '0';
$all_configs['full_height']     = '';

/*
if($all_configs['advance_filter'] == '0')
  $class .= ' no-asl-filters';

if($all_configs['advance_filter'] == '1' && $all_configs['layout'] == '1')
  $class .= ' asl-adv-lay1';
*/

//add Full height
//$class .= ' '.$all_configs['full_height'];

$default_addr = (isset($all_configs['default-addr']))?$all_configs['default-addr']: '';


$container_class    = (isset($all_configs['full_width']) && $all_configs['full_width'])? 'container-fluid': 'container';
$geo_btn_class      = ($all_configs['geo_button'] == '1')?'asl-geo icon-direction':'icon-search';
$geo_btn_text       = ($all_configs['geo_button'] == '1')?__('Current Location', 'asl_locator'):__('Search', 'asl_locator');
$search_type_class  = ($all_configs['search_type'] == '1')?'asl-search-name':'asl-search-address';
$panel_order        = (isset($all_configs['map_top']))?$all_configs['map_top']: '2';

?>
<style type="text/css">
    @media(max-width:991px){
        #asl-storelocator.asl-cont .asl-panel {order: <?php echo $panel_order ?>;}
    }
</style>

<div id="asl-storelocator" class="asl-cont asl-template-4 asl-layout-<?php echo $all_configs['layout']; ?> asl-bg-<?php echo $all_configs['color_scheme_3'].$class; ?> asl-text-<?php echo $all_configs['font_color_scheme'] ?>">
    <section class="sl-main-cont">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-6">
                    <div id="asl-panel" class="asl-panel">
                        <div class="sl-filter-cont">
                            <h3><?php echo __('STORE LOCATIONS', 'asl_locator') ?></h3>
                            <div class="asl-addr-sec">
                                <a class="btn btn-default asl-geo"><img src="<?php echo $all_configs['URL'] ?>public/images/gps.svg" alt="gps"> <?php echo __('USE CURRENT LOCATION', 'asl_locator') ?></a>
                                <div class="asl-addr-search"><input id="sl-main-search" type="text" class="asl-search-address form-control" placeholder="<?php echo __('Enter a Postcode or Suburb', 'asl_locator') ?>"></div>
                            </div>
                        </div>
                        <div class="asl-panel-inner">
                            <div class="sl-filter-tabs"></div>
                            <div class="sl-list-cont">
                                <ul id="p-statelist" class="sl-list">
                                </ul>
                            </div>
                        </div>
                        <div class="directions-cont hide">
                            <div class="agile-modal-header">
                                <button type="button" class="close"><span aria-hidden="true">×</span></button>
                                <h4><?php echo __('Directions', 'asl_locator') ?></h4>
                            </div>
                            <div class="rendered-directions" style="direction: ltr;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="sl-map-cont">
                        <div id="asl-map-canv" class="asl-map-canv"></div>
                        <div id="agile-modal-direction" class="agile-modal fade">
                            <div class="agile-modal-backdrop-in"></div>
                            <div class="agile-modal-dialog in">
                                <div class="agile-modal-content">
                                    <div class="agile-modal-header">
                                        <button type="button" class="close-directions close" data-dismiss="agile-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4><?php echo __('Get Your Directions', 'asl_locator') ?></h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="frm-lbl"><?php echo __('From', 'asl_locator') ?></label>
                                        <input type="text" class="form-control frm-place" id="frm-lbl" placeholder="<?php echo __('Enter a Location', 'asl_locator') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="frm-lbl"><?php echo __('To', 'asl_locator') ?></label>
                                        <input readonly="true" type="text"  class="directions-to form-control" id="to-lbl" placeholder="<?php echo __('Destination Address', 'asl_locator') ?>">
                                    </div>
                                    <div class="form-group mb-0">
                                        <span for="frm-lbl"><?php echo __('Distance Unit', 'asl_locator') ?></span>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="dist-type"  id="rbtn-km" value="0"> <?php echo __('KM', 'asl_locator') ?>
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="dist-type" checked id="rbtn-mile" value="1"> <?php echo __('Mile', 'asl_locator') ?>
                                        </label>
                                    </div>
                                    <div class="form-group mb-0">
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
                                    <div class="row">
                                    <div class="col-lg-9">
                                      <input type="text" class="form-control" id="asl-current-loc" placeholder="<?php echo __('Your Address', 'asl_locator') ?>">
                                    </div>
                                    <div class="col-lg-3 pl-lg-0">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
////*SCRIPT TAGS STARTS FROM HERE:: FROM EVERY THING BELOW THIS LINE:: VARIALBLE LIMIT IS NOT SUPPORTING LONGER HTML*////
if($atts['no_script'] == 0):
?>
<script id="tmpl_list_item" type="text/x-jsrender">
    <li class="sl-item" data-id="{{:id}}">
        {{if path}}
        <div class="sl-title">
            <img src="<?php echo ASL_URL_PATH ?>public/Logo/{{:path}}" alt="logo" class="img-fluid" />
            <h3>{{:title}}</h3>
        </div>
        {{/if}}
        <div class="row">
            <div class="{{if open_hours}}col-sm-6 col-7{{else}}col-12{{/if}}">
                <div class="sl-location">
                    <ul>
                        <li><span><img src="<?php echo ASL_URL_PATH ?>public/images/location-icon.svg"></span><p>{{:address}}</p></li>
                        {{if phone}}
                        <li><a href="tel:{{:phone}}"><span><img src="<?php echo ASL_URL_PATH ?>public/images/phone-icon.svg"></span>{{:phone}}</a></li>
                        {{/if}}
                        <li><a class="s-direction"><span><img src="<?php echo ASL_URL_PATH ?>public/images/next-icon.svg"></span><?php echo __('Get Directions', 'asl_locator') ?></a></li>
                        {{if website}}
                        <li><a target="_blank" href="{{:website}}"><span><img src="<?php echo ASL_URL_PATH ?>public/images/cart.svg"></span><?php echo __('Shop Online', 'asl_locator') ?></a></li>
                        {{/if}}
                    </ul>
                </div>
            </div>
            {{if open_hours}}
            <div class="col-sm-6 col-5">
                <div class="sl-timing">
                    <h3><?php echo __('Opening Hours', 'asl_locator') ?></h3>
                    {{:open_hours}}
                </div>
            </div>
            {{/if}}
        </div>
    </li>
</script>
<script id="asl_too_tip" type="text/x-jsrender">
    {{if path}}
    <div class="image_map_popup" style="display:none"><img src="{{:URL}}public/Logo/{{:path}}" ></div>
    {{/if}}
    <h3>{{:title}}</h3>
    <div class="infowindowContent">
    <div class="info-box-cont">
      <div class="row">
        <div class="col-md-12">
          <div class="{{if path}}info-addr{{else}}info-addr w-100-p{{/if}}">
            <div class="address"><i class="icon-address-card-o"></i><span>{{:address}}</span></div>
            {{if phone}}
            <div class="phone"><i class="icon-mobile-1"></i><a href="tel:{{:phone}}">{{:phone}}</a></div>
            {{/if}}
            {{if email}}
            <div class="p-time"><i class="icon-mail"></i><a href="mailto:{{:email}}" style="text-transform: lowercase">{{:email}}</a></div>
            {{/if}}
          </div>
          {{if path}}
          <div class="img_box" style="display:none">
            <img src="{{:URL}}public/Logo/{{:path}}" alt="logo">
          </div>
          {{/if}}
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="asl-tt-details">
              {{if open_hours}}
              <div class="p-time"><i class=""></i> <span>{{:open_hours}}</span></div>
              {{/if}}
              {{if show_categories && c_names}}
              <div class="categories asl-p-0"><i class="icon-tag"></i><span>{{:c_names}}</span></div>
              {{/if}}
              {{if dist_str}}
              <div class="distance"><?php echo __( 'Distance','asl_locator') ?>: {{:dist_str}}</div>
              {{/if}}
            </div>
        </div>
      </div>
    </div>
    <div class="asl-buttons"></div>
    </div><div class="arrow-down"></div>
</script>            
<?php endif; ?>
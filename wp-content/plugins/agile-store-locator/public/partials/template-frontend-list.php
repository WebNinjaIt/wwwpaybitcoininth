<?php


$class = '';

$default_addr = (isset($all_configs['default-addr']))?$all_configs['default-addr']: '';

$container_class    = (isset($all_configs['full_width']) && $all_configs['full_width'])? 'container-fluid': 'container';
$geo_btn_class      = ($all_configs['geo_button'] == '1')?'asl-geo icon-direction':'icon-search';
$geo_btn_text       = ($all_configs['geo_button'] == '1')?__('Current Location', 'asl_locator'):__('Search', 'asl_locator');
$search_type_class  = ($all_configs['search_type'] == '1')?'asl-search-name':'asl-search-address';

?>
<style type="text/css">
    .asl-cont .asl-clear-btn {z-index:1;border: 0;background: transparent;position: absolute;top: 1px;bottom: 0;right: 45px;  outline: none;line-height: 14px; padding: 0px 0.4rem;}
    .rtl .asl-cont .asl-clear-btn {right: auto;left: 45px;}
    li.sl-no-item h2 {font-size: 36px; font-weight: 800;margin-bottom: 1rem;text-align: center;}
    li.sl-no-item p {font-size: 18px;color: inherit;text-align: center;margin-top: 1rem;margin-bottom: 3rem;}
</style>
<div class="asl-cont asl-bg-<?php echo $all_configs['color_scheme'] ?> asl-text-<?php echo $all_configs['font_color_scheme'] ?>">
    <div class="container">
        <div id="asl-panel" class="row">
            <div class="asl-overlay" id="map-loading">
              <div class="white"></div>
              <div class="sl-loading"><img style="margin-right: 10px;" class="loader" src="<?php echo ASL_URL_PATH ?>public/Logo/loading.gif"><?php echo __('Loading...', 'asl_locator') ?></div>
            </div>
            <div class="asl-panel-inner col-12">
                <div class="asl-filter-sec">
                    <div class="asl-search-cont">
                        <div class="asl-search-inner">
                            <div class="row no-gutters">
                                <div class="col-md-5 col-sm-6">
                                    <div class="form-group asl-addr-search">
                                        <input id="sl-main-search" type="text" class="form-control asl-search-address rounded-left" placeholder="<?php echo __( 'Search your Location','asl_locator') ?>">
                                        <a title="Current Location" class="sl-geo-btn asl-geo">
                                            <svg width="20px" height="20px" viewBox="0 0 561 561" fill="#FFF">
                                                <path d="M280.5,178.5c-56.1,0-102,45.9-102,102c0,56.1,45.9,102,102,102c56.1,0,102-45.9,102-102 C382.5,224.4,336.6,178.5,280.5,178.5z M507.45,255C494.7,147.9,410.55,63.75,306,53.55V0h-51v53.55 C147.9,63.75,63.75,147.9,53.55,255H0v51h53.55C66.3,413.1,150.45,497.25,255,507.45V561h51v-53.55 C413.1,494.7,497.25,410.55,507.45,306H561v-51H507.45z M280.5,459C181.05,459,102,379.95,102,280.5S181.05,102,280.5,102 S459,181.05,459,280.5S379.95,459,280.5,459z"></path>
                                            </svg>
                                        </a>
                                    </div> 
                                </div>
                                <div class="col-md-7 col-sm-6">
                                    <div class="form-group">
                                        <select multiple="multiple" class="asl-select-ctrl form-control rounded-left">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="asl-sort-list">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if(isset($all_attributes['brand']) && count($all_attributes['brand'])): ?>
                                    <div class="asl-sort-left">
                                        <ul class="asl-tab-filters">
                                            <?php foreach ($all_attributes['brand'] as $brand): ?>
                                            <li><a class="sl-tab-opt" data-id="<?php echo $brand->id ?>"><?php echo $brand->name; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3 sl-dist-cont"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="asl-sort-right">
                                            <label><?php echo __( 'Sort by:','asl_locator') ?></label>
                                            <select class="sl-sort-by form-control">
                                                <option value=""><?php echo __( 'Distance','asl_locator') ?></option>
                                                <option value="title" selected=""><?php echo __( 'Title','asl_locator') ?></option>
                                                <option value="city"><?php echo __( 'Cities','asl_locator') ?></option>
                                                <option value="state"><?php echo __( 'States','asl_locator') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="asl-list-cont">
                    <ul class="sl-list">
                    </ul>
                    <div class="row">
                        <div class="col-12">
                            <div class="sl-pagination nav mb-2 justify-content-center text-center">
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
////*SCRIPT TAGS STARTS FROM HERE:: FROM EVERY THING BELOW THIS LINE:: VARIALBLE LIMIT IS NOT SUPPORTING LONGER HTML*////
if($atts['no_script'] == 0):
?>
<script id="tmpl_list_item" type="text/x-jsrender">
    <li class="sl-item" data-id="{{:id}}">
        <div class="sl-item-top">
            <div class="sl-item-top-left">
                {{if path}}
                <div class="asl-logo-box">
                    <img src="<?php echo ASL_UPLOAD_URL ?>Logo/{{:path}}" alt="logo" class="img-fluid">
                </div>
                {{/if}}
                <div class="asl-item-box">
                    <h2>
                        <a>{{:title}}</a>
                        {{if dist_str}}<span>{{:dist_str}}</span>{{/if}}
                    </h2>
                    {{if categories}}
                        <div class="sl-cat-tag">
                            <ul>
                            {{for categories}}
                                <li>{{:name}}</li>
                            {{/for}}
                            </ul>
                        </div>
                    {{/if}}
                    <div class="addr-loc">
                        <ul>
                            <li>
                                <span>{{:address}}</span>
                            </li>
                            {{if phone}}
                            <li>
                                <i class="icon-mobile-1"></i>
                                <a href="tel:{{:phone}}">{{:phone}}</a>
                            </li>
                            {{/if}}
                            {{if email}}
                            <li>
                                <i class="icon-mail"></i>
                                <a href="mailto:{{:email}}">{{:email}}</a>
                            </li>
                            {{/if}}
                            {{if open_hours}}
                            <li>
                                <i class="icon-clock"></i>
                                <span class="txt-hours">{{:open_hours}}</span>
                            </li>
                            {{/if}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sl-item-top-right">
                <ul>
                    <li><a class="s-direction"><?php echo __( 'Get Direction','asl_locator') ?></a></li>
                    {{if website}}
                        <li><a href="{{:website}}" class="web-btn"><?php echo __( 'Booking URL','asl_locator') ?></a></li>
                    {{/if}}
                </ul>
            </div>
        </div>
        {{if description}}
        <div class="sl-item-desc">
            <p>{{:description}}</p>
        </div>
        {{/if}}
    </li>
    
</script>   
<?php endif; ?>
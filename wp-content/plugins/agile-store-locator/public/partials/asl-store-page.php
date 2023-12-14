<?php


 
$locality = implode(', ', array($store_data->city, $store_data->state, $store_data->postal_code, $store_data->country));
$address  = [$store_data->street, $locality];
$address  = urlencode(trim(implode($address, ', ')));



if(isset($atts['coords_direction'])) {

    $address = $store_data->lat.','.$store_data->lng;
    $address = urlencode(trim($address));
}

$direction_url = "https://www.google.com/maps/dir/?api=1&destination=".$address;

?>
<section class="asl-cont">
    <div class="container">
        <div class="row mt-3">
            <?php if($store_data->path): ?>
            <div class="col-md-3">
                <img src="<?php echo ASL_UPLOAD_URL ?>Logo/<?php echo $store_data->path ?>" alt="<?php echo $store_data->title; ?>" class="sl-logo img-thumbnail">
            </div>
            <?php endif; ?>
            <div class="<?php if(!$store_data->path):?> col-md-offset-3 <?php endif; ?>col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-xs-12 mb-3 col-sm-8">
                            <h2 class="sl-store-title mb-3"><?php echo $store_data->title; ?></h2>
                            <div class="sl-address">
                                <div class="sl-store-info">
                                    <i class="icon-address-card-o"></i>
                                    <h6><?php echo $locality ?></h6>
                                    <p><?php echo $store_data->street ?></p>
                                </div>
                                <?php if($store_data->phone): ?>
                                <div class="sl-store-info">
                                    <i class="icon-mobile-1"></i>
                                    <p><a href="tel:<?php echo $store_data->phone ?>"><?php echo $store_data->phone ?></a></p>
                                </div>
                                <?php endif; ?>
                                <?php if($store_data->email): ?>
                                <div class="sl-store-info">
                                    <i class="icon-mail"></i>
                                    <p><a href="mailto:<?php echo $store_data->email ?>"><?php echo $store_data->email ?></a></p>
                                </div>
                                <?php endif; ?>
                                <?php if($store_data->open_hours): ?>
                                <div class="sl-store-info">
                                    <i class="icon-clock"></i>
                                    <div class="sl-timings"><?php echo $store_data->open_hours ?></div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class=col-md-12>
                        <?php if($store_data->description): ?>
                            <p class="sl-desc"><?php echo $store_data->description ?></p>
                        <?php endif; ?>
                        <?php if($store_data->description_2): ?>
                            <p class="sl-desc"><?php echo $store_data->description_2 ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?php echo $direction_url ?>" target="_blank" class="btn btn-info text-white btn-block"><?php echo __('Direction','asl_locator') ?></a>
                            </div>
                            <?php if($store_data->website): ?>
                            <div class="col-md-3">
                                <a target="_blank" href="<?php echo $store_data->website ?>" class="btn btn-success text-white btn-block"><?php echo __('Website','asl_locator') ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>                 
            </div>
        </div>
    </div>
</section>
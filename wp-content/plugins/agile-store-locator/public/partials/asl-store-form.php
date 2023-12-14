<?php

$default_country = (isset($all_configs['default_country']))? $all_configs['default_country']: 'null';

?>
<section class="asl-cont">
  <div class="container">
      <div class="row">
          <!-- Section Titile -->
          <div class="col-md-12">
              <h1 class="section-title"><?php echo __( 'Register your Store!','asl_locator') ?></h1>
              <p><?php echo __( 'Fill up the form of your Store to register it for the approval by the administrator and it will list down in the Store Locator listing.','asl_locator') ?></p>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div id="sl-frm" class="asl-form row">
                  <div class="col-md-12">
                      <h3 class="sl-sub-title"><?php echo __( 'STORE INFORMATION','asl_locator') ?></h3>
                  </div>
                  <!-- Name -->
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-title"><?php echo __( 'Company','asl_locator') ?></label>
                          <input class="form-control" id="sl-title" type="text" maxlength="255" name="title">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-description"><?php echo __( 'Name','asl_locator') ?></label>
                          <input class="form-control" id="sl-description" type="text" maxlength="255" name="description" required>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-website"><?php echo __( 'Website URL','asl_locator') ?></label>
                          <input class="form-control" id="sl-website" type="text" maxlength="255" name="website">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-phone"><?php echo __( 'Phone','asl_locator') ?></label>
                          <input class="form-control" id="sl-phone" type="text" maxlength="255" name="phone">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-fax"><?php echo __( 'Fax','asl_locator') ?></label>
                          <input class="form-control" id="sl-fax" type="text" maxlength="255" name="fax">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-email"><?php echo __( 'Email','asl_locator') ?></label>
                          <input class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="sl-email" type="text" maxlength="255" name="email">
                          <div class="help-block with-errors"><?php echo __( 'Enter correct email address','asl_locator') ?></div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <h3 class="sl-sub-title"><?php echo __( 'ADDRESS LOCATION','asl_locator') ?></h3>
                  </div>
                  <div id="sl-grp-street" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-street"><?php echo __( 'Street','asl_locator') ?></label>
                          <input class="form-control" id="sl-street" type="text" maxlength="255" name="street">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-city" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-city"><?php echo __( 'City','asl_locator') ?></label>
                          <input class="form-control" id="sl-city" type="text" maxlength="255" required name="city">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-state" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-state"><?php echo __( 'State','asl_locator') ?></label>
                          <input class="form-control" id="sl-state" type="text" maxlength="255" name="state">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-postal_code" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-postal_code"><?php echo __( 'Postal Code','asl_locator') ?></label>
                          <input class="form-control" id="sl-postal_code" type="text" maxlength="255" required name="postal_code">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-country" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-country"><?php echo __( 'Country','asl_locator') ?></label>
                          <select class="form-control custom-select" id="sl-country" required name="country">
                            <option value=""><?php echo __( 'Select Country','asl_locator') ?></option>
                            <?php foreach($countries as $country): ?>
                            <option <?php if($default_country && $default_country == $country->id) echo 'selected' ?> value="<?php echo $country->id ?>"><?php echo $country->country ?></option>
                            <?php endforeach ?>
                          </select>
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-lat" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-lat"><?php echo __( 'Latitude','asl_locator') ?></label>
                          <input class="form-control" id="sl-lat" type="text" maxlength="255" name="lat">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-lng" class="col-md-6">
                      <div class="form-group sl-group">
                          <label class="control-label" for="sl-lng"><?php echo __( 'Longitude','asl_locator') ?></label>
                          <input class="form-control" id="sl-lng" type="text" maxlength="255" name="lng">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div id="sl-grp-desc" class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="sl-sub-title"><?php echo __( 'Description','asl_locator') ?></h3>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group sl-group">
                              <label for="sl-description_2" class="control-label"><?php echo __( 'Additional Description','asl_locator') ?></label>
                              <textarea class="form-control" rows="3" id="sl-description_2"  name="description_2"></textarea>
                              <div class="help-block with-errors"></div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" value="" id="sl-agr-check" required>
                        <label class="custom-control-label" for="sl-agr-check">
                          <?php echo __( 'I agree to terms and conditions and all the provided information is correct','asl_locator') ?>
                        </label>
                        <div class="invalid-feedback">
                          <?php echo __( 'Please agree to register for store in the listing.','asl_locator') ?></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group mt-3">
                          <a class="btn btn-default btn-primary disabled" id="sl-btn-save"><?php echo __( 'Register','asl_locator') ?></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
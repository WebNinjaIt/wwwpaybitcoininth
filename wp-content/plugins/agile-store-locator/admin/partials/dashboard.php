<!-- Container -->
<div class="asl-p-cont asl-new-bg">
  <div class="hide">
    <svg xmlns="http://www.w3.org/2000/svg">
      <symbol id="i-cart" viewBox="0 0 32 32" width="40" height="40" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" />
          <circle cx="25" cy="27" r="2" />
          <circle cx="12" cy="27" r="2" />
      </symbol>
      <symbol id="i-tag" viewBox="0 0 32 32" width="40" height="40" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <circle cx="24" cy="8" r="2" />
        <path d="M2 18 L18 2 30 2 30 14 14 30 Z" />
      </symbol>
      <symbol id="i-location" viewBox="0 0 32 32" width="40" height="40" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <circle cx="16" cy="11" r="4" />
          <path d="M24 15 C21 22 16 30 16 30 16 30 11 22 8 15 5 8 10 2 16 2 22 2 27 8 24 15 Z" />
      </symbol>
      <symbol id="i-search" viewBox="0 0 32 32" width="40" height="40" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <circle cx="14" cy="14" r="12" />
          <path d="M23 23 L30 30"  />
      </symbol>
    </svg>
  </div>
  <div class="container">
    <div class="row asl-inner-cont">
      <div class="col-md-12">
        <div class="card p-0 mb-4">
          <h3 class="card-title"><?php echo __('Agile Store Locator Dashboard','asl_admin') ?></h3>
          <div class="card-body">
            <div class="alert alert-secondary" role="alert">
              <?php echo __('Please make sure to backup your Store Locator Template file if you have customized them to avoid getting removed by the updates.','asl_admin') ?>
              <button id="sl-btn-tmpl-backup" type="button" class="ml-md-2 btn btn-sm btn-success"><?php echo __('Backup Template','asl_admin') ?></button>
              <button id="sl-btn-tmpl-remove" type="button" class="btn btn-sm btn-danger float-md-right"><?php echo __('Remove Existing Template','asl_admin') ?></button>
            </div>
            <div class="alert alert-info" role="alert">
              <a target="_blank" href="https://agilestorelocator.com/wiki/"><?php echo __('Please visit the documentation page for help','asl_admin') ?></a>, <?php echo __('for support mail us at support@agilelogix.com','asl_admin') ?> 
            </div>
            <?php if(!$all_configs['api_key']): ?>
                <h3  class="alert alert-danger" style="font-size: 14px"><?php echo __('Google API KEY is missing, the Map Search and Direction will not work without it, Please add Google API KEY.','asl_admin') ?> <a href="https://agilestorelocator.com/blog/enable-google-maps-api-agile-store-locator-plugin/" target="_blank">How to Add API Key?</a></h3>
            <?php endif; ?>
            <h3 class="alert alert-warning" style="width:100%;font-size: 14px"><span style="margin-right: 10px"><?php echo __('Backup My Logo, Custom Markers, and Category Icons.','asl_admin') ?> </span>
            <a class="mr-2 btn btn-sm btn-dark" style="color: #FFF" id="btn-assets-backup"><?php echo __('Backup Assets','asl_admin') ?></a>
            <a class="mr-2 btn btn-primary btn-sm hide" id="lnk-assets-download" target="_blank"><?php echo __('Download Link','asl_admin') ?></a>
            <button type="button" class="btn btn-sm btn-secondary" data-toggle="smodal" data-target="#import_assets_model"><?php echo __('Import Assets Zip','asl_admin') ?></button>
            <button title="<?php echo __('Migrate the assets from previous version','asl_admin') ?>" type="button" class="btn btn-sm btn-success float-md-right" data-loading-text="<?php echo __('Migrating ...','asl_admin') ?>" id="btn-migrate-assets" ><?php echo __('Migrate Assets','asl_admin') ?></button>
            </h3>
            <div class="dashboard-area">
              <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-3 stats-store">
                        <div class="stats">
                            <div class="stats-a"><svg width="40" height="40"><use xlink:href="#i-cart"></use></svg></div>
                            <div class="stats-b" title="<?php echo __('Stores','asl_admin') ?>"><?php echo $all_stats['stores'] ?></div>
                        </div>
                      </div>
                      <div class="col-md-3 stats-category">
                        <div class="stats">
                            <div class="stats-a"><svg width="40" height="40"><use xlink:href="#i-tag"></use></svg></div>
                            <div class="stats-b" title="<?php echo __('Categories','asl_admin') ?>"><?php echo $all_stats['categories'] ?></div>
                        </div>
                      </div>
                      <div class="col-md-3 stats-marker">
                        <div class="stats">
                            <div class="stats-a"><svg width="40" height="40"><use xlink:href="#i-location"></use></svg></div>
                            <div class="stats-b" title="<?php echo __('Markers','asl_admin') ?>"><?php echo $all_stats['markers'] ?></div>
                        </div>
                      </div>
                      <div class="col-md-3 stats-searches">
                        <div class="stats">
                            <div class="stats-a"><svg width="40" height="40"><use xlink:href="#i-search"></use></svg></div>
                            <div class="stats-b" title="<?php echo __('Searches','asl_admin') ?>"><?php echo $all_stats['searches'] ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row"></div>
              <ul class="nav nav-tabs" style="margin-top:30px">
                <li role="presentation" class="nav-item active"><a class="nav-link" href="#asl-analytics">Analytics</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="#asl-views"><?php echo __('Top Views','asl_admin') ?></a></li>
              </ul>
              <div class="tab-content" id="asl-tabs">
                
                <div class="tab-pane active" role="tabpanel" id="asl-analytics" aria-labelledby="asl-analytics">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label class="mr-2" for="asl-search-month"><?php echo __('Period','asl_admin') ?></label>
                        <select id="asl-search-month" class="custom-select" style="width:70%">
                          <?php 
                          for ($i=0; $i<=12; $i++) { 
                            echo '<option value="'.date('m-Y', strtotime("-$i month")).'">'.date('m/Y', strtotime("-$i month")).'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="canvas-holder" style="width:100%">
                          <canvas id="asl_search_canvas" style="width:300px;height:400px"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" role="tabpanel" id="asl-views" aria-labelledby="asl-views">
                  <div class="row justify-content-between">
                    <div class="col-md-4 form-group mb-3">
                      <div class="form-group">
                        <label class="mr-2" for="asl-search-view"><?php echo __('Period','asl_admin') ?></label>
                        <select id="asl-search-view" class="custom-select" style="width:70%">
                          <?php 
                          for ($i=0; $i<=12; $i++) { 
                            echo '<option value="'.date('m-Y', strtotime("-$i month")).'">'.date('m/Y', strtotime("-$i month")).'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label class="mr-2" for="asl-search-len"><?php echo __('Rows','asl_admin') ?></label>
                        <select id="asl-search-len" class="custom-select" style="width: 70%">
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="0">ALL</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12"> 
                      <ul class="list-group" id="asl-stores-view">
                        <li class="list-group-item active">
                          <div class="row">
                            <div class="col-2"><?php echo __('Store ID','asl_admin') ?></div>
                            <div class="col-8"><?php echo __('Most Views Stores List','asl_admin') ?></div>
                            <div class="col-2"><?php echo __('Views','asl_admin') ?></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12"> 
                      <ul class="list-group" id="asl-searches-view">
                        <li class="list-group-item active">
                          <div class="row">
                            <div class="col-8"><?php echo __('Most Search Locations','asl_admin') ?></div>
                            <div class="col-4"><?php echo __('Views','asl_admin') ?></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

              </div>  
            </div>
            <div class="dump-message asl-dumper"></div>
          </div>
        </div>
      </div>  
    </div>
  </div>

  <div class="smodal fade" id="import_assets_model" role="dialog">
    <div class="smodal-dialog" role="document">
      <div class="smodal-content">
        <div class="smodal-header">
          <h5 class="smodal-title"><?php echo __('Update Logo','asl_admin') ?></h5>
          <button type="button" class="close" data-dismiss="smodal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="smodal-body">
          <form id="import_assets_file" name="import_assets_file">
            <div class="row">
              <div class="col-md-12 form-group mb-3">
                <div class="input-group" id="drop-zone">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo __('Zip','asl_admin') ?></span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" accept=".zip" name="files" id="file-zip-1" />
                    <label  class="custom-file-label" for="file-zip-1"><?php echo __('File Path...','asl_admin') ?></label>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group mb-3">
                <div class="progress hideelement" style="display:none" id="progress_bar_">
                      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        <span style="position:relative" class="sr-only">0% Complete</span>
                      </div>
                    </div>
              </div>
              <ul></ul>
              <p id="message_upload" class="alert alert-warning hide"></p>
              <div class="col-md-12 form-group mb-3">
                <button class="btn btn-primary btn-start float-right" type="button" data-loading-text="<?php echo __('Submitting ...','asl_admin') ?>"><?php echo __('Upload File','asl_admin') ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- asl-cont end-->


<!-- SCRIPTS -->
<script type="text/javascript">
var ASL_Instance = {
	url: '<?php echo ASL_UPLOAD_URL ?>'
};
window.addEventListener("load", function() {
asl_engine.pages.dashboard();
});
</script>
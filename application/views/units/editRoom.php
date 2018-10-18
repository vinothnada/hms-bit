<main id="main-container" style="min-height: 556px;">
    <div class="content content-boxed">
 
            <div class="col-lg-12">
                <!-- Material Register -->
                <div class="block block-themed">
                    <div class="block-header bg-primary">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Update Room</h3>
                    </div>
                <div class="block-content">
                    <form class="js-validation-form form-horizontal push-10-t push-10"
                    action="<?=site_url("units/editRoom")?>" method="post">
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">                          
                              <input class="form-control" type="text" id="roomno" readonly="readonly"
                                     name="roomno" value="<?= $roommaster[0]->roomno;?>">
                              <label for="roomno">Room Number</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="roomtype"
                                      name="roomtype">
                              <?php foreach ($roomtypes as $list) { ?>
                                  <option value="<?= $list->id?>" <?php if ($roommaster[0]->roomtype == $list->id){ echo "selected = 'selected'"; }?>><?= $list->type?></option>
                              <?php }?>
                              </select> <label for="roomtype">Room Type</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="floortype"
                                      name="floortype">
                              <?php foreach ($floortypes as $list) { ?>
                                  <option value="<?= $list->id?>" <?php if ($roommaster[0]->floortype == $list->id){ echo "selected = 'selected'"; }?>><?= $list->name?></option>
                              <?php }?>
                              </select> <label for="floortype">Floor</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="toilet"
                                      name="toilet">
                                  <option value="English" <?php if ($roommaster[0]->toilet == "English"){ echo "selected = 'selected'"; }?>>English</option>
                                  <option value="Others" <?php if ($roommaster[0]->toilet == "Others"){ echo "selected = 'selected'"; }?>>Others</option>
                              </select> <label for="toilet">Toilet</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                        <div class="form-material">
                            <select class="form-control" id="availibility"
                                    name="availibility">
                                <option value="Available" <?php if ($roommaster[0]->availibility == "Available"){ echo "selected = 'selected'"; }?>>Available</option>
                                <option value="Maintanance" <?php if ($roommaster[0]->availibility == "Maintanance"){ echo "selected = 'selected'"; }?>>Maintanance</option>
                                <option value="Occupied" <?php if ($roommaster[0]->availibility == "Occupied"){ echo "selected = 'selected'"; }?>>Occupied</option>
                                <option value="Housekeeping" <?php if ($roommaster[0]->availibility == "Housekeeping"){ echo "selected = 'selected'"; }?>>Housekeeping</option>
                            </select> <label for="availibility">Status</label>
                        </div>
                        </div>
                  </div>
                      <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $roommaster[0]->id;?>">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-plus push-5-r"></i> Update
                            </button>                            
                        </div>
                    </div>                    
                  </form>                                                        
                </div>
                </div>
                <!-- END Material Register -->
            </div>
        </div>
    </div>
</main>

<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_addRooms.js"></script>

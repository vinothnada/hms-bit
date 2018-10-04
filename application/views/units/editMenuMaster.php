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
                        <h3 class="block-title">Update Menu Category</h3>
                    </div>
                    <div class="block-content">                                            
                            <form class="js-validation-form form-horizontal push-10-t push-10"
                                action="<?=site_url("units/editMenuMaster")?>" method="post">
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">
                              <input class="form-control" type="text" id="itemname"
                                    name="itemname" value="<?= $menumaster[0]->itemname;?>">
                              <label for="itemname">Item Name</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <input class="form-control" type="text" id="rate"
                                     name="rate" value="<?= $menumaster[0]->rate;?>">
                              <label for="rate">Rate</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="itemcat"
                                      name="itemcat">
                              <?php foreach ($menucategory as $list) { ?>
                                      <?php if ($list->id == $menumaster[0]->itemcat ) { ?>
                                          <option value="<?= $list->id?>" selected ="selected"><?= $list->name?></option>
                                      <?php }else{?>
                                          <option value="<?= $list->id?>"><?= $list->name?></option>
                                      <?php } ?>
                              <?php }?>
                              </select> <label for="itemcat">Category</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="itemunit"
                                      name="itemunit">
                              <?php foreach ($menuunit as $list) { ?>
                                      <?php if ($list->id == $menumaster[0]->itemunit ) { ?>
                                          <option value="<?= $list->id?>" selected ="selected"><?= $list->name?></option>
                                      <?php }else{?>
                                          <option value="<?= $list->id?>"><?= $list->name?></option>
                                      <?php } ?>
                              <?php }?>
                              </select> <label for="itemunit">Unit</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <select class="form-control" id="status"
                                        name="status">
                                            <option value="Active"
                                            <?php if ($menumaster[0]->status == 'Active') { echo "selected = 'selected'";} ?>
                                             >Active</option>
                                            <option value="Blocked"
                                            <?php if ($menumaster[0]->status == 'Blocked') { echo "selected = 'selected'";} ?>
                                            >Blocked</option>
                                </select> <label for="Status">Status</label>
                            </div>
                        </div>
                  </div>  
                                <div class="modal-footer">
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                    <input type="hidden" name="id" value="<?= $menucategory[0]->id;?>">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-plus push-5-r"></i> Update
                                        </button>
                                    </div>
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
<script src="<?= base_url(); ?>assets/js/custom/base_pages_roomtypes.js"></script>

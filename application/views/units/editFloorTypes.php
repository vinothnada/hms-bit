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
                        <h3 class="block-title">Update Floors</h3>
                    </div>
                    <div class="block-content">                                            
                            <form class="js-validation-form form-horizontal push-10-t push-10"
                                action="<?=site_url("units/editFloortypes")?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="name"
                                               name="name" value="<?= $floorinfo[0]->name;?>">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="building"
                                               name="building" value="<?= $floorinfo[0]->building;?>" >
                                        <label for="building">Building</label>
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                    <input type="hidden" name="id" value="<?= $floorinfo[0]->id;?>">
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

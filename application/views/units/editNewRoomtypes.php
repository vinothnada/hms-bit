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
                        <h3 class="block-title">Update Room types</h3>
                    </div>
                    <div class="block-content">                                            
                        <form class="js-validation-form form-horizontal push-10-t push-10"
                                action="<?=site_url("units/editNewRoomtypes")?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="type"
                                               name="type" placeholder="Please fill type" value="<?= $roomtypeinfo[0]->type;?>">
                                        <label for="type">Type</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="tariff"
                                               name="tariff" placeholder="Please fill tariff" value="<?= $roomtypeinfo[0]->tariff;?>">
                                        <label for="tariff">Tariff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="status"
                                                name="status">
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disabled</option>
                                        </select> <label for="Status">Status</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="remarks"
                                               name="remarks" value="<?= $roomtypeinfo[0]->remarks;?>">
                                        <label for="remarks">remarks</label>
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                    <input type="hidden" name="id" value="<?= $roomtypeinfo[0]->id;?>">
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

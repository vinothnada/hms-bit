<main id="main-container" style="min-height: 556px;">
    <div class="content content-boxed">
        <div class="row">
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
                        <h3 class="block-title">Update User details</h3>
                    </div>
                    <div class="block-content">                                            
                        <form class="js-validation-form form-horizontal push-10-t push-10"
                                action="<?=site_url("sadmin/editUser")?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="empid" value="LA<?=$userInfo[0]->empid;?>"
                                               name="empid" readonly='readonly'>
                                        <label for="empid">Employee Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="department"
                                                name="department">
                                        <?php foreach ($deptlist as $list) { ?>
                                            <option value="<?= $list->deptid?>"  
                                            <?php if ($userInfo[0]->department == $list->deptid){ echo "selected = 'selected'"; }?>>
                                            <?= $list->deptname?></option>
                                        <?php }?>
                                        </select> <label for="department">Department</label>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="role"
                                                name="role">
                                        <?php foreach ($rolelist as $list) { ?>
                                            <option value="<?= $list->role_id?>"  
                                            <?php if ($userInfo[0]->role == $list->role_id){ echo "selected = 'selected'"; }?>>
                                            <?= $list->role_name?></option>
                                        <?php }?>
                                        </select> <label for="role">User Role</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="name"
                                               name="name" value="<?= $userInfo[0]->name;?>">
                                        <label for="name">Employee Name</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="tp"
                                               name="tp" value="<?= $userInfo[0]->tp;?>">
                                        <label for="tp">Telephone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="Status"
                                                name="Status">
                                            <option value="1">Active</option>
                                            <option value="0">Disabled</option>
                                        </select> <label for="Status">Status</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="notes"
                                               name="notes" value="<?= $userInfo[0]->notes;?>">
                                        <label for="notes">Notes</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="hidden" id="Created"
                                               name="Created" value="<?= $this->session->userdata('logged_user'); ?>">
                                    </div>  
                                </div>                                
                            </div>                                                        
                                <div class="modal-footer">
                                    <div class="form-group">
                                    <div class="col-xs-12">
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

    <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom/base_pages_allusers.js"></script>
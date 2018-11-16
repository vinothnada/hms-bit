<!-- Main Container -->
<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h4>
                    Users List
                </h4>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <!-- Page Content -->
    <div class="content">
        <!-- Title links -->
        <div class="content content-boxed">
            <?php if ($this->session->userdata('error')) { ?>       
            <div class="alert alert-danger"><strong>Error!</strong> <?php echo $this->session->userdata('error'); ?> </div>
            <?php $this->session->unset_userdata('error');
        }
        ?>
        <?php if ($this->session->userdata('success')) { ?>      
        <div class="alert alert-success"><strong>Success!</strong> <?php echo $this->session->userdata('success'); ?> </div>
        <?php $this->session->unset_userdata('success');
    }
    ?>     
    <!-- Quick links -->
    <div class="row">
        <div class="col-sm-6 col-md-3" data-toggle="modal" data-target="#modal-popin-adduser">
            <a class="block block-link-hover3 text-center"
            href="#">
            <div class="block-content block-content-full">
                <div class="h1 font-w700 text-info">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Add New User</div>
        </a>                    
    </div>
    <div class="col-sm-6 col-md-3">
        <a class="block block-link-hover3 text-center"
        href="javascript:void(0)">
        <div class="block-content block-content-full">
            <div class="h1 font-w700 text-success" data-toggle="countTo" data-to="<?= $activeusers ?>">                                
            </div>
        </div>
        <div
        class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Active</div>
    </a>
</div>
<div class="col-sm-6 col-md-3">
    <a class="block block-link-hover3 text-center"
    href="javascript:void(0)">
    <div class="block-content block-content-full">
        <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="<?= $allusers-$activeusers?>"><?= $activeusers ?></div>
    </div>
    <div
    class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Blocked</div>
</a>
</div>
<div class="col-sm-6 col-md-3">
    <a class="block block-link-hover3 text-center"
    href="javascript:void(0)">
    <div class="block-content block-content-full">
        <div class="h1 font-w700" data-toggle="countTo" data-to="<?= $allusers ?>"></div>
    </div>
    <div
    class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All
    Users</div>
</a>
</div>
</div>
</div>
<!-- Users List -->
<?php $this->session->set_userdata('emplist',$employees); ?>
<div class="col-xs-12">
    <br>
    <a href="<?= site_url("reports/exportUsers") ?>"><button class="btn btn-sm btn-danger pull-right" type="button" id="cid" ><i class="fa fa-file-pdf-o"></i>&nbsp; Export CSV</button></a>
</div>
<div class="block">
    <div class="block-header">
    </div>
    <div class="block-content">
        <table class="table table-bordered table-striped js-dataTable-full">
            <thead>
                <tr>
                    <th>Emp Id</th>
                    <th>Employee Name</th>
                    <th>Telephone</th>
                    <th>Department</th>
                    <th>Assigned Role</th>
                    <th class="text-center" style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $items) { ?>
                <tr>
                    <td>LBA<?= $items->empid; ?></td>
                    <td><a href="#"><?= $items->name; ?></a></td>
                    <td><?= $items->tp; ?></td>
                    <td><?= $items->deptname; ?></td>
                    <td><?= $items->role_name; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="<?= site_url("sadmin/editUser?id=$items->empid") ?>">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button>
                            </a> 
                            <a href="<?= site_url("sadmin/deleteUser?id=$items->empid") ?>">
                                <button class="btn btn-xs btn-default" type="button" onClick="return confirm('Are You Sure to Delete?')" data-toggle="tooltip" title="Remove" ><i class="fa fa-times"></i></button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>  
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Simple -->
</div>
<!-- END Page Content -->
</main>

<!-- Pop In Modal - user -->
<div class="modal fade" id="modal-popin-adduser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Add New user</h3>
                </div>
                <div class="block-content">
                    <form class="js-validation-form form-horizontal push-10-t push-10"
                    action="<?=site_url("sadmin/addNewuser")?>" method="post">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input class="form-control" type="text" id="empid" value="LA<?=$emplist[0]->empid + 1;?>"
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
                                <option value="">Please Select</option>
                                <?php foreach ($deptlist as $list) { ?>
                                <option value="<?= $list->deptid?>"><?= $list->deptname?></option>
                                <?php }?>
                            </select> <label for="department">Department</label>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-material">
                            <select class="form-control" id="role"
                            name="role">
                            <option value="">Please Select</option>
                            <?php foreach ($rolelist as $list) { ?>
                            <option value="<?= $list->role_id?>"><?= $list->role_name?></option>
                            <?php }?>
                        </select> <label for="role">User Role</label>
                    </div>
                </div>
            </div>                            
            <div class="form-group">
                <div class="col-xs-6">
                    <div class="form-material">
                        <input class="form-control" type="text" id="name"
                        name="name" placeholder="Please fill name">
                        <label for="name">Employee Name</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-material">
                        <input class="form-control" type="text" id="tp"
                        name="tp" placeholder="home/mobile">
                        <label for="tp">Telephone</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <div class="form-material">
                        <select class="form-control" id="Status"
                        name="Status">
                        <option value="">Please Select</option>
                        <option value="1">Active</option>
                        <option value="0">Disabled</option>
                    </select> <label for="Status">Status</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-material">
                    <input class="form-control" type="text" id="notes"
                    name="notes" placeholder="Referance">
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
                        <i class="fa fa-plus push-5-r"></i> Create
                    </button>
                </div>
            </div>
        </div>                                                                  
    </form>
</div>
</div>
</div>
</div>
</div>
<!-- END Pop In Modal -->

<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_allusers.js"></script>
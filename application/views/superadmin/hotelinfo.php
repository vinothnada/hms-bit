<main id="main-container" style="min-height: 556px;">
    <div class="content content-boxed">
        <div class="row">
        <div class="col-lg-12">

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
                <h3 class="block-title">Hotel Information</h3>
            </div>
            <div class="block-content">                                            
                <form class="js-validation-form form-horizontal push-10-t push-10"
                action="<?=site_url("sadmin/hotelInfoEdit")?>" method="post">
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="slogan"
                            name="slogan" value="<?= $hinfo[0]->slogan;?>">
                            <label for="slogan">Slogan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="name"
                            name="name" placeholder="Please fill name" value="<?= $hinfo[0]->name;?>">
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="address1"
                            name="address1" placeholder="Please fill address1" value="<?= $hinfo[0]->address1;?>">
                            <label for="address1">Address1</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="address2"
                            name="address2" placeholder="Please fill address2" value="<?= $hinfo[0]->address2;?>">
                            <label for="address2">Address2</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="address3"
                            name="address3" placeholder="Please fill address3" value="<?= $hinfo[0]->address3;?>">
                            <label for="address3">Address3</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="phone"
                            name="phone" placeholder="Please fill phone" value="<?= $hinfo[0]->phone;?>">
                            <label for="phone">Phone</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="email"
                            name="email" placeholder="Please fill email" value="<?= $hinfo[0]->email;?>">
                            <label for="email">Email</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="fax"
                            name="fax" placeholder="Please fill fax" value="<?= $hinfo[0]->fax;?>">
                            <label for="fax">Fax</label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-material">
                            <input class="form-control" type="text" id="mobile"
                            name="mobile" placeholder="Please fill mobile" value="<?= $hinfo[0]->mobile;?>">
                            <label for="mobile">Mobile</label>
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
<script src="<?= base_url(); ?>assets/js/custom/base_pages_hotelinfo.js"></script>

<main id="main-container" style="min-height: 556px;">
    <div class="content content-boxed">
 
                        <div class="col-xs-12">
                            <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button"><i class="si si-settings"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Edit Table</h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                    <form class="js-validation-form form-horizontal push-10-t push-10" action="<?=site_url("bar/editTableMaster")?>"  method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="tblnum" name="tblnum" placeholder="Type the Table Number" value="<?= $tabelInfo[0]->tblnum;?>">
                                                    <label for="tblnum">Table Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <select class="form-control" id="seats"
                                                            name="seats">
                                                        <option value="<?= $tabelInfo[0]->seats;?>"><?= $tabelInfo[0]->seats;?></option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="8">8</option>
                                                        <option value="10">10</option>
                                                    </select> <label for="seats">Seats</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <select class="form-control" id="status"
                                                            name="status">
                                            <option value="Active"
                                            <?php if ($tabelInfo[0]->status == 'Active') { echo "selected = 'selected'";} ?>
                                             >Active</option>
                                            <option value="Blocked"
                                            <?php if ($tabelInfo[0]->status == 'Blocked') { echo "selected = 'selected'";} ?>
                                            >Blocked</option>

                                                    </select> <label for="status">Status</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="cat" name="cat" value="Bar" readonly="readonly">
                                                    <label for="cat">Adding to</label>
                                                </div>
                                                <input class="form-control" type="hidden" id="id" name="id" value="<?=$tabelInfo[0]->id?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Material Forms Validation -->
                        </div>
        </div>
    </div>
</main>


<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_addNewTable.js"></script>



 <main id="main-container">
     <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Messages 
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Home</li>
                    <li><a class="link-effect" href="">Messages</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
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


    <?php 

    $countAllNewMessages = 0;
    foreach ($messages as $key) {
        if ($key->status == "New") {
            $countAllNewMessages += 1;
        }
    }

    $countSentNewMessages = 0;
    foreach ($sentmsgs as $key) {
        if ($key->status == "New") {
            $countSentNewMessages += 1;
        }
    }

    $countCheckouNewMessages = 0;
    foreach ($messages as $key) {
        if ($key->status == "Pending") {
            $countCheckouNewMessages += 1;
        }
    } 

    $countOfNewPr = 0;
    foreach ($prrequests as $key) {
        if ($key->status == "Pending") {
            $countOfNewPr += 1;
        }
    }            

     ?>      
        <div class="row">
            <div class="col-sm-5 col-lg-3">
                <!-- Collapsible Inbox Navigation (using Bootstrap collapse functionality) -->
                <button class="btn btn-block btn-primary visible-xs push" data-toggle="collapse" data-target="#inbox-nav" type="button">Navigation</button>
                <div class="collapse navbar-collapse remove-padding" id="inbox-nav">
                    <!-- Inbox Menu -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <ul class="block-options">
                                <li>
                                    <button data-toggle="modal" data-target="#modal-compose" type="button"><i class="fa fa-pencil"></i> New Message</button>
                                </li>
                            </ul>
                            <h3 class="block-title">Inbox</h3>
                        </div>
                        <div class="block-content">
                            <ul class="nav nav-pills nav-stacked push">
                                <li class="active" id="inboxId">
                                    <a href="javascript:void(0)" >
                                        <span class="badge pull-right"><?=$countAllNewMessages; ?></span><i class="fa fa-fw fa-inbox push-5-r"></i> Inbox
                                    </a>
                                </li>
                                <li id="sentId">
                                    <a href="javascript:void(0)" >
                                        <span class="badge pull-right"><?=$countSentNewMessages; ?></span><i class="fa fa-fw fa-send push-5-r"></i> Sent
                                    </a>
                                </li>                                
                                <li id="kotId">
                                    <a href="javascript:void(0)" >
                                        <span class="badge pull-right">48</span><i class="fa fa-fw fa-star push-5-r"></i> KOT
                                    </a>
                                </li>
                                <li id="passwordsId">
                                    <a href="javascript:void(0)" >
                                        <span class="badge pull-right"><?=$countOfNewPr ?></span><i class="fa fa-fw fa-key push-5-r"></i> Passwords
                                    </a>
                                </li>
                                <li id="houseKeepingId">
                                    <a href="javascript:void(0)" >
                                        <span class="badge pull-right"><?=$countCheckouNewMessages; ?></span><i class="fa fa-fw fa-hotel push-5-r"></i> HouseKeeping
                                    </a>
                                </li>
                                <li id="trashId">
                                    <a href="javascript:void(0)" >
                                        <i class="fa fa-fw fa-trash push-5-r"></i> Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Inbox Menu -->
                </div>
                <!-- END Collapsible Inbox Navigation -->
            </div>
            <div class="col-sm-7 col-lg-9">
                <!-- Message List -->
                <div class="block" id="inboxBlock" style="display: block">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                        </ul>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" disabled=""><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">Messages</span></button>
                            </div>
                        </div>
                        <!-- END Messages Options -->
                        <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                        <div class="pull-r-l">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <tbody>
                                    <?php foreach ($messages as $item) { ?>     
                                    <?php if($item->status != 'Trash'&& $item->user_id_from != $this->session->userdata('logged_user_id')) { ?>    
                                    <tr>
                                        <td class="text-center" style="width: 70px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                                <button class="btn btn-default pull-right" type="button" onclick='changetoTrash("<?=$item->id ?>")'><i class="fa fa-trash text-danger push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                            </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?php foreach ($users as $item2) {
                                                if ($item2->empid == $item->user_id_from) {
                                                    echo $item2->name;
                                                }
                                            } ?></td>
                                            <td onclick='changeStatus("<?=$item->id ?>")'>
                                                <a class="font-w600" href="#"><?=$item->subject;?></a>
                                                <div class="text-muted push-5-t"><?=$item->message;?></div>
                                            </td>
                                            <td class="visible-lg text-muted" style="width: 230px;">
                                            <?php if ($item->status == "New") { ?>
                                                <span class="label label-success">New</span> &nbsp;
                                            <?php } ?>                                              
                                                <em><?=$item->dateadded;?></em>
                                            </td>
                                        </tr>  
                                        <?php } ?>                                  
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages -->
                        </div>
                    </div>

                

                <!-- Sent messages -->
                <div class="block" id="sentBlock" style="display: none">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                        </ul>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" disabled=""><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">Sent Messages</span></button>
                            </div>
                        </div>
                        <!-- END Messages Options -->
                        <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                        <div class="pull-r-l">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <tbody>
                                    <?php foreach ($sentmsgs as $item) { ?>                  
                                    <?php if($item->status != 'Trash') { ?>                  
                                    <tr>
                                        <td class="text-center" style="width: 70px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                                <button class="btn btn-default pull-right" type="button" onclick='changetoTrash("<?=$item->id ?>")'><i class="fa fa-trash text-danger push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                            </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?php foreach ($users as $item2) {
                                                if ($item2->empid == $item->user_id_to) {
                                                    echo $item2->name;
                                                }
                                            } ?></td>
                                            <td onclick='changeStatus("<?=$item->id ?>")'>
                                                <a class="font-w600" href="#"><?=$item->subject;?></a>
                                                <div class="text-muted push-5-t"><?=$item->message;?></div>
                                            </td>
                                            <td class="visible-lg text-muted" style="width: 200px;">
                                            <?php if ($item->status == "New") { ?>
                                                <span class="label label-success">New</span> &nbsp;
                                            <?php } ?>                                            
                                                <em><?=$item->dateadded;?></em>
                                            </td>
                                        </tr>  
                                        <?php } ?>  
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages -->
                        </div>
                    </div>


                <!-- Trash messages -->
                <div class="block" id="trashBlock" style="display: none">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                        </ul>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" disabled=""><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">Trash</span></button>
                            </div>
                        </div>
                        <!-- END Messages Options -->
                        <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                        <div class="pull-r-l">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <tbody>
                                    <?php foreach ($messages as $item) { ?>                  
                                    <?php if($item->status == 'Trash') { ?>                  
                                    <tr>
                                        <td class="text-center" style="width: 140px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                                <button class="btn btn-default pull-right" type="button" onclick='changeStatus2("<?=$item->id ?>")'><i class="fa fa-undo text-warning push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                                <button class="btn btn-default pull-right" type="button" onclick='changetoDelete("<?=$item->id ?>")'><i class="fa fa-times text-danger push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                            </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?php foreach ($users as $item2) {
                                                if ($item2->empid == $item->user_id_to) {
                                                    echo $item2->name;
                                                }
                                            } ?></td>
                                            <td>
                                                <a class="font-w600" href="#"><?=$item->subject;?></a>
                                                <div class="text-muted push-5-t"><?=$item->message;?></div>
                                            </td>
                                            <td class="visible-lg text-muted" style="width: 200px;">
                                            <?php if ($item->status == "New") { ?>
                                                <span class="label label-success">New</span> &nbsp;
                                            <?php } ?>                                            
                                                <em><?=$item->dateadded;?></em>
                                            </td>
                                        </tr>  
                                        <?php } ?>  
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages -->
                        </div>
                    </div>      

                <!-- Housekeeping messages -->
                <div class="block" id="houseKeepingBlock" style="display: none">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                        </ul>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" disabled=""><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">House keeping</span></button>
                            </div>
                        </div>
                        <!-- END Messages Options -->
                        <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                        <div class="pull-r-l">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <tbody>
                                    <?php foreach ($chkouts as $item) { ?>                  
                                    <?php if($item->status != 'Trash') { ?>                  
                                    <tr>
                                        <td class="text-center" style="width: 140px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                                <button class="btn btn-default pull-right" type="button" onclick='changetoTrash("<?=$item->id ?>")'><i class="fa fa-trash text-danger push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                                <button class="btn btn-default pull-right" type="button" onclick='changeCheckout("<?=$item->id ?>","<?=$item->status?>","<?=$item->subject ?>")'><i class="fa fa-check-square text-success push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>                                                
                                            </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?php foreach ($users as $item2) {
                                                if ($item2->empid == $item->user_id_to) {
                                                    echo $item2->name;
                                                }
                                            } ?></td>
                                            <td>
                                                <a class="font-w600" href="#"><?=$item->subject;?></a>
                                                <div class="text-muted push-5-t"><?=$item->message;?></div>
                                            </td>
                                            <td class="visible-lg text-muted" style="width: 250px;">
                                            <?php if ($item->status == "Pending") { ?>
                                                <span class="label label-danger">Pending</span> &nbsp;
                                            <?php } ?>                                  
                                            <?php if ($item->status == "Done") { ?>
                                                <span class="label label-info">Done</span> &nbsp;
                                            <?php } ?>                                                                                        
                                                <em><?=$item->dateadded;?></em>
                                            </td>
                                        </tr>  
                                        <?php } ?>  
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages -->
                        </div>
                    </div>    

               <!-- PR messages -->
                <div class="block" id="passwordsBlock" style="display: none">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </li>
                        </ul>
                    </div>
                    <div class="block-content">
                        <!-- Messages Options -->
                        <div class="push">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" disabled=""><i class="fa fa-archive text-primary push-5-l push-5-r"></i> <span class="hidden-xs">Password Requests</span></button>
                            </div>
                        </div>
                        <!-- END Messages Options -->
                        <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                        <div class="pull-r-l">
                            <table class="js-table-checkable table table-hover table-vcenter">
                                <tbody>
                                    <?php foreach ($prrequests as $item) { ?>                  
                                    <?php if($item->status != 'Trash') { ?>                  
                                    <tr>
                                        <td class="text-center" style="width: 140px;">
                                            <label class="css-input css-checkbox css-checkbox-primary">
                                                <button class="btn btn-default pull-right" type="button" onclick='changetoTrash("<?=$item->id ?>")'><i class="fa fa-trash text-danger push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>
                                                <button class="btn btn-default pull-right" type="button" onclick='resetPassword("<?=$item->id ?>","<?=$item->status?>","<?=$item->subject ?>")'><i class="fa fa-check-square text-success push-5-l push-5-r"></i> <span class="hidden-xs"></span></button>                                                
                                            </label>
                                        </td>
                                        <td class="hidden-xs font-w600" style="width: 140px;">
                                            <?=$item->subject;?></td>
                                            <td>
                                                <div class="text-muted push-5-t"><?=$item->message;?></div>
                                            </td>
                                            <td class="visible-lg text-muted" style="width: 250px;">
                                            <?php if ($item->status == "Pending") { ?>
                                                <span class="label label-danger">Pending</span> &nbsp;
                                            <?php } ?>                                  
                                            <?php if ($item->status == "Done") { ?>
                                                <span class="label label-info">Done</span> &nbsp;
                                            <?php } ?>                                                                                        
                                                <em><?=$item->dateadded;?></em>
                                            </td>
                                        </tr>  
                                        <?php } ?>  
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Messages -->
                        </div>
                    </div>                                                                



                    <!-- END Message List -->
                </div>  
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Compose Modal -->
    <div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-success">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title"><i class="fa fa-pencil"></i> New Message</h3>
                    </div>
                    <div class="block-content">
                        <form class="js-validation-form form-horizontal push-10-t push-10" action="<?=site_url("messages/sendMessage");?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <select class="form-control" id="message-to" name="message-to">
                                        <option value=""></option>
                                        <?php foreach ($users as $item2) { ?>
                                            <option value="<?=$item2->empid;?>"><?=$item2->name;?></option>
                                        <?php }  ?>
                                        </select>
                                        <label for="material-select2">To</label>
                                    </div>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating input-group">
                                        <input class="form-control" type="text" id="message-subject" name="message-subject">
                                        <label for="message-subject">Subject</label>
                                        <span class="input-group-addon"><i class="si si-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-success floating">
                                        <textarea class="form-control" id="message-msg" name="message-msg" rows="6"></textarea>
                                        <label for="message-msg">Message</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="message-from" id="message-from" value="<?=$this->session->userdata('logged_user_id');?>">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- END Compose Modal -->

<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_messages.js"></script>

<script>
    
    $("#inboxId").click(function(){
        $("#inboxId").addClass('active');
        $("#inboxBlock").css('display','block');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');                                        
    });

    $("#sentId").click(function(){
        $("#sentId").addClass('active');
        $("#sentBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');             
    });    

    $("#kotId").click(function(){
        $("#kotId").addClass('active');
        $("#kotBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');             
    });       

        $("#passwordsId").click(function(){
        $("#passwordsId").addClass('active');
        $("#passwordsBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');             
    });    

    $("#houseKeepingId").click(function(){
        $("#houseKeepingId").addClass('active');
        $("#houseKeepingBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');             
    });   

    $("#othersId").click(function(){
        $("#othersId").addClass('active');
        $("#othersBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');

        $("#trashId").removeClass();
        $("#trashBlock").css('display','none');             
    });      

    $("#trashId").click(function(){
        $("#trashId").addClass('active');
        $("#trashBlock").css('display','block');

        $("#inboxId").removeClass();
        $("#inboxBlock").css('display','none');

        $("#kotId").removeClass();
        $("#kotBlock").css('display','none');

        $("#passwordsId").removeClass();
        $("#passwordsBlock").css('display','none');

        $("#houseKeepingId").removeClass();
        $("#houseKeepingBlock").css('display','none');

        $("#othersId").removeClass();
        $("#othersBlock").css('display','none');

        $("#sentId").removeClass();
        $("#sentBlock").css('display','none');             
    });   
</script>

<script>
    
    function changeStatus(id){
        var url = "<?= site_url("messages/changeStatus") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(data){
                console.log('changed');
            }
        });        
    }
    
    function changeStatus2(id){
        var url = "<?= site_url("messages/changeStatus") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(data){
                console.log('changed');
                location.reload();                
            }
        });        
    }

    function changetoTrash(id){
        var url = "<?= site_url("messages/changetoTrash") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(data){
                console.log('changed');
                location.reload();
            }
        });        
    }

    function changetoDelete(id){
        var url = "<?= site_url("messages/changetoDelete") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id},
            success: function(data){
                console.log('changed');
                location.reload();
            }
        });        
    }  

    function changeCheckout(id,status,subject){
        var url = "<?= site_url("messages/changeCheckout") ?>"
        if (status == 'Pending') {
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id,status:status,subject:subject},
            success: function(data){
                console.log(data);
                location.reload();
            }
        });             
        }       
    } 

    function resetPassword(id,status,subject){
        var url = "<?= site_url("messages/resetPassword") ?>"
        if (status == 'New') {
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id,status:status,subject:subject},
            success: function(data){
                console.log(data);
                location.reload();
            }
        });             
        }       
    }     

</script>
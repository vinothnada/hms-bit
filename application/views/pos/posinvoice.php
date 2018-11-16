<main id="main-container">
    <!-- Page Header -->
    <!-- You can use the .hidden-print class to hide an element in printing -->
    <div class="content bg-gray-lighter hidden-print">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Invoice
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Home</li>
                    <li><a class="link-effect" href="">Invoice</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Invoice -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Payment</h3>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-xs-3">
                        <br>
                        <label  class="css-input switch switch-success">
                        <input type="checkbox" id="paid"><span></span> <span id="label1">Paid in Pos Counter</span>
                        </label>
                    </div>
                    <div class="col-xs-2">
                    <br>
                        <a href="#"><button class="btn btn-sm btn-primary" type="button" id="sbtn1" disabled>Save</button></a>
                    </div> 
                                        
                    <div class="col-xs-3">
                        <br>
                        <label  class="css-input switch switch-success">
                        <input type="checkbox" id="linkBooking"><span></span> <span id="label1">Link with booking</span>
                        </label>
                    </div>
                    <div class="col-xs-2">
                    <br>
                           <select class="form-control" id="booking_no" disabled>
                                  <option value="">Please Select..</option>                           
                              <?php foreach ($bookingData as $list) { ?>
                                  <option value="<?= $list->booking_no?>"><?= $list->title." ".$list->firstname." / Room no ".$list->room_no?></option>
                              <?php }?>
                       </select>
                    </div>                    
                    <div class="col-xs-2">
                    <br>
                        <a href="#"><button class="btn btn-sm btn-primary" type="button" id="sbtn2" disabled >Link</button></a>
                    </div>                                       

                </div>
            </div>
            <br>
        </div>

        <div class="block">
            <div class="block-header">
                <ul class="block-options">
                    <li>
                        <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                        <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    </li>
                </ul>
                <h3 class="block-title">#INV0<?=$invData[0]->invno; ?></h3>
            </div>
            <div class="block-content block-content-narrow">
                <!-- Invoice Info -->
                <div class="h1 text-center push-30-t push-30 hidden-print">INVOICE</div>
                <hr class="hidden-print">
                <div class="row items-push-2x">
                    <!-- Company Info -->
                    <div class="col-xs-6 col-sm-4 col-lg-3">
                        <p class="h2 font-w400 push-5">K.S Food and Hotels</p>
                        <address>
                            No 35, Central Road,<br>
                            Colombo-11<br>
                            Sri Lanka<br>
                            <i class="si si-call-end"></i> 0777-6485811
                        </address>
                    </div>
                    <!-- END Company Info -->


                    <!-- END Client Info -->
                </div>
                <!-- END Invoice Info -->

                <!-- Table -->
                <div class="table-responsive push-50">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;"></th>
                                <th>Item</th>
                                <th class="text-center" style="width: 100px;">Quantity</th>
                                <th class="text-right" style="width: 150px;">Unit</th>
                                <th class="text-right" style="width: 150px;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $amount = 0 ?>
                            <?php for ($i=0; $i <count($masterData) ; $i++) { ?> 
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <p class="font-w600 push-10"><?=$masterData[$i]['item'];  ?></p>
                                </td>
                                <td class="text-center"><span class="badge badge-primary"><?=$masterData[$i]['qty'];  ?></span></td>
                                <td class="text-right"><?=$masterData[$i]['price'];  ?></td>
                                <td class="text-right">LKR <?=$masterData[$i]['price'] * $masterData[$i]['qty'];  ?></td>
                                <?php $amount = $amount + ($masterData[$i]['price'] * $masterData[$i]['qty']); ?>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                <td class="text-right">LKR <?=$amount;?></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-w600 text-right">Service Charge</td>
                                <td class="text-right"><?= $masterData[0]['tax'] ?>%</td>
                            </tr>
                            <tr class="active">
                                <td colspan="4" class="font-w700 text-uppercase text-right">Total</td>
                                <td class="font-w700 text-right">LKR&nbsp;  <?= $amount+($amount*($masterData[0]['tax']/100)) ?></td>
                            </tr>                                    
                        </tbody>
                    </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <hr class="hidden-print">
                <p class="text-muted text-center"><small>Thank You Please Come Again!</small></p>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
</main>

<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>

<script >
    
        $("#paid").change(function () {
        if (this.checked) {
            $("#sbtn1").attr("disabled",false);
            $("#linkBooking").attr("checked",false);
            $("#sbtn2").attr("disabled",true);
            $("#booking_no").attr("disabled",true);            
        }else{
            $("#sbtn1").attr("disabled",true);
        }
    });

        $("#linkBooking").change(function () {
        if (this.checked) {
            $("#sbtn2").attr("disabled",false);
            $("#booking_no").attr("disabled",false);
            $("#paid").attr("checked",false);       
             $("#sbtn1").attr("disabled",true);     
        }else{
            $("#sbtn2").attr("disabled",true);
            $("#booking_no").attr("disabled",true);
        }
    });


</script>

<script >
    
    $("#sbtn1").click(function(){
        var url = "<?= site_url("pos/paidBooking") ?>"; 
        var invno = "<?=$invData[0]->invno; ?>";

        $.ajax({
            type: "POST",
            url: url,
            data: {invno: invno},
            success: function(data){
                if (data == 1) {
                top.location.href = "<?= site_url("pos/index") ?>";                    
                }
            }
        });
      });

</script>

<script >
    
    $("#sbtn2").click(function(){
        var url = "<?= site_url("pos/linkWithBooking") ?>"; 
        var invno = "<?=$invData[0]->invno; ?>";
        var booking_no = $("#booking_no").val();

        $.ajax({
            type: "POST",
            url: url,
            data: {invno: invno,booking_no:booking_no},
            success: function(data){
                if (data == 1) {
                top.location.href = "<?= site_url("pos/index") ?>";                    
                }
            }
        });
      });

</script>
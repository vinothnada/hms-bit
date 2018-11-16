<div class="col-lg-6">
	<div class="block" style="max-height: 400px; overflow-y: scroll">
       <div class="block-header">
        <h3 class="block-title">List of Items</h3>
    </div>
    <div class="block-content">
      <table class="table table-bordered table-striped js-dataTable-full">
         <thead>
            <tr>
               <th class="text-center" >Item</th>
               <th class="text-center">Price</th>
               <th class="text-center" >Qty</th>                  
               <th class="text-center">Total</th>
           </tr>
       </thead>
       <tbody>
         <?php for ($i=0; $i < count($masterData); $i++) { ?>
         <tr>
           <td class="text-center"><?=$masterData[$i]['item'];?></td>
           <td class="text-center"><?=$masterData[$i]['price'];?></td>
           <td class="text-center"><?=$masterData[$i]['qty'];?></td>
           <td class="text-center"><?=$masterData[$i]['price'] *$masterData[$i]['qty'] ;?></td>
         </tr>
         <?php } ?>
     </tbody>
 </table>
 <div class="form-group">
    <div class="col-xs-12">
    <?php $this->session->set_userdata('passth','Yes') ?>
        <a href="<?= site_url("posBar/generatePosInvoice") ?>"><button class="btn btn-sm btn-primary pull-right" type="button" id="cid" >Create Invoice</button></a>
    </div>
</div>
<br><br>
</div>
</div>
</div>

<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
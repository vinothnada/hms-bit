<div class="block">
  <div class="block-content">
  <?php if (count($guestsdata) > 0) { ?>
    <table class="table table-bordered table-striped js-dataTable-full js-table-section">
     <thead>
      <tr>
       <th class="text-center" >#</th>
       <th>Name</th>
       <th class="hidden-xs" >Identity No</th>                  
       <th class="hidden-xs" >Nationality</th>          
       <th class="hidden-xs" >Gender</th>
       <th class="hidden-xs" >Mobile</th>
     </tr>
   </thead>
   <tbody>

     <?php foreach ($guestsdata as $items) { ?>
     <tr onclick="getData(<?=$items->id;?>)">
       <td class="text-center"><?=$items->id;?></td>
       <td><?=$items->firstname." ".$items->lastname;?></td>
       <td class="hidden-xs"><?=$items->identityNo;?></td>
       <td class="hidden-xs"><?=$items->nationality;?></td>
       <td class="hidden-xs"><?=$items->gender;?></td>
       <td class="hidden-xs"><?=$items->mobile;?></td>
     </tr>
     <?php } ?>
   </tbody>
 </table>
 <?php }else{ ?>

 <h5 style="text-align: center"><span class="text-danger">No Records Found</span></h5><br>

 <?php } ?>

</div>
</div>
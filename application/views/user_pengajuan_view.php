<br><div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-file"></i> Data Pengajuan </h4>
					  
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                           <tr>
		                              <th>No. </th>
		                              <th>Nama Barang</th>
		                              <th>Serial Number</th>
		                              <th>Status</th>
		                              <th>Action</th>
		                          </tr>
		                          </thead>
		                          <tbody>
<?php
$no = 1;
foreach ($hasil as $data):
?>
		                           <tr>
		                                 <td> <?php echo $no; ?> </td>
						 
 						 <td> <?php echo $data->BARANG; ?></td>
						 <td> <?php echo $data->SERIAL_NUMBER; ?> </td>
						 <td> <?php if($data->STATUS == 1){ echo "<span class='label label-success'>".$data->NAMA_STATUS."</span>"; }else { echo "<span class='label label-danger'>".$data->NAMA_STATUS."</span>"; }?> </td>
		                               <td>
						<?php if($data->STATUS == 1){?>
				                  <a href="<?php echo base_url(); ?>index.php/user/pengajuan/<?php echo $data->ID; ?>.html"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Pinjam" name="submit"></i> Pinjam</button></a>
						<?php }else{?>
						  <button class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Pinjam" disabled></i> Pinjam</button>
						<?php }?>
				               </td>
		                          </tr>
					<?php
					$no++;
					endforeach;
					?>
		                          </tbody>
		                      </table>
	                  	  </div>
	                  </div>

<br><div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-file"></i> Data Peminjaman</h4>
					  
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>No. </th>
		                              <th>Nama Barang</th>
		                              <th>Tanggal Peminjaman</th>
		                              <th>Tanggal Pengembalian</th>
		                              <th>Status</th>
		                          </tr>
		                          </thead>
		                          <tbody>
<?php
$no = 1;
foreach ($hasil as $data):
?>
		                          <tr>
		                                 <td> <?php echo $no; ?> </td>
 						 <td> <?php echo $data->NAMA_BARANG; ?> </td>
						 <td> <?php echo tgl_indo($data->TGL_PEMINJAMAN); ?> </td>
						 <td> <?php echo tgl_indo($data->TGL_PENGEMBALIAN); ?> </td>
						 <td> <?php if($data->STATUS == 3){ echo "<span class='label label-danger'>".$data->NAMA_STATUS."</span>"; }else { echo "<span class='label label-success'>".$data->NAMA_STATUS."</span>"; }?> </td>
		                          </tr>
					<?php
					$no++;
					endforeach;
					?>
		                          </tbody>
		                      </table>
	                  	  </div>
	                  </div>

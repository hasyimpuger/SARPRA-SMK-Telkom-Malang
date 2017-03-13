<br><div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-file"></i> Data Barang <button type="button" class="btn btn-success btn-sm btncls" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button> </h4>
					  
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
						 <td> <?php echo $data->BARANG; ?> </td>
						 <td> <?php echo $data->SERIAL_NUMBER; ?> </td>
						 <td> <?php if($data->STATUS == 1){ echo "<span class='label label-success'>".$data->NAMA_STATUS."</span>"; }else { echo "<span class='label label-danger'>".$data->NAMA_STATUS."</span>"; }?> </td>
		                               <td>
				                  <a href="<?php echo base_url(); ?>index.php/admin/barang/edit/<?php echo $data->ID;?>"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
				                  <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="ConfirmDelete()"><i class="fa fa-trash-o"></i></button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
						      </div>
						      <form action="<?php echo base_url(''); ?>index.php/admin/barang/tambah" method="POST">
						      <div class="modal-body">
						        <div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control" name="namabarang">
							      </div>
							  </div><br><br>
						      
							<div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Serial Number</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control" name="serialnumber">
							      </div>
							  </div><br><br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
						      </div>
							</form>
						    </div>
						  </div>
						</div>      	

<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Hapus Data ini?"))
                 location.href=baseUrl+'<?php echo base_url("/index.php/admin/barang/delete/".$data->ID);?>';
      }
  </script>

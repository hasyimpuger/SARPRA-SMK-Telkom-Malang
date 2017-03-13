<br><div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-user"></i> Data User <button type="button" class="btn btn-success btn-sm btncls" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button> </h4>
					  
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>No. </th>
		                              <th>Username</th>
		                              <th>Level</th>
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
						 <td> <?php echo $data->USERNAME; ?> </td>
						 <td> <?php echo $data->NAMA_LEVEL; ?> </td>
		                               <td>
				                  <a href="<?php echo base_url(); ?>index.php/admin/user/update"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
				                  <a href="<?php echo base_url(); ?>index.php/admin/user/delete"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o "></i></button></a>
				                  <a href="<?php echo base_url(); ?>index.php/admin/user/reset/<?php echo $data->ID;?>"><button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Reset"><i class="fa fa-refresh"></i></button></a>
				               </td>
		                          </tr>
					<?php
					$no++;
					endforeach;
					?>
		                          </tbody>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
						      </div>
						      <form action="<?php echo base_url(''); ?>index.php/admin/user/tambah" method="POST">
						      <div class="modal-body">
						       <div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Username</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control" name="username">
							      </div>
							  </div><br><br><br>
							<div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Password</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control" name="password">
							      </div>
							  </div><br><br>
							 <div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Level</label>
							      <div class="col-sm-10">
								   <div class="radio" name="level">
									  <label>
									    <input type="radio" name="level" value="1" checked>
									    Admin
									  </label>
								  </div>
								  <div class="radio" name="level">
									  <label>
									    <input type="radio" name="level" value="2">
									    User
									  </label>
								   </div>
							      </div>
							  </div><br><br><br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
						      </div>
							</form>
						    </div>
						  </div>
						</div>      	

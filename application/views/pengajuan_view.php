<br><div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-file"></i> Data Pengajuan 

						  <div class="btn-group btnclss">
						  <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
						  <span class="fa fa-gears"></span><span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu dropdown-menu dropdown-menu-right" id="picksite">
						    <li><a href="<?php echo base_url();?>index.php/admin/pengajuan/verifikasi.html">Data Verifikasi</a></li>
						    <li><a href="<?php echo base_url();?>index.php/admin/pengajuan.html">Data Belum Verifikasi</a></li>
						    <li class="divider"></li>
						    <li><a href="#">Cetak</a></li>
						  </ul>
					  </h4>
					  
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                           <tr>
		                              <th>No. </th>
		                              <th>Nama Peminjam</th>
		                              <th>Nama Barang</th>
		                              <th>Tanggal Peminjaman</th>
		                              <th>Status</th>
		                              <th>Action</th>
		                          </tr>
		                          </thead>
		                          <tbody>
<?php
$no = 1;
foreach ($hasil as $data):
?>
<form action="<?php echo base_url(); ?>index.php/admin/pengajuan/confirm/<?php echo $data->ID; ?>" method="POST">
		                           <tr>
		                                 <td> <?php echo $no; ?> </td>
						 <td> <?php echo $data->NAMA_USER; ?> </td>						
						 <td class="hidden"> <input type="text" value="<?php echo $data->EMAIL; ?>" name="email" class="hidden"> </td>
						 <td class="hidden"> <input type="text" value="<?php echo $data->NAMA_BARANG; ?>" name="nama" class="hidden"> </td>
						 <td class="hidden"> <input type="text" value="<?php echo $data->SERIAL_NUMBER; ?>" name="serial" class="hidden"> </td>
						 <td class="hidden"> <input type="text" value="<?php echo tgl_indo($data->TGL_PEMINJAMAN); ?>" name="tgl" class="hidden"> </td>
 						 <td> <?php echo $data->NAMA_BARANG; ?> </td>
						 <td> <?php echo tgl_indo($data->TGL_PEMINJAMAN); ?> </td>
						 <td> <?php if($data->VALIDASI == 1){ echo "<span class='label label-warning'>".$data->NAMA_VALIDASI."</span>"; }else { echo "<span class='label label-success'>".$data->NAMA_VALIDASI."</span>"; }?> </td>
<?php if($data->VALIDASI == 1){?>
		                               <td>
				                  <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Terima"><i class="fa fa-check"></i></button></form>

<a href="<?php echo base_url(); ?>index.php/admin/pengajuan/tolak/<?php echo $data->ID; ?>"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fa fa-times"></i></button></a>
				               </td>
<?php }else{?>
<td></td>
<?php }?>
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
						        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
						      </div>
						      <form action="<?php echo base_url();?>index.php/admin/user/add" method="POST" enctype="multipart/form-data">
						      <div class="modal-body">
						        <div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Username</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control">
							      </div>
							  </div><br><br>
							<div class="form-group">
							      <label class="col-sm-2 col-sm-2 control-label">Password</label>
							      <div class="col-sm-10">
								  <input type="text" class="form-control">
							      </div>
							  </div><br><br>
						      </div>

							
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
							</form>
						    </div>
						  </div>
						</div>      	

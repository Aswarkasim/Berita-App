<section class="tables">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4"><?php echo $title; ?></h3>
                    </div>
                    <div class="card-body">
                      <p>
                        <a href="<?php echo base_url('admin/prestasi/tambah'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                      </p>
                      <?php


                      if($this->session->flashdata('msg')){
                        echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
                        echo $this->session->flashdata('msg');
                        echo '</div>';
                      }
                      ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover dataTables">
                          <thead>
                            <tr>
                              <th width="1%">#</th>
                              <th>Foto</th>
                              <th>Nama</th>
                              <th>Ajang</th>
                              <th>Tempat Pelaksanaan</th>
                              <th>Tahun</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($prestasi as $prestasi){ ?>
                            <tr>
                              <th scope="row"><?php echo $no++; ?></th>
                              <td><img src="<?php if($prestasi->foto != ""){ echo base_url('assets/uploads/images/thumbs/'.$prestasi->foto);}else{echo base_url('assets/images/default_image.png');} ?>" width="70px" class="img img-thumbnail"></td>
                              <td><?php echo $prestasi->nama_peraih; ?></td>
                              <td><?php echo $prestasi->ajang; ?></td>
                              <td><?php echo $prestasi->tempat_pelaksanaan; ?></td>
                              <td><?php echo $prestasi->tahun; ?></td>
                              <td>
                              <a href="<?php echo base_url('admin/prestasi/edit/'.$prestasi->id_prestasi); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                <?php include ('hapus.php'); ?>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

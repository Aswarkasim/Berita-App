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
                      <h3 class="h4">Striped table with hover effect</h3>
                    </div>
                    <div class="card-body">
                      <p>
                        <a href="<?php echo base_url('admin/user/tambah'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                              <th>#</th>
                              <th>Foto</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th>Akses Level</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($user as $user){ ?>
                            <tr>
                              <th scope="row"><?php echo $no++; ?></th>
                              <td><img src="<?php if($user->foto != ""){ echo base_url('assets/uploads/images/thumbs/'.$user->foto);}else{echo base_url('assets/images/default_image.png');} ?>" width="70px" class="img img-thumbnail"></td>
                              <td><?php echo $user->nama; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td><?php echo $user->akses_level; ?></td>
                              <td>
                                <a href="<?php echo base_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
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

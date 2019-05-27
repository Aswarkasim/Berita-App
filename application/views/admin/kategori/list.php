<section class="tables">
            <div class="container-fluid">
              <div class="row">


                <div class="col-lg-6">
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
                        <?php include('tambah.php') ?>
                      </p>
                      <?php
                        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ',' </div>');

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
                              <th width="10%">#</th>
                              <th>Kategori</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach($kategori as $kategori){ ?>
                            <tr>
                              <th scope="row"><?php echo $no++; ?></th>
                              <td><?php echo $kategori->nama_kategori; ?></td>
                              <td>
                                <a href="<?php echo base_url('admin/berita/editKategori/'.$kategori->id_kategori); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
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



<div class="container-fluid py-4">
<?php if ($this->session->flashdata('info')): ?>
    <div class="alert"></div>
<?php endif; ?>
<?php if ($this->session->flashdata('hapus')): ?>
    <div class="alert-hapus"></div>
<?php endif; ?>
<?php if ($this->session->flashdata('update')): ?>
    <div class="alert-update"></div>
<?php endif; ?>


      <div class="row mt-4">

        <?php 
        $id_level=$this->session->userdata('id_level');
        if($id_level<=1){
        ?>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Data Bidang / Ruangan</h6>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm w-40 mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Bidang 
            </button>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Bidang/Ruangan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="<?= base_url('master/add/bidang')?>" >
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" name="nam_r" class="form-control" id="ruangan">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <?php foreach($bidang as $row_bidang) : ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?= $row_bidang->nama_bidang ?></h6>
                      <span class="text-xs">123 user, <span class="font-weight-bold">15 online</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div type="button" data-bs-toggle="modal" data-bs-target="#hapusbidang-<?=$row_bidang->id_bidang?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                        <i class="ni ni-scissors text-white opacity-10"></i>
                    </div>
                    <div type="button" data-bs-toggle="modal" data-bs-target="#editbidang-<?=$row_bidang->id_bidang?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                        <i class="ni ni-ruler-pencil text-white opacity-10"></i>
                    </div>
                  </div>

                  <!-- Modal Hapus Bidang -->
                  <div class="modal fade" id="hapusbidang-<?=$row_bidang->id_bidang?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Bidang/Ruangan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/hapus/bidang')?>" >
                          <div class="modal-body">
                            <h6>Apakah anda yakin ingin menghapus data bidang/ruang <?= $row_bidang->nama_bidang;?></h6>
                            <input type="hidden" name="id_b" value="<?= $row_bidang->id_bidang ?>">
                            <input type="hidden" name="nama" value="<?= $row_bidang->nama_bidang ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Edit Bidang -->
                  <div class="modal fade" id="editbidang-<?=$row_bidang->id_bidang?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Ruangan <?= $row_bidang->nama_bidang;?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/update/bidang/'.$row_bidang->id_bidang)?>" >
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="ruangan" class="form-label">Nama Ruangan</label>
                              <input type="text" name="nam_r" class="form-control" id="ruangan" value=<?= $row_bidang->nama_bidang;?> >
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Data Level </h6>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm w-40 mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#level">
                Tambah Level 
            </button>
            <!-- Modal -->
            <div class="modal fade" id="level" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Level User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="<?= base_url('master/add/level')?>" >
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="level" class="form-label">Nama Level</label>
                        <input type="text" name="nam_r" class="form-control" id="level">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <?php foreach($level as $row_level) : ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?= $row_level->nama_level ?></h6>
                      <span class="text-xs">123 user, <span class="font-weight-bold">15 online</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div type="button" data-bs-toggle="modal" data-bs-target="#hapuslevel-<?=$row_level->id_level?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                        <i class="ni ni-scissors text-white opacity-10"></i>
                    </div>
                    <div type="button" data-bs-toggle="modal" data-bs-target="#editlevel-<?=$row_level->id_level?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                        <i class="ni ni-ruler-pencil text-white opacity-10"></i>
                    </div>
                  </div>

                  <!-- Modal Hapus Level -->
                  <div class="modal fade" id="hapuslevel-<?=$row_level->id_level?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus level</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/hapus/level')?>" >
                          <div class="modal-body">
                            <h6>Apakah anda yakin ingin menghapus level <?= $row_level->nama_level;?></h6>
                            <input type="hidden" name="id_b" value="<?= $row_level->id_level ?>">
                            <input type="hidden" name="nama" value="<?= $row_level->nama_level ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Edit Level -->
                  <div class="modal fade" id="editlevel-<?=$row_level->id_level?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Level <?= $row_level->nama_level;?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/update/level/'.$row_level->id_level)?>" >
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="level" class="form-label">Nama Level</label>
                              <input type="text" name="nam_r" class="form-control" id="level" value=<?= $row_level->nama_level;?> >
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <?php }?>


        <div class="col-lg-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Data Jenis Dokumen </h6>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm w-40 mt-2 ms-3" data-bs-toggle="modal" data-bs-target="#dokumen">
                Tambah Jenis Dokumen 
            </button>
            <!-- Modal -->
            <div class="modal fade" id="dokumen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jenis Dokumen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="<?= base_url('master/add/dokumen')?>" >
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="level" class="form-label">Nama Jenis Dokumen</label>
                        <input type="text" name="nam_r" class="form-control" id="level">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <?php foreach($dokumen as $row_dokumen) : ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?= $row_dokumen->nama_jenis_dokumen ?></h6>
                      <span class="text-xs">4 Jenis Dokumen <span class="font-weight-bold"></span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div type="button" data-bs-toggle="modal" data-bs-target="#hapusdokumen-<?=$row_dokumen->id_jenis_dokumen?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                        <i class="ni ni-scissors text-white opacity-10"></i>
                    </div>
                    <div type="button" data-bs-toggle="modal" data-bs-target="#editdokumen-<?=$row_dokumen->id_jenis_dokumen?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                        <i class="ni ni-ruler-pencil text-white opacity-10"></i>
                    </div>
                  </div>

                  <!-- Modal Hapus Dokumen -->
                  <div class="modal fade" id="hapusdokumen-<?=$row_dokumen->id_jenis_dokumen?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus level</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/hapus/dokumen')?>" >
                          <div class="modal-body">
                            <h6>Apakah anda yakin ingin menghapus jenis dokumen <?= $row_dokumen->nama_jenis_dokumen;?></h6>
                            <input type="hidden" name="id_b" value="<?= $row_dokumen->id_jenis_dokumen ?>">
                            <input type="hidden" name="nama" value="<?= $row_dokumen->nama_jenis_dokumen ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Edit Level -->
                  <div class="modal fade" id="editdokumen-<?=$row_dokumen->id_jenis_dokumen?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Jenis Dokumen <?= $row_dokumen->nama_jenis_dokumen;?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('master/update/dokumen/'.$row_dokumen->id_jenis_dokumen)?>" >
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="level" class="form-label">Nama Jenis Dokumen</label>
                              <input type="text" name="nam_r" class="form-control" id="level" value=<?= $row_dokumen->nama_jenis_dokumen;?> >
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
  
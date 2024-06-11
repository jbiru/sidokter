

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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Data User</h6>
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm mt-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah User 
            </button>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="<?= base_url('user_Cont/add')?>" >
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" name="nama_user" class="form-control" id="nama_user">
                      </div>
                      <div class="mb-3">
                        <label for="alamat_user" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat_user">
                      </div>
                      <div class="mb-3">
                        <label for="id_level" class="form-label">Level</label>
                        <select name="id_level" id="id_level" class="form-control">
                          <?php foreach($level as $row_b){ ?>
                            <option value="<?= $row_b->id_level;?>"><?= $row_b->nama_level;;?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="mb-3">
                        <label for="id_bidang" class="form-label">Bidang</label>
                        <select name="id_bidang" id="id_bidang" class="form-control">
                          <?php foreach($bidang as $row_b){ ?>
                            <option value="<?= $row_b->id_bidang;?>"><?= $row_b->nama_bidang;;?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="no_telp" class="form-label">No Handphone</label>
                        <input type="number" name="no_telp" class="form-control" id="no_telp">
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

            <!-- Table User -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <!-- <th scope="col">Foto</th> -->
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Level</th>
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                  <th scope="col">Bidang</th>
                  <th scope="col">No Telp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1;foreach($user as $row_user) : ?>
                <tr>
                  <th class="text-center"><?= $no++?></th>
                  <!-- <td><?=$row_user->foto?></td> -->
                  <td><?=$row_user->nama_user?></td>
                  <td><?=$row_user->alamat?></td>
                  <td><?=$row_user->id_level?></td>
                  <td><?=$row_user->username?></td>
                  <td><?=$row_user->password?></td>
                  <td><?=$row_user->id_bidang?></td>
                  <td>0<?=$row_user->no_telp?></td>
                  <td>
                    <div class="d-flex">
                      <div type="button" data-bs-toggle="modal" data-bs-target="#hapusbidang-<?=$row_user->id_user?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                          <i class="ni ni-scissors text-white opacity-10"></i>
                      </div>
                      <div type="button" data-bs-toggle="modal" data-bs-target="#editbidang-<?=$row_user->id_user?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                          <i class="ni ni-ruler-pencil text-white opacity-10"></i>
                      </div>
                    </div>
                    <div class="modal fade" id="hapusbidang-<?=$row_user->id_user?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('user_Cont/delete/'.$row_user->id_user)?>" >
                          <div class="modal-body">
                            <h6>Apakah anda yakin ingin menghapus  <?= $row_user->nama_user;?></h6>
                            <input type="hidden" name="nama" value="<?= $row_user->nama_user ?>">
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
                  <div class="modal fade" id="editbidang-<?=$row_user->id_user?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit  <?= $row_user->nama_user;?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="<?= base_url('user_Cont/update/'.$row_user->id_user);?>" >
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="nama_user" class="form-label">Nama User</label>
                              <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= $row_user->nama_user;?>">
                            </div>
                            <div class="mb-3">
                              <label for="alamat_user" class="form-label">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="alamat_user" value="<?= $row_user->alamat;?>">
                            </div>
                            <div class="mb-3">
                              <label for="id_level" class="form-label">Level</label>
                              <select name="id_level" id="id_level" class="form-control">
                                <?php foreach($level as $row_b){ ?>
                                  <option value="<?= $row_b->id_level;?>"><?= $row_b->nama_level;;?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="username" value="<?= $row_user->username;?>">
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" value="<?= $row_user->password;?>">
                            </div>
                            <div class="mb-3">
                              <label for="id_bidang" class="form-label">Bidang</label>
                              <select name="id_bidang" id="id_bidang" class="form-control">
                                <?php foreach($bidang as $row_b){ ?>
                                  <option value="<?= $row_b->id_bidang;?>"><?= $row_b->nama_bidang;;?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="no_telp" class="form-label">No Handphone</label>
                              <input type="number" name="no_telp" class="form-control" id="no_telp" value="0<?= $row_user->no_telp;?>">
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
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
      
  
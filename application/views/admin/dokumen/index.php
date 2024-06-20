<div class="container-fluid py-4">
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



<div class="row">
        <div class="col-12">
          <div class="card mb-1">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-3">
                <table class="table align-items-center mb-0 " id="myTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Dokumen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bidang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Upload</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1;foreach($dokumen as $row): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <h6 class="px-2"><?=$no++;?></h6>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$row->judul_dokumen?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$row->nama_user?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$row->bidang?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if(($row->status)==1){?>
                          <span class="badge badge-sm bg-gradient-success">Publik</span>
                          <?php }else{?>
                            <span class="badge badge-sm bg-gradient-danger">Private</span>
                        <?php }?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row->tgl_upload?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$row->tgl_edit?></span>
                      </td>
                      <td class="align-middle text-center d-flex justify-content-center">
                        <?php if ((basename($_SERVER['REQUEST_URI']))=='myDokumen'){?>
                          <div class="d-flex">
                            <a title="Lihat Dokumen" href="<?= base_url('dokumen/lihatDokumen/'.$row->id_activity_document);?>"  type="button" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-secondary shadow text-center">
                                <i class="ni ni-image text-white opacity-10"></i>
                            </a>
                            <div title="Hapus Dokumen" type="button" data-bs-toggle="modal" data-bs-target="#hapusbidang-<?=$row->id_activity_document?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                                <i class="ni ni-scissors text-white opacity-10"></i>
                            </div>
                            <div title="Edit Dokumen" type="button" data-bs-toggle="modal" data-bs-target="#editbidang-<?=$row->id_activity_document?>" class="icon justify-content-end icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                                <i class="ni ni-ruler-pencil text-white opacity-10"></i>
                            </div>
                          </div>

                          <!-- Modal Hapus Bidang -->
                          <div class="modal fade" id="hapusbidang-<?=$row->id_activity_document?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Dokumen</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?= base_url('dokumen/delete')?>" >
                                  <div class="modal-body">
                                    <h6>Apakah anda yakin ingin menghapus  <br> <?= $row->judul_dokumen;?></h6>
                                    <input type="hidden" name="id_activity_document" value="<?= $row->id_activity_document ?>">
                                    <input type="hidden" name="nama" value="<?= $row->judul_dokumen ?>">
                                    <input type="hidden" name="file" value="<?= $row->file ?>">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- Modal Edit Bidang -->
                          <div class="modal fade" id="editbidang-<?=$row->id_activity_document?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Dokumen <?= $row->judul_dokumen;?></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?= base_url('dokumen/update/'.$row->id_activity_document)?>" enctype="multipart/form-data" >
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-lg-6">
                                          <object width="100%" height="700px" data="<?= base_url().'upload/'.($row->file)?>" type=""></object>
                                      </div>
                                      <div class="col-lg-6 text-start">
                                        <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Judul Dokumen</label>
                                          <input class="form-control" type="text" required name="judul" value="<?= $row->judul_dokumen;?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Jenis Dokumen</label>
                                          <select class="form-control form-select" type="text" name="jenis_dokumen" >
                                            <?php $jenis=$this->db->query("SELECT * FROM dokumen")->result();
                                            foreach($jenis as $row_jenis): ?>
                                            <option value="<?= $row_jenis->nama_jenis_dokumen;?>" class="form-option form-control"><?= $row_jenis->nama_jenis_dokumen;?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Tanggal Terbit</label>
                                          <input class="form-control" required type="date" name="tgl_terbit" value=<?=$row->tgl_terbit?> >
                                        </div>
                                        <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Sumber</label>
                                          <input class="form-control" type="text" name="sumber" value="<?=$row->sumber?>">
                                          <input class="form-control" type="hidden" name="file_old" value="<?=$row->file?>">
                                        </div>
                                        <div class="form-check ms-3">
                                          <input class="form-check-input" type="checkbox" name="status" value="1" id="fcustomCheck1" checked="">
                                          <label class="custom-control-label" for="customCheck1">Publik</label>
                                        </div>
                                        <div class="input-group mb-3">
                                          <input type="file" class="form-control" name="dokumen">
                                        </div>
                                        <input type="submit" value="Perbarui" class="btn btn-primary float-end ms-2">
                                        <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php }?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
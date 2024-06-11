<div class="container-fluid py-4">
<div class="row">
        <div class="col-md-8 card ">
            <div class="card-body">
                <object data="<?= base_url().'upload/'.($dokumen->file)?>" width="100%" height="1000px"></object>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Deskripsi Dokumen</p>
                </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Judul Dokumen</label>
                            <input class="form-control" type="text" disabled value="<?= $dokumen->judul_dokumen;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenis Dokumen</label>
                            <input class="form-control" type="text" disabled value="<?= $dokumen->jenis_dokumen;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Terbit</label>
                                <input class="form-control" type="text" disabled value="<?= $dokumen->tgl_terbit;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal di Edit</label>
                                <input class="form-control" type="text" disabled value="<?= $dokumen->tgl_edit;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sumber</label>
                            <input class="form-control" type="text" disabled value="<?= $dokumen->sumber;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status Visibility</label>
                                <input class="form-control" type="text" disabled value="<?php echo ($dokumen->status)==1 ? 'Publik':'Private';?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
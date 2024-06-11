<div class="container-fluid py-4">
<div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">FORMULIR</p>
              </div>
            </div>
            <div class="card-body">
              <form action="<?= base_url('dokumen/upload')?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Judul Dokumen</label>
                      <input class="form-control" type="text" name="judul">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Jenis Dokumen</label>
                      <select class="form-control form-select" type="text" name="jenis_dokumen" >
                        <?php foreach($jenis as $row): ?>
                        <option value="<?= $row->nama_jenis_dokumen;?>" class="form-option form-control"><?= $row->nama_jenis_dokumen;?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Tanggal Terbit</label>
                      <input class="form-control" type="date" name="tgl_terbit">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Sumber</label>
                      <input class="form-control" type="text" name="sumber">
                    </div>
                  </div>
                  <div class="form-check ms-3">
                    <input class="form-check-input" type="checkbox" name="status" value="1" id="fcustomCheck1" checked="">
                    <label class="custom-control-label" for="customCheck1">Publik</label>
                  </div>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" name="dokumen">
                  </div>
                  <div class="col-md-6"></div>
                  <div class="col-md-6 ">
                    <input type="submit" value="UPLOAD" class="btn btn-primary float-end ms-2">
                    <input type="reset" value="Reset" class="btn btn-secondary float-end">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
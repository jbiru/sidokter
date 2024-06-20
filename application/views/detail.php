<section id="features" class="features section mt-5">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="">Dokumen <?= $dokumen->judul_dokumen?></h2>
        <!-- <p>Yeay... Terbaru! 3 dokumen terbaru yang baru diupload oleh mimin..</p> -->
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7 d-flex align-items-center">
            <object data="<?= base_url()?>upload/<?= $dokumen->file?>" width="100%" height="900px" type=""></object>
          </div>
          <div class="col-lg-5">
            <table class="table" style="margin-top:90px;">
                <thead>
                    <tr>
                        <th scope="col">Judul Dokumen</th>
                        <td scope="col">: <?= $dokumen->judul_dokumen;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Jenis Dokumen</th>
                        <td scope="col">: <?= $dokumen->jenis_dokumen;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Terbit</th>
                        <td scope="col">: <?= $dokumen->tgl_terbit;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Sumber </th>
                        <td scope="col">: <?= $dokumen->sumber;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Upload</th>
                        <td scope="col">: <?= $dokumen->tgl_upload;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td scope="col">: 
                        <?php if(($dokumen->status)==1){?>
                          <span class="badge badge-sm bg-primary">Publik</span>
                          <?php }else{?>
                            <span class="badge badge-sm bg-success">Private</span>
                        <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Uploader</th>
                        <td scope="col">: <?= $dokumen->nama_user;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Bidang Uploader</th>
                        <td scope="col">: <?= $dokumen->bidang;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Dilihat</th>
                        <td scope="col">: <?php echo ($jumlah->view);?> x Dilihat</td>
                    </tr>
                    <tr>
                        <th scope="col">Didownload</th>
                        <td scope="col">: <?php var_dump($jumlah->down);?> x diunduh</td>
                    </tr>
                </thead>
            </table>
            <a href="<?= base_url('home/download/').$dokumen->id_activity_document.'/'.$dokumen->file?>" class="btn btn-success">Download Dokumen</a>
          </div>
        </div>
      </div>
    </section><!-



    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="<?= base_url() ?>assets/assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up" class="">Welcome to <span>SiDokter</span></h1>
          <p data-aos="fade-up" data-aos-delay="100" class="">Sistem Dokumen Terintegrasi Rumah Sakit Umum Daerah Ngimbang<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Mulai Pencarian Dokumen</a>
          </div>
          <img src="<?= base_url() ?>assets/assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dokumen</a></h4>
                <p class="description">Jumlah Semua <?php echo (count($tiga));?> Dokumen berhasil diupload</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dokumen dilihat</a></h4>
                <p class="description">Jumlah Dokumen Dilihat <?= $view->jumlah_view;?> Kali</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dokumen diunduh</a></h4>
                <p class="description">Jumlah Dokumen Terunduh <?= $unduh->jumlah_unduh;?> kali</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">
        <!-- Pencarian -->
        <div class="row mb-5 mt-5">
          <div class="col-lg-3"></div>
          <div class="input-group input-group-lg col-lg-6 col-md-8 justify-content-center">
            <input id="live_search" type="text" class="form-control" list="datalistOptions"  name="input" placeholder="Masukan Kata Kunci Pencarian..." aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
            <span type="button" class="input-group-text btn btn-primary" id="inputGroup-sizing-lg">Cari Dokumen</span>
          </div>
          <div id="searchresult"></div>
          <span class="text-danger mx-1 mt-2">Catatan :</span>
          <span class="text-secondary text-xs mx-1 mt-2">Mohon gunakan komputer atau menggunakan tablet untuk mendapatkan hasil tampilan web yang bagus dan menarik</span>
          <div class="col-lg-3"></div>
        </div>
      <!-- End Pencarian -->

        <div class="row gy-4 mt-5">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Portal Sistem Dokumen dan Informasi RSUD Ngimbang </h3>
            <p class="fst-italic">
              Merupakan sistem pencarian data dokumen dan informasi internal RSUD Ngimbang
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Lebih Cepat</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Lebih Mudah</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Paperless</span></li>
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="<?= base_url() ?>assets/assets/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="<?= base_url() ?>assets/assets/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="<?= base_url() ?>assets/assets/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="">Latar Belakang Sidkter</h2>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-briefcase"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Efisiensi dan Aksesibilitas</h4>
                    <p>
                    Sistem elektronik memungkinkan dokumen untuk diunggah secara digital, mengurangi ketergantungan pada dokumen fisik yang memerlukan ruang penyimpanan fisik yang besar. Ini meningkatkan efisiensi dalam pencarian dan akses dokumen.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-briefcase"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Keamanan dan Perlindungan Data</h4>
                    <p>
                    Dokumen yang diunggah dalam sistem elektronik dapat dilindungi dengan teknologi keamanan yang canggih, seperti enkripsi data dan pengaturan izin akses. 
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-briefcase"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Pemeliharaan dan Pengelolaan yang Lebih Mudah</h4>
                    <p>
                    Dengan sistem elektronik, pengelolaan arsip dapat dilakukan dengan lebih efektif. Dokumen elektronik lebih mudah untuk disimpan, dikelola, dan dipelihara, karena tidak memerlukan perawatan fisik yang rumit seperti dokumen kertas.
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->

          </div>

          <div class="col-lg-6">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="<?= base_url() ?>assets/assets/img/tabs-1.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-2">
                <img src="<?= base_url() ?>assets/assets/img/tabs-2.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

              <div class="tab-pane fade" id="features-tab-3">
                <img src="<?= base_url() ?>assets/assets/img/tabs-3.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Alamat Lengkap Rumah Sakit Umum Daerah Ngimbang Lamongan</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt "></i>
              <h3>Alamat</h3>
              <p class="px-3">Jl. Babat - Jombang No.227, Tapas, Sendangrejo, Kec. Ngimbang, Kabupaten Lamongan</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>(0322) 453636 : 453737</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email </h3>
              <p>ngimbangrsud@yahoo.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.574090691636!2d112.21316217499998!3d-7.289202092718191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78221f128b3019%3A0x3a92516e43aa5e83!2sRSUD%20Ngimbang!5e0!3m2!1sid!2sid!4v1716261814745!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  
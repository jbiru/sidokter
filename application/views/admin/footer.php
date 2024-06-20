<footer class="footer pt-1  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.lamongankab.go.id/rsudngimbang" class="font-weight-bold" target="_blank">Program</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.lamongankab.go.id/rsudngimbang" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.lamongankab.go.id/rsudngimbang" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.lamongankab.go.id/rsudngimbang" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.lamongankab.go.id/rsudngimbang" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
</main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Theme Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <div class="w-100 text-center">
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://www.youtube.com/@rsudngimbangkab.lamongan1279" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-youtube me-1" aria-hidden="true"></i> YouTube
          </a>
          <a href="https://www.instagram.com/rsud_ngimbang/" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-instagram me-1" aria-hidden="true"></i> Instagram
          </a>
        </div>
      </div>
    </div>
  </div>

  

  <!--   Core JS Files   -->
  <script src="<?= base_url()?>assets/argon/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url()?>assets/argon/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/argon/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url()?>assets/argon/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url()?>assets/argon/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Januari","Februari","Maret","April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 470, 570, 350, 600],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/argon/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- <link href="<?= base_url() ?>assets/datatables/datatables.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/datatables/datatables.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/datatables/datatables.min.js"></script>
  <script src="<?= base_url() ?>assets/datatables/datatables.js"></script>
  <script src="<?= base_url() ?>assets/jquery/jquery.js"></script>
  <script src="cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> -->

  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.8/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.8/datatables.min.js"></script>

  <script>
    // let table = new DataTable('#myTable');
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
    document.addEventListener("DOMContentLoaded", function() {
      // Get all elements with class 'alert'
      var alerts = document.querySelectorAll('.alert');

      // Loop through each alert
      alerts.forEach(function(alert) {
          // Show Sweet Alert when an alert is found
          Swal.fire({
          position: "center",
          icon: "success",
          title: "Data <?= $this->session->flashdata('info'); ?>",
          showConfirmButton: false,
          timer: 1500
          });
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      // Get all elements with class 'alert'
      var alerts = document.querySelectorAll('.alert-hapus');

      // Loop through each alert
      alerts.forEach(function(alert) {
          // Show Sweet Alert when an alert is found
          Swal.fire({
          position: "center",
          icon: "success",
          title: "Data <?= $this->session->flashdata('hapus'); ?> Berhasil Dihapus",
          showConfirmButton: false,
          timer: 1500
          });
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      // Get all elements with class 'alert'
      var alerts = document.querySelectorAll('.alert-update');

      // Loop through each alert
      alerts.forEach(function(alert) {
          // Show Sweet Alert when an alert is found
          Swal.fire({
          position: "center",
          icon: "success",
          title: "Data <?= $this->session->flashdata('update'); ?> berhasil diubah",
          showConfirmButton: false,
          timer: 3000
          });
      });
    });
  </script>

  <!-- preview upload -->
<script>
  function viewImage(input){
    if(input.files && input.files[0])
    {
      var reader=new FileReader();
      reader.onload=function(e){
        $(#gambar_load).attr('src',e.target.result);
      }
      reader.readAsdataURL(input.files[0]);
    }
  }
</script>


</body>

</html>
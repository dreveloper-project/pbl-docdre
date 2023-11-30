<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="col-auto shadow  col-md-3 col-xl-2 px-sm-2 px-0 bg-light mt-2 mb-2 ml-4 rounded sticky-top">
      <div id="aside" class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

        <img src="<?= BASE_URL ?>/public/img/logo.png" style="width: 170px; height: 170px; margin-bottom: 3rem !important;" alt="...">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-3 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">
            <a href="<?= BASE_URL ?>admin/" class="nav-link align-middle px-0">
              <span class="ms-1 d-none d-sm-inline">Home</span> <i class="fa fa-home" aria-hidden="true"></i>
            </a>
          </li>
          <li>

            <a href="<?= BASE_URL ?>admin/document" class="nav-link px-0 align-middle">
              <span class="ms-1 d-none d-sm-inline">Surat Tugas</span> <i class="fa fa-file-text-o" aria-hidden="true"></i> </a>
          </li>
          <li>
            <a href="<?= BASE_URL ?>admin/user" class="nav-link px-0 align-middle">
              <span class="ms-1 d-none d-sm-inline">User</span> <i class="fa fa-user-plus" aria-hidden="true"></i> </a>
          </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">
            <a href="<?= BASE_URL ?>login/logout" class="nav-link align-middle px-0">
              <span class="ms-1 d-none d-sm-inline">Log Out</span> <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
        <hr>

      </div>
    </div>
    <div class="col py-3">
      <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
        <div class="container">



          <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse">

            <ul class="navbar-nav ms-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                  <?php
                  echo $_SESSION['logged_in'];
                  ?>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>

                </ul>

              </li>

            </ul>

          </div>

        </div>
      </nav>

      <div class="d-flex justify-content-between mt-5 headingtext">
        <h2 class="">Surat Tugas</h2>
        <a href="<?= BASE_URL ?>admin/terbitsurat">
          <button type="button" class="btn btn-color">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Terbitkan Surat Tugas
          </button> </a>

      </div>

      <div>

        <?php if (isset($_SESSION["messageSuccess"])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> <?php echo $_SESSION["messageSuccess"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>

      </div>


      <table class="table table-bordered mt-2" id="userTable">
        <thead>
          <tr>
            <th>Nama Surat</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row) : ?>
            <tr>
              <td><a href="<?php echo BASE_URL ?>/surat/<?php echo $row['nama_surat']; ?>" download="<?php echo $row['nama_surat']; ?>">
                  <?php echo $row['nama_surat']; ?>
                </a></td>
              <td><?php echo $row['deskripsi']; ?></td>
              <td><?php echo $row['tanggal']; ?></td>
              <td>

                <a href="<?= BASE_URL ?>/admin/hapussurat/<?php echo $row["id_surat"]; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus ?')"><i class="fa fa-trash-o"></i>Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>


    </div>

  </div>
</div>

<style>
  .headingtext {

    margin-left: 1.2rem;

  }

  .btn-color {
    color: white;
    background-color: #800000;
    border-color: #800000;
  }

  .navbar-nav .nav-link {
    border-radius: 30px;
  }

  #aside ul li {
    width: 10rem;

  }

  .nav-link {
    font-size: 1.2rem;
    padding-left: 1.4rem !important;
    color: maroon !important;
  }

  .nav-link:hover {
    color: white !important;
    background-color: maroon;
  }
</style>
<script>
  function changeUrl(newUrl) {


    var currentUrl = window.location.href;


    window.history.pushState({}, "", newUrl);


    $(window).on('popstate', function() {
      redirectToUrl(currentUrl);
    });

  }

  function redirectToUrl(url) {
    window.location.href = url;
  }
</script>

<div class="d-flex justify-content-center" style="width: 100vw;">
    
    <form action="<?= BASE_URL ?>admin/simpanperubahan/<?= $data['id_user'] ?>" method="post" class="p-3 shadow rounded mt-4" style="width: 55%;">
    
    <div class="form-row d-flex justify-content-between gap-3">
        <div class="col-md-5 mb-3">
        <?php if (isset($_SESSION["messageError"]['nama_user'])) { ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> <?php echo $_SESSION["messageError"]['nama_user']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php } ?>
          <label for="nama_user" class="form-label">Nama</label>
          <input type="text" value="<?= $data['nama_user'] ?>" name="nama_user" class="form-control" id="nama_user">
        </div>
      
        <div class="col-md-5 mb-3">
        <?php if (isset($_SESSION["messageError"]['nomor_induk'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['nomor_induk']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
          <label for="nomor_induk" class="form-label">Nomor Induk</label>
          <input value="<?= $data['nomor_induk'] ?>" type="text" name="nomor_induk" class="form-control" id="nomor_induk">
        </div>
      </div>
      
    
      <div class="mb-3">
      <?php if (isset($_SESSION["messageError"]['email'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['email']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
        <label for="email" class="form-label">Email address</label>
        <input value="<?= $data['email'] ?>" type="email" name="email" class="form-control" id="email">
      </div>

      <div class="mb-3">
      <?php if (isset($_SESSION["messageError"]['nomor_telepon'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['nomor_telepon']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
        <label for="email" class="form-label">Nomor Telepon</label>
        <input type="text" value="<?= $data['nomor_telepon'] ?>" name="nomor_telepon" class="form-control" id="email">
      </div>

      <div class="mb-3">
      <?php if (isset($_SESSION["messageError"]['alamat'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['alamat']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
        <label for="email" class="form-label">Alamat</label>
        <input type="text" value="<?= $data['alamat'] ?>" name="alamat" class="form-control" id="email">
      </div>

      <div class="mb-3">
      <?php if (isset($_SESSION["messageError"]['password'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['password']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      
      <div class="mb-3">
      <?php if (isset($_SESSION["messageError"]['repeatPassword'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['repeatPassword']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
        <label for="repeatPassword" class="form-label">Ulangi Password</label>
        <input type="password" name="repeatPassword" class="form-control" id="repeatPassword">
      </div>
      <div class="form-row d-flex justify-content-between gap-3">
        <div class="col-md-5 mb-3">
        <label for="exampleSelect">Role</label>
        <select class="form-select" id="exampleSelect" name="role">
         
          <option  <?php if ($data['role'] == "Admin") {
                                    echo "selected";
                                } ?> value="Admin">Admin</option>
          <option <?php if ($data['role'] == "Mahasiswa") {
                                    echo "selected";
                                } ?> value="Mahasiswa">Mahasiswa</option>
          <option <?php if ($data['role'] == "Dosen") {
                                    echo "selected";
                                } ?> value="Dosen">Dosen</option>
        </select>
        </div>
      
        <div class="col-md-5 mb-3">
        <label for="exampleSelect">Program Studi</label>
        <select class="form-select" id="exampleSelect" name="prodi">
         
          <option <?php if ($data['prodi'] == "DIII Teknologi Informasi") {
                                    echo "selected";
                                } ?> value="DIII Teknologi Informasi">DIII Teknologi Informasi</option>
          <option  <?php if ($data['prodi'] == "DIII Ekowisata") {
                                    echo "selected";
                                } ?> value="DIII Ekowisata">DIII Ekowisata</option>
          <option <?php if ($data['prodi'] == "DIII Manajemen Perhotelan") {
                                    echo "selected";
                                } ?> value="DIII Manajemen Perhotelan">DIII Manajemen Perhotelan</option>
          <option  <?php if ($data['prodi'] == "DIV Manajemen Pemasaran Internasional") {
                                    echo "selected";
                                } ?> value="DIV Manajemen Pemasaran Internasional">DIV Manajemen Pemasaran Internasional</option>
          <option <?php if ($data['prodi'] == "DIV Pengelolaan Perhotelan") {
                                    echo "selected";
                                } ?> value="DIV Pengelolaan Perhotelan">DIV Pengelolaan Perhotelan</option>
          <option <?php if ($data['prodi'] == "DIV Akuntansi Perpajakan") {
                                    echo "selected";
                                } ?> value="DIV Akuntansi Perpajakan">DIV Akuntansi Perpajakan</option>
        </select>
        </div>
      </div>
      

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

<style>

.form-group {

    margin: 20px 0;

}

</style>
<?php unset($_SESSION["messageError"]); ?>

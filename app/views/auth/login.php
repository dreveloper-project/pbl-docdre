<?php session_start() ?>
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black mx-auto">
                <div class="d-flex align-items-center h-100 p-5">

                    <form action="<?php BASE_URL ?>login/check" method="post" style="width: 80%; margin: 0 auto; padding: 20px; border-radius: 10px; background-color: #fff; box-shadow: 0 0 10px #aaa;">

                        <div class="text-center mb-5">
                            <img src="<?= BASE_URL ?>/public/img/logo.png" style="width: 120px;">
                        </div>
                        <?php
                            if(isset($_SESSION["messageError"]["error"])){
    
                        ?>

                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            <?php
                                echo $_SESSION["messageError"]["error"];
                            ?>
                        </div>
                        </div>

                        <?php
                            }
                        ?>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nimField">Nomer Induk Mahasiswa / Dosen</label>
                            <?php if (isset($_SESSION["messageError"]['nomer_induk'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['nomer_induk']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <input name="nomor_induk" id="nimField" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="roleSelect">Pilih Jenis Akun:</label>
                            <?php if (isset($_SESSION["messageError"]['role'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['role']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <select name="role" id="roleSelect" class="form-select">
                                <option value="admin">Administrator</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>

                        <div class="form-outline mb-4" style="position: relative;">
                            <label class="form-label" for="form2Example27">Password</label>
                            <?php if (isset($_SESSION["messageError"]['password'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> <?php echo $_SESSION["messageError"]['password']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php } ?>
                            <input name="password" type="password" id="passwordField" class="form-control form-control-lg" />
                            <div class="toggle-password">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M19 12s-4 3-7 3-7-3-7-3 3-3 7-3 7 3 7 3z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                        </div>

                        <div class="pt-1 mb-4 text-center">
                            <button class="btn btn-maroon btn-lg" type="submit">Login</button>
                        </div>

                    </form>

                </div>





            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="<?= BASE_URL ?>public/img/cover-login.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>

<style>
    .password-container {
        position: relative;
        display: inline-flex;
        align-items: center;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 42px;
        /* Atur jarak dari sisi kanan */
        cursor: pointer;
    }

    #passwordField {
        padding-right: 30px;
        /* Tambahkan padding untuk membuat ruang untuk ikon */
        flex: 1;
    }


    .btn-maroon {
        background-color: #800000;
        border-color: #800000;
        color: #fff;
    }

    .btn-maroon:hover {
        background-color: snow;
        color: maroon;
        border-color: #b30000;
    }

    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
            height: 100%;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $('.toggle-password').on('click', function() {
            const passwordField = $($(this).prev());
            const fieldType = passwordField.attr('type');

            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $('.feather').css('fill', '#000');
            } else {
                passwordField.attr('type', 'password');
                $('.feather').css('fill', 'currentColor');
            }
        });
    });
</script>

<?php unset($_SESSION["messageError"]); ?>
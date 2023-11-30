 <!-- Skrip JavaScript untuk redirect -->
 <script type="text/javascript">
     window.location.href = "<?= BASE_URL ?>login";
 </script>
 <div class="container-fluid">
     <div class="row flex-nowrap">
         <div class="col-auto shadow  col-md-3 col-xl-2 px-sm-2 px-0 bg-light mt-2 mb-2 ml-4 rounded">
             <div id="aside" class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                 <img src="<?= BASE_URL ?>/public/img/logo.jpg" style="width: 170px; height: 170px; margin-bottom: 3rem !important;" alt="...">
                 <ul class="nav nav-pills flex-column mb-sm-auto mb-3 align-items-center align-items-sm-start" id="menu">
                     <li class="nav-item">
                         <a href="#" class="nav-link align-middle px-0">
                             </i> <span class="ms-1 d-none d-sm-inline">Home</span> <i class="fa fa-home" aria-hidden="true"></i>
                         </a>
                     </li>
                     <li>
                         <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                             </i> <span class="ms-1 d-none d-sm-inline">Dokumen</span> <i class="fa fa-file-text-o" aria-hidden="true"></i> </a>
                         <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                             <li class="w-100">
                                 <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Pribadi</span> </a>
                             </li>
                             <li>
                                 <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Surat Masuk</span> </a>
                             </li>
                         </ul>
                     </li>
                     <li>
                         <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                             </i> <span class="ms-1 d-none d-sm-inline">Notifikasi</span> <i class="fa fa-bell" aria-hidden="true"></i> </a>
                     </li>
                 </ul>
                 <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start" id="menu">
                     <li class="nav-item">
                         <a href="#" class="nav-link align-middle px-0">
                             </i> <span class="ms-1 d-none d-sm-inline">Log Out</span> <i class="fa fa-sign-out" aria-hidden="true"></i>
                         </a>
                     </li>
                 </ul>
                 <hr>

             </div>
         </div>
         <div class="col py-3">
             Content area...
         </div>
     </div>
 </div>

 <style>
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
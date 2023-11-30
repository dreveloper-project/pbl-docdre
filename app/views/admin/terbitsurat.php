 <form action="<?= BASE_URL ?>admin/terbit" method="post" Enctype="Multipart/Form-Data">
   <div class="mb-3">
     <label for="formFile" class="form-label" Accept="Application/Pdf">Upload Surat Tugas (Wajib PDF)</label>
     <input class="form-control"  name="fileinputan" type="file" id="formFile" required>
   </div>
   <div class="mb-3">
     <label for="deskripsi" class="form-label" Accept="Application/Pdf">Deskripsi</label>
     <input class="form-control" type="text" name="deskripsi" required>
  </div>
     <div id="cards" class="row ml-2"></div>

     <input id="targetarr" type="text" name="kumpulandatauser" value="" style="display :none;">
     <button onclick="isiArray()" type="submit">Kirim</button>
 </form>
 <table class="table table-bordered mt-2" id="userTable">
   <thead>
     <tr>
       <th>Nama User</th>
       <th>Role</th>
       <th>Nomor Induk</th>
       <th>Program Studi</th>
       <th>No. Telepon</th>
       <th>Aksi</th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($data as $row) : ?>
       <tr>

         <td><?php echo $row['nama_user']; ?></td>
         <td><?php echo $row['role']; ?></td>
         <td><?php echo $row['nomor_induk']; ?></td>
         <td><?php echo $row['prodi']; ?></td>
         <td><?php echo $row['nomor_telepon']; ?></td>
         <td>
           <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>

         </td>
       </tr>
     <?php endforeach; ?>
   </tbody>
 </table>
 <style>
   .ml-2 {
     margin-left: 2rem;
   }

   .card {
     color: white;
   }
 </style>
 <script>
   let data = []

   $(document).ready(function() {
     // Fungsi untuk menambahkan kartu
     function addCard(row) {
       var namaUser = row.find('td:eq(0)').text();
       var role = row.find('td:eq(1)').text();
       var nomorInduk = row.find('td:eq(2)').text();
       var programStudi = row.find('td:eq(3)').text();
       var nomorTelepon = row.find('td:eq(4)').text();

       var card = `
        <div class="card mt-2 col-sm-3 p-2 bg-success"> 
            <h5 class="card-title">${namaUser}</h5>
            <p class="card-text">Role: ${role}</p>
            <p class="card-text">Nomor Induk: ${nomorInduk}</p>
            <input type="text" name="${nomorInduk}" value="${namaUser}" style="display :none;">
            <button type="button" class=" btn-light btn-delete">Hapus</button>
        </div>
      `;

       data.push(namaUser);
       console.log(data);
       $('#cards').append(card);
     }

     // Menambahkan kartu saat tombol tambah diklik
     $('#userTable').on('click', 'button.btn-warning', function() {
       var row = $(this).closest('tr');

       // Memeriksa apakah data sudah ada di dalam kartu
       var nomorInduk = row.find('td:eq(2)').text();
       var isAlreadyAdded = $('#cards').find(`p:contains(${nomorInduk})`).length > 0;

       if (!isAlreadyAdded) {
         addCard(row);
       } else {
         alert('Data sudah ada di dalam kartu!');
       }
     });

     // Menghapus kartu saat tombol hapus di dalam kartu diklik
     $('#cards').on('click', 'button.btn-delete', function() {
       var row = $(this).closest('.card');
       var nomorInduk = row.find('h5').text();
       let index = data.indexOf(nomorInduk);
       while (index > -1) {
         data.splice(index, 1);
         index = data.indexOf(nomorInduk);
         console.log(data);

       }
       $(this).closest('.card').remove();
     });
   });


   function isiArray() {
     var arrayDataString = JSON.stringify(data)
     document.getElementById("targetarr").value = arrayDataString;
   }
 </script>
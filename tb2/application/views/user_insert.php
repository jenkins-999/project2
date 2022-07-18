   <form method="post" action="<?php echo site_url('user/insert_submit/'); ?>">
       <table class="form-group">
           <tr>
               <td>Nama pegawai</td>
               <td>
                   <select name="id_karyawan">
                       <?php foreach ($data_karyawan as $karyawan) : ?>
                           <option value="<?php echo $karyawan['nomor_pegawai']; ?>"><?php echo $karyawan['nama']; ?></option>
                       <?php endforeach; ?>
                   </select>
               </td>
           </tr>
           <tr>
               <td>Username</td>
               <td><input type="text" name="username" value="" required="" class="form-control"></td>
           </tr>
           <tr>
               <td>Password</td>
               <td><input type="password" name="password" value="" required="" class="form-control"></td>
           </tr>
           <tr>
               <td>Status</td>
               <td>
                   <select name="status">
                       <option value="admin">admin</option>
                       <option value="karyawan">karyawan</option>
                       <option value="manager">manager</option>
                   </select>
               </td>
           </tr>
       </table>
       <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
   </form>
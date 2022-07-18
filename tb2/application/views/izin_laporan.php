<title><?php echo $judul; ?></title>

<br>
<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
<br><br>

<form method="post" action="<?php echo site_url('izin/data_view'); ?>" class="ml-4">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bulan</label>
        <div class="col-sm-2">
            <select name="bulan" class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
    </div>
    <br>
    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">

</form>
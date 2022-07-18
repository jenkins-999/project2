<!-- The sidebar -->
<div id="sidebar" class="sidebar">
    <a class="content" href="<?php echo site_url('presensi/read') ?>"><span class="iconify" data-icon="akar-icons:calendar" data-width="24"></span> Presensi</a>
    <?php if ($this->session->userdata('status') == 'manager') : ?>
        <a class="content" href="<?php echo site_url('karyawan/read'); ?>"><span class="iconify" data-icon="heroicons-outline:user-group" data-width="24"></span>
            Karyawan</a>
    <?php endif; ?>
    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ?><span class="iconify" data-icon="icon-park-outline:permissions" data-width="24"></span>
        Pengajuan</a>
    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
        <a class="dropdown-item" href="<?php echo site_url('izin/read') ?>">Pengajuan Izin</a>
        <a class="dropdown-item" href="<?php echo site_url('cuti/read') ?>">Pengajuan Cuti</a>
    </div>
    <?php if ($this->session->userdata('status') == 'admin') : ?>
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ?><span class="iconify" data-icon="tabler:report" data-width="24"></span>
                Laporan</a>
            <div class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo site_url('presensi/laporan'); ?>">Laporan Presensi</a>
                <a class="dropdown-item" href="<?php echo site_url('izin/laporan'); ?>">Laporan Izin</a>
                <a class="dropdown-item" href="<?php echo site_url('cuti/laporan'); ?>">Laporan Cuti</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ?><span class="iconify" data-icon="tabler:report" data-width="24"></span>
                Chart</a>
            <div class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                <a class="content" href="<?php echo site_url('presensi/pie'); ?>"> Presensi Pie</a>
                <a class="content" href="<?php echo site_url('izin/pie'); ?>"> Izin Pie</a>
                <a class="content" href="<?php echo site_url('cuti/pie'); ?>"> Cuti Pie</a>
            </div>
        </div>

    <?php endif; ?>
    <?php if ($this->session->userdata('status') == 'manager') : ?>
        <a class="content" href="<?php echo site_url('karyawan/user'); ?>"> <span class="iconify" data-icon="bx:bx-user" data-width="24"></span>User</a>
    <?php endif; ?>
    <a class="logout content" href="<?php echo site_url('karyawan/login') ?>"><span class="iconify" data-icon="fa-solid:power-off" data-width="24"></span> Log out</a>
</div>
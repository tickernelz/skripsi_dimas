<?php
include('config.php');

$nim = $_GET['nim'];
$aksi = $_GET['aksi'];
$brks = $_GET['brks'];

if ($brks == 'srt_permohonan') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET srt_permohonan = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET srt_permohonan = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
} elseif ($brks == 'ktm') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET ktm = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET ktm = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
} elseif ($brks == 'transkip_nilai') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET transkip_nilai = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET transkip_nilai = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
} elseif ($brks == 'slip_ukt') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET slip_ukt = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET slip_ukt = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
} elseif ($brks == 'kartu_her') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET kartu_her = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET kartu_her = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
} elseif ($brks == 'krs_terakhir') {
    if ($aksi == 'Ditolak') {
        $sql_tolak = mysqli_query($koneksi, "UPDATE nilai_berkas SET krs_terakhir = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_tolak) {
            echo '<script>alert("Berkas Ditolak!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menolak Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    } elseif ($aksi == 'Setuju') {
        $sql_setuju = mysqli_query($koneksi, "UPDATE nilai_berkas SET krs_terakhir = '$aksi' WHERE nim = '$nim'") or die(mysqli_error($koneksi));
        if ($sql_setuju) {
            echo '<script>alert("Berkas Disetujui!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        } else {
            echo '<script>alert("Gagal Menyetujui Berkas!."); document.location="index.php?page=detail_berkas&nim=' . $nim . '";</script>';
        }
    }
}

?>

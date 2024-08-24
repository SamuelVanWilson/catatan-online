<?php use Project\Core\Flasher; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/src/css/style.css">
</head>
<body>
<?php if(isset($_SESSION['flash'])):?>
    <?= Flasher::alert() ?>
<?php endif; ?>

<?php if($navigasi == 'home'): ?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid d-flex gap-3 flex-nowrap justify-content-between">
    <form class="d-flex" method="post" action="<?= BASE_URL ?>home/caricatatan">
      <input name="judul" class="form-control me-2" type="search" placeholder="cari judul" aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666666"><path d="m779-128.5-247.98-248q-29.52 24-68.02 37.25T381.66-326q-106.13 0-179.65-73.45-73.51-73.46-73.51-179.5 0-106.05 73.45-179.55 73.46-73.5 179.5-73.5Q487.5-832 561-758.49q73.5 73.52 73.5 179.65 0 42.84-13.5 81.59T584-429l248 247.5-53 53ZM381.5-401q74.5 0 126.25-51.75T559.5-579q0-74.5-51.75-126.25T381.5-757q-74.5 0-126.25 51.75T203.5-579q0 74.5 51.75 126.25T381.5-401Z"/></svg>
      </button>
    </form>
    <a href="<?= BASE_URL ?>catatan/catatanBaru" class="bg-primary p-1 rounded h-full" >
      <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#F3F3F3"><path d="M443-246h75v-118h118v-75H518v-118h-75v118H325v75h118v118ZM244-90q-30.94 0-52.97-22.03Q169-134.06 169-165v-630q0-30.94 22.03-52.97Q213.06-870 244-870h316l231 230.5V-165q0 30.94-22.03 52.97Q746.94-90 716-90H244Zm279-512v-193H244v630h472v-437H523ZM244-795v193-193 630-630Z"/></svg>
    </a>
  </div>
</nav>
<?php endif; ?>

<?php if($navigasi == 'tambahCatatan'): ?>
  <nav class="navbar navbar-light bg-light pe-2">
    <a href="<?= BASE_URL ?>home" class="ps-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a>
  </nav>
<?php endif; ?>
<?php if($navigasi == 'catatan'): ?>
  <nav class="navbar navbar-light bg-light pe-2 sticky-top position-sticky">
    <button type="button" class="btn" id="saveBack"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#434343"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></button>
    <a href="<?= BASE_URL ?>catatan/hapus/<?=$dataCatatan['catatanId']?>" class="p-1 bg-danger rounded"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#F3F3F3"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a>
  </nav>
<?php endif; ?>
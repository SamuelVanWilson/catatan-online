<?php if($alert == 1): ?>
    <p class="text-center mt-3">pencet tombol pencarian lagi untuk menampilkan semua catatan</p>
<?php endif; ?>
<?php foreach ($catatanUser as $catatan): ?>
  <?php
    $previewKonten = substr($catatan['isi'], 0, 120);
    if (strlen($catatan['isi']) > 120) {
      $previewKonten .= '...';
    }
  ?>
  <div class="card m-3">
  <div class="card-body">
    <h5 class="card-title"><?= $catatan['judul'] ?></h5>
    <p class="card-text"><?= $previewKonten ?></p>
    <a href="<?=BASE_URL?>catatan/<?= $catatan['catatanId'] ?>" class="card-text" style="text-decoration: none;"><small class="text-muted">Klik Untuk Melihat >></small></a>
  </div>
</div>
<?php endforeach; ?>
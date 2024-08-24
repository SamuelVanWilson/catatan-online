<form class="form-floating" method="post" action="<?= BASE_URL ?>catatan/edit/<?= $dataCatatan['catatanId'] ?>">
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
  <input name="judul" type="text" autocomplete="off" value="<?= $dataCatatan['judul'] ?>" class="form-control border-0 border-bottom-1 fs-4 fw-bold rounded-0" id="floatingInputValue" placeholder="Judul Catatan">
  <label for="floatingInputValue" class="text-secondary">Judul</label>
  <hr class="mt-0 mb-1 mx-2">
  <div class="form-floating">
    <textarea name="isi" class="form-control border-0 rounded-0" placeholder="isi catatan" maxlength="5000" id="floatingTextarea2" style="height: 100vh"><?= $dataCatatan['isi'] ?></textarea>
  </div>
  <button type="submit" id="updateCatatan" hidden>Kirim</button>
</form>
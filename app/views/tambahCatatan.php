<form class="form-floating" method="post" action="<?= BASE_URL ?>catatan/tambah">
  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
  <input name="judul" type="text" autocomplete="off" class="form-control border-0 border-bottom-1 fs-4 fw-bold rounded-0" id="floatingInputValue" placeholder="Judul Catatan">
  <label for="floatingInputValue" class="text-secondary">Judul</label>
  <hr class="mt-0 mb-1 mx-2">
  <div class="form-floating">
    <textarea name="isi" class="form-control border-0 rounded-0" maxlength="5000" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 75vh"></textarea>
    <label for="floatingTextarea2" class="text-secondary">Isi catatan</label>
  </div>
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
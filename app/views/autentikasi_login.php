<div class="container p-4 d-flex justify-content-center align-items-center min-vh-100 flex-column">
  <div class="row text-center mb-4">
  <h1>LOGIN</h1>
  <p class="fs-6 px-4">Catatan Online - Productive App</p>
  </div>
  <form method="post" action="<?= BASE_URL ?>autentikasi/login" class=" row g-3 needs-validation d-flex flex-column" novalidate>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div class="col">
      <label for="validationCustomUsername" class="form-label">Username</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input name="nama" type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      </div>
      <div class="invalid-feedback">
          Nama user harus di isi
      </div>
    </div>
    <div class="col">
      <label for="validationCustom02" class="form-label">Password</label>
      <input name="sandi" type="password" class="form-control" id="validationCustom02" required>
      <div class="invalid-feedback">
          Password harus di isi
      </div>
    </div>
    <div class="col mt-4">
      <button class="btn btn-primary container-fluid" type="submit">Kirim</button>
    </div>
    <div class="col mt-2 d-flex justify-content-center fs-6">
      Belum punya akun?<a href="<?= BASE_URL?>autentikasi/daftar">Daftar</a>
    </div>
  </form>
</div>
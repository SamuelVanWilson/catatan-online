<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
    </div>
    <div class="invalid-feedback">
        Nama user harus di isi
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Password</label>
    <input type="password" class="form-control" id="validationCustom02" minlength="6" required>
    <div class="invalid-feedback">
        Password harus di isi dan minimal 6 kata
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
      <label class="form-check-label" for="invalidCheck">
        Remember Me (Opsional)
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Kirim</button>
  </div>
</form>
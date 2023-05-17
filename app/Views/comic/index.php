<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <a href="<?= base_url('comic/create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
      <h4>My Comic Collection</h4>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan') ?>
        </div>
      <?php endif ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          foreach ($comics as $key => $value) : ?>
            <tr>
              <th scope="row"><?= $key+1 ?></th>
              <td>
                <img src="<?= base_url('assets/static/images/samples/'.$value['cover']) ?>" class="img-fluid w-25" alt="sampul">
              </td>
              <td><?= $value['title'] ?></td>
              <td>
                <a href="<?= base_url('comic/'.$value['slug']) ?>" class="btn btn-success">Lihat</a>
              </td>
            </tr>
          <?php
            endforeach          
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div> 
<?= $this->endSection() ?>
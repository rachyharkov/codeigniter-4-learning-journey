<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-3">
  <div class="row">
    <div class="col">
      <h4>My Comic Collection</h4>
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
                <a href="#" class="btn btn-success">Lihat</a>
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
<?= $this->endSection() ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card mb-3 mx-auto mt-5" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
            <img src="<?= base_url('assets/static/images/samples/'.$comic['cover']) ?>" class="img-fluid h-100 rounded-start" alt="sampul">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $comic['title'] ?></h5>
                <p class="card-text"><b>Penulis : </b><?= $comic['author'] ?></p>
                <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $comic['publisher'] ?></small></p>
                <a href="<?= base_url('comic/edit/'.$comic['slug']) ?>" class="btn btn-warning">Edit</a>
                <form action="<?= base_url('comic/'.$comic['id']) ?>" method="post" class="d-inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                </form>
                <br><br>
                <a href="<?= base_url('comic') ?>">Kembali</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
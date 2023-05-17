<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <h2 class="my-3">Form Tambah Data</h2>
        <form action="/comic/save" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
            <small id="titleHelp" class="form-text text-muted">Masukkan Title komik.</small>
          </div>
          <div class="form-group">
            <label for="volume">Volume</label>
            <input type="number" class="form-control" id="volume" name="volume" aria-describedby="volumeHelp">
          </div>
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp">
            <small id="authorHelp" class="form-text text-muted">Masukkan nama Author komik.</small>
          </div>
          <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="publisherHelp">
            <small id="publisherHelp" class="form-text text-muted">Masukkan nama publisher.</small>
          </div>
          <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" class="form-control" id="cover" name="cover" aria-describedby="cover">
            <small id="cover" class="form-text text-muted">Masukkan nama file cover.</small>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" aria-describedby="descriptionHelp" name="description" rows="3"></textarea>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

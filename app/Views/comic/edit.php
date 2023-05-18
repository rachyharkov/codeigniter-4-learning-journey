<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <h2 class="my-3">Form Ubah Data</h2>
        <form action="/comic/update/<?= $comic['id'] ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <input type="hidden" name="slug" value="<?= (old('slug')) ? old('slug') : $comic['slug'] ?>">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control <?= (session('validation')?->hasError('title')) ? 'is-invalid' : '' ?>" id="title" name="title" aria-describedby="titleHelp" value="<?= (old('title')) ? old('title') : $comic['title'] ?>" autofocus>
            <div class="invalid-feedback">
              <?= session('validation')?->getError('title') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="volume">Volume</label>
            <input type="number" class="form-control  <?= (session('validation')?->hasError('volume')) ? 'is-invalid' : '' ?>" id="volume" name="volume" aria-describedby="volumeHelp" value="<?= (old('volume')) ? old('volume') : $comic['volume'] ?>">
            <div class="invalid-feedback">
              <?= session('validation')?->getError('volume') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control  <?= (session('validation')?->hasError('author')) ? 'is-invalid' : '' ?>" id="author" name="author" aria-describedby="authorHelp" value="<?= (old('author')) ? old('author') : $comic['author'] ?>">
            <div class="invalid-feedback">
              <?= session('validation')?->getError('author') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control  <?= (session('validation')?->hasError('publisher')) ? 'is-invalid' : '' ?>" id="publisher" name="publisher" aria-describedby="publisherHelp" value="<?= (old('publisher')) ? old('publisher') : $comic['publisher'] ?>">
            <div class="invalid-feedback">
              <?= session('validation')?->getError('publisher') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" class="form-control  <?= (session('validation')?->hasError('cover')) ? 'is-invalid' : '' ?>" id="cover" name="cover" aria-describedby="cover" value="<?= (old('cover')) ? old('cover') : $comic['cover'] ?>">
            <div class="invalid-feedback">
              <?= session('validation')?->getError('cover') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control  <?= (session('validation')?->hasError('description')) ? 'is-invalid' : '' ?>" id="description" aria-describedby="descriptionHelp" name="description" rows="3"><?= $comic['description'] ?></textarea>
            <div class="invalid-feedback">
              <?= session('validation')?->getError('description') ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

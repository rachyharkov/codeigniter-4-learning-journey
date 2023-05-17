<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <?= $this->include('layout/partial/styles') ?>
</head>

<body>

  <?= $this->include('layout/partial/navbar') ?>


  <?= $this->renderSection('content') ?>


  <?= $this->include('layout/partial/script') ?>
  </body>
</html>
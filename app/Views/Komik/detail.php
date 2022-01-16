<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <h2 class="my-4">Detail Komik</h2>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <p><?= $komik['sampul']; ?></p>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $komik['judul']; ?></h5>
                    <p class="card-text"><?= $komik['genre']; ?></p>
                    <p class="card-text"><small class="text-muted">Upload at <?= $komik['created_at']; ?></small></p>
                    <p class="card-text"><small class="text-muted">Last edit at <?= $komik['updated_at']; ?></small></p>
                    <a href="" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <a href="/komik">Kembali</a>
</div>
<?= $this->endSection(); ?>
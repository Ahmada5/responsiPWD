<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h2 class="my-2">TAMBAH DATA KOMIK</h2>
    <form action="/komik/save" method="post">
        <?= csrf_field(); ?>
        <?= $validation->listErrors(); ?>
        <div class="row mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="judul" name="judul" autofocus>
            </div>
        </div>

        <div class="row mb-3">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="genre" name="genre">
            </div>
        </div>
        <div class="row mb-3">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
        </div>
        <div class="row mb-3">
            <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="sampul" name="sampul">
            </div>
        </div>


        <button type="submit" class="btn btn-primary ml-auto">TAMBAH</button>


    </form>
</div>
<?= $this->endSection(); ?>
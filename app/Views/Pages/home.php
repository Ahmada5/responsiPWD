<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">

    <div class="jumbotron">
        <h1 class="display-4">Manga Desu!</h1>
        <p class="lead">Selamat Datang di Website Baca Manga Paling up to date Bahasa Indo .</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/auth/login" role="button">Login</a>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>
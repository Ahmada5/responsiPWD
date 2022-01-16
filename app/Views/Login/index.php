<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-5">
    <div class="card col-10 col-sm-5 mx-auto">
        <h5 class="card-header">LOGIN</h5>
        <div class="card-body p-5">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="login_validation" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id=" username" name="username">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id=" password" name="password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="btn btn-primary px-3 ms-auto" type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
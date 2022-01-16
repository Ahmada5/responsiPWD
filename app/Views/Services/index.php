<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="d-flex flex-column mt-5 gap-4">
        <a href="/json" class="btn btn-primary btn-lg btn-block">DATA JSON</a>
        <a href="/xml" class="btn btn-success btn-lg btn-block">DATA XML</a>
    </div>
</div>
<?= $this->endSection(); ?>
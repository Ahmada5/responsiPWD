<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <div class="d-flex">
        <form action="<?= base_url('/komik/cetak') ?>" method="POST" class="my-5">
            <button type=" submit" class="btn btn-success">Cetak</button>
        </form>
    </div>
    <form action="<?= base_url('/komik/search') ?>" method="post">
        <div class="form-group d-flex justify-content-center align-items-center px-5 w-50">
            <input type="text" name="judul" class="form-control mx-2">
            <button type="submit" class="ml-3 btn btn-primary px-4">CARI</button>
        </div>
    </form>
    <div class="d-flex">
        <a href="/komik/create" class="btn btn-primary mt-5">Tambah</a>
        <a href="/Auth/logout" class="btn btn-danger mt-5 ms-auto">Logout</a>
    </div>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">SAMPUL</th>
                <th scope="col">JUDUL</th>
                <th scope="col">GENRE</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($komik as $k) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $k['sampul']; ?></td>
                    <td><?= $k['judul']; ?></td>
                    <td><?= $k['genre']; ?></td>
                    <td class="d-flex gap-2"><a href="/komik/<?= $k['slug']; ?>" class="btn btn-success">Info</a>
                        <form action="/komik//<?= $k['id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">HAPUS</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
<?php $__env->startSection('title', 'Kelola Data Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">Daftar Koleksi Buku</h4>
            <p class="text-muted small mb-0">Kelola data buku dan sampul perpustakaan.</p>
        </div>
        <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Form Pencarian Buku Admin -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form action="<?php echo e(route('buku.index')); ?>" method="GET" class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul, penulis, atau penerbit..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data Buku -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>Sampul</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-3"><?php echo e($buku->firstItem() + $index); ?></td>
                                <!-- TODO 9: Kolom Thumbnail Sampul Buku -->
                                <td>
                                    <?php if($item->cover): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->cover)); ?>" alt="<?php echo e($item->judul); ?>" class="rounded border" style="width: 50px; height: 70px; object-fit: cover;">
                                    <?php else: ?>
                                        <span class="badge bg-secondary">No Cover</span>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-semibold"><?php echo e($item->judul); ?></td>
                                <td><?php echo e($item->penulis); ?></td>
                                <td><?php echo e($item->penerbit); ?></td>
                                <td><?php echo e($item->tahun_terbit); ?></td>
                                <td>
                                    <span class="badge <?php echo e($item->stok > 0 ? 'bg-success' : 'bg-danger'); ?>">
                                        <?php echo e($item->stok); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('buku.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?php echo e(route('buku.destroy', $item->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">Data buku tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <?php echo e($buku->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Karzael\Documents\TUGAS COOLYEAH\SMT3\PAW\Modul 4\PAW_MODUL4_GHERELL_102042500210\MODUL4_PRAKTIKUM-PAW\resources\views/buku/index.blade.php ENDPATH**/ ?>
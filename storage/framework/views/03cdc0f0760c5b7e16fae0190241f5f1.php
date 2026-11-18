<?php $__env->startSection('title', 'Katalog Koleksi Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Notifikasi Error (Contoh: Saat Mahasiswa ditolak RoleMiddleware) -->
    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="text-center mb-4">
        <h2 class="fw-bold">Katalog Koleksi Buku</h2>
        <p class="text-muted">Temukan dan pinjam buku referensi perkuliahan terbaikmu</p>
    </div>

    <!-- TODO 10: Formulir Pencarian Terpadu, Filter Stok, & Pengurutan -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('home')); ?>" method="GET" class="row g-2 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul, penulis..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-3">
                    <select name="penerbit" class="form-select">
                        <option value="">Semua Penerbit</option>
                        <?php if(isset($listPenerbit)): ?>
                            <?php $__currentLoopData = $listPenerbit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p); ?>" <?php echo e(request('penerbit') == $p ? 'selected' : ''); ?>><?php echo e($p); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="tersedia" <?php echo e(request('status') == 'tersedia' ? 'selected' : ''); ?>>Tersedia</option>
                        <option value="habis" <?php echo e(request('status') == 'habis' ? 'selected' : ''); ?>>Stok Habis</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="sort" class="form-select">
                        <option value="terbaru" <?php echo e(request('sort') == 'terbaru' ? 'selected' : ''); ?>>Urutkan: Terbaru</option>
                        <option value="judul" <?php echo e(request('sort') == 'judul' ? 'selected' : ''); ?>>Judul (A-Z)</option>
                        <option value="tahun" <?php echo e(request('sort') == 'tahun' ? 'selected' : ''); ?>>Tahun Terbit</option>
                        <option value="stok" <?php echo e(request('sort') == 'stok' ? 'selected' : ''); ?>>Stok Terbanyak</option>
                    </select>
                </div>
                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Grid Katalog Buku -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <?php if($item->cover): ?>
                        <img src="<?php echo e(asset('storage/' . $item->cover)); ?>" class="card-img-top" style="height: 240px; object-fit: cover;" alt="<?php echo e($item->judul); ?>">
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 240px;">
                            <span>Tidak Ada Sampul</span>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1"><?php echo e($item->judul); ?></h6>
                        <p class="text-muted small mb-2"><?php echo e($item->penulis); ?></p>
                        <span class="badge <?php echo e($item->stok > 0 ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($item->stok > 0 ? 'Tersedia (' . $item->stok . ')' : 'Stok Habis'); ?>

                        </span>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="<?php echo e(route('buku.publik.show', $item->id)); ?>" class="btn btn-outline-primary btn-sm w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <p class="text-center text-muted py-5">Buku tidak ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Navigasi Paginasi -->
    <div class="d-flex justify-content-center mt-3">
        <?php echo e($buku->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Karzael\Documents\TUGAS COOLYEAH\SMT3\PAW\Modul 4\PAW_MODUL4_GHERELL_102042500210\MODUL4_PRAKTIKUM-PAW\resources\views/home.blade.php ENDPATH**/ ?>
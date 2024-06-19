<?php if ($Table->hasFilters()) : ?>
<!-- Filter -->
<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" aria-label="Export data" data-bs-toggle="dropdown" data-bs-auto-close="outside" type="button" title="Export data" aria-expanded="false">
        <i class="bi bi-funnel">
            <?php if ($Table->isFiltered()) : ?>
            <span class="position-absolute top-10 start-80 translate-middle p-1 bg-warning rounded-circle"></span>
            <?php endif ?>
        </i>
        <span class="caret"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-end shadow" style="min-width: 400px; max-width: 400px;">
        <div class="px-3 py-1">

            <div class="d-flex justify-content-between">
                <span class="fs-6 fw-bold"><i class="bi bi-funnel pe-2"></i>Filter</span>
                <span><a href="<?= base_url() ?>" class="text-decoration-none text-danger">Reset</a></span>
            </div>

            <div><hr class="dropdown-divider"></div>

            <?php foreach($Table->getFilters() as $filter) : ?>
            <?= $filter ?>
            <?php endforeach ?>

            <div><hr class="dropdown-divider"></div>

            <div class="d-flex justify-content-between">
                <span class="fs-6 fw-bold"></span>
                <button class="btn btn-sm btn-primary" type="submit" form="form_<?= $Table->getId() ?>"><i class="bi bi-funnel pe-2"></i>Filtern</button>
            </div>

        </div>
    </div>
</div>
<?php endif ?>
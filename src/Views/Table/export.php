<!-- Exporter -->
<!-- ?php if ($Table->hasExporter()) : ? -->
<div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" aria-label="Export data" data-bs-toggle="dropdown" data-bs-auto-close="outside" type="button" title="Export data" aria-expanded="false">
        <i class="bi bi-download"></i>

        <span class="caret"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-end shadow" style="min-width: 200px;">
        <div class="px-3 py-1">

            <div class="d-flex justify-content-between">
                <span class="fs-6 fw-bold"><i class="bi bi-download me-2"></i></i></i>Export</span>
                <span><a href="<?= base_url() ?>" class="text-decoration-none text-danger"></a></span>
            </div>

            <div><hr class="dropdown-divider"></div>

            <div class="row mb-1">
                <a class="text-decoration-none text-reset" href="<?= $Table->getUriWithQuery('csv') ?>" data-type="csv"><i class="bi bi-filetype-csv me-2"></i>CSV</a>
            </div>

        </div>
    </div>
</div>
<!-- ?php endif ? -->


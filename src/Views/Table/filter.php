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
                <span><button class="btn btn-sm btn-link fw-bold text-danger text-decoration-none" id="<?= $Table->getId().'_filter_reset_button' ?>">reset</button></span>
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
    <script>

        function clearFilterFields()
        {
            var f = document.getElementById("form_<?= $Table->getId() ?>").elements;
            <?php foreach($Table->getFilters() as $filter) : ?>
            filterField = f.<?= $Table->getId().'_'.$filter->getId() ?>;
            if (filterField) {
                filterField.value = "";            
            } else {
                f.<?= $Table->getId().'_'.$filter->getId() ?>_enabledanddisabled.checked = true;
            }
            <?php endforeach ?>
        }

        document.getElementById('<?= $Table->getId().'_filter_reset_button' ?>').addEventListener("click", function(event){
            event.preventDefault()
            clearFilterFields()
        });

    </script>
</div>
<?php endif ?>


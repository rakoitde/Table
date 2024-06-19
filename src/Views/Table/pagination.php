<nav>
    <div class="d-flex flex-wrap justify-content-md-between justify-content-center justify-content-sm-center">

        <div>
            Datensatz <?= $pager->getRowPageStart() ?> bis <?= $pager->getRowPageEnd() ?> von <?= $pager->getTotalRows() ?>
        </div>

        <div class="mx-3">
            <div class="input-group input-group-sm">
                <span class="input-group-text">Pro Seite</span>
                <?= form_dropdown($perpagevar, $sizes, $pager->getCurrentSize(), 'class="form-select form-select-sm" onChange="this.form.submit();" form="' . $formId . '"');
            ?>
            </div>
        </div>

        <div>
            <input
                type="hidden"
                name="<?= $pagevar ?>"
                value="<?= $pager->getCurrentPage() ?>"
                form="<?= $formId ?>"
                >
            </input>
            <ul class="pagination pagination-sm text-secondary justify-content-end rounded">
                <?= $pager->getFirstLink() ?>
                <?= $pager->getPreviousLink() ?>
                <?= $pager->getPageLinks() ?>
                <?= $pager->getNextPageLink() ?>
                <?= $pager->getLastLink() ?>
            </ul>
        </div>
    </div>
</nav>
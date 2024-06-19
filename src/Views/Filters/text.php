<div class="row mb-1">
    <label for="<?= $filter->getId() ?>" class="col-sm-4 col-form-label"><?= $filter->getLabel() ?></label>
    <div class="col-sm-8">
        <input type="search"
            class ="form-control form-control-sm"
            id    ="<?= $filter->getId() ?>"
            <?= $filter->getNameAttribute() ?>
            <?= $filter->getValueAttribute() ?>
            form  ="<?= $filter->getFormId() ?>">
    </div>
</div>
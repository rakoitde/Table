<div class="row mb-1">
    <label for="<?= $filter->getId() ?>" class="col-sm-4 col-form-label"><?= $filter->getLabel() ?></label>
    <div class="col-sm-4">
        <input
            type="date"
            class="form-control form-control-sm"
            id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_from"
            <?= $filter->getNameAttribute('from') ?>
            <?= $filter->getValueAttribute('from') ?>
            form="<?= $filter->getFormId() ?>">
    </div>
    <div class="col-sm-4">
        <input
            type="date"
            class="form-control form-control-sm"
            id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_to"
            <?= $filter->getNameAttribute('to') ?>
            <?= $filter->getValueAttribute('to') ?>
            form="<?= $filter->getFormId() ?>">
    </div>
</div>
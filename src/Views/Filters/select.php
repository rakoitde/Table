<div class="row mb-1">
    <label for="<?= $filter->getId() ?>" class="col-sm-4 col-form-label"><?= $filter->getLabel() ?></label>
    <div class="col-sm-8">
        <select
            class="form-select form-select-sm"
            <?= $filter->getMultipleAttribute() ?>
            <?= $filter->getMultipleSizeAttribute() ?>
            id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>"
            <?= $filter->getNameAttribute(' ') ?>
            form="<?= $filter->getFormId() ?>">
            <!-- Options -->
            <?php if (!$filter->hasMultiple()) : ?>
            <option selected value></option>
            <?php endif ?>
            <?php foreach ($filter->getOptionsAsArray($filter->getValue()) as $key => $option) : ?>
            <option value="<?= $key ?>" <?= $option['_selected'] ?>><?= $option['_text'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
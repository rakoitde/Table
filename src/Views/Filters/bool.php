<div class="row mb-1">
    <label
        for="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_enabled"
        class="col-sm-4 col-form-label">
        <?= $filter->getLabel() ?>
    </label>
    <div class="col-sm-8 pt-2">
    <div class="form-check form-check-inline">
            <input
                class="form-check-input"
                type="radio"
                <?= $filter->getNameAttribute() ?>
                id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_enabled"
                value="true"
                <?= $filter->getValue() === 'true' ? 'checked' : '' ?>
                form="<?= $filter->getFormId() ?>">
            <label class="form-check-label" for="enabled">ja</label>
        </div>
        <div class="form-check form-check-inline">
            <input
                class="form-check-input"
                type="radio"
                <?= $filter->getNameAttribute() ?>
                id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_disabled"
                value="false"
                <?= $filter->getValue() === 'false' ? 'checked' : '' ?>
                form="<?= $filter->getFormId() ?>">
            <label class="form-check-label" for="disabled">nein</label>
        </div>
        <div class="form-check form-check-inline">
            <input
                class="form-check-input"
                <?= $filter->getNameAttribute() ?>
                type="radio"
                id="<?= $filter->getTableId() ?>_<?= $filter->getName() ?>_enabledanddisabled"
                value="null"
                <?= ! in_array($filter->getValue(), ['true', 'false'], true) ? 'checked' : '' ?>
                form="<?= $filter->getFormId() ?>">
            <label class="form-check-label" for="enabledanddisabled">aus</label>
        </div>

    </div>
</div>
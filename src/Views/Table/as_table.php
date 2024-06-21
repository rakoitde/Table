    <div class="overflow-auto">
    <table class="<?= $Table->getClasses() ?>" id="<?= $Table->getId() ?>">
        <!-- THead -->
        <thead>
            <tr>

            <!-- BulkActions -->
            <?php if ($Table->hasBulkActions()) : ?>
                <th class="text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bulkSelectAll" name="bulkSelectAll">
                    </div>
                </th>
            <?php endif ?>

            <!-- Columns -->
            <?php foreach ($Table->getColumns() as $column) : ?>
                <?php if($column->isVisible()) : ?>
                <th
                    class="text-nowrap <?= $Table->getId() ?>_column_<?= $column->getField() ?> <?= $column->getClasses('thead') ?>"
                    <?= $column->getToggleHiddenAttribute() ?>
                    >
                <?php if($column->isSortable()) : ?>
                    <input
                        type="hidden"
                        <?= $column->getNameAttribute() ?>
                        form="form_myTable"
                        value="<?= $column->getDirection() ?>">
                    </input>
                    <button
                        class="border-0 bg-transparent text-decoration-underline fw-bold p-0"
                        type="submit"
                        <?= $column->getNameAttribute() ?>
                        form="form_myTable"
                        value="<?= $column->getNextDirection() ?>">
                        <?= $column->getLabel() ?><?= $column->getDirectionIcon() ?>
                    </button>
                <?php else : ?>

                    <?= $column->getLabel() ?>
                <?php endif ?>
                </th>
                <?php endif ?>
            <?php endforeach ?>

            <!-- Actions or BulkActions -->
            <?php if ($Table->hasActions() || $Table->hasBulkActions()) : ?>
                <th class="text-center">
                    <div class="btn-group">
                    <?php foreach ($Table->getBulkActions() as $action) : ?>
                        <?php if ($action->isVisible()) : ?>
                        <?= $action ?>
                        <?php endif ?>
                    <?php endforeach?>
                    </div>
                </th>
            <?php endif ?>
            </tr>
        </thead>

        <!-- TBody -->
        <tbody>
            <?php $rows = $Table->getEntities(); ?>
            <?php if (count($rows) > 0) : ?>
            <?php foreach ($rows as $row) : ?>
            <tr data-id="<?= $row->{$primaryKey} ?>">

                <?php $rowArray = $row->toArray(); ?>

                <!-- BulkActions -->
                <?php if ($Table->hasBulkActions()) : ?>
                    <th class="text-center">
                        <div class="form-check">
                            <input class="form-check-input bulkselect" type="checkbox" value="<?= $row->{$primaryKey} ?>" name="select[<?= $row->{$primaryKey} ?>]" form="form_<?= $Table->getId() ?>">
                        </div>
                    </th>
                <?php endif ?>

                <!-- Columns -->
                <?php foreach ($Table->getColumns() as $column) : ?>
                <?php $column->Row($row) ?>
                <?php if($column->isVisible()) : ?>
                <td
                    class="<?= $Table->getId() ?>_column_<?= $column->getField() ?> <?= $column->getClasses('tbody') ?>"
                    <?= $column->getToggleHiddenAttribute() ?>
                    >
                    <?= $column->getValue() ?>
                </td>
                <?php endif ?>
                <?php endforeach ?>

                <!-- Actions or BulkActions -->
                <?php if ($Table->hasActions() || $Table->hasBulkActions()) : ?>
                    <th class="text-center">
                        <?php if ($Table->hasActions()) : ?>
                        <div class="btn-group">
                        <?php foreach ($Table->getActions() as $action) : ?>
                            <?php if ($action->isVisible()) : ?>
                            <?= $action->Row($row)->RowArray($rowArray) ?>
                            <?php endif ?>
                        <?php endforeach?>
                        </div>
                        <?php endif ?>
                    </th>
                <?php endif ?>
            </tr>
            <?php endforeach ?>
            <?php else : ?>
            <tr>
                <td colspan="<?= (string) (count($Table->getColumns()) + ($Table->hasActions() ? 1 : 0)); ?>" class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-emoji-frown mt-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.5 3.5 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.5 4.5 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                    </svg>
                    <p class="mt-2">Keine Datensätze gefunden!</p>
                </td>
            </tr>
            <?php endif ?>
        </tbody>

        <!-- TFoot -->
        <tfoot>
        <?php if ($Table->hasSummaries()) : ?>
            <tr>

            <!-- Columns -->
            <?php foreach ($Table->getColumns() as $column) : ?>
                <?php if($column->isVisible()) : ?>
                <th
                    class="<?= $Table->getId() ?>_column_<?= $column->getField() ?> <?= $column->getClasses('tfoot') ?>"
                    <?= $column->getToggleHiddenAttribute() ?>
                    ><?= $column->getLabel() ?>
                </th>
                <?php endif ?>
            <?php endforeach ?>

            <!-- Actions or BulkActions -->
            <?php if ($Table->hasActions() || $Table->hasBulkActions()) : ?>
                <th class="text-center">

                </th>
            <?php endif ?>
            </tr>

        <?php endif ?>
        </tfoot>

        <!-- Caption -->
        <?= $Table->hasCaption() ? '<caption>' . $Table->getCaption() . '</caption>' : '' ?>
    </table>
    </div>
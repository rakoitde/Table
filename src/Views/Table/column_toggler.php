                    <?php if ($Table->hasToggleableColumns()) : ?>
                    <!-- Columns Toggler -->
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-label="Columns" title="Columns" aria-expanded="true">
                            <i class="bi bi-list-ul"></i><span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end shadow" style="min-width: 200px;" id="<?= $Table->getId() ?>_column_toggler">
                            <div class="px-3 py-1">

                                <div class="d-flex justify-content-between">
                                    <span class="fs-6 fw-bold"><i class="bi bi-list-ul pe-2"></i>Spalten</span>
                                    <span><a href="<?= base_url() ?>" class="text-decoration-none text-danger">showAll</a></span>
                                </div>

                                <div><hr class="dropdown-divider"></div>

                                <input
                                    type="hidden"
                                    name="table[<?= $Table->getId() ?>][toggled]"
                                    value="1">

                                <!-- Columns -->
                                <?php foreach ($Table->getColumns() as $column) : ?>
                                    <?php if($column->isVisible() && $column->isToggleable()) : ?>
                                    <div class="row mb-1">
                                        <label>
                                            <input
                                                type="checkbox"
                                                data-field="<?= $column->getField() ?>"
                                                <?= $column->getToggleCheckedAttribute() ?>
                                                name="table[<?= $Table->getId() ?>][toggle][<?= $column->getField() ?>]"
                                                form="form_<?= $Table->getId() ?>"
                                                value="1"
                                                data-column="<?= $Table->getId() ?>_column_<?= $column->getField() ?>">
                                            <span><?= $column->getLabel() ?></span>
                                        </label>
                                    </div>
                                    <?php endif ?>
                                <?php endforeach ?>

                                <script>

                                    function toggleColumnVisability(columnClass, isShown) {
                                        let columns = document.getElementsByClassName(columnClass)
                                        Array.prototype.forEach.call(columns, function (column) {
                                            if (isShown) {
                                                column.removeAttribute('hidden')
                                            } else {
                                                column.setAttribute('hidden', true)
                                            }
                                        });
                                    }

                                    let myTableColumns = document.getElementById('myTable_column_toggler').querySelectorAll('input[type=checkbox]')
                                    myTableColumns.forEach(function (toggler) {
                                        toggler.addEventListener('click', function() {
                                            toggleColumnVisability(toggler.dataset.column, this.checked)
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                    <?php endif ?>
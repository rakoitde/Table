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
                                    <span><button href="<?= base_url() ?>" class="btn btn-sm btn-link fw-bold text-danger text-decoration-none text-nowrap" id="<?= $Table->getId().'_toggler_show_all_button' ?>">alle anzeigen</b></span>
                                </div>

                                <div><hr class="dropdown-divider"></div>

                                <input
                                    type="hidden"
                                    name="table[<?= $Table->getId() ?>][toggled]"
                                    value="1">

                                <!-- toggleable columns -->
                                <div id="<?= $Table->getId() ?>_toggler_toggleable_columns">
                                <?php foreach ($Table->getColumns() as $column) : ?>
                                    <?php if($column->isVisible() && $column->isToggleable()) : ?>
                                        <div class="form-check">
                                            <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    data-field="<?= $column->getField() ?>"
                                                    <?= $column->getToggleCheckedAttribute() ?>
                                                    name="table[<?= $Table->getId() ?>][toggle][<?= $column->getName() ?>]"
                                                    id="<?= $Table->getId() ?>_toggler_<?= $column->getName() ?>"
                                                    form="form_<?= $Table->getId() ?>"
                                                    value="1"
                                                    data-column="<?= $Table->getId() ?>_column_<?= $column->getName() ?>">
                                            <label class="form-check-label" for="<?= $Table->getId() ?>_toggler_<?= $column->getName() ?>">
                                            <?= $column->getLabel() ?>
                                            </label>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                                </div>
                            </div>
                        </div>
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

                            let myTableColumns = document.getElementById('<?= $Table->getId() ?>_column_toggler').querySelectorAll('input[type=checkbox]')
                            myTableColumns.forEach(function (toggler) {
                                toggler.addEventListener('click', function() {
                                    toggleColumnVisability(toggler.dataset.column, this.checked)
                                });
                            });

                            function showAllToggleableColumns()
                            {
                                let columnCheckboxes = document.querySelectorAll("#<?= $Table->getId() ?>_toggler_toggleable_columns input[type=checkbox]");
                                columnCheckboxes.forEach(function (checkbox) {
                                    checkbox.checked = true;
                                    toggleColumnVisability(checkbox.dataset.column, checkbox.checked)
                                }, this);
                            }

                            document.getElementById('<?= $Table->getId().'_toggler_show_all_button' ?>').addEventListener("click", function(event){
                                event.preventDefault()
                                showAllToggleableColumns()
                            });

                        </script>
                    </div>
                    <?php endif ?>
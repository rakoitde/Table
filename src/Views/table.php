
<?= $this->include('Rakoitde\Table\Views\Table\toolbar') ?>
<?= $this->include('Rakoitde\Table\Views\Table\as_table') ?>

<!-- Pagination -->
<?php if ($Table->hasPagination()) : ?>
<?= $Table->Pagination() ?>
<?php endif ?>

<!-- Modal -->
<?= $this->include('Rakoitde\Table\Views\Table\modal_confirm') ?>

<!-- BulkActions Script -->
<?php if ($Table->hasBulkActions()) : ?>
<script>
    document.getElementById('bulkSelectAll').addEventListener('change', function () {

        let selectAll = this.checked

        let checkboxes = document.querySelectorAll('.bulkselect');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selectAll;
        }, this);

    });
</script>
<?php endif ?>


<script>

function handleSubmit() {
    const form = document.getElementById('form_<?= $Table->getId() ?>');
    const formData = new FormData(form);
    const data = Array
        .from(formData.entries())
        .reduce((acc, [key, value]) => {
            acc[key] = value;
            return acc;
        }, {});
}
handleSubmit();

</script>
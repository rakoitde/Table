<!-- Toolbar Actions -->
<?php if ($Table->hasToolbarActions()) : ?>
<div class="btn-group float-right ms-2">
<?php foreach ($Table->getToolbarActions() as $toolbarAction) : ?>
    <?php if ($toolbarAction->isVisible()) : ?>
    <?= $toolbarAction ?>
    <?php endif ?>
<?php endforeach?>
</div>
<?php endif ?>
<<?= $tag ?>
	type="button"
	<?= $action->getHref() ?>
	id="<?= $id ?>"
	name="<?= $name ?>"
	<?= $action->getTargetAttribute() ?>
	class="<?= $classes ?> text-nowrap border-0"
	<?= $toggler ?>
>
<?= $action->getText() ?>
</<?= $tag ?>>
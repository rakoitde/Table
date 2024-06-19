<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <!-- Heading -->
        <?php if ($Table->hasHeading()) : ?>
        <div>
            <a class="navbar-brand" href="#"><?= $Table->getHeading() ?></a>
            <?php if ($Table->hasSubheading()) : ?>
            <p><?= $Table->getSubheading() ?></p>
            <?php endif ?>
        </div>
        <?php endif ?>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <!-- Search -->
            <form id="form_<?= $Table->getId() ?>" class="d-flex" name="toolbar">
                <input class="form-control me-2" type="search" name="<?= $Table->getSearchName() ?>" value="<?= $Table->getSearchString() ?>" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>

                <div class="btn-group float-right ms-2">

                    <?= $this->include('Rakoitde\Table\Views\Table\column_toggler') ?>

                    <?= $this->include('Rakoitde\Table\Views\Table\export') ?>

                    <?= $this->include('Rakoitde\Table\Views\Table\filter') ?>

                </div>
            </form>

        </div>
    </div>
</nav>
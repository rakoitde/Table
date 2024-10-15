<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid px-0">

        <!-- Heading -->
        <?php if ($Table->hasHeading()) : ?>
        <div>
            <span class="navbar-brand" href="#"><?= $Table->getHeading() ?></span>
            <?php if ($Table->hasSubheading()) : ?>
            <p><?= $Table->getSubheading() ?></p>
            <?php endif ?>
        </div>
        <?php endif ?>

        <!-- navbar toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
            <?php if ($Table->isFiltered()) : ?>
            <span class="position-absolute top-10 start-80 translate-middle p-1 bg-warning rounded-circle"></span>
            <?php endif ?>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <!-- Search -->
            <form id="form_<?= $Table->getId() ?>" class="d-flex" name="toolbar">

                <?php if ($Table->isSearchable()) : ?>
                <!-- ToDo: add config for placeholder and search fields -->
                <input class="form-control ms-2" type="search" name="<?= $Table->getSearchName() ?>" value="<?= $Table->getSearchString() ?>" placeholder="Search" aria-label="Search">
                <button class="btn btn-success ms-2" type="submit"><i class="bi bi-search"></i></button>
                <?php endif ?>

                <?= $this->include('Rakoitde\Table\Views\Table\toolbar_actions') ?>

                <div class="btn-group float-right ms-2">

                    <?= $this->include('Rakoitde\Table\Views\Table\column_toggler') ?>

                    <?= $this->include('Rakoitde\Table\Views\Table\export') ?>

                    <?= $this->include('Rakoitde\Table\Views\Table\filter') ?>

                </div>

                <!-- ToDo: add dynamic navigation actions -->

            </form>

        </div>
    </div>
</nav>
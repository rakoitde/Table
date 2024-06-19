<div class="fixed-table-toolbar">
    <div class="columns columns-right btn-group float-right">

        <div class="keep-open btn-group">
            <button class="btn btn-secondary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-label="Columns" title="Columns" aria-expanded="true">
                <i class="bi bi-list-ul"></i><span class="caret"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end show" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.8px, 40px, 0px);">
                <label class="dropdown-item dropdown-item-marker">
                    <input type="checkbox" data-field="name" value="0" checked="checked">
                    <span>Name</span>
                </label>
                <label class="dropdown-item dropdown-item-marker">
                    <input type="checkbox" data-field="star" value="1" checked="checked"> <span>Stars</span>
                </label>
                <label class="dropdown-item dropdown-item-marker">
                    <input type="checkbox" data-field="forks" value="2" checked="checked"> <span>Forks</span>
                </label>
                <label class="dropdown-item dropdown-item-marker">
                    <input type="checkbox" data-field="description" value="3" checked="checked">
                    <span>Description</span>
                </label>
            </div>
        </div>

        <div class="export btn-group">
            <button class="btn btn-secondary dropdown-toggle" aria-label="Export data" data-bs-toggle="dropdown" type="button" title="Export data" aria-expanded="false">
                <i class="bi bi-download"></i>

                <span class="caret"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end" style="">
                <a class="dropdown-item " href="#" data-type="json">JSON</a>
                <a class="dropdown-item " href="#" data-type="xml">XML</a>
                <a class="dropdown-item " href="#" data-type="csv">CSV</a>
                <a class="dropdown-item " href="#" data-type="txt">TXT</a>
                <a class="dropdown-item " href="#" data-type="sql">SQL</a>
                <a class="dropdown-item " href="#" data-type="excel">MS-Excel</a>
            </div>
        </div>

    </div>
    <div class="float-right search btn-group">
        <input class="form-control search-input" type="search" aria-label="Search" placeholder="Search" autocomplete="off">
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <span class="me-auto"></span>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <div class="btn-group float-right">
                <div class="btn-group ms-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-label="Columns" title="Columns" aria-expanded="true">
                        <i class="bi bi-list-ul"></i><span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.8px, 40px, 0px);">
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

                <div class="btn-group">
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

        </div>
    </div>
</nav>
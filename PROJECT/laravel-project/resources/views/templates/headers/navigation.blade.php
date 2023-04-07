<nav class="navbar navbar-expand-lg fixed-top shadow-sm bg-white" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand fw-bolder my-1 fs-4 fst-italic text-success" href="{{ url('/') }}">TokoIBIK</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Master Data
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li><a class="dropdown-item" href="{{ url('/master-data/products') }}">Products</a></li>
                        <li><a class="dropdown-item" href="{{ url('/master-data/users') }}">Users</a></li>
                    </ul>
                </li>

            </ul>

            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center align-items-center">
                    <li class="nav-item mx-2">
                        <a href="{{ url('/notifications') }}" class="nav-link">
                            <span class="fs-5 text-black text-opacity-25">
                                <i class="bi bi-bell-fill"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ url('/message') }}" class="nav-link">
                            <span class="fs-5 text-black text-opacity-25">
                                <i class="bi bi-chat-left-fill"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ url('./assets/media/icons/icon-boy-1.png') }}" alt="icon-user" width="35px" height="35px" class="bg-light p-1 rounded">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="px-8 py-2 border-bottom mb-2">
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                <img src="{{ url('./assets/media/icons/icon-boy-1.png') }}" alt="icon-user" width="50px" height="50px" class="bg-light p-1 rounded">
                                <div class="user ms-2">
                                    <p class="mb-0 fw-bolder d-flex align-items-center fs-6">Febry Fairuz</p>
                                    <span class="text-muted text-hover-primary fs-7">febrid@ibik.ac.id</span>
                                </div>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('/chart') }}">My Chart</a></li>
                            <li class="border-bottom my-2"></li>
                            <li><a class="dropdown-item" href="{{ url('/account-setting') }}">Account Setting</a></li>
                            <li><a class="dropdown-item" href="{{ url('/sign-out') }}">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

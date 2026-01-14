<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- SEO Meta Tags -->
    <title>
        <?= esc($meta_title ?? 'NotesLover: 100% Free Notes PDF | Govt & Tech Job Preparation') ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png') ?>">
    <meta name="description" content="<?= esc($meta_description ?? '') ?>">
    <meta name="keywords"
        content="<?= esc($meta_keywords ?? 'free handwritten notes pdf, government job exam notes, tech job exam notes, SSC notes pdf, UPSC handwritten notes, Railway exam notes, Banking exam notes, IT job preparation notes, software engineering notes pdf, NotesLover free study material, engineering handwritten notes pdf, computer science notes pdf, aptitude and reasoning notes pdf, general knowledge notes for exams, free pdf notes for tech exams') ?>">
    <link rel="canonical" href="<?= esc($canonical_url ?? current_url()) ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">

    <!-- Preload Important Assets -->
    <link rel="preload" as="style" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="preload" as="style" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="preload" as="image" href="<?= base_url('assets/img/logo-header.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- Google Analytics (Consent Mode) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KS06K6T6KP"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-KS06K6T6KP');
    </script>


    <!-- Minimal CSS for interactive elements -->
    <style>
    #search-suggestions a {
        cursor: pointer;
    }

    body,
    body h1 {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    body h1 {
        font-size: 2rem;
    }

    body .h6 {
        font-size: .8rem;
    }

    .btn-outline-primary:hover {
        color: #fff !important;
    }

    input::placeholder {
        color: #333;
        /* dark enough for WCAG 2 AA */
    }

    .text-muted {
        color: #4a4a4a !important;
        /* meets contrast */
    }

    /* Paragraphs */
    #latest-notes-description,
    #fresh-reads-description {
        color: #333;
    }

    /* Footer small links */
    .footer-item small,
    .btn-link small {
        color: #333;
    }

    /* Footer copyright */
    .text-white-50 {
        color: rgba(255, 255, 255, 0.8);
    }

    #search-input,
    input[type="email"] {
        background-color: #ffffff;
        color: #000000;
    }

    #search-input::placeholder,
    input[type="email"]::placeholder {
        color: #555555;
    }

    .mb-md-0 a {
        color: #ffffff;
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="bg-white container-fluid px-0 fixed-top" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important">
        <div class="container-fluid px-3">
            <nav class="navbar navbar-light bg-white navbar-expand-xl  py-0">
                <a href="<?= base_url('/') ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/img/logo-header.png') ?>" style="max-width: 50px"
                        alt="Notes Lover" />
                </a>
                <div class="d-flex d-md-none me-0 mobile_devicesearch">
                    <form class="input-group d-flex w-100" action="<?= base_url('notes') ?>">
                        <input class="form-control border-1 w-75 rounded-left" type="text" name="search"
                            id="search-input" placeholder="Search for notes..." autocomplete="off"
                            style="height: 40px; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                        <div id="search-suggestions" class="list-group position-absolute z-3 w-50"
                            style="top: 100%; max-height: 300px; overflow-y: auto; display: none; width: 100% !important">
                        </div>
                        <button id="search-icon-1" type="submit" class="input-group-text bg-dark text-white rounded"
                            style="border-top-left-radius: 0px !important;border-bottom-left-radius: 0px !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                viewBox="0 0 16 16" aria-hidden="true" focusable="false">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z">
                                </path>
                            </svg>
                        </button>
                    </form>
                    <a href="#" class="my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32" height="32"
                            fill="currentColor">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zM313.6 288h-16.7c-22.2 10.3-46.9 16-72.9 16s-50.7-5.7-72.9-16h-16.7C92.7 288 0 380.7 0 496c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16c0-115.3-92.7-208-134.4-208z" />
                        </svg>
                        <span class="visually-hidden">Search</span>
                    </a>
                </div>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="text-primary" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>

                <div class="navbar-collapse bg-white collapse py-2 px-2" id="navbarCollapse" style="">
                    <div class="navbar-nav ms-auto">
                        <?php if (!empty($header_categories)): ?>
                        <?php foreach ($header_categories as $category): ?>
                        <?php if (!empty($category['children'])): ?>
                        <!-- Category with Subcategories Dropdown -->
                        <div class="nav-item dropdown">
                            <a href="<?= base_url(esc($category['slug'])) ?>" class="nav-link"
                                data-bs-toggle="dropdown">
                                <?= esc($category['name']) ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M143 352.3L7 216.3C-2.3 207-2.3 192.9 7 183.6l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0L160 258.8l96.5-96.5c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L177 352.3c-9.4 9.4-24.6 9.4-34 0z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu m-0 bg-white rounded-0 shadow  py-0">
                                <?php foreach ($category['children'] as $sub): ?>
                                <a href="<?= base_url($category['slug'].'/' . esc($sub['slug'])) ?>"
                                    class="dropdown-item">
                                    <?= esc($sub['name']) ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <!-- Category without subcategories -->
                        <a href="<?= base_url(esc($category['slug'])) ?>" class="nav-item nav-link">
                            <?= esc($category['name']) ?>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="h_login_btn_group">
                            <div class="h_col_btn">
                                <div class="h_call_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                </div>
                                <div class="h_col_number">
                                    <span>Call</span>
                                    <a href="tel:+91-9124524522">+91-9124524522</a>
                                </div>
                            </div>
                            <a href="<?= base_url('become-a-partner') ?>" class="loginbtn">Sell Your Notes</a>
                            <a href="<?= base_url('login') ?>" class="loginbtn">Login</a>
                            <a href="javascript:void()" class="loginbtn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></a>
                        </div>

                    </div>
                    <div class="d-flex me-0 desktop_search">

                        <!-- <a href="<?= base_url('login') ?>" class="my-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32" height="32"
                                fill="currentColor">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zM313.6 288h-16.7c-22.2 10.3-46.9 16-72.9 16s-50.7-5.7-72.9-16h-16.7C92.7 288 0 380.7 0 496c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16c0-115.3-92.7-208-134.4-208z" />
                            </svg>
                            <span class="visually-hidden">User</span>
                        </a> -->
                    </div>
                </div>
                <!-- 
                        <form class="input-group d-flex" action="https://noteslover.com/notes" style="max-width:300px">
                            <input class="form-control border-1 w-75 py-3 px-4 rounded-left" type="text" name="search" id="search-input" placeholder="Search for notes..." autocomplete="off">
                            <div id="search-suggestions" class="list-group position-absolute z-3 w-50" style="top: 100%; max-height: 300px; overflow-y: auto; display: none; width: 100% !important"></div>
                            <button id="search-icon-1" type="submit" class="input-group-text p-3 bg-dark text-white rounded-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"></path>
                                </svg>
                            </button>
                        </form> -->

                <!-- <div class="d-flex m-3 me-0">
                            <a class="btn-search border border-dark btn-md-square rounded-circle bg-white me-4" href="<?= base_url('bookmarks') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="text-dark" aria-hidden="true" focusable="false">
                                    <path d="M2 2v13.5l5.5-3.5L13 15.5V2z"/>
                                </svg>
                            </a> -->
                <!-- <a href="#" class="position-relative me-4 my-auto text-secondary">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                            </a> -->
                <!-- <a href="#" class="my-auto text-dark">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div> -->
        </div>
        </nav>
    </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal global_search fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </button>
            <div class="modal-content">
                <div class="modal-body">
                    <form class="input-group d-flex w-100" action="<?= base_url('notes') ?>">
                        <input class="form-control border-1 w-75 rounded-left" type="text" name="search"
                            id="search-input" placeholder="Search for notes..." autocomplete="off">
                        <div id="search-suggestions" class="list-group position-absolute z-3 w-50"
                            style="top: 100%; max-height: 300px; overflow-y: auto; display: none; width: 100% !important">
                        </div>
                        <button id="search-icon-1" type="submit" class="seachbtn"
                            aria-label="Search" title="Search"
                            style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                viewBox="0 0 16 16" aria-hidden="true" focusable="false">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
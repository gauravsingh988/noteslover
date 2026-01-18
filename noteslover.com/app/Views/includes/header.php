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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
    <main class="mainsection">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <section class="header_main">
            <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
                <div class="container-fluid px-4">

                    <!-- Logo -->
                    <a href="<?= base_url('/') ?>" class="navbar-brand">
                        <img src="<?= base_url('assets/img/logo-header.png') ?>" style="max-width:50px"
                            alt="Notes Lover">
                    </a>
                    <a href="<?= base_url('login') ?>" class="mobile_login">Login</a>
                    <!-- Mobile Toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                            <!-- Dynamic Mega Menu -->
                            <?php if (!empty($header_categories)): ?>
                            <?php foreach ($header_categories as $category): ?>

                            <?php if (!empty($category['children'])): ?>
                            <li class="nav-item dropdown megadropdown">
                                <a class="nav-link dropdown-toggle" href="<?= base_url($category['slug']) ?>"
                                    role="button" data-bs-toggle="dropdown">
                                    <?= esc(strtolower($category['name'])) ?>
                                </a>

                                <ul class="dropdown-menu border-0 shadow-lg p-0">
                                    <div class="mega_menufull">
                                        <div class="container-fluid">
                                            <div class="row">

                                                <!-- LEFT: CATEGORY LIST -->
                                                <div class="col-lg-8">
                                                    <div class="row">

                                                        <?php
                                                    $chunks = array_chunk($category['children'], 5);
                                                    foreach ($chunks as $chunk):
                                                    ?>
                                                        <div class="col-lg-4">
                                                            <div class="mega_menulist">
                                                                <h5><?= esc($category['name']) ?></h5>
                                                                <ul>
                                                                    <?php foreach ($chunk as $sub): ?>
                                                                    <li>
                                                                        <a
                                                                            href="<?= base_url($category['slug'].'/'.$sub['slug']) ?>">
                                                                            <?= esc($sub['name']) ?>
                                                                        </a>
                                                                    </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>

                                                    </div>
                                                </div>

                                                <!-- RIGHT: IMAGE -->


                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <?php else: ?>
                            <!-- Normal Menu Item -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url($category['slug']) ?>">
                                    <?= esc($category['name']) ?>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>

                        <!-- Right Side Buttons -->
                        <div class="d-flex h_login_btn_group">

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
                                data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg></a>
                        </div>

                    </div>
                </div>
            </nav>
        </section>



        <!-- Navbar start -->
        <div class="bg-white container-fluid px-0 d-none" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
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
                                    data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
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
                            <button id="search-icon-1" type="submit" class="seachbtn" aria-label="Search" title="Search"
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




        <div class="mobile-services">
            <div class="mobile_menu_list">
                <ul>
                    <li class="appointments-li">
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                            <p>Become A Vendor</p>
                        </a>
                    </li>
                    <li class="help-support">
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg>
                            <p>Support</p>
                        </a>
                    </li>
                    <li class="mobile-menu">
                        <a href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-justify-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                            </svg>
                            <p>Notes</p>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- mobile menu panel -->
            <div class="mobile-notice-panel">
                <a href="javascript:void(0)" class="close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                    </svg>
                </a>

                <div class="mobile_menu">
                    <div class="mobile_search">
                        <form class="input-group d-flex w-100" action="<?= base_url('notes') ?>">
                            <input class="form-control border-1 w-75 rounded-left" type="text" name="search"
                                id="search-input" placeholder="Search for notes..." autocomplete="off">
                            <div id="search-suggestions" class="list-group position-absolute z-3 w-50"
                                style="top: 100%; max-height: 300px; overflow-y: auto; display: none; width: 100% !important">
                            </div>
                            <button id="search-icon-1" type="submit" class="seachbtn btn btn-danger" aria-label="Search"
                                title="Search"
                                style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16" aria-hidden="true" focusable="false">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="accordion" id="accordionCategories">

                        <?php if (!empty($header_categories)): ?>
                        <?php foreach ($header_categories as $index => $category): ?>

                        <?php
                                $headingId  = 'heading'.$index;
                                $collapseId = 'collapse'.$index;
                            ?>

                        <div class="accordion-item">

                            <!-- Accordion Header -->
                            <h2 class="accordion-header" id="<?= $headingId ?>">
                                <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>"
                                    aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>"
                                    aria-controls="<?= $collapseId ?>">
                                    <?= esc($category['name']) ?>
                                </button>
                            </h2>

                            <!-- Accordion Body -->
                            <div id="<?= $collapseId ?>"
                                class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>"
                                aria-labelledby="<?= $headingId ?>" data-bs-parent="#accordionCategories">

                                <div class="accordion-body p-0">

                                    <?php if (!empty($category['children'])): ?>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($category['children'] as $sub): ?>
                                        <li class="list-group-item">
                                            <a href="<?= base_url($category['slug'].'/'.esc($sub['slug'])) ?>">
                                                <?= esc($sub['name']) ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php else: ?>
                                    <div class="p-3">
                                        <a href="<?= base_url(esc($category['slug'])) ?>" class="text-decoration-none">
                                            View <?= esc($category['name']) ?>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>

                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- help support panel -->
        <div class="help-suppoert-panel">
            <a href="javascript:void(0)" class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>

            <div class="mobile_support">
                <div class="mobil_logo_sec">
                    <a href="<?= base_url('/') ?>">
                        <img src="<?= base_url('assets/img/logo-header.png') ?>" style="max-width:90px"
                            alt="Notes Lover">
                    </a>
                </div>
                <div class="support_sec">
                    <h5>Support</h5>
                    <div class="supprt_call">
                        <div class="su_iconsec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </div>
                        <div class="su_numer">
                            <a href="mailto:support@noteslover.com">support@noteslover.com</a>
                        </div>
                    </div>
                    <div class="supprt_email">
                        <div class="su_iconsec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-telephone" viewBox="0 0 16 16">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                            </svg>
                        </div>

                        <div class="su_numer">
                            <a href="tel:+91 9807763330">+91 9807763330</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- appointment panel -->
        <div class="appointment-panel">
            <a href="javascript:void(0)" class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>
            <ul>
                <li><a href="javascript:void(0)">Comming Soon</a></li>
            </ul>
        </div>

        <!-- call panel -->
        <div class="call-panel">
            <a href="javascript:void(0)" class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>
        </div>


        <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Helpers
            function hideAllPanels() {
                document.querySelector(".mobile-notice-panel")?.classList.remove("active");
                document.querySelector(".help-suppoert-panel")?.classList.remove("active");
                document.querySelector(".appointment-panel")?.classList.remove("active");
                document.querySelector(".call-panel")?.classList.remove("active");
            }

            // Menu
            document.querySelector(".mobile-menu")?.addEventListener("click", function() {
                hideAllPanels();
                document.querySelector(".mobile-notice-panel")?.classList.add("active");
            });

            // Help Support
            document.querySelector(".help-support")?.addEventListener("click", function() {
                hideAllPanels();
                document.querySelector(".help-suppoert-panel")?.classList.add("active");
            });

            // Appointment
            document.querySelector(".appointments-li")?.addEventListener("click", function() {
                hideAllPanels();
                document.querySelector(".appointment-panel")?.classList.add("active");
            });

            // Call
            document.querySelector(".call-li")?.addEventListener("click", function() {
                hideAllPanels();
                document.querySelector(".call-panel")?.classList.add("active");
            });

            // Close buttons
            document.querySelectorAll(".close-btn").forEach(btn => {
                btn.addEventListener("click", function() {
                    hideAllPanels();
                });
            });

        });
        </script>
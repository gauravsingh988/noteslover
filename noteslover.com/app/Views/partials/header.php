<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- SEO Meta Tags -->
    <title>
        <?= esc($meta_title ?? 'Government Job Exam Notes - Handwritten SSC, UPSC, Banking & Railway Notes | NotesLover') ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="<?= esc($meta_description ?? 'Download comprehensive handwritten notes specially curated for government job exams like SSC, UPSC, Banking, and Railway. Easy-to-understand study material for quick revision and exam success. NotesLover helps you prepare better!') ?>">
    <meta name="keywords"
        content="<?= esc($meta_keywords ?? 'Government Job Exam Notes, Handwritten Notes, SSC Notes, UPSC Notes, Banking Exam Notes, Railway Exam Notes, Java Notes, DBMS Notes, Networking Notes, Computer Science Notes, NotesLover') ?>">
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

    .btn-outline-primary:hover {
        color: #fff !important;
    }
    #search-input::placeholder {
  color: #495057; /* darker gray, ratio ~7.3:1 */
  opacity: 1; /* ensure browsers don't fade it */
}
a.text-light {
  text-decoration: underline;
  text-decoration-thickness: 1.5px;
}
a.text-light:hover, 
a.text-light:focus {
  text-decoration: none;
  color: #fff; /* optional hover color */
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
                    <div class="navbar-nav mx-auto">
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
                                    class="dropdown-item text-dark">
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
                        <a href="<?= base_url('contact') ?>" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex me-0 desktop_search">
                        <form class="input-group d-flex w-100" action="<?= base_url('notes') ?>">
                            <input class="form-control border-1 w-75 rounded-left" type="text" name="search"
                                id="search-input" placeholder="Search for notes..." autocomplete="off"
                                style="height: 40px; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                            <div id="search-suggestions" class="list-group position-absolute z-3 w-50"
                                style="top: 100%; max-height: 300px; overflow-y: auto; display: none; width: 100% !important">
                            </div>
                            <button 
                              id="search-icon-1" 
                              type="submit" 
                              class="input-group-text bg-dark text-white rounded"
                              aria-label="Search"
                              title="Search"
                              style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;"
                            >
                              <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="20" 
                                height="20" 
                                fill="currentColor"
                                viewBox="0 0 16 16" 
                                aria-hidden="true" 
                                focusable="false"
                              >
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.44.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
                              </svg>
                            </button>
                        </form>
                        <a href="#" class="my-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="32" height="32"
                                fill="currentColor">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zM313.6 288h-16.7c-22.2 10.3-46.9 16-72.9 16s-50.7-5.7-72.9-16h-16.7C92.7 288 0 380.7 0 496c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16c0-115.3-92.7-208-134.4-208z" />
                            </svg>
                        </a>
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
    <!-- Navbar End -->
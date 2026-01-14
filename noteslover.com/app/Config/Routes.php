<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// ✅ All /notes routes should come first
$routes->get('/notes', 'NoteController::index');
$routes->get('/notes/download/(:segment)', 'NoteController::download/$1'); // Must come before /notes/(:any)
$routes->get('/notes/(:any)', 'NoteController::details/$1');
$routes->post('/notes/report/(:any)', 'NoteController::markReport/$1');

// ✅ Other specific routes
$routes->post('/submitrating/(:any)', 'NoteController::submitRating/$1');
$routes->get('/about', 'HomeController::about');
$routes->get('/faqs', 'HomeController::faqs');
$routes->get('/contact', 'HomeController::contact');
$routes->post('/contact', 'HomeController::contact');
$routes->get('/mentors', 'MentorController::index');
$routes->get('/mentor/(:any)', 'MentorController::view_mentor_profile/$1');
$routes->post('/subscribe', 'SubscriberController::store');
$routes->post('request-notes', 'HomeController::requestNotes');

// Partner Form Page
$routes->get('become-a-partner', 'PartnerController::index');
$routes->post('partner/submit', 'PartnerController::submit');


// ✅ Grouped actions for notes
$routes->group('notes', function($routes) {
    $routes->post('like', 'NoteController::like');
    $routes->post('dislike', 'NoteController::dislike');
    $routes->post('save_unsave', 'NoteController::saveUnsave');
});

// ✅ Auth
$routes->get('/login', 'AuthController::login');
$routes->post('/login-check', 'AuthController::loginCheck');
$routes->get('register', 'AuthController::register');          
$routes->post('register-save', 'AuthController::registerSave'); 
$routes->post('/send-otp', 'AuthController::sendOtp');
$routes->post('/verify-otp', 'AuthController::verifyOtp');
$routes->get('/logout', 'AuthController::logout');

// ✅ Autocomplete & Info Pages
$routes->get('/search-autocomplete', 'NoteController::autocomplete');
$routes->get('/privacy-policy', 'HomeController::privacy_policy');
$routes->get('/terms-and-condition', 'HomeController::terms_and_conditions');

// ✅ Blogs & Success Stories
$routes->get('/success-stories', 'PostController::index');
$routes->get('/success-stories/(:any)', 'PostController::details/$1');

$routes->get('/model-papers', 'PostController::model_paper_index');
$routes->get('/model-papers/(:any)', 'PostController::model_paper_details/$1');

$routes->get('/blogs', 'PostController::blog_index');
$routes->get('/blogs/(:any)', 'PostController::blog_details/$1');


$routes->get('/model-papers', 'PostController::model_paper_index');
$routes->get('/model-papers/(:any)', 'PostController::model_paper_details/$1');
$routes->get('sitemap.xml', 'SitemapController::index');

// ✅ LAST: Generic fallback routes (category/subcategory)
$routes->get('/(:segment)/(:segment)', 'NoteController::subcategory/$1/$2');
$routes->get('/(:segment)', 'NoteController::category/$1');

// ✅ Custom 404
$routes->setAutoRoute(false);
$routes->get('test-error', 'ErrorsController::show404');
$routes->set404Override('\App\Controllers\ErrorsController::show404');

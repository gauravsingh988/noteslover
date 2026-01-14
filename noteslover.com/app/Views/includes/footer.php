<!-- Footer Start -->
<link href="https://fonts.googleapis.com/css2?family=Saira:wght@100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
<div class="footer_main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <a href="<?= base_url('/') ?>" class="footer_logo">
                    <img src="<?= base_url('assets/img/logo-header.png') ?>" alt="Logo">
                    <div>
                        <h2>NotesLover</h2>
                        <p>Learn. Download. Grow.</p>
                    </div>
                </a>
                <div class="f_address">
                    <p>NotesLover HQ, Hitkari Nagar, Kakadeo, Kanpur, <br> Uttar Pradesh 208025</p>
                </div>
                <div class="f_contentse">
                    <div class="f_con_mobilesec">
                        <div class="f_con_iconsec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-phone" viewBox="0 0 16 16">
                                <path
                                    d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                        </div>
                        <div class="f_con_numsec">
                            <div class="f_mobile_name">Mobile</div>
                            <div class="f_mobile_nub">
                                <a href="tel:+91 9807763330">+91 9807763330</a>
                            </div>
                        </div>
                    </div>
                    <div class="f_con_mobilesec">
                        <div class="f_con_iconsec">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </div>
                        <div class="f_con_numsec">
                            <div class="f_mobile_name">Email</div>
                            <div class="f_mobile_nub">
                                <a href="mailto:support@noteslover.com">support@noteslover.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <ul class="fmenu_links">
                    <h6>Quick Links</h6>
                    <li> <a class="btn-link" href="<?= base_url('about') ?>">About Us</a></li>
                    <li><a class="btn-link" href="<?= base_url('contact') ?>">Contact Us</a></li>
                    <li> <a class="btn-link" href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
                    <li> <a class="btn-link" href="<?= base_url('terms-and-condition') ?>">Terms & Conditions</a>
                    </li>
                    <li> <a class="btn-link" href="<?= base_url('faqs') ?>">FAQs</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <ul class="fmenu_links">
                    <h6>Top Categories</h6>
                    <?php if (!empty($footer_categories)): ?>
                    <?php foreach ($footer_categories as $category): ?>
                    <li> <a href="<?= base_url(esc($category['slug'])) ?>" class="btn-link">
                            <?= esc($category['name']) ?>
                        </a></li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-lg-4">
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success mt-3"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-3"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <div class="news_let_sec">
                    <h6>Subscribe</h6>
                    <form class="form_group" method="post" action="<?= base_url('/subscribe') ?>">
                        <input class="form-control" type="email" name="email"
                            placeholder="Enter your email" required>
                        <button type="submit" class="btn">Subscribe</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="row d-none">
            <div class="col-lg-3 col-md-6 ">
                <div class="footer-item">
                    <h6 class="mb-3">Why NotesLover?</h6>
                    <small class="mb-4" style="color: #333">NotesLover provides high-quality academic resources,
                        curated
                        notes, and digital downloads for students and professionals alike - 100% verified,
                        up-to-date,
                        and easy to access.</small>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-item" style="color: #333">
                    <h6 class="mb-3">Get in Touch</h6>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M192 0C86 0 0 86 0 192c0 77.4 99.1 202.3 146.1 256.2a40.6 40.6 0 0 0 59.8 0C284.9 394.3 384 269.4 384 192 384 86 298 0 192 0zm0 272a80 80 0 1 1 0-160 80 80 0 0 1 0 160z" />
                        </svg>
                        <small>NotesLover HQ, Hitkari Nagar, Kakadeo, Kanpur, Uttar Pradesh 208025</small>
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"
                            fill="currentColor">
                            <path
                                d="M466 61H46C20.6 61 0 81.6 0 107v298c0 25.4 20.6 46 46 46h420c25.4 0 46-20.6 46-46V107c0-25.4-20.6-46-46-46zm0 52L256 293 46 113V107l210 180 210-180v6z" />
                        </svg>
                        <small>support@noteslover.com</small>
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M497.4 361.8l-99.9-42.9a23.9 23.9 0 0 0-28 6.9l-43.6 53.1a370.9 370.9 0 0 1-177.6-177.6l53.1-43.6a23.9 23.9 0 0 0 6.9-28L150.2 14.6A24 24 0 0 0 121.7 0H24C10.7 0 0 10.7 0 24c0 270.7 219.3 490 490 490 13.3 0 24-10.7 24-24v-97.7c0-10.2-6.2-19.3-16.6-23.5z" />
                        </svg>
                        <small>+91 9807763330</small>
                    </p>
                    <!-- <p>
                        <small>Payment Methods</small>
                    </p>
                    <img src="<?= base_url('assets/img/payment.png') ?>" class="img-fluid" alt="Payment Methods"> -->
                </div>
            </div>
        </div>

    </div>
    <?php if (uri_string() == ''): ?>
    <section class="container-fluid">
        <div class="row">
            <!-- About Section -->
            <div class="f_about_section">
                <h2>About NotesLover</h2>
                <p>
                    <strong>NotesLover</strong> is a trusted platform for students looking for high-quality
                    <strong>handwritten and printable notes</strong> for school subjects, entrance exams, and government
                    job preparation.
                    We support learners preparing for <strong>SSC, UPSC, NEET, JEE, IIT</strong>, and more with
                    simplified and effective study material.
                </p>
                <p>
                    Our mission is to make exam preparation easier by providing clean, structured, and quick-to-revise
                    content.
                    Most resources are available for <strong>free</strong>, while select content is offered under an
                    affordable <strong>premium</strong> plan.
                </p>
            </div>

            <!-- Why Choose Us -->
            <div class="f_about_section">
                <h2>Why Choose NotesLover for Exam Preparation</h2>
                <p>
                    NotesLover stands out for its student-first approach and well-organized resources designed to boost
                    success in school and competitive exams.
                </p>
                <ul>
                    <li></i> All major courses covered – Class 6 to 12,
                        Engineering, Medical</li>
                    <li></i> Government exam prep – SSC, UPSC, Banking,
                        Railway & more</li>
                    <li></i> Entrance exam support – JEE, NEET, IIT, NDA, etc.
                    </li>
                    <li></i> Expert tips for interviews and personality tests
                    </li>
                    <li></i> Free access to most content with premium options
                        for deeper learning</li>
                </ul>
            </div>

            <!-- Focus Areas -->
            <div class="f_about_section">
                <h2>Core Focus Areas of NotesLover</h2>
                <p>
                    We are focused on delivering reliable, student-friendly, and exam-oriented resources that save time
                    and improve performance.
                    Our materials support both conceptual understanding and quick revision.
                </p>
                <ul>
                    <li></i> Handwritten notes across all subjects and classes
                    </li>
                    <li></i> Printable and easy-to-read downloadable PDFs</li>
                    <li></i> Study material aligned with SSC, UPSC, NEET, JEE,
                        IIT, etc.</li>
                    <li></i> Smart tricks, revision strategies, and interview
                        preparation</li>
                    <li></i> Regularly updated notes based on the latest
                        syllabus and patterns</li>
                </ul>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="copy_right_main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p> © <?= date('Y') ?> <a href="https://noteslover.com/">Notes Lover</a>. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-dark border-3 border-dark rounded-circle back-to-top">
    <svg class="icon-arrow-up" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"
        aria-hidden="true" focusable="false">
        <path fill-rule="evenodd"
            d="M8 12a.5.5 0 0 0 .5-.5V4.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4-.007-.007a.498.498 0 0 0-.7.007l-4 4a.5.5 0 1 0 .708.708L7.5 4.707V11.5A.5.5 0 0 0 8 12z" />
    </svg>
    <span class="visually-hidden">Back to top</span>
</a>
<div id="cookieBar" style="
  position:fixed;
  bottom:0;
  width:100%;
  background:#222;
  color:#fff;
  font-size:13px;
  padding:10px;
  display:none;
  z-index:9999;
  text-align:center;
">
    We use privacy-friendly analytics to improve our website.
    <a href="<?= base_url('privacy-policy'); ?>" style="color:#4da6ff;">Learn more</a>

    <button onclick="acceptCookies()" style="margin-left:10px;">Accept</button>
    <button onclick="rejectCookies()">Reject</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const alert = document.querySelector('.alert');
    if (alert) {
        alert.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('search-input');
    const suggestionsBox = document.getElementById('search-suggestions');

    let debounceTimer;

    input.addEventListener('input', function() {
        clearTimeout(debounceTimer);

        const query = this.value.trim();

        if (query.length < 2) {
            suggestionsBox.style.display = 'none';
            suggestionsBox.innerHTML = '';
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch(`<?= base_url('search-autocomplete') ?>?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    suggestionsBox.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(item => {
                            const option = document.createElement('a');
                            option.href = "<?= base_url('notes') ?>/" + item.slug;
                            option.className =
                                'list-group-item list-group-item-action';
                            option.textContent = item.title;
                            suggestionsBox.appendChild(option);
                        });
                        suggestionsBox.style.display = 'block';
                    } else {
                        suggestionsBox.style.display = 'none';
                    }
                });
        }, 300); // debounce delay
    });

    document.addEventListener('click', function(e) {
        if (!suggestionsBox.contains(e.target) && e.target !== input) {
            suggestionsBox.style.display = 'none';
        }
    });
});
// Open popup when button is clicked
document.getElementById('requestNotesBtn').addEventListener('click', () => {
    document.getElementById('requestNotesPopup').style.display = 'flex';
});

// Close popup
document.querySelector('.popup-close').addEventListener('click', () => {
    document.getElementById('requestNotesPopup').style.display = 'none';
});

// Handle form submission (AJAX example)
document.getElementById('requestNotesForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('<?= base_url('request-notes') ?>', { // replace with your backend endpoint
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            this.style.display = 'none';
            document.getElementById('requestSuccess').style.display = 'block';
        })
        .catch(err => {
            alert('Something went wrong. Please try again later.');
        });
});
(function() {
    if (!localStorage.getItem('cookie_consent')) {
        document.getElementById('cookieBar').style.display = 'block';
    }
})();

function acceptCookies() {
    gtag('consent', 'update', {
        analytics_storage: 'granted'
    });
    localStorage.setItem('cookie_consent', 'accepted');
    document.getElementById('cookieBar').style.display = 'none';
}

function rejectCookies() {
    gtag('consent', 'update', {
        analytics_storage: 'denied'
    });
    localStorage.setItem('cookie_consent', 'rejected');
    document.getElementById('cookieBar').style.display = 'none';
}
</script>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
</body>

</html>
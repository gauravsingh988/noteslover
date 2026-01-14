<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Contact Us</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">Conact Us@</li>
    </ol>
</div>

<!-- Contact Start -->
<div class="contact_mainsec">
    <div class="contact_add">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-10">
                    <div class="row">
                        <!-- Contact Info -->
                        <div class="col-lg-5">
                            <div class="contact_left">
                                <h2>Get in Touch With Us</h2>
                                <p class="prag"> Have questions, suggestions, or need help with study materials for
                                    UPSC, SSC, NEET, UP
                                    Police or other exams?
                                    Fill out the form below or contact us directly. We're here to help you succeed!</p>
                                <div class="contact_addcard">
                                    <div class="contact_ad_iconse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                            <path
                                                d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg>
                                    </div>
                                    <div class="contact_addresec">
                                        <h4>Our Office</h4>
                                        <p>NotesLover HQ, Hitkari Nagar, Kakadeo, Kanpur, <br> Uttar Pradesh 208025 </p>
                                    </div>
                                </div>
                                <div class="contact_addcard">
                                    <div class="contact_ad_iconse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                        </svg>
                                    </div>
                                    <div class="contact_addresec">
                                        <h4>Phone</h4>
                                        <p><a href="tel:+91 9807763330">+91 9807763330</a></p>
                                    </div>
                                </div>
                                <div class="contact_addcard">
                                    <div class="contact_ad_iconse">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                        </svg>
                                    </div>
                                    <div class="contact_addresec">
                                        <h4>Email</h4>
                                        <p><a href="mailto:support@noteslover.com">support@noteslover.com</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- Contact Form -->
                        <div class="col-lg-7">
                            <!-- Success or error messages -->
                            <div class="contact_formsec">
                                <?php if (!empty($success)) : ?>
                                <div class="alert alert-success"><?= $success ?></div>
                                <?php elseif (!empty($error)) : ?>
                                <div class="alert alert-danger"><?= $error ?></div>
                                <?php endif; ?>

                                <!-- Validation Errors -->
                                <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                                <?php endif; ?>

                                <!-- Contact Form -->
                                <form action="<?= base_url('contact') ?>" method="POST">
                                    <input type="text" name="name" class="form-control" placeholder="Your Full Name"
                                        value="<?= old('name') ?>" required>

                                    <input type="email" name="email" class="form-control"
                                        placeholder="Your Email Address" value="<?= old('email') ?>" required>

                                    <textarea name="message" class="form-control" rows="5"
                                        placeholder="Type your message or query here..."
                                        required><?= old('message') ?></textarea>

                                    <button type="submit" class="contact_btn">
                                        Send Message
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <iframe class="w-100"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.2299267036815!2d80.28379137453553!3d26.48054077853099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c381a5d3b7631%3A0x8ec581cc8592305e!2s117%2Fp%2C%20Chhapeda%20Pulia%2C%20Tulsi%20Nagar%2C%20Navin%20Nagar%2C%20Kakadeo%2C%20Kanpur%2C%20Uttar%20Pradesh%20208025!5e0!3m2!1sen!2sin!4v1760289794720!5m2!1sen!2sin"
        height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Contact End -->
<!-- Page Header -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">FAQs</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active text-white">FAQs</li>
    </ol>
</div>

<!-- FAQs Section -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="text-primary fw-bold text-uppercase">Frequently Asked Questions</h4>
            <p class="text-muted">Find answers to the most common questions about our platform, services, and features.</p>
        </div>

        <div class="accordion" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item mb-3 border rounded">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Q1. What is NotesLover.com?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        NotesLover.com is an online platform that provides high-quality, exam-oriented notes for students preparing for school, college, and competitive exams across India.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item mb-3 border rounded">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Q2. Are all notes available for free download?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Many of our notes are available for free. However, some premium or specially curated notes may require a small subscription or payment to access.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item mb-3 border rounded">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Q3. How can I request notes for a specific subject or exam?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can request specific notes by contacting us through our <a href="<?= base_url('contact') ?>">Contact Page</a>. Our team will review and try to provide the requested material as soon as possible.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item mb-3 border rounded">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Q4. Can I contribute my own notes to NotesLover?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can! We welcome contributions from teachers and students. Simply reach out via our contact form, and our team will guide you through the submission process.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item mb-3 border rounded">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Q5. How do I contact the NotesLover support team?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        You can reach our support team anytime via the <a href="<?= base_url('contact') ?>">Contact Us</a> page or email us directly at <strong>support@noteslover.com</strong>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

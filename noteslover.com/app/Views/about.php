<!-- Premium About Us Page for NotesLover.com -->
<style>
/* Basic Animations */
.fade-in {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-in-out;
}
.fade-in.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Hover Effects on Cards */
.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}

/* Hero Gradient */
.page-header {
  background: linear-gradient(90deg, #1e3a8a, #3b82f6);
}

/* Icon Styling */
.card i, .why-choose i, .counter i {
  transition: transform 0.3s ease;
}
.card:hover i, .why-choose:hover i {
  transform: scale(1.2);
}

/* Counters */
.counter-box {
  background-color: #f9fafb;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  transition: transform 0.3s ease;
}
.counter-box:hover {
  transform: scale(1.05);
}

/* CTA Button */
.btn-primary {
  background: #1e3a8a;
  border: none;
}
.btn-primary:hover {
  background: #2563eb;
}

/* Responsive */
@media(max-width:768px){
  .page-header h1 {
    font-size: 2rem;
  }
}
</style>

<div class="container-fluid page-header py-5 text-center fade-in">
    <h1 class="text-white display-5 fw-bold">Your One-Stop Platform for Handwritten & Digital Notes</h1>
    <p class="text-white mb-0">From Competitive Exam Prep to School Notes – Everything You Need, All in One Place</p>
</div>

<div class="container py-5">
    <!-- Our Story Section -->
    <div class="row align-items-center mb-5 fade-in">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="/assets/images/about-us-side.png" class="img-fluid rounded shadow-sm" alt="NotesLover Story">
        </div>
        <div class="col-lg-6">
            <h2 class="text-primary fw-bold mb-3">Our Story</h2>
            <p class="text-muted" style="line-height:1.8; font-size:16px;">
                NotesLover.com was founded by <strong>Manish Pal</strong> to make high-quality study material accessible to every student. We specialize in <strong>handwritten notes</strong> covering school syllabus (10th–12th), competitive exams (SSC, RRB, Banking, Police, Homeguard, NDA, UPSC, NEET), and more. Our platform also provides <strong>previous year papers, syllabus PDFs, and practice questions</strong> to help aspirants save time and prepare efficiently.
            </p>
        </div>
    </div>

    <!-- What We Offer Section -->
    <div class="text-center mb-5 fade-in">
        <h2 class="text-primary fw-bold mb-4">What We Offer</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-pencil-alt text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold">Handwritten Notes</h5>
                        <p class="text-muted">Crisp, clear, and easy-to-understand notes for all subjects and exams.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-file-alt text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold">Previous Year Papers & Syllabus</h5>
                        <p class="text-muted">Organized PDFs for SSC, RRB, Banking, NDA, UPSC, and more.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-school text-primary fa-2x mb-3"></i>
                        <h5 class="fw-bold">School Notes</h5>
                        <p class="text-muted">10th, 11th, 12th, and CS/IT subject-wise notes for students.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="why-choose bg-primary text-white p-5 rounded mb-5 fade-in">
        <h2 class="text-center fw-bold mb-4">Why Choose NotesLover?</h2>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <i class="fa fa-clock fa-2x mb-2"></i>
                <h5 class="fw-bold">Save Time</h5>
                <p>Pre-made handwritten notes and PDFs to reduce preparation time.</p>
            </div>
            <div class="col-md-3">
                <i class="fa fa-book fa-2x mb-2"></i>
                <h5 class="fw-bold">Comprehensive Content</h5>
                <p>All subjects, exams, and study materials in one place.</p>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star fa-2x mb-2"></i>
                <h5 class="fw-bold">Trusted by Students</h5>
                <p>Thousands of aspirants across India rely on our resources every month.</p>
            </div>
            <div class="col-md-3">
                <i class="fa fa-download fa-2x mb-2"></i>
                <h5 class="fw-bold">High Quality</h5>
                <p>Handwritten notes are well-structured and easy to understand.</p>
            </div>
        </div>
    </div>

    <!-- Counters Section -->
    <div class="row text-center g-4 mb-5 fade-in">
        <div class="col-md-3">
            <div class="counter-box">
                <i class="fa fa-users text-primary fa-2x mb-2"></i>
                <h4 class="fw-bold text-primary">2,000+</h4>
                <p class="text-muted">Happy Learners</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box">
                <i class="fa fa-book text-primary fa-2x mb-2"></i>
                <h4 class="fw-bold text-primary">200+</h4>
                <p class="text-muted">Notes & PDFs Available</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box">
                <i class="fa fa-download text-primary fa-2x mb-2"></i>
                <h4 class="fw-bold text-primary">1,000+</h4>
                <p class="text-muted">Downloads</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="counter-box">
                <i class="fa fa-star text-primary fa-2x mb-2"></i>
                <h4 class="fw-bold text-primary">98%</h4>
                <p class="text-muted">Positive Ratings</p>
            </div>
        </div>
    </div>

    <!-- Call To Action -->
    <div class="text-center fade-in">
        <h3 class="fw-bold mb-3">Start Your Preparation Today!</h3>
        <p class="text-muted mb-4">Explore our well-structured handwritten notes, PDFs, previous year papers, and study materials.</p>
        <a href="<?= base_url('/notes') ?>" class="btn btn-primary btn-lg rounded">Explore Notes</a>
    </div>
</div>

<script>
// Scroll Fade-In Animation
const fadeEls = document.querySelectorAll('.fade-in');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.2 });

fadeEls.forEach(el => observer.observe(el));
</script>

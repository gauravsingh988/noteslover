<div class="container-fluid fruite py-90 px-20">
    <div class="text-center"><h2>Become a Partner</h2>
    <p>Turn your handwritten notes, PDFs, or study material into income. Submit your details and our team will contact you shortly.</p>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <img src="<?= base_url('assets/img/partner-side-banner.png'); ?>" class="img-responsive" style="width: 100%; height: auto;">
        </div>
        <div class="col-sm-6">
            
    
            <!-- Success Message -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>
    
            <!-- Validation Errors -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>
    
            <form method="post" action="<?= base_url('partner/submit'); ?>">
                <div class="form-group">
                    <input type="text" label="name" class="w-100 form-control py-2 mb-4 rounded" name="name" placeholder="Enter your full name" value="<?= old('name'); ?>" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="w-100 form-control py-2 mb-4 rounded"  placeholder="Enter your email address" value="<?= old('email'); ?>" required>
                </div>
                
                <div class="form-group">
                    <input type="text" name="phone" class="w-100 form-control py-2 mb-4 rounded" placeholder="Enter your mobile number" value="<?= old('phone'); ?>" required>
                </div>
                
                <div class="form-group">
                    <select name="notes_category" required class="w-100 form-control py-2 mb-4 rounded">
                        <option value="">Select Notes Category</option>
                    
                        <!-- Major Exam Categories -->
                        <option value="UPSC" <?= old('notes_category') == 'UPSC' ? 'selected' : '' ?>>UPSC</option>
                        <option value="NEET" <?= old('notes_category') == 'NEET' ? 'selected' : '' ?>>NEET</option>
                        <option value="JEE" <?= old('notes_category') == 'JEE' ? 'selected' : '' ?>>JEE</option>
                        <option value="SSC" <?= old('notes_category') == 'SSC' ? 'selected' : '' ?>>SSC Exams</option>
                        <option value="Banking" <?= old('notes_category') == 'Banking' ? 'selected' : '' ?>>Banking (IBPS, SBI, RBI)</option>
                        <option value="Railway" <?= old('notes_category') == 'Railway' ? 'selected' : '' ?>>Railway Exams</option>
                        <option value="State PCS" <?= old('notes_category') == 'State PCS' ? 'selected' : '' ?>>State PCS</option>
                    
                        <!-- College/University -->
                        <option value="B.Tech" <?= old('notes_category') == 'B.Tech' ? 'selected' : '' ?>>B.Tech / Engineering</option>
                        <option value="B.Sc" <?= old('notes_category') == 'B.Sc' ? 'selected' : '' ?>>B.Sc</option>
                        <option value="B.Com" <?= old('notes_category') == 'B.Com' ? 'selected' : '' ?>>B.Com</option>
                        <option value="B.A" <?= old('notes_category') == 'B.A' ? 'selected' : '' ?>>B.A</option>
                        <option value="BBA" <?= old('notes_category') == 'BBA' ? 'selected' : '' ?>>BBA / MBA</option>
                        <option value="Diploma" <?= old('notes_category') == 'Diploma' ? 'selected' : '' ?>>Diploma Notes</option>
                    
                        <!-- Technical & Skill Based -->
                        <option value="Programming" <?= old('notes_category') == 'Programming' ? 'selected' : '' ?>>Programming / Coding</option>
                        <option value="Machine Learning" <?= old('notes_category') == 'Machine Learning' ? 'selected' : '' ?>>Machine Learning / AI</option>
                        <option value="Cyber Security" <?= old('notes_category') == 'Cyber Security' ? 'selected' : '' ?>>Cyber Security</option>
                        <option value="Data Science" <?= old('notes_category') == 'Data Science' ? 'selected' : '' ?>>Data Science</option>
                    
                        <!-- School Notes -->
                        <option value="School Notes" <?= old('notes_category') == 'School Notes' ? 'selected' : '' ?>>School Notes (Class 6–12)</option>
                    
                        <!-- General Study Materials -->
                        <option value="Handwritten Notes" <?= old('notes_category') == 'Handwritten Notes' ? 'selected' : '' ?>>Handwritten Notes</option>
                        <option value="PDF Notes" <?= old('notes_category') == 'PDF Notes' ? 'selected' : '' ?>>PDF Notes</option>
                        <option value="Previous Year Papers" <?= old('notes_category') == 'Previous Year Papers' ? 'selected' : '' ?>>Previous Year Papers</option>
                        <option value="Assignments" <?= old('notes_category') == 'Assignments' ? 'selected' : '' ?>>Assignments</option>
                        <option value="Projects" <?= old('notes_category') == 'Projects' ? 'selected' : '' ?>>Projects / Reports</option>
                        <option value="Ebooks" <?= old('notes_category') == 'Ebooks' ? 'selected' : '' ?>>Ebooks</option>
                    
                        <option value="Others" <?= old('notes_category') == 'Others' ? 'selected' : '' ?>>Others</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <textarea name="message" class="w-100 form-control py-2 mb-4 rounded" rows="4" placeholder="Message (Optional): Tell us about your notes or any details you'd like to share..."><?= old('message'); ?></textarea>
                </div>
                <button type="submit" class="w-100 btn btn-success py-3 mb-4" >Submit Details</button>
            </form>
        </div>
    </div>
</div>

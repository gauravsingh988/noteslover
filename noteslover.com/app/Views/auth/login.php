<div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index:9999;">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="toast show bg-success text-white mb-2">
            <div class="toast-body">
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="toast show bg-danger text-white mb-2">
            <div class="toast-body">
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="container py-90">
    <div class="row justify-content-center">
        <div class="col-sm-4">

            <center>
                <img src="<?= base_url('assets/img/logo-header.png') ?>" style="max-width:60px">
            </center>
            <br>

            <div class="login_main">
                <h4>Sign in</h4>

                <form method="post" action="<?= base_url('login-check') ?>">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="user@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="******" required>
                    </div>

                    <button type="submit" class="btn w-100">Sign in</button>
                </form>

                <div class="login_any_account mt-3">
                    Don’t have an account?
                    <a href="<?= base_url('register') ?>">Register</a>
                </div>

                <hr>

                <p>
                    By continuing, you agree to NotesLover's
                    <a href="<?= base_url('terms-and-condition') ?>">rules</a> and
                    <a href="<?= base_url('privacy-policy') ?>">privacy policy</a>.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toast").forEach(toast => {
        setTimeout(() => {
            toast.classList.remove("show");
            toast.remove();
        }, 3000); // auto close after 3 sec
    });
});
</script>

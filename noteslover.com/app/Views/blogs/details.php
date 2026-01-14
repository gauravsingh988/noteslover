<script type="application/ld+json">
<?= $story['json_schema'] ?>
</script>
<style>
<?=$story['custom_css'] ?>
</style>
<style>
#fullDescriptionDiv h2 {
    font-size: 22px !important;
    margin-top: 30px !important;
}

#fullDescriptionDiv h3 {
    font-size: 18px !important;
    margin-top: 25px !important;
}

#fullDescriptionDiv h4 {
    font-size: 16px !important;
    margin-top: 23px !important;
}

#fullDescriptionDiv table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    border-radius: 6px;
}

#fullDescriptionDiv table thead {
    background-color: #45595b;
    color: #ffffff;
}

#fullDescriptionDiv table thead th {
    padding: 12px 16px;
    text-align: left;
    font-weight: 600;
    border-bottom: 2px solid #ddd;
}

#fullDescriptionDiv table tbody td {
    padding: 12px 16px;
    border-bottom: 1px solid #e0e0e0;
    color: #333;
    background-color: #fff;
}

#fullDescriptionDiv table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

#fullDescriptionDiv table tbody tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}
</style>
<div class="container-fluid py-90 px-20" id="fullDescriptionDiv">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex mb-2">
                <!-- <p class="me-3"><small><i class="fa fa-circle"></i>&nbsp; <?= number_format($story['total_likes']) ?> Likes </small></p> -->
                <p class="me-3"><small><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16"
                            height="16" fill="currentColor" aria-hidden="true">
                            <circle cx="256" cy="256" r="256" />
                        </svg>
                        &nbsp; <?= number_format($story['total_views']) ?> Views</small></p>
            </div>

            <?php 
                if (!empty($story['tags'])): ?>
            <p>
                <?php foreach (explode(',', $story['tags']) as $tag): ?>
                <span class="badge bg-dark"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16"
                        height="16" fill="currentColor">
                        <path
                            d="M497.9 225.9L286.1 14.1C275.7 3.7 261.9-1 248 0L80 0C53.5 0 32 21.5 32 48v168c0 12.8 5.1 25.1 14.1 34.1l211.8 211.8c18.7 18.7 49.1 18.7 67.9 0l172.1-172.1c18.7-18.8 18.7-49.1 0-67.9zM144 144a32 32 0 1 1 0-64 32 32 0 1 1 0 64z" />
                    </svg>
                    <?= trim($tag) ?></span>
                <?php endforeach; ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="col-lg-8">
            <h1 class="fw-bold mb-3"><?= esc($story['title']) ?></h1>

            <div class="d-flex mb-4">

                <!-- Like button -->
                <!-- <a href="#" 
                        class="me-3 btn border-3 rounded like-btn <?= $has_liked ? 'btn-success' : 'btn-dark text-white' ?>" 
                        title="Like" 
                        data-note-id="<?= esc($story['id']) ?>">
                        <i class="fa fa-thumbs-up"></i> <?= $has_liked ? 'Liked' : 'Like' ?>
                    </a> -->

                <!-- Dislike button -->
                <!-- <a href="#" 
                        class="me-3 btn border-3 rounded dislike-btn <?= $has_disliked ? 'btn-danger' : 'btn-primary text-white' ?>" 
                        title="Dislike" 
                        data-note-id="<?= esc($story['id']) ?>">
                        <i class="fa fa-thumbs-down"></i> <?= $has_disliked ? 'Disliked' : 'Dislike' ?>
                    </a> -->

                <!-- Share button -->
                <!-- <a href="#" 
                    class="me-3 btn btn-primary border-3 border-primary rounded text-white" 
                    title="Share">
                        <i class="fa fa-share-alt"></i> Share
                    </a> -->

                <!-- <a href="#" 
                    class="me-3 btn btn-primary border-3 border-primary rounded text-white"
                    data-bs-toggle="modal"
                    data-bs-target="#reportModal">
                        <i class="fa fa-flag"></i> Report
                    </a> -->
            </div>
            <img src="<?= !empty($story['detail_page_thumbnail'])?$story['detail_page_thumbnail']:$story['thumbnail'] ?>"
                class="img-fluid" alt="Image">

            <div class="mb-3 mt-3">
                <?= $story['description'] ?>
            </div>

        </div> <!-- end col-lg-8 -->
        <div class="col-lg-4">
            <div class="recent_blog_card">
                <h4>Recent Blogs</h4>
                <?php 
                    if($recent_blogs):
                    ?>
                <ul>
                    <?php foreach ($recent_blogs as $single): ?>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path
                                d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                        </svg><a href="<?= base_url('blogs/'.$single['slug']) ?>">
                            <?= esc($single['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <h6 class="mb-2">No blogs available</h6>
                <?php endif; ?>
            </div>
            <hr>

            <div class="recent_blog_card">
                <h4>Recent Previous Year Papers</h4>
                <?php 
                    if($recent_model_papers):
                    ?>
                <ul>
                    <?php foreach ($recent_model_papers as $single): ?>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path
                                d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                        </svg><a href="<?= base_url('model-papers/'.$single['slug']) ?>">
                            <?= esc($single['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <h6 class="mb-2">No paper available</h6>
                <?php endif; ?>
            </div>
            <div class="recent_blog_card">
                <h4>Recent Success Story</h4>
                <?php 
                    if($recent_stories):
                    ?>
                <ul>
                    <?php foreach ($recent_stories as $single): ?>
                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path
                                d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                        </svg><a href="<?= base_url('success-stories/'.$single['slug']) ?>">
                            <?= esc($single['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <h6 class="mb-2">No story available</h6>
                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3">
            Share:
            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('success-stories/'.$story['slug']) ?>"
                target="_blank" class="btn btn-primary rounded text-white">Share on Facebook</a>

            <!-- Twitter -->
            <a href="https://twitter.com/intent/tweet?url=<?= base_url('success-stories/'.$story['slug']) ?>&text=<?= $story['title'] ?>"
                target="_blank" class="btn btn-primary rounded text-white">Share on Twitter</a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('success-stories/'.$story['slug']) ?>"
                target="_blank" class="btn btn-primary rounded text-white">Share on LinkedIn</a>

            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?text=Check+out+this+<?= $story['title'] ?>+<?= base_url('success-stories/'.$story['slug']) ?>"
                target="_blank" class="btn btn-primary rounded text-white">Share on WhatsApp</a>
        </div>

    </div> <!-- end row -->
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('#rating-stars i');
    const ratingInput = document.getElementById('rating-value');
    let currentRating = parseInt(ratingInput.value);

    function highlightStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-muted');
                star.classList.add('text-warning');
            } else {
                star.classList.remove('text-warning');
                star.classList.add('text-muted');
            }
        });
    }

    // Initialize stars on page load based on old input
    highlightStars(currentRating);

    stars.forEach(star => {
        star.addEventListener('click', () => {
            currentRating = parseInt(star.getAttribute('data-value'));
            ratingInput.value = currentRating;
            highlightStars(currentRating);
        });

        star.addEventListener('mouseover', () => {
            const hoverValue = parseInt(star.getAttribute('data-value'));
            highlightStars(hoverValue);
        });

        star.addEventListener('mouseout', () => {
            highlightStars(currentRating);
        });
    });
});
const BASE_URL = "<?= base_url() ?>";

document.addEventListener('DOMContentLoaded', function() {

    function updateButtonState(btn, action) {
        // Update button text and class based on action (liked, unliked, disliked, undisliked, saved, unsaved)
        if (action === 'liked') {
            btn.classList.add('btn-success');
            btn.classList.remove('btn-dark');
            btn.innerHTML = '<i class="fa fa-thumbs-up"></i> Liked';
        } else if (action === 'unliked') {
            btn.classList.add('btn-dark');
            btn.classList.remove('btn-success');
            btn.innerHTML = '<i class="fa fa-thumbs-up"></i> Like';
        } else if (action === 'disliked') {
            btn.classList.add('btn-danger');
            btn.classList.remove('btn-dark');
            btn.innerHTML = '<i class="fa fa-thumbs-down"></i> Disliked';
        } else if (action === 'undisliked') {
            btn.classList.add('btn-dark');
            btn.classList.remove('btn-danger');
            btn.innerHTML = '<i class="fa fa-thumbs-down"></i> Dislike';
        } else if (action === 'saved') {
            btn.classList.add('btn-warning');
            btn.classList.remove('btn-dark');
            btn.innerHTML = '<i class="fa fa-bookmark"></i> Saved';
        } else if (action === 'unsaved') {
            btn.classList.add('btn-dark');
            btn.classList.remove('btn-warning');
            btn.innerHTML = '<i class="fa fa-bookmark"></i> Save';
        }
    }

    function sendAction(action, noteId, btn) {
        fetch(`${BASE_URL}/success-stories/${action}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({
                    note_id: noteId
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    updateButtonState(btn, data.action);

                    // If liked, remove dislike state
                    if (data.action === 'liked') {
                        const dislikeBtn = document.querySelector(`.dislike-btn[data-note-id="${noteId}"]`);
                        if (dislikeBtn) updateButtonState(dislikeBtn, 'undisliked');
                    }
                    // If disliked, remove like state
                    if (data.action === 'disliked') {
                        const likeBtn = document.querySelector(`.like-btn[data-note-id="${noteId}"]`);
                        if (likeBtn) updateButtonState(likeBtn, 'unliked');
                    }
                } else {
                    if (data.message === 'Login required') {
                        const currentUrl = window.location.href;
                        sessionStorage.setItem('redirect_after_login', currentUrl);
                        window.location.href = `${BASE_URL}/login`;
                    } else {
                        console.error(`Failed to ${action}`);
                    }
                }
            })
            .catch(err => {
                console.error('Request error:', err);
            });
    }

    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const noteId = this.dataset.noteId;
            sendAction('like', noteId, this);
        });
    });

    document.querySelectorAll('.dislike-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const noteId = this.dataset.noteId;
            sendAction('dislike', noteId, this);
        });
    });

    document.querySelectorAll('.save-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const noteId = this.dataset.noteId;
            sendAction('save_unsave', noteId, this);
        });
    });
});
</script>
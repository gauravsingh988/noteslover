<script type="application/ld+json">
<?= $note['json_schema'] ?>
</script>
<style>
<?= $note['custom_css'] ?>
</style>

<style>
.text-truncate-3-lines {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    /* was 2 */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.5em;
    max-height: 4.5em;
    position: relative;
}

#pdf-canvas {
    border: 1px solid black;
}

#watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-30deg);
    opacity: 0.1;
    font-size: 72px;
    color: red;
    pointer-events: none;
    user-select: none;
}

#pdf-container {
    position: relative;
    display: inline-block;
}
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
.custom-tooltip {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

/* Tooltip text box */
.custom-tooltip .custom-tooltiptext {
  visibility: hidden;
  opacity: 0;
  width: max-content;
  max-width: 250px;
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 6px 10px;
  border-radius: 4px;
  position: absolute;
  bottom: 125%; /* position above */
  left: 50%;
  transform: translateX(-50%);
  z-index: 1050; /* higher than Bootstrap modals etc. */
  transition: opacity 0.25s ease-in-out;
}

/* Tooltip arrow */
.custom-tooltip .custom-tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%; /* arrow below tooltip box */
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #333 transparent transparent transparent;
}

/* Show tooltip on hover */
.custom-tooltip:hover .custom-tooltiptext {
  visibility: visible;
  opacity: 1;
}
.custom-tooltip {
    background: #f2f2f2 !important;
    color: #0f0f0f !important;
}
code {
    background-color: #eee;
    padding: 2px 5px;
    border-radius: 3px;
}
</style>
<meta property="og:title" content="<?= base_url($note['meta_title']) ?>">
<meta property="og:description" content="<?= base_url($note['meta_description']) ?>">
<meta property="og:image" content="<?= base_url($note['thumbnail']) ?>">
<meta property="og:url" content="<?= base_url('notes/'.$note['slug']) ?>">
<meta property="og:type" content="website">

<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1">
    <div class="modal-dialog rounded">
        <form id="report-form" action="<?= base_url('notes/report/' . $note['slug']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report This Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Please let us know what's wrong with this note. This helps our team keep NotesLover safe and helpful for everyone.</p>

                    <!-- Predefined reasons -->
                    <div class="mb-3">
                        <?php 
                        $categories = [
                            "Contains explicit content",
                            "Violence or graphic material",
                            "Offensive or hateful language",
                            "Bullying or harassment",
                            "Dangerous or harmful acts",
                            "Self-harm or suicide content",
                            "False or misleading information",
                            "Content involving minors",
                            "Promotion of terrorism",
                            "Spam, scams, or misleading links",
                            "Legal concerns"
                        ];
                        foreach ($categories as $index => $cat): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="reason_category" id="reason_<?= $index ?>" value="<?= $cat ?>" required>
                                <label class="form-check-label" for="reason_<?= $index ?>"><?= $cat ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Optional details -->
                    <div class="mb-3">
                        <label for="details" class="form-label">Additional information (optional)</label>
                        <textarea class="form-control" name="details" id="details" rows="3" placeholder="You can provide more context or examples here..."></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark rounded">Submit Report</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid py-30 px-20">
    <div class="row">
        <div class="col-lg-12">
            <?= view('sections/request_for_notes'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12">
            <div class="d-flex flex-wrap">
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= esc($note['category_name']) ?></small></p>
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= number_format($note['total_likes']) ?>
                        Likes </small></p>&nbsp;
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= number_format($note['views']) ?>
                        Views</small></p>&nbsp;
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= number_format($note['total_pages']) ?>
                        Pages</small></p>&nbsp;
                <!--<p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= esc($note['download_count']) ?>-->
                <!--        Downloads</small></p>&nbsp;-->
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= !empty($note['price']) ? '$' . number_format($note['price'], 2) : 'Free' ?></small></p>&nbsp;
                <p class="me-2 mb-2"><small style="vertical-align: bottom;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg> <?= (int)$note['average_rating'] ?>
                        Ratings</small></p>
            </div>
            
            <h1 class="fw-bold mb-3"><?= esc($note['title']) ?></h1>
            <div class="mb-3 text-truncate-3-lines">
                <?= strip_tags($note['sort_description']) ?> <a href="#fullDescriptionDiv" class="text-warning">Read more ></a>
            </div>
            <div class="d-flex  flex-wrap">
                <!-- Download button -->
                <?php
                if(!empty($note['drive_file_link_id']))
                {
                    $download_file_path = "https://drive.google.com/uc?export=download&id=".$note['drive_file_link_id'];
                } else {
                    $download_file_path = $note['file_path'];
                }
                ?>
                <a href="<?= $download_file_path ?>"
                    class="custom-tooltip me-2 mb-2 btn rounded text-white" title="Download"
                    download>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"></path>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"></path>
</svg>
                    <span class="custom-tooltiptext">Download</span>
                </a>
               
                <!-- Like button -->
                <a href="#"
                    class="custom-tooltip me-2 mb-2 btn border-3 rounded like-btn"
                    title="Like" data-note-id="<?= esc($note['id']) ?>">
                    <?php if ($has_liked){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"></path>
                        </svg>
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                          <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"></path>
                        </svg>
                    <?php } ?>
                     <span class="custom-tooltiptext">Like</span>
                </a>

                <!-- Dislike button -->
                <a href="#"
                    class="custom-tooltip me-2 mb-2 btn border-3 rounded dislike-btn"
                    title="Dislike" data-note-id="<?= esc($note['id']) ?>">
                    <?php if ($has_disliked){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                          <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"></path>
                        </svg>
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                          <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"></path>
                        </svg>
                    <?php } ?>

                    <span class="custom-tooltiptext">Dislike</span>
                </a>

                <!-- Save button -->
                <a href="#"
                    class="custom-tooltip me-2 mb-2 btn border-3 rounded save-btn"
                    title="Save" data-note-id="<?= esc($note['id']) ?>">
                    <?php if ($has_saved){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16"> <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"></path> </svg>
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"></path> </svg>
                    <?php } ?>
                    <span class="custom-tooltiptext">Save</span>
                </a>

                <!-- Share button -->
                <a href="#" id="shareBtn" class="custom-tooltip me-2 mb-2 btn border-3 rounded text-white" title="Share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"></path>
                    </svg>
                    <span class="custom-tooltiptext">Share</span>
                </a>

                <!-- Ratings anchor -->
                <a href="#ratings" class="custom-tooltip me-2 mb-2 btn border-3 rounded text-white"
                    title="Ratings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"></path>
                    </svg>
                    <span class="custom-tooltiptext">Ratings</span>
                </a>
                
                <?php 
                $userId = session()->get('user')['id'] ?? null;
                if ($userId): ?>
                <a href="#" class="custom-tooltip me-2 mb-2 btn border-3 rounded text-white"
                    data-bs-toggle="modal" data-bs-target="#reportModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                      <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z"></path>
                    </svg>
                    <span class="custom-tooltiptext">Report</span>
                </a>
                <?php else: ?>
                <a href="<?= base_url('login') ?>" class="custom-tooltip me-2 mb-2 btn border-3 rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                      <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z"></path>
                    </svg>
                    <span class="custom-tooltiptext">Login To Report</span>
                </a>
                <?php endif; ?>
            </div>

            <p class="text-danger">Below is a preview of the PDF. To download the full document, please click the download
                button.</p>
<?php if (!empty($note['preview_drive_file_link_id'])): ?>
    <!-- Google Drive PDF Preview -->
    <iframe 
        src="https://drive.google.com/file/d/<?= esc($note['preview_drive_file_link_id']) ?>/preview" 
        width="100%" 
        height="600px" 
        style="border:none;"
        allowfullscreen
    ></iframe>
<?php else: ?>
    <!-- Local PDF Preview -->
    <iframe 
        src="<?= esc($note['preview_file_path']) ?>#toolbar=0" 
        width="100%" 
        height="600px" 
        style="border:none;"
        allowfullscreen
    ></iframe>
<?php endif; ?>

            <div class="mb-4 mt-4" id="fullDescriptionDiv">
                <?= $note['description'] ?>
            </div>

            <div class="mb-4" id="ratings">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php if ($i <= $note['average_rating']): ?>
                <i class="fa fa-star text-warning"></i>
                <?php else: ?>
                <i class="fa fa-star text-muted"></i>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php if (!empty($note['tags'])): ?>
            <p>
                <?php foreach (explode(',', $note['tags']) as $tag): ?>
                <span class="badge bg-dark"><i class="fa fa-tag"></i> <?= trim($tag) ?></span>
                <?php endforeach; ?>
            </p>
            <?php endif; ?>
            <div class="mb-3">
                Share:
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('notes/'.$note['slug']) ?>" target="_blank" class="btn btn-primary rounded text-white">Share on Facebook</a>
                
                <!-- Twitter -->
                <a href="https://twitter.com/intent/tweet?url=<?= base_url('notes/'.$note['slug']) ?>&text=<?= $note['title'] ?>" target="_blank" class="btn btn-primary rounded text-white">Share on Twitter</a>
                
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url('notes/'.$note['slug']) ?>" target="_blank" class="btn btn-primary rounded text-white">Share on LinkedIn</a>
                
                <!-- WhatsApp -->
                <a href="https://api.whatsapp.com/send?text=Check+out+this+<?= $note['title'] ?>+<?= base_url('notes/'.$note['slug']) ?>" target="_blank" class="btn btn-primary rounded text-white">Share on WhatsApp</a>
            </div>
            <!-- Reviews -->
            <div class="">
                <h4 class="fw-bold mb-4">Reviews</h4>

                <?php foreach ($reviews as $review): ?>
                <div class="d-flex mb-4">
                    <!-- Reviewer Avatar -->
                    <img src="<?= base_url('assets/img/avatar.jpg') ?>" class="img-fluid rounded-circle me-3"
                        style="width: 70px; height: 70px;" alt="User Avatar">

                    <!-- Review Content -->
                    <div>
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1"><?= esc($review['full_name']) ?></h6> &nbsp;&nbsp;&nbsp;&nbsp;
                            <small><?= date('F j, Y', strtotime($review['created_at'])) ?></small>
                        </div>

                        <!-- Star Rating -->
                        <div class="d-flex mb-2">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $review['rating']): ?>
                            <i class="fa fa-star text-warning"></i>
                            <?php else: ?>
                            <i class="fa fa-star text-muted"></i>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                        <!-- Review Text -->
                        <p class="mb-0"><?= esc($review['message']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php if (session()->get('user') && session()->get('user')['isLoggedIn']): ?>
                <form action="<?= base_url('submitrating/' . $note['id']) ?>" method="post" id="review-form">
                <?= csrf_field() ?>

                <h4 class="fw-bold mb-4">Leave a comment</h4>

                <div class="row g-4">
                    <div class="col-12">
                        <textarea name="message"
                            class="form-control rounded <?= isset($validation) && $validation->hasError('message') ? 'is-invalid' : '' ?>"
                            rows="5" placeholder="Your Review *" required><?= old('message') ?></textarea>
                        <?php if (isset($validation) && $validation->hasError('message')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('message') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 d-flex align-items-center">
                        <span class="me-3">Rate:</span>
                        <div id="rating-stars" class="rating-stars d-flex" style="font-size: 1.5rem; cursor: pointer;">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="star" data-value="<?= $i ?>">
                                    <!-- Default: empty star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-star text-muted" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73z"/>
                                    </svg>
                                </span>
                            <?php endfor; ?>
                        </div>
                        <input type="hidden" name="rating" id="rating-value" value="<?= old('rating') ?? 0 ?>" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 text-white">Post
                            Comment</button>
                    </div>
                </div>
            </form>
            <?php else: ?>
                <div class="text-center my-4">
                    <p class="mb-3">To leave a comment, please log in.</p>
                    <a href="<?= base_url('login') ?>" class="btn btn-outline-dark rounded-pill px-4 py-2">
                        <i class="fa fa-sign-in-alt me-2"></i> Log in to Comment
                    </a>
                </div>
            <?php endif; ?>
        </div> <!-- end col-lg-8 -->
          <div class="col-lg-4 col-md-12 col-12">
            <div class="feature_card">
                <h4>Featured Notes</h4>
                <?php foreach ($featured_notes as $single_note): ?>
                <a href="<?= base_url('notes/'.$single_note['slug']) ?>" class="text-decoration-none text-dark">
                    <div class="feature_rightsec">
                        <div class="feature_imgsec">
                            <img src="<?= $single_note['thumbnail'] ?>" class="img-fluid" alt="Image">
                        </div>
                        <div class="feature_textsec">
                            <p><strong><?= esc($single_note['title']) ?></strong></p>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="feature_card">
                <h4>Releted Notes</h4>
                <?php 
                if($related_products):
                foreach ($related_products as $single_note): ?>
                <a href="<?= base_url('notes/'.$single_note['slug']) ?>" class="text-decoration-none text-dark">
                    <div class="feature_rightsec">
                        <div class="feature_imgsec">
                            <img src="<?= $single_note['thumbnail'] ?>" class="img-fluid"
                                alt="<?= esc($single_note['title']) ?>" loading="lazy">
                        </div>
                        <div class="feature_textsec p-2">
                            <p class="mb-2"><strong><?= esc($single_note['title']) ?></strong></p>
                        </div>
                    </div>
                </a>
                <?php endforeach;
                else: ?>
                <h6 class="mb-2">No products available</h6>
                <?php endif; ?>
            </div>

        </div>
    </div> <!-- end row -->
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('#rating-stars .star');
    const ratingInput = document.getElementById('rating-value');
    const form = document.getElementById('review-form');

    let currentRating = ratingInput ? parseInt(ratingInput.value) || 0 : 0;

    // ⭐ Highlight stars
    function highlightStars(rating) {
        stars.forEach((star, index) => {
            const svg = star.querySelector('svg');
            if (!svg) return; // Skip if no SVG
            if (index < rating) {
                svg.classList.remove('text-muted');
                svg.classList.add('text-warning');
                svg.setAttribute('fill', '#ffc107');
            } else {
                svg.classList.remove('text-warning');
                svg.classList.add('text-muted');
                svg.setAttribute('fill', 'currentColor');
            }
        });
    }

    // Initialize
    highlightStars(currentRating);

    // Handle interactions if stars exist
    if (stars.length && ratingInput) {
        stars.forEach(star => {
            const value = parseInt(star.getAttribute('data-value'));
            star.addEventListener('click', () => {
                currentRating = value;
                ratingInput.value = currentRating;
                highlightStars(currentRating);
            });
            star.addEventListener('mouseover', () => highlightStars(value));
            star.addEventListener('mouseout', () => highlightStars(currentRating));
        });
    }

    // 🧩 AJAX Submit if form exists
    if (form) {
        form.addEventListener('submit', e => {
            e.preventDefault();

            const formData = new FormData(form);
            const actionUrl = form.getAttribute('action');
            const submitBtn = form.querySelector('button[type="submit"]');
            if (!submitBtn) return;

            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';

            fetch(actionUrl, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Post Comment';

                if (data.success) {
                    alert('✅ ' + data.message);
                    form.reset();
                    if (ratingInput) {
                        ratingInput.value = 0;
                        highlightStars(0);
                    }
                } else {
                    alert('⚠️ ' + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                alert('❌ Something went wrong.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Post Comment';
            });
        });
    }
});


const BASE_URL = "<?= base_url() ?>";

document.addEventListener('DOMContentLoaded', function() {

    function updateButtonState(btn, action) {
        // Update button text and class based on action (liked, unliked, disliked, undisliked, saved, unsaved)
        if (action === 'liked') {
            // btn.classList.add('btn-success');
            // btn.classList.remove('btn-dark');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16"><path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"></path></svg>';
        } else if (action === 'unliked') {
            // btn.classList.add('btn-dark');
            // btn.classList.remove('btn-success');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16"> <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"></path> </svg>';
        } else if (action === 'disliked') {
            // btn.classList.add('btn-danger');
            // btn.classList.remove('btn-dark');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16"> <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"></path> </svg>';
        } else if (action === 'undisliked') {
            // btn.classList.add('btn-dark');
            // btn.classList.remove('btn-danger');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16"><path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"></path></svg>';
        } else if (action === 'saved') {
            // btn.classList.add('btn-warning');
            // btn.classList.remove('btn-dark');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16"> <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2"></path> </svg>';
        } else if (action === 'unsaved') {
            // btn.classList.add('btn-dark');
            // btn.classList.remove('btn-warning');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16"> <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"></path> </svg>';
        }
    }

    function sendAction(action, noteId, btn) {
        fetch(`${BASE_URL}/notes/${action}`, {
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
document.addEventListener('DOMContentLoaded', () => {
    const reportForm = document.getElementById('report-form');
    if (!reportForm) return; // Safety check

    reportForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submit

        const formData = new FormData(this);
        const actionUrl = this.getAttribute('action');
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
        }

        fetch(actionUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Report';
            }

            if(data.status === 'error' && data.redirect) {
                window.location.href = data.redirect;
            } else if(data.status === 'success') {
                // Close modal
                const modalEl = document.getElementById('reportModal');
                const reportModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                reportModal.hide();

                // Optional success feedback
                alert('✅ Your report has been submitted.');
                reportForm.reset();
            } else {
                alert(data.message || '⚠️ Something went wrong.');
            }
        })
        .catch(err => {
            console.error(err);
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Report';
            }
            alert('❌ Error submitting report.');
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const shareBtn = document.getElementById('shareBtn');

    shareBtn.addEventListener('click', async (e) => {
        e.preventDefault();

        const noteUrl = window.location.href; // current page URL
        const noteTitle = document.title; // optional: note title

        // If Web Share API is supported (mobile)
        if (navigator.share) {
            try {
                await navigator.share({
                    title: noteTitle,
                    url: noteUrl
                });
                console.log('Note shared successfully');
            } catch (err) {
                console.error('Error sharing:', err);
            }
        } else {
            // Fallback: copy link to clipboard
            try {
                await navigator.clipboard.writeText(noteUrl);
                alert('Link copied to clipboard!');
            } catch (err) {
                console.error('Clipboard copy failed:', err);
                prompt('Copy this link:', noteUrl); // fallback prompt
            }
        }
    });
});

</script>
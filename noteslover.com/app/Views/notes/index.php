<style>
.custom-multiselect {
    max-width: 300px;
    min-width: 150px;
    font-family: Arial, sans-serif;
    position: relative;
    user-select: none;
}

.selected-display {
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    width: 200px;
}

.selected-display .arrow-icon {
    margin-left: 10px;
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

/* Rotate arrow when open */
.custom-multiselect.open .selected-display .arrow-icon {
    transform: rotate(180deg);
}

.options-list {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    border: 1px solid #ccc;
    background: white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    border-radius: 0 0 4px 4px;
    margin-top: 2px;
    z-index: 999;
    display: none;
    padding-top: 8px;
    width: 250px;
    box-sizing: border-box;
    max-height: 240px;
    /* total dropdown height */
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.custom-multiselect.open .options-list {
    display: flex;
}

.custom-multiselect .options-list {
    display: none;
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    max-height: 200px;
    overflow-y: auto;
    width: 100%;
    z-index: 1000;
}

.custom-multiselect.open .options-list {
    display: block;
}


.options-container {
    overflow-y: auto;
    max-height: 180px;
    padding: 0 12px 40px 12px;
    /* bottom padding so content not hidden behind clear-all */
    box-sizing: border-box;
}

.options-container label {
    display: block;
    padding: 6px 0;
    cursor: pointer;
    line-height: 1.3;
}

.search-box {
    width: calc(100% - 24px);
    margin: 0 12px 8px 12px;
    padding: 6px 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.clear-all {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 8px 12px;
    text-align: center;
    cursor: pointer;
    font-weight: 600;
    border-top: 1px solid #ddd;
    background: #fafafa;
    user-select: none;
}

.clear-all:hover {
    background-color: #e0eaff;
}

.selected-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline-block;
    max-width: 200px;
    /* or adjust max width as needed */
    vertical-align: middle;
}

.nav-pills .nav-item {
    /* margin-right: 12px; */
    /* space between each filter */
}

.nav-pills .nav-item:last-child {
    margin-right: 0;
    /* no extra margin on last item */
}

.clear-all-global {
    font-weight: 500;
    color: #6c757d;
    align-self: center;
    font-size: 16px;
    user-select: none;
    display: inline-flex;
    align-items: center;
}

.clear-all-global::before {
    content: "|";
    display: inline-block;
    margin-right: 8px;
    font-size: 24px;
    /* bigger pipe */
    line-height: 1;
    vertical-align: middle;
    color: #6c757d;
    cursor: default;
    /* no pointer on pipe */
}

/* Make pointer only on text part */
.clear-all-global>span {
    cursor: pointer;
}

/* Hover effect only on text */
.clear-all-global:hover>span {
    color: #333;
}

/* Also pipe changes color on hover for consistency */
.clear-all-global:hover::before {
    color: #333;
}

/* Pagination Container */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 20px 0;
    justify-content: center; /* center alignment */
    gap: 8px; /* space between items */
}

/* Pagination Items */
.pagination li {
    display: inline-block;
}

/* Pagination Links */
.pagination li a {
    display: block;
    padding: 8px 14px;
    color: #45595b; /* link color */
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
}

/* Hover Effect */
.pagination li a:hover {
    background-color: #45595b;
    color: #fff;
    border-color: #45595b;
}

/* Active Page */
.pagination li.active a {
    background-color: #45595b;
    color: #fff;
    border-color: #45595b;
    cursor: default;
}

/* Disabled State (if used) */
.pagination li.disabled a {
    color: #ccc;
    pointer-events: none;
    border-color: #ddd;
}

/* Responsive Adjustment */
@media (max-width: 480px) {
    .pagination li a {
        padding: 6px 10px;
        font-size: 14px;
    }
}

</style>
<div class="container-fluid fruite my-3 px-20">
    <form method="get" id="filterForm">
        <div class="row g-4">
            <div class="col-lg-12 justify-content-center">
                <div class="col-lg-12">
                    <div class="mobile_viewfilter">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20"
                                fill="currentColor">
                                <path
                                    d="M3.8 25.9C1.5 22.7 0 18.6 0 14.4V8c0-4.4 3.6-8 8-8H504c4.4 0 8 3.6 8 8v6.4c0 4.2-1.5 8.3-3.8 11.5L320 320v144c0 8.8-7.2 16-16 16H208c-8.8 0-16-7.2-16-16V320L3.8 25.9z" />
                            </svg> Filter</button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasRightLabel">Filter</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mobile_advancefilter">
    <form id="filterFormMobile" method="get">
        <div class="row g-3">
            <!-- Category Dropdown (hidden as original) -->
            <div class="col-12" style="display: none;">
                <label for="categoryMobile" class="form-label">Category</label>
                <select name="category[]" id="categoryMobile" class="form-select rounded" multiple>
                    <option value="">All</option>
                    <?php
                        $selectedCategories = $selectedCategories ?? [];
                        foreach ($categories as $category):
                    ?>
                        <option value="<?= esc($category['slug']) ?>" <?= in_array($category['slug'], $selectedCategories) ? 'selected' : '' ?>>
                            <?= esc($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Date Uploaded Dropdown -->
            <div class="col-12">
                <label for="dateUploadedMobile" class="form-label">Date Uploaded</label>
                <select name="date_uploaded" id="dateUploadedMobile" class="form-select rounded">
                    <option value="">All</option>
                    <option value="last_week" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_week') ? 'selected' : '' ?>>Last Week</option>
                    <option value="last_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_month') ? 'selected' : '' ?>>Last Month</option>
                    <option value="last_3_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_3_month') ? 'selected' : '' ?>>Last 3 Months</option>
                    <option value="last_6_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_6_month') ? 'selected' : '' ?>>Last 6 Months</option>
                    <option value="last_year" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_year') ? 'selected' : '' ?>>Last Year</option>
                </select>
            </div>

            <!-- Length Dropdown -->
            <div class="col-12">
                <label for="lengthMobile" class="form-label">Length</label>
                <select name="length" id="lengthMobile" class="form-select rounded">
                    <option value="">All</option>
                    <option value="1_10" <?= (isset($_GET['length']) && $_GET['length'] == '1_10') ? 'selected' : '' ?>>1-10 Pages</option>
                    <option value="10_100" <?= (isset($_GET['length']) && $_GET['length'] == '10_100') ? 'selected' : '' ?>>10-100 Pages</option>
                    <option value="100_500" <?= (isset($_GET['length']) && $_GET['length'] == '100_500') ? 'selected' : '' ?>>100-500 Pages</option>
                    <option value="500_plus" <?= (isset($_GET['length']) && $_GET['length'] == '500_plus') ? 'selected' : '' ?>>500+ Pages</option>
                </select>
            </div>

            <!-- Apply Filters Button -->
            <div class="col-12 mt-3">
                <button type="submit" id="applyFiltersBtnMobile" class="btn btn-success w-100 rounded">Apply</button>
            </div>
        </div>
    </form>
</div>

                        </div>
                    </div>
                    <div class="desktopview_filter">
                        <form id="filterForm" method="get">
                            <div class="row g-2 align-items-center">
                                <!-- Category Dropdown (hidden for now as original) -->
                                <div class="col-auto" style="display: none;">
                                    <label>Category</label>
                                    <select name="category[]" multiple class="form-select rounded">
                                        <option value="">All</option>
                                        <?php
                                            $selectedCategories = $selectedCategories ?? [];
                                            foreach ($categories as $category):
                                        ?>
                                            <option value="<?= esc($category['slug']) ?>" <?= in_array($category['slug'], $selectedCategories) ? 'selected' : '' ?>>
                                                <?= esc($category['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                    
                                <!-- Date Uploaded Dropdown -->
                                <div class="col-auto">
                                    <label>Date Uploaded</label>
                                    <select name="date_uploaded" class="form-select rounded">
                                        <option value="">All</option>
                                        <option value="last_week" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_week') ? 'selected' : '' ?>>Last Week</option>
                                        <option value="last_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_month') ? 'selected' : '' ?>>Last Month</option>
                                        <option value="last_3_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_3_month') ? 'selected' : '' ?>>Last 3 Months</option>
                                        <option value="last_6_month" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_6_month') ? 'selected' : '' ?>>Last 6 Months</option>
                                        <option value="last_year" <?= (isset($_GET['date_uploaded']) && $_GET['date_uploaded'] == 'last_year') ? 'selected' : '' ?>>Last Year</option>
                                    </select>
                                </div>
                    
                                <!-- Length Dropdown -->
                                <div class="col-auto">
                                    <label>Select Length</label>
                                    <select name="length" class="form-select rounded">
                                        <option value="">All</option>
                                        <option value="1_10" <?= (isset($_GET['length']) && $_GET['length'] == '1_10') ? 'selected' : '' ?>>1-10 Pages</option>
                                        <option value="10_100" <?= (isset($_GET['length']) && $_GET['length'] == '10_100') ? 'selected' : '' ?>>10-100 Pages</option>
                                        <option value="100_500" <?= (isset($_GET['length']) && $_GET['length'] == '100_500') ? 'selected' : '' ?>>100-500 Pages</option>
                                        <option value="500_plus" <?= (isset($_GET['length']) && $_GET['length'] == '500_plus') ? 'selected' : '' ?>>500+ Pages</option>
                                    </select>
                                </div>
                    
                                <!-- Apply Filters Button -->
                                <div class="col-auto">
                                    <label style="visibility: hidden">Apply</label><br>
                                    <button type="submit" id="applyFiltersBtn" class="btn btn-success rounded">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-lg-12 justify-content-center">
                <div class="row g-4">
                    <?php if (!empty($notes)): ?>
                    <?php foreach ($notes as $note): ?>
                    <?= view('partials/note', ['note' => $note, 'class' => 'col-xl-3']) ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="text-center text-muted">No notes found.</p>

                    <?= view('sections/request_for_notes'); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Pagination Placeholder -->
                    <div class="col-12">

           <?= $pager->links('notes_pagination', 'default_full') ?>



                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

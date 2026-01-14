<!-- Views/success_stories/index.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

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
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    border-radius: 0 0 4px 4px;
    margin-top: 2px;
    z-index: 999;
    display: none;
    padding-top: 8px;
    width: 250px;
    box-sizing: border-box;
    max-height: 240px; /* total dropdown height */
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
    padding: 0 12px 40px 12px; /* bottom padding so content not hidden behind clear-all */
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
    max-width: 200px; /* or adjust max width as needed */
    vertical-align: middle;
  }
  .nav-pills .nav-item {
    margin-right: 12px;  /* space between each filter */
  }

  .nav-pills .nav-item:last-child {
    margin-right: 0; /* no extra margin on last item */
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
    font-size: 24px; /* bigger pipe */
    line-height: 1;
    vertical-align: middle;
    color: #6c757d;
    cursor: default; /* no pointer on pipe */
  }

  /* Make pointer only on text part */
  .clear-all-global > span {
    cursor: pointer;
  }

  /* Hover effect only on text */
  .clear-all-global:hover > span {
    color: #333;
  }

  /* Also pipe changes color on hover for consistency */
  .clear-all-global:hover::before {
    color: #333;
  }
</style>

<div class="container-fluid fruite py-90 px-20">
    <div class="row g-4">
        <div class="col-lg-12 justify-content-center">
            <div class="row g-4">
            <?php if (!empty($success_stories) && is_array($success_stories)) : ?>
        <?php foreach ($success_stories as $story) : 
            $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $story['thumbnail']);
        ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="<?= base_url('success-stories/' . esc($story['slug'], 'url')) ?>" class="text-decoration-none">
                    <div class="position-relative fruite-item border border-top-0 bg-light h-100 d-flex flex-column">
                        
                        <!-- Optimized Image with WebP Fallback -->
                        <div class="vesitable-img">
                            <picture>
                                <source srcset="<?= esc($webpSrc) ?>" type="image/webp">
                                <img 
                                    src="<?= esc($story['thumbnail']) ?>"
                                    class="img-fluid w-100"
                                    alt="<?= esc($story['title']) ?>"
                                    loading="lazy"
                            </picture>
                        </div>

                        <!-- Content -->
                        <div class="p-2 rounded-bottom d-flex flex-column justify-content-between flex-grow-1">
                            <h6 class="h6 mb-1 text-dark"><?= character_limiter(esc($story['title']), 80) ?></h6>
                            <hr>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <small>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20"
                                        fill="none"
                                        stroke="#6c757d"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        viewBox="0 0 24 24"
                                        style="margin-right: 6px;">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <?= esc($story['total_views']) ?>
                                </small>
                                <span class="text-success ms-auto">
                                    <small>
                                        Know more
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="20" height="20"
                                            fill="none"
                                            stroke="#6c757d"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            viewBox="0 0 24 24"
                                            style="vertical-align: middle;">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </small>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <p class="text-muted">Koi success story uplabdh nahi hai.</p>
<?php endif; ?>



            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const multiselects = document.querySelectorAll('.custom-multiselect');

  multiselects.forEach(container => {
    const display = container.querySelector('.selected-display');
    const optionsList = container.querySelector('.options-list');
    const checkboxes = container.querySelectorAll('input[type="checkbox"]');
    const radios = container.querySelectorAll('input[type="radio"]');
    const searchBox = container.querySelector('.search-box');
    const optionsContainer = container.querySelector('.options-container');
    const clearAllBtn = container.querySelector('.clear-all');
    const selectedText = container.querySelector('.selected-text');

    // Toggle dropdown open/close
    display.addEventListener('click', function (e) {
      e.stopPropagation();

      // Close other dropdowns
      multiselects.forEach(other => {
        if (other !== container) other.classList.remove('open');
      });

      container.classList.toggle('open');

      if (container.classList.contains('open') && searchBox) {
        searchBox.focus();
      }
    });

    // Prevent dropdown from closing when clicking inside
    optionsList.addEventListener('click', function (e) {
      e.stopPropagation();
    });

    // Update selected display text
    function updateSelectedDisplay() {
      // Multi-select (checkboxes)
      if (checkboxes.length > 0) {
        const checked = Array.from(checkboxes).filter(cb => cb.checked);
        const count = checked.length;

        if (count === 0) {
          selectedText.textContent = 'Category'; // default text - update per your field
        } else if (count <= 2) {
          const names = checked.map(cb => cb.value).join(', ');
          selectedText.textContent = names;
        } else {
          selectedText.textContent = `(${count}) Categories`;
        }
      }
      // Single-select (radios)
      else if (radios.length > 0) {
        const checkedRadio = Array.from(radios).find(radio => radio.checked);
        selectedText.textContent = checkedRadio ? checkedRadio.nextSibling.textContent.trim() : selectedText.getAttribute('data-default') || 'Select';
      }
    }

    // Save default selected text (so single-select can reset properly)
    if (selectedText && !selectedText.getAttribute('data-default')) {
      selectedText.setAttribute('data-default', selectedText.textContent);
    }

    // Attach event listeners for checkboxes
    checkboxes.forEach(cb => {
      cb.addEventListener('change', updateSelectedDisplay);
    });

    // Attach event listeners for radios
    radios.forEach(rb => {
      rb.addEventListener('change', () => {
        updateSelectedDisplay();
        container.classList.remove('open'); // close on selection for radios
      });
    });

    // Search filter (only if searchBox exists)
    if (searchBox) {
      searchBox.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        optionsContainer.querySelectorAll('label').forEach(label => {
          const text = label.textContent.toLowerCase();
          label.style.display = text.includes(searchTerm) ? 'block' : 'none';
        });
      });
    }

    // Clear all button click
    if (clearAllBtn) {
      clearAllBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        checkboxes.forEach(cb => cb.checked = false);
        radios.forEach(rb => rb.checked = false);
        updateSelectedDisplay();
        if (searchBox) {
          searchBox.value = '';
          optionsContainer.querySelectorAll('label').forEach(label => {
            label.style.display = 'block';
          });
        }
      });
    }

    // Initial update of selected text on page load
    updateSelectedDisplay();
  });

  // Close dropdowns on clicking outside
  document.addEventListener('click', function () {
    multiselects.forEach(container => {
      container.classList.remove('open');
    });
  });

  document.querySelector('.clear-all-global span')?.addEventListener('click', function () {
  // Loop through each custom multiselect
  document.querySelectorAll('.custom-multiselect').forEach(container => {
    // Uncheck all checkboxes and radios
    container.querySelectorAll('input[type="checkbox"], input[type="radio"]').forEach(input => {
      input.checked = false;
    });

    // Reset the selected-text to its original value
    const selectedText = container.querySelector('.selected-text');
    if (selectedText) {
      // Reset to default from data-original OR fallback hardcoded text
      const defaultText = selectedText.getAttribute('data-original') || 'Select';
      selectedText.textContent = defaultText;
    }

    // Clear search if present
    const searchBox = container.querySelector('.search-box');
    if (searchBox) searchBox.value = '';

    // Show all hidden options
    const labels = container.querySelectorAll('.options-container label');
    labels.forEach(label => label.style.display = 'block');
  });
});
});
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('filterForm');
  const notesContainer = form.querySelector('.col-lg-12.justify-content-center .row.g-4');

  function serializeForm(form) {
    const params = new URLSearchParams();
    Array.from(form.elements).forEach(el => {
      if (!el.name || el.disabled) return;
      if ((el.type === 'checkbox' || el.type === 'radio') && !el.checked) return;

      // For checkbox arrays, append multiple values
      if (el.type === 'checkbox' && el.name.endsWith('[]')) {
        params.append(el.name, el.value);
      } else {
        params.append(el.name, el.value);
      }
    });
    return params.toString();
  }

  function fetchFilteredResults() {
    const queryString = serializeForm(form);
    const url = window.location.pathname + (queryString ? '?' + queryString : '');

    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(res => {
        if (!res.ok) throw new Error('Network response was not ok');
        return res.text();
      })
      .then(html => {
        // Replace notes listing only
        notesContainer.innerHTML = html;

        // Update URL in browser without reload
        history.pushState(null, '', url);
      })
      .catch(err => console.error('Filter AJAX error:', err));
  }

  // Listen for changes in any filter input
  form.addEventListener('change', function (e) {
    // Only trigger on actual input changes
    if (e.target.matches('input[type="checkbox"], input[type="radio"]')) {
      fetchFilteredResults();
    }
  });

  // Also trigger AJAX fetch when user clicks clear all global
  document.querySelector('.clear-all-global span').addEventListener('click', function () {
    form.reset();

    // Update your custom UI texts manually if needed, or trigger event to update
    document.querySelectorAll('.custom-multiselect').forEach(container => {
      const selectedText = container.querySelector('.selected-text');
      if (selectedText) {
        selectedText.textContent = selectedText.getAttribute('data-original') || 'Select';
      }
    });

    fetchFilteredResults();
  });

  // Handle browser back/forward buttons: reload full page (simplest)
  window.addEventListener('popstate', () => {
    window.location.reload();
  });
});

</script>

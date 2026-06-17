@once
    <style>
        .category-search-wrap {
            position: sticky;
            top: 0;
            z-index: 2;
            background: #fff;
            padding-bottom: 10px;
        }

        .category-search-clear {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #6c757d;
            font-size: 20px;
            line-height: 1;
            padding: 0;
            width: 24px;
            height: 24px;
        }

        .category-search-input {
            padding-right: 34px;
        }

        .category-search-match > label,
        .category-search-match > .sub-category-title,
        .sub-category-item.category-search-match {
            background: #eaf3ff;
        }

        .category-no-results {
            padding: 14px 16px;
            color: #6c757d;
            font-weight: 500;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const normalize = value => (value || '').toLowerCase().trim();
            let debounceTimer = null;

            document.querySelectorAll('.category-search-panel').forEach(function (panel) {
                const input = panel.querySelector('.category-search-input');
                const clearButton = panel.querySelector('.category-search-clear');
                const noResults = panel.querySelector('.category-no-results');
                const parentItems = Array.from(panel.querySelectorAll('.category-item[data-level="parent"]'));

                if (!input || !parentItems.length) {
                    return;
                }

                function setItemVisible(item, isVisible) {
                    item.classList.toggle('d-none', !isVisible);
                }

                function setMatch(item, isMatch) {
                    item.classList.toggle('category-search-match', isMatch);
                }

                function filterCategories() {
                    const search = normalize(input.value);
                    let hasVisibleCategory = false;

                    clearButton.classList.toggle('d-none', search === '');

                    parentItems.forEach(function (parentItem) {
                        const parentName = normalize(parentItem.dataset.categoryName);
                        const parentMatches = search !== '' && parentName.includes(search);
                        const childItems = Array.from(parentItem.querySelectorAll('.sub-category-item[data-level="child"]'));
                        let hasVisibleChild = false;

                        setMatch(parentItem, parentMatches);

                        childItems.forEach(function (childItem) {
                            const childName = normalize(childItem.dataset.categoryName);
                            const childMatches = search !== '' && childName.includes(search);
                            const showChild = search === '' || parentMatches || childMatches;

                            setItemVisible(childItem, showChild);
                            setMatch(childItem, childMatches);

                            if (showChild) {
                                hasVisibleChild = true;
                            }
                        });

                        const showParent = search === '' || parentMatches || hasVisibleChild;
                        setItemVisible(parentItem, showParent);

                        if (showParent) {
                            hasVisibleCategory = true;
                        }
                    });

                    if (noResults) {
                        noResults.classList.toggle('d-none', hasVisibleCategory);
                    }
                }

                input.addEventListener('input', function () {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(filterCategories, 250);
                });

                clearButton.addEventListener('click', function () {
                    input.value = '';
                    filterCategories();
                    input.focus();
                });
            });
        });
    </script>
@endonce

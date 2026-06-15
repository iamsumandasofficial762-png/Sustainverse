<!-- <footer class="footer m-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2026 © ebluesoft All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <p class="float-end mb-0">Developed with <i class="fa fa-heart font-danger"></i></p>
            </div>
        </div>
    </div>
</footer> -->
<!-- footer end -->
</div>
</div>

<!-- tap to top start -->
<div class="tap-top">
    <div>
        <i class="fas fa-arrow-up"></i>
    </div>
</div>
<!-- tap to top end -->

<!-- customizer start -->
<div class="customizer-wrap">
    <div class="customizer-links">
        <i data-feather="settings"></i>
    </div>
    <div class="customizer-contain custom-scrollbar">
        <div class="setting-back">
            <i data-feather="x"></i>
        </div>

        <div class="layouts-settings">
            <div class="customizer-title">
                <h6 class="color-4">Layout type</h6>
            </div>
            <div class="option-setting">
                <span>Light</span>
                <label class="switch">
                    <input type="checkbox" name="chk1" class="setting-check">
                    <span class="switch-state"></span>
                </label>
                <span>Dark</span>
            </div>
        </div>

        <div class="layouts-settings">
            <div class="customizer-title">
                <h6 class="color-4">Layout Direction</h6>
            </div>
            <div class="option-setting">
                <span>LTR</span>
                <label class="switch">
                    <input type="checkbox" name="chk2" class="setting-check1">
                    <span class="switch-state"></span>
                </label>
                <span>RTL</span>
            </div>
        </div>

        <div class="layouts-settings">
            <div class="customizer-title">
                <h6 class="color-4">Unlimited Color</h6>
            </div>
            <div class="option-setting unlimited-color-layout">
                <div class="form-group">
                    <label for="ColorPicker6">color 6</label>
                    <input id="ColorPicker6" type="color" value="#f35d43" name="Default">
                </div>

                <div class="form-group">
                    <label for="ColorPicker7">color 7</label>
                    <input id="ColorPicker7" type="color" value="#f34451" name="Default">
                </div>
            </div>
        </div>

    </div>
</div>
<!-- customizer end -->

<!-- latest jquery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/login.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- feather icon js -->
<script src="{{ asset('assets/js/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/feather-icon/feather-icon.js') }}"></script>

<!-- sidebar js -->
<script src="{{ asset('assets/js/sidebar.js') }}"></script>

<!-- apex chart js -->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/admin-dashboard.js') }}"></script>

<!-- admin js -->
<script src="{{ asset('assets/js/admin-script.js') }}"></script>

<!-- Customizer js -->
<script src="{{ asset('assets/js/customizer.js') }}"></script>

<!-- Color-picker js -->
<script src="{{ asset('assets/js/color/custom-colorpicker.js') }}"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>



<style>
    .toggle {
        position: relative;
        width: 50px;
        height: 25px;
        display: inline-block;
    }

    .toggle input {
        display: none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ccc;
        border-radius: 25px;
        transition: 0.3s;
    }

    .slider::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 3px;
        top: 2.5px;
        background: white;
        border-radius: 50%;
        transition: 0.3s;
    }

    input:checked + .slider {
        background: #4caf50;
    }

    input:checked + .slider::before {
        transform: translateX(24px);
    }

    .custom-list {
        max-height: 378px;
        overflow-y: auto;
        overflow-x: hidden;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-list .category-item {
        display: block;
        padding: 6px 16px;
        margin-bottom: 6px;
        background: #f4f7f6;
        border-left: 4px solid #898989d4;
        font-size: 15px;
        color: #333;
        transition: all 0.3s ease;
    }

    .custom-list .category-item:hover {
        background: #e8f6ef;
        transform: translateX(5px);
        border-left: 4px solid #2e7d32;
        color: #333;
    }

    .category-title {
        display: block;
        background: #f4f6f8;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
    }

    .sub-category-title {
        display: block;
        background: #f4f6f8;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
    }

    .sub-category-item {
        margin-bottom: 4px;
        display: block;
        padding: 5px 14px;
        border-left: 4px solid #898989d4;
        background: #f4f6f8;
        cursor: pointer;
        font-weight: 500;
    }

    .sub-category-item:hover {
        background: #e8f6ef;
        border-left: 4px solid #2e7d32;
        color: #333;
    }

    /* Sub list hidden */
    .sub-list {
        display: block;
        padding-left: 20px;
        list-style: none;
        padding: 0;
    }

    #catBox {
        min-height: 40px;
        padding: 10px;
        border: 1px dashed #ccc;
        border-radius: 6px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    #tagBox {
        min-height: 40px;
        padding: 10px;
        border: 1px dashed #ccc;
        border-radius: 6px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .cat-bg-light {
        background-color: #b9b6b685;
        color: #727272;
        height: 45px;
        width: fit-content;
        border-radius: 15px;
        border: 2px dashed #727272;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tag-bg-light {
        background-color: #b9b6b685;
        color: #727272;
        height: 45px;
        width: fit-content;
        border-radius: 15px;
        border: 2px dashed #727272;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .admin-edit-image {
        height: 300px;
    }

    .admin-edit-image img {
        border-radius: 10px;
        height: 100%;
        width: 100%;
    }

    .ck-editor__editable_inline {
        min-height: 300px;
    }

    .delete-modal {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .delete-box {
        background: #fff;
        padding: 20px;
        width: 350px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

     /* FOR MENU */
    .main-box {
        width: 50%;
    }

    .main-box li {
        display: block;
    }

    .main-list {
        padding: 5px 30px;
    }

    .sub-menu {
        margin-left: 70px;
    }

    .main-box,
    .sub-menu {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    /* Parent item */
    .parent-item {
        position: relative;
        padding: 8px 30px;
    }

    .parent-item::before {
        content: "";
        position: absolute;
        left: 50px;
        top: 56px;
        bottom: -32px;
        width: 3px;
        background: #333; /* blue */
        border-radius: 10px;
    }

    /* Sub menu container */
    .sub-menu {
        position: relative;
        margin-left: 40px;
        padding-left: 30px;
    }

    /* VERTICAL BLUE LINE */
    .sub-menu::before {
        content: "";
        position: absolute;
        left: 10px;
        top: 0;
        bottom: -18px;
        width: 3px;
        background: #333;
        border-radius: 10px;
    }

    .child-menu {
        position: relative;
        margin-left: 80px;
        padding-left: 30px;
    }

    .child-menu::before {
        content: "";
        position: absolute;
        left: 10px;
        top: -15px;
        bottom: 19px;
        width: 3px;
        background: #333;
        border-radius: 10px;
    }

    /* Each sub item */
    .sub-menu li {
        position: relative;
        margin-bottom: 15px;
    }

    /* HORIZONTAL CONNECTOR LINE */
    .sub-menu li::before {
        content: "";
        position: absolute;
        left: -20px;
        top: 50%;
        width: 20px;
        height: 2px;
        background: #333;
    }

    .square-btn {
        /* position: relative; */
        margin-left: 32px;
        width: 40px;
        height: 40px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .remove-square-btn {
        /* position: relative; */
        margin-left: 32px;
        width: 40px;
        height: 40px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .main-list {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .main-list select {
        flex: 1;
    }

    
    /* FOR LIST OF BLOG-CATEGORY BOX */
    .box {
        display: -webkit-box;   /* required for Safari */
        display: box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
        overflow: hidden;
    }

    
    /* TOAST CONTAINER */
    .error-toast {
        position: fixed;
        bottom: 20px;
        right: 20px;       /* ✅ bottom-right */
        z-index: 99999;
        animation: slideIn 0.35s ease-out;
    }

    /* BOX */
    .toast-box {
        max-width: 400px;
        padding: 30px 40px;
        border-radius: 6px;
        font-family: Arial, sans-serif;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    /* ERROR */
    .error-toast.error .toast-box {
        background: #f8d7da;
        color: #842029;
        border-left: 5px solid #dc3545;
    }

    /* SUCCESS */
    .error-toast.success .toast-box {
        background: #d1e7dd;
        color: #0f5132;
        border-left: 5px solid #198754;
    }

    .toast-box h2 {
        margin: 0 0 6px;
        font-size: 16px;
    }

    .toast-box p {
        margin: 0;
        font-size: 14px;
    }

    /* ANIMATION */
    @keyframes slideIn {
        from {
            transform: translateX(30px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ERROR MESSAGE  -->
<script>
    setTimeout(() => {
        document.querySelectorAll('.error-toast')
            .forEach(t => t.remove());
    }, 4000);
</script>


<!-- SHOW CATEGORY -->
<script>
    // 1️⃣ Badge logic only
    function showCategory(checkbox) {
        const catBox = document.getElementById('catBox');
        const catId = checkbox.value;
        const catName = checkbox.getAttribute('data-name');

        if (checkbox.checked) {
            if (document.getElementById('selected-cat-' + catId)) return;

            const div = document.createElement('div');
            div.className = 'badge cat-bg-light me-2 mb-2';
            div.id = 'selected-cat-' + catId;
            div.innerHTML = `
                ${catName}
                <span 
                    style="cursor:pointer; margin-left:6px;"
                    onclick="removeCategory(${catId})"
                >✕</span>
            `;
            catBox.appendChild(div);
        } else {
            const el = document.getElementById('selected-cat-' + catId);
            if (el) el.remove();
        }
    }

    // 2️⃣ Event listeners + initial load
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.category-item').forEach(categoryItem => {
            const main = categoryItem.querySelector('.main-checkbox');
            const subs = categoryItem.querySelectorAll('.sub-checkbox');

            if (!main || !subs.length) {
                return;
            }

            const anyChecked = [...subs].some(cb => cb.checked);

            if (anyChecked) {
                main.checked = true;
            }
        });

        // MAIN checkbox behavior
        document.querySelectorAll('.main-checkbox').forEach(main => {
            main.addEventListener('change', function () {
                const subs = this
                    .closest('.category-item')
                    .querySelectorAll('.sub-checkbox');

                subs.forEach(sub => {
                    sub.checked = this.checked;
                    showCategory(sub);
                });

                showCategory(this);
            });
        });

        // SUB checkbox behavior
        document.querySelectorAll('.sub-checkbox').forEach(sub => {
            sub.addEventListener('change', function () {
                const wrapper = this.closest('.category-item');
                const main = wrapper.querySelector('.main-checkbox');
                const subs = wrapper.querySelectorAll('.sub-checkbox');

                const anyChecked = [...subs].some(cb => cb.checked);
                main.checked = anyChecked;

                showCategory(this);
                showCategory(main);
            });
        });

        // 🔥 SHOW already-checked categories on page load
        document.querySelectorAll('.main-checkbox, .sub-checkbox').forEach(cb => {
            if (cb.checked) {
                showCategory(cb);
            }
        });
    });

    // Optional: remove badge click
    function removeCategory(catId) {
        const checkbox = document.querySelector(
            `.main-checkbox[value="${catId}"], .sub-checkbox[value="${catId}"]`
        );

        if (checkbox) {
            checkbox.checked = false;
            showCategory(checkbox);
        }
    }
</script>

<!-- FOR CATEGORY CHECK-BOX WHILE CREATING-->
<script>
    document.addEventListener('change', function (e) {

        // MAIN checkbox toggled
        if (e.target.classList.contains('main-checkbox')) {
            const categoryItem = e.target.closest('.category-item');
            categoryItem.querySelectorAll('.sub-checkbox').forEach(sub => {
                sub.checked = e.target.checked;
            });
        }

        // SUB checkbox toggled
        if (e.target.classList.contains('sub-checkbox')) {
            const categoryItem = e.target.closest('.category-item');
            const main = categoryItem.querySelector('.main-checkbox');
            const subs = categoryItem.querySelectorAll('.sub-checkbox');

            main.checked = [...subs].some(cb => cb.checked);
        }

    });
</script>

<!-- TAGS SEARCH -->
<script>
    $('#search').on('keyup', function () {
        let query = $(this).val().trim();
        let blogId = document.getElementById('blogId')?.value || '';

        if (query.length > 2) {
            $.ajax({
                url: "{{ route('live.search') }}",
                method: "GET",
                data: { 
                    query: query,
                    blog_id: blogId
                 },
                success: function (data) {

                    $('#searchResults').html(data).show();

                    // ✅ Detect "No results found" inside returned HTML
                    if ($(data).text().trim() === 'No results found') {
                        $('#addTag').removeClass('d-none');
                    } else {
                        $('#addTag').addClass('d-none');
                    }
                }
            });
        } else {
            $('#searchResults').hide();
            $('#addTag').addClass('d-none');
        }
    });
</script>

<!-- ADD TAG SHOW -->
<script>
    function showtag() {
        const input = document.getElementById('search');
        const tagBox = document.getElementById('tagBox');

        let tagValue = input.value.trim();

        if (tagValue === '') return;

        // prevent duplicate tags
        if (document.getElementById('tag-' + tagValue.toLowerCase())) {
            input.value = '';
            return;
        }

        // tag wrapper
        const tag = document.createElement('div');
        tag.className = 'badge tag-bg-light fs-6 d-flex align-items-center gap-2';
        tag.id = 'tag-' + tagValue.toLowerCase();

        tag.innerHTML = `
            #${tagValue}
            <span 
                style="cursor:pointer"
                onclick="removeTag('${tag.id}')"
            >✖</span>
            <input type="hidden" name="new_tags[]" value="${tagValue}">
        `;

        tagBox.appendChild(tag);
        input.value = '';
    }

    function removeTag(id) {
        document.getElementById(id).remove();
    }
</script>

<!-- DB TAG SHOW -->
<script>
    let selectedTags = [];

    document.addEventListener('DOMContentLoaded', function () {
        selectedTags = Array.from(
            document.querySelectorAll('#tagBox input[name="tags[]"]')
        ).map(input => String(input.value));
    });

    $(document).on('click', '.tag-item', function () {

        let tagId = String($(this).data('id'));
        let tagName = $(this).data('name');

        // Prevent duplicates
        if (selectedTags.includes(tagId)) {
            return;
        }

        selectedTags.push(tagId);

        const tag = document.createElement('div');
        tag.className = 'badge tag-bg-light fs-6 d-flex align-items-center gap-2';
        tag.id = 'tag-' + tagName.toLowerCase();

        tag.innerHTML = `
            #${tagName}
            <span 
                style="cursor:pointer"
                onclick="removeTag('${tag.id}')"
            >✖</span>
            <input type="hidden" name="tags[]" value="${tagId}">
        `;


        $('#tagBox').append(tag);
        $('#search').val('');
        $('#searchResults').hide();
    });

    function removeTag(id) {
        const element = document.getElementById(id);

        if (!element) {
            return;
        }

        const hiddenTagInput = element.querySelector('input[name="tags[]"]');

        if (hiddenTagInput) {
            selectedTags = selectedTags.filter(tagId => tagId !== String(hiddenTagInput.value));
        }

        element.remove();
    }
</script>

<!-- POST EDIT PAGE SLUG EDITING -->
<script>
    function showEditBox() {
        const slugLinkBox = document.getElementById('slugLinkBox');
        const slugLink = document.getElementById('slugLink');
        const editedslugLink = document.getElementById('editedslugLink');
        const showBtn = document.getElementById('showBtn');
        const hideBtn = document.getElementById('hideBtn');

        slugLinkBox.classList.remove('d-none');
        slugLink.classList.add('d-none');
        editedslugLink.classList.add('d-none');
        showBtn.classList.add('d-none');
        hideBtn.classList.remove('d-none');
    }

    function hideEditBox() {
        const editedSlug = document.getElementById('postLink').value;

        document.querySelector('#editedslugLink span strong').textContent = editedSlug;

        const slugLinkBox = document.getElementById('slugLinkBox');
        const editedslugLink = document.getElementById('editedslugLink');
        const showBtn = document.getElementById('showBtn');
        const hideBtn = document.getElementById('hideBtn');

        slugLinkBox.classList.add('d-none');
        editedslugLink.classList.remove('d-none');
        showBtn.classList.remove('d-none');
        hideBtn.classList.add('d-none');
    }
</script>

<!-- FORM SUBMITION -->
<script>
    function blogFormSubmit() {
        document.getElementById('blogForm').submit();
    }

    function editBlogFormSubmit() {
        document.getElementById('editBlogForm').submit();
    }

    function menuFormSubmit() {
        document.getElementById('menuForm').submit();
    }

    function heroFormSubmit() {
        document.getElementById('heroForm').submit();
    }
</script>

<!-- FOR CAT & TAG EDIT BOX OPEN -->
<script>
    // FOR CATGORY EDIT BOX
    function catEditBoxShow(catId, catParentId) {
        const catEditBox = document.getElementById('categoryEditBox');
        const catEditContent = document.getElementById('editContent-'+ catId).value;
        const catEditId = document.getElementById('editId-'+ catId).value;
        const editParentCatId = catParentId ? document.getElementById('editParentId-'+ catId).value : null;
        // console.log(editParentCatId);

        catEditBox.classList.remove('d-none');

        document.querySelector('#editCatContent').value = catEditContent;
        document.querySelector('#editCatId').value = catEditId;

        const categorySelect = document.querySelector('#categorySelect');

        if (editParentCatId) {
            categorySelect.value = editParentCatId;
        } else {
            categorySelect.value = "";
        }
    }

    // FOR TAG EDIT BOX
    function tagEditBoxShow(tagId) {
        const tagEditBox = document.getElementById('tagEditBox');
        const tagEditContent = document.getElementById('editTagContent-'+ tagId).value;
        const tagEditId = document.getElementById('editTagId-'+ tagId).value;

        tagEditBox.classList.remove('d-none');

        document.querySelector('#editTagContent').value = tagEditContent;
        document.querySelector('#editTagId').value = tagEditId;
    }

</script>

<!-- DELETION CONFIRMATION -->
<script>
    // DELETION CONFIRMATION OPEN
    function confirmDelete(url) {
        document.getElementById('deleteConfirmBtn').href = url;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    // DELETION CONFIRMATION CLOSE
    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>

<!-- FOR MENU MANAGEMENT -->
<script>
    function addMainCatRow() {
        const mainBox = document.getElementById('mainBox');

        const firstSelect = mainBox.querySelector('.sub-menu select');
        if (!firstSelect) {
            console.error('No select found to clone');
            return;
        }

        // create new row
        const wrapperLi = document.createElement('li');
        wrapperLi.className = 'dynamic-submenu';

        wrapperLi.innerHTML = `
            <ul class="sub-menu">
                <li class="card">
                    <div class="main-list d-flex align-items-center gap-2">
                        <select name="cat_id[]" class="form-control">
                            ${firstSelect.innerHTML}
                        </select>

                        <button type="button"
                                class="btn btn-danger remove-row remove-square-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </li>
            </ul>
        `;

        // 🎯 insert BEFORE the + button's <li> using its parent
        const addBtn = document.querySelector('.square-btn');
        const addBtnLi = addBtn.closest('li');

        addBtnLi.parentNode.insertBefore(wrapperLi, addBtnLi);
    }

    // remove row
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.remove-row');
        if (!btn) return;

        btn.closest('.dynamic-submenu')?.remove();
    });
</script>

<!-- FOR OPEN SUB-MENU -->
<script>
    function toggleSubmenu(id) {
        const submenu = document.getElementById('menuBox-' + id);

        if (!submenu) return;

        submenu.classList.toggle('d-none');
    }
</script>

<script>
    class CkEditorUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

                data.append('upload', file);
                data.append('_token', csrfToken);

                fetch("{{ route('posts.editor-image', [], false) }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        @if (session('jwt_token'))
                        'Authorization': 'Bearer {{ session('jwt_token') }}',
                        @endif
                    },
                    body: data,
                    credentials: 'same-origin',
                })
                    .then(async response => {
                        const contentType = response.headers.get('content-type') || '';
                        const result = contentType.includes('application/json')
                            ? await response.json().catch(() => ({}))
                            : { raw: await response.text().catch(() => '') };

                        if (!response.ok) {
                            reject(
                                result?.error?.message ||
                                result?.message ||
                                (result?.raw ? `Image upload failed (${response.status}).` : 'Image upload failed.')
                            );
                            return;
                        }

                        if (!result.url) {
                            reject('Image upload failed.');
                            return;
                        }

                        resolve({
                            default: result.url,
                        });
                    })
                    .catch(() => reject('Image upload failed.'));
            }));
        }

        abort() {
            // Fetch upload is short-lived here, so no custom abort handling is needed.
        }
    }

    function CkEditorUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
            return new CkEditorUploadAdapter(loader);
        };
    }

    document.addEventListener("DOMContentLoaded", function () {
        const el = document.querySelector('#content');

        if (el) {
            ClassicEditor
                .create(el, {
                    extraPlugins: [CkEditorUploadAdapterPlugin],
                    image: {
                        insert: {
                            type: 'inline',
                        },
                        toolbar: [
                            'imageStyle:inline',
                            'imageStyle:alignLeft',
                            'imageStyle:alignRight',
                            'imageStyle:block',
                            '|',
                            'toggleImageCaption',
                            'imageTextAlternative',
                        ],
                    },
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>



<!-- START XTRA -->
<!-- <script>
    document.getElementById("myToggle").addEventListener("change", function () {
        if (this.checked) {
            console.log("Toggle says: ON 🌞");
        } else {
            console.log("Toggle whispers: OFF 🌚");
        }
    });
</script> -->

<!-- END XTRA -->

</body>
</html>

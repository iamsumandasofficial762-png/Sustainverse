@php
    $inputId = $inputId ?? 'featuredImage';
    $existingImage = $existingImage ?? null;
    $existingImageName = $existingImage ? basename($existingImage) : '';
@endphp

<div class="form-group mt-2 featured-image-uploader" data-existing-src="{{ $existingImage ? asset($existingImage) : '' }}" data-existing-name="{{ $existingImageName }}">
    <label for="{{ $inputId }}"><h6 class="fs-5"><strong>Featured Image<span class="font-danger">*</span></strong></h6></label>

    <input
        id="{{ $inputId }}"
        name="image"
        type="file"
        class="featured-image-input d-none @error('image') is-invalid @enderror"
        accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp"
        {{ $required ?? false ? 'required' : '' }}>

    <div
        class="featured-image-dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
        role="button"
        tabindex="0"
        aria-controls="{{ $inputId }}">
        <div class="featured-image-empty {{ $existingImage ? 'd-none' : '' }}">
            <i data-feather="upload-cloud" class="featured-image-icon"></i>
            <p class="mb-1">Click to upload or drag image here</p>
            <small>JPG, PNG, GIF, or WEBP up to 10 MB</small>
        </div>

        <div class="featured-image-preview-wrap {{ $existingImage ? '' : 'd-none' }}">
            <img
                class="featured-image-preview"
                src="{{ $existingImage ? asset($existingImage) : '' }}"
                alt="Featured image preview">
        </div>
    </div>

    <div class="featured-image-meta {{ $existingImage ? '' : 'd-none' }}">
        <small class="featured-image-name text-muted">{{ $existingImageName }}</small>
        <button type="button" class="btn btn-link text-danger p-0 featured-image-remove">Remove image</button>
    </div>

    <small class="featured-image-error text-danger d-none"></small>
    @error('image')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

@once
    <style>
        .featured-image-dropzone {
            min-height: 170px;
            border: 1px dashed #c9d3df;
            border-radius: 8px;
            background: #f8fafc;
            cursor: pointer;
            padding: 16px;
            transition: border-color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .featured-image-dropzone:hover,
        .featured-image-dropzone.is-dragging,
        .featured-image-dropzone:focus {
            border-color: #0d6efd;
            background: #f1f6ff;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.08);
            outline: none;
        }

        .featured-image-dropzone.is-invalid {
            border-color: #dc3545;
        }

        .featured-image-empty {
            min-height: 138px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #5d6b7a;
        }

        .featured-image-empty p {
            font-weight: 600;
            color: #344054;
        }

        .featured-image-icon {
            width: 34px;
            height: 34px;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        .featured-image-preview {
            width: 100%;
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .featured-image-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 10px;
        }

        .featured-image-name {
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            const maxSize = 10 * 1024 * 1024;

            document.querySelectorAll('.featured-image-uploader').forEach(function (uploader) {
                const input = uploader.querySelector('.featured-image-input');
                const dropzone = uploader.querySelector('.featured-image-dropzone');
                const emptyState = uploader.querySelector('.featured-image-empty');
                const previewWrap = uploader.querySelector('.featured-image-preview-wrap');
                const preview = uploader.querySelector('.featured-image-preview');
                const meta = uploader.querySelector('.featured-image-meta');
                const fileName = uploader.querySelector('.featured-image-name');
                const removeButton = uploader.querySelector('.featured-image-remove');
                const error = uploader.querySelector('.featured-image-error');
                const existingSrc = uploader.dataset.existingSrc || '';
                const existingName = uploader.dataset.existingName || '';
                let objectUrl = null;

                function setError(message) {
                    error.textContent = message;
                    error.classList.toggle('d-none', !message);
                    dropzone.classList.toggle('is-invalid', Boolean(message));
                }

                function clearObjectUrl() {
                    if (objectUrl) {
                        URL.revokeObjectURL(objectUrl);
                        objectUrl = null;
                    }
                }

                function showPreview(src, name) {
                    preview.src = src;
                    fileName.textContent = name || '';
                    emptyState.classList.add('d-none');
                    previewWrap.classList.remove('d-none');
                    meta.classList.remove('d-none');
                }

                function showEmpty() {
                    preview.removeAttribute('src');
                    fileName.textContent = '';
                    emptyState.classList.remove('d-none');
                    previewWrap.classList.add('d-none');
                    meta.classList.add('d-none');
                }

                function restoreExistingOrEmpty() {
                    clearObjectUrl();
                    input.value = '';
                    setError('');

                    if (existingSrc) {
                        showPreview(existingSrc, existingName);
                    } else {
                        showEmpty();
                    }
                }

                function previewFile(file) {
                    setError('');

                    if (!allowedTypes.includes(file.type)) {
                        input.value = '';
                        setError('Please choose a JPG, PNG, GIF, or WEBP image.');
                        return;
                    }

                    if (file.size > maxSize) {
                        input.value = '';
                        setError('Image must not be larger than 10 MB.');
                        return;
                    }

                    clearObjectUrl();
                    objectUrl = URL.createObjectURL(file);
                    showPreview(objectUrl, file.name);
                }

                dropzone.addEventListener('click', function () {
                    input.click();
                });

                dropzone.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        input.click();
                    }
                });

                input.addEventListener('change', function () {
                    if (input.files && input.files[0]) {
                        previewFile(input.files[0]);
                    }
                });

                ['dragenter', 'dragover'].forEach(function (eventName) {
                    dropzone.addEventListener(eventName, function (event) {
                        event.preventDefault();
                        dropzone.classList.add('is-dragging');
                    });
                });

                ['dragleave', 'drop'].forEach(function (eventName) {
                    dropzone.addEventListener(eventName, function (event) {
                        event.preventDefault();
                        dropzone.classList.remove('is-dragging');
                    });
                });

                dropzone.addEventListener('drop', function (event) {
                    const file = event.dataTransfer.files && event.dataTransfer.files[0];

                    if (!file) {
                        return;
                    }

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    input.files = dataTransfer.files;
                    previewFile(file);
                });

                removeButton.addEventListener('click', restoreExistingOrEmpty);
            });
        });
    </script>
@endonce

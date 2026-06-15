<x-admin-header title="Admin | Add Blog">
</x-admin-header>

@php
    $selectedCategoryIds = collect(old('category', []))
        ->map(fn ($id) => (string) $id)
        ->all();
    $selectedTagIds = collect(old('tags', []))
        ->map(fn ($id) => (string) $id)
        ->all();
    $selectedTags = \App\Models\Tags::whereIn('id', $selectedTagIds)->get();
    $newTagValues = collect(old('new_tags', []))
        ->filter(fn ($tag) => filled($tag))
        ->values();
@endphp

<!-- page header end -->
<div class="page-body-wrapper">

    <x-side-navbar>
    </x-side-navbar>

    <x-message>
    </x-message>

    <div class="page-body">

        <!-- Container-fluid start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="fs-3">ADD NEW POST</h5>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" onclick="blogFormSubmit()" class="btn btn-primary fs-5">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid end -->

        <!-- Container-fluid start -->
        <form id="blogForm" action="{{ route('store.posts') }}" enctype="multipart/form-data" method="post" class="row gx-3">
            @csrf

            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <label for="title"><h6 class="fs-5"><strong>Title<span class="font-danger">*</span></strong></h6></label>
                                <input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter title"
                                    value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <input name="author" type="hidden" value="{{ old('author', 'admin') }}">
                                <label for="content"><h6 class="fs-5"><strong>Content<span class="font-danger">*</span></strong></h6></label>
                                <textarea
                                    id="content"
                                    name="content"
                                    rows="9"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Enter content"
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <label><h6 class="fs-5"><strong>Categories</strong></h6></label>
                                <div id="catBox"></div>

                                <label class="mt-3"><h6 class="fs-5"><strong>Tags</strong></h6></label>
                                <div id="tagBox">
                                    @foreach ($selectedTags as $tag)
                                        <div class="badge tag-bg-light fs-6 d-flex align-items-center gap-2" id="{{ $tag->id }}">
                                            #{{ $tag->tags_name }}
                                            <span style="cursor:pointer" onclick="removeTag({{ $tag->id }})">x</span>
                                            <input type="hidden" name="tags[]" value="{{ $tag->id }}">
                                        </div>
                                    @endforeach

                                    @foreach ($newTagValues as $tagValue)
                                        <div class="badge tag-bg-light fs-6 d-flex align-items-center gap-2" id="tag-{{ \Illuminate\Support\Str::slug($tagValue) }}">
                                            #{{ $tagValue }}
                                            <span style="cursor:pointer" onclick="removeTag('tag-{{ \Illuminate\Support\Str::slug($tagValue) }}')">x</span>
                                            <input type="hidden" name="new_tags[]" value="{{ $tagValue }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <label for="feturedImage"><h6 class="fs-5"><strong>Fetured Image<span class="font-danger">*</span></strong></h6></label>
                                <input
                                    id="feturedImage"
                                    name="image"
                                    type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.gif,.webp,image/*"
                                    required>
                                <small class="text-muted d-block mt-2">Use JPG, PNG, GIF, or WEBP up to 10 MB.</small>
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <label for="category"><h6 class="fs-5"><strong>Category<span class="font-danger">*</span></strong></h6></label>

                                <ul class="custom-list {{ $errors->has('category') || $errors->has('category.*') ? 'border border-danger rounded p-2' : '' }}">
                                    @foreach ($categories as $category)
                                        <li class="category-item">
                                            <input
                                                type="checkbox"
                                                name="category[]"
                                                id="category-{{ $category->id }}"
                                                class="main-checkbox"
                                                value="{{ $category->id }}"
                                                data-name="{{ $category->category_name }}"
                                                onclick="showCategory(this)"
                                                {{ in_array((string) $category->id, $selectedCategoryIds, true) ? 'checked' : '' }}>

                                            <label for="category-{{ $category->id }}">
                                                <span class="sub-category-title ms-1">{{ $category->category_name }}</span>
                                            </label>

                                            <ul class="sub-list">
                                                @foreach ($sub_categories as $sub)
                                                    @if ($category->id == $sub->parent_id)
                                                        <li class="sub-category-item">
                                                            <input
                                                                type="checkbox"
                                                                name="category[]"
                                                                value="{{ $sub->id }}"
                                                                data-name="{{ $sub->category_name }}"
                                                                onclick="showCategory(this)"
                                                                id="category-{{ $sub->id }}"
                                                                class="sub-checkbox"
                                                                {{ in_array((string) $sub->id, $selectedCategoryIds, true) ? 'checked' : '' }}>

                                                            <label for="category-{{ $sub->id }}" class="m-0">
                                                                <span class="sub-category-title m-0 ms-1">{{ $sub->category_name }}</span>
                                                            </label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                                <div>
                                    @error('category')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @foreach ($errors->get('category.*') as $messages)
                                        @foreach ($messages as $message)
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="search"><h6 class="fs-5"><strong>Tags</strong></h6></label>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-end">
                                        <button type="button" id="addTag" onclick="showtag(this)" class="btn btn-primary mb-3 d-none">Add</button>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    id="search"
                                    class="form-control {{ $errors->has('tags') || $errors->has('tags.*') || $errors->has('new_tags') || $errors->has('new_tags.*') ? 'is-invalid' : '' }}"
                                    placeholder="Search..."
                                    autocomplete="off">
                                @error('new_tags')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @foreach ($errors->get('new_tags.*') as $messages)
                                    @foreach ($messages as $message)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @endforeach
                                @endforeach
                                @foreach ($errors->get('tags.*') as $messages)
                                    @foreach ($messages as $message)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @endforeach
                                @endforeach
                            </div>
                            <div id="searchResults" class="list-group mt-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Container-fluid end -->
    </div>

    <!-- footer start -->
    <x-admin-footer>
    </x-admin-footer>

<style>
    .leading-5 {
        margin-top: 18px;
    }
    .w-5.h-5 {
        width: 20px;
    }
</style>

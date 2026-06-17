<x-admin-header title="Admin | Blogs">
</x-admin-header>

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
                                <div class="row align-items-center gy-3">
                                    <div class="col-md-6">
                                        <h5>ARTICLES</h5>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="admin-post-toolbar d-flex flex-column flex-md-row justify-content-md-end gap-2">
                                            <div class="position-relative admin-post-search">
                                                <input
                                                    type="search"
                                                    id="adminPostSearch"
                                                    class="form-control"
                                                    placeholder="Search by title, author, category..."
                                                    value="{{ $search ?? request('search') }}"
                                                    autocomplete="off"
                                                >
                                                <small id="adminPostSearchStatus" class="text-muted d-none">Searching...</small>
                                            </div>
                                            <a href="{{ route('posts.add') }}" class="btn btn-primary admin-post-add-btn">Add Post</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body assign-table pt-0" id="adminBlogList">
                                @include('admin-blog.partials.table', ['blogs' => $blogs])
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteModal" class="delete-modal">
                <div class="delete-box">
                    <h5>Confirm Deletion</h5>
                    <p>Are you sure you want to delete this post?</p>

                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                        <a href="#" id="deleteConfirmBtn" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>

<style>
    .admin-post-search {
        width: 100%;
    }

    .admin-post-toolbar {
        align-items: stretch;
    }

    .admin-post-add-btn {
        min-height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    @media (min-width: 768px) {
        .admin-post-toolbar {
            align-items: flex-start;
        }

        .admin-post-search {
            max-width: 360px;
        }

        #adminPostSearchStatus {
            position: absolute;
            top: calc(100% + 2px);
            left: 0;
            line-height: 1.2;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('adminPostSearch');
        const tableContainer = document.getElementById('adminBlogList');
        const status = document.getElementById('adminPostSearchStatus');

        if (!searchInput || !tableContainer) {
            return;
        }

        let searchTimer = null;
        let controller = null;

        function setLoading(isLoading) {
            if (status) {
                status.classList.toggle('d-none', !isLoading);
            }
        }

        function refreshFeatherIcons() {
            if (window.feather) {
                window.feather.replace();
            }
        }

        function buildUrl(searchValue, pageUrl = null) {
            const url = pageUrl ? new URL(pageUrl, window.location.origin) : new URL("{{ route('posts.list', [], false) }}", window.location.origin);

            if (searchValue.length >= 2) {
                url.searchParams.set('search', searchValue);
            } else {
                url.searchParams.delete('search');
            }

            return url;
        }

        function fetchPosts(pageUrl = null) {
            const searchValue = searchInput.value.trim();
            const url = buildUrl(searchValue, pageUrl);

            if (controller) {
                controller.abort();
            }

            controller = new AbortController();
            const activeController = controller;
            setLoading(true);

            fetch(url.toString(), {
                headers: {
                    'Accept': 'text/html',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                signal: controller.signal,
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Search request failed.');
                    }

                    return response.text();
                })
                .then(html => {
                    tableContainer.innerHTML = html;
                    refreshFeatherIcons();
                    window.history.replaceState({}, '', url.pathname + url.search);
                })
                .catch(error => {
                    if (error.name !== 'AbortError') {
                        console.error(error);
                    }
                })
                .finally(() => {
                    if (controller === activeController) {
                        setLoading(false);
                    }
                });
        }

        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimer);

            searchTimer = setTimeout(function () {
                fetchPosts();
            }, 300);
        });

        tableContainer.addEventListener('click', function (event) {
            const link = event.target.closest('.pagination a');

            if (!link) {
                return;
            }

            event.preventDefault();
            fetchPosts(link.href);
        });
    });
</script>

            <!-- footer start -->
<x-admin-footer>
</x-admin-footer>



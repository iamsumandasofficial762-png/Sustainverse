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
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5>ARTICLES</h5>
                                    </div>
                                    
                                    <div class="col-md-2  d-flex justify-content-end">
                                        <a href="{{ route('posts.add') }}" class="btn btn-primary">Add post</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body assign-table pt-0" id="adminBlogList">
                                <div class="table-responsive">
                                     <table class="table table-bordernone table-hover">
                                        <tbody>
                                            <tr class="table-dark" style="border-bottom: solid 1px #ccc;">
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">SL No.</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">Title</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">Author</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">Category</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">Create</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="fs-5">Action</h6>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            @php
                                                $level = 1;
                                            @endphp
                                            @foreach($blogs as $blog)
                                                <tr style="border-bottom: solid 1px #ccc;">
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <h6>{{ $level }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h6>{{ $blog->title }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h6>{{ $blog->author }}</h6>
                                                        </div>
                                                    </td>
                                                    <td style="width: 600px;">
                                                        <div class="box">
                                                            <h6>{{ $blog->categories->pluck('category_name')->implode(', ') }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <h6>{{ $blog->created_at->format('d M Y') }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('edit.post',$blog->slug) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                                            <button onclick="confirmDelete('{{ route('delete.post',$blog->slug) }}')" class="btn btn-danger ms-2"><i data-feather="trash-2"></i></button>
                                                            <!-- <a href="{{ route('delete.post',$blog->slug) }}" class="btn btn-danger ms-2"><i data-feather="trash-2"></i></a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @php
                                                $level++; 
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            {{ $blogs->links()}}
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

            <!-- footer start -->
<x-admin-footer>
</x-admin-footer>



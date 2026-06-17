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

            @forelse($blogs as $blog)
                <tr style="border-bottom: solid 1px #ccc;">
                    <td>
                        <div class="d-flex justify-content-center">
                            <h6>{{ ($blogs->firstItem() ?? 1) + $loop->index }}</h6>
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
                        </div>
                    </td>
                </tr>
            @empty
                <tr style="border-bottom: solid 1px #ccc;">
                    <td colspan="6">
                        <div class="py-4 text-center">
                            <h6>No articles found.</h6>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mb-3">
    {{ $blogs->links() }}
</div>

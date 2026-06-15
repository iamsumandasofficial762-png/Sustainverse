<x-admin-header title="Admin | Categories">
</x-admin-header>

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
                                        <h5>CATEGORY</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('categories.add') }}" class="btn btn-primary">Add</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="contaner">
                            <div class="row">
                                <div class="col-md-12 card">
                                    <div class="card-body assign-table pt-0">
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
                                                                <h6 class="fs-5">Category name</h6>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <h6 class="fs-5">Parent category name</h6>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <h6 class="fs-5">Description</h6>
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
                                                    @foreach ($all_categories as $category)
                                                        <tr style="border-bottom: solid 1px #ccc;">
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>{{ $level }}</h6>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>{{ $category->category_name }}</h6>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>{{ $category->parent?->category_name ?? 'N/A' }}</h6>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>{{ $category->description ?: 'N/A' }}</h6>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning ms-2"><i data-feather="edit"></i></a>
                                                                    <a href="{{ route('categories.delete',$category->id) }}" class="btn btn-danger ms-2"><i data-feather="trash-2"></i></a>
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
                                    {{ $all_categories->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
<x-admin-footer>
</x-admin-footer>



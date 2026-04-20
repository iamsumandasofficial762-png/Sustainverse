<x-admin-header title="Admin | Tags">
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
                                        <h5>TAG'S</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->
                <div class="row">
                    <div class="col-md-8">
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
                                                                <h6 class="fs-5">Tag's name</h6>
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
                                                    @foreach ($tags as $tag)
                                                        <tr style="border-bottom: solid 1px #ccc;">
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>{{ $level }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center">
                                                                    <h6>#{{ $tag->tags_name }}</h6>
                                                                    <input type="hidden" id="editTagContent-{{ $tag->id }}" value="{{ $tag->tags_name }}">
                                                                    <input type="hidden" id="editTagId-{{ $tag->id }}" value="{{ $tag->id }}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-end">
                                                                    <button onclick="tagEditBoxShow({{ $tag->id }})" class="btn btn-warning"><i data-feather="edit"></i></button>
                                                                    <!-- <a href="{{ route('tags.update')}}" class="btn btn-warning"><i data-feather="edit"></i></a> -->
                                                                    <a href="{{ route('tags.delete',$tag->id)}}" class="btn btn-danger ms-2"><i data-feather="trash-2"></i></a>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <label><h6 class="fs-3"><strong>ADD TAG'S</strong></h6></label>
                                    <form action="{{ route('tags.store') }}" method="post" class="row gx-3">
                                    @csrf
                                        <div class="form-group mt-2">
                                            <label for="tags" ><h6><strong>Tag name</strong></h6></label>
                                            <input 
                                            id="tags"
                                            name="tag_name"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter your tag name"
                                            value="{{ old('tag_name') }}"
                                            required="">
                                            @error('tag_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="container {{ $errors->has('edit_tag_name') ? '' : 'd-none' }}" id="tagEditBox">
                            <div class="card">
                                <div class="card-body">
                                    <label><h6 class="fs-3"><strong>ADD TAG'S</strong></h6></label>
                                    <form action="{{ route('tags.update') }}" method="post" class="row gx-3">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group mt-2">
                                            <label for="editTagContent" ><h6><strong>Tag name</strong></h6></label>
                                            <input type="hidden" name="edit_tag_id" id="editTagId" value="">
                                            <input 
                                            id="editTagContent"
                                            name="edit_tag_name"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter your tag name"
                                            value="{{ old('edit_tag_name') }}">
                                            @error('edit_tag_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                    
            </div>

<x-admin-footer>
</x-admin-footer>



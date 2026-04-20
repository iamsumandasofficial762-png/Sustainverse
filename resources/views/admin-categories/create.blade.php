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
                                        <label><h6 class="fs-3"><strong>ADD CATEGORY</strong></h6></label>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('posts.categories') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Container-fluid end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('categories.store') }}" method="post" class="row gx-3">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label for="category" ><h6><strong>Parent Category</strong></h6></label>
                                                <select name="parent_id" class="form-control">
                                                    <option value="">-- Select main category --</option>
                                                    @foreach ($categories as $parentCategory)
                                                        <option value="{{ $parentCategory->id }}" {{ old('parent_id') == $parentCategory->id ? 'selected' : '' }}>
                                                            {{ $parentCategory->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="category" ><h6><strong>Category name</strong></h6></label>
                                                <input 
                                                id="category"
                                                name="category_name"
                                                type="text" 
                                                class="form-control" 
                                                placeholder="Enter your category name"
                                                value="{{ old('category_name') }}"
                                                required="">
                                                @error('category_name')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        
                                            <button class="btn btn-primary">submit</button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label for="description"><h6><strong>Description</strong></h6></label>
                                                <textarea
                                                    id="description"
                                                    name="description"
                                                    class="form-control"
                                                    rows="5"
                                                    placeholder="Enter category description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<x-admin-footer>
</x-admin-footer>

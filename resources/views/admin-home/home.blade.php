<x-admin-header title="Admin | Home">
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
                                    <div class="col-md-12">
                                        <h5 class="fs-3">HOME PAGE</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                <!-- Container-fluid end -->
                 
                <!-- Container-fluid start -->
                <section>
                    
                    <form action="{{ route('home.store', 1) }}" method="post" id="heroForm">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row p-3">
                                        <div class="col-md-10 d-flex align-items-center ps-3">
                                            <div>
                                                <h3 class="m-0">HERO SECTION</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" onclick="heroFormSubmit()" class="btn btn-primary fs-5">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($sections->id == 1)
                                @if (!empty($sections->post_id))
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="sponser"><strong><h5>Sponser Post</h5></strong></label>
                                                <select name="post_id" id="sponser" class="form-control">
                                                    @foreach ($all_blogs as $blog)
                                                        <option 
                                                            value="{{ $blog->id }}" 
                                                            {{ $blog->id === $sections->post_id ? 'selected' : ''}}
                                                            >
                                                            {{ $blog->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div>  
                                    </div>
                                @endif
                            @endif
                            
                        </div>
                    </form>
                </section>
                <!-- Container-fluid end -->
            </div>

            <!-- footer start -->
<x-admin-footer>
</x-admin-footer>

<style>
    .leading-5 {
        margin-top:18px;
    }
    .w-5.h-5 {
        width:20px;
    }
</style>



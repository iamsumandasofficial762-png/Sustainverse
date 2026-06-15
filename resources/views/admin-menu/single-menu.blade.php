<x-admin-header title="Admin | Single Menu">
</x-admin-header>

        <!-- page header end -->
        <div class="page-body-wrapper">

            <x-side-navbar>
                
            </x-side-navbar>

            <x-message>
            </x-message>

            <div class="page-body">

                <!-- content here -->
                <section class="content">
                    <!-- Container-fluid start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h5 class="fs-3">MENU MANAGEMENT</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" onclick="menuFormSubmit()" class="btn btn-primary fs-5">UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <!-- Container-fluid end -->
                </section>

                <!-- MENU EDIT SECTION -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="main-box" id="mainBox">
                                @if (!empty($single_nav))
                                <form action="{{route('update.menu',$single_nav->id)}}" method="post" id="menuForm">
                                @csrf   
                                    <li class="card parent-item">
                                        <div class="main-list">
                                            <input 
                                            name="menu_name" 
                                            class="form-control" 
                                            value="{{ $single_nav->menu_name }}">
                                        </div>
                                    </li>
                                
                                        <!-- SUB MENU -->
                                    @if (!empty($single_nav->cat_ids))
                                        @foreach ($single_nav->cat_ids as $selectedCatId)
                                            <li>
                                                <ul class="sub-menu">
                                                    <li class="card">
                                                        <div class="main-list">
                                                            <select name="cat_id[]" class="form-control">
                                                                
                                                                <option value=""> -- select -- </option>

                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $category->id == $selectedCatId ? 'selected' : '' }}>
                                                                        {{ $category->category_name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif

                                    <li>
                                        <ul class="sub-menu">
                                            <li class="card">
                                                <div class="main-list">
                                                    <select name="cat_id[]" id="" class="form-control">
                                                        <option value=""> -- select -- </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <button type="button" class="btn btn-primary square-btn" onclick="addMainCatRow()"><i class="fa-solid fa-plus"></i></button>
                                    </li>
                                @endif
                                </form>
                            </ul>
                        </div>

                </section>


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



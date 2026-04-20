<x-header title="{{ ($pageTitle ?? 'Blog Classic') . ' - SustainVerse' }}">
</x-header>

<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title">
                <h1>{{ $pageTitle ?? 'Blog Classic' }}</h1>
                @if (!empty($pageDescription))
                    <p class="mt-3 fs-5">{{ $pageDescription }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TOP -->

<!-- START BLOG -->
<section class="blog-page section-padding">
    <div class="container">
        @if ($blogs->total() > 0)
            <div class="mb-3">
                <div class="card-body">
                    <h4>
                        Showing
                        @if ($blogs->hasPages())
                            {{ $blogs->count() }}/{{ $blogs->total() }}
                        @else
                            {{ $blogs->total() }}
                        @endif
                    </h4>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9 col-sm-12 col-xs-12">
                
                <div class="row">
                    @if ($blogs->count() > 0)
                        @foreach ($blogs as $blog)
                        <div class="col-lg-4 mb-3">
                            <div class="blog-card">
                                <div class="card-img">
                                    <a href="{{ route('blog.single',$blog->slug)}}">
                                        <img src="{{ asset($blog->image) }}" alt="blog">
                                    </a>
                                </div>

                                <div class="card-content">
                                    <div class="category-box">
                                        @foreach ($blog->categories->take(10) as $category)
                                            <a href="{{ route('blog.category', $category->category_slug) }}" class="">
                                                <span class="category">{{ $category->category_name }}</span>
                                            </a>
                                        @endforeach
                                    </div>

                                    <p class="date fs-6"><i class="far fa-calendar-alt me-1"></i> {{ $blog->created_at->format('d M Y') }}</p>

                                    <div class="title-box">
                                        <h3 class="title">
                                            <a href="{{ route('blog.single',$blog->slug)}}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                    </div>

                                    <p class="desc">
                                        {{ strip_tags($blog->content) }}
                                        <a href="{{ route('blog.single',$blog->slug)}}" class="read-more"><span>...</span>Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="blog-card text-center p-5">
                                <div class="card-content">
                                    <h2 class="title mb-3">content Coming Soon For This Category</h2>
                                    @if (!empty($selectedCategory?->description))
                                        <p class="desc mb-0">{{ $selectedCategory->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if ($blogs->hasPages())
                    {{ $blogs->links('vendor.pagination.blog-pagination') }}
                @endif
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-3 col-sm-12 col-xs-12">

                <div class="blog_search">
                    <h4 class="blog_sidebar_title">. Search</h4>
                    <input 
                    id="searchCategory"
                    type="text"
                    class="form-control" 
                    placeholder="Type & Press Enter"
                    autocomplete="off">
                    <div id="searchCatResults" class="list-group mt-1"></div>
                </div>

                <div class="categories">
                    <h4 class="blog_sidebar_title">. Categories</h4>
                    <ul class="category-list">
                        @foreach ($categories as $category)
                        <li>
                            <div class="category-list-item">
                                <a href="{{ route('blog.category', $category->category_slug) }}" class="category-list-link">
                                    <span class="category-list-name">
                                        <i class="fa-solid fa-arrow-down"></i>{{ $category->category_name }}
                                    </span>
                                    <span class="category-list-count">( {{ $category->blogs_count }} )</span>
                                </a>
                            </div>
                        </li>
                            @foreach ($sub_categories as $sub)
                                @if ($category->id == $sub->parent_id)
                                    <li class="ms-2">
                                        <div class="category-list-item">
                                            <a href="{{ route('blog.subcategory', ['category' => $category->category_slug, 'subcategory' => $sub->category_slug]) }}" class="category-list-link">
                                                <span class="category-list-name">
                                                    <i class="fa-solid fa-arrow-down-long"></i>{{ $sub->category_name }}
                                                </span>
                                                <span class="category-list-count">( {{ $sub->blogs_count }} )</span>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>

                <div class="latest_blog">
                    <h4 class="blog_sidebar_title">. Latest Blog</h4>
                    @foreach ($all_blogs as $blog)
                        <div class="single_latest_blog">
                            <div class="blog-list-img">
                                <a href="{{ route('blog.single',$blog->slug)}}">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title}}" class="img-fluid">
                                </a>
                            </div>
                            <span><i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                            <div class="blog-box">
                                <a href="{{ route('blog.single',$blog->slug)}}">{{ $blog->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END BLOG -->

<x-footer>
</x-footer>

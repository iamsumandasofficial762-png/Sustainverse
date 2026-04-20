<x-header title="Blogs - SustainVerse">
</x-header>

<!-- START SECTION TOP -->
<section class="section-top">
    <div class="container">
        <div class="col-lg-10 offset-lg-1 text-center">
            <div class="section-top-title">
                @if($single_blog)
                    <h3 style="font-size: 35px; line-height: 1.15;">{{ $single_blog->title }}</h3>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- END SECTION TOP -->

<!-- START BLOG -->
<section class="blog-page section-padding">
    <div class="container">
        <div class="row">

            <!-- BLOG CONTENT -->
            <div class="col-lg-8 col-sm-12 col-xs-12">
                @if($single_blog)
                    <div class="post-details-box bg-white mb-3">
                        <div class="post-slide-blog post-single">
                            <div class="single-blog-img">
                                <img src="{{ asset($single_blog->image) }}" class="img-fluid" alt="image">
                            </div>

                            <div class="p-2">
                                <span><i class="fa-regular fa-user me-1"></i> {{ $single_blog->author }}</span>
                                <span><i class="fa-regular fa-calendar-days"></i> {{ $single_blog->created_at->format('M d, Y') }}</span>
                                @if ($commentsCount)
                                    <span><i class="fa-regular fa-comment"></i> Comment ({{ $commentsCount }})</span>
                                @endif
        
                                <h2>
                                    <a href="">{{ $single_blog->title }}</a>
                                </h2>
        
                                <div class="blog-content-body">
                                    {!! $single_blog->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- COMMENTS -->
                @if ($comments->count() > 0)
                    <div class="comments_part bg-white">
                        @if ($commentsCount)
                        <h3 class="blog_head_title">{{ $commentsCount }} Comments</h3>
                        @endif
                        <div id="commentList">
                            @foreach ($comments as $comment)
                                <div class="single_comment">
                                    <img src="{{ asset('assets/images/icon-user.png') }}" alt="">
                                    <h4>{{ $comment->name }}</h4>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3">
                            {{ $comments->links() }}
                        </div>
                    </div>
                @endif


                <!-- COMMENT FORM -->
                <div class="comment_form srex-contact__left coment_bg_none">
                    <h3 class="blog_head_title">Add a Comment</h3>
                    <div class="contact comment-box">
                        <form action="{{ route('posts.comment') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    @if($single_blog)
                                        <input type="hidden" name="blog_id" value="{{ $single_blog->id }}">
                                        <input type="hidden" name="blog_slug" value="{{ $single_blog->slug }}">
                                    @endif
                                    <input type="text" name="name" placeholder="Your Name" required>
                                    <div>
                                        @error('name')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <div>
                                        @error('email')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" rows="5" placeholder="Your Comment" value="{{ old('message') }}" required></textarea>
                            <div>
                                @error('message')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="srex-btn srex-btn--secondary">Submit Comment</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 col-sm-12 col-xs-12">

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
                    <h4 class="blog_sidebar_title">. Categories </h4>
                    <ul>
                        @foreach ($categories as $category)
                        <li>
                            <div class="category-list-item">
                                <a href="{{ route('blog.category',str_replace(' ', '-', $category->category_name)) }}" class="category-list-link">
                                    <span class="category-list-name">
                                        <i class="fa-solid fa-arrow-down"></i>{{ $category->category_name }}
                                    </span>
                                    <span class="category-list-count">( {{ $category->blogs_count }} )</span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="latest_blog">
                    <h4 class="blog_sidebar_title">. Latest Blog
                    </h4>
                    @foreach ($blogs as $blog)
                        @if ($blog->id != $single_blog->id)
                        <div class="single_latest_blog">
                            <div class="blog-list-img">
                                <a href="{{ route('blog.single',$blog->slug)}}">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title}}">
                                </a>
                                
                            </div>
                            <span><i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                            <div class="blog-box">
                                <a href="{{ route('blog.single',$blog->slug)}}">{{ $blog->title}}</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END BLOG -->

<x-footer>
</x-footer>

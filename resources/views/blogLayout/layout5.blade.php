@extends("layouts.app")
@section('docTitle')
    {{$post->title}}
@endsection
@section("content")
    <!-- breadcam_area_start -->
    <div class="breadcam_area overlay2" style="background-position:center; background-image: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('{{$post->thumbnail}}')">
        <div class="bradcam_text">
            <h3>{{$post->title}}</h3>
        </div>
    </div>
    <!-- breadcam_area_end -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <hr>
            <ul class="blog-info-link mt-3 mb-4">
                <li><a href="#"><i class="fa fa-user"></i>{{$post->user->name}}</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> @foreach($post->tags->all() as $tag){{$tag->name}}@endforeach</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
            </ul>
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="blog_details">
                            <p class="excert">
                                {{$post->body}}
                            </p>
                        </div>
                        @foreach ($post->product as $product)
                            <div class="feature-img">
                                <a href="{{$product->link}}" target="_blank">
                                    <img class="img-fluid" src="{{$product->image}}" alt="">
                                </a>
                            </div>
                            <div class="blog_details" style="margin-bottom: 20%">
                                <a class="blog-title-link" href="{{$product->link}}" target="_blank">
                                    <h2>{{$product->title}}</h2>
                                </a>
                                <hr>
                                <p>
                                    {{$product->body}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    @if($previous)
                                        <div class="thumb">
                                            <a href="/post/{{$previous->tags->first()->name}}/{{str_replace(' ', '_', $previous->title)}}/{{$previous->id}}">
                                                <img class="img-fluid" src="/img/post/preview.png" alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="/post/{{$previous->tags->first()->name}}/{{str_replace(' ', '_', $previous->title)}}/{{$previous->id}}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="/post/{{$previous->tags->first()->name}}/{{str_replace(' ', '_', $previous->title)}}/{{$previous->id}}">
                                                <h4>{{$previous->title}}</h4>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    @if($next)
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="/post/{{$next->tags->first()->name}}/{{str_replace(' ', '_', $next->title)}}/{{$next->id}}">
                                                <h4>{{$next->title}}</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="/post/{{$next->tags->first()->name}}/{{str_replace(' ', '_', $next->title)}}/{{$next->id}}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                                <a href="/post/{{$next->tags->first()->name}}/{{str_replace(' ', '_', $next->title)}}/{{$next->id}}">
                                                    <img class="img-fluid" src="/img/post/next.png" alt="">
                                                </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="comments-area">--}}
{{--                        <h4>05 Comments</h4>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="/img/comment/comment_1.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <p class="comment">--}}
{{--                                            Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
{{--                                            Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
{{--                                        </p>--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <h5>--}}
{{--                                                    <a href="#">Emilly Blunt</a>--}}
{{--                                                </h5>--}}
{{--                                                <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="reply-btn">--}}
{{--                                                <a href="#" class="btn-reply text-uppercase">reply</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="/img/comment/comment_2.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <p class="comment">--}}
{{--                                            Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
{{--                                            Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
{{--                                        </p>--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <h5>--}}
{{--                                                    <a href="#">Emilly Blunt</a>--}}
{{--                                                </h5>--}}
{{--                                                <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="reply-btn">--}}
{{--                                                <a href="#" class="btn-reply text-uppercase">reply</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="comment-list">--}}
{{--                            <div class="single-comment justify-content-between d-flex">--}}
{{--                                <div class="user justify-content-between d-flex">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <img src="/img/comment/comment_3.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="desc">--}}
{{--                                        <p class="comment">--}}
{{--                                            Multiply sea night grass fourth day sea lesser rule open subdue female fill which them--}}
{{--                                            Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser--}}
{{--                                        </p>--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <h5>--}}
{{--                                                    <a href="#">Emilly Blunt</a>--}}
{{--                                                </h5>--}}
{{--                                                <p class="date">December 4, 2017 at 3:12 pm </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="reply-btn">--}}
{{--                                                <a href="#" class="btn-reply text-uppercase">reply</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="comment-form">--}}
{{--                        <h4>Leave a Reply</h4>--}}
{{--                        <form class="form-contact comment_form" action="#" id="commentForm">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"--}}
{{--                                        placeholder="Write Comment"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget">
                            <div class="blog-author">
                                <div class="media align-items-center">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                                    <div class="media-body">
                                        <a href="#">
                                            <h4>Tymen Vis</h4>
                                        </a>
                                        <p>- Author</p>
                                        <p>- Web Developer</p>
                                        <p>- Founder</p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @if($posts)
                                @foreach($posts as $post)
                                    <div class="media post_item">
                                        <img src="/img/post/post_1.png" alt="post">
                                        <div class="media-body">
                                            <a href="single-blog.html">
                                                <h3>{{$post->title}}</h3>
                                            </a>
                                            <p>{{$post->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tags</h4>
                            <ul class="list">
                                @foreach($tags as $tag)
                                    <li><a href="/tag/{{$tag->name}}">{{$tag->name}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
{{--                        <aside class="single_sidebar_widget instagram_feeds">--}}
{{--                            <h4 class="widget_title">Instagram Feeds</h4>--}}
{{--                            <ul class="instagram_row flex-wrap">--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_5.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_6.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_7.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_8.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_9.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <img class="img-fluid" src="/img/post/post_10.png" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </aside>--}}
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection

@extends("layouts.app")
@section('docTitle')
    Category
@endsection
@section("activeCatg")
    active
    @endsection
@section("content")
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- photography_slider_area_start -->
<div class="photography_slider_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-33">
                    <h3>Categoriën</h3>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="photoslider_active owl-carousel">
                    @if(count($tags) > 0)
                        @foreach($tags as $tag)
                            <a href="/tag/{{$tag->name}}">
                                <div class="single_photography">
                                        <img class="Tagimage" src="{{$tag->imageSrc}}" alt="">
                                        <div class="photo_title">
                                            <h4>{{$tag->name}}</h4>
                                        </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="single_photography">
                            <img src="img/photography/single-2.jpg" alt="">
                            <div class="photo_title">
                                <h4>Travel Shot</h4>
                            </div>
                        </div>
                        <div class="single_photography">
                            <img src="img/photography/single-3.jpg" alt="">
                            <div class="photo_title">
                                <h4>Photoshop</h4>
                            </div>
                        </div>
                        <div class="single_photography">
                            <img src="img/photography/single-4.jpg" alt="">
                            <div class="photo_title">
                                <h4>Lens</h4>
                            </div>
                        </div>
                        <div class="single_photography">
                            <img src="img/photography/single-1.jpg" alt="">
                            <div class="photo_title">
                                <h4>Photography</h4>
                            </div>
                        </div>
                        <div class="single_photography">
                            <img src="img/photography/single-2.jpg" alt="">
                            <div class="photo_title">
                                <h4>Travel Shot</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- photography_slider_area_end -->

<!-- most_recent_blog_start -->
<div class="most_recent_blog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-33">
                    <h3>Most Recent</h3>
                    <p>We found: {{count($posts)}} posts</p>
                </div>
            </div>
            <div class="col-xl-8 col-md-8">
                <div class="row">
                    @if($posts)
                        @foreach($posts as $post)
                            <div class="col-xl-6 col-md-6">
                                <div class="single_blog">
                                    <div class="blog_thumb">
                                        <a href="/post/{{$post->tags->first()->name}}/{{str_replace(' ', '_', $post->title)}}/{{$post->id}}">
                                            <img class="img-fluid" src="{{$post->thumbnail}}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog_meta">
                                        <p><a href="/post/{{$post->tags->first()->name}}/{{str_replace(' ', '_', $post->title)}}/{{$post->id}}">{{$post->tags->first()->name}}</a></p>
                                        <h3><a href="/post/{{$post->tags->first()->name}}/{{str_replace(' ', '_', $post->title)}}/{{$post->id}}">
                                                {{$post->title}} <br>
                                                Greenland
                                            </a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-xl-6 col-md-6">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="/img/most_recent/1.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog_meta">
                                <p><a href="#">Photography I 24 May 2019</a></p>
                                <h3><a href="#">
                                        Lost Is Just a Four Letter <br>
                                        Word
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="/img/most_recent/3.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog_meta">
                                <p><a href="#">Photography I 24 May 2019</a></p>
                                <h3><a href="#">
                                        Break through Photo-graphy <br>
                                        Filters for Travel Shot
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="/img/most_recent/4.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog_meta">
                                <p><a href="#">Photography I 24 May 2019</a></p>
                                <h3><a href="#">
                                        Tank Releases New Photo <br>
                                        Protection Concepts
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="/img/most_recent/5.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog_meta">
                                <p><a href="#">Photography I 24 May 2019</a></p>
                                <h3><a href="#">
                                        The Desolate Beauty of <br>
                                        Greenland
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="/img/most_recent/6.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog_meta">
                                <p><a href="#">Photography I 24 May 2019</a></p>
                                <h3><a href="#">
                                        Lost Is Just a Four Letter <br> Word
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="btn_area text-center">
                            <a href="#" class="boxed-btn">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="blog_right_side">
                    <div class="section_title mb-33">
                        <h3>Follow Us</h3>
                    </div>
                    <div class="foollow_links">
                        <ul class="d-flex align-items-center justify-content-between">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                    <h2>142K</h2>
                                    <p>followers</p>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <i class="fa fa-instagram"></i>
                                    <h2>142K</h2>
                                    <p>followers</p>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="#">
                                    <i class="fa fa-twitter"></i>
                                    <h2>142K</h2>
                                    <p>followers</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="add_here text-center">
                        <a href="#">
                            <img src="img/most_recent/googleAdd2.jpg" alt="">
                        </a>
                    </div>
                    <div class="section_title mb-33">
                        <h3>Tags</h3>
                    </div>
                    <div class="tags">
                        <ul>
                            <li><a href="#">camera</a></li>
                            <li><a href="#">photography</a></li>
                            <li><a href="#">lens</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">magazine</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- instagram_media_area_end -->
@endsection

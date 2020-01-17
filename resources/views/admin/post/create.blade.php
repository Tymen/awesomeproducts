@extends("layouts.admin")
@section("docTitle")
    Tag Create
@endsection
@section("sidenavBlog")
    active
@endsection
@section("head")
    <link href="/css/select2.css" rel="stylesheet"/>
@endsection
@section("content")
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Create a blog post</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Create a blog post            </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong class="d-block">Create a blog post</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                            <div class="block-body">
                                <form class="col-12" action="/admin/post" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="content">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="title" placeholder="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select Tags</label>
                                            <select id="e9" name="tags[]" class="form-control mb-3 mb-3"  multiple>
                                                @foreach($tags as $tag)
                                                    <option style="display: block!important" value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h3>Aanhef/Intro</h3>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="thumbnailLink" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="body"></textarea>
                                        </div>

                                        <h3>Product 1</h3>
                                        <hr style="background-color: gray;">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="titleProd_1" placeholder="title" class="form-control">
                                        </div>
                                            <div class="form-group">
                                            <label class="form-control-label">Affiliate link</label>
                                            <input type="name" name="affLink_1" placeholder="link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select picture</label>
                                            <input type="file" name="product_1" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="productLink_1" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">beschrijving</label>
                                            <textarea class="form-control" name="bodyProd_1"></textarea>
                                        </div>

                                        <h3>Product 2</h3>
                                        <hr style="background-color: gray;">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="titleProd_2" placeholder="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Affiliate link</label>
                                            <input type="name" name="affLink_2" placeholder="link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select picture</label>
                                            <input type="file" name="product_2" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="productLink_2" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">beschrijving</label>
                                            <textarea class="form-control" name="bodyProd_2"></textarea>
                                        </div>

                                        <h3>Product 3</h3>
                                        <hr style="background-color: gray;">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="titleProd_3" placeholder="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Affiliate link</label>
                                            <input type="name" name="affLink_3" placeholder="link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select picture</label>
                                            <input type="file" name="product_3" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="productLink_3" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">beschrijving</label>
                                            <textarea class="form-control" name="bodyProd_3"></textarea>
                                        </div>

                                        <h3>Product 4</h3>
                                        <hr style="background-color: gray;">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="titleProd_4" placeholder="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Affiliate link</label>
                                            <input type="name" name="affLink_4" placeholder="link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select picture</label>
                                            <input type="file" name="product_4" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="productLink_4" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">beschrijving</label>
                                            <textarea class="form-control" name="bodyProd_4"></textarea>
                                        </div>
                                        <h3>Product 5</h3>
                                        <hr style="background-color: gray;">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="name" name="titleProd_5" placeholder="title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Affiliate link</label>
                                            <input type="name" name="affLink_5" placeholder="link" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select picture</label>
                                            <input type="file" name="product_5" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="productLink_5" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="bodyProd_5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">beschrijving</label>
                                            <input class="form-control" type="submit" value="add" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
                integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
                crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
        <script>$("#e9").select2();</script>
    </div>
@endsection

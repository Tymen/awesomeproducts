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
                                        <div class="form-group">
                                            <label class="form-control-label">Select amound of products</label>
                                            <select class="form-control" onchange="setProd(this)">
                                                <option value="2">1</option>
                                                <option value="4">3</option>
                                                <option value="6">5</option>
                                                <option value="11">10</option>
                                            </select>
                                        </div>
                                        <div id="productList" class="mt-3">
                                            <div id="productDiv_1">
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
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="prodCount" name="prodCount" type="hidden" value="1">
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
        <script>
            function setProd(el){
                let i;
                for(i = 1; i < parseInt(el.value); i++){
                    console.log(el)
                    let name = `productDiv_${i}`;
                    const products = document.getElementById("productList");
                    const div = document.createElement('div');
                    div.id = name;
                    div.innerHTML = `
                    <h3>Product ${i}</h3>
                    <hr style="background-color: gray;">
                    <div class="form-group">
                        <label class="form-control-label">Title</label>
                        <input type="name" name="titleProd_${i}" placeholder="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Affiliate link</label>
                        <input type="name" name="affLink_${i}" placeholder="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Select picture</label>
                        <input type="file" name="product_${i}" class="form-control-file" id="exampleFormControlFile1">
                        <input type="name" placeholder="or input a image link" name="productLink_${i}" class="form-control" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">beschrijving</label>
                        <textarea class="form-control" name="bodyProd_${i}"></textarea>
                    </div>
                    `
                    document.getElementById("prodCount").value = i;
                    if(document.getElementById(name)){

                    }else {
                        products.appendChild(div);
                    }
                    for(x = 1; x < 11; x++){
                        if(document.getElementById(`productDiv_${x}`)){
                            let getId = document.getElementById(`productDiv_${x}`).id;
                            if(parseInt(getId.replace( /[^\d.]/g, '' )) > i){
                                products.removeChild(document.getElementById(`productDiv_${x}`))
                            }
                        }
                    }
                }
            }
        </script>
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

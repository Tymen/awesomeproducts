@extends("layouts.admin")
@section("docTitle")
    Tag Create
@endsection
@section("sidenavTag")
    active
@endsection
@section("content")
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Create a tag</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Create a tag            </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Basic Form-->
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong class="d-block">Create a tag</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                                <div class="block-body">
                                    <form action="/admin/tag" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Tag</label>
                                            <input type="name" name="name" placeholder="Tagname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class=" form-control-label">Select Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
                                            <input type="name" placeholder="or input a image link" name="thumbnailLink" class="form-control" id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="add" class="btn btn-primary">
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
        </div>
    </div>
@endsection

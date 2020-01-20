@extends("layouts.admin")
@section("docTitle")
    show contact message
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
                <li class="breadcrumb-item active">show contact message           </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong class="d-block">show contact message</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                            <div class="block-body">
                                <form action="/admin/tag" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Subject</label>
                                        <input type="name" name="name" placeholder="name" value="{{$message->subject}}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">name</label>
                                        <input type="name" name="name" placeholder="name" value="{{$message->name}}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">email</label>
                                        <input type="name" name="name" placeholder="name" value="{{$message->email}}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">email</label>
                                        <textarea class="form-control" disabled>{{$message->message}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn-dark" href="mailto:{{$message->email}}">React</a>
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

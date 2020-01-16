@extends("layouts.admin")
@section("docTitle")
    Tag Create
@endsection
@section("sidenavUser")
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
                <h2 class="h5 no-margin-bottom">Create a tag</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit user           </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Basic Form-->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong class="d-block">Edit user: {{$user->name}}</strong><span class="d-block"></span></div>
                            <div class="block-body">
                                <form class="col-6" action="/admin/users/{{$user->id}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input type="name" name="name" placeholder="title" value="{{$user->name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input type="email" name="email" placeholder="Email" value="{{$user->email}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Select Role</label>
                                        <select id="e9" name="roles[]" class="form-control mb-3 mb-3"  multiple>
                                            @foreach($roles as $role)
                                                <option style="display: block!important" value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="submit" value="add" class="btn btn-primary">
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script>
        $("#e9").select2();
        $('#e9').val([@foreach($user->role as $selrole)'{{$selrole->id}}',@endforeach]); // Select the option with a value of '1'
        $('#e9').trigger('change');
    </script>
@endsection

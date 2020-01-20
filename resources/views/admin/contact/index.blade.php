@extends("layouts.admin")
@section("docTitle")
    Contact
@endsection
@section("sidenavContact")
    active
@endsection
@section("content")
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Users overview</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User overview            </li>
            </ul>
        </div>
        <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong>User Accounts</strong></div>
                            @if($alert)
                                <div class="alert alert-success" role="alert">
                                    {{$alert}}
                                </div>
                            @endif
                            @if($errorMessage)
                                <div class="alert alert-danger" role="alert">
                                    {{$errorMessage}}
                                </div>
                            @endif
                            <div class="form-group">
                                <a class="form-control link" href="/admin/users/create" style="text-align: center" class="btn btn-primary">create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Onderwerp</th>
                                        <th>Email</th>
                                        <th>reacted</th>
                                        <th>Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr style="cursor: pointer" onclick="window.location.href = '/admin/contact/{{$message->id}}'">
                                            <th scope="row">{{$message->id}}</th>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->email}}</td>
                                            @if($message->read)
                                                <td>true</td>
                                            @else
                                                <td>false</td>
                                            @endif
                                            <td>{{$message->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

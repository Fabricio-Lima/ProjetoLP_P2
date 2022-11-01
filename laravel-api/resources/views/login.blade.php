@extends("templates.template-anonymous")

@section("titlePage")
    Login
@endsection

@section("anonymous-content")
    <div class="section">
        <div style="display: flex;">
            <div class="col-md-5">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title"> Login </h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/login') }}" method="post">
                        {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12 pr-3 pl-3">
                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="email" class="form-control" placeholder="" value="fabricio@mail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-3 pl-3">
                                    <div class="form-group">
                                        <label> Senha </label>
                                        <input type="password" class="form-control" placeholder="" value="fabricio">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" value="Save" class="btn btn-primary btn-round"> Login </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

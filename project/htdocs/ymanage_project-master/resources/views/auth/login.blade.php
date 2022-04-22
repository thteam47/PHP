<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" type="text/css">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" language="JavaScript" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}" language="JavaScript" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" language="JavaScript" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" language="JavaScript" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" language="JavaScript" type="text/javascript"></script>
    <script src="{{ asset('js/all.min.js') }}" language="JavaScript" type="text/javascript"></script>
</head>

<body>
<div class="background-make-color">
    <div class="container d-flex justify-content-center">
        <div class="form-login">
            <form action="{{ route('postLogin') }}" method="post" class="form-center">
                @csrf
                <div class="form-login-group pt-2">
                    <i class="far fa-user icon-login"></i>
                    <input type="text" class="form-login-input" placeholder="User" name="username">
                </div>
                <p>{{ $errors->first('username') }}</p>
                <div class="form-login-group pt-2">
                    <i class="fas fa-lock icon-login"></i>
                    <input type="password" class="form-login-input" placeholder="Password" name="password">
                </div>
                <p>{{ $errors->first('password') }}</p>
                <p>{{ isset($errorfail) ? $errorfail : ''  }}</p>
                <div class="form-login-group pt-2">
                    <input type="submit" name="submit" value="Đăng nhập" class="form-login-button">
                </div>

            </form>
            <hr style="">
            <button class="form-login-button mt-1" data-toggle="modal" data-target="#registerModal">
                Đăng ký
            </button>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="form-register">
                        @csrf
                        <div class="modal-body">
                            <div class="form-login-group pt-2">
                                <i class="far fa-user icon-login"></i>
                                <input type="text" id="" class="form-login-signup" placeholder="Tên đăng nhập"
                                       name="username">
                                <p class="error-form"></p>
                            </div>
                            <div class="form-login-group pt-2">
                                <i class="fas fa-lock icon-login"></i>
                                <input type="text" class="form-login-signup" placeholder="Tên hiển thị" name="name">
                                <p class="error-form"></p>

                            </div>
                            <div class="form-login-group pt-2">
                                <i class="fas fa-lock icon-login"></i>
                                <input type="email" class="form-login-signup" placeholder="Email"
                                       name="email">
                                <p class="error-form"></p>

                            </div>
                            <div class="form-login-group pt-2">
                                <i class="fas fa-lock icon-login"></i>
                                <input type="password" class="form-login-signup" placeholder="Mật khẩu"
                                       name="password">
                                <p class="error-form"></p>

                            </div>
                            <div class="form-login-group pt-2">
                                <i class="fas fa-lock icon-login"></i>
                                <input type="password" class="form-login-signup" placeholder="Nhập lại mật khẩu"
                                       name="repassword">
                                <p class="error-form"></p>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="register()">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function register() {
        $('.error-form').html('');
        $.ajax({
            url: '{{ route('postRegister') }}',
            data: new FormData($("#form-register")[0]),
            contentType: false,
            processData: false,
            method: "POST",
        }).done(function (data) {
            window.location.href = '{{ url('/manage') }}';
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors.errors, function (i, val) {
                $("#form-register").find("input[name=" + i + "]").siblings('.error-form').text(val[0]);
            });
        });
    }
</script>
</html>

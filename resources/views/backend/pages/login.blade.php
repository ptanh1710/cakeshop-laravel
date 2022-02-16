<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{asset('public/backend')}}/">
        {{-- <base href="/resources/public/backend/"> --}}
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin | Đăng Nhập</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background: linear-gradient(45deg,blue,deeppink)">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header"><h3 class="text-center text-capitalize font-weight-light my-4">Đăng nhập hệ thống</h3></div>
                                    <div class="mb-3">
                                        @php
                                            $message = Session::get('message');
                                            if($message){
                                                echo $message;
                                                $message = Session::put('message', null);
                                            }
                                        @endphp

                                    </div>
                                    <div class="card-body">
                                        <form action="{{URL::TO('/admin_login')}}" method="post">
                                            {{ csrf_field() }}

                                            <div class="mb-3">
                                                <label for="inputEmail" class="form-label">Tài khoản</label>
                                                <input class="form-control" id="inputEmail" type="email" name="admin_gmail" placeholder="Tài khoản admin" value="{{old('admin_gmail')}}" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputPassword" class="form-label">Mật khẩu</label>
                                                <input class="form-control" id="inputPassword" type="password"  name="admin_password" placeholder="Mật khẩu" required/>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary p-2" style="width:100%">Đăng nhập</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

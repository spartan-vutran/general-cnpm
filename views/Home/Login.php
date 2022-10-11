
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous" />

    <!--Fontawesome CDN-->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous" />

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/assets/css/site.css" />
</head>
<body class="login-page">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Đăng nhập</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span>
                            <i class="fab fa-google-plus-square"></i>
                        </span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/Home/Login" method="post">
                        <!-- <span asp-validation-for="UserName" class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text"
                                   required="required"
                                   class="form-control"
                                   placeholder="Tên tài khoản"
                                   name="UserName" 
                                   />
                        </div>
                        <!-- <span asp-validation-for="Password" class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password"
                                   required="required"
                                   class="form-control"
                                   placeholder="Mật khẩu"
                                   name="Password" />
                        </div>
                        <!-- @if(Model!=null){
                            @if(Model.ErrorMessage!=null){
                                <span class="text-danger">@Model.ErrorMessage</span>
                            }
                        } -->
                        <div class="form-group">
                            <input type="submit"
                                   value="Đăng nhập"
                                   class="btn float-right login_btn" />
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="/Home/index"
                           class="btn float-left login_btn">
                            Trở lại
                        </a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Bạn chưa có tài khoản?<a href="/Home/Register">Đăng ký</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="/ResetPassword">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
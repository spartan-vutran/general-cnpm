<?php 
    $err = [];
    $name= $pass= $repass = $fullname = $phonenumber = $email = $birthday = $gender = '';
    if(isset($_POST['UserName'])){
        $name = $_POST['UserName'];
        $pass = $_POST['Password'];
        $repass = $_POST['RePassword'];
        $fullname = $_POST['FullName'];
        $phonenumber = $_POST['PhoneNumber'];
        $email = $_POST['Email'];
        $birthday = $_POST['Birthday'];
        $gender = $_POST['Gender'];

        if(empty($name)){
            $err['name'] = "Bạn chưa điền tên đăng nhập";
        }
        if(empty($pass)){
            $err['pass'] = "Bạn chưa nhập mật khẩu";
        }
        if($repass != $pass){
            $err['repass'] = "Mật khẩu không khớp";
        }
        if(empty($fullname)){
            $err['fullname'] = "Bạn chưa nhập họ tên";
        }
        if(empty($phonenumber)){
            $err['phonenumber'] = "Bạn chưa nhập số điện thoại";
        }
        if(empty($email)){
            $err['email'] = "Bạn chưa nhập email";
        }
        if(empty($birthday)){
            $err['birthday'] = "Bạn chưa nhập ngày sinh";
        }
        if(empty($gender)){
            $err['gender'] = "Bạn chưa chọn giới tính";
        }

    }

?>
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
                    <h3>Đăng ký</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="/Home/Register" >
                        <!-- <span class="text-danger"></span> -->
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
                                   value="<?php if(isset($data["acc"][0])) echo $data["acc"][0]; ?>"
                                   />
                        </div>
                        <!-- <span class="text-danger"></span> -->
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
                                   name="Password" 
                                   value="<?php if(isset($data["acc"][1])) echo $data["acc"][1]; ?>"
                                   />
                        </div>
                        <span class="text-danger"><?php echo $data["err"] ?></span>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password"
                                   class="form-control"
                                   required="required"
                                   placeholder="Xác nhận mật khẩu"
                                   name="RePassword"
                                    />
                        </div>
                        <!-- <span class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-signature"></i>
                                </span>
                            </div>
                            <input type="text"
                                   class="form-control"
                                   required="required"
                                   placeholder="Họ và tên"
                                   name="FullName" 
                                   value="<?php if(isset($data["acc"][2])) echo $data["acc"][2]; ?>"
                                   />
                        </div>
                        <!-- <span class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text"
                                   required="required"
                                   class="form-control"
                                   placeholder="Số điện thoại"
                                   name="PhoneNumber"
                                   value="<?php if(isset($data["acc"][3])) echo $data["acc"][3]; ?>"
                                    />
                        </div>
                        <!-- <span class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope-open-text"></i>
                                </span>
                            </div>
                            <input type="email"
                                   required="required"
                                   class="form-control"
                                   placeholder="Email"
                                   name="Email"
                                   value="<?php if(isset($data["acc"][4])) echo $data["acc"][4]; ?>"
                                    />
                        </div>
                        <!-- <span class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-birthday-cake"></i>
                                </span>
                            </div>
                            <input type="date" id="birthdaytime" 
                                name="Birthday" class="form-control" 
                                value="<?php if(isset($data["acc"][5])) echo $data["acc"][5]; ?>"
                            >
                        </div>
                        <!-- <span class="text-danger"></span> -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-venus-mars"></i>
                                </span>
                            </div>
                            <select class="form-control" name="Gender">
                                <option value="true">Nam</option>
                                <option value="false">Nữ</option>
                            </select>
                        </div>
                        <!-- @if(Model!=null){
                            @if(Model.ErrorMessage!=null){
                                <span class="text-danger">@Model.ErrorMessage</span>
                            }
                        } -->
                        <div class="form-group">
                            <input type="submit"
                                   value="Đăng ký"
                                   class="btn float-right login_btn" />
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="/Home/Login"
                           class="btn float-left login_btn">
                            Trở lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
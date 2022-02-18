<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Nhúng file CSS -->
       
        <style>
            body {
                font-family: Arial, sans-serif;
                background: url('public/backend/images/bg.jpg') no-repeat 0 0 ;
                background-size: cover;
            }

            a {
                color: #00bd00;
            }

            * {
                box-sizing: border-box;
            }

            .register {
                background: url('public/backend/images/bg_min.jpg') no-repeat 0 0 ;
                background-size: cover;
                width: 500px;
                padding: 16px;
                margin: 0 auto;
                background-color: white;
            }

            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

                input[type=text]:focus, input[type=password]:focus {
                    background-color: #ddd;
                    outline: none;
                }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            .submit {
                background-color: coral ;
                color: white;
                padding: 15px 18px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

                .submit:hover {
                    opacity: 1;
                }

            .login {
                background-color: #ffffff;
                text-align: center;
            }

        </style>
    </head>

    <body>
        <script>
            function validate() {
    var n = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var repassword = document.getElementById("repassword").value;
    var phone = document.getElementById("phone").value;
    
    //1. name
    
    if (u == "") {
        alert("Vui lòng nhập tên!");
        return false;
    }

    if (u == "") {
        alert("Vui lòng nhập email!");
        return false;
    }
    if (password == '' || password.length < 8 || password != repassword) {
        alert("Vui lòng kiểm tra lại mật khẩu!");
        return false;
    }

    if (phone != '' && !/^[0-9]{10}$/.test(phone)) {

        alert("Vui lòng kiểm tra lại số điện thoại!");
        return false;
    }

    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!mailformat.test(email)) {
        alert('Vui lòng kiểm tra lại Email');
        return false;
    }

    alert("Đăng kí tài khoản thành công");
    return true;
}

        </script>
        


        <form action="{{URL::to('/save-tbl-admin')}}" method="POST" onsubmit='return validate()' >
            {{csrf_field() }}

            <div class="register">
            <h1>Đăng ký tài khoản Lozi</h1>
            <hr>

            <input type="text" placeholder="Nhập địa chỉ email dùng để đăng kí" name="email" id="email">


            <input type="text" placeholder="Họ và tên" name="name" id="name">


            <input type="text" placeholder="Nhập số điện thoại" name="phone" id="phone">

            <input type="password" placeholder="Nhập mật khẩu" name="password" id="password">

    
            <input type="password" placeholder="Xác nhận lại mật khẩu" name="repassword-repeat" id="repassword">
            <hr>
            <button type="submit" class="submit" name='add_tbl_admin' onsubmit='validate()' > Đăng ký</button>
            </div>
           
            
            </div>
        </form>

    </body>
</html>

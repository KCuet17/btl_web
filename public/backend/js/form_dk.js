// Lấy giá trị của một input

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

   
   

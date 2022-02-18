function check_change_password($password) {            
    var old_password = document.getElementByName("old_password").value;
    var new_password = document.getElementByName("new_password").value;
    var repassword = document.getElementByName("repassword").value;
    
    //1. name
    
    if (old_password == "") {
        alert("Nhập mật khẩu hiện tại !");
        return false;
    }
    
    if (new_password == "") {
        alert("Nhập mật khẩu mới ");
        return false;
    }
    
    if ( md5(old_password) != $password) {
        alert("Mật khẩu hiện tại không đúng!");
        return false;
    }
    
    
    if ( new_password.length < 8 || new_password != repassword) {
        alert("Mật khẩu mới không trùng khớp!");
        return false;
    }
    
    
    alert("Đổi mật khẩu thành công vui lòng đăng nhập lại");
    return true;
    }
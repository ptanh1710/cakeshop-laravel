//*Xử lý form
//Login Form
function validateLoginForm() {
    let l_email = document.forms["loginForm"]["account_gmail"].value;
    let l_password = document.forms["loginForm"]["account_password"].value;
    if (l_email == "" || l_email == null) {
        document.getElementById("err_login_email").innerHTML="*Chưa nhập tài khoản email";
        return false;
    }
    else if(l_password == "" || l_password == null) {
        document.getElementById("err_login_password").innerHTML="*Chưa nhập mật khẩu";
        return false;
    }
}
//Register Form
function validateRegisterForm() {
    let r_fullname = document.forms["registerForm"]["consumer_name"].value;
    let r_email = document.forms["registerForm"]["consumer_gmail"].value;
    let r_password = document.forms["registerForm"]["consumer_password"].value;
    if (r_fullname == "" || r_fullname == null) {
        document.getElementById("err_register_fullname").innerHTML="*Chưa nhập họ và tên";
        // document.getElementById("login_email").focus();
        return false;
    }
    else if(r_email == "" || r_email == null) {
        document.getElementById("err_register_email").innerHTML="*Chưa nhập địa chỉ email";
        return false;
    }
    else if(r_password == "" || r_password == null) {
        document.getElementById("err_register_password").innerHTML="*Chưa nhập mật khẩu";
        return false;
    }
}
//Contact
function validateContactForm() {
    let c_name = document.forms["contactForm"]["contact_name"].value;
    let c_gmail = document.forms["contactForm"]["contact_gmail"].value;
    let c_title = document.forms["contactForm"]["contact_title"].value;
    let c_message= document.forms["contactForm"]["contact_content"].value;
    if (c_name == "" || c_name == null) {
        document.getElementById("err_contact_name").innerHTML="*Chưa nhập họ và tên";
        document.forms["contactForm"]["contact_name"].focus();
        // document.getElementById("login_email").focus();
        return false;
    }
    else if(c_gmail == "" || c_gmail == null) {
        document.getElementById("err_contact_gmail").innerHTML="*Chưa nhập địa chỉ email";
        return false;
    }
    else if(c_title == "" || c_title == null) {
        document.getElementById("err_contact_title").innerHTML="*Chưa nhập tiêu đề";
        return false;
    }
    if(c_name != null || c_gmail != null || c_title != null || c_message != null)
    {
        var result = confirm("Bạn có muốn gửi đi?");
        if(result) {
            alert("Bạn đã gửi thành công");
        }
        else
        {

        }
    }
}
//*Kết thúc xử lý form
//--------------------------------------------------//
//*Xử lý focus out
//Login Form
function l_emailValidation() {
    let email = document.getElementById("login_email").value;
    var regExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email == "" || email == null) {
        document.getElementById("err_login_email").innerHTML="*Chưa nhập tài khoản email";
    }
    else {
        if (regExp.test(email)){
            document.getElementById("err_login_email").innerHTML="";
        }
        else 
            document.getElementById("err_login_email").innerHTML="*Email không hợp lệ";
    }
}
function l_passwordValidation() {
    let password = document.getElementById("login_password").value;
    if(password == "" || password == null) {
        document.getElementById("err_login_password").innerHTML="*Chưa nhập mật khẩu";
    }
    else {
        document.getElementById("err_login_password").innerHTML="";
    }
}
//Kết thúc Login Form

// Resgiter Form
function r_emailValidation() {
    let email_vl = document.getElementById("register_email").value;
    var regExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email_vl == "" || email_vl == null) {
        document.getElementById("err_register_email").innerHTML="*Chưa nhập địa chỉ email";
    }
    else {
        if (regExp.test(email_vl)){
            document.getElementById("err_register_email").innerHTML="";
        }
        else 
            document.getElementById("err_register_email").innerHTML="*Email không hợp lệ";
    }
}
function r_fullnameValidaton() {
    let fullname = document.getElementById("register_fullname").value;
    if(fullname == "" || fullname == null) {
        document.getElementById("err_register_fullname").innerHTML="*Chưa nhập họ và tên";
    }
    else {
        document.getElementById("err_register_fullname").innerHTML="";
    }
}
function r_passwordValidation() {
    let password_vl = document.getElementById("register_password").value;
    if(password_vl == "" || password_vl == null) {
        document.getElementById("err_register_password").innerHTML="*Chưa nhập mật khẩu";
    }
    else {
        document.getElementById("err_register_password").innerHTML="";
    }
}
function repasswordValidation() {
    let password_vl = document.getElementById("register_password");
    var rpas = document.getElementById("register_repassword");
    if(rpas == "" || rpas == null) {
        document.getElementById("err_register_repassword").innerHTML="*Chưa nhập mật khẩu xác nhận";
    }
    else {
        if(password_vl.value != rpas.value) {
            document.getElementById("err_register_repassword").innerHTML="*Mật khẩu không trùng khớp";
        }
        else {
            document.getElementById("err_register_repassword").innerHTML="";
        }
    }
}
//Contact Form
function c_nameValidaton() {
    let name_vc = document.getElementById("contact_name").value;
    if(name_vc == "" || name_vc == null) {
        document.getElementById("err_contact_name").innerHTML="*Chưa nhập họ và tên";
    }
    else {
        document.getElementById("err_contact_name").innerHTML="";
    }
}
function c_gmailValidation() {
    let mail_vc = document.getElementById("contact_gmail").value;
    var regExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(mail_vc == "" || mail_vc == null) {
        document.getElementById("err_contact_gmail").innerHTML="*Chưa nhập địa chỉ email";
    }
    else {
        if (regExp.test(mail_vc)){
            document.getElementById("err_contact_gmail").innerHTML="";
        }
        else 
            document.getElementById("err_contact_gmail").innerHTML="*Email không hợp lệ";
    }
}
function c_titleValidaton() {
    let title_vc = document.getElementById("contact_title").value;
    if(title_vc == "" || title_vc == null) {
        document.getElementById("err_contact_title").innerHTML="*Chưa nhập tiêu đề";
    }
    else {
        document.getElementById("err_contact_title").innerHTML="";
    }
}
function c_contentValidaton() {
    let content_vc = document.getElementById("contact_content").value;
    if(content_vc == "" || content_vc == null) {
        document.getElementById("err_contact_content").innerHTML="*Chưa nhập nội dung";
    }
    else {
        document.getElementById("err_contact_content").innerHTML="";
    }
}

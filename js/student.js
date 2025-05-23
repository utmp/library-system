var LoginForm = document.getElementById("loginform");
        var regform = document.getElementById("regform");
        var indicator = document.getElementById("indicator");
        
        function reg(){
            regform.style.transform = "translateX(-365px)";
            LoginForm.style.transform = "translateX(-400px)";
            indicator.style.transform = "translateX(150px)";
        }
        function login(){
            regform.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(0px)";
        }
    var pass = document.getElementById("Pass");
        var showbtn = document.getElementById("eye");
        showbtn.addEventListener("click",function(){
            if(pass.type === "password"){
                pass.type = "text";
                showbtn.classList.add("hide");
            }
            else{
                pass.type = "password";
                showbtn.classList.remove("hide");
            }
        });
         var pass2 = document.getElementById("Pass-reg");
        var showbtn2 = document.getElementById("eye-reg");
        showbtn2.addEventListener("click",function(){
            if(pass2.type === "password"){
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else{
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
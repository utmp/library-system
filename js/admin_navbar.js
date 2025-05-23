/* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        // document.getElementById("myDropdown").classList.toggle("show");
        document.getElementById("myDropdown").style.display="block";
        document.getElementById("myDropdown2").style.display="none";
        document.getElementById("myDropdown3").style.display="none";
        document.getElementById("myDropdown4").style.display="none";
        document.getElementById("myDropdown5").style.display="none";
        }
        function myFunction2() {
        // document.getElementById("myDropdown2").classList.toggle("show");
        document.getElementById("myDropdown2").style.display="block";
        document.getElementById("myDropdown").style.display="none";
        document.getElementById("myDropdown3").style.display="none";
        document.getElementById("myDropdown4").style.display="none";
        document.getElementById("myDropdown5").style.display="none";
        }
        function myFunction3() {
        // document.getElementById("myDropdown3").classList.toggle("show");
        document.getElementById("myDropdown3").style.display="block";
        document.getElementById("myDropdown").style.display="none";
        document.getElementById("myDropdown2").style.display="none";
        document.getElementById("myDropdown4").style.display="none";
        document.getElementById("myDropdown5").style.display="none";
        }
        function myFunction4() {
        // document.getElementById("myDropdown3").classList.toggle("show");
        document.getElementById("myDropdown4").style.display="block";
        document.getElementById("myDropdown").style.display="none";
        document.getElementById("myDropdown2").style.display="none";
        document.getElementById("myDropdown3").style.display="none";
        document.getElementById("myDropdown5").style.display="none";
        }
        function myFunction5() {
        // document.getElementById("myDropdown3").classList.toggle("show");
        document.getElementById("myDropdown5").style.display="block";
        document.getElementById("myDropdown").style.display="none";
        document.getElementById("myDropdown2").style.display="none";
        document.getElementById("myDropdown3").style.display="none";
        document.getElementById("myDropdown4").style.display="none";
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    // if (openDropdown.classList.contains('show')) {
                    // openDropdown.classList.remove('show');
                    // }
                    if (openDropdown.style.display="block") {
                    openDropdown.style.display="none";
                    }
                }
            }
        }
 const currentlocation = location.href;
        const menuitem = document.querySelectorAll('a');
        const menulength = menuitem.length;
        for(let i=0; i<menulength;i++){
            if(menuitem[i].href===currentlocation){
                menuitem[i].className = "active";
            }
        }

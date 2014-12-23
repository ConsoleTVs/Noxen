
$(document).ready(function(){
            <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?>
            $(".button-collapse").sideNav();
            $('ul.tabs').tabs();
            $('.dropdown-button').dropdown({
                hover: false
            });
})

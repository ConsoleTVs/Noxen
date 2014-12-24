
$(document).ready(function(){
            <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?>
            $(".button-collapse").sideNav();
            $('ul.tabs').tabs();
            $('.modal-trigger').leanModal();
            $('.dropdown-button').dropdown({
                hover: false
            });
})


$(document).ready(function(){
            <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);} ?>
            $('ul.tabs').tabs();
            $('.modal-trigger').leanModal();
            $('select').not('.disabled').material_select();
            $('.button-collapse').sideNav({menuWidth: 240, activationWidth: 70});
            $('.dropdown-button').dropdown({
                hover: false
            });
})

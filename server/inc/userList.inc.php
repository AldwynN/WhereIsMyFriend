<div class="sidebar">
    <ul class="sidebar-list">
        <?php
        /*
         * HTML de la liste déroulante contenant les différents amis
         * Auteur :Antonija Šimić (Trouvé à l'adresse : https://codepen.io/tonkec/pen/gryZmg)
         */



        $res = FriendManager::getAllFriendsInfosForUser($idUser);
        if (!empty($res)) {
            foreach ($res as $user) :
                ?><li class="sidebar-item"><a href="<?php echo 'profil.php?id=' . $user->idFriend ?>" class="sidebar-anchor"><?= $user->lastName . " " . $user->firstName ?></a></li><?php
            endforeach;
        }else {
            ?>
            <li class="sidebar-item">Pas d'amis</li>
                <?php
            }
            ?>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        function toggleSidebar() {
            $(".button").toggleClass("active");
            $("main").toggleClass("move-to-left");
            $(".sidebar-item").toggleClass("active");
        }

        $(".button").on("click tap", function () {
            toggleSidebar();
        });
        $(document).keyup(function (e) {
            if (e.keyCode === 27) {
                toggleSidebar();
            }
        });
    });
</script>
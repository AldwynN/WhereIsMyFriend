<?php
/*
 * HTML de la liste déroulante contenant les différents amis
 * Auteur :Antonija Šimić (Trouvé à l'adresse : https://codepen.io/tonkec/pen/gryZmg)
 */
?>


<div class="sidebar">
    <ul class="sidebar-list">
        <li class="sidebar-item"><a href="#" class="sidebar-anchor">Gawen Ackermann</a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-anchor">Romain Peretti</a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-anchor">Khalil Meddeb</a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-anchor">Jonathan Borel-Jaquet</a></li>
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
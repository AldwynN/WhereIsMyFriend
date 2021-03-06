<?php ?>

<!--  HTML de l'affichage du profile -->
<!--  Auteur : CAPTAIN ANONYMOUS (Trouvé à l'adresse : https://codepen.io/anon/pen/RvRLPY) -->


<div class="card">
    <div class="card-header"
         style="background-image: url(https://wallpaperplay.com/walls/full/e/5/3/13586.jpg)"
         >
        <div class="card-header-bar">
            <a href="#" class="btn-message"><span class="sr-only">Message</span></a>
            <a href="#" class=""><img src="../img/edit_icon.png" alt=""/></a>
        </div>
        <div class="card-header-slanted-edge">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200"><path class="polygon" d="M-20,200,1000,0V200Z" /></svg>
        </div>
    </div>

    <div class="card-body">

        <?php if ($user != null) { ?>
            <?php foreach ($user as $userInfos) { ?>
                <h2 class="name"><?php echo $userInfos->firstName . " " . $userInfos->lastName ?></h2>

                <h4 class="job-title"><?php echo $userInfos->email ?></h4>

                <div class="bio"><?php echo $userInfos->adress ?></div>
            <?php } ?>
        <?php } else { ?>
           <div class="bio"><?php echo "Utilisateur non-connecté" ?></div>
            <?php } ?>
    </div>

</div>'

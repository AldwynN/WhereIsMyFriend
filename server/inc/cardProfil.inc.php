<?php ?>

 <!--  HTML de l'affichage du profile -->
 <!--  Auteur : CAPTAIN ANONYMOUS (Trouvé à l'adresse : https://codepen.io/anon/pen/RvRLPY) -->


<div class="card">
                <div class="card-header"
                     style="background-image: url(https://static-assets-prod.epicgames.com/fortnite/static/webpack/8704d4d5ffd1c315ac8e2c805a585764.jpg)"
                     >
                    <div class="card-header-bar">
                        <a href="#" class="btn-message"><span class="sr-only">Message</span></a>
                    </div>

                    <div class="card-header-slanted-edge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200"><path class="polygon" d="M-20,200,1000,0V200Z" /></svg>

                    </div>
                </div>

                <div class="card-body">
                    <?php foreach ($user as $userInfos) {?>
                    <h2 class="name"><?php echo $userInfos->firstName . " " . $userInfos->lastName ?></h2>
                    
                    <h4 class="job-title"><?php echo $userInfos->email ?></h4>

                    <div class="bio"><?php echo $userInfos->adress ?></div>
                    <?php } ?>
                </div>
            </div>'
<?php
#Les annotations dans ce code seront sois général sois pour pour la le code juste en dessous
#Ce code est une bataille naval dans le terminal
#La fonction pour afficher les grilles
function affichetab($tab, $m, $n) {
    for ($i = 0; $i<$m; $i++) {
        for ($j = 0; $j < $n ; $j++) {
             echo $tab[$i][$j]."";
        }
        echo"\n";
    }
    echo"----------\n";
}
#les fonctions pour initialiser les 4 grilles du jeux
#La grille avec les bateaux du joueur 1
function initialisegrillej1() {
for ($i = 0; $i < 10; $i++) {
     for ($j=0; $j < 10;$j++ ) {
         $grille[$i][$j]=" 0 ";
    }
  }
return $grille;
}
#La grille avec les bateaux du joueur 2
function initialisegrillej2() {
for ($i = 0; $i < 10; $i++) {
     for ($j=0; $j < 10;$j++ ) {
         $grille[$i][$j]=" 0 ";
    }
  }
return $grille;
}
#La grille avec les tires du joueur 1
function initialisegrillej1tire() {
for ($i = 0; $i < 10; $i++) {
     for ($j=0; $j < 10;$j++ ) {
         $grille[$i][$j]=" 0 ";
    }
  }
return $grille;
}
#La grille avec les tires du joueur 2
function initialisegrillej2tire() {
for ($i = 0; $i < 10; $i++) {
     for ($j=0; $j < 10;$j++ ) {
         $grille[$i][$j]=" 0 ";
    }
  }
return $grille;
}
#La fonction pour placer le porte avion
function placepa($l, $c, $p, &$grille) {
    global $grillej1, $grillej2;
    $tailleBateau = 5;
    $rows = count($grille);
    $cols = count($grille[0]);
#On verifie si les cases indiqué par le joueur sont bonnes sinon on lui demande de replacer le bateau 
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Vous sortez de la grille en plaçant ce bateau, réessayez !\n");
        $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
        $tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
        $colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
        $espacepa = readline("vb vh hd hg\n");
        if ($j <= 1) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
        }
        if ($j >= 2) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
        }
        
        return;
    }
    for ($i = 0; $i < $tailleBateau; $i++) {
        if ($p == "hg") {
            if ($grille[$l][$c - $i] == " 0 ") {
                $grille[$l][$c - $i] = " 6 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacepa = readline("vb vh hd hg\n");
        if ($j == 1) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
        }
        if ($j == 2) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
        }
                return;
            }
        } elseif ($p == "hd") {
            if ($grille[$l][$c + $i] == " 0 ") {
                $grille[$l][$c + $i] = " 6 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacepa = readline("vb vh hd hg\n");
        if ($j == 1) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
        }
        if ($j == 2) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
        }
                return;
            }
        } elseif ($p == "vh") {
            if ($grille[$l - $i][$c] == " 0 ") {
                $grille[$l - $i][$c] = " 6 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacepa = readline("vb vh hd hg\n");
                if ($j == 1) {
                placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
        }
                if ($j == 2) {
                placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
        }
                return;
            }
        } elseif ($p == "vb") {
            if ($grille[$l + $i][$c] == " 0 ") {
                $grille[$l + $i][$c] = " 6 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacepa = readline("vb vh hd hg\n");
        if ($j == 1) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
        }
        if ($j == 2) {
            placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
        }
                return;
            }
        }
    }
}
#La fonction pour placer croiseur
function placecr($l, $c, $p, &$grille) {
    global $grillej1, $grillej2;
    $tailleBateau = 4;
    $rows = count($grille);
    $cols = count($grille[0]);
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Vous sortez de la grille en plaçant ce bateau, réessayez !\n");
        $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
        $tcr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
        $colonnecr = readline("quelle case de cette colonne pour votre porte-avions\n");
        $espacecr = readline("vb vh hd hg\n");
        if ($j == 1) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
        }
        if ($j == 2) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
        }
        return;
    }

    for ($i = 0; $i < $tailleBateau; $i++) {
        if ($p == "hg") {
            if ($grille[$l][$c - $i] == " 0 ") {
                $grille[$l][$c - $i] = " 5 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tcr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnecr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacecr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
        }
        if ($j == 2) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
        }
                return;
            }
        } elseif ($p == "hd") {
            if ($grille[$l][$c + $i] == " 0 ") {
                $grille[$l][$c + $i] = " 5 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tcr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnecr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacecr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
        }
        if ($j == 2) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
        }
                return;
            }
        } elseif ($p == "vh") {
            if ($grille[$l - $i][$c] == " 0 ") {
                $grille[$l - $i][$c] = " 5 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tcr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnecr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacecr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
        }
        if ($j == 2) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
        }
                return;
            }
        } elseif ($p == "vb") {
            if ($grille[$l + $i][$c] == " 0 ") {
                $grille[$l + $i][$c] = " 5 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tcr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnecr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacecr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
        }
        if ($j == 2) {
            placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
        }
                return;
            }
        }
    }
}
#La fonction pour placer le 1er sous marin
function placesm1($l, $c, $p, &$grille) {
    global $grillej1, $grillej2;
    $tailleBateau = 3;
    $rows = count($grille);
    $cols = count($grille[0]);
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Vous sortez de la grille en plaçant ce bateau, réessayez !\n");
        $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
        $tsm1=readline(" quelle colonne voulez vous pour votre porte-avions\n");
        $colonnesm1 = readline("quelle case de cette colonne pour votre porte-avions\n");
        $espacesm1 = readline("vb vh hd hg\n");
        if ($j == 1) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
        }
        if ($j == 2) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
        }
        return;
    }

    for ($i = 0; $i < $tailleBateau; $i++) {
        if ($p == "hg") {
            if ($grille[$l][$c - $i] == " 0 ") {
                $grille[$l][$c - $i] = " 4 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm1=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm1 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm1 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
        }
        if ($j == 2) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
        }
                return;
            }
        } elseif ($p == "hd") {
            if ($grille[$l][$c + $i] == " 0 ") {
                $grille[$l][$c + $i] = " 4 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm1=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm1 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm1 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
        }
        if ($j == 2) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
        }
                return;
            }
        } elseif ($p == "vh") {
            if ($grille[$l - $i][$c] == " 0 ") {
                $grille[$l - $i][$c] = " 4 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm1=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm1 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm1 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
        }
        if ($j == 2) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
        }
                return;
            }
        } elseif ($p == "vb") {
            if ($grille[$l + $i][$c] == " 0 ") {
                $grille[$l + $i][$c] = " 4 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm1=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm1 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm1 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
        }
        if ($j == 2) {
            placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
        }
                return;
            }
        }
    }
}
#La fonction pour placer le 2ème sous marin
function placesm2($l, $c, $p, &$grille) {
    global $grillej1, $grillej2;
    $tailleBateau = 3;
    $rows = count($grille);
    $cols = count($grille[0]);
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Vous sortez de la grille en plaçant ce bateau, réessayez !\n");
        $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
        $tsm2=readline(" quelle colonne voulez vous pour votre porte-avions\n");
        $colonnesm2 = readline("quelle case de cette colonne pour votre porte-avions\n");
        $espacesm2 = readline("vb vh hd hg\n");
        if ($j == 1) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
        }
        if ($j == 2) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
        }
        return;
    }

    for ($i = 0; $i < $tailleBateau; $i++) {
        if ($p == "hg") {
            if ($grille[$l][$c - $i] == " 0 ") {
                $grille[$l][$c - $i] = " 3 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm2=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm2 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm2 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
        }
        if ($j == 2) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
        }
                return;
            }
        } elseif ($p == "hd") {
            if ($grille[$l][$c + $i] == " 0 ") {
                $grille[$l][$c + $i] = " 3 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm2=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm2 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm2 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
        }
        if ($j == 2) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
        }
                return;
            }
        } elseif ($p == "vh") {
            if ($grille[$l - $i][$c] == " 0 ") {
                $grille[$l - $i][$c] = " 3 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm2=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm2 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm2 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
        }
        if ($j == 2) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
        }
                return;
            }
        } elseif ($p == "vb") {
            if ($grille[$l + $i][$c] == " 0 ") {
                $grille[$l + $i][$c] = " 3 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tsm2=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnesm2 = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacesm2 = readline("vb vh hd hg\n");
                if ($j == 1) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
        }
        if ($j == 2) {
            placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
        }
                return;
            }
        }
    }
}
#La fonction pour placer le torpilleur
function placetpr($l, $c, $p, &$grille) {
    global $grillej1, $grillej2;
    $tailleBateau = 2;
    $rows = count($grille);
    $cols = count($grille[0]);
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Vous sortez de la grille en plaçant ce bateau, réessayez !\n");
        $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
        $tpr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
        $colonnetpr = readline("quelle case de cette colonne pour votre porte-avions\n");
        $espacetpr = readline("vb vh hd hg\n");
        if ($j == 1) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
        }
        if ($j == 2) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
        }
        return;
    }

    for ($i = 0; $i < $tailleBateau; $i++) {
        if ($p == "hg") {
            if ($grille[$l][$c - $i] == " 0 ") {
                $grille[$l][$c - $i] = " 2 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnetpr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacetpr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
        }
        if ($j == 2) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
        }
                return;
            }
        } elseif ($p == "hd") {
            if ($grille[$l][$c + $i] == " 0 ") {
                $grille[$l][$c + $i] = " 2 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnetpr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacetpr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
        }
        if ($j == 2) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
        }
                return;
            }
        } elseif ($p == "vh") {
            if ($grille[$l - $i][$c] == " 0 ") {
                $grille[$l - $i][$c] = " 2 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnetpr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacetpr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
        }
        if ($j == 2) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
        }
                return;
            }
        } elseif ($p == "vb") {
            if ($grille[$l + $i][$c] == " 0 ") {
                $grille[$l + $i][$c] = " 2 ";
            } else {
                echo("Vous touchez un autre bateau, réessayez !\n");
                $j=readline(" veuillez entrer votre numéro de joueur: 1 ou 2 \n" );
                $tpr=readline(" quelle colonne voulez vous pour votre porte-avions\n");
                $colonnetpr = readline("quelle case de cette colonne pour votre porte-avions\n");
                $espacetpr = readline("vb vh hd hg\n");
                if ($j == 1) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
        }
        if ($j == 2) {
            placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
        }
                return;
            }
        }
    }
}
#La fonction pour placer le porte avion à coulé
function porteAvionsCoule(&$grille) {
    #la fonction compte si il reste toujours 1 case du bateau sur la grille 
    $compteur = 0;
    foreach ($grille as $ligne) {
        foreach ($ligne as $valeur) {
            if ($valeur == " 6 ") {
                $compteur++;
            }
        }
    }
    return $compteur == 0;
}
#La fonction pour placer croiseur à coulé
function croiseurCoule(&$grille) {
    #la fonction compte si il reste toujours 1 case du bateau sur la grille
    $compteur = 0;
    foreach ($grille as $ligne) {
        foreach ($ligne as $v) {
            if ($v == ' 5 ') {
                $compteur++;
            }
        }
    }
    return $compteur == 0;
}
#La fonction pour placer le 1er sous marin à coulé
function sousMarins1Coule(&$grille) {
    #la fonction compte si il reste toujours 1 case du bateau sur la grille
    $compteur = 0;
    foreach ($grille as $ligne) {
        foreach ($ligne as $v) {
            if ($v == " 4 ") {
                $compteur++;
            }
        }
    }
    return $compteur == 0;
}
#La fonction pour placer le 2ème sous marin à coulé
function sousMarins2Coule(&$grille) {
    #la fonction compte si il reste toujours 1 case du bateau sur la grille
    $compteur = 0;
    foreach ($grille as $ligne) {
        foreach ($ligne as $v) {
            if ($v == " 3 ") {
                $compteur++;
            }
        }
    }
    return $compteur == 0;
}
#La fonction pour placer le torpilleur à coulé
function torpilleurCoule(&$grille) {
    #la fonction compte si il reste toujours 1 case du bateau sur la grille
    $compteur = 0;
    foreach ($grille as $ligne) {
        foreach ($ligne as $v) {
            if ($v == " 2 ") {
                $compteur++;
            }
        }
    }

    return $compteur == 0;
}
#La fonction qui regroupe tout les fonctions verification
function verif(&$grille) {
#On verfifie si une des fonctions renvoie True et si c'est le cas on mets on message pour dire qui a coulé
    if (porteAvionsCoule($grille)) {
        echo "Le porte-avions a coulé.\n";
    }

    if (croiseurCoule($grille)) {
        echo "Le croiseur a coulé.\n";
    }

    
    if (sousMarins1Coule($grille)) {
        echo "Les sous marin 1 a coulé.\n";
    }
    if (sousMarins2Coule($grille)) {
        echo "Les sous marin 2 a coulé.\n";
    }

    if (torpilleurCoule($grille)) {
        echo "Le torpilleur a coulé.\n";
    }
} 
#La fonction qui permet au joueur de tirer
function tire($l, $c, &$grille, &$grille1) {
    $rows = count($grille);
    $cols = count($grille[0]);

# Vérifie si les coordonnées sont en dehors de la grille
    if ($l < 0 || $l >= $rows || $c < 0 || $c >= $cols) {
        echo("Hors de la grille capitaine, vous faites quoi ?!?!\n");
    }
# si il n'y a pas de bateau on remplace la case de la grille du joueur1 et 2 par 1 et on dis dans l'eau
    elseif ($grille[$l][$c] == " 0 ") {
        $grille[$l][$c] = "-1 ";
        $grille1[$l][$c] = " 1 ";
        echo(" dans l'eau \n");
    } 
#Si il y a un bateau on remplace la case de la grille du joueur1 par 1 et du joueur 2 par -1 et on dis touché
    elseif ($grille[$l][$c] >= 2) {
        $grille[$l][$c] = "-2 ";
        $grille1[$l][$c] = " 2 ";
        echo(" touché\n");
    } 
#Si le joueur a déjà tiré    
    else {
        echo("vous avez déjà tiré ici, faites plus attention !\n");
    }
}
#La fonctions pour initier le jeux (palcements des bateux etc )
function init(){
global $grillej1, $grillej2;    
echo("Joueur 1 placez vos pièces !\n");
$tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
$colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
$espacepa = readline("vb vh hd hg\n");
placepa($colonnepa-1,$tpa-1,$espacepa,$grillej1);
affichetab($grillej1,10,10);
$tcr=readline(" quelle colonne voulez vous pour votre croiseur\n");
$colonnecr = readline("quelle case de cette colonne pour votre croiseur\n");
$espacecr = readline("vb vh hd hg\n");
placecr($colonnecr-1,$tcr-1,$espacecr,$grillej1);
affichetab($grillej1,10,10);
$tsm1=readline(" quelle colonne voulez vous pour votre 1er sous marins \n");
$colonnesm1 = readline("quelle case de cette colonne pour votre 1er sous marins \n");
$espacesm1 = readline("vb vh hd hg\n");
placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej1);
affichetab($grillej1,10,10);
$tsm2=readline(" quelle colonne voulez vous pour votre second sous marins\n");
$colonnesm2 = readline("quelle case de cette colonne pour votre second sous marins \n");
$espacesm2 = readline("vb vh hd hg\n");
placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej1);
affichetab($grillej1,10,10);
$tpr=readline(" quelle colonne voulez vous pour votre torpilleur \n");
$colonnetpr = readline("quelle case de cette colonnepour votre torpilleur\n");
$espacetpr = readline("vb vh hd hg\n");
placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej1);
affichetab($grillej1,10,10);
echo("Joueur 2 placez vos pièces !\n");
$tpa=readline(" quelle colonne voulez vous pour votre porte-avions\n");
$colonnepa = readline("quelle case de cette colonne pour votre porte-avions\n");
$espacepa = readline("vb vh hd hg\n");
placepa($colonnepa-1,$tpa-1,$espacepa,$grillej2);
affichetab($grillej2,10,10);
$tcr=readline(" quelle colonne voulez vous pour votre croiseur\n");
$colonnecr = readline("quelle case de cette colonne pour votre croiseur\n");
$espacecr = readline("vb vh hd hg\n");
placecr($colonnecr-1,$tcr-1,$espacecr,$grillej2);
affichetab($grillej2,10,10);
$tsm1=readline(" quelle colonne voulez vous pour votre 1er sous marins \n");
$colonnesm1 = readline("quelle case de cette colonne pour votre 1er sous marins \n");
$espacesm1 = readline("vb vh hd hg\n");
placesm1($colonnesm1-1,$tsm1-1,$espacesm1,$grillej2);
affichetab($grillej2,10,10);
$tsm2=readline(" quelle colonne voulez vous pour votre second sous marins\n");
$colonnesm2 = readline("quelle case de cette colonne pour votre second sous marins \n");
$espacesm2 = readline("vb vh hd hg\n");
placesm2($colonnesm2-1,$tsm2-1,$espacesm2,$grillej2);
affichetab($grillej2,10,10);
$tpr=readline(" quelle colonne voulez vous pour votre torpilleur \n");
$colonnetpr = readline("quelle case de cette colonnepour votre torpilleur\n");
$espacetpr = readline("vb vh hd hg\n");
placetpr($colonnetpr-1,$tpr-1,$espacetpr,$grillej2);
affichetab($grillej2,10,10);}
#La fonction qui verifie si le joueur 1 a perdu
function gagnant1($tableau) {
    foreach ($tableau as $ligne) {
        foreach ($ligne as $v) {
            if ($v >= 1) {
                return true; 
            }
        }
    }

    return false; 
}
#La fonction qui verifie si le joueur 2 a perdu
function gagnant2($tableau) {
    foreach ($tableau as $ligne) {
        foreach ($ligne as $v) {
            if ($v >= 1) {
                return true; 
            }
        }
    }

    return false; 
}
#la fonction qui regroupe les autres pour créer le jeux et jouer
function jeux(){
global $grillej1, $grillej2,$grillej3, $grillej4;

    $joueur = 2 ;
    while ( gagnant1($grillej1) && gagnant2($grillej2) ){
    if ($joueur == 1){
            readline("Appuyez sur Entrée pour passer a votre tour");
            echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
			$joueur = 2;echo("c'est le tour du capitaine de la seconde flotte \n ");
			readline("Appuyez sur Entrée lorsque vous êtes prêt ");
		}
		elseif ($joueur == 2) {
		    readline("Appuyez sur entrée pour passer a votre tour");
		    echo "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
		    $joueur = 1; echo("c'est le tour du capitaine de la première flotte \n ");
		    readline("Appuyez sur Entrée lorsque vous êtes prêt");
		}
    
    if($joueur == 1 ){
        
        echo("Votre grille de tire  : \n ");
        affichetab($grillej3,10,10);
        echo("Votre grille avec vos bateaux capitaine: \n ");
        affichetab($grillej1,10,10);
        $t=readline(" Choississez votre colonne de tire \n " );
        $colonne = readline("Choississez votre colonne de tire \n");
        tire($colonne-1,$t-1,$grillej2,$grillej3);
        verif($grillej2);
}
elseif ($joueur == 2) {
    echo("Votre grille de tire capitaine de la première flotte : \n ");
    affichetab($grillej4,10,10);
    echo("Votre grille avec vos bateaux capitaine: \n ");
    affichetab($grillej2,10,10);
    $t=readline(" Choississez votre colonne de tire \n" );
    $colonne = readline("Choississez votre colonne de tire \n");
    tire($colonne-1,$t-1,$grillej1,$grillej4);
    verif($grillej1);
}
}if (gagnant1($grillej1)) {
    echo(" Le capitaine de la seconde flotte a gagné \n");
    echo(" Voici sa grille ! \n ");
    affichetab($grillej2,10,10);
    echo(" Et le reste de celle du capitaine de la première flotte ... \n");
    affichetab($grillej1,10,10);
}else {
    echo(" Le capitaine de la première flotte a gagné \n");
    echo(" Voici sa grille  ! \n ");
    affichetab($grillej1,10,10);
    echo(" Et le reste de celle du capitaine de la seconde flotte ...\n");
    affichetab($grillej2,10,10);
}}
initialisegrillej1();
initialisegrillej2();
$grillej1=initialisegrillej1();
$grillej2=initialisegrillej2();
$grillej3=initialisegrillej1tire();
$grillej4=initialisegrillej2tire();
$regles = "Voici les règles du jeu :\n1. Soyez fairplay on est la pour s'amuser \n2. suivez bien les indications pour éviter de perdre du temps c'est idiot!\n3. vh et vb se références a vertical haut et bas de même pour hd ou hg qui veulent dire horizontal droite ou gauche\n";
do {
    echo $regles;
    $compris = strtolower(readline("Avez-vous compris les règles ? (oui/non) "));
    if ($compris === "oui") {
        echo "Super ! Nous pouvons continuer.\n";
        break;
    } elseif ($compris === "non") {
        echo "D'accord, relisons les règles.\n";
    } else {
        echo "Réponse invalide. Veuillez répondre par 'oui' ou 'non'.\n";
    }
} while ($compris !== "oui");
init();
jeux();
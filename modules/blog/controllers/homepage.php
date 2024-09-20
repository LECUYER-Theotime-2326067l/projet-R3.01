<?php
 namespace modules\blog\controllers;

 class homepage {
     public function execute() {
         // Logique pour afficher la page d'accueil
         $post = [
            'title' => 'Un faux titre.',
            'french_creation_date' => '20/09/2024 à 17h48min42s',
            'content' => "Bon, apres 1h ici, j'ai reussi a faire marcher ca mdrr",
        ];
        $comments = [
            [
                'author' => 'Un premier faux auteur',
                'french_creation_date' => '20/09/2024 à 17h48min42s',
                'comment' => 'Un faux commentaire.\n Le premier.',
            ],
            [
                'author' => 'Un second faux auteur',
                'french_creation_date' => '? à ?',
                'comment' => 'Un faux commentaire.\n Le second.',
            ],
        ];
         
        require __DIR__ . '/post.php'; 
     }
 }
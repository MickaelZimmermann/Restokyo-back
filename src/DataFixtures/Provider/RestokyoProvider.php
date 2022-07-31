<?php

namespace App\DataFixtures\Provider;

class RestokyoProvider
{
    // Taleau des établissements
    private $establishments = [
        'Monhan Sakaba',
        'Fukuju',
        'Akihabara Niku Sushi',
        'Tsujirô',
        'Asakusa Gyukatsu',
        'Hakata Dōjō',
        'Kanoya',
        'Torikizoku',
        'Gatten Sushi',
        'Mutekiya',
        'Brasserie le lion',
        'Aikawa',
        'HeirokuSushi',
        'Itamae sushi',
        'Tempura Shinjuku Tsunahachi Souhonten',
        'Dandan \'ya Shinjuku Kushi-tempura',
        'Spice Hut',
        'Chatty Chatty',
        'Taproom',
        'Sakura-tei',
        'The Great Burger',
        'Nikuya-no Daidokoro',
        'bar à vin CROISÉE',
        'Chez Adrianalogie',
        'Chez JC Vend des Datas',
        'Chez Bapt le Goat',
        'Chez Nic\'O\'Rage',
        'Chez Ken Tukifraïdshikeune',
        'Chez Mamadi d\amour',
        'Chez Olivier de Carglouch',
        'Chez le ZimmerMEME',
        'Chez Lud\'O Vico Einaudi',
        'Le restau du Kev Nourris (aka Burger Kev)',
        'Chez Kev Ara le révolutionnaire',
        'Avec ou sans les mains',
        'Omae Wa Mou Shindeiru',
        'Naniiiii ??',
        'Yamete Kudasai',
        'Sans aucun sushi, philosophie',
        'Hakuna Matata, Hakunon Montonton'
    ];

    // 80 tags
    private $tags = [
        'Americana',
        'Art vidéo',
        'Buddy movie',
        'Chanbara',
        'Chronique',
        'Cinéma amateur',
        'Cinéma d\'auteur',
        'Cinéma de montagne',
        'Cinéma expérimental',
        'Cinéma abstrait',
        'Cinéma structurel',
        'Cinéma underground',
        'Found footage',
        'Comédie',
        'Burlesque',
        'Comédie de mœurs',
        'Comédie dramatique',
        'Comédie policière',
        'Comédie romantique',
        'Parodie',
        'Screwball comedy',
        'Documentaire',
        'Cinéma ethnographique',
        'Cinéma d\'observation',
        'Cinéma vérité',
        'Cinéma direct',
        'Docufiction',
        'Ethnofiction',
        'Essai cinématographique',
        'Film d\'archives',
        'Journal filmé',
        'Portrait',
        'Cinéma surréaliste',
        'Drame',
        'Mélodrame',
        'Docudrama',
        'Film à sketches',
        'Film à suspense',
        'Film d\'action',
        'Film d\'aventures',
        'Film de cape et d\'épée',
        'Film catastrophe',
        'Film érotique',
        'Film d\'espionnage',
        'Film d\'exploitation',
        'Film fantastique',
        'Film de vampires',
        'Film de zombies',
        'Film de guerre',
        'Film de guérilla',
        'Film historique',
        'Film biographique',
        'Film autobiographique',
        'Film institutionnel',
        'Film de mariage',
        'Film publicitaire',
        'Film d\'entreprise',
        'Film de propagande',
        'Film d\'horreur',
        'Slasher',
        'Film de super-héros',
        'Film musical',
        'Film policier',
        'Film de gangsters',
        'Film noir',
        'Film d\'opéra',
        'Film pornographique',
        'Teen movie',
        'Ken Geki',
        'Masala',
        'Road movie',
        'Film d\'amour',
        'Péplum',
        'Science-fiction',
        'Sérial',
        'Thriller',
        'Troma',
        'Western',
    ];

    private $districts = [
        'Ikebukuro',
        'Ueno',
        'Asakusa',
        'Kagurazaka',
        'Okubo',
        'Takadanobaba',
        'Shinjuku',
        'Shibuya',
        'Harajuku',
        'Nakano',
        'Akihabara',
        'Ginza',
    ];


     /**
     * Return an establishment's name
     */
    public function establishmentsName()
    {
        return $this->establishments[array_rand($this->establishments)];
    }
    
    /**
     * Return a tag
     */
    public function establishmentTag()
    {
        return $this->tags[array_rand($this->tags)];
    }

    /**
     * Return a tag
     */
    public function districtsName()
    {
        return $this->districts[array_rand($this->districts)];
    }
}

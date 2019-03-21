<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Tests\Fixtures\AppTestBundle\DataFixtures;

use AppTestBundle\Entity\FunctionalTests\Category;
use AppTestBundle\Entity\FunctionalTests\Product;
use AppTestBundle\Entity\FunctionalTests\Purchase;
use AppTestBundle\Entity\FunctionalTests\PurchaseItem;
use AppTestBundle\Entity\FunctionalTests\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $phrases = [
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'Pellentesque vitae velit ex.',
        'Mauris dapibus, risus quis suscipit vulputate, eros diam egestas libero, eu vulputate eros eros eu risus.',
        'In hac habitasse platea dictumst.',
        'Morbi tempus commodo mattis.',
        'Donec vel elit dui.',
        'Ut suscipit posuere justo at vulputate.',
        'Phasellus id porta orci.',
        'Ut eleifend mauris et risus ultrices egestas.',
        'Aliquam sodales, odio id eleifend tristique, urna nisl sollicitudin urna, id varius orci quam id turpis.',
        'Nulla porta lobortis ligula vel egestas.',
        'Curabitur aliquam euismod dolor non ornare.',
        'Nunc et feugiat lectus.',
        'Nam porta porta augue.',
        'Sed varius a risus eget aliquam.',
        'Nunc viverra elit ac laoreet suscipit.',
        'Pellentesque et sapien pulvinar, consectetur eros ac, vehicula odio.',
    ];

    public function load(ObjectManager $manager)
    {
        $users = $this->createUsers();
        foreach ($users as $user) {
            $manager->persist($user);
        }

        $categories = $this->createCategories();
        foreach ($categories as $category) {
            $manager->persist($category);
        }

        $products = $this->createProducts($categories);
        foreach ($products as $product) {
            $manager->persist($product);
        }

        $purchases = $this->createPurchases($users);
        foreach ($purchases as $purchase) {
            $manager->persist($purchase);
        }

        $purchaseItems = $this->createPurchaseItems($products, $purchases);
        foreach ($purchaseItems as $purchaseItem) {
            $manager->persist($purchaseItem);
        }

        $manager->flush();
    }

    

    

    

    

    

    public function getRandomTags()
    {
        $tags = [
            'books',
            'electronics',
            'GPS',
            'hardware',
            'laptops',
            'monitors',
            'movies',
            'music',
            'printers',
            'smartphones',
            'software',
            'toys',
            'TV & video',
            'videogames',
            'wearables',
        ];

        $numTags = \mt_rand(2, 4);
        \shuffle($tags);

        return \array_slice($tags, 0, $numTags - 1);
    }

    public function getRandomEan()
    {
        $chars = \str_split('0123456789');
        $count = \count($chars) - 1;
        $ean13 = '';
        do {
            $ean13 .= $chars[\mt_rand(0, $count)];
        } while (\strlen($ean13) < 13);

        $checksum = 0;
        foreach (\str_split(\strrev($ean13)) as $pos => $val) {
            $checksum += $val * (3 - 2 * ($pos % 2));
        }
        $checksum = ((10 - ($checksum % 10)) % 10);

        return $ean13.$checksum;
    }

    public function getRandomName()
    {
        $words = [
            'Lorem', 'Ipsum', 'Sit', 'Amet', 'Adipiscing', 'Elit',
            'Vitae', 'Velit', 'Mauris', 'Dapibus', 'Suscipit', 'Vulputate',
            'Eros', 'Diam', 'Egestas', 'Libero', 'Platea', 'Dictumst',
            'Tempus', 'Commodo', 'Mattis', 'Donec', 'Posuere', 'Eleifend',
        ];

        $numWords = 2;
        \shuffle($words);

        return 'Product '.\implode(' ', \array_slice($words, 0, $numWords));
    }

    public function getRandomPrice()
    {
        $cents = ['00', '29', '39', '49', '99'];

        return (float) \mt_rand(2, 79).'.'.$cents[\array_rand($cents)];
    }

    

    public function getRandomDescription()
    {
        $numPhrases = \mt_rand(5, 10);
        \shuffle($this->phrases);

        return \implode(' ', \array_slice($this->phrases, 0, $numPhrases - 1));
    }

    public function getRandomHtmlFeatures()
    {
        $numFeatures = 2;
        \shuffle($this->phrases);

        return '<ul><li>'.\implode('</li><li>', \array_slice($this->phrases, 0, $numFeatures)).'</li></ul>';
    }

    

    
}

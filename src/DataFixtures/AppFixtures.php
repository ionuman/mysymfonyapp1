<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // --- Produsul 1 (Existent) ---
        $product = new Product();
        $product->setName("Smart TV Ultra HD");
        $product->setDescription("Televizor 4K cu diagonala de 125cm, perfect pentru filme și gaming.");
        $product->setSize(100);
        $manager->persist($product);

        // --- Produsul 2 (Existent) ---
        $product = new Product();
        $product->setName("Laptop Gaming Pro");
        $product->setDescription("Notebook performant cu procesor i9 și placă video RTX, ideal pentru sarcini solicitante.");
        $product->setSize(200);
        $manager->persist($product);

        // --- Produsul 3 (NOU) ---
        $product = new Product();
        $product->setName("Casti Wireless Bose");
        $product->setDescription("Căști cu anulare activă a zgomotului, autonomie de 30 de ore.");
        $product->setSize(50);
        $manager->persist($product);

        // --- Produsul 4 (NOU) ---
        $product = new Product();
        $product->setName("Mouse Ergonomic Vertical");
        $product->setDescription("Mouse optic ce previne durerile de încheietură. Design vertical.");
        $product->setSize(25);
        $manager->persist($product);

        // --- Produsul 5 (NOU) ---
        $product = new Product();
        $product->setName("Tastatura Mecanica");
        $product->setDescription("Tastatură mecanică cu iluminare RGB și switch-uri tactile.");
        $product->setSize(150);
        $manager->persist($product);

        // --- Produsul 6 (NOU) ---
        $product = new Product();
        $product->setName("Monitor Ultrawide 34 inch");
        $product->setDescription("Monitor curbat ideal pentru productivitate și multitasking.");
        $product->setSize(340);
        $manager->persist($product);

        // --- Produsul 7 (NOU) ---
        $product = new Product();
        $product->setName("Webcam Full HD");
        $product->setDescription("Cameră web cu rezoluție 1080p, microfon integrat.");
        $product->setSize(80);
        $manager->persist($product);

        $manager->flush();
    }
}

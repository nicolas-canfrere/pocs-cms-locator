<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LocatorController extends AbstractController
{
    public function index()
    {
        return $this->render('locator/index.html.twig');
    }

    public function listPartners(Request $request)
    {
        if ( ! $request->isXmlHttpRequest()) {
            throw $this->createAccessDeniedException();
        }

        $partners = [
            [
                'id'           => 1,
                'name'         => '#Name Solution 1',
                'availability' => '#localisation',
                'url'          => 'https://www.google.com',
                'logo'         => 'https://via.placeholder.com/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'  => '1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'excerpt'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'categories'   => [1, 2],
                'localisation' => 1
            ],
            [
                'id'           => 2,
                'name'         => '#Name Solution 2',
                'availability' => '#localisation',
                'url'          => 'https://www.google.com',
                'logo'         => 'https://via.placeholder.com/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'  => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'excerpt'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'categories'   => [2, 3],
                'localisation' => 2
            ],
            [
                'id'           => 3,
                'name'         => '#Name Solution 3',
                'availability' => '#localisation',
                'url'          => 'https://www.google.com',
                'logo'         => 'https://via.placeholder.com/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'  => '3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'excerpt'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'categories'   => [3, 4],
                'localisation' => 3
            ],
            [
                'id'           => 4,
                'name'         => '#Name Solution 4',
                'availability' => '#localisation',
                'url'          => 'https://www.google.com',
                'logo'         => 'https://via.placeholder.com/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'  => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'excerpt'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'categories'   => [4, 5],
                'localisation' => 4
            ],
            [
                'id'           => 5,
                'name'         => '#Name Solution 5',
                'availability' => '#localisation',
                'url'          => 'https://www.google.com',
                'logo'         => 'https://via.placeholder.com/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'  => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'excerpt'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'categories'   => [2, 4],
                'localisation' => 5
            ],
        ];

        return new JsonResponse($partners);
    }

    public function listCategories(Request $request)
    {
        if ( ! $request->isXmlHttpRequest()) {
            throw $this->createAccessDeniedException();
        }

        $categories = [
            ['id' => 1, 'name' => 'Category 1', 'selected' => false],
            ['id' => 2, 'name' => 'Category 2', 'selected' => false],
            ['id' => 3, 'name' => 'Category 3', 'selected' => false],
            ['id' => 4, 'name' => 'Category 4', 'selected' => false],
            ['id' => 5, 'name' => 'Category 5', 'selected' => false],
        ];

        return new JsonResponse($categories);
    }

    public function listCountries(Request $request)
    {
        if ( ! $request->isXmlHttpRequest()) {
            throw $this->createAccessDeniedException();
        }

        $countries = [
            ['id' => 1, 'name' => 'France', 'selected' => false],
            ['id' => 2, 'name' => 'Angleterre', 'selected' => false],
            ['id' => 3, 'name' => 'Allemagne', 'selected' => false],
            ['id' => 4, 'name' => 'Belgique', 'selected' => false],
            ['id' => 5, 'name' => 'Italie', 'selected' => false],
        ];

        return new JsonResponse($countries);
    }
}

<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LocatorController extends AbstractController
{
    public function index()
    {
        return $this->render(
            'locator/index.html.twig',
            [
                'urlImg' => 'https://via.placeholder.com',
            ]
        );
    }

    public function listPartners(Request $request)
    {
        if ( ! $request->isXmlHttpRequest()) {
            throw $this->createAccessDeniedException();
        }

        $partners = [
            [
                'id'                  => 1,
                'title'               => 'Lorem',
                'certification_level' => ['label' => 'cert 1', 'id' => 1],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 1, 'name' => 'Category 1'],
                    ['id' => 2, 'name' => 'Category 2'],
                ],
                'country_partner'     => ['id' => 1, 'label' => 'France'],
            ],
            [
                'id'                  => 2,
                'title'               => 'Ipsum',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 3, 'name' => 'Category 3'],
                ],
                'country_partner'     => ['id' => 3, 'label' => 'Allemagne'],
            ],
            [
                'id'                  => 3,
                'title'               => 'Dolor',
                'certification_level' => ['label' => 'cert 3', 'id' => 3],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 3, 'name' => 'Category 3'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => ['id' => 4, 'label' => 'Belgique'],
            ],
            [
                'id'                  => 4,
                'title'               => 'Amet',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 4, 'name' => 'Category 4'],
                    ['id' => 5, 'name' => 'Category 5'],
                ],
                'country_partner'     => ['id' => 1, 'label' => 'France'],
            ],
            [
                'id'                  => 5,
                'title'               => 'Consectetur',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => ['id' => 5, 'label' => 'Italie'],
            ],
            [
                'id'                  => 6,
                'title'               => 'Ipsum',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 3, 'name' => 'Category 3'],
                ],
                'country_partner'     => ['id' => 3, 'label' => 'Allemagne'],
            ],
            [
                'id'                  => 7,
                'title'               => 'Dolor',
                'certification_level' => ['label' => 'cert 3', 'id' => 3],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 3, 'name' => 'Category 3'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => ['id' => 4, 'label' => 'Belgique'],
            ],
            [
                'id'                  => 8,
                'title'               => 'Amet',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 4, 'name' => 'Category 4'],
                    ['id' => 5, 'name' => 'Category 5'],
                ],
                'country_partner'     => ['id' => 1, 'label' => 'France'],
            ],
            [
                'id'                  => 9,
                'title'               => 'Consectetur',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partnerTags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => ['id' => 5, 'label' => 'Italie'],
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
            ['id' => 1, 'label' => 'France', 'selected' => false],
            ['id' => 2, 'label' => 'Angleterre', 'selected' => false],
            ['id' => 3, 'label' => 'Allemagne', 'selected' => false],
            ['id' => 4, 'label' => 'Belgique', 'selected' => false],
            ['id' => 5, 'label' => 'Italie', 'selected' => false],
        ];

        return new JsonResponse($countries);
    }
}

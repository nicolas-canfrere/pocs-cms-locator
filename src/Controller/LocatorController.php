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
                'logo'                => '/600x250/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 1, 'name' => 'Category 1'],
                    ['id' => 2, 'name' => 'Category 2'],
                ],
                'country_partner'     => 'France',
                'country_id'     => 1,
                'created' => (new \DateTime('2019-01-01 00:00:00'))->format('c'),
            ],
            [
                'id'                  => 2,
                'title'               => 'Ipsum',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x300/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 3, 'name' => 'Category 3'],
                ],
                'country_partner'     => 'Allemagne',
                'country_id'     => 3,
                'created' => (new \DateTime('2019-02-01 00:00:00'))->format('c'),
            ],
            [
                'id'                  => 3,
                'title'               => 'Dolor',
                'certification_level' => ['label' => 'cert 3', 'id' => 3],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x200/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 3, 'name' => 'Category 3'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => 'Belgique',
                'country_id'     => 4,
                'created' => (new \DateTime('2019-03-01 00:00:00'))->format('c'),
            ],
            [
                'id'                  => 4,
                'title'               => 'Amet',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/500x300/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 4, 'name' => 'Category 4'],
                    ['id' => 5, 'name' => 'Category 5'],
                ],
                'country_partner'     => 'France',
                'country_id'     => 1,
                'created' => (new \DateTime('2019-04-01 00:00:00'))->format('c'),
            ],
            [
                'id'                  => 5,
                'title'               => 'Consectetur',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => 'Italie',
                'country_id'     => 5,
                'created' => (new \DateTime('2019-05-01 00:00:00'))->format('c'),
            ],
            [
                'id'                  => 6,
                'title'               => 'Ipsum',
                'certification_level' => ['label' => 'cert 2', 'id' => 2],
                'availability'        => '#country_partner',
                'url'                 => 'https://www.google.com',
                'logo'                => '/400x150/FFFFFF/CCCCCC/?text=Partner+logo',
                'description'         => '2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla.',
                'summary_descrip'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris. Curabitur congue bibendum fringilla. Phasellus suscipit nunc accumsan rutrum finibus. Phasellus neque leo, ultrices vel luctus vitae, tempor ac mauris. Fusce a vulputate mauris.',
                'partner_tags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 3, 'name' => 'Category 3'],
                ],
                'country_partner'     => 'Allemagne',
                'country_id'     => 3,
                'created' => (new \DateTime('2020-01-01 00:00:00'))->format('c'),
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
                'partner_tags'         => [
                    ['id' => 3, 'name' => 'Category 3'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => 'Belgique',
                'country_id'     => 4,
                'created' => (new \DateTime('2020-02-01 00:00:00'))->format('c'),
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
                'partner_tags'         => [
                    ['id' => 4, 'name' => 'Category 4'],
                    ['id' => 5, 'name' => 'Category 5'],
                ],
                'country_partner'     => 'France',
                'country_id'     => 1,
                'created' => (new \DateTime('2020-07-01 00:00:00'))->format('c'),
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
                'partner_tags'         => [
                    ['id' => 2, 'name' => 'Category 2'],
                    ['id' => 4, 'name' => 'Category 4'],
                ],
                'country_partner'     => 'Italie',
                'country_id'     => 5,
                'created' => (new \DateTime('2020-08-01 00:00:00'))->format('c'),
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
            ['id' => 1, 'name' => 'Category 1'],
            ['id' => 2, 'name' => 'Category 2'],
            ['id' => 3, 'name' => 'Category 3'],
            ['id' => 4, 'name' => 'Category 4'],
            ['id' => 5, 'name' => 'Category 5'],
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

<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioItem::truncate();

        $items = [
            [
                'title'          => 'CheckInn Hotels',
                'client'         => 'CheckInn Hotels',
                'description'    => 'Hotel management SaaS platform with real-time booking, check-in automation, and operational analytics. Helps hotel operators reduce manual admin and improve guest experience through a cloud-based subscription model.',
                'service_type'   => 'SaaS',
                'url'            => 'https://checkinnhotle.com',
                'completed_year' => 2024,
                'sort_order'     => 1,
            ],
            [
                'title'          => 'Avant-Garde Hotel Management System',
                'client'         => 'Avant-Garde Hotel',
                'description'    => 'Tailored hotel management system with integrated inventory control, billing automation, and guest experience modules. Built to the exact workflow of the property, eliminating the compromises of off-the-shelf PMS tools.',
                'service_type'   => 'Custom Software',
                'url'            => 'https://avantgardehm.com',
                'completed_year' => 2023,
                'sort_order'     => 2,
            ],
            [
                'title'          => 'FMITI Budget Tracking System',
                'client'         => 'Federal Ministry of Industry, Trade & Investment',
                'description'    => 'Budget tracking and reporting platform for a federal government ministry. Provides real-time visibility into departmental expenditure, automated compliance reporting, and audit trail management for public-sector accountability.',
                'service_type'   => 'Custom Software',
                'url'            => null,
                'completed_year' => 2023,
                'sort_order'     => 3,
            ],
            [
                'title'          => 'Amaryadotcom CRM',
                'client'         => 'Amaryadotcom',
                'description'    => 'Customer relationship management solution built for sales and support automation. Features lead pipeline management, automated follow-up workflows, client communication history, and performance dashboards for the sales team.',
                'service_type'   => 'Custom Software',
                'url'            => null,
                'completed_year' => 2023,
                'sort_order'     => 4,
            ],
            [
                'title'          => 'Wbytripletees Hotel SaaS & Consulting',
                'client'         => 'Wbytripletees Hotel',
                'description'    => 'All-in-one SaaS solution for hotel operations combined with strategic IT consulting. Covers reservations, housekeeping scheduling, billing, and guest communications — with ongoing advisory on digital growth.',
                'service_type'   => 'SaaS',
                'url'            => 'https://wbytripletees.com',
                'completed_year' => 2024,
                'sort_order'     => 5,
            ],
            [
                'title'          => 'MokesBridge Asset Management',
                'client'         => 'MokesBridge',
                'description'    => 'Bridge inspection and infrastructure asset management system with condition tracking, inspection scheduling, photo documentation, and maintenance planning. Live demo available at the dedicated subdomain.',
                'service_type'   => 'Custom Software',
                'url'            => 'https://mokesbridge.mokesinfotech.com',
                'completed_year' => 2025,
                'sort_order'     => 6,
            ],
            [
                'title'          => 'Swizzhomes Property Platform',
                'client'         => 'Swizzhomes Limited',
                'description'    => 'Property listing and client management platform enabling real-time property search, agent-client matching, and transaction tracking. Complemented by digital strategy consulting to accelerate the client\'s online growth.',
                'service_type'   => 'Custom Software',
                'url'            => null,
                'completed_year' => 2024,
                'sort_order'     => 7,
            ],
            [
                'title'          => 'Design & Shelter Real Estate CRM',
                'client'         => 'Design & Shelter Limited',
                'description'    => 'Real estate CRM and project tracking system covering property development pipelines, client relationship management, and contractor coordination. Includes IT consulting for process digitisation and operational efficiency.',
                'service_type'   => 'Custom Software',
                'url'            => null,
                'completed_year' => 2024,
                'sort_order'     => 8,
            ],
            [
                'title'          => 'Bethpez Enterprise Platform',
                'client'         => 'Bethpez Limited',
                'description'    => 'Enterprise software for business process automation covering operations management, reporting, and workflow orchestration. Ongoing IT advisory to align technology investments with the company\'s strategic goals.',
                'service_type'   => 'Custom Software',
                'url'            => 'https://bethpezltd.com',
                'completed_year' => 2022,
                'sort_order'     => 9,
            ],
            [
                'title'          => 'JohnDavison IT Infrastructure Advisory',
                'client'         => 'JohnDavison Associate',
                'description'    => 'IT infrastructure assessment and data governance consulting engagement. Delivered a prioritised roadmap covering network architecture, data management policies, compliance requirements, and a phased modernisation plan.',
                'service_type'   => 'IT Consulting',
                'url'            => null,
                'completed_year' => 2023,
                'sort_order'     => 10,
            ],
            [
                'title'          => 'Core14 Digital Transformation',
                'client'         => 'Core14',
                'description'    => 'Digital transformation and enterprise architecture advisory programme. Covered process mapping, technology stack evaluation, vendor selection, and a 12-month roadmap to shift operations from manual to fully digital workflows.',
                'service_type'   => 'IT Consulting',
                'url'            => null,
                'completed_year' => 2025,
                'sort_order'     => 11,
            ],
        ];

        foreach ($items as $item) {
            PortfolioItem::create($item);
        }
    }
}

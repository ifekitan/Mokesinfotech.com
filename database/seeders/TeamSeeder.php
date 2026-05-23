<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::truncate();

        $members = [
            [
                'name'       => 'Moke Clement Ayodele',
                'role'       => 'CEO & Founding Partner',
                'bio'        => 'Deep experience in strategy, architecture, and execution of software solutions. Also MD & Founding Partner of Bethpez Limited. Specialties include: Productivity & Data Governance, Enterprise Intelligence (EI), Enterprise Architecture, Solution Architecture, Information Management, Data & Big Data, and Analytics Programs.',
                'email'      => 'mokeclement@mokesinfotech.com',
                'sort_order' => 1,
            ],
            [
                'name'       => 'Victor Daramola Moke',
                'role'       => 'Lead Designer / Frontend Developer',
                'bio'        => null,
                'email'      => null,
                'sort_order' => 2,
            ],
            [
                'name'       => 'Olasunkanmi Olukitibi',
                'role'       => 'Full-Stack Developer & ICT Support Specialist',
                'bio'        => 'Innovative, solutions-driven developer with 15+ years of experience in web development, software deployment, and digital media consulting.',
                'email'      => null,
                'sort_order' => 3,
            ],
            [
                'name'       => 'Florence Ronke Ayodele',
                'role'       => 'HR',
                'bio'        => null,
                'email'      => null,
                'sort_order' => 4,
            ],
            [
                'name'       => 'Frank Baiden',
                'role'       => 'Technical & Developer',
                'bio'        => null,
                'email'      => null,
                'sort_order' => 5,
            ],
        ];

        foreach ($members as $member) {
            Team::create($member);
        }
    }
}

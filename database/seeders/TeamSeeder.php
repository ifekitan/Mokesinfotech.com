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
                'skills'     => null,
                'tools'      => null,
                'sort_order' => 1,
            ],
            [
                'name'       => 'Victor Daramola Moke',
                'role'       => 'Software Developer – Automation & Full-Stack',
                'bio'        => 'Passionate, results-oriented Junior Software Developer with a unique foundation in UI/UX design and IT operations, evolved into building high-impact, data-driven web applications and automation pipelines. Combines creative systems thinking with technical execution, utilizing a stack of Python, Node.js, SQL, PostgreSQL, and MongoDB. Proven experience in eliminating operational friction using tools like Docker, n8n, and Vercel, and driven to deliver scalable, user-centric solution architectures that power business growth.',
                'email'      => null,
                'skills'     => ['Python', 'SQL', 'n8n', 'AWS', 'KNIME', 'Linux', 'GitHub Actions (CI/CD)', 'APIs', 'System Integration', 'KPI Design', 'Business Case Development'],
                'tools'      => ['Git', 'JIRA', 'Trello', 'SAP', 'Microsoft Office', 'Figma', 'CorelDraw', 'Adobe Suite'],
                'sort_order' => 2,
            ],
            [
                'name'       => 'Olasunkanmi Olukitibi',
                'role'       => 'Full-Stack Developer & ICT Support Specialist',
                'bio'        => 'Innovative, solutions-driven developer with 15+ years of experience in web development, software deployment, and digital media consulting.',
                'email'      => null,
                'skills'     => null,
                'tools'      => null,
                'sort_order' => 3,
            ],
            [
                'name'       => 'Florence Ronke Ayodele',
                'role'       => 'HR',
                'bio'        => null,
                'email'      => null,
                'skills'     => null,
                'tools'      => null,
                'sort_order' => 4,
            ],
            [
                'name'       => 'Frank Baiden',
                'role'       => 'Technical & Developer',
                'bio'        => null,
                'email'      => null,
                'skills'     => null,
                'tools'      => null,
                'sort_order' => 5,
            ],
        ];

        foreach ($members as $member) {
            Team::create($member);
        }
    }
}

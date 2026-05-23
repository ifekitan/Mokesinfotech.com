<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\Team;

class PageController extends Controller
{
    private static array $teamColors = [
        'bg-blue-600', 'bg-emerald-600', 'bg-purple-600',
        'bg-amber-600', 'bg-rose-600', 'bg-teal-600',
    ];

    private static array $portfolioMeta = [
        'SaaS'            => ['image_bg' => 'from-blue-600 to-indigo-700', 'icon' => '☁️'],
        'Custom Software' => ['image_bg' => 'from-emerald-500 to-teal-600', 'icon' => '🖥️'],
        'IT Consulting'   => ['image_bg' => 'from-amber-500 to-orange-600', 'icon' => '🎯'],
    ];

    private static array $projectIcons = [
        'CheckInn Hotels'                    => ['icon' => '🏨', 'image_bg' => 'from-blue-600 to-indigo-700'],
        'Avant-Garde Hotel Management System'=> ['icon' => '🏩', 'image_bg' => 'from-violet-600 to-purple-700'],
        'FMITI Budget Tracking System'       => ['icon' => '🏛️', 'image_bg' => 'from-slate-600 to-gray-700'],
        'Amaryadotcom CRM'                   => ['icon' => '📊', 'image_bg' => 'from-emerald-500 to-teal-600'],
        'Wbytripletees Hotel SaaS & Consulting' => ['icon' => '🏪', 'image_bg' => 'from-cyan-500 to-blue-600'],
        'MokesBridge Asset Management'       => ['icon' => '🌉', 'image_bg' => 'from-amber-500 to-orange-600'],
        'Swizzhomes Property Platform'       => ['icon' => '🏠', 'image_bg' => 'from-rose-500 to-pink-600'],
        'Design & Shelter Real Estate CRM'   => ['icon' => '🏗️', 'image_bg' => 'from-teal-500 to-emerald-600'],
        'Bethpez Enterprise Platform'        => ['icon' => '💼', 'image_bg' => 'from-indigo-600 to-blue-700'],
        'JohnDavison IT Infrastructure Advisory' => ['icon' => '📡', 'image_bg' => 'from-purple-500 to-violet-600'],
        'Core14 Digital Transformation'     => ['icon' => '🔮', 'image_bg' => 'from-gray-700 to-gray-900'],
    ];

    public function home()
    {
        $featuredProjects = PortfolioItem::orderBy('sort_order')
            ->take(3)
            ->get()
            ->map(fn ($item) => $this->hydratePortfolioItem($item));

        return view('home', compact('featuredProjects'));
    }

    public function services()
    {
        return view('services');
    }

    public function portfolio()
    {
        $projects = PortfolioItem::orderBy('sort_order')
            ->get()
            ->map(fn ($item) => $this->hydratePortfolioItem($item));

        return view('portfolio', compact('projects'));
    }

    public function about()
    {
        $team = Team::orderBy('sort_order')
            ->get()
            ->map(function ($member, $idx) {
                $words    = explode(' ', $member->name);
                $initials = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
                return [
                    'name'     => $member->name,
                    'role'     => $member->role,
                    'bio'      => $member->bio,
                    'email'    => $member->email,
                    'skills'   => $member->skills ?? [],
                    'tools'    => $member->tools ?? [],
                    'initials' => $initials,
                    'color'    => self::$teamColors[$idx % count(self::$teamColors)],
                ];
            });

        return view('about', compact('team'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function blog()
    {
        $posts = [
            [
                'slug'    => 'why-saas-beats-custom-for-smbs',
                'title'   => 'Why SaaS Often Beats Custom Software for SMBs',
                'excerpt' => 'We break down the TCO considerations that should drive your build-vs-buy decision in 2026.',
                'date'    => 'May 15, 2026',
                'tag'     => 'Strategy',
                'read'    => '5 min read',
            ],
            [
                'slug'    => 'cloud-migration-checklist',
                'title'   => 'The 10-Point Cloud Migration Readiness Checklist',
                'excerpt' => 'Before you move a single workload, run through this checklist to avoid the most common migration pitfalls.',
                'date'    => 'May 1, 2026',
                'tag'     => 'Cloud',
                'read'    => '7 min read',
            ],
            [
                'slug'    => 'livewire-v3-real-world',
                'title'   => 'Livewire v3 in the Real World: A Developer\'s Review',
                'excerpt' => 'After shipping three production projects with Livewire 3, here\'s what we love and what still stings.',
                'date'    => 'Apr 18, 2026',
                'tag'     => 'Engineering',
                'read'    => '6 min read',
            ],
        ];

        return view('blog.index', compact('posts'));
    }

    public function blogPost(string $slug)
    {
        $posts = [
            'why-saas-beats-custom-for-smbs' => [
                'title'   => 'Why SaaS Often Beats Custom Software for SMBs',
                'date'    => 'May 15, 2026',
                'tag'     => 'Strategy',
                'read'    => '5 min read',
                'content' => '<p>For small and medium-sized businesses, the allure of custom software is real. You get exactly what you need, branded to your identity, with no per-seat licensing fees. But in our decade of building software for clients, we\'ve seen more SMBs sink budget into custom tools they didn\'t fully need than we care to count.</p><h2>The TCO Trap</h2><p>Custom software costs don\'t end at launch. They live on in bug fixes, security patches, infrastructure management, and the engineering time needed to adapt the system as your business grows. SaaS vendors absorb all of that into a predictable monthly fee.</p><h2>When Custom Wins</h2><p>That said, custom is the right call when: (1) your workflow is genuinely unique and SaaS tools force expensive workarounds, (2) data sovereignty requirements prohibit third-party hosting, or (3) competitive advantage depends on the software itself.</p><h2>Our Recommendation</h2><p>Start with SaaS, configure it aggressively, and only invest in custom development for the specific gaps that SaaS cannot fill. A focused custom integration layer often delivers 80% of the value at 20% of the cost of a full bespoke build.</p>',
            ],
            'cloud-migration-checklist' => [
                'title'   => 'The 10-Point Cloud Migration Readiness Checklist',
                'date'    => 'May 1, 2026',
                'tag'     => 'Cloud',
                'read'    => '7 min read',
                'content' => '<p>Cloud migrations fail not because of technology but because of preparation gaps. Use this checklist before moving any workload.</p><h2>1. Inventory your dependencies</h2><p>Map every service, database, and integration before touching infrastructure. Unknown dependencies are the leading cause of post-migration incidents.</p><h2>2. Define your success metrics upfront</h2><p>Latency budgets, cost targets, uptime SLAs — write them down before you start. You can\'t declare success without them.</p><h2>3. Plan your rollback</h2><p>Every migration needs a tested rollback path. If you can\'t roll back safely, you\'re not ready to migrate.</p>',
            ],
            'livewire-v3-real-world' => [
                'title'   => 'Livewire v3 in the Real World: A Developer\'s Review',
                'date'    => 'Apr 18, 2026',
                'tag'     => 'Engineering',
                'read'    => '6 min read',
                'content' => '<p>We\'ve shipped this very site and two client projects using Livewire 3. Here\'s our honest take after months of production use.</p><h2>What we love</h2><p>The Alpine.js integration is seamless. Entangle, the new lifecycle hooks, and the lazy loading improvements are all genuine quality-of-life wins. File uploads feel first-class now.</p><h2>What still stings</h2><p>Debugging component state across parent-child boundaries can still be opaque. The browser devtools extension helps but isn\'t quite where React DevTools is yet.</p><h2>Verdict</h2><p>Livewire 3 is mature enough for any business application. If your team knows Laravel, it\'s the fastest path to interactive UIs without a JavaScript framework split.</p>',
            ],
        ];

        $post = $posts[$slug] ?? null;

        if (! $post) {
            abort(404);
        }

        return view('blog.show', compact('post', 'slug'));
    }

    private function hydratePortfolioItem(PortfolioItem $item): array
    {
        $meta = self::$projectIcons[$item->title]
            ?? self::$portfolioMeta[$item->service_type]
            ?? ['image_bg' => 'from-gray-600 to-gray-800', 'icon' => '💡'];

        return [
            'title'    => $item->title,
            'client'   => $item->client,
            'category' => $item->service_type,
            'summary'  => $item->description,
            'url'      => $item->url,
            'image_bg' => $meta['image_bg'],
            'icon'     => $meta['icon'],
            'tags'     => $this->tagsForServiceType($item->service_type),
            'result'   => $this->resultForItem($item),
            'year'     => $item->completed_year,
        ];
    }

    private function tagsForServiceType(string $type): array
    {
        return match ($type) {
            'SaaS'            => ['Multi-tenant', 'SaaS', 'Cloud'],
            'Custom Software' => ['Laravel', 'Custom Build', 'Web App'],
            'IT Consulting'   => ['Strategy', 'Architecture', 'Advisory'],
            default           => ['Technology', 'Digital'],
        };
    }

    private function resultForItem(PortfolioItem $item): string
    {
        $map = [
            'CheckInn Hotels'                     => 'Real-time bookings & automated check-in',
            'Avant-Garde Hotel Management System' => 'Unified billing, inventory & guest management',
            'FMITI Budget Tracking System'        => 'Full audit trail & compliance reporting',
            'Amaryadotcom CRM'                    => 'Automated sales pipeline & support workflows',
            'Wbytripletees Hotel SaaS & Consulting' => 'End-to-end hotel operations on one platform',
            'MokesBridge Asset Management'        => 'Structured inspection & maintenance planning',
            'Swizzhomes Property Platform'        => 'Digital property listings & agent-client matching',
            'Design & Shelter Real Estate CRM'    => 'Project tracking & CRM in one system',
            'Bethpez Enterprise Platform'         => 'Business process automation across operations',
            'JohnDavison IT Infrastructure Advisory' => 'Prioritised modernisation roadmap delivered',
            'Core14 Digital Transformation'      => '12-month digital roadmap & vendor selection',
        ];

        return $map[$item->title] ?? 'Delivered on time and to specification';
    }
}

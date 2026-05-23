<x-layouts.app title="Services">

{{-- PAGE HERO --}}
<section class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-36 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-brand-400 text-sm font-semibold uppercase tracking-widest">What we offer</span>
            <h1 class="text-4xl md:text-5xl font-extrabold mt-3 mb-5 leading-tight">
                Three service pillars.<br>One reliable partner.
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
                Whether you need a net-new product, a scalable platform, or expert guidance on your technology strategy — we have the depth to deliver it properly.
            </p>
        </div>
    </div>
</section>

{{-- TAB NAVIGATION --}}
<div class="sticky top-16 md:top-20 z-40 bg-white border-b border-gray-200 shadow-sm"
     x-data="{ active: 'custom' }"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex gap-0 overflow-x-auto scrollbar-none">
            @foreach([['custom','Custom Software'],['saas','SaaS Products'],['consulting','IT Consulting'],['advisory','IT Advisory']] as [$id,$label])
            <a href="#{{ $id }}-software" @click="active = '{{ $id }}'"
               :class="active === '{{ $id }}' ? 'border-brand-600 text-brand-600' : 'border-transparent text-gray-500 hover:text-gray-800'"
               class="shrink-0 px-5 py-4 text-sm font-semibold border-b-2 transition-colors">
                {{ $label }}
            </a>
            @endforeach
        </nav>
    </div>
</div>

{{-- CUSTOM SOFTWARE --}}
<section id="custom-software" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-flex items-center gap-2 text-blue-600 bg-blue-50 px-3 py-1 rounded-full text-sm font-semibold mb-5">🖥️ Custom Software Development</span>
                <h2 class="section-title mb-6">Software built for <em>your</em> problem — not a template</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Off-the-shelf tools are designed for the median use case. When your workflow is the differentiator, you need software that fits like a glove. We partner with your team to understand the nuance, then engineer a solution that your competitors can't simply buy.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    From single-feature prototypes to enterprise-grade platforms, we cover the full stack: backend APIs, web frontends, mobile apps, and integrations with your existing systems.
                </p>
                <ul class="space-y-3 mb-8">
                    @foreach(['Web application development (Laravel, Django, Node.js)','Mobile apps (React Native, Flutter)','API design & third-party integrations','Legacy system modernisation','Performance optimisation & scalability audits'] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="btn-primary">Discuss your project</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['🚀','Fast delivery','From MVP to production in weeks, not quarters.'],
                    ['🔒','Security-first','OWASP best practices baked in from day one.'],
                    ['📈','Scalable','Architecture that grows with your user base.'],
                    ['🤝','Transparent','Weekly demos, shared boards, no surprises.'],
                ] as [$icon,$title,$desc])
                <div class="card p-5">
                    <div class="text-2xl mb-3">{{ $icon }}</div>
                    <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $title }}</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- SAAS --}}
<section id="saas" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-6">What's included in a SaaS engagement</h3>
                    <div class="space-y-4">
                        @foreach([
                            ['Multi-tenant architecture','Proper data isolation and per-account configuration out of the box.'],
                            ['Subscription billing','Stripe integration with trial management, plan upgrades, and dunning.'],
                            ['Onboarding flows','Guided setup that gets new users to value in minutes, not hours.'],
                            ['Analytics dashboard','Usage metrics and health indicators visible to you and optionally to your customers.'],
                            ['Growth tooling','Referral hooks, in-app NPS surveys, and email automation wired up and ready.'],
                        ] as [$title,$desc])
                        <div class="flex gap-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                            <div class="w-5 h-5 bg-emerald-100 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $title }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <span class="inline-flex items-center gap-2 text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full text-sm font-semibold mb-5">☁️ SaaS Products</span>
                <h2 class="section-title mb-6">Launch a subscription product that scales from day one</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Launching a SaaS product is a different beast from building internal tools. It demands a multi-tenant data model, polished onboarding, billing infrastructure, and growth loops — all before your first paying customer signs up.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    We've built this stack repeatedly and have refined it into a proven launch playbook that cuts months off your time-to-market without cutting corners.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary bg-emerald-600 hover:bg-emerald-700">Plan your SaaS launch</a>
            </div>
        </div>
    </div>
</section>

{{-- IT CONSULTING --}}
<section id="consulting" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 text-amber-600 bg-amber-50 px-3 py-1 rounded-full text-sm font-semibold mb-5">🎯 IT Consulting</span>
            <h2 class="section-title">Technology advice from engineers, not analysts</h2>
            <p class="section-subtitle mx-auto">Our consultants have shipped production systems at scale. Every recommendation we make, we'd stake our own delivery on.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach([
                ['id'=>'cloud','icon'=>'☁️','color'=>'amber','title'=>'Cloud Migration','desc'=>'We assess your current infrastructure, design the target-state architecture, and manage a phased migration to AWS, GCP, or Azure with zero-downtime cutovers.','items'=>['Current-state inventory & TCO analysis','Provider selection & architecture design','Terraform IaC modules','Cutover planning & execution','30-day post-migration monitoring']],
                ['id'=>'devops','icon'=>'⚙️','color'=>'blue','title'=>'DevOps Advisory','desc'=>'Slow release cycles and fragile deployments are a competitive liability. We embed with your team to establish CI/CD pipelines, observability stacks, and on-call runbooks.','items'=>['CI/CD pipeline design (GitHub Actions, GitLab CI)','Container strategy (Docker, Kubernetes)','Observability setup (Prometheus, Grafana, Datadog)','Incident management & runbooks','Developer experience improvements']],
                ['id'=>'strategy','icon'=>'🗺️','color'=>'purple','title'=>'Tech Strategy','desc'=>'Before spending on engineering, align your technology roadmap with your commercial strategy. We facilitate structured workshops and produce a 12-month technology plan.','items'=>['Executive technology workshops','Build vs. buy analysis','Vendor evaluation & selection','Engineering org design','OKR alignment for technology teams']],
                ['id'=>'audit','icon'=>'🔍','color'=>'rose','title'=>'Infrastructure Audit','desc'=>'A systematic review of your cloud spend, security posture, and resilience gaps — with a prioritised remediation plan and projected savings.','items'=>['Cloud cost optimisation','Security posture review (CIS benchmarks)','Disaster recovery readiness','Compliance gap analysis (ISO 27001, SOC 2)','Detailed findings report']],
                ['id'=>'transform','icon'=>'✨','color'=>'indigo','title'=>'Digital Transformation','desc'=>'Moving from manual processes to digital workflows is a change-management challenge as much as a technology one. We plan and execute the full transition.','items'=>['Process mapping & automation opportunities','Platform selection & integration design','Change management support','Staff training & documentation','Phased rollout planning']],
                ['id'=>'fractional','icon'=>'👔','color'=>'teal','title'=>'Fractional CTO','desc'=>'Need senior technical leadership without the full-time hire? Our fractional CTO service gives you an experienced technology executive at a fraction of the cost.','items'=>['Weekly technology leadership sessions','Board & investor communication support','Hiring & team structure advice','Architecture decision records','Vendor & partner negotiation']],
            ] as $s)
            <div class="card p-7">
                <div class="text-3xl mb-4">{{ $s['icon'] }}</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $s['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed mb-4">{{ $s['desc'] }}</p>
                <ul class="space-y-1.5">
                    @foreach($s['items'] as $item)
                    <li class="flex items-center gap-2 text-xs text-gray-600">
                        <span class="w-1.5 h-1.5 bg-brand-500 rounded-full shrink-0"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        <div class="bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-100 rounded-2xl p-8 text-center">
            <h3 class="text-xl font-bold text-gray-900 mb-3">Not sure which engagement type fits?</h3>
            <p class="text-gray-600 mb-6 max-w-lg mx-auto">Book a free 30-minute discovery call and we'll tell you honestly where we can add the most value.</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-amber-600 hover:bg-amber-700">Book a discovery call</a>
        </div>
    </div>
</section>

{{-- IT ADVISORY (CEO EXPERTISE) --}}
<section id="advisory" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full text-sm font-semibold mb-5">🧭 IT Advisory</span>
            <h2 class="section-title">Enterprise-level advisory — beyond standard consulting</h2>
            <p class="section-subtitle mx-auto">Led personally by our CEO, Moke Clement Ayodele, our IT Advisory practice covers the disciplines that underpin long-term technology success in complex organisations.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach([
                ['icon'=>'🏢','title'=>'Enterprise Intelligence (EI)','desc'=>'Aligning technology capability with business intelligence strategy at the enterprise level — connecting data assets to decision-making processes across the organisation.','bullets'=>['BI platform evaluation & selection','Executive dashboard design','KPI framework development','Cross-departmental data alignment']],
                ['icon'=>'🛡️','title'=>'Data Governance & Productivity','desc'=>'Establishing the policies, standards, and processes that make data a trusted, governed business asset — increasing productivity and reducing compliance risk.','bullets'=>['Data governance framework design','Master data management','Data quality standards','Regulatory compliance mapping']],
                ['icon'=>'🏗️','title'=>'Enterprise & Solution Architecture','desc'=>'Designing scalable technology landscapes and solution blueprints that support organisational growth, system integration, and strategic agility.','bullets'=>['Enterprise architecture assessments','Architecture decision records','Integration pattern design','Reference architecture blueprints']],
                ['icon'=>'📂','title'=>'Information Management','desc'=>'Structuring how organisations capture, store, classify, and derive value from their information assets — from metadata strategy to document management.','bullets'=>['Information architecture design','Metadata & taxonomy frameworks','Document management strategy','Records retention policies']],
                ['icon'=>'📊','title'=>'Big Data & Analytics Programs','desc'=>'Leading end-to-end analytics initiatives from data platform selection and pipeline design to insight delivery and analytics team enablement.','bullets'=>['Data platform selection (Snowflake, BigQuery, etc.)','ETL/ELT pipeline architecture','Analytics roadmap development','Self-service BI enablement']],
                ['icon'=>'🔄','title'=>'IT Strategy & Digital Transformation','desc'=>'Translating business ambition into a clear technology roadmap with prioritised initiatives, measurable outcomes, and an achievable delivery plan.','bullets'=>['Technology strategy workshops','Digital maturity assessment','Roadmap development (12–36 months)','Vendor landscape evaluation']],
            ] as $s)
            <div class="card p-7 border-l-4 border-indigo-400">
                <div class="text-3xl mb-4">{{ $s['icon'] }}</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $s['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed mb-4">{{ $s['desc'] }}</p>
                <ul class="space-y-1.5">
                    @foreach($s['bullets'] as $bullet)
                    <li class="flex items-center gap-2 text-xs text-gray-600">
                        <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full shrink-0"></span>
                        {{ $bullet }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-100 rounded-2xl p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Work directly with the CEO</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">Our IT Advisory engagements are personally led by Moke Clement Ayodele — ensuring you receive senior-level attention, not junior analyst work dressed up as strategy.</p>
                    <p class="text-xs text-gray-500">Direct contact: <a href="mailto:mokeclement@mokesinfotech.com" class="text-brand-600 font-semibold hover:underline">mokeclement@mokesinfotech.com</a></p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary text-center">Start an advisory engagement</a>
                    <a href="{{ route('about') }}" class="btn-outline text-center">Meet the team</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TECH STACK --}}
<section class="py-20 bg-gray-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold mb-3">Technologies we build with</h2>
        <p class="text-gray-400 mb-10">We are technology-agnostic — we recommend what fits, not what we're most comfortable with.</p>
        <div class="flex flex-wrap justify-center gap-3">
            @foreach(['Laravel','Livewire','Vue.js','React','React Native','Node.js','Python','Django','PostgreSQL','MySQL','Redis','AWS','Google Cloud','Azure','Terraform','Docker','Kubernetes','Stripe','Twilio','GitHub Actions'] as $tech)
            <span class="bg-gray-800 hover:bg-brand-800 border border-gray-700 text-gray-300 text-xs font-medium px-3 py-1.5 rounded-full transition-colors cursor-default">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>

</x-layouts.app>

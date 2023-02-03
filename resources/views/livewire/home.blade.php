<div class="container mx-auto w-sc">
    <div class="grid grid-flow-row lg:grid-flow-col lg:grid-cols-4 lg:gap-3 auto-cols-max md:auto-cols-auto py-5">
        <div class="lg:col-span-3">
            <div class="border bg-white shadow-sm rounded-lg mb-5 border-t-slate-300">
                <div class="p-0">
                    @include('layouts.frontend.components.header')
                </div>
                @livewire('summary.professional-summary')
            </div>
            @livewire('experiences.experience')
            
        </div>
        <div class="lg:colspan-1 mt-5 lg:mt-0">
            @livewire('project-and-skill.my-skill')
            @livewire('project-and-skill.my-project')
            
        </div>
    </div>
</div>
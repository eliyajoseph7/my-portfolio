<div class="border bg-white shadow-sm rounded-lg border-b-slate-200">
    <div class="p-5">
        @if (auth()->check())
        <div class="float-right">
            <i class="fa fa-plus-circle fa-2xl cursor-pointer text-blue-400 hover:text-blue-800 p-3 relative " aria-labelledby="add-experience" role="dialog" aria-modal="true" wire:click="showAddExperience()"></i>
        </div>

        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$experience}} " wire:click="hideAddExperience()"></div>

        @include('livewire.experiences.add_experience')
        <h3 class="text-gray-800 py-1 hover:text-gray-900 tracking-tight cursor-pointer text-3xl font-bold dark:text-white font-mono">Work Experience</h3>
        <hr>
        <div class="w-full">
            @forelse ($experiences as $exp)
            <div class="">
                <h1 class="text-3xl font-serif italic w-96 md:w-full">
                    <i class="fa fa-star text-gray-500"></i> {{$exp->title}} - {{ $exp->company }}
                    @auth ()
                        <i class="fa fa-edit fa-sm items-center cursor-pointer text-blue-400 hover:text-blue-800 p-3 relative " aria-labelledby="add-experience" role="dialog" aria-modal="true" wire:click="showEditExperience({{ $exp->id }})"></i>
                    @endauth
                </h1>
            </div>
            <a class="py-1 pl-10 text-lg w-96 md:w-full">{{ $exp->location }} {{ $exp->from }} - {{ $exp->to }}</a>
            <a class="py-1 pl-10 text-lg w-full"></a>

            <h2 class="pl-10 mb-2 text-lg font-semibold italic text-gray-900 dark:text-white w-full">Achievements:</h2>
            <ul class="space-y-1 p-5 list-inside text-gray-500 dark:text-gray-400 w-96 md:w-full">
                @forelse ($exp->achievements as $task)
                <li class="flex items-center pl-5">
                    <i class="fa fa-check-circle w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0 " fill="currentColor"></i>
                    {{ $task->achievement }}
                </li>

                @empty
                    <p>No any achievement</p>
                @endforelse

            </ul>

            @empty
                <p>No any experience</p>
            @endforelse
        </div>
    </div>
</div>

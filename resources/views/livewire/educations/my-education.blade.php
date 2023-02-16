
<div class="border bg-white rounded-lg mb-5 education-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-education" aria-labelledby="add-education" role="dialog" aria-modal="true" wire:click="showAddEducation()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$education_flag}} " wire:click="hideAddEducation()"></div>

        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
            Educations
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($educations)
            <div class="flex justify-between education cursor-pointer" rmv="education" icn="prj">
                <div class="flex" aria-labelledby="add-education" role="dialog" aria-modal="true">
                    <p>
                        {!! $educations->education !!}
                    </p>
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="education" wire:click="deleteEducation{{ $educations->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any record</p>
            @endif

        </div>
    </div>
</div>

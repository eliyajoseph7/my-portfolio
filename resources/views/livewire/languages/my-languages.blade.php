
<div class="border bg-white rounded-lg mb-3 language-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-language" aria-labelledby="add-language" role="dialog" aria-modal="true" wire:click="showAddLanguage()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$language_flag}} " wire:click="hideAddLanguage()"></div>

        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
            Languages
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($languages)
            <div class="flex justify-between language cursor-pointer" rmv="language" icn="prj">
                <div class="flex" aria-labelledby="add-language" role="dialog" aria-modal="true">
                    <p>
                        <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                        {!! $languages->language !!}
                    </p>
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="language" wire:click="deleteLanguage{{ $languages->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any language</p>
            @endif

        </div>
    </div>
</div>

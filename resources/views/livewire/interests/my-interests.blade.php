
<div class="border bg-white rounded-lg mb-3 interest-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-certificate" aria-labelledby="add-interest" role="dialog" aria-modal="true" wire:click="showAddInterest()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$interest_flag}} " wire:click="hideAddInterest()"></div>

        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
            Interests
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($interests)
            <div class="flex justify-between interest cursor-pointer" rmv="interest" icn="prj">
                <div class="flex" aria-labelledby="add-interest" role="dialog" aria-modal="true">
                    <p>
                        <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                        {!! $interests->interest !!}
                    </p>
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="interest" wire:click="deleteInterest{{ $interests->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any interest</p>
            @endif

        </div>
    </div>
</div>


<div class="border bg-white rounded-lg mb-3 publication-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                    <i wire:click="$emit('delete_publication')" class="fa fa-trash-alt fa-lg items-center cursor-pointer text-red-400 hover:text-red-800 p-2 relative  btn-publication hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true"></i>
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-publication" aria-labelledby="add-publication" role="dialog" aria-modal="true" wire:click="showAddPublication()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$publication_flag}} " wire:click="hideAddPublication()"></div>

        @include('livewire.publications.add_publication')
        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
        <i class="fa fa-book-open fa-sm text-gray-500"></i> Publications
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($publications)
            <div class="flex justify-between publication cursor-pointer" rmv="publication" icn="prj">
                <div class="" aria-labelledby="add-publication" role="dialog" aria-modal="true">
                        <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                        {!! $publications->publication !!}
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="publication" wire:click="deletePublication{{ $publications->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any publication</p>
            @endif

        </div>
    </div>
</div>

<script>

    Livewire.on('delete_publication', () => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deletePublication')
                Swal.fire(
                    'Deleted!',
                    'Your publication has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".publication-action").hover(function(){
        $('.btn-publication').css("display", "inline-flex");
    }, function(){
        $('.btn-publication').css("display", "none");
    });
</script>


<style> 
    .publication-action ul {
        padding-left: 1em;
    }

    .publication-action ol {
        padding-left: 1em;
    }
    .publication-action li {
        list-style: none !important;
        list-style-position: outside;
        padding-left: 1em;
    }

    .publication-action li:before {
        content: "\f058"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        margin-left: -2em;
        /* margin-right: 15px; */
        padding: 5px;
        /* background-color: orange; */
    }
</style>

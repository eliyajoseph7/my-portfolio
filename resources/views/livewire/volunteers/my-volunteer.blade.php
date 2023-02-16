
<div class="border bg-white rounded-lg mb-3 volunteer-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                    <i wire:click="$emit('delete_volunteer')" class="fa fa-trash-alt fa-lg items-center cursor-pointer text-red-400 hover:text-red-800 p-2 relative  btn-volunteer hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true"></i>
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-volunteer" aria-labelledby="add-volunteer" role="dialog" aria-modal="true" wire:click="showAddVolunteer()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$volunteer_flag}} " wire:click="hideAddVolunteer()"></div>

        @include('livewire.volunteers.add_volunteer')
        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-2xl tracking-tight cursor-pointer dark:text-white font-mono">
            Volunteer Experience
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($volunteers)
            <div class="flex justify-between volunteer cursor-pointer" rmv="volunteer" icn="prj">
                <div class="flex" aria-labelledby="add-volunteer" role="dialog" aria-modal="true" wire:click="showAddVolunteer)">
                    <p>
                        <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                        {!! $volunteers->volunteer !!}
                    </p>
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="volunteer" wire:click="deleteVolunteer{{ $volunteers->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any volunteer</p>
            @endif

        </div>
    </div>
</div>

<script>

    Livewire.on('delete_volunteer', () => {
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
                Livewire.emit('deleteVolunteer')
                Swal.fire(
                    'Deleted!',
                    'Your volunteer has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".volunteer-action").hover(function(){
        $('.btn-volunteer').css("display", "inline-flex");
    }, function(){
        $('.btn-volunteer').css("display", "none");
    });
</script>


<style> 
    .volunteer-action ul {
        padding-left: 1em;
    }

    .volunteer-action ol {
        padding-left: 1em;
    }
    .volunteer-action li {
        list-style: none !important;
        list-style-position: outside;
        padding-left: 1em;
    }

    .volunteer-action li:before {
        content: "\f058"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        margin-left: -2em;
        /* margin-right: 15px; */
        padding: 5px;
        /* background-color: orange; */
    }
</style>


<div class="border bg-slate-100 shadow-sm rounded-lg border-b-slate-200 exp-main" add-btn="add-btn">
    <div class="p-0">
        @if (auth()->check())
        <div class="float-right">
            <i id="add-btn" class="fa fa-plus-circle fa-2xl cursor-pointer text-blue-400 hover:text-blue-800 p-3 relative hidden border rounded-md py-5 hover:shadow-sm" aria-labelledby="add-experience" role="dialog" aria-modal="true" wire:click="showAddExperience()"></i>
        </div>

        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$experience}} " wire:click="hideAddExperience()"></div>

        @include('livewire.experiences.add_experience')
        <h3 class="text-gray-800 px-5 py-3 bg-white hover:text-gray-900 tracking-tight cursor-pointer text-3xl font-bold dark:text-white font-mono">Work Experience {{$action}}</h3>
        <hr>
        <div class="w-full">
            @forelse ($experiences as $exp)
            <div class="bg-white px-5 experience hover:cursor-pointer mt-2" action-btn="actions{{$exp->id}}">
                <div class="">
                    <h1 class="text-3xl font-serif italic w-96 md:w-full">
                        <i class="fa fa-star text-gray-500"></i> {{$exp->title}} - {{ $exp->company }}
                        @auth ()
                        <i class="fa fa-edit fa-xs items-center cursor-pointer text-blue-400 hover:text-blue-800 p-1 relative actions{{$exp->id}} hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true" wire:click="showEditExperience({{ $exp->id }})"></i>
                        <i wire:click="$emit('delete_experience', {{$exp->id}})" class="fa fa-trash-alt fa-xs items-center cursor-pointer text-red-400 hover:text-red-800 p-1 relative actions{{$exp->id}} hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true" wire:click="showEditExperience({{ $exp->id }})"></i>
                        @endauth
                    </h1>
                </div>
                <a class="py-1 pl-10 text-lg w-96 md:w-full">{{ $exp->location }} {{ $exp->from }} - {{ $exp->to }}</a>
                <a class="py-1 pl-10 text-lg w-full"></a>

                <h2 class="pl-10 mb-2 text-lg font-semibold italic text-gray-900 dark:text-white w-full">Achievements:</h2>
                <div class="space-y-1 px-5 pb-3 list-inside text-gray-500 dark:text-gray-400 w-96 md:w-full">
                    {!! $exp->achievements !!}

                </div>
            </div>

            @empty
            <p>No any experience</p>
            @endforelse
        </div>
    </div>
</div>

<script>
    Livewire.on('delete_experience', expId => {
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
                Livewire.emit('deleteExperience', expId)
                Swal.fire(
                    'Deleted!',
                    'Your experience has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".experience").hover(function() {
        var id = $(this).attr('action-btn');
        $('.' + id).css("display", "inline-flex");
    }, function() {
        $('.' + $(this).attr('action-btn')).css("display", "none");
    });

    $(".exp-main").hover(function() {
        var id = $(this).attr('add-btn');
        $('#' + id).css("display", "inline-flex");
    }, function() {
        $('#' + $(this).attr('add-btn')).css("display", "none");
    });
</script>

<style>
    ul {
        padding-left: 2em;
    }

    ol {
        padding-left: 2em;
    }

    li {
        list-style: decimal;
        list-style-position: outside;
        padding-left: 1em;
    }
</style>
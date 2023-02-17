
<div class="border bg-slate-100 shadow-sm rounded-lg border-b-slate-200 education-main w-screen md:w-full" add-btn="education-btn">
    <div class="p-0">
        @if (auth()->check())
        <div class="float-right">
            <i id="education-btn" class="fa fa-plus-circle fa-2xl cursor-pointer text-blue-400 hover:text-blue-800 p-3 relative hidden border rounded-md py-5 hover:shadow-sm" aria-labelledby="add-education" role="dialog" aria-modal="true" wire:click="showAddEducation()"></i>
        </div>

        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$education}} " wire:click="hideAddEducation()"></div>

        @include('livewire.educations.add_education')
        <h3 class="text-gray-800 px-5 py-3 bg-white hover:text-gray-900 tracking-tight cursor-pointer text-3xl font-bold dark:text-white font-mono"><i class="fa fa-graduation-cap fa-sm text-gray-500"></i> <span>Education</span> </h3>
        <hr>
        <div class="w-full">
            @forelse ($educations as $edu)
            <div class="bg-white px-5 education hover:cursor-pointer mt-2" action-btn="actions{{$edu->id}}">
                <div class="">
                    <h1 class="font-serif italic w-96 md:w-full">
                        <i class="fa fa-book fa-md text-gray-500"></i><span class="italic text-2xl"> {{$edu->program}}</span>
                        @auth ()
                        <i class="fa fa-edit fa-xs hover:bg-slate-200 items-center cursor-pointer text-blue-400 hover:text-blue-800 px-2 relative actions{{$edu->id}} hidden border rounded-md shadow-sm hover:shadow-md py-3" aria-labelledby="add-education" role="dialog" aria-modal="true" wire:click="showEditEducation({{ $edu->id }})"></i>
                        <i wire:click="$emit('delete_education', {{$edu->id}})" class="fa fa-trash-alt fa-xs hover:bg-slate-200 items-center cursor-pointer text-red-400 hover:text-red-800 px-2 relative actions{{$edu->id}} hidden border rounded-md shadow-sm hover:shadow-md py-3" aria-labelledby="add-education" role="dialog" aria-modal="true" wire:click="showEditEducation({{ $edu->id }})"></i>
                        @endauth
                        <div class="py-1 pl-10 text-xl w-96 md:w-full font-bold">{{ $edu->institution }}</div>
                    </h1>
                </div>
                <a class="py-1 pl-10 text-lg w-96 md:w-full">{{ $edu->location }} {{ $edu->from }} - {{ $edu->to }}</a>
                <a class="py-1 pl-10 text-lg w-full"></a>

            </div>

            @empty
                <p class="p-3">No any record</p>
            @endforelse
        </div>
    </div>
</div>

<script>
    Livewire.on('delete_education', id => {
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
                Livewire.emit('deleteEducation', id)
                Swal.fire(
                    'Deleted!',
                    'Education record has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".education").hover(function() {
        var id = $(this).attr('action-btn');
        $('.' + id).css("display", "inline-flex");
    }, function() {
        $('.' + $(this).attr('action-btn')).css("display", "none");
    });

    $(".education-main").hover(function() {
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
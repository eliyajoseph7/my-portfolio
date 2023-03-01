<div class="border bg-white rounded-3xl mb-3 language-action w-screen md:w-full">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm language-btn" aria-labelledby="add-language" role="dialog" aria-modal="true" wire:click="showAddLanguage()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$language_flag}} " wire:click="hideAddLanguage()"></div>

        @include('livewire.languages.add-language')
        <h3 class="text-left px-5 py-3 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif"><i class="fa fa-language fa-sm text-gray-500"></i> Languages</h3>
        <hr>
        <div class="px-5 py-2">
            @forelse ($languages as $language)
            <div class="flex justify-between language cursor-pointer" rmv="language{{ $loop->iteration }}" icn="skl{{ $loop->iteration }}">
                @guest
                    <p aria-labelledby="add-language" role="dialog" aria-modal="true"><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $language->language }}</p>
                @endguest
                @auth
                    <p aria-labelledby="add-language" role="dialog" aria-modal="true" wire:click="showEditLanguage({{ $language->id }})"><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $language->language }}</p>
                    <a href="#" class="text-white hidden" id="language{{ $loop->iteration }}" wire:click="$emit('delete-language', {{$language->id}})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @empty
                <p>No any language</p>
            @endforelse

        </div>
    </div>
</div>


<script>
    $(".language").hover(function(){
        var id = $(this).attr('rmv');
        $('#' + id).css("display", "block");
        $('#' + $(this).attr('icn')).css("color", "#234B9F");
    }, function(){
        $('#' + $(this).attr('rmv')).css("display", "none");
        $('#' + $(this).attr('icn')).css("color", "black");
    });


    $(".language-action").hover(function(){
        $('.language-btn').css("display", "inline-flex");
    }, function(){
        $('.language-btn').css("display", "none");
    });

    Livewire.on('delete-language', languageId => {
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
                Livewire.emit('deleteLanguage', languageId)
                Swal.fire(
                    'Deleted!',
                    'Your language has been deleted.',
                    'success'
                )
            }
        });
    })
</script>
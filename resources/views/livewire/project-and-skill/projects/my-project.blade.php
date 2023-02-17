<div class="w-screen md:w-full">
    <div class="border bg-white rounded-lg mb-5 project-action">
        <div class="p-0">
            @if (auth()->check())
                <div class="float-right">
                    <i wire:click="$emit('delete_project')" class="fa fa-trash-alt fa-lg items-center cursor-pointer text-red-400 hover:text-red-800 p-2 relative  action-btn hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true"></i>
                    <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm action-btn" aria-labelledby="add-project" role="dialog" aria-modal="true" wire:click="showAddProject()"></i>
                </div>
            @endif
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$project_flag}} " wire:click="hideAddProject()"></div>

            @include('livewire.project-and-skill.projects.add_project')
            
            <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
                <i class="fa fa-project-diagram fa-sm text-gray-500"></i> Personal Projects
            </h3>
            <hr>
            <div class="px-5 py-2">
                @if ($projects)
                <div class="flex justify-between project cursor-pointer" rmv="project" icn="prj">
                    <div class="flex" aria-labelledby="add-project" role="dialog" aria-modal="true" wire:click="showAddProject()">
                        <p>
                            <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                            {!! $projects->project !!}
                        </p>
                    </div>
                    @auth
                        <a href="#" class="text-white hidden" id="project" wire:click="deleteProject({{ $projects->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                    @endauth
                </div>
                @else
                    <p>No any project</p>
                @endif

            </div>
        </div>
    </div>
</div>


<script>

    Livewire.on('delete_project', () => {
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
                Livewire.emit('deleteProject')
                Swal.fire(
                    'Deleted!',
                    'Your project has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".project-action").hover(function(){
        $('.action-btn').css("display", "inline-flex");
    }, function(){
        $('.action-btn').css("display", "none");
    });


    // tinymce.init({
    //     selector: '#project',
    //     height: 200,
    //     plugins: 'anchor autolink charmap emoticons link searchreplace wordcount',
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    // });
    // // Prevent Bootstrap dialog from blocking focusin
    // document.addEventListener('focusin', (e) => {
    //     if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    //         e.stopImmediatePropagation();
    //     }
    // });

    // window.addEventListener('project-saved', function() {
    //     tinymceActive=true;
    //     while (tinymceActive) {
    //         tinymceActive = (typeof tinyMCE != 'undefined') && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
    //         if (tinymceActive) {
    //             id=tinyMCE.activeEditor.id;
    //             tinyMCE.activeEditor.remove();
    //         }
    //     }
    //     tinymce.init({
    //     selector: '#project',
    //         plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    //         toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    //     });
    //     // Prevent Bootstrap dialog from blocking focusin
    //     document.addEventListener('focusin', (e) => {
    //         if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
    //             e.stopImmediatePropagation();
    //         }
    //     });

    // });

</script>

<style> 
    .project-action ul {
        padding-left: 1em;
    }

    .project-action ol {
        padding-left: 1em;
    }
    .project-action li {
        list-style: none !important;
        list-style-position: outside;
        padding-left: 1em;
    }

    .project-action li:before {
        content: "\f058"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        margin-left: -2em;
        /* margin-right: 15px; */
        padding: 10px;
        /* background-color: orange; */
    }
</style>

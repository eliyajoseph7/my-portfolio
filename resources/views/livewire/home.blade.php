<div class="container mx-auto w-sc">
    <div class="grid grid-flow-row lg:grid-flow-col lg:grid-cols-4 lg:gap-3 auto-cols-max md:auto-cols-auto py-5">
        <div class="lg:col-span-3">
            <div class="border bg-white shadow-sm rounded-lg mb-5 border-t-slate-300">
                <div class="p-0">
                    @include('layouts.frontend.components.header')
                </div>
                @livewire('summary.professional-summary')
            </div>
            @livewire('experiences.experience')
            
        </div>
        <div class="lg:colspan-1 mt-5 lg:mt-0">
            @livewire('project-and-skill.my-skill')
            @livewire('project-and-skill.my-project')
            
        </div>
    </div>
</div>


<script>
    Livewire.on('feedback', message => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: message
        });
        // setInterval($('#closeModal').click(), 10000)
        // ;
        // $('#save-summary').click();
        
    });

    Livewire.on('error', message => {
        Swal.fire({
            icon: 'error',
            title: message
        });
        
    });


    Livewire.on('tinymce-trigger-save', () => {
        tinyMCE.triggerSave();
    });
    window.addEventListener('openjobsaved', function() {
        tinymceActive=true;
        while (tinymceActive) {
            tinymceActive = (typeof tinyMCE != 'undefined') && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
            if (tinymceActive) {
                id=tinyMCE.activeEditor.id;
                tinyMCE.activeEditor.remove();
            }
        }
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
        // Prevent Bootstrap dialog from blocking focusin
        document.addEventListener('focusin', (e) => {
            if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                e.stopImmediatePropagation();
            }
        });

    });
</script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>Portfolio</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            /* font-family: 'Nunito', sans-serif; */
            background-color: #F3F2EF;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/9kwmev7of6r1gwfblgyke70ptjc8153as3hzygkrfa2kc91n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ url('assets/flowbite/dist/datepicker.js') }}"></script>
    <script src="{{ url('assets/flowbite/dist/flowbite.js') }}"></script>
    <!-- <script src="{{ url('assets/flowbite/dist/flowbite.css') }}"></script> -->
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased h-full">
    @include('layouts.frontend.components.nav')

    @livewire('home')
    @include('layouts.frontend.components.footer')
    @livewireScripts

    <script>
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

    </script>
</body>

</html>
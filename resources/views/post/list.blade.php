@extends('layouts.layout')

@section('title', 'home')

@include('layouts._partials.navbar')

@section('content')


<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="w-11/12  m-auto mt-2">
    @csrf
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
        <div class="flex px-4 py-2 bg-white rounded-t-lg">
            <img src="#" style="display:none;" class="h-auto w-28 rounded-lg mr-2" alt="" id="previewImage">
            <textarea class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-0" name="content" id="content"  required placeholder="Write a comment..." rows="4"></textarea>
        </div>
        
        <div class="flex items-center justify-between px-3 py-2 border-t">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                Post comment
            </button>
            <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                <label for="id_image" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                </svg>
                <div style="display:none;">
                    <input id="id_image" name="image" type="file">
                </div>
                </label>
            </div>
        </div>
    </div>
</form>


@include('layouts._partials.posts')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        //Muestra la vista previa de la imagen al seleccionar un archivo
        $("#id_image").change(function() {
        readURL(this);
        })
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()

            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result).show()
            }

            reader.readAsDataURL(input.files[0])
        }
    }
</script>



@endsection
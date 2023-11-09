<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="group relative">
            <label class="block mt-4">
                <span
                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                    Foto DNI Anverso
                </span>
                <input type="file" name="frontDniPhoto"
                    class="block w-full
                    text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-ms
                    file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 " />
            </label>
        </div>
        <br>
        <br>
        <button type="submit">click</button>
    </form>
</body>

</html>

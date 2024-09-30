<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZeroCorp</title>
    @vite('resources/css/app.css')
</head>
<body>
    <table class="table-auto border-collapse w-full text-sm bg-slate-800 mt-5">
        <thead>
            <tr>
                <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-slate-200 text-left">ID</th>
                <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-slate-200 text-left">Name</th>
                <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-slate-200 text-left">Price</th>
                <th class="border-slate-600 font-medium p-4 pl-8 pt-3 pb-3 text-slate-200 text-left">Status</th>
            </tr>
        </thead>
        @foreach ($products as $prod)
            <tr>
                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{$prod->id}}</td>
                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{$prod->name}}</td>
                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{number_format($prod->price, 2, ',', '.')}}</td>
                <td class="border-b border-slate-700 p-4 pl-8 text-slate-400">{{$prod->status}}</td>
            </tr>
        @endforeach 
    </table>
</body>
</html>
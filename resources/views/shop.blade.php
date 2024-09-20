
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col h-screen bg-white">
    <div class="border-b border-slate-200">
        <div class="container mx-auto">
            <div class="flex justify-between py-4">
                <div>Ma boutique</div>
                <livewire:cart />
            </div>
        </div>
    </div>
    <div class="py-4 overflow-y-scroll grow bg-slate-100">
        <div class="container mx-auto">
            <livewire:products-list />
        </div>
    </div>
</body>
</html>

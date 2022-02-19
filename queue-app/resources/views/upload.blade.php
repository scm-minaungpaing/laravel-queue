<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Queue Test</title>
</head>
<body>
    <h1>Test for queue</h1>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="file" name="mycsv" id="mycsv">
        <input type="submit" value="Upload">
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>
    <body class="antialiased">
    <form method="POST" action="{{ route('customer.store')}}">
        @csrf
       <div class="col-md-6 m-auto mt-5">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Customer Name</label>
            <input name="customer_name" type="text" class="form-control">
            @error('customer_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Customer Phone</label>
            <input name="customer_phone" type="text" class="form-control" id="formGroupExampleInput2" >
            @error('customer_phone')
            <span class="text-danger">{{ $message}}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Customer Address</label>
            <input name="customer_address" type="text" class="form-control" id="formGroupExampleInput2">
          </div>
          <div>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
       </div>

    </form>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>


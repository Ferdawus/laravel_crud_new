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
        <div class="col-md-10">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Phone</th>
                    <th scope="col">Customer Adrress</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($customers as $customer)
                  <tr>

                    <td>{{ $customer->customer_name}}</td>
                    <td>{{ $customer->customer_phone }}</td>
                    <td>{{ $customer->customer_address}}</td>
                    <td class="d-flex">
                        <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-info">Edit</a>
                        <form method="POST" action="{{route('customer.destroy',$customer->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ms-2" type="submit">Delete</button>
                        </form>

                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>


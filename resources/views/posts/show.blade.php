<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card my-2">
        <div class="card-header">
          Post info
        </div>
        <div class="card-body">
          <h6 class="card-title">Title: special title</h6>
          <h4 class="card-title">Description: </h4>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    <div class="card">
        <div class="card-header">
          Post Creator info
        </div>
        <div class="card-body">
          <h5 class="card-title ">Name: {{$post['posted_by']}}</h5>
          <h5 class="card-title ">Title: {{$post['title']}}</h5>
          <h5 class="card-title">Created at: {{$post['created_at']}}</h5>
          
        </div>
      </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>


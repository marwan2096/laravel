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
    <style>
        *{
          
        }
    </style>
   <form method="POST" 
    @csrf
    
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" value="{{$post['title']}}" id="title">
      </div>
      <div class="form-floating mb-3">
        <p class="form-label">Description</p>
        <textarea class="form-control" id="desc" style="height: 100px">{{$post['description']}}"</textarea>
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Post Creator</label>
        <input type="text" value="{{$post['posted_by']}}" class="form-control" id="creator">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>

    </form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>লারাভেল প্রজেক্ট</title>
  </head>
  <body>
    <div class="container mt-10">
        <div class="row">
            <div class="col-sm-12">
            <a href="{{ url('show-data')}}" class="btn btn-success my-3">হোম</a>
              <a href="{{ url('add-data')}}" class="btn btn-success my-3">ডাটা যুক্ত করুন</a>
              
            <form action="{{ url('/store-edit-data/'. $post->id)}}" method="post">
              @csrf
                <div class="form-group">
                <label for="title">টাইটেল</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter Your Name">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
          
              <div class="form-group mt-3">
                  <label for="description">বিস্তারিত</label>
                  <textarea name="description" class="form-control" cols="30" rows="6">{{ $post->title }}</textarea>
                  @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                
              </div>
              <div class="form-group mt-3">
                  <input type="submit" class="btn btn-primary" value="ডাটা আপডেট করুন">
                
                
              </div>
            
           </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
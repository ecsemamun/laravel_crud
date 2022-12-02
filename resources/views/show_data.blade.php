<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>লারাভেল প্রজেক্ট</title>
  </head>
  <body>
    <div class="container mt-10">
        <div class="row">
            <div class="col-sm-12">
              <a href="{{ url('add-data')}}" class="btn btn-success my-3">ডাটা যুক্ত করুন</a>
            <table class="table table-bordered">
  <thead>
    <tr>
    
      <th scope="col">#</th>
      <th scope="col">টাইটেল</th>
      <th scope="col">স্ট্যাটাস</th>
      <th scope="col">বিস্তারিত</th>
      <th scope="col">যুক্ত টাইম</th>
      <th scope="col">এ্যাকসন</th>
      <th scope="col">চেকবক্স</th>

    </tr>
  </thead>
  <tbody>
   
    @foreach($posts as $key=>$post)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ Str::limit($post->title,25) }}</td>
        <td>
          @if($post->status==1)
          <a href="{{ url('change-status/'.$post->id) }}" onclick="return confirm('আপনি কি সিউর ডিএ্যাক্টিভ করতে চাচ্ছেন?')" class="btn btn-sm btn-success" title="ডিএ্যাক্টিভ করতে ক্লিক করুন">এ্যাক্টিভ</a>
          @else
          <a href="{{ url('change-status/'.$post->id) }}" onclick="return confirm('আপনি কি সিউর এ্যাক্টিভ করতে চাচ্ছেন?')"  class="btn btn-sm btn-danger" title="এ্যাক্টিভ করতে ক্লিক করুন">ডিএ্যাক্টিভ</a>
          @endif
        </td>
        
        <td>{{ Str::limit($post->description,60) }}</td>
        <td>{{ $post->created_at->toDayDateTimeString()}} </td>
        <td>
          <a href="{{ url('edit-data/'.$post->id)}}" class="btn btn-sm btn-success" title="এডিট করতে ক্লিক করুন">এডিট</a>
          <a href="{{ url('delete-data/'.$post->id)}}" onclick="return confirm('আপনি কি সিউর ডিলিট করতে চাচ্ছেন?')" class="btn btn-sm btn-danger" title="ডিলিট করতে ক্লিক করুন">ডিলিট</a>
        </td>
        <td>
          <input type="checkbox" value="checked" style="top-right">
     </td>

       
    </tr>

    @endforeach

  </tbody>
</table>
    {{ $posts->links() }}

            </div>
        </div>
          {{-- Soft Delete --}}

          <div class="row my-5">
            <div class="col-sm-12">
              <a href="{{ url('add-data')}}" class="btn btn-success my-3">রিসাইকেল বিন</a>
            <table class="table table-bordered">
  <thead>
    <tr>
    
      <th scope="col">#</th>
      <th scope="col">টাইটেল</th>
      <th scope="col">স্ট্যাটাস</th>
      <th scope="col">বিস্তারিত</th>
      <th scope="col">যুক্ত টাইম</th>
      <th scope="col">এ্যাকসন</th>
   

    </tr>
  </thead>
  <tbody>
   
    @foreach($trashPosts as $key=>$post)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ Str::limit($post->title,25) }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ Str::limit($post->description,60) }}</td>
        <td>{{ $post->created_at->toDayDateTimeString()}} </td>
        <td>
          <a href="{{ url('restore-data/'.$post->id)}}" class="btn btn-sm btn-success">রিস্টোর</a>
          <a href="{{ url('permanent-delete-data/'.$post->id)}}" onclick="return confirm('আপনি কি সিউর ডিলিট করতে চাচ্ছেন?')" class="btn btn-sm btn-danger">ডিলিট</a>
        </td>
       
        <td>
          <input type="checkbox" value="checked" style="top-right">
     </td>
       
    </tr>

    @endforeach

  </tbody>
</table>
   

            </div>
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}
    
  </body>
</html>
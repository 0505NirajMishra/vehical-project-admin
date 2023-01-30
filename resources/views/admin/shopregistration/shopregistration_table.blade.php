<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5 ">  

  <thead>
    <tr>
      <th scope="col">ID No.</th>
      <th scope="col">com name</th>
      <th scope="col">gst no</th>
      <th scope="col">o name</th>
      <th scope="col">address</th>
      <th scope="col">mobile</th>
      <th scope="col">year of exp</th>
      <th scope="col">about you</th>
      <th scope="col">work pla photo</th>
      <th scope="col">profile image</th>
      <th scope="col">location</th>
      <th scope="col">longitude</th>
      <th scope="col">latitude</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  
  <tbody>
        
  @foreach($shop as $user)
  
  <tr>

    <td>{{ $user->shop_id }}</td>
    <td>{{ $user->company_name }}</td>
    <td>{{ $user->gst_no }}</td>
    <td>{{ $user->owner_name }}</td>
    <td>{{ $user->address }}</td>
    <td>{{ $user->mobile }}</td>
    <td>{{ $user->year_of_exper }}</td>
    <td>{{ $user->about_you }}</td>
    <td><img src="{{ url('/') }}/vehicalcategory/image/{{$user->work_place_photo}}" style="width:50px; height:50px;" /></td>
    <td><img src="{{ url('/') }}/vehicalcategory/image/{{$user->profile_image}}" style="width:50px; height:50px;" /></td>
    <td>{{ $user->location }}</td>
    <td>{{ $user->longitude }}</td>
    <td>{{ $user->latitude }}</td>
       
    <td>
        <a href="{{ url('/') }}/admin/shopregistrations/{{$user->shop_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/shopregistrations/destroy/{{$user->shop_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
  </tbody>

</table>
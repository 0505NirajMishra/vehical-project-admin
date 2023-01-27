<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>vehical type</th>
    <th>tube tyre</th>
    <th>tyre size</th>
    <th>vehical registration no</th>
    <th>tyresize image</th>
    <th>location</th>
    <th>longitute</th>
    <th>latitute</th>
    <th>description</th>
    <th>ACTION</th>
  </tr>

  @foreach($flattyre as $user)
  
  <tr>
    <td>{{$user->flattyre_id}}</td>
    <td>{{$user->vehical_type}}</td>
    <td>{{$user->tube_tyre}}</td>
    <td>{{$user->tyre_width}}/{{$user->tyre_wheel_size}}/{{$user->tyre_speed_rating}}</td>
    <td> 
      <img src="{{ url('/') }}/vehicalcategory/image/{{$user->tyresize_image}}" 
       style="width:50px; height:50px;" />
    </td>
    <td>{{$user->vehical_registration_no}}</td>
    <td>{{$user->location}}</td>
    <td>{{$user->longitude}}</td>
    <td>{{$user->latitude}}</td>
    <td>{{$user->description}}</td>
    <td>
        <a href="{{ url('/') }}/admin/flattyres/{{$user->flattyre_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/flattyres/destroy/{{$user->flattyre_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
  </tr>
  @endforeach
</table>
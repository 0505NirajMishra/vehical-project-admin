<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Vehical Type</th>
    <th>Description</th>
    <th>Vehical Photo</th>
    <th>Vehical Registration no</th>
    <th>Service Location</th>
    <th>Service Longitude</th>
    <th>Service Latitude</th>
    <th>Pickup and drop address</th>
    <th>ACTION</th>
  </tr>

  @foreach($towing as $user)
  <tr>
    <td>{{$user->towing_id}}</td>
    <td>{{$user->vehical_type}}</td>
    <td>{{$user->description}}</td>
    <td> <img src="{{ url('/') }}/vehical/image/{{$user->vehical_photo }}" style="width:50px; height:50px;" /> </td>
    <td>{{$user->vehical_registration_no}}</td>
    <td>{{$user->service_location}}</td>
    <td>{{$user->service_longitude}}</td>
    <td>{{$user->service_latitude}}</td>
    <td>{{$user->picanddroaddress}}</td>
    <td>
        <a href="{{ url('/') }}/admin/towings/{{$user->towing_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/towings/destroy/{{$user->towing_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
</table>  
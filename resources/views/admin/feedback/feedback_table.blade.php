<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Description</th>
    <th>Booking DateTime</th>
    <th>Service Type</th>
    <th>Service Status</th>
    <th>Vehical Type</th>
    <th>Tyre Type</th>
    <th>Cust Detail</th>
    <th>Shop Detail</th>
    <th>Calling Status</th>
    <th>ACTION</th>
  </tr>

  @foreach($feedback as $user)
  
  <tr>

    <td>{{$user->feedback_id}}</td>
    <td>{{$user->description}}</td>
    <td>{{$user->booking_date_time}}</td>
    <td>{{$user->service_name}}</td>
    <td>{{$user->service_status}}</td>
    <td>{{$user->vehical_type}}</td>
    <td>{{$user->tyre_type}}</td>
    <td>{{$user->cust_detail}}</td>
    <td>{{$user->shop_detail}}</td>
    <td>{{$user->calling_status}}</td>
  
    <td>
        <a href="{{ url('/') }}/admin/feedbacks/{{$user->feedback_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/feedbacks/destroy/{{$user->feedback_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
</table>  
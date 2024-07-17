@extends('app')

@section('styles')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  


@endsection

@section('content')

<div class="row">

    <a href="/">&laquo;Back</a>

    <h1 class="mt-4 mb-5">Database</h1>

    <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">DOB</th>
            <th scope="col">Headache Frequency</th>
            <th scope="col">Headache Daily Frequency</th>
            <th scope="col">Result</th>

          </tr>
        </thead>
        <tbody>

            @if($count>0)

            @foreach($data as $dat)
            <tr>
              <th scope="row">{{$dat->id}}</th>
              <td>{{$dat->firstname}}</td>
              <td>{{$dat->dob}}</td>
              <td>{{$dat->frequency}}</td>
              <td>{{$dat->daily_frequency??'NA'}}</td>
              <td>{{$dat->result??'NA'}}</td>
            </tr>
            @endforeach

            @else

            <tr>
                <td colspan="6" class="text-center">there is no data</td>
            </tr>
            

            @endif

          
          
        </tbody>
      </table>


</div>





@endsection


@section('scripts')

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>



@endsection
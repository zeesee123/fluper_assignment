@extends('app')

@section('content')

<div class="mt-5">
    <a href="/view_table">View table</a>
</div>


<div class="row">

    @if(session('success'))

    <div class="alert alert-success">
        {{session('success')}}
    </div>

    @endif

    @if(session('error'))

    <div class="alert alert-danger">
        {{session('error')}}
    </div>

    @endif

    <h1 class="mt-5 mb-5">Form page</h1>

    <form action="/save_val" method="POST">

        @csrf
    
        <div class="mb-3">
            <input type="text" placeholder="first name" name="firstname" class="form-control">
        </div>
        <div class="mb-3">
            <input type="date" placeholder="date of birth" name="dob" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Frequency of migraine headache</label>
            <select name="frequency" id="freq" class="form-control">
                <option value="Monthly">Monthly</option>
                <option value="Weekly">Weekly</option>
                <option value="Daily">Daily</option>
            </select>
        </div>
        <div class="mb-3 d-none" id="daily_freq">
            <label for="" class="form-label">Daily frequency of migraine headache</label>
            <select name="daily_frequency" id="daily_val" class="form-control">
              <option value="">None</option>
              <option value="1-2">1-2</option>
              <option value="3-4">3-4</option>
              <option value="5+">5+</option>
            </select>
        </div>

        <button class="btn btn-primary">SUBMIT</button>
    </form>

</div>



@endsection


@section('scripts')

<script>

    // console.log('this is my script');

    let freq=document.querySelector('#freq');
    let daily_freq=document.querySelector('#daily_freq');
    let daily_val=document.querySelector('#daily_val');

    freq.addEventListener('change',()=>{

        console.log('da element',daily_val);

        // console.log('val changed');

        

        if(freq.value=='Daily'){

            daily_freq.classList.toggle('d-none');
        }else{

            if(daily_freq.classList.contains('d-none')){

                console.log('good');
            }else{

                daily_val.value='';
                daily_freq.classList.add('d-none');
                
            }
        }
    })
</script>

@endsection
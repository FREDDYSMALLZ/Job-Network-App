@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <search-component>

            </search-component>
        </div>
<br>
<br>
        <h1>Most Recent Jobs</h1>
        <table class="table">
            <tbody>
                @foreach($jobs as $job)
                <tr>
            <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80" alt=""></td>
                    <td>{{$job->position}}
                        <br>
                        <i aria-hidden="true" class="fa fa-clock-o"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->address}}</td>
                    <td><i aria-hidden="true" class="fa fa-globe"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm"> Apply for this Job Position </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
      <a href="{{route('alljobs')}}"> <button class="btn btn-primary btn-lg" style="width: 100%;">Browse all jobs</button></a>
    </div>
    <br><br>
    <h1> These are the Current Featured Companies</h1>

</div>

<div class="container">
<div class="row">

@foreach($companies as $company)
<div class="col-md-3">
    <    class="card" style="width: 18rem;">
        @if($company->logo)
            <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="60%" alt="">
            @else
            <img src="{{asset('uploads/logo/t_beats-electronics.jpg')}}" width="60%" alt="">
        @endif
      <div class="card-body">
        <h5 class="card-title">{{$company->cname}}</h5>
        <p class="card-text">{{str_limit($company->description,20)}}</p>
       <center> <a href="{{route('company.index',[$company->id,$company->slug])}}
                   " class="btn btn-outline-primary ">Visit the Company Site Here </a></center>
      </div>
    </div>
</div>
@endforeach

</div>
@endsection
<style>
.fa{
    color: #3f98d4;
}
</style>

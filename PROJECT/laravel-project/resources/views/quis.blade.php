@extends('templates.layouts')


@section('content')

<style>
    .text{
        color:green;
    }
    .center { text-align: center;}

    #quis2_ {
        justify-content: center;
        align-items: center;
    }

</style>

<div id="quis2" class="container mt-5 center" >
    <img src="{{ url('./assets/media/icons/icon-ibik.png') }}" width="200" height="200" />
    <h1 class="text">
        The 10 Most Popular Programming Languages to Learn in 2022
    </h1>
    <p>There’s no question that software programming is a hot career right now. The <span style="color: red">US Bureau of
            Labor Statistics projects 21 percent</span> growth for programming jobs from 2018 to 2028, which is more
        than four times the average for all occupations. What’s more, the median annual pay for a software programmer is
        about $106,000, which nearly three times the median pay for all U.S. workers.</p>
    <h3 class="text">Top 10 Most Popular Programming Languages</h3>
    <ol>
        <li>
            <p>Python</p>
            <p>Average annual salary: $120.000</p>
        </li>

    </ol>
    <p>Titik leleh <sup>o</sup> C </p>
    <p>Jari-jari X<sup>2-</sup>  (nm) </p>

</div>
@endsection

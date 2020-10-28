@extends('layouts.main')

@section('content')

    <main id="main">

        <!--==========================
          Show Section
        ============================-->
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">PDF FILE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pdfs as $pdf)
            <tr>
                <th scope="row">{{$pdf->id}}</th>
                <td> <a href="uploads/{{$pdf->name}}" target="_blank"><img src="img/pdf_icon.jpg" alt="pdf"></a></td>

            </tr>
            @endforeach
            </tbody>
        </table><!-- #Show -->

    </main>

@endsection

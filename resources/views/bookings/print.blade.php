@extends('layouts.master')

@section('content')
<div class="mini-spacer bg-light" style="min-height: 1000px;">
<div class="container">
    <div class="row">
      <div class="col-md-2 no-print"></div>
        <div class="col-md-8 ">
            <div class="card card-shadow">
               
                <div class="card-body text-dark font-16">
                      <hr>
                      <h5 class="text-center m-b-20 font-bold">TAX INVOICE</h5>
                      <hr>
                      <div class="pull-right text-right">
                      <h5 class="panel-heading">
                     <span class="font-bold">HASSLEFREE LUGGAGE PRIVATE LIMITED</span>
                      </h5>
                      <p class="m-b-0">F4/16, KRISHNA MAGAR<br>NEW DELHI-110051<br><b>GSTIN No. : </b>  07AAECH3866L1Z6</p>
                     </div>

                     <div class="pull-left">
                       <h5 class="panel-heading">
                     <span class="font-bold">INVOICE #{{ $booking->id }}</span>
                      </h5>
                      <p class="m-b-0">To {{ $booking->user->name }}<br><b>Date : </b>  {{ $booking->created_at->format('d-m-Y') }}</p>
                      </div>

                      <div class="clearfix"></div>
                     <hr>

                     @if($booking->special != null)

                        <p><b>Special Comments : </b> {{ $booking->special }}</p>

                    @endif


                     <div class="table-responsive">
                       <table class="table table-striped table-bordered">
                         <tbody>
                           <tr>
                             <td>No. of Bags</td>
                             <td class="text-right">{{ $booking->bags_count }}</td>
                           </tr>
                           <tr>
                             <td>Distance </td>
                             <td class="text-right">{{ $distance }}</td>
                           </tr>
                           <tr>
                             <td>Base Price</td>
                             <td class="text-right">&#8377 {{ ($distance * 10) }}</td>
                           </tr>
                           <tr>
                             <td>Insuarance</td>
                             <td class="text-right">&#8377 {{ ($booking->bags_count * 12) }}</td>
                           </tr>
                           <tr>
                             <td>Handling Charges</td>
                             <td class="text-right">&#8377 {{ ($booking->bags_count * 10) }}</td>
                           </tr>
                           <tr>
                             <td>Security Labelling</td>
                             <td class="text-right">
                              &#8377 {{ ($booking->bags_count * 7) }}
                             </td>
                           </tr>

                            <tr>
                             <td>Taxable Amount</td>
                             <td class="text-right font-bold">&#8377 {{ $basePrice  }}</td>
                           </tr>

                           <tr>
                             <td>CGST 9%</td>
                             <td class="text-right">&#8377 {{ $cgst  }}</td>
                           </tr>

                           <tr>
                             <td>SGST 9%</td>
                             <td class="text-right">&#8377 {{ $sgst  }}</td>
                           </tr>

                         </tbody>
                       </table>
                     </div>
                   

                    <hr>

                    <h3 class="pull-right"><b>Total : <span class="text-dark">&#8377 {{ round($booking->price, 2) }}</span></b></h3>

                    <div class="clearfix"></div>
                     <hr>

                    

                </div>
            </div>
        </div>

        
    </div>
</div>
</div>
@endsection


@section('js')
<script type="text/javascript">
<!--
window.print();
//-->
</script>

@endsection

@extends('layouts.master')

@section('content')

<div class="bg-light mini-spacer" style="min-height: 1000px;padding-top: 90px;">
    <div class="container">

        <div class="row">
            <div class="col-md-12 ">
                <form class="registration-form text-dark font-medium" method="POST" action="/notifications/send">
                    {{ csrf_field() }}

                    <div class="card card-shadow">
                            <div class="card-body">

                                <h3 class="panel-heading">Send Push Notification</h3>
                                <hr>

                                <div class="form-group">
                                    <label>Notification Message</label>
                                    <textarea name="message" rows="3" class="form-control"></textarea>
                                </div>

                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

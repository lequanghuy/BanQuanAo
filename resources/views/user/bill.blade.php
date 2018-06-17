@extends('master')
@section('content')
    <div class="container">

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Customer section</h3>
                </div>

                <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                        </li>
                        <li>
                            <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                        </li>
                        <li>
                            <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->
        </div>

        <div class="col-md-9" id="customer-orders">
            <div class="box">
                <h1>My orders</h1>

                <p class="lead">Your orders on one place.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>22/06/2013</td>
                            <td>$ 150.00</td>
                            </td>
                            <td><a href="customer-order.html" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
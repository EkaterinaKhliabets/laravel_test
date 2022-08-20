<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bordash - Admin Dashboard Template</title>
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!--  <link rel="stylesheet" href="/css/front.css"> -->

    <link rel="stylesheet" href="/css/front_ecommerce.css" type="text/css"><!-- Slick.js styles -->
    <link rel="stylesheet" href="/css/front.css">

</head>
<body>

<main>



    <div class="container-fluid pb-3">



        <header class="py-3 mb-3 border-bottom">
            <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
                <div class="dropdown">
                    <a href="#"
                       class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle"
                       id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
                        <li><a class="dropdown-item active" href="#" aria-current="page">Overview</a></li>
                        <li><a class="dropdown-item" href="#">Inventory</a></li>
                        <li><a class="dropdown-item" href="#">Customers 2</a></li>
                        <li><a class="dropdown-item" href="#">Products</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Reports</a></li>
                        <li><a class="dropdown-item" href="#">Analytics</a></li>
                        <li><a class="dropdown-item" href="{{route('organization.index')}}">Организация</a></li>
                        <li><a class="dropdown-item" href="{{route('banks.index')}}">Банки</a></li>
                        <li><a class="dropdown-item" href="{{route('bankAccounts.index')}}">Банковские счета</a></li>
                        <li><a class="dropdown-item" href="{{route('currencies.index')}}">Валюты</a></li>
                        <li><a class="dropdown-item" href="{{route('users.index')}}">Сотрудники</a></li>
                        <li><a class="dropdown-item" href="{{route('clients.index')}}">Клиенты</a></li>
                        <li><a class="dropdown-item" href="{{route('contact_faces.index')}}">Контактные лица</a></li>

                    </ul>
                </div>

                <div class="d-flex align-items-center">
                    <form class="w-100 me-3">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                 class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">
            <div class="bg-light border rounded-3">
                @include('_sidebar')
            </div>
            <div class="bg-light border rounded-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"><h6 class="card-title">Number of
                                                    Orders</h6>
                                                <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a>
                                                    <div class="dropdown"><a href="#" data-toggle="dropdown"
                                                                             aria-haspopup="true" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v" aria-hidden="true"></i></a><span
                                                            class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                         class="dropdown-item">Report</a><a
                                                                href="#" class="dropdown-item">Download</a><a href="#"
                                                                                                              class="dropdown-item">Close</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="number-of-orders"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between"><h6 class="card-title">Recent Orders</h6>
                                        <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a>
                                            <div class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                                     aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                                              aria-hidden="true"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                  class="dropdown-item">Report</a><a
                                                        href="#" class="dropdown-item">Download</a><a href="#"
                                                                                                      class="dropdown-item">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-left">Order ID</th>
                                                        <th>Product</th>
                                                        <th>Customer</th>
                                                        <th>Country</th>
                                                        <th>Date</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="#">#3132</a></td>
                                                        <td><a href="#">Apple iPhone XR 256GB red</a></td>
                                                        <td><a href="#">Nick Stone</a></td>
                                                        <td><img title="Italy" width="30"
                                                                 src="assets/media/image/flags/011-italy.png" alt="..."></td>
                                                        <td>20 March 2019</td>
                                                        <td>$340.00</td>
                                                        <td><span class="badge badge-success">Success</span></td>
                                                        <td class="text-right">
                                                            <div class="dropdown"><a href="#" data-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                                  class="dropdown-item">Detail</a><a
                                                                        href="#" class="dropdown-item text-danger">Remove</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#5211</a></td>
                                                        <td><a href="#">ASUS Asus ROG Phone 8/128GB blue</a></td>
                                                        <td><a href="#">Milano Esco</a></td>
                                                        <td><img title="Kazakhstan" width="30"
                                                                 src="assets/media/image/flags/034-kazakhstan.png" alt="...">
                                                        </td>
                                                        <td>22 March 2019</td>
                                                        <td>$580.00</td>
                                                        <td><span class="badge badge-success">Success</span></td>
                                                        <td class="text-right">
                                                            <div class="dropdown"><a href="#" data-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                                  class="dropdown-item">Detail</a><a
                                                                        href="#" class="dropdown-item text-danger">Remove</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#1032</a></td>
                                                        <td><a href="#">Samsung Galaxy A30 3/32GB blue</a></td>
                                                        <td><a href="#">Wiltor Noice</a></td>
                                                        <td><img title="Ethiopia" width="30"
                                                                 src="assets/media/image/flags/001-ethiopia.png" alt="..."></td>
                                                        <td>10 May 2019</td>
                                                        <td>$150.00</td>
                                                        <td><span class="badge badge-success">Success</span></td>
                                                        <td class="text-right">
                                                            <div class="dropdown"><a href="#" data-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                                  class="dropdown-item">Detail</a><a
                                                                        href="#" class="dropdown-item text-danger">Remove</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#">#8320</a></td>
                                                        <td><a href="#">Samsung Galaxy Note9 6/128GB</a></td>
                                                        <td><a href="#">Anna Strong</a></td>
                                                        <td><img title="United Kingdom" width="30"
                                                                 src="assets/media/image/flags/262-united-kingdom.png"
                                                                 alt="..."></td>
                                                        <td>02 May 2019</td>
                                                        <td>$19.00</td>
                                                        <td><span class="badge badge-danger">Cancel</span></td>
                                                        <td class="text-right">
                                                            <div class="dropdown"><a href="#" data-toggle="dropdown"><i
                                                                        class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                                  class="dropdown-item">Detail</a><a
                                                                        href="#" class="dropdown-item text-danger">Remove</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"><h6 class="card-title mb-0">Top
                                                    Sales</h6><a href="#">All Sales</a></div>
                                        </div>
                                        <table class="table table-striped">
                                            <tr>
                                                <td><a href="#">Apple iPhone XR 256GB red</a></td>
                                                <td>21</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Samsung Galaxy A30 3/32GB blue</a></td>
                                                <td>52</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Samsung Galaxy Note9 6/128GB</a></td>
                                                <td>74</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Apple iPhone XR 256GB red</a></td>
                                                <td>25</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Samsung Galaxy A30 3/32GB blue</a></td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Apple iPhone XS Max 256GB gold</a></td>
                                                <td>52</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">ASUS Asus ROG Phone 8/128GB blue</a></td>
                                                <td>29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Apple iPhone XR 256GB Green</a></td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Samsung Galaxy Note9 6/128GB</a></td>
                                                <td>74</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Apple iPhone XR 256GB red</a></td>
                                                <td>25</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between"><h6 class="card-title">Revenue</h6>
                                                <div><a href="#" class="mr-3"><i class="fa fa-refresh"></i></a><span
                                                        class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                                                                     aria-hidden="true"></i></a><span
                                                            class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                                                         class="dropdown-item">Report</a><a
                                                                href="#" class="dropdown-item">Download</a><a href="#"
                                                                                                              class="dropdown-item">Close</a></span></span>
                                                </div>
                                            </div>
                                            <div id="revenue"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- begin::footer -->
            </div>
        </div>

    </div>
</main>





<script src="vendors/bundle.js"></script><!-- Slick.js -->
<script src="vendors/slick/slick.min.js"></script><!-- Chartjs -->
<script src="vendors/charts/chartjs/chart.min.js"></script><!-- Apex chart -->
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="vendors/charts/apex/apexcharts.min.js"></script><!-- Circle progress -->
<script src="vendors/circle-progress/circle-progress.min.js"></script><!-- Dashboard scripts -->
<script src="assets/js/examples/dashboard.js"></script>

<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="{{asset('js/front_ecommerce.js')}}"></script>

<div class="colors">
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>
<script src="assets/js/app.js"></script>

<script>$(function () {
        $('.slick-js').slick({
            speed: 500,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{breakpoint: 1200, settings: {slidesToShow: 3}}, {
                breakpoint: 992,
                settings: {slidesToShow: 2}
            }, {breakpoint: 768, settings: {slidesToShow: 1}}]
        });
    })</script>

</body>
</html>

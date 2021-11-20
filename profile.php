<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <button onclick="window.history.back()" class="w3-button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>

        </div>
    </div>
    <div class="container" style="margin-top:42px">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="w3-center">My Profile</h4>
                            <p class="w3-center"><img src="https://www.w3schools.com//w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                            <hr>
                            <div class="w3-padding">
                                <p><i class="fas fa-coins fa-fw w3-margin-right w3-text-theme"></i> 500</p>
                                <p><i class="fa fa-venus-mars fa-fw w3-margin-right w3-text-theme"></i> Male</p>
                                <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4>Nutshells</h4>
                            <hr>
                            <div class="w3-padding">
                                <div class="g-mb-15">
                                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                    felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                            178
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                            34
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="w3-padding">
                                <div class="g-mb-15">
                                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                    felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                            178
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                            34
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
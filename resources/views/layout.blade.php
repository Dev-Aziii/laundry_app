<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Authentication')</title>

    <!-- CSS FILES -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <x-logout-modal />
    <script>
        .account - settings - fileinput {
                position: absolute;
                visibility: hidden;
                width: 1 px;
                height: 1 px;
                opacity: 0;
            }
            .account - settings - links.list - group - item.active {
                font - weight: bold!important;
            }
        html: not(.dark - style).account - settings - links.list - group - item.active {
                background: transparent!important;
            }
            .account - settings - multiselect~.select2 - container {
                width: 100 % !important;
            }
            .light - style.account - settings - links.list - group - item {
                padding: 0.85 rem 1.5 rem;
                border - color: rgba(24, 28, 33, 0.03) !important;
            }
            .light - style.account - settings - links.list - group - item.active {
                color: #4e5155 !important;
            }
            .material-style .account-settings-links .list-group-item {
                padding: 0.85rem 1.5rem;
                border-color: rgba(24, 28, 33, 0.03) !important;
            }
            .material-style .account-settings-links .list-group-item.active {
                color: # 4e5155!important;
            }
            .dark - style.account - settings - links.list - group - item {
                padding: 0.85 rem 1.5 rem;
                border - color: rgba(255, 255, 255, 0.03) !important;
            }
            .dark - style.account - settings - links.list - group - item.active {
                color: #fff!important;
            }
            .light - style.account - settings - links.list - group - item.active {
                color: #4E5155 !important;
            }
            .light-style .account-settings-links .list-group-item {
                padding: 0.85rem 1.5rem;
                border-color: rgba(24,28,33,0.03) !important;
            }
    </script>
</head>

<body>
    @yield('content')

    <!-- JAVASCRIPT FILES -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/animated-headline.js"></script>
</body>

</html>

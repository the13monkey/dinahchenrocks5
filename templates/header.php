<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="templates/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="templates/assets/css/style.css">
    <link rel="shortcut icon" href="templates/assets/img/favicon.png" type="image/png">
    <script src="https://kit.fontawesome.com/33482fb435.js"></script>
    <title><?php echo $site_name; ?></title>
</head>
<body>
    <div id="cursor"></div>

    <div class="navbar navbar-dark bg-dark shadow-sm pt-4 pb-4">
        <div class="container d-flex justify-content-between">
            <div id="trigger-container">
                <div id="trigger-icon">
                    <svg height="40" width="40">
                        <circle id="trigger-circle" cx="20" cy="20" r="18" style="stroke: #fff; stroke-width: 2px; fill: transparent" />
                        <g id="trigger-rect" stroke="#fff" stroke-width="2" fill="none">
                            <path id="line1" stroke-linecap="round" d="M10 20 30 20" />
                            <path id="line2" stroke-linecap="round" d="M20 10 20 30" />
                        </g>
                    </svg>
                </div>
                <span class="text-light">All Projects</span>
            </div>
            <div id="close-container">
                <div id="close-icon">
                    <svg height="40" width="40">
                        <circle id="close-circle" cx="20" cy="20" r="18" style="stroke: #fff; stroke-width: 2px; fill: transparent" />
                        <g id="close-rect" stroke="#fff" stroke-width="2" fill="none">
                            <path id="cross1" stroke-linecap="round" d="M12 12 28 28" />
                            <path id="cross2" stroke-linecap="round" d="M12 28 28 12" />
                        </g>
                    </svg>
                </div>
                <span class="text-light">Back home</span>
            </div>
            <div class="mh">
                <a href="#" download class="mr-2 text-white">Resume</a>
                <a href="#" target="_blank" class="ml-2 text-white"><i class="fab fa-github text-white mr-2"></i>GitHub</a>
            </div>
        </div>   
    </div>

    

    <main role="main">
  
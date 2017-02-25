<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<head>
    <meta charset="utf-8">
    <title>BlueIT</title>
    <style>

    </style>

</head>
<body>
<div class="container">
<img src="BlueIT.PNG">
</header>
<?php $whitelist =["home","contact","about"];?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">blueIT</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php?action=home">Home<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">About<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Portfolio<span class="sr-only">(current)</span></a></li>
                    <li><a href="index.php?action=contact">Kontakt<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Mein Konto<span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php $content ="home";?>
    <div class="row">
<main>
    <?php /*
        echo $_SERVER['REQUEST_URI'];

        echo "<br> GET:";
        var_dump($_GET);

        echo "<br> POST:";
        var_dump($_POST); */  
        
        $elements = explode('/', $_SERVER['REQUEST_URI']);  
        $content = explode('.',$elements[sizeof($elements)-1]);  
        switch($content[0])            
        {
            case 'contact':
                include "contact.php";
                break;
            /* case 'home':
                include "home.php";
                break; */
            default:
                include "home.php";
                break;
        }

        /*
        if (isset($_GET['action'])) {
            if (in_array($_GET['action'],$whitelist)) {
                    $content=$_GET['action'];                    
            }
        }
        include "{$content}.php";*/
    ?>
</main>

    </div>
<footer>© blueIT 2014</footer>
</div>
</body>
</html>

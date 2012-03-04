<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Qubit | Quake III Log Parser and Stats Calculator</title>

    <link rel="stylesheet" type="text/css" href="/templates/default/css/reset.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="/templates/default/css/screen.css" media="screen, projection" />

    <script language="javascript" type="text/javascript" src="/templates/default/js/jquery-1.7.1-min.js"></script>
    <script language="javascript" type="text/javascript" src="/templates/default/js/jquery.tablesorter.js"></script>

    <script>
        $(document).ready(function() {
            $("table").tablesorter({
                sortList: [[0,0]]
            });

        });
    </script>

</head>
<body>
    <div class="wrapper">

        <div id="header">
            <h1>Qubit | Log Parser &amp; Stats Calculator</h1>
            <div id="search">
                <form action="/stats/search" method="post" name="search">
                    <select name="context" class="form-field-text-small">
                        <option value="">--- Choose ---</option>
                        <option value="players">Players</option>
                    </select>
                    <input type="text" name="search" class="form-field-text" />
                    <input type="submit" name="submit" value="Search" class="form-button-submit" />
                </form>
            </div>
        </div>

        <div id="navigation">
            <ol>
                <li><a href="/stats">Home</a></li>
                <li><a href="/stats/games">Games</a></li>
                <li><a href="/stats/players">Players</a></li>
                <li><a href="/stats/rankings">Rankings</a></li>
                <li><a href="/stats/ladders">Ladders</a></li>
            </ol>
        </div>

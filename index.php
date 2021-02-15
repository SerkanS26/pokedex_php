<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Pokedex</title>
    <link
            rel="icon"
            type="image/gif/jpg"
            href="https://image.winudf.com/v2/image/bmV0LmFudGFmdW5ueS5wb2tlbW9uZ28uZ3VpZGUuZXhwZXJ0X2ljb25fMTUwNjAyMjk4NF8wOTc/icon.png?w=170&fakeurl=1"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css"/>


</head>
<body>


<div class="logo">
    <img
            src="https://beta.adalab.es/f-online-pokemon-veronicabautista/static/media/logo.799db9c7.png"
            height="100%"
            alt="logo"
    />
</div>
<!-- ******************* here goes the search ***************************** -->


<div class="search-container">

    <!-- ******************* here goes the search ***************************** -->

    <form method="get">
        <input id="name-input" type="text" placeholder="Name / id" name="pokeNameId"/>
        <button type="submit">
            <div id="search-btn" class="ball-container">
                <div class="upper-half-ball"></div>
                <div class="bottom-half-ball"></div>
                <div class="center-ball"></div>
                <div class="center-line"></div>
            </div>
        </button>
    </form>

    <?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $pokemon = "";
    if (isset($_GET["pokeNameId"])) {

        $pokemon = $_GET["pokeNameId"];
    } else {
        $pokemon = "1";
    }

    $api = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemon");
    $data = json_decode($api, true);

    ?>


    <!-- ******************* here goes the search ***************************** -->
</div>

<div id="pokedex">
    <!-- Left Panel -->
    <div id="left-panel">
        <!-- Top lights -->
        <div class="left-top-container">
            <svg height="100" width="225" class="left-svg">
                <polyline
                        points="0,75 70,75 90,38 224,38"
                        style="fill: none; stroke: black; stroke-width: 3"
                />
            </svg>
            <div class="lights-container">
                <div class="big-light-boarder">
                    <div class="big-light blue">
                        <div class="big-dot light-blue"></div>
                    </div>
                </div>
                <div class="small-lights-container">
                    <div class="small-light red">
                        <div class="dot light-red"></div>
                    </div>
                    <div class="small-light yellow">
                        <div class="dot light-yellow"></div>
                    </div>
                    <div class="small-light green">
                        <div class="dot light-green"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Center Screen -->
        <div class="screen-container">
            <div class="screen">
                <div class="top-screen-lights">
                    <div class="mini-light red"></div>
                    <div class="mini-light red"></div>
                </div>

                <!-- <img id="main-screen" src=" " class="principal" />  -->
                <?php
                echo '<img src=" ' . $data["sprites"]["front_default"] . ' " id="main-screen" class="principal">';
                ?>


                <!-- ************************* HERE GOES POKEMON IMG ********************-->
                <div class="bottom-screen-lights">
                    <div class="small-light red">
                        <div class="dot light-red"></div>
                    </div>
                    <div class="burger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Buttons -->
        <div class="buttons-container">
            <div class="upper-buttons-container">
                <div class="big-button"></div>
                <div class="long-buttons-container">
                    <div class="long-button red"></div>
                    <div class="long-button light-blue"></div>
                </div>
            </div>
            <div class="nav-buttons-container">
                <div class="dots-container">
                    <div>.</div>
                    <div>.</div>
                </div>
                <div class="green-screen">
                    <!-- <span id="name-screen"></span>  -->
                    <?php echo '<span id="name-screen">' . $data["name"] . '</span> ' ?>
                    <!----------- here place name of pokemon ------------------->
                </div>
                <div class="right-nav-container">
                    <div class="nav-button">
                        <div class="nav-center-circle"></div>
                        <div class="nav-button-vertical"></div>
                        <div class="nav-button-horizontal">
                            <div class="border-top"></div>
                            <div class="border-bottom"></div>
                        </div>
                    </div>
                    <div class="bottom-right-nav-container">
                        <div class="small-light red">
                            <div class="dot light-red"></div>
                        </div>
                        <div class="dots-container">
                            <div class="black-dot">.</div>
                            <div class="black-dot">.</div>
                            <div class="black-dot">.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Left panel -->

    <!--------------------------------------- Right-panel ----------------------------------------------------------->
    <div id="right-panel">
        <!-- Blank container -->
        <div class="empty-container">
            <svg height="100%" width="100%">
                <polyline
                        points="0,0 0,40 138,40 158,75 250,75 250,0 0,0"
                        style="fill: #f2f2f2; stroke: none; stroke-width: 3"
                />
                <polyline
                        points="0,40 138,40 158,75 250,75"
                        style="fill: none; stroke: black; stroke-width: 3"
                />
            </svg>
        </div>
        <!---------------------------------------- Top screen --------------------------------------------------------->
        <div class="top-screen-container">
            <!--    here is the MOVES -->


            <div id="about-screen" class="right-panel-screen">
                <!-- ************ info to display *******************-->
                Moves:
                <?php

                $fourMoves = array_slice($data["moves"], 0, 4);

                foreach ($fourMoves as $moves) {
                    echo $moves["move"]["name"] . "<br>";
                }

                ?>

            </div>
        </div>
        <!--   **************************** here is the MOVES ***************************************-->


        <!-- Blue Buttons -->
        <div class="square-buttons-container">
            <div class="blue-squares-container">
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
                <div class="blue-square"></div>
            </div>
        </div>
        <!-- Center Buttons -->
        <div class="center-buttons-container">
            <div class="center-left-container">
                <div class="small-reds-container">
                    <div class="small-light red">
                        <div class="dot light-red"></div>
                    </div>
                    <div class="small-light red">
                        <div class="dot light-red"></div>
                    </div>
                </div>
                <div class="white-squares-container">
                    <!-- <img id="prev1" src="" class="center-left-container" />  -->
                    <!--********** img evolutions *********************-->
                    <?php
                    $base = "https://pokeapi.co/api/v2/pokemon-species/";
                    $id = $data["id"];
                    $baseID = file_get_contents($base . $id . '/');
                    $evolution = json_decode($baseID,true);

                    if (isset($evolution["evolves_from_species"]["name"])) {
                        $evoName = $evolution["evolves_from_species"]["name"];
                        $pokemon = $evoName;
                        $evoImg = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemon");
                        $evoImgData = json_decode($evoImg,true);
                        echo '<img src="'.$evoImgData["sprites"]["front_default"].'" class="center-left-container">';
                    }

                    ?>



                    <!--********** img evolutions *********************-->
                    <!--<div class="white-square"></div> -->
                </div>
            </div>
            <div class="center-right-container">
                <div class="thin-buttons-container">
                    <div class="thin-button"></div>
                    <div class="thin-button"></div>
                </div>
                <div class="yellow-button yellow">
                    <div class="big-dot light-yellow"></div>
                </div>
            </div>
        </div>
        <!------------------------------------------- Bottom screens ---------------------------------------------->
        <div class="bottom-screens-container">
            <div id="type-screen" class="right-panel-screen">
                <!--  previous evlution text   -->
                <?php
                if (isset($evoName)){
                    echo $evoName;
                }else{
                    echo "No Previous Evolution";
                }
                ?>

                <!--  previous evlution text    Previous Evolution -->


            </div>
            <div id="id-screen" class="right-panel-screen">
                <?php
                echo '<p>' . "ID:" . $data["id"] . '</p>';
                ?>

            </div>
            <!--******    ID number     **************************** -->


        </div>
    </div>
</div>


</body>
</html>
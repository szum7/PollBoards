<?php
header("Content-Type: text/html; charset=utf-8");

/*
 * ================
 * MAGYAR 
 * ================
 */
/* VARIABLES */
$wwwroot = "http://pollboards.com/";
//$wwwroot = "http://127.0.0.1/PollBird/";
/* WARNINGS */
$mysqlError = "Hiba! Ha ezt az üzenetet kapta, kérem másolja ki és küldje el a szögletes zárójelben megjelenő szöveget az adminisztrátornak, hogy javíthasson a rajta!";
$voteDenied = "Részvétel megtagadva! Ennél a szavazásnál nem tartozol egyetlen, szavazásra jogosult csoportba se.";
$registerWithUser = "Bejelentkezve próbáltál meg regisztrálni. Ha van már saját fiókod, minek új? Eh?";
$loginfail = "<b>Bejelentkezés sikertelen!</b> Hibás felhasználónév vagy jelszó, vagy a fiók még inaktív. Próbálkozások száma: ";
/* TITLES 
 * FT - FieldTitle
 * ChT - CheckboxTitle
 */
$subtitleFT = "FIGYELEM! Alcímet CSAK AKKOR használj, ha az objektum neve már létezik, de te mégis attól különbözőt szeretnél létrehozni. Alcímes objektumokra nehezebb rákeresni - mindig hátrányban vannak az alcím nélküli párjukkal szemben!";
$parts_allChT_old = "<b>Biztos hogy nyilvánosra állítod a szavazást?</b> <br> Ne mondd el nekik, de pszt... pszt... egyedül a regisztrálatlanok jó 
lelkiismeretén fog múlni, hogy nem szavaznak többször, valamint a regisztráltak is megtehetik, hogy kijelentkezve, majd bejelentkezve is szavaznak. NYILVÁNOS szavazások működéséről <a href='../help.php#publicgr' target='_blank' class='att'>itt</a> olvashatsz többet. Érdemes, érdekes!";
$parts_allChT = "Nyilvános szavazások eredménye pontatlanabb, mint regisztrált vagy csoportos szavazásoké!";
$parts_regsChT = "";
$objreport["notreported"] = "Jelentés: a tartalom hibás!";
$objreport["reported"] = "Jelentés visszavonása!";
$newQuesTipFT = "Szavazás kérdése<br>Tipp: Próbáld meg úgy feltenni a kérdést, hogy a válaszokat ne kelljen ragozni. Ha ez nem lehetséges, ne aggódj - az oldalon nem hiba, ha nyelvtanilag nem egyeznek a válaszok a kérdéssel!";
$newQuesAnsTipFT = "Új válasz<br>Fontos! Válaszoknál ne használj ragokat, se névelőt! Ne próbálj meg nyelvtanilag illeszkedni a kérdéshez, mindig hagyd meg a válaszokat elemi formájukban!";
//Regisztráció
$regusernameFT = "Felhasználónév<br>Speciális karakterektől mentes, egyedi, 5-20 karakter.";
$regemailFT = "E-mail cím";
$regintroFT = "Rövid bemutatkozó szöveg. Nem kötelező.";
/* (root) poll.php */
$ansalreadyinpoll = "Hiba: a válasz már szerepel a szavazásban! Használd a keresőt!";
$newansok = "Új válasz felvétele sikeres!";
/* Create errors */
$anssubexists = "Ez a válasz (és alcím kombináció) már létezik!";
$grsubexists = "Ez a csoport (és alcím kombináció) már létezik!";
$pollsubexists = "Ez a szavazás (és alcím kombináció) már létezik!";

/*
 * ================
 * ENGLISH 
 * ================
 */

function lang($key, $lang) {

    $en = Array(
        /*
         * class/poll.php 
         */
        /* pollData() */
        "Szavazás összesített értéke" => "The aggragated value of this poll",
        "Értékelés" => "Rating",
        "aranycsillag" => "golden star",
        "koponya" => "skull",
        "A szavazás létrehozója" => "Author of this poll",
        "Készítő" => "Author",
        "Szavazásra jogosult csoportok" => "Groups which can vote in this poll",
        "Csoportok" => "Groups",
        "Létrehozás dátuma" => "Date of creation",
        "Létrehozva" => "Created",
        "Leírás" => "Description",
        "Kategóriák" => "Categories",
        "felhasználó értékelte a szavazást" => "user rated this poll",
        "pont híres" => "point famous",
        "pont hírhedt" => "point infamous",
        "Saját értékelésed" => "Your rating",
        "haszontalan, hibás tartalom" => "useless, faulty content",
        "felesleges" => "unwanted",
        "nem tetszik" => "disapprove",
        "nem értékelem" => "not rating",
        "tetszik" => "approve",
        "érdekes" => "interesting",
        "hasznos, érdekes tartalom" => "useful, great content",
        /* resultData() */
        "Eredmény összesített értéke" => "The aggragated value of this result",
        "felhasználó értékelte az eredményt" => "user rated this result",
        "ez nem lehet igaz!" => "this can't be true!",
        "megrázó eredmény" => "shocking",
        "nem erre számítottam" => "not what I expected",
        "erre számítottam" => "what I expected",
        "megnyugtató eredmény" => "comforting",
        "ez így van rendjén!" => "how it should be",
        /* answers() */
        "Nincs adat." => "No available data.",
        /* answerList() */
        "helyezés" => "place",
        "szavazatszám" => "votes",
        "szavazat" => "vote",
        /* filterGroupList() */
        "Mindet kijelöl" => "Select all",
        "Kijelölések megszüntetése" => "Deselect all",
        "Szűrés" => "Go!",
        "LÁTOGATÓ" => "VISITOR",
        "REGISZTRÁLT" => "REGISTERED",
        /* newAnswerHTML() */
        "Új válasz felvétele..." => "Add new answer...",
        "Új válaszokat csak felhasználók vehetnek fel. Jelentkezz be vagy <a href='registration.php' target='_self'>regisztrálj!</a>" => "Only registered users can add new answers. Login or <a href='registration.php' target='_self'>register!</a></p>",
        "angol nyelvű válasz" => "english content",
        "magyar nyelvű válasz" => "hungarian content",
        /* writeComment() */
        "Hozzászólás írása..." => "Write a comment...",
        "Küldés" => "Send",
        "Ahhoz, hogy hozzászólást írhass, előbb be kell jelentkezned!" => "You need to log in to comment!",
        /*
         * class/answer.php
         */
        /* rating() */
        "felhasználó értékelte a választ" => "user rated this answer",
        /* getQuestions() */
        "Szavazásra" => "to poll",
        "Eredményre" => "to result",
        /*
         * class/group.php
         */
        /* rating() */
        "felhasználó értékelte a csoportot" => "user rated this group",
        /*
         * class/user.php
         */
        /* bars() */
        "Híres eredmény" => "Famous result",
        "Híres szavazás" => "Famous poll",
        "Híres csoport" => "Famous group",
        "Híres válasz" => "Famous answer",
        "Hírhedt eredmény" => "Infamous result",
        "Hírhedt szavazás" => "Infamous poll",
        "Hírhedt csoport" => "Infamous group",
        "Hírhedt válasz" => "Infamous answer",
        /* getOwnQuestions() */
        "saját szavazásaid" => "your polls",
        /* getPartedQuestions() */
        "szavazások" => "polls",
        /* getGroups() */
        "csoportok" => "groups",
        /* getOwnGroups() */
        "saját csoportjaid" => "your groups",
        /* getOwnAnswers() */
        "saját válaszaid" => "your answers",
        /* getSettingSwitches() */
        "<strong>Válaszos hozzászólás kapcsoló</strong> - megjelenjen-e hozzászólásodban a szavazásban választott válaszod." => "<strong>Voted comment switch</strong> - On: newly created comments under results will include your answer. Off: will not include.",
        "<strong>Összes válaszos hozzászólás kapcsoló</strong> - kikapcsolásával elrejthető minden eddigi válaszos hozzászólás válasza." => "<strong>Voted comment master switch</strong> - Hides/Shows previously \"Voted comment switch - on\" created comments' answers.",
        "angol" => "english",
        "magyar" => "hungarian",
        "ne legyen alapértelmezett nyelv beállítva" => "no default language",
        "<strong>Új tartalmak alapértelmezett nyelve</strong> - a gyorsabb létrehozások érdekében be lehet jelölni - ha általában csak egy nyelven írsz." => "<strong>New content\'s default language</strong> - Set a default language, if you wish to speed up the process of creating new contents.",
        /*
         * class/builder.php
         */
        /* charthtmlheader() */
        "Multi-vonaldiagram" => "Multi-line chart",
        /* htmlheader() */
        "Internetes Szavazás Adatbázis" => "Internet Poll Database",
        "Internetes szavazás adatbázis" => "Internet Poll Database",
        /* header */
        "Saját profiloldal" => "Your profil",
        "Kijelentkezés" => "Logout",
        "Látogató: előzmények törlése" => "Visitor: clear history",
        "Regisztráció" => "Register",
        "Bejelentkezés" => "Login",
        "Felhasználónév" => "Username",
        "Jelszó" => "Password",
        /* footer */
        "Főoldal" => "Main page",
        "Üzenetküldés" => "Contact us",
        /* to* functions() */
        "Főoldalra" => "Main page",
        "PollBoards leírás" => "PollBoards info",
        "Szavazások" => "Polls",
        "Válaszok" => "Answers",
        "Csoportok" => "Groups",
        "Szerkesztés" => "Edit",
        /*
         * class/lists.php
         */
        /* groupList() */
        "Nincs találat." => "Empty search.",
        /* pollList() */
        "Nyilvános" => "Public",
        "Regisztráltak" => "Registered",
        /* pages() */
        "Előző" => "Previous",
        "Következő" => "Next",
        /* pollList() */
        "az eredményre -&gt" => "to result -&gt",
        "x" => "x"
    );

    if ($lang == "hu") {
        return $key;
    } else if ($lang == "en") {
        if (array_key_exists($key, $en)) {
            return $en[$key];
        } else {
            return $key;
        }
    }
}

/* FUNCTIONS */

function convertCases($inp) {
    if (strtoupper($inp) == $inp) {
        // if all capital => mozaikszó
        return $inp;
    } else {
        //$fl = hunCharUpp(mb_substr($inp, 0, 1, 'UTF-8'));
        $fl = mb_convert_case((mb_substr($inp, 0, 1, 'UTF-8')), MB_CASE_UPPER, "UTF-8");
        return $fl . mb_substr($inp, 1, strlen($inp), 'UTF-8');
        //return ucfirst(strtolower($inp));
    }
}

function hunCharUpp($inp) {
    $chars = Array(
        "á" => "Á",
        "ó" => "Ó",
        "ö" => "Ö",
        "ő" => "Ő",
        "ú" => "Ú",
        "ű" => "Ű",
        "ü" => "Ü",
        "í" => "Í"
    );
    if (array_key_exists($inp, $chars)) {
        return $chars[$inp];
    } else {
        return ucfirst($inp);
    }
}

function editDescriptionSigns($text, $reverse = false) {
    /* Edit objects textarea speciális karakterei
     * ((br)) - <br/>
     * ((b))...((/b)) - <b>...</b>
     */
    //$text = htmlspecialchars($text, ENT_QUOTES);

    $signs = Array(
        "((p))" => "<p>",
        "((/p))" => "</p>",
        "((b))" => "<b>",
        "((/b))" => "</b>",
        "((i))" => "<i>",
        "((/i))" => "</i>",
        "((br))" => "<br/>"
    );

    if (!$reverse) {
        $text = htmlspecialchars($text, ENT_QUOTES);
        foreach ($signs as $key => $value) {
            $text = str_replace($key, $value, $text);
        }
    } else {
        $signs = array_flip($signs);
        foreach ($signs as $key => $value) {
            $text = str_replace($key, $value, $text);
        }
    }

    return $text;
}

function newObjCheck($val) {
    /* Oldal speciális jelző karakterei, és azok vizsgálata, hogy írt-e olyat a felhasználó egy stringbe
     * no //
     * no ],[
     * no ]
     * no [
     */
    $bool = true;
    $nos = Array(
        "/\/\//",
        "/\],\[/",
        "/\[/",
        "/\]/"
    );
    for ($i = 0; $i < count($nos); $i++) {
        if (preg_match($nos[$i], $val)) {
            $bool = false;
            break;
        }
    }
    return $bool;
}

function strToArraySpec($string) {
    /* Speciális string tömbbé alakítása
     * sablon: [asd],[asd],[asd] 
     * to: ["asd","asd","asd"]
     */
    if ($string != "" && $string != "[]" && $string != "''") {
        // explode
        $array = explode("],[", $string);
        // remove first '
        if (count($array) > 0) {
            $array[0] = substr($array[0], 1, strlen($array[0]));
        }
        // remove last '
        if (count($array) > 0) {
            $array[count($array) - 1] = substr($array[count($array) - 1], 0, (strlen($array[count($array) - 1]) - 1));
        }
        return $array;
    } else {
        return Array();
    }
}

function cleanSQLString($string) {
    /* INPUT:   a1;a2;a3
     * OUTPUT:  'a1','a2','a3'
     * Input diameter: ;
     * Output diameter: ','
     */
    if ($string != "" && $string != "[]" && $string != "''") {
        // explode
        $array = explode(";", $string);
        $str = "";

        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = htmlspecialchars($array[$i], ENT_QUOTES);
            if ($i != 0) {
                $str .= ",";
            }
            $str .= "'" . $array[$i] . "'";
        }
    } else {
        return "";
    }
}

function strsToMatrixSpec($str1, $str2) {
    /* Speciális string mátrixszá alakítása
     * sablon: 
     * $str1 - [1],[2],[3]
     * $str2 - [a],[b],[c]
     * $str1 - név
     * $str2 - subtitle 
     * to: 
     * matrix[0] = 1
     * matrix[1] = 'a'
     */
    /* 1. array */
    $arr1 = strToArraySpec($str1);
    /* 2. array */
    $arr2 = strToArraySpec($str2);

    /* To matrix */
    $arr3 = Array();
    if (count($arr1) != count($arr2)) {
        return false;
    } else {
        for ($i = 0; $i < count($arr1); $i++) {
            $arr3[$i][0] = $arr1[$i];
            $arr3[$i][1] = $arr2[$i];
        }
        return $arr3;
    }
}

function imgtype($in) {
    if ($in == "jpeg") {
        return "jpg";
    } else {
        return $in;
    }
}

function display_filesize($filesize) {
    if (is_numeric($filesize)) {
        $decr = 1024;
        $step = 0;
        $prefix = array('Byte', 'KB', 'MB', 'GB', 'TB', 'PB');

        while (($filesize / $decr) > 0.9) {
            $filesize = $filesize / $decr;
            $step++;
        }
        return round($filesize, 2) . ' ' . $prefix[$step];
    } else {

        return 'NaN';
    }
}

function allSpecialArr($arr) {
    /* Check if minden tömbbelem egyedi-e
     * true - egyedi | false - van egyezés
     */
    $bool = true;
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            if ($i != $j) {
                if ($arr[$i] == $arr[$j]) {
                    $bool = false;
                    break 2;
                }
            }
        }
    }
    return $bool;
}

function allSpecialMatrix($matrix) {
    /* Check if minden mátrix SOR! egyedi-e
     * mátrixátalakítás tömbbé:
     * matrix
     * ["01"]["02"]["03"],
     * ["11"]["12"]["13"]
     * tömb
     * ["010203"]["111213"]
     * return allSpecialArr(tömb)
     */
    $arr = Array();
    for ($i = 0; $i < count($matrix); $i++) {
        $arr[$i] = "";
        for ($j = 0; $j < count($matrix[$i]); $j++) {
            $arr[$i] .= $matrix[$i][$j];
        }
    }
    return allSpecialArr($arr);
}

function name_sub_toMatrix($str) {
    /* ans - exi: [ans1 // sub1],[ans2],[ans3 // sub3] ... 
     * ('ans1','sub1'),
     * ('ans2',''),
     * ('ans3','')
     * => 
     * $matrix[0][0] = elem1 title
     * $matrix[0][1] = elem1 subtitle
     */
    $matrix = Array();
    $c = 0;
    $arr = strToArraySpec($str);

    for ($i = 0; $i < count($arr); $i++) {

        $exp = explode(" // ", $arr[$i]);
        $matrix[$c] = Array();

        if (count($exp) == 2) {
            $matrix[$c][0] = $exp[0];
            $matrix[$c][1] = $exp[1];
        } else {
            $matrix[$c][0] = $arr[$i];
            $matrix[$c][1] = "";
        }
        $c++;
    }
    return $matrix;
}

function arrToString($arr, $separator = "") {
    $str = "";
    for ($i = 0; $i < count($arr); $i++) {
        if ($str != "") {
            $str .= ",";
        }
        $str .= $separator . $arr[$i] . $separator;
    }
    return $str;
}

function pileSegment($arr1, $arr2, $type = "array") {
    $arr3 = Array();
    if (count($arr1) == 0 || count($arr2) == 0) {
        if ($type == "array") {
            return Array();
        } else if ($type === "string") {
            return "";
        } else {
            return false;
        }
    } else {
        if ($type == "array") {
            for ($i = 0; $i < count($arr1); $i++) {
                $bool = false;
                for ($j = 0; $j < count($arr2); $j++) {
                    if ($arr1[$i] == $arr2[$j]) {
                        $bool = true;
                        break;
                    }
                }
                if ($bool) {
                    array_push($arr3, $arr1[$i]);
                }
            }
            return $arr3;
        } else if ($type === "string") {
            $str = "";
            for ($i = 0; $i < count($arr1); $i++) {
                $bool = false;
                for ($j = 0; $j < count($arr2); $j++) {
                    if ($arr1[$i] == $arr2[$j]) {
                        $bool = true;
                        break;
                    }
                }
                if ($bool) {
                    if ($str === "") {
                        $str .= "'" . $arr1[$i] . "'";
                    } else {
                        $str .= ", '" . $arr1[$i] . "'";
                    }
                }
            }
            return $str;
        } else {
            return false;
        }
    }
}

function pileException($arr1, $arr2, $type = "array") {
    /* arr1 - arr2 = arr3 | str
     * arr1: nagyobb halmaz, kisebbítendő
     * arr2: kivonandó
     * type: array => return array
     * type: string => return mysql compatible string 'a', 'b', 'c'
     */
    $arr3 = Array();
    if (count($arr1) == 0) {
        if ($type == "array") {
            return $arr3;
        } else if ($type == "string") {
            return "";
        }
    } else if (count($arr2) == 0) {
        if ($type == "array") {
            return $arr1;
        } else if ($type == "string") {
            $str = "";
            for ($i = 0; $i < count($arr1); $i++) {
                if ($str != "") {
                    $str .= ",";
                }
                $str .= "'" . $arr1[$i] . "'";
            }
            return $str;
        }
    } else {
        if ($type === "array") {

            for ($i = 0; $i < count($arr1); $i++) {
                $bool = true;
                for ($j = 0; $j < count($arr2); $j++) {
                    if (strtolower($arr1[$i]) == strtolower($arr2[$j])) {
                        $bool = false;
                        break;
                    }
                }
                if ($bool) {
                    array_push($arr3, $arr1[$i]);
                }
            }
            return $arr3;
        } else if ($type === "string") {
            $str = "";
            for ($i = 0; $i < count($arr1); $i++) {
                $bool = true;
                for ($j = 0; $j < count($arr2); $j++) {
                    if (strtolower($arr1[$i]) == strtolower($arr2[$j])) {
                        $bool = false;
                        break;
                    }
                }
                if ($bool) {
                    if ($str === "") {
                        $str .= "'" . $arr1[$i] . "'";
                    } else {
                        $str .= ", '" . $arr1[$i] . "'";
                    }
                }
            }
            return $str;
        } else {
            return false;
        }
    }
}

function pileExceptionMatrix($arr1, $arr2) {
    // arr1 - arr2 = arr3
    // arr1: nagyobb halmaz, kisebbítendő
    // arr2: kivonandó
    $arr3 = Array();
    $c = 0;
    for ($i = 0; $i < count($arr1); $i++) {
        $bool = true;
        for ($j = 0; $j < count($arr2); $j++) {
            if (strtolower($arr1[$i][0] . $arr1[$i][1]) == strtolower($arr2[$j][0] . $arr2[$j][1])) {
                $bool = false;
                break;
            }
        }
        if ($bool) {
            $arr3[$c][0] = $arr1[$i][0];
            $arr3[$c][1] = $arr1[$i][1];
            $c++;
        }
    }
    return $arr3;
}

function reBool($inp, $true, $false) {
    if ($inp != "") {
        return $true;
    } else {
        return $false;
    }
}

function notset($val) {
    if (!isset($val)) {
        return "Nincs adat.";
    } else {
        return $val;
    }
}

function NtoM($date, $time = false) {
    // (number to month)
    //0123-56-89
    //0123-56-89 00:00:00
    $year = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day = substr($date, 8, 2);

    if ($year == "1000") {
        $year = "";
    }

    if (strlen($day) == 2 && substr($day, 0, 1) == "0") {
        $day = substr($day, 1, 1);
    }
    switch ($month) {
        case "01": $month = "January";
            break;
        case "02": $month = "February";
            break;
        case "03": $month = "March";
            break;
        case "04": $month = "April";
            break;
        case "05": $month = "May";
            break;
        case "06": $month = "June";
            break;
        case "07": $month = "July";
            break;
        case "08": $month = "August";
            break;
        case "09": $month = "September";
            break;
        case "10": $month = "October";
            break;
        case "11": $month = "November";
            break;
        case "12": $month = "December";
            break;
        default: $month = "?";
            break;
    }


    if ($time) {
        $ora = substr($date, 11, 5);
        if (substr($ora, 0, 1) == "0") {
            $ora = substr($ora, 1, 4);
        }
        return $day . " " . $month . " " . ", " . $year . " " . $ora;
    } else {
        return $day . " " . $month . ", " . $year;
    }
}

/* british:  5(th) (of) October(,) 2004 
 * american: October (the) 5(th), 2004
 */

function listD($inp) {
    $inp = substr($inp, 0, 10);
    return substr($inp, 8, 2) . "-" . substr($inp, 5, 2) . "-" . substr($inp, 0, 4);

    return $inp;
}

function maxSearch($array) {
    if (isset($array[0])) {
        $max = $array[0];
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] > $max) {
                $max = $array[$i];
            }
        }
        return $max;
    } else {
        return 0;
    }
}

function f1($val, $sz = 1) {
    /* Vonalzóféle dinamikus felosztás - még nincs használatban MNH */
    if (($val / (10 * $sz)) > 10) {
        f1($val, $sz * 10);
    } else {
        echo 'val: ' . $val . '<br/>';
        echo 'sz: ' . $sz;
        // $sz értéke az 1 felosztás értéke. 1 teljes felosztás hány szavazatot jelent
        return $sz;
    }
}

function van_metszet($arr1, $arr2) {
    if (is_string($arr1)) {
        $arr1 = strToArr($arr1);
    }
    if (is_string($arr2)) {
        $arr2 = strToArr($arr2);
    }

    for ($i = 0; $i < count($arr1); $i++) {
        $akt = $arr1[$i];
        for ($j = 0; $j < count($arr2); $j++) {
            if ($akt == $arr2[$j]) {
                return true;
            }
        }
    }
    return false;
}

function strToArr($str) {
    $nums = explode(',', $str);
    $arr = Array();
    foreach ($nums as $nm) {
        array_push($arr, ((int) $nm));
    }
    return $arr;
}

function lengther($arr1, $arr2, $switch) {
    /* Returns a nagyobb vagy kisebb elemszámú tömbböt */
    if ($switch == "shorter") {
        if (count($arr1) > count($arr2)) {
            return $arr2;
        } else {
            return $arr1;
        }
    } else if ($switch == "longer") {
        if (count($arr1) > count($arr2)) {
            return $arr1;
        } else {
            return $arr2;
        }
    }
}

function CalBarWidth($akt, $max, $maxWidth = 670) {
    /* poll class - result bars' max width */
    if ($akt > 0) {
        return round(($akt / $max) * $maxWidth);
    } else {
        return 1;
    }
}

function rateBars_old($connection_id, $con_tb_name, $id) {
    /* => return
     * bad track
     * good track
     * bad bar
     * good bar
     * 
     * => need
     * rate table name
     * object id
     * 
     * => have
     * sum(+ rating)
     * sum(- rating)
     */

    $query = "
        SELECT ( 
            SELECT sum(rate)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
            AND rate > 0
        ) AS rate_pos, (
            SELECT sum(rate)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
            AND rate < 0
        ) AS rate_neg, (
            SELECT count(rid)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
        ) AS usersum;";
    $result = mysqli_query($connection_id, $query) or die("404" . $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $rateP = (isset($row["rate_pos"]) && $row["rate_pos"] != "") ? $row["rate_pos"] : 0;
        $rateN = (isset($row["rate_neg"]) && $row["rate_neg"] != "") ? ($row["rate_neg"] * -1) : 0;
        $maxPxWidth = 175;
        $maxVal = 100;

        $return = Array(
            "usersum" => (isset($row["usersum"]) && $row["usersum"] != "") ? shortenNmr($row["usersum"]) : 0,
            "btrack" => 0,
            "gtrack" => 0,
            "bbar" => ( ($rateN / $maxVal) * $maxPxWidth ),
            "gbar" => ( ($rateP / $maxVal) * $maxPxWidth ),
            "realgood" => $rateP,
            "realbad" => $rateN
        );

        $greater = 0;
        $lesser = 0;

        if ($rateP >= $rateN) {
            $greater = $return["gbar"];
            $lesser = $return["bbar"];
        } else if ($rateP < $rateN) {
            $greater = $return["bbar"];
            $lesser = $return["gbar"];
        }

        while ($greater > $maxPxWidth) {
            if (($lesser / 2) <= 1) {
                $lesser = 1;
                $greater = $maxPxWidth;
                break;
            } else {
                $lesser = $lesser / 2;
            }
            $greater = $greater / 2;
        }

        if ($rateP > $rateN) {
            $return["gbar"] = floor($greater);
            $return["bbar"] = floor($lesser);
        } else if ($rateP < $rateN) {
            $return["bbar"] = floor($greater);
            $return["gbar"] = floor($lesser);
        }

        $return["btrack"] = $maxPxWidth - $return["bbar"];
        $return["gtrack"] = $maxPxWidth - $return["gbar"];

        return $return;
    }
}

function rateBars($connection_id, $con_tb_name, $id) {
    $query = "
        SELECT ( 
            SELECT sum(rate)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
            AND rate > 0
        ) AS rate_pos, (
            SELECT sum(rate)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
            AND rate < 0
        ) AS rate_neg, (
            SELECT count(rid)
            FROM " . $con_tb_name . "
            WHERE forid = " . $id . "
        ) AS usersum;";
    $result = mysqli_query($connection_id, $query) or die("404" . $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $maxPxWidth = 175;
        $cap = 50;

        $rateP = (isset($row["rate_pos"])) ? $row["rate_pos"] : 0;
        $rateN = (isset($row["rate_neg"])) ? $row["rate_neg"] * -1 : 0;

        $Pleft = $rateP - (floor($rateP / $cap) * $cap);
        $Nleft = $rateN - (floor($rateN / $cap) * $cap);

        $return = Array(
            "usersum" => (isset($row["usersum"]) && $row["usersum"] != "") ? shortenNmr($row["usersum"]) : 0,
            "btrack" => 0,
            "gtrack" => 0,
            "bbar" => ( ($Nleft / $cap) * $maxPxWidth ),
            "gbar" => ( ($Pleft / $cap) * $maxPxWidth ),
            "realgood" => $rateP,
            "realbad" => $rateN,
        );

        $return["btrack"] = $maxPxWidth - $return["bbar"];
        $return["gtrack"] = $maxPxWidth - $return["gbar"];

        return $return;
    }
}

function rewstr($val, $str, $cap = 50) {
    if ((floor($val / $cap)) > 0) {
        return $val . " (" . floor($val / $cap) . ") " . $str;
    } else {
        return $val;
    }
}

function shorten($text, $length = 30) {
    // if ? true : false;
    return strlen($text) > $length ? mb_substr($text, 0, $length, 'UTF-8') . "..." : $text;
}

function shortenNmr($n) {
    $pre = ($n < 0) ? "-" : "";
    $n = abs($n);
    $borders = Array(
        array("nbr" => 1000, "title" => ""),
        array("nbr" => 1000000, "title" => "T"),
        array("nbr" => 1000000000, "title" => "M"),
        array("nbr" => 0, "title" => "B")
    );

    for ($i = 0; $i < count($borders); $i++) {
        if ($n < $borders[$i]["nbr"]) {
            if ($i == 0) {
                return $pre . $n;
            } else {
                return $pre . floor($n / $borders[$i - 1]["nbr"]) . $borders[$i]["title"];
            }
        }
    }
    return $pre . floor($n / $borders[count($borders) - 2]["nbr"]) . $borders[count($borders) - 1]["title"];
}

?>
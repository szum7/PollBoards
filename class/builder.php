<?php

/**
 * Description of builder
 *
 * @author Szőcs Áron, Bp. - szocs.aa@gmail.com
 */
class builder {

    private $user;
    private $folder;
    private $page;

    public function __construct($user, $page, $folder) {
        $this->user = $user;
        $this->folder = $folder;
        $this->page = $page;
    }

    public function setPage($new) {
        $this->page = $new;
    }

    public function getProfilImageCount($connection_id) {
        $query = "
            SELECT count(piid) imagecount
            FROM profil_images;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row["imagecount"];
        } else {
            return 0;
        }
    }

    public function htmlheader() {
        echo '<meta name="description" content="Internet Poll Database" />
              <meta name="keywords" content="szavazás, poll, adatbázis, vita, pollboards, pb" />';
        //echo '<base href="' . $this->wwwroot . '">';
        // Icon
        echo '<link rel="shortcut icon" href="' . $this->wwwroot . 'img_site/pbicon.png" />';
        // Styles
        echo '<link rel="stylesheet" type="text/css" href="' . $this->wwwroot . 'css/index.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $this->wwwroot . 'css/barchart.css" />';
        echo '<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />';
        // JQuery
        echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
        // JQuery UI
        echo '<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>';
        // Script
        echo '<script>var root = "' . $this->wwwroot . '"</script>';
        echo '<script type="text/javascript" src="' . $this->wwwroot . 'js/forms.js"></script>';
        echo '<script type="text/javascript" src="' . $this->wwwroot . 'js/index.js"></script>';
        echo '<script type="text/javascript" src="' . $this->wwwroot . 'js/fieldchecks.js"></script>';
    }

    public function charthtmlheader() {
        echo '<meta name="description" content="Internet Poll Database" />
              <meta name="keywords" content="szavazás, poll, adatbázis, vita, pollboards, pb" />';
        // Icon
        echo '<link rel="shortcut icon" href="' . $this->wwwroot . 'img_site/pbicon.png" />';
        // style
        echo '<link rel="stylesheet" type="text/css" href="' . $this->wwwroot . 'css/charts/ml1.css" />';
        // script
        echo '<script type="text/javascript" src="' . $this->wwwroot . 'js/raphael/raphael_min.js"></script>';
        echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
        echo ' <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>';
        //echo '<script type="text/javascript" src="' . $this->wwwroot . 'js/charts/line_ml1.js"></script>';
        // title
        echo '<title>Multi-line chart | PollBoards</title>';
    }

    public function header_part1($root = "") {
        ?>
        <header>
            <div class="up">
                <div class="aligner">
                    <a href="http://www.pollboards.com" target="_self">
                        <div id="pollboards_logo">
                            <img src="http://localhost/PollBoards/img_site/pollboards_logo.png" alt="PollBoards logo" />
                            <p>Internet Poll Database 3.0</p>
                        </div>
                    </a>
                    <ul>
                        <?php
                        if ($this->user->uid == 0) {
                            ?>
                            <li id="logininputs">
                                <div class="border">
                                    <form action="/process_login.php" method="post" name="login_form" id="login_form" enctype="multipart/form-data">
                                        <input type="hidden" id="page" name="page" value="" />
                                        <input type="text" title="Enter your username" value="" id="username" name="username" placeholder="Username..." /><input type="password" title="Enter your password" value="" id="password" name="password" placeholder="Password..." /><div title="Log in" id="processlogin_btn"></div>
                                    </form>
                                </div>
                            </li><li id="login_btn"><div class="border"><p>Login</p></div></li><li class="last">
                                <a href="<?= $root; ?>registration.php" target="_self">
                                    <div class="border"><p>Register</p></div>
                                </a></li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?= $root; ?>user/<?= $this->user->uid ?>" target="_self">
                                    <div class="border"><p>Profil</p></div>
                                </a>
                            </li><li class="last">
                                <a href="<?= $root; ?>logout.php" target="_self">
                                    <div class="border"><p>Logout</p></div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="down">
                <div class="zigzag"></div>
                <div class="aligner">
                    <nav>
                        <ul>
                            <?php
                        }

                        public function header_part2() {
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <?php
    }

    public function func_toindex($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Main page">
            <a href="<?= $this->wwwroot; ?>" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/toindex.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_toinfo($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Info and Help">
            <a href="/info" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/info.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_lists($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>">
            <div class="border" title="Lists">
                <img src="<?= $root; ?>img_site/menu/lists.png" />
            </div>
            <ul>
                <li title="Polls"><a href="/hall/polls"><img src="<?= $root; ?>img_site/menu/poll.png" /></a></li>
                <li title="Groups"><a href="/hall/groups"><img src="<?= $root; ?>img_site/menu/group.png" /></a></li>
                <li class="last" title="Answers"><a href="/hall/answers"><img src="<?= $root; ?>img_site/menu/answer.png" /></a></li>
            </ul>
        </li>
        <?php
    }

    public function func_creating($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>">
            <div class="border" title="Create">
                <img src="<?= $root; ?>img_site/menu/add.png" />
            </div>
            <ul>
                <li title="Create poll"><a href="/create/poll"><img src="<?= $root; ?>img_site/menu/create_poll.png" /></a></li>
                <li title="Create group"><a href="/create/group"><img src="<?= $root; ?>img_site/menu/create_group.png" /></a></li>
                <li title="Create answer" class="last"><a href="/create/answer"><img src="<?= $root; ?>img_site/menu/create_answer.png" /></a></li>
            </ul>
        </li>
        <?php
    }

    public function func_multiline($id, $last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Votes in time view">
            <a href="/chart/multiline/<?= $id; ?>" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/multiline.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_groupfilter($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Filtered by groups view" id="togroupfilter">
            <div class="border"><img src="<?= $root; ?>img_site/menu/groupfilter.png" /></div>
        </li>
        <?php
    }

    public function func_settings($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="User settings">
            <a href="/edit/user" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/settings.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_backtopoll($id, $last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="To the poll">
            <a href="/poll/<?= $id; ?>" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/topoll.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_backgtoresult($id, $last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="To result">
            <a href="/result/<?= $id; ?>" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/toresult.png" /></div>
            </a>
        </li>
        <?php
    }

    public function func_pollsearch($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Search for answer" id="topollsearch">
            <div class="border"><img src="<?= $root; ?>img_site/menu/poll_search.png" /></div>
        </li>
        <?php
    }

    public function func_joingroup($password = false, $last = "", $root = "") {
        $elementid = "tojoingroup";
        if ($password) {
            $elementid = "tojoingrouppass";
        }
        ?>
        <li class="main <?= $last; ?>" title="Join group" id="<?= $elementid; ?>">
            <div class="border"><img src="<?= $root; ?>img_site/menu/joingroup.png" /></div>
        </li>
        <?php
    }

    public function func_leavegroup($last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Leave group" id="toleavegroup">
            <div class="border"><img src="<?= $root; ?>img_site/menu/leavegroup.png" /></div>
        </li>
        <?php
    }

    public function func_editreset($color = "gray", $last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Reset changes">
            <div class="border" id="editreset" data-color="<?= $color; ?>"><img src="<?= $root; ?>img_site/menu/reset.png" /></div>
        </li>
        <?php
    }

    public function func_editobject($object, $id, $last = "", $root = "") {
        ?>
        <li class="main <?= $last; ?>" title="Edit <?= $object; ?>">
            <a href="/edit/<?= $object; ?>/<?= $id; ?>" target="_self">
                <div class="border"><img src="<?= $root; ?>img_site/menu/settings.png" /></div>
            </a>
        </li>
        <?php
    }

    public function footer() {
        ?>
        <footer>
            <div class="relative">
                <div class="aligner">
                    <ul>
                        <li class="links">
                            <p class="title">PAGES</p>
                            <p>
                                <a href="http://www.pollboards.com/" target="_self">Home</a><br/>
                                <a href="http://www.pollboards.com/hall/polls" target="_self">Polls</a>&nbsp;/&nbsp;
                                <a href="http://www.pollboards.com/hall/groups" target="_self">Groups</a>&nbsp;/&nbsp;
                                <a href="http://www.pollboards.com/hall/answers" target="_self">Answers</a><br/>
                                <a href="http://www.pollboards.com/registration" target="_self">Registration</a><br/>
                                <a href="http://www.pollboards.com/info" target="_self">Info and Help</a>
                            </p>
                        </li><li class="links">
                            <p class="title">CONTACT US</p>
                            <p>
                                <a href="mailto:info@pollboards.com">info@pollboards.com</a>
                                <br/><br/>
                            </p>
                            <p class="title">SOCIAL</p>
                            <p>Like us on <a class="bold" target="_blank" href="#">Facebook</a></p>
                        </li><li class="text last">
                            <p>
                                The first Internet Poll Database. Create, question and answer,<br/>
                                learn more about debates that interests today's world.<br/>
                                Find statistics about anything and everything!
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="zigzag"></div>
            </div>
            <div class="bottom">
                <div class="zigzag"></div>
                <div class="aligner">
                    <p>PollBoards &copy; 2014&nbsp;&nbsp;|&nbsp;&nbsp;created by szum7</p>
                </div>
            </div>
        </footer>
        <?php
    }

    public function news($connection_id) {
        $query = "
            SELECT *
            FROM news
            ORDER BY created DESC;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="newsbox">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="header">';
                echo '<div class="color"></div>';
                echo '<div class="title">';
                echo '<p>' . $row["title"] . '</p>';
                echo '</div>';
                echo '<div class="date">';
                echo '<p>' . NtoM($row["created"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="content">';
                echo '<p>' . $row["text"] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            return false;
        }
    }

    public function toplist_polls_votes($connection_id, $limit = 5) {
        /* Polls with most votes */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT questions.qid, question, sum(vote) szumma
            FROM questions
            INNER JOIN poll
            ON questions.qid = poll.qid
            GROUP BY qid
            ORDER BY szumma DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("BAD QUERY - " . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter piros ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="poll/' . $row["qid"] . '" target="_blank" title="' . $row["question"] . '">';
                echo ($i + 1) . ". " . $row["question"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }

    public function toplist_groups_members($connection_id, $limit = 5) {
        /* Groups with most members */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT gid, group_name, members
            FROM groups
            WHERE gid NOT IN (1, 2, 3, 4, 5)
            ORDER BY members DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter kek ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="group/' . $row["gid"] . '" target="_blank" title="' . $row["group_name"] . '">';
                echo ($i + 1) . ". " . $row["group_name"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }

    public function toplist_answers_used($connection_id, $limit = 5) {
        /* Answers most used / in most polls */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT answers.aid, answers.answer, count(poll.aid) szumma
            FROM answers
            INNER JOIN poll
            ON answers.aid = poll.aid
            GROUP BY aid
            ORDER BY szumma DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter zold ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="answer/' . $row["aid"] . '" target="_blank" title="' . $row["answer"] . '">';
                echo ($i + 1) . ". " . $row["answer"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }
    
    public function master($connection_id){
        $query = "
            SELECT answers.aid, answers.answer, count(poll.aid) szumma
            FROM answers
            INNER JOIN poll
            ON answers.aid = poll.aid
            GROUP BY aid
            ORDER BY szumma DESC;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            $return = array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($return, array(
                    "aid" => $row["aid"],
                    "answer" => $row["answer"],
                    "szumma" => $row["szumma"]
                ));
            }
            $this->servant($return);
        }
    }
    
    public function servant($assoc){
        
        for ($i=0; $i<count($assoc);$i++){
            echo $assoc[$i]["aid"] . "<br/>";
        }
    }

    public function toplist_answers_picked($connection_id, $limit = 5) {
        /* Answers with most votes - most picked (1 answer can be in multiple polls) */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT answers.aid, answers.answer, sum(vote) szumma
            FROM answers
            LEFT JOIN poll ON answers.aid = poll.aid
            GROUP BY poll.aid
            ORDER BY szumma DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter zold ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="answer/' . $row["aid"] . '" target="_blank" title="' . $row["answer"] . '">';
                echo ($i + 1) . ". " . $row["answer"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }

    public function toplist_polls_growing($connection_id, $limit = 5) {
        /* Fastest growing polls in votes */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT questions.qid, questions.question, sum(vote) szumma, DATEDIFF(NOW(), questions.created) datediff, (sum(vote) / DATEDIFF(NOW(), questions.created)) growing
            FROM questions
            INNER JOIN poll
            ON questions.qid = poll.qid
            GROUP BY qid
            ORDER BY growing DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("BAD QUERY - " . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter piros ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="poll/' . $row["qid"] . '" target="_blank" title="' . $row["question"] . '">';
                echo ($i + 1) . ". " . $row["question"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }

    public function toplist_polls_new($connection_id, $limit = 5) {
        /* Newest polls */
        $i = 0;
        $place = returnToplistClassArray($limit);
        $query = "
            SELECT qid, question
            FROM questions
            ORDER BY created DESC
            LIMIT " . $limit . ";";
        $result = mysqli_query($connection_id, $query) or die("BAD QUERY - " . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="hatter piros ' . $place[$i] . '">';
                echo '<div class="content">';
                echo '<a href="poll/' . $row["qid"] . '" target="_blank" title="' . $row["question"] . '">';
                echo ($i + 1) . ". " . $row["question"];
                echo '</a>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            return false;
        }
    }

    public function topGroups($connection_id) {
        $query = "
            SELECT gid, group_name, members
            FROM groups
            WHERE gid NOT IN (1, 2, 3, 4, 5)
            AND (password = '' OR password IS NULL)
            ORDER BY members DESC
            LIMIT 30;";
        $result = mysqli_query($connection_id, $query) or die("404" . $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (multiCondition($row["gid"], Array(1, 2, 3, 4, 5))) {
                    echo '<div class="connection purple selectable" data-gid="' . $row["gid"] . '">';
                    echo $row["group_name"];
                    echo '</div>';
                }
            }
        }
    }

}

function multiCondition($val, $arr) {
    $bool = true;
    for ($i = 0; $i < count($arr); $i++) {
        if ($val == $arr[$i]) {
            $bool = false;
            break;
        }
    }
    return $bool;
}

function returnToplistClassArray($limit) {
    $place = Array("first", "second", "third", "forth", "fifth");
    for ($j = 0; $j < ($limit + 5) && $limit > 5; $j++) {
        $place[$j + 5] = "nonum";
    }
    return $place;
}
?>
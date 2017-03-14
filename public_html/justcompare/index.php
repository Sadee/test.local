<?php 

//file_put_contents('file.txt', file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1.jpg'));
$binEqual = [
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1-1.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/2.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1-80.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1.png'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1-scaled.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1-e.jpg')
];

/*
$binDiff = [
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/1.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/2.jpg'),
    file_get_contents('/home/eatdigi/public_html/testing/webscraper/justcompare/img/3.jpg')
];*/


function getAvgColor($bin, $size = 10) {

    $target = imagecreatetruecolor($size, $size);
    $source = imagecreatefromstring($bin);

    imagecopyresized($target, $source, 0, 0, 0, 0, $size, $size, imagesx($source), imagesy($source));

    $r = $g = $b = 0;

    foreach(range(0, $size - 1) as $x) {
        foreach(range(0, $size - 1) as $y) {
            $rgb = imagecolorat($target, $x, $y);
            $r += $rgb >> 16;
            $g += $rgb >> 8 & 255;
            $b += $rgb & 255;
        }
    }   

    unset($source, $target);

    return (floor($r / $size ** 2) << 16) +  (floor($g / $size ** 2) << 8)  + floor($b / $size ** 2);
}

function compAvgColor($c1, $c2, $tolerance = 4) {

    return abs(($c1 >> 16) - ($c2 >> 16)) <= $tolerance && 
           abs(($c1 >> 8 & 255) - ($c2 >> 8 & 255)) <= $tolerance &&
           abs(($c1 & 255) - ($c2 & 255)) <= $tolerance;
}

// [1, 1-1], [1, ]
$perms = [[0,1],[0,2],[0,3],[0,4],[0,5],[0,6]];

foreach($perms as $perm) {
	//echo "<br/>compare: ".$binEqual[$perm[0]].' <br/>     with '.$binEqual[$perm[1]];
    //_ var_dump(compAvgColor(getAvgColor($binEqual[$perm[0]]), getAvgColor($binEqual[$perm[1]]))); echo "<br/>";
	echo "<br/>";var_dump( (getAvgColor($binEqual[$perm[1]]) >> 16));
}

/*
 echo "<br/>Diff:<br/>";
foreach($perms as $perm) {
    var_dump(compAvgColor(getAvgColor($binDiff[$perm[0]]), getAvgColor($binDiff[$perm[1]]))); echo "<br/>";
}
*/

?>

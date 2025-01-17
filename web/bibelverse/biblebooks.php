﻿<?php
function getBibleBooks() {
    $biblebooks = array(
        array( "bnumber" => 1, "bname" => "1.Mose", "bshort" => "1.Mo", "chapter" => array(31, 25, 24, 26, 32, 22, 24, 22, 29, 32, 32, 20, 18, 24, 21, 16, 27, 33, 38, 18, 34, 24, 20, 67, 34, 35, 46, 22, 35, 43, 54, 33, 20, 31, 29, 43, 36, 30, 23, 23, 57, 38, 34, 34, 28, 34, 31, 22, 33, 26), "versesinbook" => 1533 ),
        array( "bnumber" => 2, "bname" => "2.Mose", "bshort" => "2.Mo", "chapter" => array(22, 25, 22, 31, 23, 30, 29, 28, 35, 29, 10, 51, 22, 31, 27, 36, 16, 27, 25, 26, 37, 30, 33, 18, 40, 37, 21, 43, 46, 38, 18, 35, 23, 35, 35, 38, 29, 31, 43, 38), "versesinbook" => 1213 ),
        array( "bnumber" => 3, "bname" => "3.Mose", "bshort" => "3.Mo", "chapter" => array(17, 16, 17, 35, 26, 23, 38, 36, 24, 20, 47, 8, 59, 57, 33, 34, 16, 30, 37, 27, 24, 33, 44, 23, 55, 46, 34), "versesinbook" => 859 ),
        array( "bnumber" => 4, "bname" => "4.Mose", "bshort" => "4.Mo", "chapter" => array(54, 34, 51, 49, 31, 27, 89, 26, 23, 36, 35, 16, 33, 45, 41, 35, 28, 32, 22, 29, 35, 41, 30, 25, 19, 65, 23, 31, 39, 17, 54, 42, 56, 29, 34, 13), "versesinbook" => 1289 ),
        array( "bnumber" => 5, "bname" => "5.Mose", "bshort" => "5.Mo", "chapter" => array(46, 37, 29, 49, 33, 25, 26, 20, 29, 22, 32, 31, 19, 29, 23, 22, 20, 22, 21, 20, 23, 29, 26, 22, 19, 19, 26, 69, 28, 20, 30, 52, 29, 12), "versesinbook" => 959 ),
        array( "bnumber" => 6, "bname" => "Josua", "bshort" => "Jos", "chapter" => array(18, 24, 17, 24, 15, 27, 26, 35, 27, 43, 23, 24, 33, 15, 63, 10, 18, 28, 51, 9, 45, 34, 16, 33), "versesinbook" => 658 ),
        array( "bnumber" => 7, "bname" => "Richter", "bshort" => "Ri", "chapter" => array(36, 23, 31, 24, 31, 40, 25, 35, 57, 18, 40, 15, 25, 20, 20, 31, 13, 31, 30, 48, 25), "versesinbook" => 618 ),
        array( "bnumber" => 8, "bname" => "Rut", "bshort" => "Ruth", "chapter" => array(22, 23, 18, 22), "versesinbook" => 85 ),
        array( "bnumber" => 9, "bname" => "1.Samuel", "bshort" => "1.Sam", "chapter" => array(28, 36, 21, 22, 12, 21, 17, 22, 27, 27, 15, 25, 23, 52, 35, 23, 58, 30, 24, 42, 16, 23, 28, 23, 44, 25, 12, 25, 11, 31, 13), "versesinbook" => 811 ),
        array( "bnumber" => 10, "bname" => "2.Samuel", "bshort" => "2.Sam", "chapter" => array(27, 32, 39, 12, 25, 23, 29, 18, 13, 19, 27, 31, 39, 33, 37, 23, 29, 32, 44, 26, 22, 51, 39, 25), "versesinbook" => 695 ),
        array( "bnumber" => 11, "bname" => "1.Könige", "bshort" => "1.Kön", "chapter" => array(53, 46, 28, 20, 32, 38, 51, 66, 28, 29, 43, 33, 34, 31, 34, 34, 24, 46, 21, 43, 29, 54), "versesinbook" => 817 ),
        array( "bnumber" => 12, "bname" => "2.Könige", "bshort" => "2.Kön", "chapter" => array(18, 25, 27, 44, 27, 33, 20, 29, 37, 36, 20, 22, 25, 29, 39, 20, 41, 37, 37, 21, 26, 20, 37, 20, 30), "versesinbook" => 720 ),
        array( "bnumber" => 13, "bname" => "1.Chronik", "bshort" => "1.Chr", "chapter" => array(54, 55, 24, 43, 41, 66, 40, 40, 44, 14, 47, 41, 14, 17, 29, 43, 27, 17, 19, 8, 30, 19, 32, 31, 31, 32, 34, 21, 30), "versesinbook" => 943 ),
        array( "bnumber" => 14, "bname" => "2.Chronik", "bshort" => "2.Chr", "chapter" => array(18, 17, 17, 22, 14, 42, 22, 18, 31, 19, 23, 16, 23, 14, 19, 14, 19, 34, 11, 37, 20, 12, 21, 27, 28, 23, 9, 27, 36, 27, 21, 33, 25, 33, 27, 23), "versesinbook" => 822 ),
        array( "bnumber" => 15, "bname" => "Esra", "bshort" => "Esra", "chapter" => array(11, 70, 13, 24, 17, 22, 28, 36, 15, 44), "versesinbook" => 280 ),
        array( "bnumber" => 16, "bname" => "Nehemia", "bshort" => "Neh", "chapter" => array(11, 20, 38, 17, 19, 19, 72, 18, 37, 40, 36, 47, 31), "versesinbook" => 405 ),
        array( "bnumber" => 17, "bname" => "Esther", "bshort" => "Est", "chapter" => array(22, 23, 15, 17, 14, 14, 10, 17, 32, 3), "versesinbook" => 167 ),
        array( "bnumber" => 18, "bname" => "Hiob", "bshort" => "Hiob", "chapter" => array(22, 13, 26, 21, 27, 30, 21, 22, 35, 22, 20, 25, 28, 22, 35, 22, 16, 21, 29, 29, 34, 30, 17, 25, 6, 14, 23, 28, 25, 31, 40, 22, 33, 37, 16, 33, 24, 41, 30, 32, 26, 17), "versesinbook" => 1070 ),
        array( "bnumber" => 19, "bname" => "Psalmen", "bshort" => "Ps", "chapter" => array(6, 12, 9, 9, 13, 11, 18, 10, 21, 18, 7, 9, 7, 7, 5, 11, 15, 51, 15, 10, 14, 32, 6, 10, 22, 12, 14, 9, 11, 13, 25, 11, 22, 23, 28, 13, 40, 23, 14, 18, 14, 12, 5, 27, 18, 12, 10, 15, 21, 23, 21, 11, 7, 9, 24, 14, 12, 12, 18, 14, 9, 13, 12, 11, 14, 20, 8, 36, 37, 6, 24, 20, 28, 23, 11, 13, 21, 72, 13, 20, 17, 8, 19, 13, 14, 17, 7, 19, 53, 17, 16, 16, 5, 23, 11, 13, 12, 9, 9, 5, 8, 29, 22, 35, 45, 48, 43, 14, 31, 7, 10, 10, 9, 8, 18, 19, 2, 29, 176, 7, 8, 9, 4, 8, 5, 6, 5, 6, 8, 8, 3, 18, 3, 3, 21, 26, 9, 8, 24, 14, 10, 8, 12, 15, 21, 10, 20, 14, 9, 6), "versesinbook" => 2528 ),
        array( "bnumber" => 20, "bname" => "Sprüche", "bshort" => "Spr", "chapter" => array(33, 22, 35, 27, 23, 35, 27, 36, 18, 32, 31, 28, 25, 35, 33, 33, 28, 24, 29, 30, 31, 29, 35, 34, 28, 28, 27, 28, 27, 33, 31), "versesinbook" => 915 ),
        array( "bnumber" => 21, "bname" => "Prediger", "bshort" => "Pred", "chapter" => array(18, 26, 22, 17, 19, 12, 29, 17, 18, 20, 10, 14), "versesinbook" => 222 ),
        array( "bnumber" => 22, "bname" => "Hoheslied", "bshort" => "Hld", "chapter" => array(17, 17, 11, 16, 16, 12, 14, 14), "versesinbook" => 117 ),
        array( "bnumber" => 23, "bname" => "Jesaja", "bshort" => "Jes", "chapter" => array(31, 22, 26, 6, 30, 13, 25, 23, 20, 34, 16, 6, 22, 32, 9, 14, 14, 7, 25, 6, 17, 25, 18, 23, 12, 21, 13, 29, 24, 33, 9, 20, 24, 17, 10, 22, 38, 22, 8, 31, 29, 25, 28, 28, 25, 13, 15, 22, 26, 11, 23, 15, 12, 17, 13, 12, 21, 14, 21, 22, 11, 12, 19, 11, 25, 24), "versesinbook" => 1291 ),
        array( "bnumber" => 24, "bname" => "Jeremia", "bshort" => "Jer", "chapter" => array(19, 37, 25, 31, 31, 30, 34, 23, 25, 25, 23, 17, 27, 22, 21, 21, 27, 23, 15, 18, 14, 30, 40, 10, 38, 24, 22, 17, 32, 24, 40, 44, 26, 22, 19, 32, 21, 28, 18, 16, 18, 22, 13, 30, 5, 28, 7, 47, 39, 46, 64, 34), "versesinbook" => 1364 ),
        array( "bnumber" => 25, "bname" => "Klagelieder", "bshort" => "Klgl", "chapter" => array(22, 22, 66, 22, 22), "versesinbook" => 154 ),
        array( "bnumber" => 26, "bname" => "Hesekiel", "bshort" => "Hes", "chapter" => array(28, 10, 27, 17, 17, 14, 27, 18, 11, 22, 25, 28, 23, 23, 8, 63, 24, 32, 14, 44, 37, 31, 49, 27, 17, 21, 36, 26, 21, 26, 18, 32, 33, 31, 15, 38, 28, 23, 29, 49, 26, 20, 27, 31, 25, 24, 23, 35), "versesinbook" => 1273 ),
        array( "bnumber" => 27, "bname" => "Daniel", "bshort" => "Dan", "chapter" => array(21, 49, 33, 34, 30, 29, 28, 27, 27, 21, 45, 13), "versesinbook" => 357 ),
        array( "bnumber" => 28, "bname" => "Hosea", "bshort" => "Hos", "chapter" => array(9, 25, 5, 19, 15, 11, 16, 14, 17, 15, 11, 15, 15, 10), "versesinbook" => 197 ),
        array( "bnumber" => 29, "bname" => "Joel", "bshort" => "Joel", "chapter" => array(20, 27, 5, 21), "versesinbook" => 73 ),
        array( "bnumber" => 30, "bname" => "Amos", "bshort" => "Am", "chapter" => array(15, 16, 15, 13, 27, 14, 17, 14, 15), "versesinbook" => 146 ),
        array( "bnumber" => 31, "bname" => "Obadja", "bshort" => "Obd", "chapter" => array(21), "versesinbook" => 21 ),
        array( "bnumber" => 32, "bname" => "Jona", "bshort" => "Jona", "chapter" => array(16, 11, 10, 11), "versesinbook" => 48 ),
        array( "bnumber" => 33, "bname" => "Micha", "bshort" => "Mi", "chapter" => array(16, 13, 12, 14, 14, 16, 20), "versesinbook" => 105 ),
        array( "bnumber" => 34, "bname" => "Nahum", "bshort" => "Nah", "chapter" => array(14, 14, 19), "versesinbook" => 47 ),
        array( "bnumber" => 35, "bname" => "Habakuk", "bshort" => "Hab", "chapter" => array(17, 20, 19), "versesinbook" => 56 ),
        array( "bnumber" => 36, "bname" => "Zefanja", "bshort" => "Zef", "chapter" => array(18, 15, 20), "versesinbook" => 53 ),
        array( "bnumber" => 37, "bname" => "Haggai", "bshort" => "Hag", "chapter" => array(15, 23), "versesinbook" => 38 ),
        array( "bnumber" => 38, "bname" => "Sacharja", "bshort" => "Sach", "chapter" => array(17, 17, 10, 14, 11, 15, 14, 23, 17, 12, 17, 14, 9, 21), "versesinbook" => 211 ),
        array( "bnumber" => 39, "bname" => "Maleachi", "bshort" => "Mal", "chapter" => array(14, 17, 24), "versesinbook" => 55 ),
        array( "bnumber" => 40, "bname" => "Matthäus", "bshort" => "Mt", "chapter" => array(25, 23, 17, 25, 48, 34, 29, 34, 38, 42, 30, 50, 58, 36, 39, 28, 27, 35, 30, 34, 46, 46, 39, 51, 46, 75, 66, 20), "versesinbook" => 1071 ),
        array( "bnumber" => 41, "bname" => "Markus", "bshort" => "Mk", "chapter" => array(45, 28, 35, 41, 43, 56, 37, 38, 50, 52, 33, 44, 37, 72, 47, 20), "versesinbook" => 678 ),
        array( "bnumber" => 42, "bname" => "Lukas", "bshort" => "Lk", "chapter" => array(80, 52, 38, 44, 39, 49, 50, 56, 62, 42, 54, 59, 35, 35, 32, 31, 37, 43, 48, 47, 38, 71, 56, 53), "versesinbook" => 1151 ),
        array( "bnumber" => 43, "bname" => "Johannes", "bshort" => "Joh", "chapter" => array(51, 25, 36, 54, 47, 71, 53, 59, 41, 42, 57, 50, 38, 31, 27, 33, 26, 40, 42, 31, 25), "versesinbook" => 879 ),
        array( "bnumber" => 44, "bname" => "Apostelgeschichte", "bshort" => "Apg", "chapter" => array(26, 47, 26, 37, 42, 15, 60, 39, 43, 48, 30, 25, 52, 28, 41, 40, 34, 28, 41, 38, 40, 30, 35, 27, 27, 32, 45, 31), "versesinbook" => 1007 ),
        array( "bnumber" => 45, "bname" => "Römer", "bshort" => "Röm", "chapter" => array(32, 29, 31, 25, 21, 23, 25, 39, 33, 21, 36, 21, 14, 23, 33, 27), "versesinbook" => 433 ),
        array( "bnumber" => 46, "bname" => "1.Korinther", "bshort" => "1.Kor", "chapter" => array(31, 16, 23, 21, 13, 20, 40, 13, 27, 33, 34, 31, 13, 40, 58, 24), "versesinbook" => 437 ),
        array( "bnumber" => 47, "bname" => "2.Korinther", "bshort" => "2.Kor", "chapter" => array(24, 17, 18, 18, 21, 18, 16, 24, 15, 18, 33, 21, 13), "versesinbook" => 256 ),
        array( "bnumber" => 48, "bname" => "Galater", "bshort" => "Gal", "chapter" => array(24, 21, 29, 31, 26, 18), "versesinbook" => 149 ),
        array( "bnumber" => 49, "bname" => "Epheser", "bshort" => "Eph", "chapter" => array(23, 22, 21, 32, 33, 24), "versesinbook" => 155 ),
        array( "bnumber" => 50, "bname" => "Philipper", "bshort" => "Phil", "chapter" => array(30, 30, 21, 23), "versesinbook" => 104 ),
        array( "bnumber" => 51, "bname" => "Kolosser", "bshort" => "Kol", "chapter" => array(29, 23, 25, 18), "versesinbook" => 95 ),
        array( "bnumber" => 52, "bname" => "1.Thessalonicher", "bshort" => "1.Thes", "chapter" => array(10, 20, 13, 18, 28), "versesinbook" => 89 ),
        array( "bnumber" => 53, "bname" => "2.Thessalonicher", "bshort" => "2.Thes", "chapter" => array(12, 17, 18), "versesinbook" => 47 ),
        array( "bnumber" => 54, "bname" => "1.Timotheus", "bshort" => "1.Tim", "chapter" => array(20, 15, 16, 16, 25, 21), "versesinbook" => 113 ),
        array( "bnumber" => 55, "bname" => "2.Timotheus", "bshort" => "2.Tim", "chapter" => array(18, 26, 17, 22), "versesinbook" => 83 ),
        array( "bnumber" => 56, "bname" => "Titus", "bshort" => "Tit", "chapter" => array(16, 15, 15), "versesinbook" => 46 ),
        array( "bnumber" => 57, "bname" => "Philemon", "bshort" => "Phlm", "chapter" => array(25), "versesinbook" => 25 ),
        array( "bnumber" => 58, "bname" => "Hebräer", "bshort" => "Heb", "chapter" => array(14, 18, 19, 16, 14, 20, 28, 13, 28, 39, 40, 29, 25), "versesinbook" => 303 ),
        array( "bnumber" => 59, "bname" => "Jakobus", "bshort" => "Jak", "chapter" => array(27, 26, 18, 17, 20), "versesinbook" => 108 ),
        array( "bnumber" => 60, "bname" => "1.Petrus", "bshort" => "1.Pet", "chapter" => array(25, 25, 22, 19, 14), "versesinbook" => 105 ),
        array( "bnumber" => 61, "bname" => "2.Petrus", "bshort" => "2.Pet", "chapter" => array(21, 22, 18), "versesinbook" => 61 ),
        array( "bnumber" => 62, "bname" => "1.Johannes", "bshort" => "1.Joh", "chapter" => array(10, 29, 24, 21, 21), "versesinbook" => 105 ),
        array( "bnumber" => 63, "bname" => "2.Johannes", "bshort" => "2.Joh", "chapter" => array(13), "versesinbook" => 13 ),
        array( "bnumber" => 64, "bname" => "3.Johannes", "bshort" => "3.Joh", "chapter" => array(15), "versesinbook" => 15 ),
        array( "bnumber" => 65, "bname" => "Judas", "bshort" => "Jud", "chapter" => array(25), "versesinbook" => 25 ),
        array( "bnumber" => 66, "bname" => "Offenbarung", "bshort" => "Offb", "chapter" => array(20, 29, 22, 11, 14, 17, 17, 13, 21, 11, 19, 18, 18, 20, 8, 21, 18, 24, 21, 15, 27, 21), "versesinbook" => 405 )
    );
    return $biblebooks;
}


// {{buch}} {{kapitel}},;:{{verse}}
function splitBibleLocation($location, &$book, &$chapter, &$verse) {
    $separators = array(";", ":", ",");

    $parts1 = explode(" ", $location);
    $parts2 = "";
    $book = $parts1[0];

    for ($sepIdx = 0; $sepIdx < count($separators); $sepIdx++) {
        $pos = strpos($parts1[1], $separators[$sepIdx]);
        if ($pos !== false) {
            $parts2 = explode($separators[$sepIdx], $parts1[1]);
            break;
        }
    }
    
    $chapter = $parts2[0];
    $verse = $parts2[1];
}

function getBookFromName($bname) {
    $biblebooks = getBibleBooks();
    $countBiblebooks = count($biblebooks);
    for ($idx = 0; $idx < $countBiblebooks; $idx++) {
        if ($biblebooks[$idx]["bname"] == $bname) {
            return $biblebooks[$idx];
        }
    }
    return null;
}
?>

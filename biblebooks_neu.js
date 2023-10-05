var bibelbooks = [
    { bnumber: 1, bname: "1.Mose", chapter: [31, 25, 24, 26, 32, 22, 24, 22, 29, 32, 32, 20, 18, 24, 21, 16, 27, 33, 38, 18, 34, 24, 20, 67, 34, 35, 46, 22, 35, 43, 54, 33, 20, 31, 29, 43, 36, 30, 23, 23, 57, 38, 34, 34, 28, 34, 31, 22, 33, 26], versesinbook: 1533 }
    { bnumber: 2, bname: "2.Mose", chapter: [22, 25, 22, 31, 23, 30, 29, 28, 35, 29, 10, 51, 22, 31, 27, 36, 16, 27, 25, 26, 37, 30, 33, 18, 40, 37, 21, 43, 46, 38, 18, 35, 23, 35, 35, 38, 29, 31, 43, 38], versesinbook: 1213 }
    { bnumber: 3, bname: "3.Mose", chapter: [17, 16, 17, 35, 26, 23, 38, 36, 24, 20, 47, 8, 59, 57, 33, 34, 16, 30, 37, 27, 24, 33, 44, 23, 55, 46, 34], versesinbook: 859 }
    { bnumber: 4, bname: "4.Mose", chapter: [54, 34, 51, 49, 31, 27, 89, 26, 23, 36, 35, 16, 33, 45, 41, 35, 28, 32, 22, 29, 35, 41, 30, 25, 19, 65, 23, 31, 39, 17, 54, 42, 56, 29, 34, 13], versesinbook: 1289 }
    { bnumber: 5, bname: "5.Mose", chapter: [46, 37, 29, 49, 33, 25, 26, 20, 29, 22, 32, 31, 19, 29, 23, 22, 20, 22, 21, 20, 23, 29, 26, 22, 19, 19, 26, 69, 28, 20, 30, 52, 29, 12], versesinbook: 959 }
    { bnumber: 6, bname: "Josua", chapter: [18, 24, 17, 24, 15, 27, 26, 35, 27, 43, 23, 24, 33, 15, 63, 10, 18, 28, 51, 9, 45, 34, 16, 33], versesinbook: 658 }
    { bnumber: 7, bname: "Richter", chapter: [36, 23, 31, 24, 31, 40, 25, 35, 57, 18, 40, 15, 25, 20, 20, 31, 13, 31, 30, 48, 25], versesinbook: 618 }
    { bnumber: 8, bname: "Rut", chapter: [22, 23, 18, 22], versesinbook: 85 }
    { bnumber: 9, bname: "1.Samuel", chapter: [28, 36, 21, 22, 12, 21, 17, 22, 27, 27, 15, 25, 23, 52, 35, 23, 58, 30, 24, 42, 16, 23, 28, 23, 44, 25, 12, 25, 11, 31, 13], versesinbook: 811 }
    { bnumber: 10, bname: "2.Samuel", chapter: [27, 32, 39, 12, 25, 23, 29, 18, 13, 19, 27, 31, 39, 33, 37, 23, 29, 32, 44, 26, 22, 51, 39, 25], versesinbook: 695 }
    { bnumber: 11, bname: "1.Könige", chapter: [53, 46, 28, 20, 32, 38, 51, 66, 28, 29, 43, 33, 34, 31, 34, 34, 24, 46, 21, 43, 29, 54], versesinbook: 817 }
    { bnumber: 12, bname: "2.Könige", chapter: [18, 25, 27, 44, 27, 33, 20, 29, 37, 36, 20, 22, 25, 29, 38, 20, 41, 37, 37, 21, 26, 20, 37, 20, 30], versesinbook: 719 }
    { bnumber: 13, bname: "1.Chronik", chapter: [54, 55, 24, 43, 41, 66, 40, 40, 44, 14, 47, 41, 14, 17, 29, 43, 27, 17, 19, 8, 30, 19, 32, 31, 31, 32, 34, 21, 30], versesinbook: 943 }
    { bnumber: 14, bname: "2.Chronik", chapter: [18, 17, 17, 22, 14, 42, 22, 18, 31, 19, 23, 16, 23, 14, 19, 14, 19, 34, 11, 37, 20, 12, 21, 27, 28, 23, 9, 27, 36, 27, 21, 33, 25, 33, 27, 23], versesinbook: 822 }
    { bnumber: 15, bname: "Esra", chapter: [11, 70, 13, 24, 17, 22, 28, 36, 15, 44], versesinbook: 280 }
    { bnumber: 16, bname: "Nehemia", chapter: [11, 20, 38, 17, 19, 19, 72, 18, 37, 40, 36, 47, 31], versesinbook: 405 }
    { bnumber: 17, bname: "Esther", chapter: [22, 23, 15, 17, 14, 14, 10, 17, 32, 3], versesinbook: 167 }
    { bnumber: 18, bname: "Hiob", chapter: [22, 13, 26, 21, 27, 30, 21, 22, 35, 22, 20, 25, 28, 22, 35, 22, 16, 21, 29, 29, 34, 30, 17, 25, 6, 14, 23, 28, 25, 31, 40, 22, 33, 37, 16, 33, 24, 41, 30, 32, 26, 17], versesinbook: 1070 }
    { bnumber: 19, bname: "Psalmen", chapter: [6, 12, 9, 9, 13, 11, 18, 10, 21, 18, 7, 9, 6, 7, 5, 11, 15, 51, 15, 10, 14, 32, 6, 10, 22, 12, 14, 9, 11, 13, 25, 11, 22, 23, 28, 13, 40, 23, 14, 18, 14, 12, 5, 27, 18, 12, 10, 15, 21, 23, 21, 11, 7, 9, 24, 14, 12, 12, 18, 14, 9, 13, 12, 11, 14, 20, 8, 36, 37, 6, 24, 20, 28, 23, 11, 13, 21, 72, 13, 20, 17, 8, 19, 13, 14, 17, 7, 19, 53, 17, 16, 16, 5, 23, 11, 13, 12, 9, 9, 5, 8, 29, 22, 35, 45, 48, 43, 14, 31, 7, 10, 10, 9, 8, 18, 19, 2, 29, 176, 7, 8, 9, 4, 8, 5, 6, 5, 6, 8, 8, 3, 18, 3, 3, 21, 26, 9, 8, 24, 14, 10, 8, 12, 15, 21, 10, 20, 14, 9, 6], versesinbook: 2527 }
    { bnumber: 20, bname: "Sprüche", chapter: [33, 22, 35, 27, 23, 35, 27, 36, 18, 32, 31, 28, 25, 35, 33, 33, 28, 24, 29, 30, 31, 29, 35, 34, 28, 28, 27, 28, 27, 33, 31], versesinbook: 915 }
    { bnumber: 21, bname: "Prediger", chapter: [18, 26, 22, 17, 19, 12, 29, 17, 18, 20, 10, 14], versesinbook: 222 }
    { bnumber: 22, bname: "Hoheslied", chapter: [17, 17, 11, 16, 16, 12, 14, 14], versesinbook: 117 }
    { bnumber: 23, bname: "Jesaja", chapter: [31, 22, 26, 6, 30, 13, 25, 23, 20, 34, 16, 6, 22, 32, 9, 14, 14, 7, 25, 6, 17, 25, 18, 23, 12, 21, 13, 29, 24, 33, 9, 20, 24, 17, 10, 22, 38, 22, 8, 31, 29, 25, 28, 28, 25, 13, 15, 22, 26, 11, 23, 15, 12, 17, 13, 12, 21, 14, 21, 22, 11, 12, 19, 11, 25, 24], versesinbook: 1291 }
    { bnumber: 24, bname: "Jeremia", chapter: [19, 37, 25, 31, 31, 30, 34, 23, 25, 25, 23, 17, 27, 22, 21, 21, 27, 23, 15, 18, 14, 30, 40, 10, 38, 24, 22, 17, 32, 24, 40, 44, 26, 22, 19, 32, 21, 28, 18, 16, 18, 22, 13, 30, 5, 28, 7, 47, 39, 46, 64, 34], versesinbook: 1364 }
    { bnumber: 25, bname: "Klagelieder", chapter: [22, 22, 66, 22, 22], versesinbook: 154 }
    { bnumber: 26, bname: "Hesekiel", chapter: [28, 10, 27, 17, 17, 14, 27, 18, 11, 22, 25, 28, 23, 23, 8, 63, 24, 32, 14, 44, 37, 31, 49, 27, 17, 21, 36, 26, 21, 26, 18, 32, 33, 31, 15, 38, 28, 23, 29, 49, 26, 20, 27, 31, 25, 24, 23, 35], versesinbook: 1273 }
    { bnumber: 27, bname: "Daniel", chapter: [21, 49, 33, 34, 30, 29, 28, 27, 27, 21, 45, 13], versesinbook: 357 }
    { bnumber: 28, bname: "Hosea", chapter: [9, 25, 5, 19, 15, 11, 16, 14, 17, 15, 11, 15, 15, 10], versesinbook: 197 }
    { bnumber: 29, bname: "Joel", chapter: [20, 27, 5, 21], versesinbook: 73 }
    { bnumber: 30, bname: "Amos", chapter: [15, 16, 15, 13, 27, 14, 17, 14, 15], versesinbook: 146 }
    { bnumber: 31, bname: "Obadja", chapter: [21], versesinbook: 21 }
    { bnumber: 32, bname: "Jona", chapter: [16, 11, 10, 11], versesinbook: 48 }
    { bnumber: 33, bname: "Micha", chapter: [16, 13, 12, 14, 14, 16, 20], versesinbook: 105 }
    { bnumber: 34, bname: "Nahum", chapter: [14, 14, 19], versesinbook: 47 }
    { bnumber: 35, bname: "Habakuk", chapter: [17, 20, 19], versesinbook: 56 }
    { bnumber: 36, bname: "Zefanja", chapter: [18, 15, 20], versesinbook: 53 }
    { bnumber: 37, bname: "Haggai", chapter: [15, 23], versesinbook: 38 }
    { bnumber: 38, bname: "Sacharja", chapter: [17, 17, 10, 14, 11, 15, 14, 23, 17, 12, 17, 14, 9, 21], versesinbook: 211 }
    { bnumber: 39, bname: "Maleachi", chapter: [14, 17, 24], versesinbook: 55 }
    { bnumber: 40, bname: "Matthäus", chapter: [25, 23, 17, 25, 48, 34, 29, 34, 38, 42, 30, 50, 58, 36, 39, 28, 27, 35, 30, 34, 46, 46, 39, 51, 46, 75, 66, 20], versesinbook: 1071 }
    { bnumber: 41, bname: "Markus", chapter: [45, 28, 35, 41, 43, 56, 37, 38, 50, 52, 33, 44, 37, 72, 47, 20], versesinbook: 678 }
    { bnumber: 42, bname: "Lukas", chapter: [80, 52, 38, 44, 39, 49, 50, 56, 62, 42, 54, 59, 35, 35, 32, 31, 37, 43, 48, 47, 38, 71, 56, 53], versesinbook: 1151 }
    { bnumber: 43, bname: "Johannes", chapter: [51, 25, 36, 54, 47, 71, 53, 59, 41, 42, 57, 50, 38, 31, 27, 33, 26, 40, 42, 31, 25], versesinbook: 879 }
    { bnumber: 44, bname: "Apostelgeschichte", chapter: [26, 47, 26, 37, 42, 15, 60, 39, 43, 48, 30, 25, 52, 28, 41, 40, 34, 28, 40, 38, 40, 30, 35, 27, 27, 32, 45, 31], versesinbook: 1006 }
    { bnumber: 45, bname: "Römer", chapter: [32, 29, 31, 25, 21, 23, 25, 39, 33, 21, 36, 21, 14, 23, 33, 27], versesinbook: 433 }
    { bnumber: 46, bname: "1.Korinther", chapter: [31, 16, 23, 21, 13, 20, 40, 13, 27, 33, 34, 31, 13, 40, 58, 24], versesinbook: 437 }
    { bnumber: 47, bname: "2.Korinther", chapter: [24, 17, 18, 18, 21, 18, 16, 24, 15, 18, 33, 21, 13], versesinbook: 256 }
    { bnumber: 48, bname: "Galater", chapter: [24, 21, 29, 31, 26, 18], versesinbook: 149 }
    { bnumber: 49, bname: "Epheser", chapter: [23, 22, 21, 32, 33, 24], versesinbook: 155 }
    { bnumber: 50, bname: "Philipper", chapter: [30, 30, 21, 23], versesinbook: 104 }
    { bnumber: 51, bname: "Kolosser", chapter: [29, 23, 25, 18], versesinbook: 95 }
    { bnumber: 52, bname: "1.Thessalonicher", chapter: [10, 20, 13, 18, 28], versesinbook: 89 }
    { bnumber: 53, bname: "2.Thessalonicher", chapter: [12, 17, 18], versesinbook: 47 }
    { bnumber: 54, bname: "1.Timotheus", chapter: [20, 15, 16, 16, 25, 21], versesinbook: 113 }
    { bnumber: 55, bname: "2.Timotheus", chapter: [18, 26, 17, 22], versesinbook: 83 }
    { bnumber: 56, bname: "Titus", chapter: [16, 15, 15], versesinbook: 46 }
    { bnumber: 57, bname: "Philemon", chapter: [25], versesinbook: 25 }
    { bnumber: 58, bname: "Hebräer", chapter: [14, 18, 19, 16, 14, 20, 28, 13, 28, 39, 40, 29, 25], versesinbook: 303 }
    { bnumber: 59, bname: "Jakobus", chapter: [27, 26, 18, 17, 20], versesinbook: 108 }
    { bnumber: 60, bname: "1.Petrus", chapter: [25, 25, 22, 19, 14], versesinbook: 105 }
    { bnumber: 61, bname: "2.Petrus", chapter: [21, 22, 18], versesinbook: 61 }
    { bnumber: 62, bname: "1.Johannes", chapter: [10, 29, 24, 21, 21], versesinbook: 105 }
    { bnumber: 63, bname: "2.Johannes", chapter: [13], versesinbook: 13 }
    { bnumber: 64, bname: "3.Johannes", chapter: [15], versesinbook: 15 }
    { bnumber: 65, bname: "Judas", chapter: [25], versesinbook: 25 }
    { bnumber: 66, bname: "Offenbarung", chapter: [20, 29, 22, 11, 14, 17, 17, 13, 21, 11, 19, 18, 18, 20, 8, 21, 18, 24, 21, 15, 27, 21], versesinbook: 405 }
];
